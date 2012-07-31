<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
class TinyMCE_Customizer extends Controller
{

	/**
	 * Set the new tinyMCE config as rte-eval-parameter
	 * if the conditions match
	 *
	 * @param $table
	 * @return mixed
	 * @throws Exception
	 */
	public function replaceRteConfig($table)
	{
		// do not do anything for tl_tinymce tables
		if($this->Input->get('do') == 'TinyMCE_Customizer' || substr($table,0,10) == 'tl_tinymce') return;

		$this->import('Database');
		$this->import('BackendUser','User');

		$objUsage = $this->Database->execute('SELECT * FROM tl_tinymce_usage WHERE published="1" ORDER BY sorting');
		if(!$objUsage->numRows)
		{
			return;
		}

		// try to find a matching usage
		while($objUsage->next())
		{

			// lets take the usage if no rule is contradictory
			$useIt = true;

			/* User filter */
			if($objUsage->limitUsers)
			{
				$objUsage->users = deserialize($objUsage->users,true);
				if(!in_array($this->User->id, $objUsage->users))
				{
					$useIt = false;
				}
			}

			/* Group filter */
			if($objUsage->limitGroups)
			{
				$objUsage->groups = deserialize($objUsage->groups,true);
				if(count(array_intersect($this->User->groups,$objUsage->groups)) == 0)
				{
					$useIt = false;
				}
			}

			/* Page filter */
			// Works only for articles and content elements!
			if($objUsage->limitPages && ($table == 'tl_article' || $table == 'tl_content') && $this->Input->get('do') == 'article')
			{
				$objUsage->pages = deserialize($objUsage->pages,true);

				if($table == 'tl_article' && $this->Input->get('id'))
				{
					$objArticle = $this->Database->prepare('SELECT pid FROM tl_article WHERE id=?')->execute($this->Input->get('id'));

					$objPage = $this->getPageDetails($objArticle->pid);
					if(!is_array($objPage->trail) || count(array_intersect($objPage->trail,$objUsage->pages)) == 0)
					{
						$useIt = false;
					}
				}
				else
				{
					if($table == 'tl_content' && $this->Input->get('id'))
					{
						$objCE = $this->Database->prepare('SELECT pid FROM tl_content WHERE id=?')
							->execute($this->Input->get('id'));

						if($objCE->numRows)
						{
							$objArticle = $this->Database->prepare('SELECT pid FROM tl_article WHERE id=?')
								->execute($objCE->pid);

							$objPage = $this->getPageDetails($objArticle->pid);
							if(count(array_intersect($objPage->trail, $objUsage->pages)) == 0)
							{
								$useIt = false;
							}
						}
						else
						{
							$useIt = false;
						}
					}
					else
					{
						$useIt = false;
					}
				}
			}

			/* Layout filter */
			// Works only for articles and content elements!
			if($objUsage->limitLayouts && ($table == 'tl_article' || $table == 'tl_content') && $this->Input->get('do') == 'article')
			{
				$objUsage->layouts = deserialize($objUsage->layouts,true);

				if($table == 'tl_article' && $this->Input->get('id'))
				{
					$objArticle = $this->Database->prepare('SELECT pid FROM tl_article WHERE id=?')->execute($this->Input->get('id'));

					$objPage = $this->getPageDetails($objArticle->pid);
					if(!in_array($objPage->layout,$objUsage->layouts))
					{
						$useIt = false;
					}
				}
				else {
					if($table == 'tl_content' && $this->Input->get('id'))
					{
						$objCE = $this->Database->prepare('SELECT pid FROM tl_content WHERE id=?')
							->execute($this->Input->get('id'));
						$objArticle = $this->Database->prepare('SELECT pid FROM tl_article WHERE id=?')
							->execute($objCE->pid);

						$objPage = $this->getPageDetails($objArticle->pid);
						if(!in_array($objPage->layout,$objUsage->layouts))
						{
							$useIt = false;
						}
					}
					else
					{
						$useIt = false;
					}
				}
			}

			/* Field filter */
			if($objUsage->limitFields)
			{
				$objUsage->fields = deserialize($objUsage->fields,true);

				// weve to cache the fields for later replacing only matching ones
				$arrFields = array();

				foreach($objUsage->fields as $item)
				{
					if($item['table'] == $table)
					{
						$arrFields[] = $item['field'];
					}
				}

				// current table dosnt match any configured table
				if(empty($arrFields))
				{
					$useIt = false;
				}
			}


			// if nothing predicts this rule, set the tiny config
			if($useIt)
			{
				$objConfig = $this->Database->prepare('SELECT cleanInput,alias FROM tl_tinymce_config WHERE id=?')->execute($objUsage->configId);
				if(!$objConfig->numRows)
				{
					throw new Exception('TinyMCE configuration ID:'.$objUsage->configId.' not found!');
				}

				foreach($GLOBALS['TL_DCA'][$table]['fields'] as $field => $data)
				{
					// if $arrFields[0] == '' acts like a wildcard matching all fields
					if($objUsage->limitFields && !empty($arrFields[0]))
					{
						if($data['eval']['rte'] && in_array($field,$arrFields))
						{
							$GLOBALS['TL_DCA'][$table]['fields'][$field]['eval']['rte'] = 'tinyMCE_'.$objConfig->alias;

							// add htmlCleaner callback
							if($objConfig->cleanInput)
							{
								$GLOBALS['TL_DCA'][$table]['fields'][$field]['save_callback'][] = array('TinyMCE_Customizer','cleanHtmlCode');
							}
						}
					}
					else
					{
						if($data['eval']['rte'])
						{
							$GLOBALS['TL_DCA'][$table]['fields'][$field]['eval']['rte'] = 'tinyMCE_'.$objConfig->alias;

							// add htmlCleaner callback
							if($objConfig->cleanInput)
							{
								$GLOBALS['TL_DCA'][$table]['fields'][$field]['save_callback'][] = array('TinyMCE_Customizer','cleanHtmlCode');
							}
						}
					}

				}

				// usage-rule matched and is applied, we've done
				return;
			}
		}

	}


	/**
	 * Generate the config-file for usage in the DCA-Structure
	 *
	 * @param int $id tl_tinymce_config ID
	 * @throws Exception
	 */
	public function generateConfigfile($id)
	{
		$this->import('Database');
		require_once(TL_ROOT.'/system/modules/TinyMCE_Customizer/config/TinyMCE_Plugins.php');

		$objCfg = $this->Database->prepare('SELECT * FROM tl_tinymce_config WHERE id=?')->execute($id);

		if(!$objCfg->numRows)
		{
			throw new Exception('tl_tinymce_config with ID '.$id.' not found!');
		}

		// deserialize buttons
		$objCfg->buttons = deserialize($objCfg->buttons,true);

		// deserialize plugins
		$objCfg->plugins = deserialize($objCfg->plugins,true);
		// add forceActive plugins
		$arrPlugins = $objCfg->plugins;
		foreach($GLOBALS['TinyMCE_Customizer']['plugins'] as $plugin => $arrCfg)
		{
			if($arrCfg['forceActive'] && $plugin != 'TinyMCE')
			{
				$arrPlugins[] = $plugin;
			}
		}
		$objCfg->plugins = $arrPlugins;

		// deserialize blockformats
		$objCfg->blockformats = deserialize($objCfg->blockformats,true);

		// compile extended_valid_elementes
		$arrValidElems = array($GLOBALS['TinyMCE_Customizer']['plugins']['TinyMCE']['extended_valid_elements']);
		if(strlen($objCfg->extended_valid_elements))
		{
			$arrValidElems[] = $objCfg->extended_valid_elements;
		}
		foreach($objCfg->plugins as $plugin)
		{
			if($GLOBALS['TinyMCE_Customizer']['plugins'][$plugin]['extended_valid_elements'])
			{
				$arrValidElems[] = $GLOBALS['TinyMCE_Customizer']['plugins'][$plugin]['extended_valid_elements'];
			}
		}
		$objCfg->extended_valid_elements = $arrValidElems;

		// deserialize and extend content_css with TL_PATH
		$objCfg->content_css = deserialize($objCfg->content_css,true);
		foreach($objCfg->content_css as $k => $v)
		{
			$objCfg->content_css[$k] = TL_PATH.$v;
		}

		// fetch custom filebrowser javascript
		$arrFilebrowsers = array();
		if(strlen($objCfg->file_browser_callback))
		{
			if (isset($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser']) && is_array($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser']))
			{
				foreach ($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser'] as $callback)
				{
					$this->import($callback[0]);
					$arrFilebrowsers = $this->$callback[0]->$callback[1]($arr,$dc);
				}
			}
			$objCfg->file_browser_javascript = $arrFilebrowsers[$objCfg->file_browser_callback]['javascript'];
		}

		// compile theme_advanced_font_sizes
		$objCfg->theme_advanced_font_sizes = $this->compileOptionsHelper(deserialize($objCfg->theme_advanced_font_sizes),',');

		// compile theme_advanced_fonts
		$objCfg->theme_advanced_fonts = $this->compileOptionsHelper(deserialize($objCfg->theme_advanced_fonts),';');

		// compile theme_advanced_styles
		$objCfg->theme_advanced_styles = $this->compileOptionsHelper(deserialize($objCfg->theme_advanced_styles),';');




		// fetch the template
		ob_start();
		require(TL_ROOT.'/system/modules/TinyMCE_Customizer/templates/tinyMCE_configTpl.php');
		$strCfg = ob_get_clean();

		// transform escapted <\?php back to <?php
		$strCfg = str_replace('<\?php','<?php',$strCfg);

		// write the confiug
		$fp = fopen(TL_ROOT.'/system/config/tinyMCE_'.$objCfg->alias.'.php','w');
		fwrite($fp,$strCfg);
		fclose($fp);
	}


	/**
	 * Compile a multidimensionalarray like
	 * array(array('label'=>'...','value'=>'...'), ...)
	 * to a string like
	 * "label=value,..."
	 *
	 * @param $arrData
	 * @param string $separator
	 * @return string
	 */
	protected function compileOptionsHelper($arrData,$separator=',')
	{
		$strReturn = '';
		if(!is_array($arrData))
		{
			return $strReturn;
		}

		foreach($arrData as $arrItem)
		{
			$first = current($arrItem);
			$second = next($arrItem);
			if(!$first || !$second)
			{
				continue;
			}

			$strReturn .= $first.'='.$second.$separator;
		}
		if(!empty($strReturn))
		{
			$strReturn = substr($strReturn,0,-strlen($separator));
		}

		return $strReturn;
	}
	

	/**
	 * Display the wiki-helppage
	 * @return string
	 */
	public function help()
	{
		return '<a href="http://de.contaowiki.org/TinyMCE_Customizer">TinyMCE Customizer Manual</a>';
	}


	/**
	 * clean the html output from an input field
	 *
	 * many thanks to  Leo Unglaub <leo@leo-unglaub.net> for the idea doing this
	 *
	 * @param string $varValue
	 * @param DataContainer $dc
	 * @return string
	 */
	public function cleanHtmlCode($varValue, DataContainer $dc)
	{
		$this->import('Database');

		$tinyConfigAlias = str_replace('tinyMCE_','',$GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['rte']);

		$objCfg = $this->Database->prepare('SELECT cleanInput,allowedTags FROM tl_tinymce_config WHERE alias=?')
					   ->limit(1)->execute($tinyConfigAlias);

		// check if we have allowed tags, if not skip the striping
		if ($objCfg->cleanInput && $objCfg->allowedTags != '')
		{
			return strip_tags($varValue, $objCfg->allowedTags);
		}

		return $varValue;
	}


	/**
	 * Import a configuration
	 */
	public function importConfig()
	{
		if ($this->Input->post('FORM_SUBMIT') == 'tl_tinymce_config_import')
		{
			$this->import('Database');
			$source = $this->Input->post('source', true);

			// Check the file names
			if (!$source || !is_array($source))
			{
				$this->addErrorMessage($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			$arrFiles = array();

			// Skip invalid entries
			foreach ($source as $cfgFile)
			{
				// Skip folders
				if (is_dir(TL_ROOT . '/' . $cfgFile))
				{
					$this->addErrorMessage(sprintf($GLOBALS['TL_LANG']['ERR']['importFolder'], basename($cfgFile)));
					continue;
				}

				$arrFiles[] = $cfgFile;
			}

			// Check wether there are any files left
			if (empty($arrFiles))
			{
				$this->addErrorMessage($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			// import the files
			foreach($arrFiles as $file)
			{
				$file = new File($file);
				$arrData = deserialize($file->getContent());

				$this->Database->prepare('INSERT INTO tl_tinymce_config %s')->set($arrData)->execute();
				$this->addConfirmationMessage("File {$file->filename} impoted successfully. Configuration with Name <i>{$arrData['name']}</i> generated.");
				$file->close();
			}

			$this->reload();
		}

		$this->loadDataContainer('tl_tinymce_config');
		$objTree = new FileTree($this->prepareForWidget($GLOBALS['TL_DCA']['tl_tinymce_config']['fields']['source'], 'source', null, 'source', 'tl_tinymce_config'));

		// Return the form
		return '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=import', '', $this->Environment->request)).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBT']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_tinymce_config']['import'][1].'</h2>
'.$this->getMessages().'
<form action="'.ampersand($this->Environment->request, true).'" id="tl_tinymce_config_import" class="tl_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_tinymce_config_import">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">

<div class="tl_tbox">
  <h3><label for="source">'.$GLOBALS['TL_LANG']['tl_tinymce_config']['source'][0].'</label> <a href="contao/files.php" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['fileManager']) . '" data-lightbox="files 765 80%">' . $this->generateImage('filemanager.gif', $GLOBALS['TL_LANG']['MSC']['fileManager'], 'style="vertical-align:text-bottom"') . '</a></h3>'.$objTree->generate().(strlen($GLOBALS['TL_LANG']['tl_tinymce_config']['source'][1]) ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['tl_tinymce_config']['source'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
  <input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_tinymce_config']['import'][0]).'">
</div>

</div>
</form>';
	}



	/**
	 * Export a configuration
	 * and provide as download
	 *
	 * @param DataContainer
	 * @return string|void
	 */
	public function exportConfig(DataContainer $dc)
	{
		$this->import('Database');

		// Get the theme meta data
		$objConfig = $this->Database->prepare("SELECT * FROM tl_tinymce_config WHERE id=?")
								   ->limit(1)
								   ->execute($dc->id);

		if ($objConfig->numRows < 1)
		{
			return '<p class="tl_error">Config with ID '.$dc->id.' not found!</p>';
		}

		$arrFields = $this->Database->listFields('tl_tinymce_config');

		$arrData = array();
		foreach($arrFields as $field)
		{
			$field = $field['name'];

			// skip some fields
			if($field == 'id') continue;
			if($field == 'alias') continue;
			if($field == 'PRIMARY') continue;
			if(!strlen($objConfig->{$field})) continue;

			$arrData[$field] = $objConfig->{$field};
		}

		$strData = serialize($arrData);

		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename="' . $objConfig->alias . '.TinyMceConfig"');
		header('Content-Length: ' . strlen($strData));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');

		echo $strData;

		exit;
	}


}
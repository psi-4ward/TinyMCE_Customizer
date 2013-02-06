<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!'); }

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */


/**
 * Table tl_tinymce_usage
 */
$GLOBALS['TL_DCA']['tl_tinymce_usage'] = array
(

 	// Config
 	'config' => array
 	(
 		'dataContainer'					=> 'Table',
 		'enableVersioning'				=> true,
 		'switchToEdit'					=> true,
 	),

 	// List
 	'list' => array
 	(
 		'sorting' => array
 		(
			'mode'						=> 1,
			'fields'                  	=> array('sorting'),
 			'panelLayout'				=> 'filter;search,limit',
			'listViewSortable'			=> true,
 		),
		'label' => array
		(
			'fields'					=> array('name'),
			'label_callback'			=> array('tl_tinymce_usage', 'listRows')
		),
 		'global_operations' => array
 		(
 			'back' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['MSC']['backBT'],
 				'href'					=> 'table=tl_tinymce_config',
 				'class'					=> 'header_back',
 			),
 			'help' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['help'],
 				'href'					=> 'key=help',
 				'class'					=> 'header_edit_all',
 				'attributes'			=> 'style="background-image:url(system/modules/TinyMCE_Customizer/html/help.png);" onclick="window.open(\'http://de.contaowiki.org/TinyMCE_Customizer\');return false;"'
 			),
 			'all' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['MSC']['all'],
 				'href'					=> 'act=select',
 				'class'					=> 'header_edit_all',
 				'attributes'			=> 'onclick="Backend.getScrollOffset();" accesskey="e"'
 			),
 		),
 		'operations' => array
 		(
 			'edit' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['edit'],
 				'href'					=> 'act=edit',
 				'icon'					=> 'edit.gif'
 			),
 			'copy' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['copy'],
 				'href'					=> 'act=copy',
 				'icon'					=> 'copy.gif'
 			),
 			'cut' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['cut'],
 				'href'					=> 'act=paste&amp;mode=cut',
 				'icon'					=> 'cut.gif',
 				'attributes'			=> 'onclick="Backend.getScrollOffset();"'
 			),
 			'delete' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['delete'],
 				'href'					=> 'act=delete',
 				'icon'					=> 'delete.gif',
 				'attributes'			=> 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
 			),
 		 	'toggle' => array
 			(
 				'label'               => &$GLOBALS['TL_LANG']['tl_tinymce_usage']['toggle'],
 				'icon'                => 'visible.gif',
 				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
 				'button_callback'     => array('tl_tinymce_usage', 'toggleIcon')
 			),
 			'show' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['show'],
 				'href'					=> 'act=show',
 				'icon'					=> 'show.gif'
 			),
 		)
 	),

 	// Palettes
 	'palettes' => array
 	(
		'__selector__'					=> array('limitUsers','limitGroups','limitPages','limitFields','limitLayouts'),
 		'default'						=> '{name_legend},name,configId,sorting,onlyTinyMceFields;{users_legend},limitUsers;{groups_legend},limitGroups;{pages_legend},limitPages;{layouts_legend},limitLayouts;{fields_legend},limitFields;{publish_legend},published',
 	),

	'subpalettes' => array
	(
		'limitUsers'					=> 'users',
		'limitGroups'					=> 'groups',
		'limitPages'					=> 'pages',
		'limitFields'					=> 'fields',
		'limitLayouts'					=> 'layouts',
	),

 	// Fields
 	'fields' => array
 	(
 		'name' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['name'],
 			'inputType'					=> 'text',
 			'eval'						=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
 		),
 		'sorting' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['sorting'],
 			'inputType'					=> 'text',
 			'eval'						=> array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50'),
 		),
		'configId' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['configId'],
			'inputType'					=> 'radio',
			'foreignKey'				=> 'tl_tinymce_config.name',
			'eval'						=> array('mandatory'=>true, 'tl_class'=>'w50'),
		),
		'limitUsers' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitUsers'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'users' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['users'],
			'exclude'					=> true,
			'inputType'					=> 'tableLookup',
			'eval' => array
			(
				'tl_class'				=> 'clr',
				'foreignTable'			=> 'tl_user',
				'fieldType'				=> 'checkbox',
				'listFields'			=> array('id', 'username', 'name'),
				'searchFields'			=> array('id', 'username', 'name'),
				'searchLabel'			=> &$GLOBALS['TL_LANG']['MSC']['searchLabel'],
			)
		),
		'limitGroups' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitGroups'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'groups' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['groups'],
			'exclude'					=> true,
			'inputType'					=> 'tableLookup',
			'eval' => array
			(
				'tl_class'				=> 'clr',
				'foreignTable'			=> 'tl_user_group',
				'fieldType'				=> 'checkbox',
				'listFields'			=> array('id','name'),
				'searchFields'			=> array('id','name'),
				'searchLabel'			=> &$GLOBALS['TL_LANG']['MSC']['searchLabel'],
			)
		),
		'limitPages' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitPages'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'pages' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['pages'],
			'inputType'					=> 'pageTree',
			'eval'						=> array('fieldType'=>'checkbox')
		),
		'limitFields' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitFields'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'fields' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['fields'],
			'inputType'					=> 'multiColumnWizard',
			'eval' => array
			(
				'columnFields' => array
				(
					'table' => array
					(
						'label'				=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['fields_table'],
						'inputType'			=> 'select',
						'options_callback'	=> array('tl_tinymce_usage','getTables'),
						'eval'				=> array('mandatory'=>true, 'submitOnChange'=>true, 'style'=>'width:280px')
					),
					'field' => array
					(
						'label'				=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['fields_field'],
						'inputType'			=> 'select',
						'options_callback'	=> array('tl_tinymce_usage','getFields'),
						'eval'				=> array('mandatory'=>false, 'includeBlankOption'=>true, 'style'=>'width:280px')
					)
				)
			)
		),
		'limitLayouts' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitLayouts'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'layouts' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['limitLayouts'],
			'inputType'					=> 'checkbox',
			'options_callback'			=> array('tl_tinymce_usage','getLayouts'),
			'eval'						=> array('multiple'=>true)
		),
 		'published' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['published'],
 			'inputType'					=> 'checkbox',
 			'eval'						=> array('doNotCopy'=>true),
 		),
		'onlyTinyMceFields' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_usage']['onlyTinyMceFields'],
 			'inputType'					=> 'checkbox',
 			'eval'						=> array('tl_class'=>'w50 m12'),
 		),
 	)
);


class tl_tinymce_usage extends Backend
{
	private static $getFieldsIterator = 0;


	public function __construct()
	{
		parent::__construct();
		$this->import('Database');
		$this->import('BackendUser','User');
	}


	public function listRows($row)
	{
		$str = '';
		$str .= '<h3>'.$row['name'].'</h3>';
		$str .= '<p>';
		foreach($GLOBALS['TL_DCA']['tl_tinymce_usage']['subpalettes'] as $key => $item )
		{
			if($row[$key])		$str .= $GLOBALS['TL_LANG']['tl_tinymce_usage'][$item.'_legend'].'<br>';
		}
		$str .= '</p>';


		return $str;
	}


	/**
	 * Find rte-fields in the DCA of the chosen table
	 * @param $obj
	 * @return array
	 */
	public function getFields($obj)
	{
		$tbl = $obj->value[self::$getFieldsIterator]['table'];

		$this->loadDataContainer($tbl);

		$arrFields = array();
		if(!is_array($GLOBALS['TL_DCA'][$tbl]['fields']))
		{
			return $arrFields;
		}

		foreach($GLOBALS['TL_DCA'][$tbl]['fields'] as $fld => $data)
		{
			if($data['eval']['rte'])
			{
				$arrFields[] = $fld;
			}
		}

		self::$getFieldsIterator++;
		return $arrFields;
	}


	/**
	 * Return all database tables
	 * @param $obj
	 * @return array
	 */
	public function getTables($obj)
	{
		return $this->Database->listTables();
	}


	/**
	 * Return all layouts
	 * @return array
	 */
	public function getLayouts()
	{
		$objLayouts = $this->Database->executeUncached('SELECT l.id,l.name,t.name as theme
														FROM tl_layout AS l
														LEFT JOIN tl_theme AS t ON (l.pid=t.id)
														ORDER BY t.name,l.name');
		$arr = array();
		while($objLayouts->next())
		{
			$arr[$objLayouts->id] = '['.$objLayouts->theme.'] '.$objLayouts->name;
		}

		return $arr;
	}


	/**
	 * Publish/unpublish
	 *
	 * @param int $intId
	 * @param bool $blnVisible
	 * @throws Exception
	 * @return void
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		// get the table name
		if($this->Input->get('table'))
		{
			$table = $this->Input->get('table');
		}
		else
		{
			foreach ($GLOBALS['BE_MOD'] as $arrGroup)
			{
				if (is_array($arrGroup[$this->Input->get('do')]['tables']))
				{
					$table = $arrGroup[$this->Input->get('do')]['tables'][0];
					break;
				}
			}
		}

		if(empty($table))    {
			throw new Exception('Could not find the table name!');
		}


		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess($table.'::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish '.$table.' ID "'.$intId.'"', $table.' toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion($table, $intId);

		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA'][$table]['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA'][$table]['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE {$table} SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion($table, $intId);
	}


	/**
	 * Return the "toggle visibility" button
	 * @param array $row
	 * @param string $href
	 * @param string $label
	 * @param string $title
	 * @param string $icon
	 * @param string $attributes
	 * @param string $table
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes, $strTable)
	{

		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess($strTable.'::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}

}

// preload tablelookupwizard js and css
// cause subpalettes loaded through ajax
$GLOBALS['TL_CSS'][] = 'system/modules/tablelookupwizard/html/tablelookup.css';
$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/tablelookupwizard/html/tablelookup.js';

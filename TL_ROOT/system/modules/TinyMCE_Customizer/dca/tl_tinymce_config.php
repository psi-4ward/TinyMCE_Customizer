<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */


// load TinyMCE_Plugins config
require_once(TL_ROOT.'/system/modules/TinyMCE_Customizer/config/TinyMCE_Plugins.php');


 /**
  * Table tl_tinymce_config
  */
$GLOBALS['TL_DCA']['tl_tinymce_config'] = array
(

 	// Config
 	'config' => array
 	(
 		'dataContainer'					=> 'Table',
 		'enableVersioning'				=> true,
 		'switchToEdit'					=> true,
		'onsubmit_callback'				=> array(array('tl_tinymce_config','generateConfigfile'))
 	),

 	// List
 	'list' => array
 	(
 		'sorting' => array
 		(
 			'mode'						=> 1,
 			'fields'					=> array('name'),
 			'flag'						=> 1,
 			'panelLayout'				=> 'filter;search,limit',
 		),
 		'label' => array
 		(
 			'fields'					=> array('name'),
 			'format'					=> '%s',
 		),
 		'global_operations' => array
 		(
			 'usage' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['usage'],
 				'href'					=> 'table=tl_tinymce_usage',
				'class'					=> 'header_edit_all',
				'attributes'			=> 'style="background-image:url(system/modules/TinyMCE_Customizer/html/usage.png);"'
 			),
			'import' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_tinymce_config']['import'],
				'href'                => 'key=import',
				'class'               => 'header_theme_import',
				'attributes'          => 'onclick="Backend.getScrollOffset()"'
			),
			'help' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['help'],
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
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['edit'],
 				'href'					=> 'act=edit',
 				'icon'					=> 'edit.gif'
 			),
 			'copy' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['copy'],
 				'href'					=> 'act=copy',
 				'icon'					=> 'copy.gif'
 			),
 			'delete' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['delete'],
 				'href'					=> 'act=delete',
 				'icon'					=> 'delete.gif',
 				'attributes'			=> 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
 			),
			'export' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_theme']['export'],
				'href'                => 'key=export',
				'icon'                => 'theme_export.gif'
			),
 			'show' => array
 			(
 				'label'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['show'],
 				'href'					=> 'act=show',
 				'icon'					=> 'show.gif'
 			),
 		)
 	),

 	// Palettes
 	'palettes' => array
 	(
		'__selector__'					=> array('cleanInput'),
 		'default'						=>  '{name_legend},name,alias;'.
 											'{plugins_legend},plugins;'.
			 								'{buttons_legend},buttons;'.
			 								'{editor_options_legend},height,file_browser_callback,theme_advanced_resizing,theme_advanced_resize_horizontal,accessibility_warnings,directionality,object_resizing,preformatted,theme_advanced_statusbar_location;'.
			 								'{format_legend},blockformats,;'.
	 										'{font_legend},theme_advanced_fonts,theme_advanced_font_sizes,theme_advanced_text_colors,theme_advanced_background_colors,theme_advanced_more_colors;'.
	 										'{css_legend},content_css,theme_advanced_styles;'.
			 								'{cleanup_legend},extended_valid_elements,cleanInput;'.
	 										'{expert_legend},formats,style_formats;'
 	),

	'subpalettes' => array
	(
		'cleanInput' 					=> 'allowedTags'
	),

 	// Fields
 	'fields' => array
 	(
		'source' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_tinymce_config']['source'],
			'eval'                    => array('fieldType'=>'checkbox', 'files'=>true, 'filesOnly'=>true, 'extensions'=>'tinymceconfig', 'class'=>'mandatory')
		),

 		'name' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['name'],
 			'inputType'					=> 'text',
 			'eval'						=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
 		),
		'alias' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['alias'],
 			'inputType'					=> 'text',
			'save_callback' 			=> array(array('tl_tinymce_config', 'generateAlias')),
 			'eval'						=> array('maxlength'=>255, 'tl_class'=>'w50', 'doNotCopy'=>true, 'unique'=>true),
 		),
 		'plugins' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['plugins'],
 			'inputType'					=> 'checkbox',
			'options_callback'			=> array('tl_tinymce_config','getPlugins'),
			'reference'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference'],
			'eval'						=> array('multiple' => true, 'submitOnChange'=>true)
 		),
		'buttons' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['buttons'],
			'inputType'					=> 'TinyMCE_Buttonconfigger',
			'options_callback'			=> array('tl_tinymce_config','getButtons'),
			'reference'					=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference'],
			'eval'						=> array()
		),
		'blockformats' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['blockformats'],
			'inputType'					=> 'multiColumnWizard',
			'default'					=> serialize(array('div','p','address','pre','h1','h2','h3','h4','h5','h6')),
			'eval'						=> array
			(
				'flatArray' => true,
				'columnFields' => array
				(
					'blogformat' => array
					(
						'label'			=> ' ',
						'inputType'		=> 'text',
						'eval'			=> array('style' => 'width:200px')
					)
				)
			)
		),
		'formats' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['formats'],
			'inputType'					=> 'textarea',
			'eval'						=> array('helpwizard'=>true),
			'explanation'				=> 'TinyMCE_Customizer_style_formats'
		),
		'style_formats' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['style_formats'],
			'inputType'					=> 'textarea',
			'eval'						=> array('helpwizard'=>true),
			'explanation'				=> 'TinyMCE_Customizer_style_formats'

		),
		'content_css' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['content_css'],
			'inputType'					=> 'checkbox',
			'options_callback'			=> array('tl_tinymce_config','getContentCss'),
			'eval'						=> array('multiple' => true)
		),

		'height' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['height'],
			'inputType'					=> 'text',
			'default'					=> '300',
			'eval'						=> array('rgxp'=>'digit', 'tl_class'=>'w50')
		),
		'theme_advanced_resizing' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_resizing'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'theme_advanced_resize_horizontal' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_resize_horizontal'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'file_browser_callback' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['file_browser_callback'],
			'inputType'					=> 'select',
			'options_callback'			=> array('tl_tinymce_config','getFilebrowsers'),
			'eval'						=> array('tl_class'=>'w50','includeBlankOption'=>true)
		),
		'accessibility_warnings' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['accessibility_warnings'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'directionality' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['directionality'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'object_resizing' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['object_resizing'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'extended_valid_elements' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['extended_valid_elements'],
 			'inputType'					=> 'text',
 			'eval'						=> array('maxlength'=>255, 'tl_class'=>'long'),
 		),
		'indentation' => array
 		(
 			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['indentation'],
 			'inputType'					=> 'text',
 			'eval'						=> array('maxlength'=>56, 'tl_class'=>'w50'),
 		),
		'preformatted' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['preformatted'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'theme_advanced_styles' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_styles'],
			'inputType'					=> 'multiColumnWizard',
			'eval'						=> array
			(
				'columnFields' => array
				(
					'title'	=> array
					(
						'label'			=> array('Title'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
					'class'	=> array
					(
						'label'			=> array('css-class'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
				)
			)
		),
		'theme_advanced_fonts' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_fonts'],
			'inputType'					=> 'multiColumnWizard',
			'eval'						=> array
			(
				'columnFields' => array
				(
					'title'	=> array
					(
						'label'			=> array('Title'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
					'class'	=> array
					(
						'label'			=> array('font-family'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
				)
			)
		),
		'theme_advanced_font_sizes' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_font_sizes'],
			'inputType'					=> 'multiColumnWizard',
			'eval'						=> array
			(
				'columnFields' => array
				(
					'title'	=> array
					(
						'label'			=> array('Title'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
					'class'	=> array
					(
						'label'			=> array('value'),
						'inputType'		=> 'text',
						'eval'			=> array('mandatory'=>false, 'style'=>'width:200px')
					),
				)
			)
		),
		'theme_advanced_text_colors' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_text_colors'],
			'inputType'					=> 'text',
			'eval'						=> array('tl_class'=>'long')
		),
		'theme_advanced_background_colors' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_background_colors'],
			'inputType'					=> 'text',
			'eval'						=> array('tl_class'=>'long')
		),
		'theme_advanced_more_colors' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_more_colors'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'theme_advanced_statusbar_location' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_statusbar_location'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('tl_class'=>'w50')
		),
		'cleanInput' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['cleanInput'],
			'inputType'					=> 'checkbox',
			'eval'						=> array('submitOnChange'=>true)
		),
		'allowedTags' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_tinymce_config']['allowedTags'],
			'inputType'					=> 'textarea',
			'eval'						=> array('allowHtml'=>true, 'preserveTags'=>true)
		),

 	)
);


class tl_tinymce_config extends System
{

	public function getFilebrowsers($dc)
	{
		$arrFilebrowsers = array();

		/*
		$arr['filebrowserKey'] = array
		(
			'label' 		=> 'My cool Filebrowser',
			'javascript'	=> 'some javascript to run the filebrowser, it gets automatically wrapped in a function myFileBrowser (field_name, url, type, win) { ..."
		)
		 */

		// HOOK: Let other extensions alter this array
		if (isset($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser']) && is_array($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser']))
		{
			foreach ($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser'] as $callback)
			{
				$this->import($callback[0]);
				$arrFilebrowsers = $this->$callback[0]->$callback[1]($arr,$dc);
			}
		}

		// reformat for usage in the select widget
		$arrReturn = array();
		foreach($arrFilebrowsers as $key => $data)
		{
			$arrReturn[$key] = $data['label'];
		}

		return $arrReturn;
	}


	/**
	 * Trigger the config file generation
	 * @param DataContainer $dc
	 */
	public function generateConfigfile(DataContainer $dc)
	{

		$this->import('\TinyMCE_Customizer\TinyMCE_Customizer','TinyMCE_Customizer');
		$this->TinyMCE_Customizer->generateConfigfile($dc->id);
	}


	/**
	 * Generate the alias
	 * @param $varValue
	 * @param DataContainer $dc
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate an alias if there is none
		if ($varValue == '')
		{
			$autoAlias = true;
			$varValue = standardize($dc->activeRecord->name);
		}

		$this->import('Database');
		$objAlias = $this->Database->prepare("SELECT id FROM tl_tinymce_config WHERE id=? OR alias=?")
								   ->execute($dc->id, $varValue);

		if(!$objAlias->numRows)
		{
			$varValue .= '-'.$dc->id;
		}

		return $varValue;
	}


	/**
	 * Get all valid content_css files
	 */
	public function getContentCss($dc)
	{

		$arrFiles = array
		(
			'tl_files/tinymce.css',
			'basic.css'
		);

		foreach($arrFiles as $k => $file)
		{
			if(!file_exists(TL_ROOT.'/'.$file))
			{

				if($GLOBALS['TL_CONFIG']['debugMode'])
				{
					$GLOBALS['TL_DEBUG'][] = 'Skipping TinyMCE content_css file"'.$file.'" cause it dosnt exist.';
				}
				unset($arrFiles[$k]);
			}
		}


		// HOOK: Let other extensions alter this array
		if (isset($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_ContentCSS']) && is_array($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_ContentCSS']))
		{
			foreach ($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_ContentCSS'] as $callback)
			{
				$this->import($callback[0]);
				$arrFiles = $this->$callback[0]->$callback[1]($arrFiles,$dc);
			}
		}

		return $arrFiles;
	}


	/**
	 * Find all plugins
	 * @return array
	 */
	public function getPlugins()
	{
		$arrPlugins = array();
		foreach($GLOBALS['TinyMCE_Customizer']['plugins'] as $plugin => $arrCfg)
		{
			// some plugins sould not be deactivated
			if($arrCfg['forceActive'])
			{
				continue;
			}

			if(substr($plugin,0,1) != '-' && !file_exists(TL_ROOT.'/assets/tinymce/plugins/'.$plugin))
			{

				if($GLOBALS['TL_CONFIG']['debugMode'])
				{
					$GLOBALS['TL_DEBUG'][] = 'Skipping TinyMCE Plugin "'.$plugin.'" cause theres no such folder in assets/tinymce/plugins';
				}

				continue;
			}


			$arrPlugins[$plugin] = $plugin;
		}

		return $arrPlugins;
	}
	

	/**
	 * Find all buttons of activated plugins
	 * @param $dc
	 * @return array
	 */
	public function getButtons($dc)
	{
		$arrPlugins = deserialize($dc->activeRecord->plugins,true);

		$arrButtons = array();
		foreach($GLOBALS['TinyMCE_Customizer']['plugins'] as $plugin => $arrCfg)
		{
			if(!is_array($arrCfg['buttons']) || !$arrCfg['forceActive'] && !in_array($plugin,$arrPlugins))
			{
				continue;
			}

			$arrButtons = array_merge($arrButtons,$arrCfg['buttons']);
		}

		foreach($arrButtons as $k => $v)
		{
			if(empty($v))
			{
				unset($arrButtons[$k]);
			}
		}

		return array_values($arrButtons);
	}

}

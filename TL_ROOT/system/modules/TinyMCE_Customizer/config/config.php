<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
// BE-Module
$GLOBALS['BE_MOD']['system']['TinyMCE_Customizer'] = array(
	'tables'  	=> array('tl_tinymce_config','tl_tinymce_usage'),
	'icon'    	=> 'system/modules/TinyMCE_Customizer/html/icon.png',
	'help'	  	=> array('\TinyMCE_Customizer\TinyMCE_Customizer','help'),
	'import' 	=> array('\TinyMCE_Customizer\TinyMCE_Customizer', 'importConfig'),
	'export' 	=> array('\TinyMCE_Customizer\TinyMCE_Customizer', 'exportConfig'),
);

// Widget
$GLOBALS['BE_FFL']['TinyMCE_Buttonconfigger'] = '\TinyMCE_Customizer\WidgetTinyMCE_Buttonconfigger';

if(\Input::get('do') != 'repository_manager' && \Input::get('do') != 'composer')
{
	// HOOK
	$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('\TinyMCE_Customizer\TinyMCE_Customizer','replaceRteConfig');
}

<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
// BE-Module
$GLOBALS['BE_MOD']['system']['TinyMCE_Customizer'] = array(
	'tables'  	=> array('tl_tinymce_config','tl_tinymce_usage'),
	'icon'    	=> 'system/modules/TinyMCE_Customizer/html/icon.png',
	'help'	  	=> array('TinyMCE_Customizer','help'),
	'import' 	=> array('TinyMCE_Customizer', 'importConfig'),
	'export' 	=> array('TinyMCE_Customizer', 'exportConfig'),
);

// Widget
$GLOBALS['BE_FFL']['TinyMCE_Buttonconfigger'] = 'WidgetTinyMCE_Buttonconfigger';

// HOOK
$GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('TinyMCE_Customizer','replaceRteConfig');

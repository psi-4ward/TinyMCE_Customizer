<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 

/**
 *
 */
$GLOBALS['TinyMCE_Customizer']['plugins'] = array
(
	'TinyMCE' => array
	(
		'buttons'					=> array( 'separator','newdocument','bold','italic','underline','strikethrough','justifyleft',
											  'justifycenter','justifyright','justifyfull','bullist','numlist','outdent',
											  'indent','cut','copy','paste','undo','redo','link','unlink','image',
											  'cleanup','help','code','hr','removeformat','formatselect','fontselect',
											  'fontsizeselect','styleselect','sub','sup','forecolor','backcolor',
											  'forecolorpicker','backcolorpicker','charmap','visualaid','anchor',
											  'blockquote'),
		'forceActive'				=> true,
		'extended_valid_elements'	=> 'q[cite|class|title],article,section,hgroup,figure,figcaption'
	),

	'advhr' => array
	(
		'extended_valid_elements'	=> 'hr[class|width|size|noshade]'
	),

	'advimage' => array
	(
		'extended_valid_elements'	=> 'img[!src|border:0|alt|title|width|height|style]a[name|href|target|title|onclick]'
	),

	'advlink' => array(),

	'advlist' => array(),

	'autolink' => array(),

	'autoresize' => array(),

	'autosave' => array
	(
		'forceActive'				=> true
	),

	'bbcode' => array(),

	'contextmenu' => array(),

	'directionality' => array
	(
		'buttons'					=> array('ltr','rtl'),
	),

	'emotions' => array
	(
		'buttons'					=> array('emotions'),
	),

	'fullscreen' => array
	(
		'buttons'					=> array('fullscreen'),
		'extended_valid_elements'	=> ''
	),

	'inlinepopups' => array(
		'attributes' 				=> array('dialog_type' => 'modal'),
		'forceActive'				=> true
	),

	'layer' => array
	(
		'buttons'					=> array('insertlayer','moveforward','movebackward','absolute')
	),

	'nonbreaking' => array
	(
		'buttons'					=> array('nonbreaking')
	),

	'paste' => array
	(
		'buttons'					=> array('pastetext','pasteword','selectall')
	),

	'save' => array
	(
		'buttons'					=> array('save','cancel'),
		'forceActive'				=> true
	),

	'searchreplace' => array
	(
		'buttons'					=> array('search','replace')
	),

	'spellchecker' => array
	(
		'buttons'					=> array('spellchecker')
	),

	'style' => array
	(
		'buttons'					=> array('styleprops')
		// TODO fill array
	),

	'table' => array
	(
		'buttons'					=> array('tablecontrols','table','row_props','cell_props','delete_col','delete_row',
											 'col_after','col_before','row_after','row_before','split_cells','merge_cells')
	),

	'template' => array
	(
		'buttons'					=> array('template')
		// TODO fill array
	),

	'visualchars' => array
	(
		// TODO fill array
	),

	'xhtmlxtras' => array
	(
		'buttons'					=> array('cite','abbr','acronym','ins','del','attribs'),
		'forceActive'				=> true
		// TODO fill array
	),

	'typolinks' => array
	(
		'buttons'					=> array('typolinks','typobox'),
		// custom images
		'buttonImages'				=> array
		(
			'typolinks'	=> 'assets/tinymce/plugins/typolinks/img/link.gif',
			'typobox'	=> 'assets/tinymce/plugins/typolinks/img/image.gif',
		)
	)

);

// HOOK: Let other extensions alter this array
if (isset($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Pluginconfig']) && is_array($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Pluginconfig']))
{
	foreach ($GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Pluginconfig'] as $callback)
	{
		$this->import($callback[0]);
		$GLOBALS['TinyMCE_Customizer']['plugins'] = $this->$callback[0]->$callback[1]($GLOBALS['TinyMCE_Customizer']['plugins']);
	}
}
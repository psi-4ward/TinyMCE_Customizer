<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!'); ?>


<\?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * This is the tinyMCE (rich text editor) configuration file. Please visit
 * http://tinymce.moxiecode.com for more information.
 *
 * its generated through TinyMCE_Customzier so dont edit it, changes will be overwritten!
 */
if ($GLOBALS['TL_CONFIG']['useRTE']): ?>

<\?php if(!isset($GLOBALS['TL_JAVASCRIPT']['tinyMCE'])): ?>
<script>
tinyMCE_GZ.init({
  plugins : "advimage,autosave,directionality,emotions,inlinepopups,paste,save,searchreplace,spellchecker,style,tabfocus,table,template,typolinks,xhtmlxtras",
  themes : "advanced",
  languages : "<\?php echo $this->language; ?>",
  disk_cache : false,
  debug : false
});
<\?php $GLOBALS['TL_JAVASCRIPT']['tinyMCE'] = 'plugins/tinyMCE/tiny_mce_gzip.js'; ?>

var orgExecCommand = tinyMCE.execCommand;
tinyMCE.execCommand = function(command, ui, value) {
  if (typeof tinySettings[value] !== 'undefined') {
    this.init(tinySettings[value]);
  }
  orgExecCommand.call(this, command, ui, value);
};
</script>
<\?php endif; ?>

<script>
var tinyInit = {
  mode : "none",
  height : "<?php echo (!empty($objCfg->height)) ? $objCfg->height : '300'; ?>",
  language : "<\?php echo $this->language; ?>",
  elements : "<\?php echo $this->rteFields; ?>",
  remove_linebreaks : false,
  force_hex_style_colors : true,
  fix_list_elements : true,
  fix_table_elements : true,
  doctype : '<!DOCTYPE html>',
  element_format : 'html',
  document_base_url : "<\?php echo $this->base; ?>",
  entities : "160,nbsp,60,lt,62,gt,173,shy",
  cleanup_on_startup : true,
  save_enablewhendirty : true,
  save_on_tinymce_forms : true,
  init_instance_callback : "TinyCallback.getScrollOffset",
  advimage_update_dimensions_onchange : false,
  external_image_list_url : "<\?php echo TL_PATH; ?>/plugins/tinyMCE/plugins/typolinks/typoimages.php",
  template_external_list_url : "<\?php echo TL_PATH; ?>/plugins/tinyMCE/plugins/typolinks/typotemplates.php",
  plugins : "<?php echo implode(',',$objCfg->plugins); ?>",
  spellchecker_languages : "<\?php echo $this->getSpellcheckerString(); ?>",
  content_css : "<?php echo implode(',',$objCfg->content_css); ?>",
  event_elements : "a,div,h1,h2,h3,h4,h5,h6,img,p,span",
  extended_valid_elements : "<?php echo implode(',',$objCfg->extended_valid_elements);?>",
  tabfocus_elements : ":prev,:next",
  accessibility_warnings: <?php echo $objCfg->accessibility_warnings ? 'true' : 'false'; ?>,
  object_resizing: <?php echo $objCfg->object_resizing ? 'true' : 'false'; ?>,
  preformatted: <?php echo $objCfg->preformatted ? 'true' : 'false'; ?>,
<?php if($objCfg->directionality): ?>
  directionality: "rtl",
<?php endif; ?>
<?php if(strlen($objCfg->file_browser_callback)): ?>
  file_browser_callback: "customTinyMceFilebrowser<?php echo $this->id;?>",
<?php endif; ?>
<?php if(strlen($objCfg->formats)): ?>
  formats: <?php echo $objCfg->formats;?>,
<?php endif; ?>
<?php if(strlen($objCfg->style_formats)): ?>
	style_formats: <?php echo $objCfg->style_formats;?>,
<?php endif; ?>
<?php if(strlen($objCfg->indentation)): ?>
  indentation: "<?php echo $objCfg->indentation;?>",
<?php endif; ?>
  theme : "advanced",
<?php if(strlen($objCfg->theme_advanced_text_colors)): ?>
  theme_advanced_text_colors: "<?php echo $objCfg->theme_advanced_text_colors;?>",
<?php endif; ?>
<?php if(strlen($objCfg->theme_advanced_background_colors)): ?>
  theme_advanced_background_colors: "<?php echo $objCfg->theme_advanced_background_colors;?>",
<?php endif; ?>
<?php if(strlen($objCfg->theme_advanced_fonts)): ?>
	theme_advanced_fonts : "<?php echo $objCfg->theme_advanced_fonts; ?>",
<?php endif; ?>
<?php if(strlen($objCfg->theme_advanced_font_sizes)): ?>
  theme_advanced_font_sizes : "<?php echo $objCfg->theme_advanced_font_sizes; ?>",
<?php endif; ?>
<?php if(strlen($objCfg->theme_advanced_styles)): ?>
  theme_advanced_styles : "<?php echo $objCfg->theme_advanced_styles; ?>",
<?php endif; ?>
  theme_advanced_more_colors: <?php echo $objCfg->theme_advanced_more_colors ? 'true' : 'false'; ?>,
  theme_advanced_resizing : <?php echo $objCfg->theme_advanced_resizing ? 'true' : 'false'; ?>,
  theme_advanced_resize_horizontal : <?php echo $objCfg->theme_advanced_resize_horizontal ? 'true' : 'false'; ?>,
  theme_advanced_toolbar_location : "top",
  theme_advanced_toolbar_align : "left",
  theme_advanced_source_editor_width : "700",
  theme_advanced_blockformats : "<?php echo implode(',',$objCfg->blockformats); ?>",
<?php for($i=1;$i<=3;$i++): ?>
  theme_advanced_buttons<?php echo $i; ?> : "<?php echo $objCfg->buttons[$i];?>",
<?php endfor; ?>
  theme_advanced_statusbar_location : "<?php echo ($objCfg->theme_advanced_statusbar_location) ? 'bottom' : 'none'; ?>"
};

<?php if(strlen($objCfg->file_browser_callback)): ?>
function customTinyMceFilebrowser<?php echo $this->id;?>(field_name, url, type, win)
{
<?php echo $objCfg->file_browser_javascript; ?>
}
<?php endif; ?>

if (typeof window.tinySettings === 'undefined') {
  //only declare once..
  window.tinySettings = {};
}

<\?php
$arrRteFields = trimsplit(',', $this->rteFields);
foreach($arrRteFields as $strRteField):
?>
window.tinySettings['<\?php echo $strRteField?>'] = Object.merge({}, tinyInit);
<\?php
endforeach;
?>

</script>
<\?php endif; ?>

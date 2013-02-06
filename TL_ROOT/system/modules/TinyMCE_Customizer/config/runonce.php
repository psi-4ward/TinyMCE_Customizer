<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */

// INSERT TinyMCE_Customizer templates to filesystem

$db = \Database::getInstance();
$t1 = $db->executeUncached('SELECT id FROM tl_tinymce_config');
if(!$t1->numRows)
{
	$db->executeUncached("
		INSERT INTO `tl_tinymce_config` (`name`, `alias`, `plugins`, `buttons`, `blockformats`, `formats`, `style_formats`, `content_css`, `height`, `theme_advanced_resizing`, `theme_advanced_resize_horizontal`, `file_browser_callback`, `accessibility_warnings`, `directionality`, `object_resizing`, `extended_valid_elements`, `indentation`, `preformatted`, `theme_advanced_styles`, `theme_advanced_fonts`, `theme_advanced_font_sizes`, `theme_advanced_text_colors`, `theme_advanced_background_colors`, `theme_advanced_more_colors`, `theme_advanced_statusbar_location`, `cleanInput`, `allowedTags`, `id`, `tstamp`, `remove_linebreaks`) VALUES
		('Reduced', 'reduced', 0x613a383a7b693a303b733a383a22616476696d616765223b693a313b733a31313a22636f6e746578746d656e75223b693a323b733a31303a2266756c6c73637265656e223b693a333b733a353a227061737465223b693a343b733a31333a227365617263687265706c616365223b693a353b733a31323a227370656c6c636865636b6572223b693a363b733a31313a2276697375616c6368617273223b693a373b733a393a227479706f6c696e6b73223b7d, 0x613a333a7b693a313b733a3235343a226e6577646f63756d656e742c736176652c736570617261746f722c626f6c642c6974616c69632c756e6465726c696e652c737472696b657468726f7567682c736570617261746f722c6375742c636f70792c70617374652c7061737465746578742c736570617261746f722c6e756d6c6973742c62756c6c6973742c736570617261746f722c696e64656e742c6f757464656e742c736570617261746f722c7479706f6c696e6b732c756e6c696e6b2c736570617261746f722c7374796c6573656c6563742c736570617261746f722c72656d6f7665666f726d61742c636861726d61702c736570617261746f722c636f64652c66756c6c73637265656e223b693a323b733a303a22223b693a333b733a303a22223b7d, 0x613a313a7b693a303b733a303a22223b7d, NULL, NULL, NULL, 300, '1', '1', '', '1', '', '1', '', '', '1', 0x613a313a7b693a303b613a323a7b733a353a227469746c65223b733a303a22223b733a353a22636c617373223b733a303a22223b7d7d, 0x613a313a7b693a303b613a323a7b733a353a227469746c65223b733a303a22223b733a353a22636c617373223b733a303a22223b7d7d, 0x613a313a7b693a303b613a323a7b733a353a227469746c65223b733a303a22223b733a353a22636c617373223b733a303a22223b7d7d, '', '', '1', '1', '', '<p><img><div><span>', 1, 1339417601, ''),
		('Contao Standard', 'contao-standard', 0x613a31303a7b693a303b733a383a22616476696d616765223b693a313b733a31343a22646972656374696f6e616c697479223b693a323b733a383a22656d6f74696f6e73223b693a333b733a353a227061737465223b693a343b733a31333a227365617263687265706c616365223b693a353b733a31323a227370656c6c636865636b6572223b693a363b733a353a227374796c65223b693a373b733a353a227461626c65223b693a383b733a383a2274656d706c617465223b693a393b733a393a227479706f6c696e6b73223b7d, 0x613a333a7b693a313b733a3236303a226e6577646f63756d656e742c736176652c736570617261746f722c7370656c6c636865636b65722c736570617261746f722c616e63686f722c736570617261746f722c7479706f6c696e6b732c756e6c696e6b2c736570617261746f722c696d6167652c7479706f626f782c736570617261746f722c7375622c7375702c736570617261746f722c616262722c736570617261746f722c7374796c6570726f70732c617474726962732c736570617261746f722c7365617263682c7265706c6163652c736570617261746f722c756e646f2c7265646f2c736570617261746f722c72656d6f7665666f726d61742c636c65616e75702c736570617261746f722c636f6465223b693a323b733a3232343a22666f726d617473656c6563742c666f6e7473697a6573656c6563742c7374796c6573656c6563742c736570617261746f722c626f6c642c756e6465726c696e652c6974616c69632c736570617261746f722c6a7573746966796c6566742c6a75737469667963656e7465722c6a75737469667972696768742c6a75737469667966756c6c2c736570617261746f722c62756c6c6973742c6e756d6c6973742c696e64656e742c6f757464656e742c736570617261746f722c626c6f636b71756f74652c736570617261746f722c666f7265636f6c6f722c6261636b636f6c6f72223b693a333b733a37343a227461626c65636f6e74726f6c732c736570617261746f722c74656d706c6174652c736570617261746f722c636861726d61702c656d6f74696f6e732c736570617261746f722c68656c70223b7d, 0x613a31303a7b693a303b733a333a22646976223b693a313b733a313a2270223b693a323b733a373a2261646472657373223b693a333b733a333a22707265223b693a343b733a323a226831223b693a353b733a323a226832223b693a363b733a323a226833223b693a373b733a323a226834223b693a383b733a323a226835223b693a393b733a323a226836223b7d, NULL, NULL, 0x613a313a7b693a303b733a32303a22746c5f66696c65732f74696e796d63652e637373223b7d, 300, '1', '1', '', '1', '', '1', 'q[cite|class|title],article,section,hgroup,figure,figcaption', '', '1', 0x613a313a7b693a303b613a323a7b733a353a227469746c65223b733a303a22223b733a353a22636c617373223b733a303a22223b7d7d, 0x613a313a7b693a303b613a323a7b733a353a227469746c65223b733a303a22223b733a353a22636c617373223b733a303a22223b7d7d, 0x613a31363a7b693a303b613a323a7b733a353a227469746c65223b733a333a22397078223b733a353a22636c617373223b733a333a22397078223b7d693a313b613a323a7b733a353a227469746c65223b733a343a2231307078223b733a353a22636c617373223b733a343a2231307078223b7d693a323b613a323a7b733a353a227469746c65223b733a343a2231317078223b733a353a22636c617373223b733a343a2231317078223b7d693a333b613a323a7b733a353a227469746c65223b733a343a2231327078223b733a353a22636c617373223b733a343a2231327078223b7d693a343b613a323a7b733a353a227469746c65223b733a343a2231337078223b733a353a22636c617373223b733a343a2231337078223b7d693a353b613a323a7b733a353a227469746c65223b733a343a2231347078223b733a353a22636c617373223b733a343a2231347078223b7d693a363b613a323a7b733a353a227469746c65223b733a343a2231357078223b733a353a22636c617373223b733a343a2231357078223b7d693a373b613a323a7b733a353a227469746c65223b733a343a2231367078223b733a353a22636c617373223b733a343a2231367078223b7d693a383b613a323a7b733a353a227469746c65223b733a343a2231377078223b733a353a22636c617373223b733a343a2231377078223b7d693a393b613a323a7b733a353a227469746c65223b733a343a2231387078223b733a353a22636c617373223b733a343a2231387078223b7d693a31303b613a323a7b733a353a227469746c65223b733a343a2231397078223b733a353a22636c617373223b733a343a2231397078223b7d693a31313b613a323a7b733a353a227469746c65223b733a343a2232307078223b733a353a22636c617373223b733a343a2232307078223b7d693a31323b613a323a7b733a353a227469746c65223b733a343a2232317078223b733a353a22636c617373223b733a343a2232317078223b7d693a31333b613a323a7b733a353a227469746c65223b733a343a2232327078223b733a353a22636c617373223b733a343a2232327078223b7d693a31343b613a323a7b733a353a227469746c65223b733a343a2232337078223b733a353a22636c617373223b733a343a2232337078223b7d693a31353b613a323a7b733a353a227469746c65223b733a343a2232347078223b733a353a22636c617373223b733a343a2232347078223b7d7d, '', '', '1', '1', '', NULL, 2, 1339417328, '');
	");

}



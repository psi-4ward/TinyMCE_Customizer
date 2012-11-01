-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

-- 
-- Table `tl_tinymce_config`
-- 

CREATE TABLE `tl_tinymce_config` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `buttons` blob NULL,
  `content_css` blob NULL,
  `blockformats` blob NULL,
  `plugins` blob NULL,
  `formats` text NULL,
  `style_formats` text NULL,
  `theme_advanced_styles` blob NULL,
  `theme_advanced_fonts` blob NULL,
  `theme_advanced_font_sizes` blob NULL,
  `remove_linebreaks` char(1) NOT NULL default '',
  `height` int(4) unsigned NOT NULL default '0',
  `theme_advanced_resizing` char(1) NOT NULL default '1',
  `theme_advanced_resize_horizontal` char(1) NOT NULL default '1',
  `file_browser_callback` varchar(255) NOT NULL default '',
  `accessibility_warnings` char(1) NOT NULL default '1',
  `directionality` char(1) NOT NULL default '',
  `object_resizing` char(1) NOT NULL default '1',
  `extended_valid_elements` varchar(255) NOT NULL default '',
  `theme_advanced_text_colors` varchar(255) NOT NULL default '',
  `theme_advanced_background_colors` varchar(255) NOT NULL default '',
  `indentation` varchar(56) NOT NULL default '',
  `preformatted` char(1) NOT NULL default '1',
  `theme_advanced_more_colors` char(1) NOT NULL default '1',
  `theme_advanced_statusbar_location` char(1) NOT NULL default '1',
  `cleanInput` char(1) NOT NULL default '',
  `allowedTags` text NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table `tl_tinymce_usage`
--

CREATE TABLE `tl_tinymce_usage` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `configId` int(10) unsigned NOT NULL default '0',
  `limitFields` char(1) NOT NULL default '',
  `fields` blob NULL,
  `limitPages` char(1) NOT NULL default '',
  `pages` blob NULL,
  `limitUsers` char(1) NOT NULL default '',
  `users` blob NULL,
  `limitGroups` char(1) NOT NULL default '',
  `groups` blob NULL,
  `limitLayouts` char(1) NOT NULL default '',
  `layouts` blob NULL,
  `published` char(1) NOT NULL default '',
  `onlyTinyMceFields` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

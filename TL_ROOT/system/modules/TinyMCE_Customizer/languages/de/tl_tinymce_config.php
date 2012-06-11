<?php if(!defined('TL_ROOT')) {die('You cannot access this file directly!');
}

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 

 /**
  * Fields
  */
$GLOBALS['TL_LANG']['tl_tinymce_config']['source']								= array('Dateien', 'Wählen Sie die Konfigurationsvorlagen die importiert werden sollen.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['name']								= array('Name', 'Vergeben Sie einen Namen für die Konfiguration.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['plugins']								= array('Plugins', 'Hier können Sie verschiedene TinyMCE Plugins aktivieren.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['blockformats']						= array('Blockformate', 'Tragen Sie hier Blockformate (h1,p,pre) ein.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['content_css']							= array('Content-CSS Datei', 'Hier können Sie CSS-Dateien wählen, die im Editor geladen werden. Falls nicht anderweitig definiert werden die Klassen im Styles-Dropdown dargestellt.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['height']								= array('Höhe', 'Hier kann die Ausgangshöhe des Editorfenster festgelegt werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_resizing']				= array('Variable Größe', 'Der Editor erlaubt eine Größenänderung des Eingabefensters.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_resize_horizontal']	= array('Horizontale Größenänderung zulassen', 'Wird eine Größenänderung erlaubt kann über diese Option eine Beschränkung auf vertikale Ausdehnung erreicht werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['file_browser_callback']				= array('Dateibrowser', 'Hier kann ein Dateibrowser gewählt werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['accessibility_warnings']				= array('Barrierefehler anzeigen', 'Der Editor zeigt Fehlermeldungen bezüglich der Barrierefreiheit an.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['directionality']						= array('Schreibrichtung RTL', 'Stellt die Schreibrichtung auf "rechts nach links" ein.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['object_resizing']						= array('Größenänderungselemente anzeigen', 'Zeigt Elemente zur Größenänderung von Tabellen oder Bilder an.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['extended_valid_elements']				= array('Zusätzliche gültige Elemente', 'Hier kann eine kommaseparierte Liste mit weiteren gültigen HTML-Elementen angegeben werden. Bsp: blockquote,img[class|src|border=0|alt|title]');
$GLOBALS['TL_LANG']['tl_tinymce_config']['formats']								= array('Eigene Formatierungen', 'Hier kann das Verhalten der TinyMCE Formatengine beeinflusst werden, siehe: http://www.tinymce.com/wiki.php/Configuration:formats');
$GLOBALS['TL_LANG']['tl_tinymce_config']['style_formats']						= array('Eigene Style-Formatierungen', 'Hier kann das Verhalten des Style DropDowns beeinflusst werden, siehe: http://www.tinymce.com/wiki.php/Configuration:style_formats');
$GLOBALS['TL_LANG']['tl_tinymce_config']['indentation']							= array('Einrückungstiefe', 'Legt den Wert für die Einrücktiefe der <i>eindrücken</i>-Buttons fest. Bsp.: 20px');
$GLOBALS['TL_LANG']['tl_tinymce_config']['preformatted']						= array('Erhalte Leerzeichen/Tabs', 'Ist dies Option aktiviert, verhält sich der Inhalt als wäre er in einem &lsaquo;pre&rsaquo;-Tag.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_styles']				= array('Style-Dropdown', 'Diese Werte werden im Style-Dropdown angezeigt, falls keine hinterlegt werden, werden die Klassen der content_css Datei extrahiert.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_fonts']				= array('Schriftarten', 'Hier können font-family Werte angebeben werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_font_sizes'] 			= array('Schriftgrößen', 'Über diese Option werden die Optionen des Schriftgrößen Drop-Downs erzeugt. <i>value</i> kann dabei ein Wert wie 30px oder 12pt sein aber auch ein Klassenname wie ".kleineSchrift"');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_text_colors'] 			= array('Schriffarben', 'Hier können Sie die Liste der Schriftfarbe beinflussen: Bsp.: FF00FF,FFFF00,00000');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_background_colors'] 	= array('Hintergrundfarben', 'Hier können Sie die Liste der Hintergrundfarben beinflussen: Bsp.: FF00FF,FFFF00,00000');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_more_colors'] 			= array('Mehr-Farben Button', 'Hier kann der Knopf für weiter Farben aktiviert werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['theme_advanced_statusbar_location'] 	= array('Statusbar anzeigen', 'Hier kann die Statusbar aktiviert werden.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['cleanInput'] 							= array('HTML Filterung', 'Wenn aktiviert, werden <b>serverseitig</b> alle nicht-erlaubten HTML-Tags gefiltert.');
$GLOBALS['TL_LANG']['tl_tinymce_config']['allowedTags'] 						= array('Erlaubte Tags', 'Hier können Sie eine Liste aller erlaubten Tags eingeben. Bsp.: &lsaquo;a&rsaquo;&lsaquo;img&rsaquo;&lsaquo;p&rsaquo;');

 
 /**
  * Buttons
  */
$GLOBALS['TL_LANG']['tl_tinymce_config']['new']				= array('Neue Konfiguration', 'Erstellen Sie eine neue Konfiguration');
$GLOBALS['TL_LANG']['tl_tinymce_config']['edit']			= array('Konfiguration bearbeiten', 'Konfiguration ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_tinymce_config']['copy']			= array('Konfiguration kopieren', 'Konfiguration ID %s kopieren');
$GLOBALS['TL_LANG']['tl_tinymce_config']['delete']			= array('Konfiguration löschen', 'Konfiguration ID %s löschen');
$GLOBALS['TL_LANG']['tl_tinymce_config']['show']			= array('Konfigurationendetails', 'Details der Konfiguration ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_tinymce_config']['usage']			= array('Verwendung', 'Verwendungen Konfiguration ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_tinymce_config']['import']			= array('Import', 'Konfiguration importieren');
$GLOBALS['TL_LANG']['tl_tinymce_config']['export']			= array('Konfiguration exportieren', 'Exportiert die Konfiguration ID %s');
$GLOBALS['TL_LANG']['tl_tinymce_config']['help']			= array('Hilfe', 'TinyMCE Customizer Manual');

 
 /**
  * Legends
  */
$GLOBALS['TL_LANG']['tl_tinymce_config']['name_legend']				= 'Name';
$GLOBALS['TL_LANG']['tl_tinymce_config']['plugins_legend']			= 'Plugins';
$GLOBALS['TL_LANG']['tl_tinymce_config']['buttons_legend']			= 'Buttons';
$GLOBALS['TL_LANG']['tl_tinymce_config']['format_legend']			= 'Formatelemente';
$GLOBALS['TL_LANG']['tl_tinymce_config']['css_legend']				= 'CSSE-instellungen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['editor_options_legend']	= 'Editor-Einstellungen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['cleanup_legend']			= 'Validierungen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['font_legend']				= 'Schrift-Einstellungen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['expert_legend']			= 'Experten-Einstellungen';


/**
 * Plugin Reference
 */
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['advhr']			= 'Horinzontale Linie <p class="tl_help tl_tip" style="margin-bottom: 10px;">Dieses Plugin erstellt einen Button um eine horinzontale Linie einzufügen.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['advimage']			= 'Bilder <p class="tl_help tl_tip" style="margin-bottom: 10px;">Stellt den Dialog zum einfügen und verwalten von Bildern bereit.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['advlink']			= 'Links <p class="tl_help tl_tip" style="margin-bottom: 10px;">Stellt den TinyMCE-Dialog zur Bearbeitung von Links bereit.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['advlist']			= 'Listen (ul,ol) <p class="tl_help tl_tip" style="margin-bottom: 10px;">Verwaltet geordnete und ungeordnete Listen.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['autolink']			= 'Autolink <p class="tl_help tl_tip" style="margin-bottom: 10px;">Wandelt URLs automatisch in Links um</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['autoresize']		= 'Autogröße <p class="tl_help tl_tip" style="margin-bottom: 10px;">Vergrößert den Editor automatisch wenn der Inhalt länger wird.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['bbcode']			= 'BBCode <p class="tl_help tl_tip" style="margin-bottom: 10px;">Unterstützung für BB-Codes.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['contextmenu']		= 'Kontextmenü <p class="tl_help tl_tip" style="margin-bottom: 10px;">Stellt einige Funktionen in einem Kontextmenü dar.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['directionality']	= 'Schreibrichtung <p class="tl_help tl_tip" style="margin-bottom: 10px;">Fügt Buttons zur Konfiguration der Schreibrichtung ein.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['emotions']			= 'Smilies <p class="tl_help tl_tip" style="margin-bottom: 10px;">Dieses Plugin fügt Smilies in den Inhalt ein.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['fullscreen']		= 'Vollbild <p class="tl_help tl_tip" style="margin-bottom: 10px;">Bereitstellung des Vollbild-Bearbeiten Modus.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['layer']			= 'Layer <p class="tl_help tl_tip" style="margin-bottom: 10px;">Generiert und Verwaltet Layer (DIV-Container).</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['nonbreaking']		= 'Geschützte Leerzeichen <p class="tl_help tl_tip" style="margin-bottom: 10px;">Stellt einen Button zum Einfügen eines geschützten Leerzeichens bereit.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['paste']			= 'Einfügen <p class="tl_help tl_tip" style="margin-bottom: 10px;">Stellt Buttons zum einfügen von Plaintext und MS-Word bereit.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['searchreplace']	= 'Suchen & Ersetzen <p class="tl_help tl_tip" style="margin-bottom: 10px;">Dieses Plugin ermöglicht ein Suchen&Ersetzen.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['spellchecker']		= 'Rechtschreibprüfung <p class="tl_help tl_tip" style="margin-bottom: 10px;">Unterüstzung für eine Rechtschreibprüfung.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['style']			= 'Formatvorlagen <p class="tl_help tl_tip" style="margin-bottom: 10px;">Einbinden von Vorlagen.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['table']			= 'Tabellen <p class="tl_help tl_tip" style="margin-bottom: 10px;">Dieses Plugin stellt Optionen zur Tabellenbearbeitung bereit.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['template']			= 'Templates <p class="tl_help tl_tip" style="margin-bottom: 10px;">Hiermit können vordefinierte Templates als Bausteine eingefügt werden.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['visualchars']		= 'Zeichentabelle <p class="tl_help tl_tip" style="margin-bottom: 10px;">Auswahl von Sonderzeichen anhand einer Auflistung.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['typolinks']		= 'Contao-Links <p class="tl_help tl_tip" style="margin-bottom: 10px;">Fügt das Contao Link-Plugin ein.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['fullscreen']		= 'Vollbild <p class="tl_help tl_tip" style="margin-bottom: 10px;">Ermöglicht die Bearbeitung im Vollbildmodus.</p>';
$GLOBALS['TL_LANG']['tl_tinymce_config']['PluginReference']['contextmenu']		= 'Kontextmenü <p class="tl_help tl_tip" style="margin-bottom: 10px;">Es können Optionen anhand eines Kontextmenüs aufgerufen werden.</p>';

/**
 * Button Reference
 */
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['abbr'] 			= 'Abkürzung';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['absolute'] 		= 'Absolute Positionierung';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['acronym'] 			= 'Akronym';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['anchor'] 			= 'Anker';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['attribs'] 			= 'Eigenschaften';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['backcolor'] 		= 'Hintergrundfarbe';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['backcolorpicker'] 	= 'Hintergrundfarbe Wähler';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['blockquote'] 		= 'Blockzitat';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['bold'] 			= 'Fett';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['bullist'] 			= 'Ungeordnete Aufzählung';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['cancle'] 			= 'Abbrechen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['cell_props'] 		= 'Zelleneigenschaften';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['charmap'] 			= 'Zeichentabelle';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['cite'] 			= 'Zitat';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['cleanup'] 			= 'Aufräumen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['code'] 			= 'HTML-Code';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['col_after'] 		= 'Spalte danach einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['col_before'] 		= 'Spalte vorher einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['copy'] 			= 'kopieren';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['cut'] 				= 'ausschneiden';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['del']		 		= 'löschen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['delete_col'] 		= 'Spalte löschen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['delete_row'] 		= 'Zeile löschen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['emotions'] 		= 'Smilies';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['fontselect'] 		= 'Schriftart';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['fontsizeselect'] 	= 'Schriftgröße';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['forecolor'] 		= 'Farbe';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['forecolorpicker'] 	= 'Farbe Wähler';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['formatselect'] 	= 'Formatierungen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['fullscreen'] 		= 'Vollbild';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['help'] 			= 'Hilfe';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['hr'] 				= 'Horizontale Linie';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['image'] 			= 'Bild';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['indent'] 			= 'Einrücken';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['ins'] 				= 'Eingefügter Text';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['insertlayer'] 		= 'Layer einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['inserttime'] 		= 'Zeit einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['italic'] 			= 'kursiv';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['justifycenter'] 	= 'mittig ausrichten';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['justifyfull'] 		= 'Blocksatz';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['justifyleft'] 		= 'links ausrichten';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['justifyright']		= 'rechts  ausrichten';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['link'] 			= 'Link einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['ltr'] 				= 'Schreibrichtung LTR';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['media']	 		= 'Multimediaelement einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['merge_cells'] 		= 'Zellen zusammenführen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['movebackward'] 	= 'nach hinten';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['moveforward'] 		= 'nach vorne';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['nonbreaking'] 		= 'gschütztes Leerzeichen einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['numlist'] 			= 'Nummerierte Liste';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['outdent'] 			= 'ausrücken';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['pagebreak'] 		= 'Seitenumbruch einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['paste'] 			= 'einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['pastetext'] 		= 'als Plaintext einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['pasteword'] 		= 'von Word einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['print'] 			= 'drucken';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['redo'] 			= 'wiederherstellen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['removeformat'] 	= 'Formatierungen entfernen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['replace'] 			= 'ersetzen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['row_after'] 		= 'Zeile danach einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['row_before'] 		= 'Zeile davor einfügen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['row_props'] 		= 'Zeileneigenschaften';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['rtl'] 				= 'Schreibrichtung RTL';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['save'] 			= 'speichern';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['search'] 			= 'suchen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['selectall'] 		= 'alles Markieren';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['separator'] 		= 'Trenner';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['split_cells'] 		= 'Zellen teilen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['strikethrough'] 	= 'durchgestrichen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['styleprops'] 		= 'Styleeigenschaften';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['styleselect'] 		= 'Style-Wähler';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['sub'] 				= 'tiefgestellt';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['sup'] 				= 'hochgestellt';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['table'] 			= 'Tabelle';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['tablecontrols'] 	= 'Tabellenbuttons';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['template'] 		= 'Vorlagen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['underline'] 		= 'unterstrichen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['undo'] 			= 'rückgängig';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['unlink'] 			= 'Link entfernen';
$GLOBALS['TL_LANG']['tl_tinymce_config']['ButtonReference']['visualaid'] 		= 'visuelle Hilfsmittel';

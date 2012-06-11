TinyMCE_Customizer - Entwicklerdokumentation
============================================

Hinzufügen eines eigenen Plugins
--------------------------------
**Callback: TinyMCE_Customizer_Pluginconfig**

Registrierung in einer `config.php`
```php
<?php
$GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Pluginconfig'][] = array('MyTinyMCEPlugin','registerPlugin');
```

Callback Methode
```php
class MyTinyMCEPlugin
{
	public function registerPlugin($arrPlugins)
	{
		$arrPlugins['myNewPlugin'] = array
		(
			'buttons'					=> array('button1','button2'),
			'buttonImages'				=> array
			(
				'contaolinks'	=> 'plugins/tinyMCE/plugins/myNewPlugin/img/button1.gif',
				'contaobox'		=> 'plugins/tinyMCE/plugins/myNewPlugin/img/button2.gif',
			)
		);

		return $arrPlugins;
	}
}
```

Hinzufügen von content_css Dateien
----------------------------------
**Callback: TinyMCE_Customizer_ContentCSS**

Registrierung in einer `config.php`
```php
<?php
$GLOBALS['TL_HOOKS']['TinyMCE_Customizer_ContentCSS'][] = array('MyTinyMCEPlugin','addContentCSS');
```

Callback Methode
```php
<?php
class MyTinyMCEPlugin
{
	public function addContentCSS($arrFiles,DataContainer $dc)
	{
		$arrFiles[] = '/path/to/content.css';
		return $arrFiles;
	}
}
```

Hinzufügen eines Filebrowsers
----------------------------------
**Callback: TinyMCE_Customizer_Filebrowser**

Registrierung in einer `config.php`
```php
<?php
$GLOBALS['TL_HOOKS']['TinyMCE_Customizer_Filebrowser'][] = array('MyTinyMCEPlugin','addFilerbrowser');
```

Callback Methode
```php
<?php
class MyTinyMCEPlugin
{
	public function addFilerbrowser($arrFilebrowsers,DataContainer $dc)
	{
		$arrFilebrowsers['myCoolFilebrowser'] = array
		(
			'label' 		=> 'My cool Filebrowser',
			'javascript'	=> 'some javascript to run the filebrowser, it gets automatically wrapped in a function myFileBrowser(field_name, url, type, win) { ..."
		);
		return $arrFilebrowsers;
	}
}
```

Wichtig dabei ist ein Array-Key zur Identifizierung des Filebrowsers.
Der Javascript-Code wird automatisch in eine funktion mit den Parametern `(field_name, url, type, win)` verschachtelt.
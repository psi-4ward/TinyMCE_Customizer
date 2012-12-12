<?php

/**
 * @copyright 4ward.media 2012 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
\ClassLoader::addNamespace('Psi');

\ClassLoader::addClasses(array(
	'Psi\TinyMCE_Customizer\TinyMCE_Customizer' 			=> 'system/modules/TinyMCE_Customizer/TinyMCE_Customizer.php',
	'Psi\TinyMCE_Customizer\WidgetTinyMCE_Buttonconfigger' 	=> 'system/modules/TinyMCE_Customizer/WidgetTinyMCE_Buttonconfigger.php',
));


// Register the templates
TemplateLoader::addFiles(array
(
	'be_widget_TinyMCE_Buttonconfigger' 					=> 'system/modules/TinyMCE_Customizer/templates',
));

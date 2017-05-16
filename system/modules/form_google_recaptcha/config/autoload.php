<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormGoogleRecaptcha' 		=> 'system/modules/form_google_recaptcha/FormGoogleRecaptcha.php',
	'GoogleRecaptcha'        	=> 'system/modules/form_google_recaptcha/GoogleRecaptcha.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'form_google_recaptcha' => 'system/modules/form_google_recaptcha/templates',
));

<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) Leo Feyer
 * 
 * @copyright	Tim Gatzky 2025
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		form_google_recaptcha
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

 // path relative from composer directory
$path = \Contao\System::getContainer()->getParameter('kernel.project_dir').'/vendor/composer/../../system/modules/form_google_recaptcha';


/**
 * Register the classes
 */
$classMap = array
(
	'FormGoogleRecaptcha' 		=> $path.'/classes/FormGoogleRecaptcha.php'
);
$loader = new \Composer\Autoload\ClassLoader();
$loader->addClassMap($classMap);
$loader->register();


/**
 * Register the templates
 */
\Contao\TemplateLoader::addFiles(array
(
	'form_google_recaptcha' => 'system/modules/form_google_recaptcha/templates',
));

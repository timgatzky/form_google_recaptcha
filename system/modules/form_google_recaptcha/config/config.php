<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2017
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		form_google_recaptcha
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

 use Contao\CoreBundle\ContaoCoreBundle;
 use Contao\System;
 
 if( version_compare(ContaoCoreBundle::getVersion(),'5.0','>=') )
 {
	 $rootDir = System::getContainer()->getParameter('kernel.project_dir');
	 include( $rootDir.'/system/modules/form_google_recaptcha/config/autoload.php' );
 }

/**
 * Front end form fields
 */
$GLOBALS['TL_FFL']['google_recaptcha'] 			= 'FormGoogleRecaptcha';
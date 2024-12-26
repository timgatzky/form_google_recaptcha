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

/**
 * Config
 */
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('tl_form_field_form_google_recaptcha', 'modifyDca');


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['google_recaptcha'] = '{type_legend},type,label,slabel;{fconfig_legend},placeholder,text;{expert_legend:hide},class;{template_legend:hide},customTpl;';


/**
 * Class file
 * tl_form_field_form_google_recaptcha
 */
class tl_form_field_form_google_recaptcha
{
	/**
	 * Modify the dca
	 * @param object
	 */
	public function modifyDca($objDC)
	{
		if($objDC->activeRecord === null)
		{
			$objDC->activeRecord = \Contao\Database::getInstance()->prepare("SELECT * FROM ".$objDC->table." WHERE id=?")->limit(1)->execute($objDC->id);
		}
		
		if( !in_array( $objDC->activeRecord->type, array('google_recaptcha') ) )
		{
			return;
		}
		
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['placeholder']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['google_recaptcha_placeholder'];
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['placeholder']['eval']['mandatory'] = true;
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['placeholder']['eval']['tl_class'] = 'long';
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['text']['label'] = &$GLOBALS['TL_LANG']['tl_form_field']['google_recaptcha_slabel'];
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['text']['inputType'] = 'text';
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['text']['eval'] = array('mandatory'=>true);
		$GLOBALS['TL_DCA'][$objDC->table]['fields']['text']['eval']['tl_class'] = 'long';
	}
}
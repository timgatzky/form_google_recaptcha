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
 * Class file
 * FormGoogleRecaptcha
 */
class FormGoogleRecaptcha extends \Widget
{
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_google_recaptcha';
	
	/**
	 * The CSS class prefix
	 *
	 * @var string
	 */
	protected $strPrefix = 'widget widget-google-recaptcha';
	
	
	/**
	 * Initialize the object
	 * @param array $arrAttributes An optional attributes array
	 */
	public function __construct($arrAttributes=null)
	{
		parent::__construct($arrAttributes);
		
		$this->sitekey = trim($this->placeholder);
		$this->secretkey = trim($this->text);
		$this->class = $this->strPrefix.' '.$this->class;
		if($this->type == 'google_recaptcha_hidden')
		{
			$this->hidden = true;
			
			$objForm = \FormModel::findByPk($this->pid);
			$this->formID = 'f'.$objForm->id;
			
			if($objForm->attributes)
			{
				$arrCssID = deserialize($objForm->attributes);
				if(strlen($arrCssID[0]) > 1)
				{
					$this->formID = $arrCssID[0];
				}
			}
			
		}
	}


	/**
	 * Validate the captcha
	 */
	public function validate()
	{
		$arrParams = array
		(
			'secret'	=> $this->secretkey,
			'response' 	=> \Input::post('g-recaptcha-response'),
		);
		
		$strOutput = file_get_contents('https://www.google.com/recaptcha/api/siteverify?'.http_build_query($arrParams)); 
		
		if(empty($strOutput))
		{
			$this->class = 'error';
			$this->addError($GLOBALS['TL_LANG']['ERR']['GOOGLE_RECAPTCHA']['couldNotBeVarified']);
			return null;
		}
		
		$arrResponse = json_decode($strOutput,true);
		
		if((boolean)$arrResponse['success'] === false)
		{
			$this->class = 'error';
			$this->addError($GLOBALS['TL_LANG']['ERR']['GOOGLE_RECAPTCHA']['noSuccess']);
			
			// add google error codes
			if(is_array($arrResponse['error-codes']) && count($arrResponse['error-codes']) > 0)
			{
				foreach($arrResponse['error-codes'] as $error)
				{
					$this->addError($error);
				}
			}
		}
	}

	
	/**
	 * @inheritdoc
	 */
	public function generate() {return parent::generate();}
}
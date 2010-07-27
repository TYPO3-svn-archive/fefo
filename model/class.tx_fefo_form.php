<?php

require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/group.php';
require_once 'HTML/QuickForm/advmultiselect.php';

require_once PATH_t3lib . 'class.t3lib_basicfilefunc.php';

class tx_fefo_form extends HTML_QuickForm implements tx_pttools_iSettableByArray {
	
	protected $formName;
	protected $prefix;
	protected $object;
	protected $formDefinition;
	protected $renderer;
	
	protected $onValidated;
	protected $onNotValidated;
	protected $onCancel;
	protected $onValidatedConf;
	protected $onNotValidatedConf;
	protected $onCancelConf;
	
	protected $cancelButton;
	protected $fileNameUserFunc;
	public static $ignoreTokens = false;
	
	protected $method='post';
	protected $action='';
	protected $target='';
	protected $attributes = array();
	protected $trackSubmit = false;

	/**
	 * Set properties from array
	 * 
	 * @param array data
	 * @return void
	 */
	public function setPropertiesFromArray(array $dataArray) {
		// stdWrap'able properties:
		$stdWrapProperties = array(
			'formname', 'prefix', 'method', 'action', 'target'
		);
		foreach ($stdWrapProperties as $item) {
			if (isset($dataArray[$item]) || isset($dataArray[$item.'.'])) {
				$this->$item = $GLOBALS['TSFE']->cObj->stdWrap($dataArray[$item], $dataArray[$item.'.']);
			}	
		}		
		
		if (isset($dataArray['formDefinition.'])) {
			$this->formDefinition = new tx_fefo_formDefinition();
			$this->formDefinition->setPropertiesFromArray($dataArray['formDefinition.']);
		}
	}
	
	/**
	 * Construct quickform (parent)
	 * 
	 * @return void
	 */
	public function constructQuickform() {
		parent::HTML_QuickForm(
			$this->formName, 
			$this->method, 
			$this->action, 
			$this->target, 
			$this->attributes, 
			$this->trackSubmit
		);
	}
	
}

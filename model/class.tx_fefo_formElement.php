<?php

class tx_fefo_formElement implements tx_pttools_iSettableByArray {
	
	protected $property;
	protected $altLabel;
	protected $specialtype;
	protected $content;
	protected $comment;
	protected $altType;
	
	protected $rules = array();
	protected $attributes = array();
	
	public function setPropertiesFromArray(array $dataArray) {
		// stdWrap'able properties:
		$stdWrapProperties = array(
			'property', 'altLabel', 'specialType', 'content', 'comment', 'altType'
		);
		foreach ($stdWrapProperties as $item) {
			if (isset($dataArray[$item]) || isset($dataArray[$item.'.'])) {
				$this->$item = $GLOBALS['TSFE']->cObj->stdWrap($dataArray[$item], $dataArray[$item.'.']);
			}	
		}
	}
	
}
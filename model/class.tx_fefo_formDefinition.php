<?php

class tx_fefo_formDefinition implements tx_pttools_iSettableByArray {
	
	/**
	 * @var tx_fefo_elementCollection
	 */
	protected $elementCollection;
	
	/**
	 * Constructor
	 */
	public function __construct() {
		$this->elementCollection = new tx_fefo_formElementCollection();
	}
	
	/**
     * Set the object's properties by passing an array to it 
     * 
     * @param   array	array of properties ('propertyName' => 'propertyValue');
     * @return  void
     * @author	Fabrizio Branca <mail@fabrizio-branca.de>
     * @since	2009-01-22
     */
    public function setPropertiesFromArray(array $dataArray) {
    	$sortedKeys = t3lib_TStemplate::sortedKeyList($dataArray, true);
    	if ($sortedKeys === array(0 => 0)) {
    		throw new tx_pttools_exception('Empty sorted key list');
    	}
		foreach ($sortedKeys as $tsKey) {
			$elementDataArray = $dataArray[$tsKey.'.'];
			tx_pttools_assert::isNotEmptyArray($elementDataArray, array('message' => sprintf('Element configuration for key "%s" is empty', $tsKey)));
			$element = new tx_fefo_formElement();
			$element->setPropertiesFromArray($elementDataArray);
			$this->elementCollection->addItem($element, $tsKey);		
		}
    }
    
	
}
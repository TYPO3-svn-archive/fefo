<?php

class tx_fefo_formElementCollection extends tx_pttools_objectCollection {
	
	/**
     * @var 	string	if set, added objects will be type checked against this classname - this property should be set by your inheriting class if want to check the object type when adding an item
     */
    protected $restrictedClassName = 'tx_fefo_formElement';
	
}
<?php

if (!defined ('TYPO3_MODE')) { die ('Access denied.'); }



t3lib_div::loadTCA('tt_content');

/**
 * Parsing the array defined in the ext_localconf.php file
 */
foreach ($GLOBALS[$_EXTKEY.'_controllerArray'] as $prefix => $configuration) {
	
	// remove some unused fields
	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.$prefix] = 'layout,select_key,pages,recursive';
	
	// Adds an entry to the list of plugins in content elements of type "Insert plugin"
	t3lib_extMgm::addPlugin(
		array(
			'LLL:EXT:'.$_EXTKEY.'/locallang_db.xml:tt_content.list_type'.$prefix, 
			$_EXTKEY.$prefix,
			$configuration['pluginIcon']
		),
		'list_type'
	);
	
	// Include flexform
	if ($configuration['includeFlexform']) {
		$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.$prefix] = 'pi_flexform';
		t3lib_extMgm::addPiFlexFormValue($_EXTKEY.$prefix, 'FILE:EXT:'.$_EXTKEY.'/controller/flexform'.$prefix.'.xml');
	}
	
	// Include wizard
	/*
	if (TYPO3_MODE == 'BE') {
	    $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_test_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_test_pi1_wizicon.php';
	}
	*/
	
}

?>
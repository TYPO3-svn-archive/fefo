<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Fabrizio Branca <typo3@fabrizio-branca.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once PATH_t3lib . 'error/class.t3lib_error_exception.php';

/**
 * Plugin 'Form' for the 'fefo' extension.
 *
 * @author		Fabrizio Branca <typo3@fabrizio-branca.de>
 * @package		fefo
 * @subpackage	tx_fefo_controller
 */
class tx_fefo_controller_form extends tx_ptmvc_controllerFrontend {

	/**
	 * Default action
	 * 
	 * @return string HTML output
	 */
	public function defaultAction() {
		
		tx_pttools_assert::isNotEmptyArray($this->conf['formDefinition.'], array('message' => 'No formdefinition found.'));
		
		$form = new tx_fefo_form();
		$form->setPropertiesFromArray($this->conf);

		return 'Hello form';	
	}

}

?>
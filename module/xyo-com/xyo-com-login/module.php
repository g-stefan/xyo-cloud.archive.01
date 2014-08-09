<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_com_Login";

class xyo_com_Login extends xyo_mod_Application {

    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
    }

	function eFormAction($request=null){
		$this->eRequestUri($this->xyo_array_merge_ex_(
				$this->moduleFromRequestDirect($this->popRequest($this->getRequestDirect()))
				,$request));		
	}

	function eFormRequest($request=null){
		$this->eFormBuildRequest($this->xyo_array_merge_ex_(
				$this->moduleFromRequestDirect($this->popRequest($this->getRequestDirect()))
				,$request));
	}
}

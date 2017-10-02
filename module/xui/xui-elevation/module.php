<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_Elevation";

class xui_Elevation extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Elevation")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}
	}

	function elevationCss($value){
		if($value==0){
			return "\tbox-shadow:none;\r\n";
		};
		return "\tbox-shadow: 0px 0px ".floor($value/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($value/4)."px ".$value."px ".$value."px 0px rgba(0, 0, 0, 0.12), ".floor($value/8)."px ".floor($value/4)."px ".$value."px 0px rgba(0, 0, 0, 0.14);\r\n";
	}

	function eElevationCss($value){
		echo $this->elevationCss($value);
	}
}

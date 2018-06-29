<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

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

	function elevationCss($level){
		if($level==0){
			return "\tbox-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0);\r\n";
		};
		return "\tbox-shadow: 0px 0px ".floor($level/4)."px 0px rgba(0, 0, 0, 0.2), ".floor($level/4)."px ".$level."px ".$level."px 0px rgba(0, 0, 0, 0.12), ".floor($level/8)."px ".floor($level/4)."px ".$level."px 0px rgba(0, 0, 0, 0.14);\r\n";
	}

	function eElevationCss($level){
		echo $this->elevationCss($level);
	}
}

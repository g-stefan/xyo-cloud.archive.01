<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_FormTextarea";

class xui_FormTextarea extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_FormTextarea")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}
	}

}
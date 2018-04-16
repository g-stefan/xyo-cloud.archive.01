<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xui_FormTextIconLeftRequired";

class xui_FormTextIconLeftRequired extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_FormTextIconLeftRequired")) {
			$this->setHtmlCss($this->requestUriThis(array(
				"ajax"=>1,
				"action"=>"css"
			)));
        	}
	}

}

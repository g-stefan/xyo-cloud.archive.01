<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_FormTextareaMaterial";

class xui_FormTextareaMaterial extends xyo_Module {
	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_FormTextareaMaterial")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-form-textarea-material.css");
			$this->setHtmlJs($this->site."lib/xui/js/xui-form-textarea-material.js");
        	}
	}
}

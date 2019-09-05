<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_FormSelect";

class xui_FormSelect extends xyo_Module {
	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_FormSelect")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-form-select.css");
			$this->setHtmlJs($this->site."lib/xui/js/xui-form-select.js");
        	}
	}
}

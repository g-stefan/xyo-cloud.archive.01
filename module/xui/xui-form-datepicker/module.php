<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_FormDatepicker";

class xui_FormDatepicker extends xyo_Module {
	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_FormDatepicker")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-form-datepicker.css");
        	}
	}
}

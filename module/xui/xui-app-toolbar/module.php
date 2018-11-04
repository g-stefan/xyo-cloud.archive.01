<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_AppToolbar";

class xui_AppToolbar extends xyo_Module {
	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_AppToolbar")) {
			$this->setHtmlCss($this->site."lib/xui/css/xui-app-toolbar.css");
			$this->setHtmlJs($this->site."lib/xui/js/xui-app-toolbar.js");
        	}
	}
}

<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_Select2";

class lib_Select2 extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("lib_Select2")) {
			$this->setHtmlCss($this->site."lib/select2/css/select2.min.css");
			$this->setHtmlJs($this->site."lib/select2/js/select2.full.min.js");
        	}
	}

}

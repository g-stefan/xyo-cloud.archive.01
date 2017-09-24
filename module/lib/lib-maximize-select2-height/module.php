<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_MaximizeSelect2Height";

class lib_MaximizeSelect2Height extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("lib_MaximizeSelect2Height")) {
			$this->setHtmlJs($this->site."lib/maximize-select2-height/js/maximize-select2-height.min.js");
        	}
	}

}

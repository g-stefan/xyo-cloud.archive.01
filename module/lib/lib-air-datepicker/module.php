<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_AirDatePicker";

class lib_AirDatePicker extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("lib_AirDatePicker")) {
			$this->setHtmlCss($this->site."lib/air-datepicker/css/datepicker.min.css");
			$this->setHtmlJs($this->site."lib/air-datepicker/js/datepicker.min.js");
			$this->setHtmlJs($this->site."lib/air-datepicker/js/i18n/datepicker.en.js");
        	}
	}

}

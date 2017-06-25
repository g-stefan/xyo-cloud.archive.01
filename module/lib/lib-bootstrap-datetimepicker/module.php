<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_BootstrapDateTimePicker";

class lib_BootstrapDateTimePicker extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_BootstrapDateTimePicker")) {
		$this->setHtmlCss($this->site."lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css");
		$this->setHtmlJs($this->site."lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js");
        }
    }

}

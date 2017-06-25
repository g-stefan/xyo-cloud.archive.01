<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_BootstrapSelect";

class lib_BootstrapSelect extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_BootstrapSelect")) {
		$this->setHtmlCss($this->site."lib/bootstrap-select/css/bootstrap-select.min.css");
		$this->setHtmlJs($this->site."lib/bootstrap-select/js/bootstrap-select.min.js");
		$this->setHtmlJs($this->site."lib/bootstrap-select/js/bootstrap-select.init.js");
        }
    }

}

<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_BootstrapBackToTop";

class lib_BootstrapBackToTop extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_BootstrapBackToTop")) {
		$this->setHtmlCss($this->site."lib/bootstrap-back-to-top/css/bootstrap-back-to-top.css");
		$this->setHtmlJs($this->site."lib/bootstrap-back-to-top/js/bootstrap-back-to-top.js");
        }
    }

}

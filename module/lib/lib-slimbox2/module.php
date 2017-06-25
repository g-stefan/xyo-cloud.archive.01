<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_Slimbox2";

class lib_Slimbox2 extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_Slimbox2")) {
		$this->setHtmlCss($this->site."lib/slimbox2/css/slimbox2.css");
		$this->setHtmlJs($this->site."lib/slimbox2/js/slimbox2.js");
        }
    }

}

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_NvD3";

class lib_NvD3 extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_NvD3")) {
		$this->setHtmlCss($this->site."lib/nvd3/css/nv.d3.min.css");
		$this->setHtmlJs($this->site."lib/nvd3/js/nv.d3.min.js");
        }
    }

}

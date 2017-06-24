<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_FontAwesome";

class lib_mod_FontAwesome extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_FontAwesome")) {
		$this->setHtmlCss($this->site."media/lib/font-awesome/css/font-awesome.min.css");
        }
    }
}

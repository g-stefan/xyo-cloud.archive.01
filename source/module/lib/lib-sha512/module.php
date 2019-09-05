<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "lib_Sha512";

class lib_Sha512 extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_Sha512")) {
		$this->setHtmlJs($this->site."lib/sha512/sha512.min.js");
        }
    }

}

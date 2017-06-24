<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Panel2";

class xyo_mod_Panel2 extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

        if ($this->isBase("xyo_mod_Panel2")) {
		$this->setHtmlCss($this->site."media/sys/css/text-in-circle.css");
        };

    }

    public function moduleMain() {
        $this->generateView();
    }

}

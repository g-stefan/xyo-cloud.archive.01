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
            $htmlHead = &$cloud->getModule("xyo-mod-htmlhead");
            if ($htmlHead) {
                $htmlHead->setCss($this->name,$this->site."media/sys/css/text-in-circle.css");
            } else {
                $this->disable();
                return;
            };
        };
    }

    public function moduleMain() {
        $this->generateView();
    }

}

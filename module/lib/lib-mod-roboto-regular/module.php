<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_RobotoRegular";

class lib_mod_RobotoRegular extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_RobotoRegular")) {
            $htmlHead = &$cloud->getModule("xyo-mod-htmlhead");
            if ($htmlHead) {
                $htmlHead->setCss($this->name,$this->site."media/lib/roboto-regular/roboto-regular.css");
            } else {
                $this->moduleDisable();
            };
        }
    }

}

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_Material";

class lib_mod_Material extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_Material")) {
            $htmlHead = &$cloud->getModule("xyo-mod-htmlhead");
            if ($htmlHead) {
                $htmlHead->setCss($this->name,$this->site."media/sys/css/material.min.css");
		$htmlHead->setMetaName($this->name, "viewport", "width=device-width, initial-scale=1.0");
            } else {
                $this->moduleDisable();
            };
            $htmlFooter = &$cloud->getModule("xyo-mod-htmlfooter");
            if ($htmlFooter) {
                $htmlFooter->setJs($this->name,$this->site."media/sys/js/material.min.js");
            } else {
                $this->moduleDisable();
            };
        }
    }

}

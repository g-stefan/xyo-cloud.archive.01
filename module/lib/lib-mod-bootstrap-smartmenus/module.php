<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_BootstrapSmartMenus";

class lib_mod_BootstrapSmartMenus extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_BootstrapSmartMenus")) {
            $htmlHead = &$cloud->getModule("xyo-mod-htmlhead");
            if ($htmlHead) {
                $htmlHead->setCss($this->name,$this->pathBase."media/sys/css/jquery.smartmenus.bootstrap.css");
            } else {
                $this->moduleDisable();
            };
            $htmlFooter = &$cloud->getModule("xyo-mod-htmlfooter");
            if ($htmlFooter) {
                $htmlFooter->setJs($this->name,$this->pathBase."media/sys/js/jquery.smartmenus.js");
                $htmlFooter->setJs($this->name,$this->pathBase."media/sys/js/jquery.smartmenus.bootstrap.js");
            } else {
                $this->moduleDisable();
            };
        }
    }
}

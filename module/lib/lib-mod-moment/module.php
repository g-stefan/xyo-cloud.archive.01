<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_Moment";

class lib_mod_Moment extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_Moment")) {
            $htmlFooter = &$cloud->getModule("xyo-mod-htmlfooter");
            if ($htmlFooter) {
                $htmlFooter->setJs($this->name,"media/sys/js/moment.min.js");
            } else {
                $this->moduleDisable();
            };
        }
    }

}

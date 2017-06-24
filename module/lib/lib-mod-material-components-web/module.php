<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_MaterialComponentsWeb";

class lib_mod_MaterialComponentsWeb extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_mod_MaterialComponentsWeb")) {
		$this->setHtmlClass("mdc-typography");
		$this->setHtmlCss($this->site."media/lib/material-components-web/css/material-components-web.min.css");
		$this->setHtmlJs($this->site."media/lib/material-components-web/js/material-components-web.min.js");
		$this->setHtmlJsSource("mdc.autoInit();","load");
        }
    }

}

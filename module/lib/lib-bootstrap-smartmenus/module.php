<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_BootstrapSmartMenus";

class lib_BootstrapSmartMenus extends xyo_Module {

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isBase("lib_BootstrapSmartMenus")) {
		$this->setHtmlCss($this->site."lib/bootstrap-smartmenus/css/jquery.smartmenus.bootstrap.css");
		$this->setHtmlJs($this->site."lib/bootstrap-smartmenus/js/jquery.smartmenus.js");
		$this->setHtmlJs($this->site."lib/bootstrap-smartmenus/js/jquery.smartmenus.bootstrap.js");
        }
    }
}

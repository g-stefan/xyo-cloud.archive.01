<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "lib_mod_Bootstrap";

class lib_mod_Bootstrap extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("lib_mod_Bootstrap")) {
			$this->setHtmlCss($this->site."media/lib/bootstrap/css/bootstrap.min.css");
			$this->setHtmlCss($this->site."media/lib/bootstrap/css/bootstrap-theme.min.css");
			$this->setHtmlJs($this->site."media/lib/bootstrap/js/bootstrap.min.js");
		}
	}

}

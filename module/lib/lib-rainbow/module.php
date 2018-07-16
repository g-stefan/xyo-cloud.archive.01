<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "lib_Rainbow";

class lib_Rainbow extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("lib_Rainbow")) {
			$this->setHtmlCss($this->site."lib/rainbow/themes/blackboard.css");
			$this->setHtmlJs($this->site."lib/rainbow/js/rainbow.min.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/generic.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/css.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/html.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/javascript.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/json.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/php.js");
			$this->setHtmlJs($this->site."lib/rainbow/js/language/shell.js");
        	}
	}

}

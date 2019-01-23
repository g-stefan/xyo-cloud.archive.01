<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_Complete";

class xui_Complete extends xyo_Module {

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xui_Complete")) {
			if(file_exists("lib/xui/css/xui-complete.min.css") && file_exists("lib/xui/js/xui-complete.min.js")){
				$this->setHtmlCss($this->site."lib/xui/css/xui-complete.min.css");
				$this->setHtmlJs($this->site."lib/xui/js/xui-complete.min.js");
			
				$this->cleanup();
				return;
			};
			if(file_exists("lib/xui/css/xui-complete.css") && file_exists("lib/xui/js/xui-complete.js")){
				$this->setHtmlCss($this->site."lib/xui/css/xui-complete.css");
				$this->setHtmlJs($this->site."lib/xui/js/xui-complete.js");
			
				$this->cleanup();
				return;
			};
        	}
	}

	public function cleanup(){
		$list=$this->getGroup("xui-build");
		foreach($list as $module){
			$mod=&$this->getModule($module);
			$mod->removeHtmlCssAll();
			$mod->removeHtmlJsAll();			
		};
	}
		
}

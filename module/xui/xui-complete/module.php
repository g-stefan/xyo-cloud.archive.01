<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
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
			if($this->getSetting("xui_complete",true)){
				if(!(file_exists("lib/xui/css/xui-complete.css") && file_exists("lib/xui/js/xui-complete.js"))){
					$this->generate();
				};

				if(file_exists("lib/xui/css/xui-complete.css") && file_exists("lib/xui/js/xui-complete.js")){
					$this->setHtmlCss($this->site."lib/xui/css/xui-complete.css");
					$this->setHtmlJs($this->site."lib/xui/js/xui-complete.js");
			
					$this->cleanup();	
				};
			}else{
				$this->generate();
			};
        	}
	}

	public function getModuleList(){
		return array(
			"xui-core",
			"xui-typography",
			"xui-color",
			"xui-palette",
			"xui-theme",
			"xui-effect-ripple",
			"xui-responsive",
			"xui-toggle",
			"xui-elevation",
			"xui-dashboard",
			//
			"xui-form-button",
			"xui-form-button-group",
			"xui-form-button-icon",
			"xui-form-button-icon-left",
			"xui-form-button-icon-right",
			"xui-form-captcha",
			"xui-form-checkbox",
			"xui-form-checkbox2",
			"xui-form-datepicker",
			"xui-form-file",
			"xui-form-file-image",
			"xui-form-label",
			"xui-form-radio",
			"xui-form-select",
			"xui-form-text",
			"xui-form-text-button-group",
			"xui-form-text-icon-left",
			"xui-form-text-icon-left-required",
			"xui-form-text-icon-right",
			"xui-form-text-icon-right-required",
			"xui-form-text-material",
			"xui-form-text-required",
			"xui-form-textarea",
			"xui-form-textarea-material",
			"xui-form-switch",
			//
			"xui-image-captcha",
			"xui-inner-box",
			"xui-line",
			"xui-list-group",
			"xui-panel",
			"xui-progress-bar",
			"xui-toolbar",
			"xui-alert",
			"xui-application",
			"xui-box",
			"xui-table"
		);
	}

	public function cleanup(){
		$list=$this->getModuleList();
		foreach($list as $module){
			$mod=&$this->getModule($module);
			$mod->removeHtmlCssAll();
			$mod->removeHtmlJsAll();			
		};
	}

	public function generate(){
		$this->generateCss();
		$this->generateJs();
	}

	public function generateCss(){
		$fileName="lib/xui/css/xui-complete.css";
		$list=$this->getModuleList();
		file_put_contents($fileName,"");
		foreach($list as $module){
			$mod=&$this->getModule($module);
			ob_start();
			$mod->generateView("generate-css");
			$css = ob_get_contents();
			ob_end_clean();
			file_put_contents($fileName,$css,FILE_APPEND);	
		};
	}

	public function generateJs(){
		$fileName="lib/xui/js/xui-complete.js";
		$list=$this->getModuleList();
		file_put_contents($fileName,"");
		foreach($list as $module){
			$mod=&$this->getModule($module);
			ob_start();
			$mod->generateView("generate-js");
			$css = ob_get_contents();
			ob_end_clean();
			file_put_contents($fileName,$css,FILE_APPEND);	
		};
	}
		
}

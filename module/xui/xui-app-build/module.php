<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xui_app_Build";

class xui_app_Build extends xyo_Module {

	protected $buildCSS_;
	protected $buildJS_;
	protected $buildUI_;
	protected $currentModule_;

	protected $superSelector_;
	protected $selector_;
	protected $componentSelector_;

	protected $xuiTypography;
	protected $xuiColor;
	protected $xuiPalette;
	protected $xuiContext;

	protected $color;
	protected $palette;
	protected $context;
	protected $settings;

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->buildCSS_=array();
		$this->buildJS_=array();
		$this->buildUI_=array();
		$this->currentModule_=null;

		$this->superSelector_="";
		$this->selector_="_default_";
		$this->componentSelector_="";

		$this->xuiTypography=&$this->getModule("xui-typography");
		$this->xuiColor=&$this->getModule("xui-color");
		$this->xuiPalette=&$this->getModule("xui-palette");
		$this->xuiContext=&$this->getModule("xui-context");

		$this->color=&$this->xuiColor;
		$this->palette=$this->xuiPalette->palette;
		$this->context=$this->xuiContext->context;
		$this->settings=array();
		
		$this->includeFile($this->path."settings-default.php");	
	}
	
	public function buildCSS($css){
		$this->buildCSS_[$this->currentModule_]=$css;
	}

	public function buildJS($js){
		$this->buildJS_[$this->currentModule_]=$js;
	}

	public function buildUI(){
		$this->buildUI_[$this->currentModule_]=$this->currentModule_;
	}

	public function buildInit(){
		$list=$this->getGroup("xui-build");
		foreach($list as $module){
			$this->currentModule_=$module;
			$path=$this->getModulePath($module);
			$this->includeFile($path."xui-build.php");
		};
		$this->currentModule_=null;
	}

	public function build(){
		error_reporting(E_ALL);

		$pathCSS=$this->getCloudPath()."lib/xui/css";
		$pathJS=$this->getCloudPath()."lib/xui/js";

		$this->recursiveDeleteFolder($pathCSS);
		$this->recursiveDeleteFolder($pathJS);

		@mkdir($pathCSS);
		@mkdir($pathJS);

		$pathCSS=$pathCSS."/";
		$pathJS=$pathJS."/";		

		file_put_contents($pathCSS."xui-complete.css","");
		file_put_contents($pathJS."xui-complete.js","");

		$completeList=array();
		foreach($this->buildCSS_ as $module=>$value){
			$completeList[$module]=$module;
		};
		foreach($this->buildJS_ as $module=>$value){
			$completeList[$module]=$module;
		};

		foreach($this->buildCSS_ as $module=>$value){
			$path=$this->getModulePath($module);
			$this->includeAndSaveToFileCSS($path.$value.".css.php",$pathCSS.$value.".css");
			file_put_contents($pathCSS."xui-complete.css",file_get_contents($pathCSS.$value.".css"),FILE_APPEND);
		};

		foreach($this->buildJS_ as $module=>$value){
			$path=$this->getModulePath($module);
			$this->includeAndSaveToFileJS($path.$value.".js.php",$pathJS.$value.".js");
			file_put_contents($pathJS."xui-complete.js",file_get_contents($pathJS.$value.".js"),FILE_APPEND);
		};		
	}

	public function recursiveCopyFolder($source,$destination) {
		$dir = opendir($source);
		@mkdir($destination);
		while(false!==($file=readdir($dir))) {
			if (($file != ".") && ($file != "..")) {
				if ( is_dir($source."/".$file) ) {
					recursiveCopyFolder($source."/".$file,$destination."/".$file); 
				} else {
					copy($source."/".$file,$destination."/". $file);
				};
			};
		};
		closedir($dir); 
	}

	public function recursiveDeleteFolder($folder) {
		if(!is_dir($folder)){
			return false;
		};
		$fileList=scandir($folder);
		if($fileList===false){
			return false;	
		};
		foreach ($fileList as $file) {
			if($file=="."){
				continue;
			};
			if($file==".."){
				continue;
			};
			if(is_dir($folder."/".$file)){
				if($this->recursiveDeleteFolder($folder."/".$file)){
					continue;
				};
				return false;
			};
			unlink($folder."/".$file); 
		};
		return @rmdir($folder);
	}

	public function includeAndSaveToFile($inc,$filename){
		ob_start();
		include($inc);
		$content = ob_get_contents();
		ob_end_clean();
		file_put_contents($filename,$content);
	}

	// CSS

	public function includeAndSaveToFileCSS($inc,$filename){
		ob_start();
		include($inc);
		$content = ob_get_contents();
		ob_end_clean();
		$content=str_replace("<style>","",$content);
		$content=str_replace("</style>","",$content);
		file_put_contents($filename,$content);
	}

	public function includeCSS($module,$css){
		$path=$this->getModulePath($module);
		$superSelector_=$this->superSelector_;
		$this->superSelector_="";
		$selector_=$this->selector_;
		$this->selector_="_default_";
		$componentSelector_=$this->componentSelector_;
		$this->componentSelector_="";
		include($path.$css.".css.php");
		$this->superSelector_=$superSelector_;
		$this->selector_=$selector_;		
	}

	public function includeCSSSelector($module,$css,$superSelector,$selector){
		$path=$this->getModulePath($module);
		$superSelector_=$this->superSelector_;
		$this->superSelector_=$superSelector;
		$selector_=$this->selector_;
		$this->selector_=$selector;
		$componentSelector_=$this->componentSelector_;
		$this->componentSelector_="";
		include($path.$css.".css.php");
		$this->superSelector_=$superSelector_;
		$this->selector_=$selector_;
	}

	public function includeCSSComponentSelector($module,$css,$superSelector,$selector,$componentSelector){
		$path=$this->getModulePath($module);
		$superSelector_=$this->superSelector_;
		$this->superSelector_=$superSelector;
		$selector_=$this->selector_;
		$this->selector_=$selector;
		$componentSelector_=$this->componentSelector_;
		$this->componentSelector_=$componentSelector;
		include($path.$css.".css.php");
		$this->superSelector_=$superSelector_;
		$this->selector_=$selector_;
	}

	public function eSuperSelector(){
		echo $this->superSelector_;
	}

	public function eSelector(){
		echo $this->selector_;
	}

	public function eComponentSelector(){
		echo $this->componentSelector_;
	}

	public function setSuperSelector($superSelector){
		$this->superSelector_=$superSelector;
	}

	public function setSelector($selector){
		$this->selector_=$selector;
	}

	public function setComponentSelector($selector){
		$this->componentSelector_=$selector;
	}

	public function setDefaultSelector($selector){
		if($this->selector_==="_default_"){
			$this->selector_=$selector;
		}
	}

	// JS

	public function includeAndSaveToFileJS($inc,$filename){
		ob_start();
		include($inc);
		$content = ob_get_contents();
		ob_end_clean();
		$content=str_replace("<script>","",$content);
		$content=str_replace("</script>","",$content);
		file_put_contents($filename,$content);
	}

	public function includeJS($module,$js){
		$path=$this->getModulePath($module);
		include($path.$js.".js.php");
	}
}

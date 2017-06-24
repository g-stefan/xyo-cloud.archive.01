<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_cms_Page";

class xyo_mod_cms_Page extends xyo_mod_Application {

	public $pages;
	public $contents;
	//
	public $page;
	public $selectedLanguage;
	public $content;
	public $dataPath;
	public $imagesPath;
	public $valuePath;
	public $pageTitle;
	//

	public function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);		

		$this->dataPath="page/";
		$this->valuePath="repository/page/";
		$this->imagesPath="media/images/";
		$this->pages=array();
		$this->contents=array();
		$this->pageTitle="";

		$this->initPages();
	}

	//
	// Pages
	//

	public function initPages(){
		$fileName=$this->dataPath.".pages.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
	}

	public function getPages(){
		return $this->pages;	
	}

	public function addPage($name,$title,$pageSource){
		$this->pages[$name]=array("name"=>$name,"title"=>$title,"source"=>$pageSource);	
	}

	function requireViewPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".view.require.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		foreach($this->contents as $key=>$value){
			$this->requireViewContent($key);
		};
	}

	function viewPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".view.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
	}

	function requireEditPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".edit.require.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		foreach($this->contents as $key=>$value){
			$this->requireEditContent($key);
		};
	}

	function editPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".edit.php";
		$this->language->includeFile($this->dataPath.$this->pages[$pageName]["source"].".edit.language.".strtolower($this->selectedLanguage).".php");
		if (file_exists($fileName)) {
			include($fileName);
		};
	}

	function savePage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".save.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		foreach($this->contents as $key=>$value){
			$this->saveContent($key);
		};
	}

	function loadPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".load.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		foreach($this->contents as $key=>$value){
			$this->loadContent($key);
		};
	}

	function loadPageElement($name){
		$valueName=$this->valuePath.$this->page.".value.".$name;
		if(file_exists($valueName)) {
			$this->setElementValue($name,file_get_contents($valueName));
		};
	}

	function savePageElement($name){
		$valueName=$this->valuePath.$this->page.".value.".$name;
		file_put_contents($valueName,$this->getElementValue($name));
	}

	function getPageElement($name,$default=null){
		return $this->getElementValue($name,$default);
	}

	function processPageElement($elType,$name,$arguments=null){
		$this->processComponent($elType,$name,$arguments);
	}

	function getPageElementFileName($name,$extension){
		return $this->valuePath.$this->page.".".$name.".".$extension;
	}

	function getPageElementFileNameImage($name,$extension){
		if(strlen($extension)){
			$extension=".".$extension;
		};
		return $this->imagesPath.$this->page.".".$name.$extension;
	}

	function getPageElementFileNameImageView($name){
		return $this->getElementValue($name);
	}

	public function initPage($pageName){
		$fileName=$this->dataPath.$this->pages[$pageName]["source"].".contents.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
	}

	public function addContent($contentName,$contentTitle,$contentSource){
		$this->contents[$contentName]=array("name"=>$contentName,"title"=>$contentTitle,"source"=>$contentSource);
	}

	//
	// Content
	//

	function requireViewContent($contentName){
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".view.require.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
	}


	function viewContent($contentName){
		$this->content=$contentName;
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".view.php";
		if (file_exists($fileName)) {
			include($fileName);
		};
	}


	function requireEditContent($contentName){
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".edit.require.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
	}

	function editContent($contentName){
		$this->content=$contentName;
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$contentName));
		$this->language->includeFile($this->dataPath.$this->contents[$contentName]["source"].".edit.language.".strtolower($this->selectedLanguage).".php");
		$this->generateComponent("row-begin");
		$this->generateComponent("panel-wide-begin",null,array("title"=>$this->contents[$contentName]["title"]));
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".edit.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		$this->generateComponent("panel-wide-end");
		$this->generateComponent("row-end");
		$this->setElementPrefix($prefix);
	}

	function saveContent($contentName){
		$this->content=$contentName;
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$contentName));
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".save.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		$this->setElementPrefix($prefix);
	}

	function saveContentElement($name){
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$this->content));
		$valueName=$this->valuePath.$this->page.".value.".$this->content.".".$name;
		file_put_contents($valueName,$this->getElementValue($name));
		$this->setElementPrefix($prefix);		
	}

	function processContentElement($elType,$name,$arguments=null){
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$this->content));
		$this->processComponent($elType,$name,$arguments);
		$this->setElementPrefix($prefix);
	}

	function loadContent($contentName){
		$this->content=$contentName;
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$contentName));
		$fileName=$this->dataPath.$this->contents[$contentName]["source"].".load.php";
		if (file_exists($fileName)) {
			include($fileName);
		};		
		$this->setElementPrefix($prefix);
	}

	function loadContentElement($name){
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$this->content));
		$valueName=$this->valuePath.$this->page.".value.".$this->content.".".$name;
		if(file_exists($valueName)) {
			$this->setElementValue($name,file_get_contents($valueName));
		};
		$this->setElementPrefix($prefix);		
	}

	function getContentElement($name,$default=null){
		$prefix=$this->getElementPrefix();
		$this->setElementPrefix(str_replace("-","_",$this->content));
		$retV=$this->getElementValue($name,$default);
		$this->setElementPrefix($prefix);		
		return $retV;
	}

	function getContentElementFileName($name,$extension){
		return $this->valuePath.$this->page.".".$this->content.".".$name.".".$extension;
	}

}

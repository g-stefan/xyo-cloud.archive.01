<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Toolbar";

class xyo_mod_Toolbar extends xyo_mod_Application {

    protected $toolbar;
    protected $config;


    function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        if ($this->isOk) {
            if ($this->isBase("xyo_mod_Toolbar")) {
                $this->setHtmlCss($this->site."lib/xyo/css/xyo-mod-toolbar.css");
            }
        }		
    }

    public function moduleMain() {
        $this->toolbar = array();
        $this->config = $this->getParameter("config", "toolbar");
        $group = $this->getParameter("group");
        if ($group) {
            $this->addGroup($group);
        }
        $module = $this->getParameter("module");
        if ($module) {
            $this->addModule($module);
        }
        $this->generateView();
    }

    public function addGroup($name) {
        $list = &$this->cloud->getGroup($name);
        if (count($list)) {
            foreach ($list as $value) {
                $this->addModule($value);
            }
        }
    }

    public function addModule($module) {
		$mod=&$this->getModule($module);
		if($mod){
			$modPathBase=$mod->getPathBase();
			foreach(array_reverse($modPathBase,true) as $path){

				$this->loadLanguageFromPathDirect($path . $this->config ."/language/",$this->getSystemLanguage());
	            $file = $path . $this->config . "/toolbar.php";
    	        if (file_exists($file)) {
	        		include($file);
    	        }

			}
		}
    }

    public function setItem($id, $type, $img, $title, $mode, $module, $parameters=null) {
        $item = array();
        $item["type"] = $type;
        $item["img"] = $img;
		if($title){		
	        $item["title"] = $this->getFromlanguage($title);
		}else{
			$item["title"] = "&#160;";
		}
        $item["mode"] = $mode;
        $item["module"] = $module;
        $item["parameters"] = $parameters;
        $this->toolbar[$id] = &$item;
    }

	public function setItemBefore($idX, $id, $type, $img, $title, $mode, $module, $parameters=null) {
        $item = array();
        $item["type"] = $type;
        $item["img"] = $img;
		if($title){
	        $item["title"] = $this->getFromlanguage($title);
		}else{
			$item["title"] = "&#160;";
		}
        $item["mode"] = $mode;
        $item["module"] = $module;
        $item["parameters"] = $parameters;
		if(array_key_exists($idX,$this->toolbar)){
			$tmp=array();
			foreach($this->toolbar as $key=>$value){
				if($key===$idX){
					$tmp[$id]=&$item;
				}
				$tmp[$key]=$value;
			}
			$this->toolbar=$tmp;
		}else{
			$this->toolbar[$id] = &$item;
		}
	}

	public function setItemAfter($idX, $id, $type, $img, $title, $mode, $module, $parameters=null) {
        $item = array();
        $item["type"] = $type;
        $item["img"] = $img;
		if($title){
	        $item["title"] = $this->getFromlanguage($title);
		}else{
			$item["title"] = "&#160;";
		}
        $item["mode"] = $mode;
        $item["module"] = $module;
        $item["parameters"] = $parameters;
		if(array_key_exists($idX,$this->toolbar)){
			$tmp=array();
			foreach($this->toolbar as $key=>$value){
				$tmp[$key]=$value;
				if($key===$idX){
					$tmp[$id]=&$item;
				}
			}
			$this->toolbar=$tmp;
		}else{
			$this->toolbar[$id] = &$item;
		}
	}	

	public function removeItem($id){
		if(array_key_exists($id,$this->toolbar)){
			unset($this->toolbar[$id]);
		}
	}

	public function clearToolbar(){
			$this->toolbar=array();
	}

}

<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_app_ModuleParameter2";

class xyo_app_ModuleParameter2 extends xyo_app_Application {

    protected $id_xyo_module;
    protected $items; 
    protected $elements; 	

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        $this->id_xyo_module=0;
	$this->items=array();
	$this->elements=array();
    }   

    public function addModule($module) {
        $path = $this->cloud->getModulePath($module);
        if ($path) {
            $this->loadLanguageFromPathDirect($path . "sys/language/", $this->getSystemLanguage());
            $file = $path . "sys/parameters.php";
            if (file_exists($file)) {
                include($file);
            };         
        }
    }

    public function addItem($type, $name=null, $defaultValue=null, $parameters=null) {
	$this->requireComponent(array($type));
        $item = array();
        $item["type"] = $type;
        $item["name"] = $name;
        $item["default_value"] = $defaultValue;
	if(is_null($parameters)){
		$parameters=array();
	};
	$item["parameters"]=$parameters;
        $this->items[] = &$item;
	$this->elements[$type]=$type;
    }

}

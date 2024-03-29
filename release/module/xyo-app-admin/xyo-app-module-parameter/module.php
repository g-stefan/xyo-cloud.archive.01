<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_app_ModuleParameter2";

class xyo_app_ModuleParameter2 extends xyo_app_Application {

    protected $xyo_module_id;
    protected $items; 
    protected $elements; 	

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
        $this->xyo_module_id=0;
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

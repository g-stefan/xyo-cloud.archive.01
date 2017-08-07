<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_app_Example";

class xyo_app_Example extends xyo_app_Application {

    protected $items; 
    protected $elements; 	

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
	$this->items=array();
	$this->elements=array();
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

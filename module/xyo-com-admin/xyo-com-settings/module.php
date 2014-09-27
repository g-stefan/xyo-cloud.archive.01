<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_com_Settings";

class xyo_com_Settings extends xyo_com_Application {

    protected $items; 
    protected $elements; 	

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);
	$this->items=array();
	$this->elements=array();
    }   

    public function addItem($type, $name=null, $defaultValue=null, $parameters=null) {
	$this->requireElement(array($type));
        $item = array();
        $item["type"] = $type;
        $item["name"] = $name;
        $item["default_value"] = $defaultValue;
	$item["parameters"]=$parameters;
        $this->items[] = &$item;
	$this->elements[$type]=$type;
    }

}

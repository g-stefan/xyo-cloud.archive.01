<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Html";

class xyo_mod_Html extends xyo_Module {

    protected $htmlClassList;

    public function __construct(&$object, &$cloud) {
        parent::__construct($object, $cloud);

	$this->htmlClassList=array();
    }

    public function setHTMLClass($class){
	$this->htmlClassList[$class]=$class;
    }

    public function removeHTMLClass($class){
	if(array_key_exists($class,$this->htmlClassList)){
		unset($this->htmlClassList[$class]);
	};
    }

    public function getHTMLClass(){
	$retV="";
	foreach($this->htmlClassList as $class){
		if(strlen($retV)){
			$retV.=" ";
		};
		$retV.=$class;
	};
	return $retV;
    }

}


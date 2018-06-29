<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$element = $this->getArgument("element");
$format = $this->getArgument("format",$this->cloud->get("locale_time_format",""));
if(strlen($format)){
	if($format=="H:i:s"){
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,2).":".substr($value,3,2));
		};
	};
}else{
	$value=$this->getElementValueString($element);
	if(strlen($value)){
		$this->setElementValue($element,substr($value,0,2).":".substr($value,3,2));
	};
};

$value=$this->getElementValue($element);
if(strlen($value)==0){
	$this->setElementValue($element,null);	
};

<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$element = $this->getArgument("element");
$format = $this->getElementValueString($element."_format","");
if(strlen($format)){
	$format=base64_decode($format);
};
$format = $this->getArgument("format",strlen($format)?$format:$this->cloud->get("locale_date_format",""));
if(strlen($format)){
	if($format=="Y-m-d"){
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="Y/m/d"){
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,4)."-".substr($value,5,2)."-".substr($value,8,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="d-m-Y"){
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,6,4)."-".substr($value,3,2)."-".substr($value,0,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="d/m/Y"){
		$value=$this->getElementValueString($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,6,4)."-".substr($value,3,2)."-".substr($value,0,2).substr($value,10,strlen($value)));
		};
	};
};

$value=$this->getElementValue($element);
if(strlen($value)==0){
	$this->setElementValue($element,null);	
};

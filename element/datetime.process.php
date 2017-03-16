<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$format = $this->getArgument("format",$this->cloud->get("locale_date_format",""));
if(strlen($format)){
	if($format=="Y-m-d"){
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,2)."-".substr($value,3,2)."-".substr($value,6,4).substr($value,10,strlen($value)));
		};
	};
	if($format=="Y/m/d"){
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,0,2)."-".substr($value,3,2)."-".substr($value,6,4).substr($value,10,strlen($value)));
		};
	};
	if($format=="d-m-Y"){
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,6,4)."-".substr($value,3,2)."-".substr($value,0,2).substr($value,10,strlen($value)));
		};
	};
	if($format=="d/m/Y"){
		$value=$this->getElementValueStr($element);
		if(strlen($value)){
			$this->setElementValue($element,substr($value,6,4)."-".substr($value,3,2)."-".substr($value,0,2).substr($value,10,strlen($value)));
		};
	};
};

$value=$this->getElementValue($element);
if(strlen($value)==0){
	$this->setElementValue($element,null);	
};
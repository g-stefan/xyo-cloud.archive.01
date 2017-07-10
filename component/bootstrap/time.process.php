<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");
$value=$this->getElementValue($element);
if(strlen($value)==0){
	$this->setElementValue($element,null);	
}else{
	$this->setElementValue($element,substr($value,0,5));
};

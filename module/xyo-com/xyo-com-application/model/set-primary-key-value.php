<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->setPrimaryKeyValue($this->getElementValueStr("primary_key_value", $this->getRequest("primary_key_value")))){
	$this->setElementValue("primary_key_value",$this->primaryKeyValue);
}else{	
	$this->setError("none", null);
};

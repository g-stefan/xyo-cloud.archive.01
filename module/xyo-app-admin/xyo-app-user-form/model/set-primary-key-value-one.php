<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if($this->user->info->id){
	$this->setPrimaryKeyValue($this->user->info->id);
	$this->setElementValue("primary_key_value",$this->primaryKeyValue);
}else{
	$this->setError("set-primary-key-value-one");
};


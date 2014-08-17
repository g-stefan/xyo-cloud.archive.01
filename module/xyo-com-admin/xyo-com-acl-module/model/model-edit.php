<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("select-enabled-edit",null,false);
$this->processModel("select-xyo-core",null,false);

if($this->id_xyo_module_group){}else{
	$this->processModel("select-xyo-module-group",null,false);
}

if($this->id_xyo_module){}else{
	$this->processModel("select-xyo-module",null,false);
}

$this->processModel("select-xyo-user-group",null,false);

if($this->isNew){
    $this->setElementValue("order",0);
}

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("list-enabled",null,false);
$this->processModel("list-xyo-core",null,false);

if($this->id_xyo_module_group){}else{
	$this->processModel("list-xyo-module-group",null,false);
}

if($this->id_xyo_module){}else{
	$this->processModel("list-xyo-module",null,false);
}

$this->processModel("list-xyo-user-group",null,false);

if($this->isNew){
    $this->setElementValue("order",0);
}

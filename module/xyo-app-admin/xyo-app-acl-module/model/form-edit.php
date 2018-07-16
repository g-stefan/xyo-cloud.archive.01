<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->processModel("select-enabled-edit");

if($this->xyo_module_group_id){}else{
	$this->processModel("select-xyo-module-group-edit");
}

if($this->xyo_module_id){}else{
	$this->processModel("select-xyo-module-edit");
}

$this->processModel("select-xyo-user-group-edit");

if($this->isNew){
    $this->setElementValue("order",0);
}

<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if($this->xyo_module_id){
    $this->ds->xyo_module_id=$this->xyo_module_id;
}

if($this->xyo_module_group_id){
    $this->ds->xyo_module_group_id=$this->xyo_module_group_id;
}


$this->ds->setGroup("id",true);
$this->ds->setGroup("module_name",true);
$this->ds->setGroup("module_group_name",true);
$this->ds->setGroup("user_group_name",true);

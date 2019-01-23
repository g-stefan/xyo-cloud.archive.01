<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if(!$this->isDialog){
	$this->generateComponent("xui.box-1x1-begin");
	$this->generateComponent("xui.panel-begin");
};

if($this->xyo_user_group_id_super){
}else{
    $this->generateComponent("xui.form-select", array("element" =>"xyo_user_group_id_super"));
}

$this->generateComponent("xui.form-select", array("element" =>"xyo_user_group_id"));
$this->generateComponent("xui.form-switch", array("element" =>"enabled"));

if(!$this->isDialog){
	$this->generateComponent("xui.panel-end");
	$this->generateComponent("xui.box-1x1-end");
};


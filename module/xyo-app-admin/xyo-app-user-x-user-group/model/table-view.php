<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->tableHead = array(
    "#" => "#",
    "name" => "head_name",
    "user_group" => "head_user_group",
    "principal" => "head_principal",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "name" => true,
    "user_group" => true
);

$this->tableSelect = array(
    "id_xyo_user_group" => true,
    "enabled" => true
);

$this->tableType=array(
    "name" => array("action",
	array(
		"action" => "form-edit",
		"primary_key_value" => array($this->primaryKey)
	)),
	"principal"=>array("toggle",array(
		"on"=>array(
			0=>$this->site."media/sys/images/favorite-off-16.png",
			1=>$this->site."media/sys/images/favorite-16.png"
		)
	)),
	"enabled"=>array("toggle")		
);

$this->tableSort = array(
    "name" => "ascendent",
    "user_group" => "none",
	"enabled" => "none",
	"id" => "none"
);

if ($this->id_xyo_user) {
    
} else {
    $this->processModel("select-xyo-user-group");
}

$this->processModel("select-enabled");
$this->processModel("select-allow");

$this->tableSelectInfo = array(
    "id_xyo_user_group" => $this->getParameter("select_id_xyo_user_group", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);

if ($this->id_xyo_user) {
    unset($this->tableHead["name"]);
    unset($this->tableSelect["name"]);
    unset($this->tableSort["name"]);
    unset($this->tableSearch["name"]);
    unset($this->tableType["name"]);
    unset($this->tableSelect["id_xyo_user_group"]);
    unset($this->tableSelectInfo["id_xyo_user_group"]);
    

	$this->tableType["user_group"] =array("action", array(
            "action" => "form-edit",
            "primary_key_value" => array($this->primaryKey)
        ));
    
} else {
    unset($this->tableSelect["id_xyo_user_group"]);
    unset($this->tableSort["user_group"]);
}




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
    "username" => "head_username",
    "user_group" => "head_user_group",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "username" => true,
    "user_group" => true
);

$this->tableSelect = array(
    "id_xyo_user_group" => true,
    "enabled" => true
);

$this->tableType=array(
    "username" => array("action",
	array(
		"action" => "edit",
		"id" => array($this->tablePrimaryKey)
	)),
	"enabled"=>array("toggle")		
);

$this->tableSort = array(
    "username" => "ascendent",
    "user_group" => "none",
	"enabled" => "none",
	"id" => "none"
);

if ($this->id_xyo_user) {
    
} else {
    $this->processModel("list-xyo-user-group");
}

$this->processModel("list-enabled");
$this->processModel("list-allow");

$this->tableSelectInfo = array(
    "id_xyo_user_group" => $this->getParameter("list_id_xyo_user_group", array()),
    "enabled" => $this->getParameter("list_enabled", array())
);

if ($this->id_xyo_user) {
    unset($this->tableHead["username"]);
    unset($this->tableSelect["username"]);
    unset($this->tableSort["username"]);
    unset($this->tableType["username"]);
    unset($this->tableSelect["id_xyo_user_group"]);
    unset($this->tableSelectInfo["id_xyo_user_group"]);
    

	$this->tableType["user_group"] =array("action", array(
            "action" => "edit",
            "id" => array($this->tablePrimaryKey)
        ));
    
} else {
    unset($this->tableSelect["id_xyo_user_group"]);
    unset($this->tableSort["user_group"]);
}




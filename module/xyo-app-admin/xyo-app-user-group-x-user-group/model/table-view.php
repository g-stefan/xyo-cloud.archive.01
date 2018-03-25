<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->tableHead = array(
    "#" => "#",
    "user_group_super" => "head_user_group_super",
    "user_group" => "head_user_group",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "user_group_super" => true,
    "user_group" => true
);

$this->tableSelect = array(
    "user_group" => true,
    "enabled" => true
);

$this->tableType=array(
	"user_group_super" => array("cmd-edit"),
	"enabled" =>array("toggle")
);

$this->tableSort = array(
	"user_group_super" => "ascendent",
	"user_group" => "none",
	"enabled" => "none",
	"id" => "none"
);

$this->processModel("select-xyo-user-group");
$this->processModel("select-enabled");

$this->tableSelectInfo = array(
	"user_group" => $this->getParameter("select_id_xyo_user_group", array()),
	"enabled" => $this->getParameter("select_enabled", array())
);

if ($this->id_xyo_user_group_super) {

	unset($this->tableHead["user_group_super"]);
	unset($this->tableSelect["user_group_super"]);
	unset($this->tableSort["user_group_super"]);
	unset($this->tableSearch["user_group_super"]);
	unset($this->tableType["user_group_super"]);
	unset($this->tableSelect["user_group"]);
	unset($this->tableSelectInfo["user_group"]);    
    
	$this->tableType["user_group"]=array("action",array(
		"action" => "form-edit",
		"primary_key_value" => array($this->primaryKey)
	));
    
}else{

	unset($this->tableSelect["user_group"]);

}


<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->tableHead = array(
    "#" => "#",
    "name" => "head_name",
    "user_group" => "head_user_group",
    "principal" => "head_principal",
    "enabled" => "head_enabled"
);

$this->tableSearch = array(
    "name" => true,
    "user_group" => true
);

$this->tableSelect = array(
    "xyo_user_group_id" => true,
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
			0=>"<i class=\"fa fa-star-o\" style=\"display:block;color:#888;font-size:16px;\"></i>",
			1=>"<i class=\"fa fa-star\" style=\"display:block;color:#FB8C00;font-size:16px;\"></i>"
		)
	)),
	"enabled"=>array("toggle")		
);

$this->tableSort = array(
    "name" => "ascendent",
    "user_group" => "none",
	"enabled" => "none"
);

if ($this->xyo_user_id) {
    
} else {
    $this->processModel("select-xyo-user-group");
}

$this->processModel("select-enabled");
$this->processModel("select-allow");

$this->tableSelectInfo = array(
    "xyo_user_group_id" => $this->getParameter("select_xyo_user_group_id", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);

if ($this->xyo_user_id) {
    unset($this->tableHead["name"]);
    unset($this->tableSelect["name"]);
    unset($this->tableSort["name"]);
    unset($this->tableSearch["name"]);
    unset($this->tableType["name"]);
    unset($this->tableSelect["xyo_user_group_id"]);
    unset($this->tableSelectInfo["xyo_user_group_id"]);
    

	$this->tableType["user_group"] =array("action", array(
            "action" => "form-edit",
            "primary_key_value" => array($this->primaryKey)
        ));
    
} else {
    unset($this->tableSelect["xyo_user_group_id"]);
    unset($this->tableSort["user_group"]);
}




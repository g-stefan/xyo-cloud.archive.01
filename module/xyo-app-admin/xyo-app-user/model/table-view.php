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
    "username" => "head_username",
    "logged_in" => "head_logged_in",
    "logged_at" => "head_logged_at",
    "created_at" => "head_created_at",
    "invisible" => "head_invisible",
    "enabled" => "head_enabled"
);

$this->tableSearch = array(
    "name" => true,
    "username" => true
);

$this->tableSelect = array(
    "xyo_user_group_id" => true,
    "enabled" => true
);

$this->tableType=array(
    "name" => array("action",array(
        "action" => "form-edit",
        "primary_key_value" => array($this->primaryKey)
    )),
	"enabled"=>array("toggle"),	
	"invisible"=>array("toggle",array(
		"on"=>array(
			0=>"<i class=\"fa fa-circle-o\" style=\"display:block;color:#888;font-size:16px;\"></i>",
			1=>"<i class=\"fa fa-circle\" style=\"display:block;color:#FB8C00;font-size:16px;\"></i>"
		)
	)),	
	"logged_in"=>array("toggle")
);

$this->tableSort = array(
    "name" => "ascendent",
    "username" => "none",
	"logged_in" => "none",
	"logged_at" => "none",
	"created_at" => "none",
	"invisible" => "none",
	"enabled" => "none"
);

$this->processModel("select-xyo-user-group");
$this->processModel("select-enabled");

$this->tableSelectInfo = array(
    "xyo_user_group_id" => $this->getParameter("select_xyo_user_group_id", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);

$this->tableDelete = array(
    "name" => true,
    "username" => true
);

$this->tableImportant=array(
	"name"=>true
);

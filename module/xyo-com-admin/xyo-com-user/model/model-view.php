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
    "username" => "head_username",
    "logged_in" => "head_logged_in",
    "logged_on" => "head_logged_on",
    "created_on" => "head_created_on",
	"invisible" => "head_invisible",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "name" => true,
    "username" => true
);

$this->tableSelect = array(
    "id_xyo_user_group" => true,
    "id_xyo_core" => true,
    "enabled" => true
);

$this->tableType=array(
    "name" => array("action",array(
        "action" => "edit",
        "id" => array($this->tablePrimaryKey)
    )),
	"enabled"=>array("toggle"),	
	"invisible"=>array("toggle",array(
		"on"=>array(
			0=>array("#glyphicon glyphicon-ok-circle","#ccd"),
			1=>"#glyphicon glyphicon-ok-circle"
		)
	)),	
	"logged_in"=>array("toggle")
);

$this->tableSort = array(
    "name" => "ascendent",
    "username" => "none",
	"logged_in" => "none",
	"logged_on" => "none",
	"created_on" => "none",
	"invisible" => "none",
	"enabled" => "none",
	"id" => "none"
);

$this->processModel("select-xyo-user-group");
$this->processModel("select-xyo-core");
$this->processModel("select-enabled");

$this->tableSelectInfo = array(
    "id_xyo_user_group" => $this->getParameter("select_id_xyo_user_group", array()),
    "id_xyo_core" => $this->getParameter("select_id_xyo_core", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);


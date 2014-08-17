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
    "description" => "head_description",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "name" => true
);

$this->tableSelect = array(	
    "enabled" => true
);

$this->tableType=array(
    "name" => array("action",
	array(
        	"action" => "edit",
	        "id" => array($this->tablePrimaryKey)
    	)),
	"enabled" => array("toggle")	
);

$this->tableSort = array(
    "name" => "ascendent",
	"description" => "none",
	"enabled" => "none",
	"id" => "none"
);

$this->processModel("select-enabled", null, false);

$this->tableSelectInfo = array(
    "enabled" => $this->getParameter("select_enabled", array())
);


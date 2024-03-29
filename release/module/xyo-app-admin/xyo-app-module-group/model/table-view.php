<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->tableHead = array(
    "#" => "#",
    "name" => "head_name",
    "description" => "head_description",
    "enabled" => "head_enabled"
);

$this->tableSearch = array(
    "name" => true
);

$this->tableSelect = array(
    "enabled" => true
);

$this->tableType=array(
    "name" => array("cmd-edit"),
	"enabled" => array("toggle")	
);

$this->tableSort = array(
	"name" => "ascendent",
	"description" => "none",
	"enabled" => "none"
);

$this->processModel("select-enabled");

$this->tableSelectInfo = array(
    "enabled" => $this->getParameter("select_enabled", array())
);

$this->tableImportant=array(
	"name"=>true
);

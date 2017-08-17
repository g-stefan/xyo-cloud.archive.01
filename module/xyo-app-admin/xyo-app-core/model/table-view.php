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
    "name" => "head_name",
    "description" => "head_description",
    "default" => "head_default",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "name" => true
);

$this->tableSelect = array(
    "enabled" => true
);


$this->tableType = array(
	"name"=>array("cmd-edit"),
	"enabled"=>array("toggle"),
	"default"=>array("toggle",array(
		"on"=>array(
			0=>"<i class=\"fa fa-star-o\" style=\"display:block;color:#888;font-size:16px;\"></i>",
			1=>"<i class=\"fa fa-star\" style=\"display:block;color:#FB8C00;font-size:16px;\"></i>"
		)
	))	
);

$this->tableSort = array(
    "name" => "ascendent",
	"description" =>"none",
	"default"=>"none",
	"enabled"=>"none",
	"id"=>"none"
);

$this->processModel("select-enabled");

$this->tableSelectInfo = array(
    "enabled" => $this->getParameter("select_enabled", array())
);

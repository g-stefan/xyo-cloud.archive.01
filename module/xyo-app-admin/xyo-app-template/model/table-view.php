<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->tableHead = array(
    "#" => "#",
    "module_name" => "head_module_name",
    "active" => "head_active",
    "id" => "head_id"
);

$this->tableSearch = array(
    "module_name" => true
);

$this->tableSelect = array();

$this->tableType=array(
	"active"=>array("toggle",array(
		"on"=>array(
			0=>"<i class=\"fa fa-star-o\" style=\"display:block;color:#888;font-size:16px;\"></i>",
			1=>"<i class=\"fa fa-star\" style=\"display:block;color:#FB8C00;font-size:16px;\"></i>"
		)
	))
);

$this->tableSort = array(
    "module_name" => "ascendent",
    "active" => "none",
    "id" => "none"
);

$this->tableSelectInfo = array();

$this->tableActionLink = array();

$this->tableData = array(
	"id_xyo_module"=>"id_xyo_module",
	"active"=>array(0=>0)
);

$this->tableImportant=array(
    "module_name" => true
);
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
    "module_name" => "head_module_name",
    "active" => "head_active",
    "core_name" => "head_core_name",
    "id" => "head_id"
);

$this->tableSearch = array(
    "module_name" => true
);

$this->tableSelect = array(
    "id_xyo_core" => true
);

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
    "core_name" => "none",
    "id" => "none"
);

$this->processModel("select-xyo-core");

$this->tableSelectInfo = array(
    "id_xyo_core" => $this->getParameter("select_id_xyo_core", array())
);


$this->tableActionLink = array();

$this->tableData = array(
	"id_xyo_core"=>"id_xyo_core",
	"id_xyo_module"=>"id_xyo_module",
	"active"=>array(0=>0)
);


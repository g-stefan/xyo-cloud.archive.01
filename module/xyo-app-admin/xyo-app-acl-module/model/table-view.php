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
    "module_group_name" => "head_module_group_name",
    "order" => "head_order",
    "user_group_name" => "head_user_group_name",
    "core_name" => "head_core_name",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "module_name" => true
);

$this->tableSelect = array(
    "id_xyo_module_group" => true,
    "id_xyo_user_group" => true,
    "id_xyo_core" => true,
    "enabled" => true
);

$this->tableType=array(
	"enabled"=>array("toggle"),
	"order"=>array("order"),
	"module_name"=>array("cmd-edit")
);

$this->tableSort = array(
    "module_name" => "ascendent",
    "module_group_name" => "none",
	"order" => "none",
    "user_group_name" => "none",
    "core_name" => "none",
    "enabled" => "none",
	"id"=> "none"
);

$this->processModel("select-enabled");
$this->processModel("select-xyo-core");

if ($this->id_xyo_module_group) {}else{
	$this->processModel("select-xyo-module-group");
}

$this->processModel("select-xyo-user-group");

$this->tableSelectInfo = array(
    "id_xyo_module_group" => $this->getParameter("select_id_xyo_module_group", array()),
    "id_xyo_user_group" => $this->getParameter("select_id_xyo_user_group", array()),
    "id_xyo_core" => $this->getParameter("select_id_xyo_core", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);


if ($this->id_xyo_module) {
    unset($this->tableHead["module_name"]);
    unset($this->tableSelect["module_name"]);
    unset($this->tableSort["module_name"]);
    unset($this->tableType["module_name"]);
	
    $this->tableType["module_group_name"]=array("cmd-edit");

};


if ($this->id_xyo_module_group) {
	unset($this->tableHead["module_group_name"]);
	unset($this->tableSelect["id_xyo_module_group"]);
	unset($this->tableSort["module_group_name"]);

	$this->tableSort["module_name"]="none";
	$this->tableSort["order"]="ascendent";

	if($this->id_xyo_module){
		unset($this->tableSort["module_name"]);
		unset($this->tableSort["module_group_name"]);
		unset($this->tableType["module_name"]);
		unset($this->tableType["module_group_name"]);
	};
};

$this->tableData = array(
	"id_xyo_core"=>"id_xyo_core"
);

$this->tableDelete= array(
    "module_name" => true,
    "module_group_name" => true,
    "user_group_name" => true,
    "core_name" => true,
    "id" => true
);


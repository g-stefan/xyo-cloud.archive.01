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
	"module_name"=>array("action",array(
	        "action" => "edit",
        	"id" => array($this->tablePrimaryKey)        
	))
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

$this->processModel("list-enabled", null, false);
$this->processModel("list-xyo-core", null, false);

if ($this->id_xyo_module_group) {}else{
	$this->processModel("list-xyo-module-group", null, false);
}

$this->processModel("list-xyo-user-group", null, false);

$this->tableSelectInfo = array(
    "id_xyo_module_group" => $this->getParameter("list_id_xyo_module_group", array()),
    "id_xyo_user_group" => $this->getParameter("list_id_xyo_user_group", array()),
    "id_xyo_core" => $this->getParameter("list_id_xyo_core", array()),
    "enabled" => $this->getParameter("list_enabled", array())
);


if ($this->id_xyo_module) {
    unset($this->tableHead["module_name"]);
    unset($this->tableSelect["module_name"]);
    unset($this->tableSort["module_name"]);
    unset($this->tableType["module_name"]);
	
    $this->tableType["module_group_name"]=array(
        "action",array(
            "action" => "edit",
            "id" => array($this->tablePrimaryKey)
        )
    );

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


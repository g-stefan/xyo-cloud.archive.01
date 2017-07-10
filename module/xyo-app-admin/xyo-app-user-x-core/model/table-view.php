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
    "core" => "head_core",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "name" => true,
    "core" => true
);

$this->tableSelect = array(
    "id_xyo_core" => true,
    "enabled" => true
);

$this->tableType = array(
    "name" => array("action",array(
        "action" => "form-edit",
        "primary_key_value" => array($this->primaryKey)
    )),
	"enabled" => array("toggle")			
);

$this->tableSort = array(
    "name" => "ascendent",
    "core" => "none",
	"enabled" => "none",
	"id" => "none"
);

$this->processModel("select-xyo-core");

$this->processModel("select-enabled");
$this->processModel("select-allow");

$this->tableSelectInfo = array(
    "id_xyo_core" => $this->getParameter("select_id_xyo_core", array()),
    "enabled" => $this->getParameter("select_enabled", array())
);

if ($this->id_xyo_user) {
    unset($this->tableHead["name"]);
    unset($this->tableSelect["name"]);    
    unset($this->tableSort["name"]);  
    unset($this->tableSearch["name"]);   
    unset($this->tableType["name"]);       
 
	$this->tableType["core"]=array("action",array(	        
        	    "action" => "form-edit",
	            "primary_key_value" => array($this->primaryKey)
        ));
};    



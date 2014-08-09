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
    "core" => "head_core",
    "enabled" => "head_enabled",
    "id" => "head_id"
);

$this->tableSearch = array(
    "username" => true,
    "core" => true
);

$this->tableSelect = array(
    "id_xyo_core" => true,
    "enabled" => true
);

$this->tableType = array(
    "username" => array("action",array(
        "action" => "edit",
        "id" => array($this->tablePrimaryKey)
    )),
	"enabled" => array("toggle")			
);

$this->tableSort = array(
    "username" => "ascendent",
    "core" => "none",
	"enabled" => "none",
	"id" => "none"
);

$this->processModel("list-xyo-core");

$this->processModel("list-enabled");
$this->processModel("list-allow");

$this->tableSelectInfo = array(
    "id_xyo_core" => $this->getParameter("list_id_xyo_core", array()),
    "enabled" => $this->getParameter("list_enabled", array())
);

if ($this->id_xyo_user) {
    unset($this->tableHead["username"]);
    unset($this->tableSelect["username"]);    
    unset($this->tableSort["username"]);    
    unset($this->tableType["username"]);       
 
	$this->tableType["core"]=array("action",array(	        
        	    "action" => "edit",
	            "id" => array($this->tablePrimaryKey)
        ));
};    



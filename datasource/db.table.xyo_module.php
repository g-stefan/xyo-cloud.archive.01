<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("table_primary_key", "id");

$this->set("table_item", array(
	"id" => array("bigint","DEFAULT","unsigned","auto_increment"),
	"path" => array("varchar",255,null),
	"name" => array("varchar",128,null),
	"description" => array("varchar",255,null),
	"enabled" => array("int",0,"unsigned"),
	"parent" => array("varchar",128,null),		   
	"parameter" => array("int",0,"unsigned")
));

$this->set("table_link",array(
	"xyo_acl_module"=>array("db.table.xyo_acl_module","xyo_module_id","id","delete"),
	"xyo_module_parameter"=>array("db.table.xyo_module_parameter","xyo_module_id","id","delete")
));

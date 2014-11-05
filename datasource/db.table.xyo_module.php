<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("table_primary_key", "id");

$this->set("table_item", array(
		   "id" => array("bigint","DEFAULT","unsigned","auto_increment"),
		   "path" => array("varchar",192,null),
		   "name" => array("varchar",64,null),
		   "description" => array("varchar",92,null),
		   "enabled" => array("int",0,"unsigned"),
		   "version" => array("varchar",32,null),
		   "parent" => array("varchar",64,null),
		   "cmd" => array("int",0,"unsigned"),
		   "component" => array("int",0,"unsigned"),
		   "parameter" => array("int",0,"unsigned"),
	   ));

$this->set("table_link",array(
		   "xyo_acl_module"=>array("db.table.xyo_acl_module","id_xyo_module","id","delete"),
		   "xyo_module_parameter"=>array("db.table.xyo_module_parameter","id_xyo_module","id","delete")
	   ));

<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("table_primary_key", "id");

$this->set("table_item", array(
		   "id" => array("bigint","DEFAULT","unsigned","auto_increment"),
		   "name" => array("varchar",64,null),
		   "description" => array("varchar",192,null),
		   "default" => array("int",0,"unsigned"),
		   "enabled" => array("int",0,"unsigned")
	   ));

$this->set("table_link",array(
		   "xyo_user"=>array("db.table.xyo_user","id_xyo_language","id","set",0)
	   ));

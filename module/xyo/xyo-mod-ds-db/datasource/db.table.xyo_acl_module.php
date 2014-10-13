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
		   "id_xyo_module" => array("bigint",0,"unsigned"),
		   "id_xyo_module_group" => array("bigint",0,"unsigned"),
		   "id_xyo_core" => array("bigint",0,"unsigned"),
		   "id_xyo_user_group" => array("bigint",0,"unsigned"),
		   "enabled" => array("int",0,"unsigned"),
		   "module" => array("varchar",64,null),
		   "order" => array("int",0,"unsigned")
	   ));

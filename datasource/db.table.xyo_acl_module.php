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
	"xyo_module_id" => array("bigint",0,"unsigned"),
	"xyo_module_group_id" => array("bigint",0,"unsigned"),
	"xyo_user_group_id" => array("bigint",0,"unsigned"),
	"xyo_core_id" => array("bigint",0,"unsigned"),
	"enabled" => array("int",0,"unsigned"),
	"module" => array("varchar",128,null),
	"order" => array("int",0,"unsigned")
));

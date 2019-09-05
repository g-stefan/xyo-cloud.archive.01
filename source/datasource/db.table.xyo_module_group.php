<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("table_primary_key", "id");

$this->set("table_item", array(
	"id" => array("bigint","DEFAULT","unsigned","auto_increment"),
	"name" => array("varchar",null,128),
	"description" => array("varchar",null,255),
	"enabled" => array("int",0,"unsigned")
));

$this->set("table_link",array(
	"xyo_acl_module"=>array("db.table.xyo_acl_module","xyo_module_group_id","id","delete")
));

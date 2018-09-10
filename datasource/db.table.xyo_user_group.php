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
	"name" => array("varchar",null,128),
	"description" => array("varchar",null,255),
	"enabled" => array("int",0,"unsigned")
));

$this->set("table_link",array(
	"xyo_acl_module"=>array("db.table.xyo_acl_module","xyo_user_group_id","id","delete"),
	"xyo_user_group_x_user_group_super"=>array("db.table.xyo_user_group_x_user_group","xyo_user_group_id_super","id","delete"),
	"xyo_user_group_x_user_group"=>array("db.table.xyo_user_group_x_user_group","xyo_user_group_id","id","delete"),
	"xyo_user_x_user_group"=>array("db.table.xyo_user_x_user_group","xyo_user_group_id","id","delete")
));

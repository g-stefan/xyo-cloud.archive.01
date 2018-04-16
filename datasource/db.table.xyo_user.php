<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("table_primary_key", "id");

$this->set("table_item", array(
		   "id" => array("bigint","DEFAULT","unsigned","auto_increment"),
		   "id_xyo_user" => array("bigint",0,"unsigned"), // user creator - 0 - creator is one of the system users
		   "username" => array("varchar",255,null),
		   "password" => array("varchar",255,null),
		   "session" => array("varchar",255,null),
		   "enabled" => array("int",0,"unsigned"),
		   "name" => array("varchar",255,null),
		   "created_on" => array("datetime",null),
		   "logged_on" => array("datetime",null),
		   "logged_in" => array("int",0,"unsigned"),
		   "action" => array("int",0,"unsigned"), // authorization checks
		   "action_on" => array("datetime",null), // last time when an authorization was requested
		   "id_xyo_language" => array("bigint",0,"unsigned"),
		   "picture" => array("varchar",255,null),
		   "description" => array("varchar",255,null),
		   "email" => array("varchar",255,null),
		   "invisible" => array("int",0,"unsigned")
	   ));

$this->set("table_link",array(
		   "xyo_user_x_user_group"=>array("db.table.xyo_user_x_user_group","id_xyo_user","id","delete"),
		   "xyo_user"=>array("db.table.xyo_user","id_xyo_user","id","set",0)
	   ));

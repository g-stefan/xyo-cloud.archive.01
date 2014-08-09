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
		   "id" => array("int","DEFAULT","unsigned","auto_increment"),
		   "id_xyo_user" => array("int",0,"unsigned"), // user creator - 0 - creator is one of the system users
		   "username" => array("varchar",64,null),
		   "password" => array("varchar",64,null),
		   "session" => array("varchar",128,null),
		   "enabled" => array("int",0,"unsigned"),
		   "name" => array("varchar",128,null),
		   "created_on" => array("datetime",null),
		   "logged_on" => array("datetime",null),
		   "logged_in" => array("int",0,"unsigned"),
		   "action" => array("int",0,"unsigned"), // authorization checks
		   "action_on" => array("datetime",null), // last time when an authorization was requested
		   "id_xyo_language" => array("int",0,"unsigned"),
		   "description" => array("varchar",192,null),		   
		   "invisible" => array("int",0,"unsigned")
	   ));


<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("query_table", array(
    "user" => "db.table.xyo_user",
    "user_x_user_group" => "db.table.xyo_user_x_user_group",
    "user_x_core" => "db.table.xyo_user_x_core",
    "user_group" => "db.table.xyo_user_group",
    "core" => "db.table.xyo_core",
    "language" => "db.table.xyo_language"
));

$this->set("query_item", array(
    "id" => array("user"=>"id"),
    "id_xyo_user" => array("user"=>"id_xyo_user"),
    "username" => array("user"=>"username"),
    "password" => array("user"=>"password"),
    "session" => array("user"=>"session"),
    "invisible" => array("user"=>"invisible"),
    "enabled" => array("user"=>"enabled"),
    "description" => array("user"=>"description"),
    "name" => array("user"=>"name"),
    "created_on" => array("user"=>"created_on"),
    "logged_on" => array("user"=>"logged_on"),
    "logged_in" => array("user"=>"logged_in"),
    "user_group" => array("user_group"=>"name"),
    "language" => array("language"=>"name"),
    "id_xyo_user_group" => array("user_group"=>"id"),
    "id_xyo_core" => array("core"=>"id"),
    "id_xyo_language" => array("user"=>"id_xyo_language")
));


$this->set("query_link", array(
    "user" => "base",
    "user_x_user_group" => array("outer",array("user_x_user_group"=>"id_xyo_user"),array("user"=>"id")),
    "user_group" => array("outer",array("user_group"=>"id"),array("user_x_user_group"=>"id_xyo_user_group")),
    "user_x_core" => array("outer",array("user_x_core"=>"id_xyo_user"),array("user"=>"id")),
    "core" => array("outer",array("core"=>"id"),array("user_x_core"=>"id_xyo_core")),
    "language" => array("outer",array("language"=>"id"),array("user"=>"id_xyo_language"))
));


$this->set("query_save", array(
    "user" => true
));

$this->set("query_delete", array(
    "user" => true
));

$this->set("query_set_order", array(
    "language" => "user",
    "user_x_user_group" => "user_group",
    "user_x_core" => "core",
    "user" => array("user_x_user_group","user_x_core")
));


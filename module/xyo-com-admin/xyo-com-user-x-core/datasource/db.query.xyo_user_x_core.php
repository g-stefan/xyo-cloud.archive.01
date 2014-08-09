<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("query_table", array(
    "user_x_core" => "db.table.xyo_user_x_core",
    "user" => "db.table.xyo_user",
    "core" => "db.table.xyo_core"
));

$this->set("query_item", array(
    "id" => array("user_x_core" => "id"),
    "id_xyo_user" => array("user_x_core" => "id_xyo_user"),
    "id_xyo_core" => array("user_x_core" => "id_xyo_core"),
    "enabled" => array("user_x_core" => "enabled"),
    "core" => array("core" => "name"),
    "name" => array("user" => "name"),
    "username" => array("user" => "username")
));

$this->set("query_link", array(
    "user_x_core" => "base",
    "core" => array("outer", array("user_group" => "id"), array("user_x_core" => "id_xyo_core")),
    "user" => array("outer", array("user" => "id"), array("user_x_core" => "id_xyo_user"))
));

$this->set("query_save", array(
    "user_x_core" => true
));

$this->set("query_delete", array(
    "user_x_core" => true
));

$this->set("query_set_order", array(
    "core" => "user_x_core",
    "user" => "user_x_core"
));


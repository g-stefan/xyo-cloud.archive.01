<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("query_table", array(
    "user_group_x_user_group" => "db.table.xyo_user_group_x_user_group",
    "user_group_super" => "db.table.xyo_user_group",
    "user_group" => "db.table.xyo_user_group"
));

$this->set("query_item", array(
    "id" => array("user_group_x_user_group" => "id"),
    "id_xyo_user_group_super" => array("user_group_x_user_group" => "id_xyo_user_group_super"),
    "id_xyo_user_group" => array("user_group_x_user_group" => "id_xyo_user_group"),
    "enabled" => array("user_group_x_user_group" => "enabled"),
    "user_group_super" => array("user_group_super" => "name"),
    "user_group" => array("user_group" => "name")
));

$this->set("query_link", array(
    "user_group_x_user_group" => "base",
    "user_group_super" => array("outer", array("user_group_super" => "id"), array("user_group_x_user_group" => "id_xyo_user_group_super")),
    "user_group" => array("outer", array("user_group" => "id"), array("user_group_x_user_group" => "id_xyo_user_group"))
));


$this->set("query_save", array(
    "user_group_x_user_group" => true
));

$this->set("query_delete", array(
    "user_group_x_user_group" => true
));

$this->set("query_set_order", array(
    "user_group" => "user_group_x_user_group"
));


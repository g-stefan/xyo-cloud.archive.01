<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("query_table", array(
    "acl_module" => "db.table.xyo_acl_module",
    "module" => "db.table.xyo_module",
    "module_group" => "db.table.xyo_module_group",
    "user_group" => "db.table.xyo_user_group"
));

$this->set("query_item", array(
    "id" => array("acl_module" => "id"),
    "id_xyo_module" => array("acl_module" => "id_xyo_module"),
    "id_xyo_module_group" => array("acl_module" => "id_xyo_module_group"),
    "id_xyo_user_group" => array("acl_module" => "id_xyo_user_group"),
    "enabled" => array("acl_module" => "enabled"),
    "module" => array("acl_module" => "module"),
    "order" => array("acl_module" => "order"),
    "module_name" => array("module" => "name"),
    "module_group_name" => array("module_group" => "name"),
    "user_group_name" => array("user_group" => "name"),
));

$this->set("query_link", array(
    "acl_module" => "base",
    "module" => array("outer", array("module" => "id"), array("acl_module" => "id_xyo_module")),
    "module_group" => array("outer", array("module_group" => "id"), array("acl_module" => "id_xyo_module_group")),
    "user_group" => array("outer", array("user_group" => "id"), array("acl_module" => "id_xyo_user_group"))
));

$this->set("query_save", array(
    "acl_module" => true
));

$this->set("query_delete", array(
    "acl_module" => true
));

$this->set("query_set_order", array(
    "module" => "acl_module",
    "module_group" => "acl_module",
    "user_group" => "acl_module"
));


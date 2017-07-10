<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("application_title","Datasource backup");
$this->set("msg_done","Done");
$this->set("msg_total","Total");
$this->set("form_title_select","Select");
$this->set("backup_title","Backup");

$this->set("server_empty", "provide server name");
$this->set("username_empty", "provide username");
$this->set("database_empty", "provide database name");

$this->set("unknown_layer", "Unknown database layer:");
$this->set("config_not_writable", "Unable to write config file:");
$this->set("connection_error", "Unable to connect:");
$this->set("connection_unknown", "Unknown connection:");
$this->set("config_file_invalid", "Invalid configuration file");
$this->set("datasource_init", "Datasource initialization error");
$this->set("datasource_not_found", "Datasource not found:");

$this->set("select_connection", "Connection:");
$this->set("backup_to","Backup to:");

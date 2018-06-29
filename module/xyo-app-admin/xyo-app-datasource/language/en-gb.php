<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->set("application_title", "Datasource");

$this->set("label_connection", "Connection");
$this->set("label_datasource", "Datasource");
$this->set("label_option", "Option");

$this->set("select_option_none", "- none -");
$this->set("select_option_create", "create");
$this->set("select_option_recreate", "recreate");
$this->set("select_option_destroy", "destroy");

$this->set("select_connection_none", "- none -");
$this->set("select_datasource_none", "- none -");

$this->set("datasource_create","Datasource storage created");
$this->set("datasource_recreate","Datasource storage recreated");
$this->set("datasource_destroy","Datasource storage destroyed");

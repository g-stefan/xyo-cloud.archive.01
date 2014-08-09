<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

$this->setDataSource($module, "db.table.xyo_datasource");

$this->installDataSource($module, "db.table.xyo_settings");
$this->installDataSource($module, "db.table.xyo_core");
$this->installDataSource($module, "db.table.xyo_datasource");
$this->installDataSource($module, "db.table.xyo_language");
$this->installDataSource($module, "db.table.xyo_module");
$this->installDataSource($module, "db.table.xyo_module_group");
$this->installDataSource($module, "db.table.xyo_module_parameter");
$this->installDataSource($module, "db.table.xyo_acl_module");
$this->installDataSource($module, "db.table.xyo_user");
$this->installDataSource($module, "db.table.xyo_user_group");
$this->installDataSource($module, "db.table.xyo_user_group_x_user_group");
$this->installDataSource($module, "db.table.xyo_user_x_user_group");
$this->installDataSource($module, "db.table.xyo_user_x_core");

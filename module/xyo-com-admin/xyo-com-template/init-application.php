<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDataSource("db.query.xyo_acl_module");
$this->setApplicationDataSource("db.query.xyo_acl_module");
$this->setPrimaryKey("id");

$this->setApplicationIcon($this->site."media/sys/images/preferences-desktop-theme-48.png");

$this->requireElement(array("select","text","textarea","group-begin","group-end","group-row-begin","group-row-end"));


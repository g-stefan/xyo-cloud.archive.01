<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_settings");

$this->requireElement(array("select","text","integer","group-begin","group-end","group-row-begin","group-row-end"));

$this->setDefaultAction($this->getRequest("action", "view"));

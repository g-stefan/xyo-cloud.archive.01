<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_module");
$this->setPrimaryKey("id");

$this->requireElement(array(
	"select",
	"text",
	"textarea",
	"panel-begin",
	"panel-end",
	"row-begin",
	"row-end"
));

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/system-users-48.png");
$this->setApplicationDataSource("db.table.xyo_user_group");
$this->setPrimaryKey("id");

$this->requireElement(array(
	"select",
	"text",
	"textarea",
	"order",
	"panel-begin",
	"panel-end",
	"row-begin",
	"row-end"
));

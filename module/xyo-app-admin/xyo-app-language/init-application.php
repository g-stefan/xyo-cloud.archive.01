<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/preferences-desktop-locale-48.png");
$this->setApplicationDataSource("db.table.xyo_language");
$this->setPrimaryKey("id");

$this->setDialogNew(true);
$this->setDialogEdit(true);

$this->requireComponent(array(
	"select",
	"text",
	"textarea",
	"panel-begin",
	"panel-end",
	"row-begin",
	"row-end"
));

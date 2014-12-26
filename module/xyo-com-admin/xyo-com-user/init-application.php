<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDataSource("db.query.xyo_user");

$this->setApplicationIcon($this->site."media/sys/images/system-users-48.png");
$this->setApplicationDataSource("db.query.xyo_user");
$this->setPrimaryKey("id");

$this->requireElement(array(
	"select",
	"text",
	"textarea",
	"username",
	"password",
	"group-begin",
	"group-end",
	"group-row-begin",
	"group-row-end",
	"file-image-thumbnail",
	"group-box-begin",
	"group-box-end",
	"group-row-separator",
	"email"
));


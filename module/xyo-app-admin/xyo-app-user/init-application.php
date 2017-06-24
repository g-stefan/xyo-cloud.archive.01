<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/system-users-48.png");
$this->setApplicationDataSource("db.query.xyo_user");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"select",
	"text",
	"textarea",
	"username",
	"password",
	"panel-begin",
	"panel-end",
	"row-begin",
	"row-end",
	"file-image-thumbnail",
	"box-begin",
	"box-end",
	"row-separator",
	"email"
));


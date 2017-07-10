<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">person</i>");
$this->setApplicationDataSource("db.table.xyo_user");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$this->requireComponent(array(
	"bootstrap.select",
	"bootstrap.text",
	"bootstrap.textarea",
	"bootstrap.username",
	"bootstrap.password",
	"bootstrap.panel-begin",
	"bootstrap.panel-end",
	"bootstrap.row-begin",
	"bootstrap.row-end",
	"bootstrap.file-image-thumbnail",
	"bootstrap.box-begin",
	"bootstrap.box-end",
	"bootstrap.row-separator",
	"bootstrap.email"
));

                    
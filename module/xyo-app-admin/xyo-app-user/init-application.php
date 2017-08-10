<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">person</i>");
$this->setApplicationDataSource("db.query.xyo_user");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"bootstrap.select",
	"bootstrap.text",
	"bootstrap.textarea",
	"bootstrap.username",
	"bootstrap.password",
	"bootstrap.file-image-thumbnail",
	"bootstrap.email",

	"xui.form-action-begin",
	"xui.form-action-end",
	"xui.panel-begin",
	"xui.panel-end",

	"xui.box-1x2-begin",
	"xui.box-1x2-separator",
	"xui.box-1x2-end"
));


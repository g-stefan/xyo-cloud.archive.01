<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">people</i>");
$this->setApplicationDataSource("db.table.xyo_user_group");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"bootstrap.select",
	"bootstrap.text",
	"bootstrap.textarea",
	"bootstrap.order",

	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

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
	"xui.form-action-begin",
	"xui.form-action-end",
	"xui.panel-begin",
	"xui.panel-end",
	"xui.form-email",
	"xui.form-password",
	"xui.form-username",
	"xui.form-password-required",
	"xui.form-username-required",
	"xui.form-text",
	"xui.form-text-required",
	"xui.form-textarea",
	"xui.form-select",
	"xui.form-file-image",

	"xui.box-1x2-begin",
	"xui.box-1x2-separator",
	"xui.box-1x2-end"
));


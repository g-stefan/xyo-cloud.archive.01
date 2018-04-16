<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">person</i>");
$this->setApplicationDataSource("db.table.xyo_user");
$this->setPrimaryKey("id");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$this->requireComponent(array(
	"xui.form-select",
	"xui.form-text",
	"xui.form-text-required",
	"xui.form-textarea",
	"xui.form-username",
	"xui.form-password",
	"xui.form-username-required",
	"xui.form-password-required",
	"xui.form-file-image",
	"xui.form-email",

	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x2-begin",
	"xui.box-1x2-separator",
	"xui.box-1x2-end"
));

                    
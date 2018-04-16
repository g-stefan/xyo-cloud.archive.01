<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setDefaultAction($this->getRequest("action", "default"));

$this->requireComponent(array(
	"xui.box-1x1-begin",
	"xui.box-1x1-end",
	"xui.form-file-image"
));

<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setHtmlTitle("XYO Cloud - Install");

$this->requireComponent(array(
	"xui.box-x-900-begin",
	"xui.box-x-900-end",
	"xui.panel2-begin",
	"xui.panel2-content",
	"xui.panel2-footer",
	"xui.panel2-end"
));

$this->setHtmlIcon($this->site."lib/xyo/images/applications-internet.ico");

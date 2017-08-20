<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setFormName("install");
$this->setElementPrefix("x");
$this->setViewTemplate("template");
$this->setHtmlCss($this->site."media/sys/css/xyo-app-install.css");

$action_ = "welcome";
$action = $action_;
if ($this->isElement("back")) {
    $action = $this->getRequest("back", $action_);
} else
if ($this->isElement("try")) {
    $action = $this->getRequest("this", $action_);
} else
if ($this->isElement("next")) {
    $action = $this->getRequest("next", $action_);
} else {
    $action = $this->getRequest("select", $action_);
}

$this->setDefaultAction($action);

$this->requireComponent(array(
	"xui.form-action-begin",
	"xui.form-action-end",
	"xui.form-select",
	"xui.form-text",
	"xui.form-text-icon-left",
	"xui.form-username",
	"xui.form-password",
	"xui.list-group",

	"xui.box-x-900-begin",
	"xui.box-x-900-end",
	"xui.panel2-begin",
	"xui.panel2-content",
	"xui.panel2-footer",
	"xui.panel2-end"
));


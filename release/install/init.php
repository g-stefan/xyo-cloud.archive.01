<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setFormName("install");
$this->setElementPrefix("x");
$this->setViewTemplate("template");
$this->setHtmlCss($this->site."lib/xyo/css/xyo-app-install.css");

if ($this->cloud->get("configured")) {
    $this->setDefaultAction("configured");    
	return;
}

$action_ = "language";
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
$this->keepRequest("administrator_username");

$this->requireComponent(array(
	"xui.form-action-begin",
	"xui.form-action-end",
	"xui.form-select",
	"xui.form-text",
	"xui.form-text-icon-left",
	"xui.form-username",
	"xui.form-password",
	"xui.list-group",
	"xui.form-submit-button-group",
	"xui.form-username-required",
	"xui.form-password-required",
));

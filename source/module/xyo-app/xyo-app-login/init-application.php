<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if ($this->user->isAuthorized()) {
    return;
}

$this->setFormName("login");
$this->setElementPrefix("user");
$this->formNameV="";

$action_ = "login";
$action = $action_;
if ($this->isElement("login")) {
    $action = "step";
}

$this->setDefaultAction($action);

$this->setHtmlCss($this->site."lib/xyo/css/xyo-app-login.css");
$this->setHtmlJs($this->site."lib/xyo/js/xyo-app-login.js");

$this->requireComponent("xui.form-text");
$this->requireComponent("xui.form-text-icon-left");
$this->requireComponent("xui.form-username-required");
$this->requireComponent("xui.form-password-required");
$this->requireComponent("xui.form-select");
$this->requireComponent("xui.form-captcha");
$this->requireComponent("xui.form-hidden");

$this->requireComponent("xui.form-action-begin");
$this->requireComponent("xui.form-action-end");
$this->requireComponent("xui.box-1x1-begin");
$this->requireComponent("xui.box-1x1-end");
$this->requireComponent("xui.panel-begin");
$this->requireComponent("xui.panel-end");
$this->requireComponent("xui.separator");

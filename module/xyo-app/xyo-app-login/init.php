<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->user->isAuthorized()) {
    return;
}

$this->setFormName("login");
$this->setElementPrefix("user");

$action_ = "login";
$action = $action_;
if ($this->isElement("login")) {
    $action = "step";
}

$this->setDefaultAction($action);

$this->setHtmlJs($this->site."media/sys/js/xyo-app-login.js");

$this->requireComponent(array("bootstrap.captcha"));

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->set("application_title", "Settings");

$this->set("select_enabled_all", "- enabled -");
$this->set("select_enabled_default_disabled", "- no -");
$this->set("select_enabled_enabled", "yes");
$this->set("select_enabled_disabled", "no");

$this->set("label_website_title","Website title");
$this->set("label_user_logoff_after_idle_time","User logoff after idle time");
$this->set("label_system_user_action","User action");
$this->set("label_system_user_captcha","User captcha");

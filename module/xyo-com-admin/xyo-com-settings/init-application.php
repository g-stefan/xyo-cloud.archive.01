<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_settings");

$this->requireElement(array("select","text","integer","group-begin","group-end","group-row-begin","group-row-end","enable"));

$this->setDefaultAction($this->getRequest("action", "view"));

// system settings

$this->addItem("group-row-begin");
$this->addItem("group-begin");
$this->addItem("text", "website_title","");
$this->addItem("integer", "user_logoff_after_idle_time",15);
$this->addItem("enable", "system_user_action",1);
$this->addItem("enable", "system_user_captcha",1);
$this->addItem("group-end");
$this->addItem("group-begin",null,null,array("title"=>"title_log"));
$this->addItem("enable", "system_log_module",0);
$this->addItem("enable", "system_log_request",0);
$this->addItem("enable", "system_log_response",0);
$this->addItem("enable", "system_log_language",0);
$this->addItem("group-end");
$this->addItem("group-row-end");

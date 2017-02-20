<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->site."media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_settings");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

// system settings

$this->addItem("row-begin");
$this->addItem("panel-begin");
$this->addItem("text", "website_title","");
$this->addItem("integer", "user_logoff_after_idle_time",15);
$this->addItem("enable", "user_action",1);
$this->addItem("enable", "user_captcha",1);
$this->addItem("panel-end");
$this->addItem("panel-begin",null,null,array("title"=>"title_log"));
$this->addItem("enable", "log_module",0);
$this->addItem("enable", "log_request",0);
$this->addItem("enable", "log_response",0);
$this->addItem("enable", "log_language",0);
$this->addItem("panel-end");
$this->addItem("row-end");

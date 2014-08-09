<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateElement("group-row-begin",null);

$this->generateElement("group-begin", null);
$this->generateElement("text", "website_title");
$this->generateElement("integer", "user_logoff_after_idle_time");
$this->generateElement("select", "system_user_action");
$this->generateElement("select", "system_user_captcha");
$this->generateElement("group-end", null);

$this->generateElement("group-row-end",null);

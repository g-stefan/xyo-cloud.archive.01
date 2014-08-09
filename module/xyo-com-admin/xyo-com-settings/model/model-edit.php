<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("form-set");

$enabled = array(
    "*" => $this->getFromLanguage("select_enabled_default_disabled"),
    "1" => $this->getFromLanguage("select_enabled_enabled"),
    "0" => $this->getFromLanguage("select_enabled_disabled")
);

$this->returnParameter("list_system_user_action", $enabled);
$this->returnParameter("list_system_user_captcha", $enabled);


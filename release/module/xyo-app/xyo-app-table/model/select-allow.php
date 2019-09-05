<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$allow = array(
    "*" => $this->getFromLanguage("select_allow_any"),
    "1" => $this->getFromLanguage("select_allow_enabled"),
    "0" => $this->getFromLanguage("select_allow_disabled")
);

$this->setParameter("select_allow", $allow);


<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$invisible = array(
    "*" => $this->getFromLanguage("select_invisible_any"),
    "1" => $this->getFromLanguage("select_invisible_enabled"),
    "0" => $this->getFromLanguage("select_invisible_disabled")
);

$this->setParameter("select_invisible", $invisible);


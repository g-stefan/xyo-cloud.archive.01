<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$cmd = array(
	       "1" => $this->getFromLanguage("select_cmd_enabled"),
	       "0" => $this->getFromLanguage("select_cmd_disabled")
       );

$this->setParameter("select_cmd", $cmd);


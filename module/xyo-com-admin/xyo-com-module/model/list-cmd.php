<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$cmd = array(
	       "*" => $this->getFromLanguage("select_cmd_any"),
	       "1" => $this->getFromLanguage("select_cmd_enabled"),
	       "0" => $this->getFromLanguage("select_cmd_disabled")
       );

$this->returnParameter("list_cmd", $cmd);


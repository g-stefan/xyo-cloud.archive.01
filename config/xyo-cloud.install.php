<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
defined('XYO_CLOUD_INSTALL') or die('Access is denied');

if (file_exists($this->get("path_base") . "install/xyo-cloud.install.php")) {
    require_once($this->get("path_base") . "install/xyo-cloud.install.php");
};


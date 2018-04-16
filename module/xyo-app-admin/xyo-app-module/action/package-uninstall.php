<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("set-primary-key-value");
$this->processModel("set-ds");
if ($this->isError()) {
    
} else {
    $this->processModel("package-uninstall");
}
$this->doRedirect("table-view");

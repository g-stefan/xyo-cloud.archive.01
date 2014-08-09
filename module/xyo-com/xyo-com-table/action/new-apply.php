<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->isNew = true;

$this->processModel("set-ds", null, false);
if ($this->isError()) {
    
} else {

    $this->clearElementError();
    $this->processModel("save-new");
}

if ($this->isError()) {
    $this->doRedirect("new");
    return;
}

$this->isNew = false;
$this->doRedirect("edit");


<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->isDialog=true;
$this->setFormName($this->getFormName()."_new");
$this->doActionBase("form-new");
$this->setViewTemplate(null);
$this->setView("table-dialog-new");
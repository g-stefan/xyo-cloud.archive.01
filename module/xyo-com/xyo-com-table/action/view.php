<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setParameter("toolbar", "toolbar/view");
$this->processModel("model-view", null, false);
$this->processModel("view");
$this->setView("view");

$this->htmlHead->setJs("xyo-com-table","media/sys/js/xyo-com-table-view.js");

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setParameter("toolbar", "toolbar/table-view");
$this->processModel("table-view");
$this->processModel("table-view-process");
$this->setView("table-view");

$this->setHtmlCss($this->site."media/sys/css/xyo-app-table-view.css");
$this->setHtmlJs($this->site."media/sys/js/xyo-app-table-view.js");

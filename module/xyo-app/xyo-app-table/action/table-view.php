<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setParameter("toolbar", "toolbar/table-view");
$this->processModel("table-view");
$this->processModel("table-view-process");
$this->setView("table-view");

$this->setHtmlCss($this->site."lib/xyo/css/xyo-app-table-view.css");
$this->setHtmlJs($this->site."lib/xyo/js/xyo-app-table-view.js");

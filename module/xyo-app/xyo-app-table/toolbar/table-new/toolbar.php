<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItem("apply", "item-js", "<i class=\"material-icons\">done</i>", "apply", "warning", "#", "doCommand('form-new-apply')");

$this->setItem("save", "item-js", "<i class=\"material-icons\">done_all</i>", "save", "success", "#", "doCommand('table-new-save')");

$this->setItem("cancel", "item-js", "<i class=\"material-icons\">close</i>", "cancel", "danger", "#", "doCommand('table-view')");

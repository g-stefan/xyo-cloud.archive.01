<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setItem("apply", "item-js.important", "<i class=\"material-icons\">done</i>", "apply", "warning", "#", "doCommand('form-edit-apply')");

$this->setItem("save", "item-js.important", "<i class=\"material-icons\">done_all</i>", "save", "success", "#", "doCommand('table-edit-save')");

$this->setItem("cancel", "item-js.important", "<i class=\"material-icons\">close</i>", "cancel", "danger", "#", "doCommand('table-view')");


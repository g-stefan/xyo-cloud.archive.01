<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setItem("apply", "item-js", "<i class=\"material-icons\">done</i>", "apply", "warning", "#", "doCommand('form-edit-apply')");

$this->setItemBefore("apply","backup",
        "item-js",
        "<i class=\"material-icons\">storage</i>",
        "backup",
        "primary",
        "#",
        "callDatasourceBackup();"
);

<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setItemBefore("delete","module_acl",
        "item-js",
        "<i class=\"material-icons\">lock</i>",
        "module_acl",
        "primary",
        "#",
        "callModuleAcl();"
);


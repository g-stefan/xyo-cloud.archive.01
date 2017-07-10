<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItemBefore("delete","logout",
        "item-js",
        "<i class=\"material-icons\">lock</i>",
        "logout",
        "warning",
        "#",
        "doCommand('logout');"
);

$this->setItemAfter("logout","user_group",
        "item-js",
        "<i class=\"material-icons\">people</i>",
        "user_group",
       	"primary",
        "#",
        "callUserXUserGroup();"
);

$this->setItemAfter("user_group","core",
        "item-js",
        "<i class=\"material-icons\">device_hub</i>",
        "core",
        "primary",
        "#",
        "callUserXCore();"
);

$this->setItem("new",
        "item-js",
        "<i class=\"material-icons\">add</i>",
        "new",
        "primary",
        "#",
        "doCommand('form-new');"
);

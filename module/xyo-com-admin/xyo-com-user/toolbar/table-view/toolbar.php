<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItemBefore("delete","separator",
        "separator",
        null,
        null,
        true,
        null,
        null
);

$this->setItemBefore("separator","logout",
        "item-js",
        "media/sys/images/system-log-out-32.png",
        "logout",
        true,
        "#",
        "doCommand('logout');"
);

$this->setItemAfter("logout","user_group",
        "item-js",
        "media/sys/images/system-users2-32.png",
        "user_group",
        true,
        "#",
        "callUserXUserGroup();"
);

$this->setItemAfter("user_group","core",
        "item-js",
        "media/sys/images/utilities-terminal2-32.png",
        "core",
        true,
        "#",
        "callUserXCore();"
);

$this->setItem("new",
        "item-js",
        "media/sys/images/contact-new-32.png",
        "new",
        true,
        "#",
        "doCommand('form-new');"
);

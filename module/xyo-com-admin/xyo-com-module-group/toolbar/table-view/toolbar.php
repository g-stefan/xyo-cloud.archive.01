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

$this->setItemBefore("separator","module_acl",
        "item-js",
        $this->pathBase."media/sys/images/utilities-terminal2-32.png",
        "module_acl",
        true,
        "#",
        "callModuleAcl();"
);


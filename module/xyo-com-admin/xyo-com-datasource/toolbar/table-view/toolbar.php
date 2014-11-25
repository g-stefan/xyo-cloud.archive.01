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

$this->setItemBefore("separator","backup",
        "item-js",
        $this->pathBase."media/sys/images/database-32.png",
        "backup",
        true,
        "#",
        "callDatasourceBackup();"
);

$this->setItemBefore("backup","separator2",
        "separator",
        null,
        null,
        true,
        null,
        null
);

$this->setItemBefore("separator2","recreate",
        "item-js",
        $this->pathBase."media/sys/images/view-refresh-32.png",
        "recreate",
        true,
        "#",
        "doCommand('cmd-recreate');"
);

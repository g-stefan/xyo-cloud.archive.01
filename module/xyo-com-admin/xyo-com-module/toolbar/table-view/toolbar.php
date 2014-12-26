<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setItemBefore("delete","separator1",
        "separator",
        null,
        null,
        true,
        null,
        null
);


$this->setItemBefore("separator1","package_uninstall",
        "item-js",
        $this->site."media/sys/images/package-uninstall-32.png",
        "package_uninstall",
        true,
        "#",
        "doCommand('package-uninstall');"
);

$this->setItemBefore("package_uninstall","package_link",
        "item-js",
        $this->site."media/sys/images/package-ok-32.png",
        "package_link",
        true,
        "#",
        "doCommand('create-package-link');"
);

$this->setItemBefore("package_link","package_new",
        "item-js",
        $this->site."media/sys/images/package-new-32.png",
        "package_new",
        true,
        "#",
        "doCommand('create-package');"
);

$this->setItemBefore("package_new","separator2",
        "separator",
        null,
        null,
        true,
        null,
        null
);


$this->setItemBefore("separator2","module_parameter",
        "item-js",
        $this->site."media/sys/images/utilities-terminal2-32.png",
        "module_parameter",
        true,
        "#",
        "callModuleParameter();"
);

$this->setItemAfter("module_parameter","module_acl",
        "item-js",
        $this->site."media/sys/images/utilities-terminal2-32.png",
        "module_acl",
        true,
        "#",
        "callModuleAcl();"
);


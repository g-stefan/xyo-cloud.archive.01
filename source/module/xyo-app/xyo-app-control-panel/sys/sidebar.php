<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$popup = &$this->addItem($menu, "item", "<i class=\"material-icons\">settings</i>", "application", $module, null);
$this->addGroup($popup, "xyo-control-panel");

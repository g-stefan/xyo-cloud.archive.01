<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$option = $this->getElementValueStr("option");
if (strlen($option)) {
    $db = &$this->getDataSource($this->ds->name);
    if ($db) {
        if ($option === "create") {
            $db->createStorage();
        } else
        if ($option === "recreate") {
            $db->recreateStorage();
        } else
        if ($option === "destroy") {
            $db->destroyStorage();
        }
    }
}

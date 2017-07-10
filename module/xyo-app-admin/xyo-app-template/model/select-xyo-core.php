<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$listCore = array();
$listCore["*"] = $this->getFromLanguage("select_xyo_core_any");
$dsCore = &$this->getDataSource("db.table.xyo_core");
if ($dsCore) {
    $dsCore->clear();
    $dsCore->setOrder("name",1);
    for ($dsCore->load(); $dsCore->isValid(); $dsCore->loadNext()) {
        $listCore[$dsCore->id] = $dsCore->name;
    }
}

$this->setParameter("select_id_xyo_core", $listCore);


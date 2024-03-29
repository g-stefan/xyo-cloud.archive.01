<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$listModule = array();
$listModule["*"] = $this->getFromLanguage("select_xyo_module_any_edit");
$dsModule = &$this->getDataSource("db.table.xyo_module");
if ($dsModule) {
    $dsModule->clear();
    $dsModule->setOrder("name",1);
    for ($dsModule->load(); $dsModule->isValid(); $dsModule->loadNext()) {
        $listModule[$dsModule->id] = $dsModule->name;
    }
}

$this->setParameter("select_xyo_module_id", $listModule);


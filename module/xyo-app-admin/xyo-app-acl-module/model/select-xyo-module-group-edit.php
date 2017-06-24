<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$listModuleGroup = array();
$listModuleGroup["*"] = $this->getFromLanguage("select_xyo_module_group_any_edit");
$dsModuleGroup = &$this->getDataSource("db.table.xyo_module_group");
if ($dsModuleGroup) {
    $dsModuleGroup->clear();
    $dsModuleGroup->setOrder("name",1);
    for ($dsModuleGroup->load(); $dsModuleGroup->isValid(); $dsModuleGroup->loadNext()) {
        $listModuleGroup[$dsModuleGroup->id] = $dsModuleGroup->name;
    }
}

$this->setParameter("select_id_xyo_module_group", $listModuleGroup);


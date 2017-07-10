<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$dsAclModule = &$this->getDataSource("db.table.xyo_acl_module");
$dsAclModuleParameter = &$this->getDataSource("db.table.xyo_acl_module_parameter");
$dsAclProperty = &$this->getDataSource("db.table.xyo_acl_property");

$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
    
    if ($dsAclModule) {
        $dsAclModule->clear();
        $dsAclModule->id_xyo_core = $this->ds->id;
        $dsAclModule->delete();
    }
    if ($dsAclModuleParameter) {
        $dsAclModuleParameter->clear();
        $dsAclModuleParameter->id_xyo_core = $this->ds->id;
        $dsAclModuleParameter->delete();
    }
    if ($dsAclProperty) {
        $dsAclProperty->clear();
        $dsAclProperty->id_xyo_core = $this->ds->id;
        $dsAclProperty->delete();
    }
    
    $this->processModel("router-delete");
    $this->ds->delete();    
}

$this->setAlert("info_delete_ok");

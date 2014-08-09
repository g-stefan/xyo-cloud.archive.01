<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$dsAclModule = &$this->getDataSource("db.table.xyo_acl_module");
$dsModuleParameter = &$this->getDataSource("db.table.xyo_module_parameter");
$dsModule = &$this->getDataSource("db.table.xyo_module");
$dsFormElement = &$this->getDataSource("db.table.xyo_form_element");


$this->ds->clear();
$this->ds-> {$this->tablePrimaryKey} = $this->id;
for ($this->ds->load(); $this->ds->isValid(); $this->ds->loadNext()) {
	if($dsFormElement) {
		$dsFormElement->clear();
		$dsAclModule->id_xyo_module = $this->ds->id;
		$dsAclModule->delete();
	}
	if ($dsAclModule) {
		$dsAclModule->clear();
		$dsAclModule->id_xyo_module = $this->ds->id;
		$dsAclModule->delete();
	}
	if ($dsModuleParameter) {
		$dsModuleParameter->clear();
		$dsModuleParameter->id_xyo_module = $this->ds->id;
		$dsModuleParameter->delete();
	}
	if($dsModule) {
		$dsModule->clear();
		$dsModule->is_module=$this->ds->name;
		for($dsModule->load(); $dsModule->isValid(); $dsModule->loadNext()) {
			$dsModule->is_module=null;
			$dsModule->save();
		}
	}
	$this->ds->delete();
}

$this->setMessage("info", "info_delete_ok");

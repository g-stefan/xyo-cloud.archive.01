<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$name = $this->getElementValueStr("name");
if (strlen($name) == 0) {
	$this->setElementError("name", $this->getFromLanguage("el_name_empty"));
}

if ($this->isElementError()) {
	return;
};

$this->ds->clear();
$this->ds->name = $name;
if ($this->ds->load(0, 1)) {
	if ($this->isNew) {
		$this->setElementError("name", $this->getFromLanguage("el_name_already_exists"));
		return;
	} else {
		if ($this->ds->id != $this->primaryKeyValue) {
			$this->setElementError("name", $this->getFromLanguage("el_name_already_exists"));
			return;
		}
	}
}

$updateAcl=0;

if ($this->isNew) {

} else {

	$this->ds->clear();
	$this->ds->id = $this->primaryKeyValue;
	if ($this->ds->load(0, 1)) {

		if($name===$this->ds->name) {
		} else {
			$updateAcl=1;
		}



	} else {
		$this->setError("error", array("err_id_not_found" => $this->primaryKeyValue));
		return;
	}
}


$this->ds->name=$name;
$this->ds->parent=$this->getElementValueStr("parent");
$this->ds->path=$this->getElementValueStr("path");
$this->ds->description=$this->getElementValueStr("description");
$this->ds->enabled=$this->getElementValueInt("enabled", 0, "*");

if($this->ds->save()) {

	if($updateAcl) {
		$dsAclModule=&$this->getDataSource("db.table.xyo_acl_module");
		if($dsAclModule) {
			$dsAclModule->id_xyo_module=$this->ds->id;
			for($dsAclModule->load(); $dsAclModule->isValid(); $dsAclModule->loadNext()) {
				$dsAclModule->module=$this->ds->name;
				$dsAclModule->save();
			}
		}
	}

	if($this->isNew) {
		@mkdir($this->cloud->getStoragePath($name,0777,true));
		@copy($this->path."index.html",$this->cloud->getStorageFilename($name,"index.html"));

		$dsAclModule=&$this->getDataSource("db.table.xyo_acl_module");
		if($dsAclModule) {
			$dsAclModule->id_xyo_module=$this->ds->id;
			$dsAclModule->module=$this->ds->name;

			$dsAclModule->id_xyo_module_group = $this->getElementValueInt("id_xyo_module_group", 0,"*");
			$dsAclModule->id_xyo_user_group = $this->getElementValueInt("id_xyo_user_group", 0,"*");

			$dsAclModule->id_xyo_core = $this->getElementValueInt("id_xyo_core", 0,"*");

			$dsAclModule->enabled = $this->getElementValueInt("acl_enabled", 0,"*");
			$dsAclModule->order = $this->getElementValueInt("order", 0);


			$dsAclModule->save();
		}
	}

} else {
	$this->setError("error", "err_save_error");
	return;
}

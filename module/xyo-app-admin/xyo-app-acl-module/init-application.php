<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setApplicationIcon("<i class=\"material-icons\">lock</i>");

$this->setApplicationDataSource("db.query.xyo_acl_module");
$this->setPrimaryKey("id");

$this->setDialogNew(true);
$this->setDialogEdit(true);

$this->requireComponent(array(
	"xui.form-select",
	"xui.form-order",
	"xui.form-switch",
	"xui.panel-begin",
	"xui.panel-end",
	"xui.box-1x1-begin",
	"xui.box-1x1-end"
));

$xyo_acl_module_id=1 * $this->getParameterRequest("xyo_acl_module_id", 0);
if($xyo_acl_module_id){
	$dsAclModule=&$this->getDataSource($this->applicationDataSource);
	$dsAclModule->id=$xyo_acl_module_id;
	if($dsAclModule->load(0,1)){
		$this->setParameter("xyo_module_id",$dsAclModule->xyo_module_id);
	};
};

$this->xyo_module_id = 1 * $this->getParameterRequest("xyo_module_id", 0);
if ($this->xyo_module_id) {
    $this->setKeepRequest("xyo_module_id", $this->xyo_module_id);

    $dsModule = &$this->getDataSource("db.table.xyo_module");
    if ($dsModule) {
        $dsModule->clear();
        $dsModule->id = $this->xyo_module_id;
        if ($dsModule->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name);
        }
    }
    
}


$this->xyo_module_group_id = 1 * $this->getParameterRequest("xyo_module_group_id", 0);
if ($this->xyo_module_group_id) {
    $this->setKeepRequest("xyo_module_group_id", $this->xyo_module_group_id);

    $dsModuleGroup = &$this->getDataSource("db.table.xyo_module_group");
    if ($dsModuleGroup) {
        $dsModuleGroup->clear();
        $dsModuleGroup->id = $this->xyo_module_group_id;
        if ($dsModuleGroup->load(0, 1)) {
			if ($this->xyo_module_id) {
	            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name . " [". $dsModuleGroup->name. "]");
			}else{
	            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModuleGroup->name);
			}
        }
    }
    
}


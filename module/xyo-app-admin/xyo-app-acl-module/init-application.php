<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon("<i class=\"material-icons\">lock</i>");

$this->setApplicationDataSource("db.query.xyo_acl_module");
$this->setPrimaryKey("id");

$this->requireComponent(array(
	"bootstrap.select",
	"bootstrap.order",
	"bootstrap.panel-begin",
	"bootstrap.panel-end",
	"bootstrap.row-begin",
	"bootstrap.row-end"
));

$id_xyo_acl_module=1 * $this->getParameterRequest("id_xyo_acl_module", 0);
if($id_xyo_acl_module){
	$dsAclModule=&$this->getDataSource($this->applicationDataSource);
	$dsAclModule->id=$id_xyo_acl_module;
	if($dsAclModule->load(0,1)){
		$this->setParameter("id_xyo_module",$dsAclModule->id_xyo_module);
	};
};

$this->id_xyo_module = 1 * $this->getParameterRequest("id_xyo_module", 0);
if ($this->id_xyo_module) {
    $this->setKeepRequest("id_xyo_module", $this->id_xyo_module);

    $dsModule = &$this->getDataSource("db.table.xyo_module");
    if ($dsModule) {
        $dsModule->clear();
        $dsModule->id = $this->id_xyo_module;
        if ($dsModule->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name);
        }
    }
    
}


$this->id_xyo_module_group = 1 * $this->getParameterRequest("id_xyo_module_group", 0);
if ($this->id_xyo_module_group) {
    $this->setKeepRequest("id_xyo_module_group", $this->id_xyo_module_group);

    $dsModuleGroup = &$this->getDataSource("db.table.xyo_module_group");
    if ($dsModuleGroup) {
        $dsModuleGroup->clear();
        $dsModuleGroup->id = $this->id_xyo_module_group;
        if ($dsModuleGroup->load(0, 1)) {
			if ($this->id_xyo_module) {
	            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name . " [". $dsModuleGroup->name. "]");
			}else{
	            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModuleGroup->name);
			}
        }
    }
    
}


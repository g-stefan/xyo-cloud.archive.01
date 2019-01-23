<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->setApplicationIcon("<i class=\"material-icons\">list</i>");
$this->setApplicationDataSource("db.table.xyo_module_parameter");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$xyo_acl_module_id=1 * $this->getParameterRequest("xyo_acl_module_id", 0);
$this->xyo_module_id = 1 * $this->getParameterRequest("xyo_module_id", 0);
if ($this->xyo_module_id==0) {
	if ($xyo_acl_module_id) {
		$dsAclModule = &$this->getDataSource("db.table.xyo_acl_module");
		if($dsAclModule){
			$dsAclModule->clear();
			$dsAclModule->id=$xyo_acl_module_id;
			if($dsAclModule->load(0,1)){
				$this->xyo_module_id=$dsAclModule->xyo_module_id;
			};				
		};
	};		    
};


if ($this->xyo_module_id) {
    $this->setKeepRequest("xyo_module_id", $this->xyo_module_id);

    $dsModule = &$this->getDataSource("db.table.xyo_module");
    if ($dsModule) {
        $dsModule->clear();
        $dsModule->id = $this->xyo_module_id;
        if ($dsModule->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name);
	    $this->addModule($dsModule->name);
	    $this->requireComponent(array_keys($this->elements));
        }
    }
    
}


// 
// Keep caller
//
$this->keepRequestStack();

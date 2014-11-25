<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->setApplicationIcon($this->pathBase."media/sys/images/utilities-terminal-48.png");
$this->setApplicationDataSource("db.table.xyo_module_parameter");

$this->setDefaultAction($this->getRequest("action", "form-edit"));

$id_xyo_acl_module=1 * $this->getParameterRequest("id_xyo_acl_module", 0);
$this->id_xyo_module = 1 * $this->getParameterRequest("id_xyo_module", 0);
if ($this->id_xyo_module==0) {
	if ($id_xyo_acl_module) {
		$dsAclModule = &$this->getDataSource("db.table.xyo_acl_module");
		if($dsAclModule){
			$dsAclModule->clear();
			$dsAclModule->id=$id_xyo_acl_module;
			if($dsAclModule->load(0,1)){
				$this->id_xyo_module=$dsAclModule->id_xyo_module;
			};				
		};
	};		    
};


if ($this->id_xyo_module) {
    $this->setKeepRequest("id_xyo_module", $this->id_xyo_module);

    $dsModule = &$this->getDataSource("db.table.xyo_module");
    if ($dsModule) {
        $dsModule->clear();
        $dsModule->id = $this->id_xyo_module;
        if ($dsModule->load(0, 1)) {
            $this->setApplicationTitle($this->getFromLanguage("application_title") . " - " . $dsModule->name);
	    $this->addModule($dsModule->name);
	    $this->requireElement(array_keys($this->elements));
        }
    }
    
}


// 
// Keep caller
//
$this->keepRequestStack();

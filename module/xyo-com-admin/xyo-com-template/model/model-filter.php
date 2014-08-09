<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

foreach ($this->viewData as $key => $value) {

	    if ($this->viewData[$key]["core_name"]) {
        
    	} else {
        	$this->viewData[$key]["core_name"] = "*";
	    }    

	$dsAclCheck=&$this->getDataSource($this->applicationDataSource);
	$dsAclCheck->module_group_name="xyo-system-exec";
	$dsAclCheck->id_xyo_module=$this->viewData[$key]["id_xyo_module"];
	$dsAclCheck->id_xyo_core=$this->viewData[$key]["id_xyo_core"];
	$dsAclCheck->enabled=1;
	if($dsAclCheck->load(0,1)){
		$this->viewData[$key]["active"]=1;
	};
}

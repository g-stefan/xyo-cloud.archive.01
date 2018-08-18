<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$toggle = trim($this->getRequest("toggle"));
if (strlen($toggle)) {
    
} else {
    return;
}

if($toggle=="active"){
}else{
	return;
};

$this->ds->clear();
$this->ds->{$this->primaryKey} = $this->primaryKeyValue;
if($this->ds->load(0,1)){

	$dsAclCheck=&$this->ds->copyThis();
	$dsAclCheck->clear();
	$dsAclCheck->xyo_core_id=$this->ds->xyo_core_id;
	$dsAclCheck->module_group_name="xyo-template";
	$moduleList=array();
	for($dsAclCheck->load();$dsAclCheck->isValid();$dsAclCheck->loadNext()){
		if($dsAclCheck->xyo_module_id==$this->ds->xyo_module_id){}else{
			$moduleList[]=$dsAclCheck->xyo_module_id;
		};
	};

	if(count($moduleList)>0){

		$dsAclCheck->clear();
		$dsAclCheck->module_group_name=array("xyo-system-load","xyo-system-exec");
		$dsAclCheck->xyo_core_id=$this->ds->xyo_core_id;
		$dsAclCheck->xyo_module_id=$moduleList;
		$dsAclCheck->update(array("enabled"=>0));

	};
	
	$dsAclCheck->clear();
	$dsAclCheck->module_group_name="xyo-system-load";
	$dsAclCheck->xyo_user_group_id=0;//all users
	$dsAclCheck->xyo_core_id=$this->ds->xyo_core_id;
	$dsAclCheck->xyo_module_id=$this->ds->xyo_module_id;
	$dsAclCheck->tryLoad(0,1);	
	$dsAclCheck->module=$this->ds->module_name;
	$dsAclCheck->enabled=1;
	$dsAclCheck->save();

	$dsAclCheck->clear();
	$dsAclCheck->module_group_name="xyo-system-exec";
	$dsAclCheck->xyo_user_group_id=0;//all users 
	$dsAclCheck->xyo_core_id=$this->ds->xyo_core_id;
	$dsAclCheck->xyo_module_id=$this->ds->xyo_module_id;
	$dsAclCheck->tryLoad(0,1);	
	$dsAclCheck->module=$this->ds->module_name;
	$dsAclCheck->enabled=1;
	$dsAclCheck->save();

};


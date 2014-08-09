<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

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
$this->ds->{$this->tablePrimaryKey} = $this->id;
if($this->ds->load(0,1)){

	$dsAclCheck=&$this->ds->copyThis();
	$dsAclCheck->clear();
	$dsAclCheck->id_xyo_core=$this->ds->id_xyo_core;
	$dsAclCheck->module_group_name="xyo-template";
	$moduleList=array();
	for($dsAclCheck->load();$dsAclCheck->isValid();$dsAclCheck->loadNext()){
		if($dsAclCheck->id_xyo_module==$this->ds->id_xyo_module){}else{
			$moduleList[]=$dsAclCheck->id_xyo_module;
		};
	};

	if(count($moduleList)>0){

		$dsAclCheck->clear();
		$dsAclCheck->module_group_name=array("xyo-system-load","xyo-system-exec");
		$dsAclCheck->id_xyo_core=$this->ds->id_xyo_core;
		$dsAclCheck->id_xyo_module=$moduleList;
		$dsAclCheck->update(array("enabled"=>0));

	};
	
	$dsAclCheck->clear();
	$dsAclCheck->module_group_name="xyo-system-load";
	$dsAclCheck->id_xyo_user_group=0;//all users
	$dsAclCheck->id_xyo_core=$this->ds->id_xyo_core;
	$dsAclCheck->id_xyo_module=$this->ds->id_xyo_module;
	$dsAclCheck->tryLoad(0,1);	
	$dsAclCheck->module=$this->ds->module_name;
	$dsAclCheck->enabled=1;
	$dsAclCheck->save();

	$dsAclCheck->clear();
	$dsAclCheck->module_group_name="xyo-system-exec";
	$dsAclCheck->id_xyo_user_group=0;//all users 
	$dsAclCheck->id_xyo_core=$this->ds->id_xyo_core;
	$dsAclCheck->id_xyo_module=$this->ds->id_xyo_module;
	$dsAclCheck->tryLoad(0,1);	
	$dsAclCheck->module=$this->ds->module_name;
	$dsAclCheck->enabled=1;
	$dsAclCheck->save();

};


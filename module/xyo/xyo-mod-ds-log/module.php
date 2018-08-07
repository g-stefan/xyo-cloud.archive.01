<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_mod_ds_Log";

class xyo_mod_ds_Log extends xyo_Module {

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
	}

	function &getLogTable(&$dsTable){
		$logTable=&$dsTable->copyThis();
		$logTable->disableNotify();
		$logTable->setStorageName("log_".$dsTable->getStorageName());
		$logTable->setPrimaryKey("log_id");
		$logTable->setField("log_id","bigint","DEFAULT","unsigned","auto_increment",0);
		$logTable->setField("log_datetime","datetime",null,null,null,1);
		$logTable->setField("log_delete","integer",0,"unsigned",null,2);
		$logTable->setField("log_xyo_user_id","bigint",0,"unsigned",null,3);
		$logTable->setField("log_name","varchar",128,null,null,4);
		$logTable->setField("log_username","varchar",128,null,null,5);		
		return $logTable;
	}

	function onDataSourceBeforeCreateStorage($dsTable){
		$logTable=&$this->getLogTable($dsTable);
		$logTable->createStorage();
	}

	function onDataSourceBeforeDestroyStorage($dsTable){
		$logTable=&$this->getLogTable($dsTable);
		$logTable->destroyStorage();
	}

	function onDataSourceBeforeLoad($dsTable){
	}
                 
	function onDataSourceBeforeSave($dsTable){
		$modUser=&$this->cloud->getModule("xyo-mod-ds-user");
		$logTable=&$this->getLogTable($dsTable);
		$logTable->createStorage();
		$logTable->log_datetime="NOW";
		$logTable->log_xyo_user_id=$modUser->info->id;
		$logTable->log_name=$modUser->info->name;
		$logTable->log_username=$modUser->info->username;
		$logTable->insert();
	}

	function onDataSourceBeforeDelete($dsTable){
		$modUser=&$this->cloud->getModule("xyo-mod-ds-user");
		$logTable=&$this->getLogTable($dsTable);
		$logTable->createStorage();
		$logTable->log_datetime="NOW";
		$logTable->log_delete=1;
		$logTable->log_xyo_user_id=$modUser->info->id;
		$logTable->log_name=$modUser->info->name;
		$logTable->log_username=$modUser->info->username;
		$logTable->insert();
	}

}


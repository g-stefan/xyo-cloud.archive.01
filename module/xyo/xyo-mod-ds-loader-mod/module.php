<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_ds_Loader";

class xyo_mod_ds_Loader extends xyo_Module {

	var $modDs;
	var $modCore;
	var $modUser;
	var $dsModule;
	var $dsModuleGroup;
	var $dsModuleParameter;
	var $dsAclModule;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);

		$this->modDs = &$this->cloud->getModule("xyo-mod-datasource");
		$this->modAcl = &$this->cloud->getModule("xyo-mod-ds-acl");

		if ($this->modDs &&
		    $this->modAcl) {

			$this->dsModule = &$this->modDs->getDataSource("db.table.xyo_module");
			$this->dsModuleGroup = &$this->modDs->getDataSource("db.table.xyo_module_group");
			$this->dsAclModule = &$this->modDs->getDataSource("db.table.xyo_acl_module");
			$this->dsModuleParameter = &$this->modDs->getDataSource("db.table.xyo_module_parameter");

			if ($this->dsModule &&
			    $this->dsModuleGroup &&
			    $this->dsAclModule) {

			} else {
				$this->moduleDisable();
				return;
			}
		} else {
			$this->moduleDisable();
			return;
		}
	}

	function systemSetModule($name) {

		$dsModule = &$this->dsModule->copyThis();
		$dsModule->clear();
		$dsModule->name = $name;
		$dsModule->enabled = 1;
		if ($dsModule->load(0, 1)) {

			$dsAclModule = &$this->dsAclModule->copyThis();
			$dsAclModule->clear();
			$dsAclModule->id_xyo_module = $dsModule->id;

			if($this->modAcl->processDsAclSys($dsAclModule)) {

				$parameter = array();
				if ($dsModule->parameter) {
					$this->dsModuleParameter->clear();
					$this->dsModuleParameter->id_xyo_module=$dsModule->id;
					$this->dsModuleParameter->enabled=1;
					for($this->dsModuleParameter->load(); $this->dsModuleParameter->isValid(); $this->dsModuleParameter->loadNext()) {
						$parameter[$this->dsModuleParameter->name]=$this->dsModuleParameter->value;
					};
				}

				if(strlen($dsModule->is_module)>0) {
					$this->cloud->setModule($dsModule->is_module, $dsModule->path, $dsModule->name, true, $parameter, true, true, false);
				} else {
					$this->cloud->setModule($dsModule->parent, $dsModule->path, $dsModule->name, true, $parameter, $dsModule->cmd, true, false);
				}

				if ($dsModule->component) {
					$this->cloud->setModuleAsComponent($dsModule->name, true);
				}

				return true;
			}

			$this->cloud->setModule($dsModule->parent, $dsModule->path, $name, false, null, false, true, false);
			if ($dsModule->component) {

				$this->cloud->setModuleAsComponent($dsModule->name, true);
			}
			return true;
		}

		$this->cloud->setModule(null, null, $name, false, null, false, true, false);
		return true;
	}

	function systemSetGroup($name) {

		$dsModuleGroup = &$this->dsModuleGroup->copyThis();
		$dsModuleGroup->clear();
		$dsModuleGroup->name = $name;
		$dsModuleGroup->enabled = 1;
		$dsModuleGroup->id_xyo_core=$this->modAcl->getAclSysCore();
		if ($dsModuleGroup->load(0, 1)) {

			$dsAclModule = &$this->dsAclModule->copyThis();
			$dsAclModule->clear();
			$dsAclModule->id_xyo_module_group = $dsModuleGroup->id;

			if($this->modAcl->processDsAclSysList($dsAclModule)) {
				for(; $dsAclModule->isValid(); $dsAclModule->loadNext()) {
					$this->cloud->setModuleGroup($dsAclModule->module, $name, $dsAclModule->order);
				}
			}
		}
		return false;
	}

}


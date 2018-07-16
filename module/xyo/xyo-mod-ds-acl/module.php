<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$className = "xyo_mod_ds_Acl";

class xyo_mod_ds_acl_Info {

	public $aclUserGroup; // any and user groups
	public $aclUser; // any and user id
	public $aclUserId; // only user id

}

class xyo_mod_ds_Acl extends xyo_Module {

	protected $acl;
	protected $dsUser;
	protected $dsUserGroup;
	protected $dsUserGroupXUserGroup;
	protected $dsUserXUserGroupSuper;
	protected $dsAclProperty;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isOk) {
			$this->reloadDataSource();
			$this->acl = &$this->getDefaultAcl();
		}
	}

	public function &getDefaultAcl() {
		$retV = new xyo_mod_ds_acl_Info;
		$retV->aclUserGroup = 0;
		$retV->aclUser = 0;
		$retV->aclUser1 = 0;
		return $retV;
	}

	public function reloadDataSource() {

		$this->dsUser = &$this->getDataSource("db.table.xyo_user");
		$this->dsUserGroup = &$this->getDataSource("db.table.xyo_user_group");
		$this->dsUserGroupXUserGroup = &$this->getDataSource("db.table.xyo_user_group_x_user_group");
		$this->dsUserXUserGroup = &$this->getDataSource("db.table.xyo_user_x_user_group");

	}

	public function &getUserIdAcl($xyo_user_id) {
		if ($this->dsUser) {

		} else {
			$retV = &$this->getDefaultAcl();
			return $retV;
		}

		$retV = new xyo_mod_ds_acl_Info;

		$retV->aclUserGroup = array();
		if($xyo_user_id) {
			$retV->aclUser = array(0, $xyo_user_id);
		} else {
			$retV->aclUser = 0;
		};
		$retV->aclUserId = $xyo_user_id;

		$listUserGroup = array();

		if ($xyo_user_id) {

			$dsUserXUserGroup = &$this->dsUserXUserGroup->copyThis();
			$dsUserXUserGroup->clear();
			$dsUserXUserGroup->xyo_user_id = $xyo_user_id;
			$dsUserXUserGroup->enabled = 1;

			for ($dsUserXUserGroup->load(); $dsUserXUserGroup->isValid(); $dsUserXUserGroup->loadNext()) {
				$listUserGroup[$dsUserXUserGroup->xyo_user_group_id]=$dsUserXUserGroup->xyo_user_group_id;
			};

		} else {
			$dsUserGroup = &$this->dsUserGroup->copyThis();
			$dsUserGroup->clear();
			$dsUserGroup->name = "public";
			$dsUserGroup->enabled = 1;

			if ($dsUserGroup->load(0, 1)) {
				$listUserGroup[$dsUserGroup->id]=$dsUserGroup->id;
			};
		}


		if (count($listUserGroup)) {
			$dsUserGroupXUserGroup = &$this->dsUserGroupXUserGroup->copyThis();
			$dsUserGroupXUserGroup->clear();
			$dsUserGroupXUserGroup->xyo_user_group_id_super = array_keys($listUserGroup);
			$dsUserGroupXUserGroup->enabled = 1;

			for ($dsUserGroupXUserGroup->load(); $dsUserGroupXUserGroup->isValid(); $dsUserGroupXUserGroup->loadNext()) {
				$listUserGroup[$dsUserGroupXUserGroup->xyo_user_group_id] = $dsUserGroupXUserGroup->xyo_user_group_id;
			}
		}

		$listUserGroup[0]=0;

		$retV->aclUserGroup=array_keys($listUserGroup);

		return $retV;
	}

	public function &getUserAcl($username) {
		if ($this->dsUser) {
			$dsUser = &$this->dsUser->copyThis();
			$dsUser->username = $username;
			$dsUser->enabled = 1;
			if ($dsUser->load(0, 1)) {
				$retV = &$this->getUserIdAcl($dsUser->id);
				return $retV;
			}
		}
		$retV = &$this->getDefaultAcl();
		return $retV;
	}

	public function setDsAcl(&$ds, &$acl) {
		$ds->xyo_user_group_id = $acl->aclUserGroup;
	}

	public function setDsAclSys(&$ds) {
		$this->setDsAcl($ds, $this->acl);
	}

	public function setAclSys(&$acl) {
		$this->acl = &$acl;
	}

	public function &getAclSys() {
		return $this->acl;
	}

	public function setAclSysUserId($xyo_user_id) {
		$retV = $this->getUserIdAcl($xyo_user_id);		
		$this->setAclSys($retV);
	}

	public function setAclSysUser($username) {
		$retV = $this->getUserAcl($username);
		$this->setAclSys($retV);
	}


	public function processDsAcl(&$ds, &$acl) {
		$ds->enabled=1;
		$ds->xyo_user_group_id = $acl->aclUserGroup;
		return $ds->load(0,1);
	}

	public function processDsAclList(&$ds, &$acl) {
		$ds->enabled=1;
		$ds->xyo_user_group_id = $acl->aclUserGroup;
		return $ds->load();
	}

	public function processDsAclSys(&$ds) {
		return $this->processDsAcl($ds, $this->acl);
	}

	public function processDsAclSysList(&$ds) {
		return $this->processDsAclList($ds, $this->acl);
	}


}


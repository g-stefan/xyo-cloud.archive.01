<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Application";

class xyo_mod_Application extends xyo_Module {

	protected $user;
	protected $accessControlList;

	protected $applicationDataSource;

	protected $ds;
	protected $isNew;
	protected $primaryKey;
	protected $primaryKeyValue;

	protected $applicationTitle;
	protected $applicationIcon;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isOk) {

			$this->accessControlList = &$this->cloud->getModule("xyo-mod-ds-acl");
			$this->user = &$this->cloud->getModule("xyo-mod-ds-user");		

			if ($this->accessControlList &&
			    $this->user) {

			} else {
				$this->moduleDisable();
			}

			$this->loadLanguage();

			$this->ds = null;
			$this->isNew = true;
			$this->primaryKeyValue = null;
			$this->primaryKey = "_unknown_";
			$this->applicationDataSource=null;

		        $this->applicationIcon = "<i class=\"material-icons\">extension</i>";
			$this->applicationTitle = null;			
		}
	}

	public function setApplicationDataSource($name) {
		$this->applicationDataSource=$name;
	}

	public function setDs() {
		$this->ds = &$this->getDataSource($this->applicationDataSource);
		if ($this->ds) {
			return true;
		};
		return false;
	}

	public function setPrimaryKey($value_) {
		$this->primaryKey=$value_;
	}

	public function setPrimaryKeyValue($value_) {
		$primaryKeyValue_ = explode(",", $value_);
		$c=count($primaryKeyValue_);
		if ($c) {
			if($c==1) {
				$this->primaryKeyValue=$primaryKeyValue_[0];
			} else {
				$this->primaryKeyValue=array();
				foreach ($primaryKeyValue_ as $value) {
					$this->primaryKeyValue[]=$value;
				}
				$this->primaryKeyValue=array_unique($this->primaryKeyValue);
			}
			return true;
		}
		return false;
	}

	public function setPrimaryKeyValueOne($value_) {
		$primaryKeyValue_ = explode(",", $value_);
		$c=count($primaryKeyValue_);
		if ($c) {
			$this->primaryKeyValue=$primaryKeyValue_[0];
			return true;
		}
		return false;
	}

	public function setApplicationIcon($icon) {
		$this->applicationIcon = $icon;
	}

	public function getApplicationIcon() {
		return $this->applicationIcon;
	}

	public function setApplicationTitle($title) {
		$this->applicationTitle = $title;
	}

	public function getApplicationTitle() {
		return $this->applicationTitle;
	}


}


<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Application";

class xyo_mod_Application extends xyo_mod_Language {

	protected $user;
	protected $dataSourceProvider;
	protected $htmlHead;
	protected $htmlFooter;
	protected $accessControlList;

	protected $applicationDataSource;
	protected $applicationFormElementCache_;

	protected $ds;
	protected $isNew;
	protected $id;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isOk) {
			$this->accessControlList = &$this->cloud->getModule("xyo-mod-ds-acl");
			$this->user = &$this->cloud->getModule("xyo-mod-ds-user");
			$this->dataSourceProvider = &$this->cloud->getModule("xyo-mod-datasource");
			$this->htmlHead = &$this->cloud->getModule("xyo-mod-htmlhead");
			$this->htmlFooter = &$this->cloud->getModule("xyo-mod-htmlfooter");

			if ($this->accessControlList &&
			    $this->user &&
			    $this->dataSourceProvider &&
			    $this->htmlHead) {

			} else {
				$this->moduleDisable();
			}


			$this->ds = null;
			$this->isNew = true;
			$this->id = 0;
			$this->applicationDataSource=null;

			$this->applicationFormElementCache_=array();
		}
	}

	public function generateHtmlHead() {
		return $this->htmlHead->moduleMainExec();
	}

	public function generateHtmlFooter() {
		return $this->htmlFooter->moduleMainExec();
	}

	public function &getDataSource($ds) {
		return $this->dataSourceProvider->getDataSource($ds);
	}

	public function setDataSource($name) {
		return $this->dataSourceProvider->setModuleDataSource($this->name, $name);
	}

	public function getFromLanguage($name, $default_=null) {
		return $this->language->get($name, $default_);
	}

	public function eLanguage($name, $default_=null) {
		echo $this->language->get($name, $default_);
	}

	public function setHtmlHeadCss($file) {
		$this->htmlHead->setCss($this->name, $file);
	}

	public function setHtmlHeadJs($file) {
		$this->htmlHead->setJs($this->name, $file);
	}

	public function setHtmlHeadJsSource($file) {
		$this->htmlHead->jsSource($this->name, $file);
	}

	public function setHtmlHeadCssIf($file, $if_) {
		$this->htmlHead->setCss($this->name, $file, $if_);
	}

	public function setHtmlHeadJsIf($file, $if_) {
		$this->htmlHead->setJs($this->name, $file, $if_);
	}

	public function setHtmlHeadMetaName($name, $content, $extra_=null) {
		$this->htmlHead->setMetaName($this->name, $name, $content, $extra_);
	}

	public function setHtmlHeadHttpEquiv($name, $content, $extra_=null) {
		$this->htmlHead->setMetaName($this->name, $name, $content, $extra_);
	}

	public function setHtmlHeadTitle($name) {
		$this->htmlHead->setTitle($name);
	}

	public function setHtmlHeadLink($rel, $file, $type) {
		$this->htmlHead->setLink($this->name, $rel, $file, $type);
	}

	public function setHtmlFooterJs($file) {
		$this->htmlFooter->setJs($this->name, $file);
	}

	public function setHtmlFooterJsIf($file, $if_) {
		$this->htmlFooter->setJs($this->name, $file, $if_);
	}

	public function setHtmlFooterJsSource($file) {
		$this->htmlFooter->jsSource($this->name, $file);
	}

	public function setApplicationDataSource($name) {
		$this->applicationDataSource=$name;
	}

	public function requireElement($element) {
		$scan=array();
		foreach($element as $value) {
			if(array_key_exists($value,$this->applicationFormElementCache_)) {
			} else {
				$scan[]=$value;
			};
		};
		if(count($scan)) {
			foreach($scan as $formElement) {
				$this->language->includeFile($this->cloud->get("path_base")."form/language/".$this->getSystemLanguage()."/".$formElement.".php");
				$this->processViewX($formElement,"-require","form");
				$this->applicationFormElementCache_[$formElement]=true;
			};
		};
	}

	public function processElement($elType,$elName,$parameters=null) {
		if($parameters) {
		} else {
			$parameters=array();
		};
		if(array_key_exists($elType,$this->applicationFormElementCache_)) {
			$this->processViewX($elType,"-process","form",array_merge($parameters,array("element" => $elName)));
		};
	}

	public function generateElement($elType,$elName,$parameters=null) {
		if($parameters) {
		} else {
			$parameters=array();
		};
		if(array_key_exists($elType,$this->applicationFormElementCache_)) {
			if($this->processViewX($elType,"","form",array_merge($parameters,array("element" => $elName)))) {
				return true;
			};
		};
		return false;
	}

	public function setDs() {
		$this->ds = &$this->getDataSource($this->applicationDataSource);
		if ($this->ds) {
			return true;
		};
		return false;
	}

	public function setId($value_) {
		$id_ = explode(";", $value_);
		$c=count($id_);
		if ($c) {
			if($c==1) {
				$this->id=1*$id_[0];
			} else {
				$this->id=array();
				foreach ($id_ as $value) {
					$this->id[]=1*$value;
				}
				$this->id=array_unique($this->id);
			}
			return true;
		}
		return false;
	}

	public function setIdOne($value_) {
		$id_ = explode(";", $value_);
		$c=count($id_);
		if ($c) {
			$this->id=1*$id_[0];
			return true;
		}
		return false;
	}
}


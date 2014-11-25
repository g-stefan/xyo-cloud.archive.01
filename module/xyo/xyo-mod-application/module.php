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
	protected $applicationWidgetCache_;

	protected $ds;
	protected $isNew;
	protected $primaryKey;
	protected $primaryKeyValue;

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
			$this->primaryKeyValue = null;
			$this->primaryKey = "_unknown_";
			$this->applicationDataSource=null;

			$this->applicationFormElementCache_=array();
			$this->applicationWidgetCache_=array();
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

	public function setHtmlFooterJsSource($source) {
		$this->htmlFooter->jsSource($this->name, $source);
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
				$this->language->includeFile("form/language/".strtolower($this->getSystemLanguage())."/".$formElement.".php");
				$this->processViewX($formElement,"-require","form");
				$this->applicationFormElementCache_[$formElement]=true;
			};
		};
	}

	public function processElement($elType,$elName=null,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($elType,$this->applicationFormElementCache_)) {
			$this->processViewX($elType,"-process","form",array_merge($arguments,array("element" => $elName)));
		};
	}

	public function generateElement($elType,$elName=null,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($elType,$this->applicationFormElementCache_)) {
			if($this->processViewX($elType,"","form",array_merge($arguments,array("element" => $elName)))) {
				return true;
			};
		};
		return false;
	}

	public function requireWidget($widget) {
		$scan=array();
		foreach($widget as $value) {
			if(array_key_exists($value,$this->applicationWidgetCache_)) {
			} else {
				$scan[]=$value;
			};
		};
		if(count($scan)) {
			foreach($scan as $widget_) {
				$this->language->includeFile("widget/language/".strtolower($this->getSystemLanguage())."/".$widget_.".php");
				$this->processViewX($plugin_,"-require","widget");
				$this->applicationWidgetCache_[$plugin_]=true;
			};
		};
	}

	public function generateWidget($widget,$parameters=null) {
		if($parameters) {
		} else {
			$parameters=array();
		};
		if(array_key_exists($widget,$this->applicationWidgetCache_)) {
			if($this->processViewX($widget,"","widget",$parameters)) {
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
}


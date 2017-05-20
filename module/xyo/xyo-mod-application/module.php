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
	protected $applicationElementCache_;

	protected $ds;
	protected $isNew;
	protected $primaryKey;
	protected $primaryKeyValue;

	protected $fnCallId_;

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

			$this->applicationElementCache_=array();

			$this->fnCallId_=0;
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

	public function setHtmlFooterJsSourceOrAjax($source) {
		if($this->isAjax()){
			$this->ejsBegin();
			echo $source;
			$this->ejsEnd();
		}else{
			$this->htmlFooter->jsSource($this->name, $source);
		};
	}

	public function setApplicationDataSource($name) {
		$this->applicationDataSource=$name;
	}

	public function requireElement($element) {
		$scan=array();
		foreach($element as $value) {
			if(array_key_exists($value,$this->applicationElementCache_)) {
			} else {
				$scan[]=$value;
			};
		};
		if(count($scan)) {
			foreach($scan as $formElement) {
				$elementCategory=explode(".",$formElement);
				if(count($elementCategory)>1){
					$this->language->includeFile("element/".$elementCategory[0]."/language/".strtolower($this->getSystemLanguage())."/".$elementCategory[1].".php");
					$this->processElementX($elementCategory[0]."/",".require");
					$this->processElementX(str_replace(".","/",$formElement),".require");
					$this->applicationElementCache_[$formElement]=true;					
					return;
				};
				$this->language->includeFile("element/language/".strtolower($this->getSystemLanguage())."/".$formElement.".php");
				$this->processElementX($formElement,".require");
				$this->applicationElementCache_[$formElement]=true;
			};
		};
	}

	public function processElement($elType,$elName=null,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($elType,$this->applicationElementCache_)) {
			$this->processElementX(str_replace(".","/",$elType),".process",array_merge($arguments,array("element" => $elName)));
		};
	}

	public function generateElement($elType,$elName=null,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($elType,$this->applicationElementCache_)) {
			if($this->processElementX(str_replace(".","/",$elType),"",array_merge($arguments,array("element" => $elName)))) {
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

	public function eGenerateCallRequestJs($requestThis,$module,$request,$functionJs,$processJs){
		++$this->fnCallId_;
		$request_=$this->callRequest(
				$this->requestThisDirect($requestThis),
				$this->requestModuleDirect($module,$request)
		);
		$action_=$this->requestUri($this->moduleFromRequestDirect($request_));
		echo "<form name=\"fn_call_".$this->fnCallId_."\" method=\"POST\" action=\"".$action_."\">";
			$this->eFormBuildRequest($request_);
		echo "</form>";		
		$this->ejsBegin();
		echo "function ".$functionJs."(){";
		echo " if(".$processJs."(document.forms.fn_call_".$this->fnCallId_.")){";
		echo "	document.forms.fn_call_".$this->fnCallId_.".submit();";
		echo " };";
		echo " return false;";
		echo "};";
		$this->ejsEnd();
		return "fn_call_".$this->fnCallId_;
	}

	public function processElementX($name,$suffix,$arguments=null) {
		$this->moduleCallList[]=$this->name;
		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)){
			$this->arguments=array();
		};

		$this->viewPath=$this->cloud->getTemplatePath() . "sys/element/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList);
			return true;
		};

		$this->viewPath="element/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList);
			return true;
		};

		$this->popArguments();
		array_pop($this->moduleCallList);
		return false;
	}


}


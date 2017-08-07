<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

class xyo_Module extends xyo_Config {

	//
	// Parameters Manager
	//

	protected $parameters;
	protected $parametersStack;

	private function initParametersManager(&$moduleObject) {
		$this->parameters=$moduleObject->parameters;
		if(is_null($this->parameters)) {
			$this->parameters=array();
		};
		$parametersStack=array();
	}

	public function pushParameters() {
		$this->parametersStack[] = $this->parameters;
	}

	public function popParameters() {
		$this->parameters = array_pop($this->parametersStack);
		if ($this->parameters) {
		} else {
			$this->parameters=array();
		}
	}

	public function mergeParameters($parameters) {
		if (is_null($parameters)) {
			return;
		};
		$this->parameters = array_merge($this->parameters, $parameters);
	}

	public function clearParameters() {
		$this->parameters = array();
	}

	public function setParameter($name, $value) {
		$this->parameters[$name] = $value;
	}

	public function getParameter($name, $default=null) {
		if (array_key_exists($name, $this->parameters)) {
			return $this->parameters[$name];
		}
		return $default;
	}

	public function copyParameter($name, $otherName) {
		if(array_key_exists($otherName,$this->parameters)) {
			$this->parameters[$name] = $this->parameters[$otherName];
		};
	}

	public function getParameterBase($name, $default=null) {
		if (array_key_exists($name, $this->parameters)) {
			return $this->parameters[$name];
		}
		foreach ($this->modulePathBase as $moduleName => $path) {
			$module=&$this->getModule($moduleName);
			if($module->isParameter($name)) {
				return $module->getParameter($name,$default);
			};
		};
		return $default;
	}

	public function isParameter($name) {
		return array_key_exists($name, $this->parameters);
	}

	//
	// Arguments Manager
	//

	protected $arguments;
	protected $argumentsStack;

	private function initArgumentsManager() {
		$this->arguments=array();
		$this->argumentsStack=array();
	}

	public function pushArguments() {
		$this->argumentsStack[] = $this->arguments;
		$this->arguments = array();
	}

	public function popArguments() {
		$this->arguments = array_pop($this->argumentsStack);
		if ($this->arguments) {
		} else {
			$this->arguments=array();
		}
	}

	public function mergeArguments($arguments) {
		if (is_null($arguments)) {
			return;
		};
		$this->arguments = array_merge($this->arguments, $arguments);
	}

	public function setArgument($name, $value) {
		$this->arguments[$name] = $value;
	}

	public function getArgument($name, $default=null) {
		if (array_key_exists($name, $this->arguments)) {
			return $this->arguments[$name];
		}
		return $default;
	}

	//
	// Alert Manager
	//

	protected $alert;
	protected $alertType;

	private function initAlertManager() {
		$this->alert=null;
		$this->alertType=null;
	}

	public function clearAlert() {
		$this->alert=null;
		$this->alertType=null;
	}

	public function isAlert() {
		return !is_null($this->alert);
	}

	public function getAlert($default=null) {
		if (!is_null($this->alert)) {
			return $this->alert;
		};
		return $default;
	}

	public function getAlertType($default=null) {
		if (!is_null($this->alertType)) {
			return $this->alertType;
		};
		return $default;
	}

	public function setAlert($value,$type=null) {
		$this->alert=$value;
		$this->alertType=$type;
	}

	//
	// Error Manager
	//

	protected $error;

	private function initErrorManager() {
		$this->error=null;
	}

	public function clearError() {
		$this->error=null;
	}

	public function isError() {
		return !is_null($this->error);
	}

	public function getError($default=null) {
		if (!is_null($this->error)) {
			return $this->error;
		};
		return $default;
	}

	public function setError($value) {
		$this->error=$value;
	}

	//
	// Language Manager
	// ISO Language Codes
	//

	protected $language;

	private function initLanguageManager() {
		$this->language=new xyo_Language($this->cloud);
	}

	function loadLanguage() {
		$this->loadLanguageDirect($this->cloud->get("language"));
	}

	function loadLanguageDirect($language_) {
		$this->language->setLanguage($language_);
		$language = strtolower($language_);
		foreach (array_reverse($this->modulePathBase, true) as $module => $path) {
			$this->language->includeFile($path . "language/" . $language . ".php");
		}
	}

	function loadLanguageFromPathDirect($path, $language_) {
		$language = strtolower($language_);
		$this->language->setLanguage($language_);
		$this->language->includeFile($path . $language . ".php");
	}

	function loadLanguageFromModuleDirect($module, $language_) {
		$language = strtolower($language_);
		$path = $this->cloud->getModulePath($module);
		if ($path) {
			$this->language->setLanguage($language_);
			$this->language->includeFile($path . "language/" . $language . ".php");
		}
	}

	public function generateViewLanguage($name=null, $parameters=null) {
		if ($this->generateView(strtolower($this->cloud->get("language")) . "/" . $name, $parameters)) {
			return true;
		}
		return $this->generateView($name, $parameters);
	}

	public function isLanguage($name) {
		return $this->language->isLanguage($name);
	}

	public function getSystemLanguage() {
		return $this->cloud->get("language");
	}

	public function getLanguageType() {
		return $this->language->getLanguageType();
	}

	public function isLanguageType($type) {
		return $this->language->isLanguageType($type);
	}


	public function getFromLanguage($name, $default_=null) {
		return $this->language->get($name, $default_);
	}

	public function eLanguage($name, $default_=null) {
		echo $this->language->get($name, $default_);
	}

	//
	//  From Manager
	//

	protected $formName;
	protected $formNameV;
	protected $elementValue;
	protected $elementPrefix;
	protected $elementPrefixV;

	protected $elementAlert;
	protected $elementAlertType;
	protected $elementError;

	private function initFormManager() {
		$this->setFormName("fn");
		$this->setElementPrefix("e");
		$this->clearElementAlert();
		$this->clearElementError();
	}

	public function setFormName($name) {
		$this->formName = $name;
		$this->formNameV = $name . "_";
	}

	public function getFormName() {
		return $this->formName;
	}

	public function eFormName() {
		echo htmlspecialchars($this->formName);
	}

	public function setElementPrefix($name) {
		$this->elementPrefix = $name;
		$this->elementPrefixV = $name . "_";
	}

	public function getElementPrefix() {
		return $this->elementPrefix;
	}

	public function getElementName($name) {
		return $this->elementPrefixV . $name;
	}

	public function eElementName($name) {
		echo htmlspecialchars($this->getElementName($name));
	}

	public function getElementId($name, $postfix=null) {
		return $this->formNameV . $this->elementPrefixV . $name . ($postfix ? "_" . $postfix : "");
	}

	public function eElementId($name, $postfix=null) {
		echo htmlspecialchars($this->getElementId($name, $postfix));
	}

	public function setElementValue($name, $value) {
		$this->elementValue[$this->elementPrefixV . $name] = $value;
	}

	public function getElementValue($name, $default=null) {
		return $this->cloud->getParameterRequest($this->elementPrefixV . $name, $this->elementValue, $default);
	}

	public function clearElements() {
		$this->elementValue = array();
	}

	public function isElement($name) {
		return $this->cloud->isParameterRequest($this->elementPrefixV . $name, $this->elementValue);
	}

	public function eElementValue($name, $default=null) {
		echo htmlspecialchars($this->getElementValue($name, $default));
	}

	public function setElementValueIfNotExists($name, $value) {
		if (array_key_exists($name, $this->elementValue)) {

		} else {
			$this->elementValue[$name] = $value;
		}
	}

	public function clearElementAlert($name=null) {
		if(is_null($name)){
			$this->elementAlert=array();
			$this->elementAlertType=array();
			return;
		};
		$this->elementAlert[$this->elementPrefixV . $name]=null;
		$this->elementAlertType[$this->elementPrefixV . $name]=null;
	}

	public function isElementAlert($name=null) {
		if(is_null($name)){
			return count($this->elementAlert)>0;
		};
		if(array_key_exists($this->elementPrefixV . $name,$this->elementAlert)){
			return !is_null($this->elementAlert[$this->elementPrefixV . $name]);
		};
		return false;
	}

	public function setElementAlert($name, $value, $type=null) {
		$this->elementAlert[$this->elementPrefixV . $name]=$value;
		$this->elementAlertType[$this->elementPrefixV . $name]=$type;
	}

	public function getElementAlert($name,$default=null) {
		if(array_key_exists($this->elementPrefixV . $name,$this->elementAlert)){
			if(!is_null($this->elementAlert[$this->elementPrefixV . $name])){
				return $this->elementAlert[$this->elementPrefixV . $name];
			};
		};
		return $default;
	}

	public function getElementAlertType($name,$default=null) {
		if(array_key_exists($this->elementPrefixV . $name,$this->elementAlertType)){
			if(!is_null($this->elementAlertType[$this->elementPrefixV . $name])){
				return $this->elementAlertType[$this->elementPrefixV . $name];
			};
		};
		return $default;
	}

	public function eElementAlert($name, $default=null) {
		echo $this->getElementAlert($name, $default);
	}

	public function clearElementError($name=null) {
		if(is_null($name)){
			$this->elementError=array();
			if($this->isError()){
				if($this->getError()==="element"){
					$this->clearError();
				};
			};
			return;
		};
		$this->elementError[$this->elementPrefixV . $name]=null;
	}

	public function isElementError($name=null) {
		if(is_null($name)){
			return count($this->elementError)>0;
		};
		if(array_key_exists($this->elementPrefixV . $name,$this->elementError)){
			return !is_null($this->elementError[$this->elementPrefixV . $name]);
		};
		return false;
	}

	public function setElementError($name, $value) {
		$this->elementError[$this->elementPrefixV . $name]=$value;
		$this->setError("element");
	}

	public function getElementError($name,$default=null) {
		if(array_key_exists($this->elementPrefixV . $name,$this->elementError)){
			if(!is_null($this->elementError[$this->elementPrefixV . $name])){
				return $this->elementError[$this->elementPrefixV . $name];
			};
		};
		return $default;
	}

	public function eElementError($name, $default=null) {
		echo $this->getElementError($name, $default);
	}

	public function getElementValueStr($element, $default=null, $size=0) {
		$retV=$this->getElementValue($element,$default);
		if(!is_null($retV)) {
			if($size) {
				return substr(trim($retV),0,$size);
			};
			return trim($retV);
		}
		return null;
	}

	public function getElementValueInt($element, $default=0, $exDefault=null) {
		$retV = $this->getElementValue($element);
		if($retV) {
			$retV=trim($retV);
			if($exDefault) {
				if($retV===$exDefault) {
					return 1*$default;
				}
			}
			if(is_numeric($retV)) {
				return 1*$retV;
			}
		}
		return 1*$default;
	}

	public function eFormAction($parameters=null) {
		echo $this->cloud->requestUriModule($this->name, $parameters);
	}

	public function eFormActionModule($module,$parameters=null) {
		echo $this->cloud->requestUriModule($module, $parameters);
	}

	public function eFormActionRoute($requestMain,$parameters=null) {
		echo $this->cloud->requestUriRouteModule($requestMain,$this->name, $parameters);
	}

	public function eFormActionRouteModule($requestMain,$module,$parameters=null) {
		echo $this->cloud->requestUriRouteModule($requestMain,$module, $parameters);
	}

	public function eFormBuildRequest($requestDirect) {
		foreach ($requestDirect as $key => $value) {
			echo "<input type=\"hidden\" name=\"" . htmlspecialchars($key) . "\" value=\"" . htmlspecialchars($value) . "\">";
		}
	}

	public function eFormRequest($parameters=null) {
		$this->eFormRequestModule($this->name, $this->arrayMerge($this->keepRequest, $parameters));
	}

	public function eFormRequestModule($module, $parameters=null) {
		$this->eFormBuildRequest($this->cloud->requestModuleDirect($module, $parameters));
	}

	//
	// Component Manager
	//

	protected $componentCache;

	public function initComponentManager() {
		$this->componentCache=array();
	}

	public function requireComponent($component) {
		$scan=array();
		if(!is_array ($component)) {
			$component=array($component);
		};
		foreach($component as $value) {
			if(!array_key_exists($value,$this->componentCache)) {
				$scan[]=$value;
			};
		};
		if(count($scan)) {
			foreach($scan as $appComponent) {
				$componentFileName=str_replace(".","/",$appComponent);
				$index=strrpos($componentFileName,"/");
				if($index!==false) {
					$componentName=substr($componentFileName,$index+1);
					$componentPath=substr($componentFileName,0,$index);
					$this->language->includeFile("component/".$componentPath."/language/".strtolower($this->getSystemLanguage())."/".$componentName.".php");
					$this->processComponentX($componentPath."/",".require");
					$this->processComponentX($componentFileName,".require");
					$this->componentCache[$appComponent]=true;
					if(file_exists("component/".$componentFileName.".php")) {
						continue;
					};
					die("FATAL: Required component ".$appComponent." not found.");
				};
				$this->language->includeFile("component/language/".strtolower($this->getSystemLanguage())."/".$appComponent.".php");
				$this->processComponentX($appComponent,".require");
				$this->componentCache[$appComponent]=true;
				if(file_exists("component/".$appComponent.".php")) {
					continue;
				};
				die("FATAL: Required component ".$appComponent." not found.");
			};
		};
	}

	public function processComponent($comType,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($comType,$this->componentCache)) {
			$this->processComponentX(str_replace(".","/",$comType),".process",$arguments);
			return;
		};
		die("FATAL: Component ".$comType." not loaded.");
	}

	public function generateComponent($comType,$arguments=null) {
		if($arguments) {
		} else {
			$arguments=array();
		};
		if(array_key_exists($comType,$this->componentCache)) {
			$this->processComponentX(str_replace(".","/",$comType),"",$arguments);
			return;
		};
		die("FATAL: Component ".$comType." not loaded.");
	}

	public function processComponentX($name,$suffix,$arguments=null) {
		$this->moduleCallList[]=$this->name;
		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)) {
			$this->arguments=array();
		};

		$this->viewPath=$this->cloud->getTemplatePath() . "sys/component/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList);
			return true;
		};

		$this->viewPath="component/";
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

	//
	// HTML Manager
	//

	public function setHtmlClass($class) {
		$this->cloud->setHtmlClass($class);
	}

	public function removeHtmlClass($class) {
		$this->cloud->removeHtmlClass($class);
	}

	public function getHtmlClass() {
		$this->cloud->getHtmlClass();
	}

	public function eHtmlClass() {
		$this->cloud->eHtmlClass();
	}

	public function eHtmlLanguage() {
		$this->cloud->eHtmlLanguage();
	}

	public function setHtmlJs($url,$opt="defer") {
		$this->cloud->setHtmlJs($this->name,$url,$opt);
	}

	public function removeHtmlJs($url) {
		$this->cloud->removeHtmlJs($this->name,$url);
	}

	public function removeHtmlJsAll() {
		$this->cloud->removeHtmlJsAll($this->name);
	}

	public function eHtmlJs() {
		$this->cloud->eHtmlJs();
	}

	public function setHtmlJsSource($code,$opt="defer") {
		$this->cloud->setHtmlJsSource($this->name,$code,$opt);
	}

	public function removeHtmlJsSourceAll() {
		$this->cloud->removeHtmlJsSourceAll($this->name);
	}

	public function eHtmlJsSource() {
		$this->cloud->eHtmlJsSource();
	}

	public function setHtmlCss($url) {
		$this->cloud->setHtmlCss($this->name,$url);
	}

	public function removeHtmlCss($url) {
		$this->cloud->removeHtmlCss($this->name,$url);
	}

	public function removeHtmlCssAll() {
		$this->cloud->removeHtmlCssAll($this->name);
	}

	public function eHtmlCss() {
		$this->cloud->eHtmlCss();
	}

	public function setHtmlTitle($title) {
		$this->cloud->setHtmlTitle($title);
	}

	public function eHtmlTitle() {
		$this->cloud->eHtmlTitle();
	}

	public function setHtmlDescription($description) {
		$this->cloud->setHtmlDescription($description);
	}

	public function eHtmlDescription() {
		$this->cloud->eHtmlDescription();
	}

	public function setHtmlIcon($uri) {
		$this->cloud->setHtmlIcon($uri);
	}

	public function eHtmlIcon() {
		$this->cloud->eHtmlIcon();
	}

	public function setHtmlJsSourceOrAjax($source,$opt="defer") {
		$this->cloud->setHtmlJsSourceOrAjax($this->name,$source,$opt);
	}

	public function eHtmlScript() {
		$this->cloud->eHtmlScript();
	}

	//
	// Module Manager
	//

	public function loadModule($module) {
		return $this->cloud->loadModule($module);
	}

	public function requireModule($module) {
		return $this->cloud->requireModule($module);
	}

	public function execModule($module, $parameters=null) {
		return $this->cloud->execModule($module, $parameters);
	}

	public function &getModule($module) {
		return $this->cloud->getModule($module);
	}

	public function getModulePath($module) {
		return $this->cloud->getModulePath($module);
	}

	public function getModulePathBase($module) {
		return $this->cloud->getModulePathBase($module);
	}


	//
	// Group Manager
	//

	public function loadGroup($group) {
		return $this->cloud->loadGroup($group);
	}

	public function execGroup($group, $parameters=null) {
		return $this->cloud->execGroup($group, $parameters);
	}

	public function &getGroup($group) {
		return $this->cloud->getGroup($group);
	}

	//
	// Application Manager
	//

	public function redirectApplication($name,$parameters=null) {
		$this->cloud->redirectApplication($name,$parameters);
	}

	public function processApplication($name,$parameters=null) {
		$this->cloud->processApplication($name,$parameters);
	}

	public function setDefaultApplication($name) {
		$this->cloud->setDefaultApplication($name);
	}

	public function getDefaultApplication($name) {
		return $this->cloud->getDefaultApplication($name);
	}

	public function setApplication($module) {
		return $this->cloud->setApplication($module);
	}

	public function isApplication($name) {
		return $this->cloud->isApplication($name);
	}

	public function getApplication() {
		return $this->cloud->getApplication();
	}

	public function generateApplicationView($parameters=null) {
		return $this->cloud->generateApplicationView($parameters);
	}

	//
	// Request Manager
	//

	protected $keepRequest;
	protected $fnCallId;

	private function initRequestManager() {
		$this->keepRequest=array();
		$this->fnCallId=0;
	}

	public function requestUri($parameters=null) {
		return $this->cloud->requestUri($parameters);
	}

	public function requestModuleDirect($module, $parameters=null) {
		return $this->cloud->requestModuleDirect($module, $parameters);
	}

	public function requestUriModule($module, $parameters=null) {
		return $this->cloud->requestUriModule($module, $parameters);
	}

	public function requestUriRouteModule($requestMain,$module, $parameters=null) {
		return $this->cloud->requestUriRouteModule($requestMain,$module, $parameters);
	}

	public function requestThisDirect($parameters=null) {
		return $this->cloud->requestModuleDirect($this->name, $this->arrayMerge($this->keepRequest, $parameters));
	}

	public function requestUriThis($parameters=null) {
		return $this->cloud->requestUriModule($this->name, $this->arrayMerge($this->keepRequest, $parameters));
	}

	public function keepRequest($name) {
		if ($this->cloud->isParameterRequest($name, $this->parameters)) {
			$this->keepRequest[$name] = $this->cloud->getParameterRequest($name, $this->parameters);
		}
	}

	public function keepRequestElement($name) {
		if ($this->cloud->isParameterRequest($this->elementPrefixV . $name, $this->elementValue)) {
			$this->keepRequest[$this->elementPrefixV . $name] = $this->cloud->getParameterRequest($this->elementPrefixV . $name, $this->elementValue);
		}
	}

	public function clearKeepRequest() {
		$this->keepRequest = array();
	}

	public function setKeepRequest($name, $value) {
		$this->keepRequest[$name] = $value;
	}

	public function setKeepRequestElement($name, $value) {
		$this->keepRequest[$this->elementPrefixV . $name] = $value;
	}

	public function unsetKeepRequest($name) {
		if (array_key_exists($name, $this->keepRequest)) {
			unset($this->keepRequest[$name]);
		}
	}

	public function unsetKeepRequestElement($name) {
		if (array_key_exists($this->elementPrefixV . $name, $this->keepRequest)) {
			unset($this->keepRequest[$this->elementPrefixV . $name]);
		}
	}

	public function getKeepRequestDirect($parameters=null) {
		return $this->arrayMerge($this->keepRequest, $parameters);
	}

	public function getRequestDirect() {
		return $this->cloud->getRequestDirect();
	}

	public function setRequestDirect($value) {
		$this->cloud->setRequestDirect($value);
	}

	public function transferKeepRequest($name,$transfer) {
		$this->transferRequest($name,$transfer);
		$this->keepRequest($transfer);
	}

	public function pushRequest($request) {
		return $this->cloud->pushRequest($request);
	}

	public function popRequest($request) {
		return $this->cloud->popRequest($request);
	}

	public function keepRequestStack() {
		$request=$this->cloud->getRequestDirect();
		foreach($request as $key=>$value) {
			if(strncmp($key,"x_",2)==0) {
				$this->keepRequest[$key] = $value;
			};
		};
	}

	public function unsetKeepRequestStack() {
		foreach($this->keepRequest as $key=>$value) {
			if(strncmp($key,"x_",2)==0) {
				unset($this->keepRequest[$key]);
			};
		};
	}

	public function moduleFromRequest($request) {
		return $this->cloud->moduleFromRequest($request);
	}

	public function moduleFromRequestDirect($request) {
		return $this->cloud->moduleFromRequestDirect($request);
	}

	public function callRequest($requestThis,$requestCall=null) {
		return $this->cloud->callRequest($requestThis,$requestCall);
	}

	public function returnRequest($requestThis,$requestReturn=null) {
		return $this->cloud->returnRequest($requestThis,$requestReturn);
	}

	public function getRequestStack($request) {
		return $this->cloud->getRequestStack($request);
	}

	public function hasRequestStack($request) {
		return $this->cloud->hasRequestStack($request);
	}

	public function runRequest($request) {
		return $this->cloud->runRequest($request);
	}

	public function isRequestCall() {
		return $this->hasRequestStack($this->getRequestDirect());
	}

	public function getRequest($name, $default=null) {
		return $this->cloud->getRequest($name, $default);
	}

	public function setRequest($name, $value) {
		return $this->cloud->setRequest($name, $value);
	}

	public function isRequest($name) {
		return $this->cloud->isRequest($name);
	}

	public function transferRequest($name,$transfer) {
		if($this->cloud->isRequest($name)) {
			return;
		}
		if($this->cloud->isRequest($transfer)) {
			$this->cloud->setRequest($name,$this->cloud->getRequest($transfer));
		}
	}

	public function clearRequest() {
		$this->cloud->clearRequest();
	}

	public function getParameterRequest($name, $default=null) {
		return $this->cloud->getParameterRequest($name, $this->parameters, $default);
	}

	public function isParameterRequest($name) {
		return $this->cloud->isParameterRequest($name, $this->parameters_);
	}

	public function eRequestUri($parameters=null) {
		echo $this->requestUri($parameters);
	}

	public function eGenerateCallRequestJs($requestThis,$module,$request,$functionJs,$processJs) {
		++$this->fnCallId;
		$request_=$this->callRequest(
				  $this->requestThisDirect($requestThis),
				  $this->requestModuleDirect($module,$request)
			  );
		$action_=$this->requestUri($this->moduleFromRequestDirect($request_));
		echo "<form name=\"fn_call_".$this->fnCallId."\" method=\"POST\" action=\"".$action_."\">";
		$this->eFormBuildRequest($request_);
		echo "</form>";
		$this->ejsBegin();
		echo "function ".$functionJs."(){";
		echo " if(".$processJs."(document.forms.fn_call_".$this->fnCallId.")){";
		echo "	document.forms.fn_call_".$this->fnCallId.".submit();";
		echo " };";
		echo " return false;";
		echo "};";
		$this->ejsEnd();
		return "fn_call_".$this->fnCallId;
	}

	//
	// Storage Manager
	//

	public function getStoragePath() {
		return $this->cloud->getStoragePath($this->name);
	}

	public function getStorageFilename($fileName) {
		return $this->cloud->getStorageFilename($this->name,$fileName);
	}

	//
	// Cloud
	//

	public function isAjax() {
		return $this->cloud->isAjax;
	}

	public function isAjaxJs() {
		return $this->cloud->isAjaxJs;
	}

	public function isJson() {
		return $this->cloud->isJson;
	}

	public function logMessage($type, $message) {
		$this->cloud->logMessage($type, $message, $this->name);
	}

	public function setSetting($name,$value) {
		return $this->cloud->set($name,$value);
	}

	public function getSetting($name,$default=null) {
		return $this->cloud->get($name,$default);
	}

	//
	//  Util
	//

	public function arrayMerge($a, $b) {
		if ($b) {
			return array_merge($a, $b);
		};
		return $a;
	}

	public function jsEscape($x) {
		return str_replace(array("'", "\""), array("&#39;", "&#34;"), $x);
	}

	public function ejsBegin() {
		echo "<script>";
	}

	public function ejsEnd() {
		echo "</script>";
	}

	//
	// Module
	//

	protected $path;
	protected $name;
	protected $instance;
	protected $returnValue;
	protected $isOk;
	protected $site;
	protected $moduleBaseClass;
	protected $modulePathBase;

	private function initModuleCore(&$moduleObject) {
		$this->path=$moduleObject->path;
		$this->name=$moduleObject->module;
		$this->instance=0;
		$this->returnValue=null;
		$this->isOk=true;
		$this->site=$this->cloud->get("site","");
		$this->moduleBaseClass = $moduleObject->baseClass;
		$this->modulePathBase = $moduleObject->pathBase;
	}

	public function isBase($name) {
		return ($name === $this->moduleBaseClass);
	}

	public function moduleInit() {
		foreach (array_reverse($this->modulePathBase, true) as $module => $path) {
			$this->includeFile($path . "init.php");
		}
	}

	public function moduleMainExec($parameters=null) {
		$this->pushParameters();
		$this->mergeParameters($parameters);
		$this->instance++;
		$this->returnValue = null;
		$this->moduleMainExtension();
		$this->popParameters();
		return $this->returnValue;
	}

	public function moduleMainExtension() {
		$this->moduleMain();
	}

	public function moduleMain() {
		$file = $this->getBaseFile("application.php");
		if ($file) {
			include($file);
		} else {
			$this->applicationInit();
			$this->applicationAction();
			$this->applicationView();
		}
	}

	public function moduleDisable() {
		$this->isOk = false;
		return $this->cloud->enableModule($this->name, false);
	}

	public function moduleEnable() {
		$this->isOk = true;
		return $this->cloud->enableModule($this->name, true);
	}

	public function getPath() {
		return $this->path;
	}

	public function &getCloud() {
		return $this->cloud;
	}

	public function getName() {
		return $this->name;
	}

	public function isInGroup($group) {
		$group = $this->cloud->getGroup($group);
		if (count($group)) {
			if (in_array($this->name, $group)) {
				return true;
			}
		}
		return false;
	}

	public function getVersion() {
		return $this->cloud->getVersion($this->name);
	}

	public function includeLocal($name) {
		if (file_exists($this->path . $name)) {
			include($this->path . $name);
			return true;
		};
		return false;
	}

	public function ePath() {
		echo $this->path;
	}

	public function getArgumentParameterRequest($name, $default=null) {
		return $this->getArgument($name,$this->cloud->getParameterRequest($name, $this->parameters, $default));
	}

	public function getBasePathOf($file) {
		foreach ($this->modulePathBase as $path) {
			if (file_exists($path . $file)) {
				return $path;
			}
		}
		return null;
	}

	public function getBaseFile($file) {
		foreach ($this->modulePathBase as $path) {
			if (file_exists($path . $file)) {
				return $path . $file;
			}
		}
		return null;
	}

	public function getPathBase($module=null) {
		if($module) {
			if(array_key_exists($module,$this->modulePathBase)) {
				return $this->modulePathBase[$module];
			}
			return null;
		}
		return $this->modulePathBase;
	}

	public function setReturnValue($value) {
		$this->returnValue=$value;
	}

	public function getReturnValue() {
		return $this->returnValue;
	}

	public function setSession($key,$value) {
		$_SESSION["xyo_module_".$this->name."_".$this->instance."_".$key]=$value;
	}

	public function getSession($key,$default=null) {
		$key_="xyo_module_".$this->name."_".$this->instance."_".$key;
		if(array_key_exists($key_,$_SESSION)) {
			return $_SESSION[$key_];
		};
		return $default;
	}

	//
	// Model View Controller
	//

	protected $nameView;
	protected $nameRedirect;
	protected $cancelAction;
	protected $redirectMax;
	protected $defaultAction;
	protected $viewTemplate;
	protected $moduleCallList;
	protected $viewPath;

	private function initModelViewControllerManager() {
		$this->nameView=null;
		$this->nameRedirect=null;
		$this->cancelAction=null;
		$this->redirectMax=8;
		$this->defaultAction=null;
		$this->viewTemplate=null;
		$this->moduleCallList=array();
		$this->viewPath=null;
	}

	public function applicationInit() {
		foreach (array_reverse($this->modulePathBase, true) as $path) {
			$this->includeFile($path . "init-application.php");
		}
	}

	public function applicationPrepare() {
		$template = $this->cloud->getTemplate();
		if ($template) {
			$modTemplate = &$this->cloud->getModule($template);
			if ($modTemplate) {
				$this->keepRequest = $this->arrayMerge($modTemplate->getKeepRequestDirect(), $this->keepRequest);
			}
		}
	}

	public function applicationAction() {
		$this->nameView = null;
		$this->nameRedirect = null;
		$this->cancelAction = false;
		$redirect = 0;
		$action = $this->defaultAction;
		while ($redirect < $this->redirectMax) {
			++$redirect;
			$this->doAction($action);
			if ($this->cancelAction) {
				return;
			}
			if ($this->nameRedirect) {
				$action = $this->nameRedirect;
				$this->nameRedirect = null;
				continue;
			}
			break;
		}
	}

	public function applicationView($arguments=null) {
		if ($this->viewTemplate) {
			$this->generateView($this->viewTemplate,$arguments);
		} else {
			$this->generateView($this->nameView,$arguments);
		}
	}

	public function cancelAction() {
		$this->cancelAction = true;
	}

	public function setRedirectLevels($count) {
		$this->redirectMax = $count;
	}

	public function getRedirectLevels() {
		return $this->redirectMax;
	}

	public function setDefaultAction($name) {
		$this->defaultAction = $name;
	}

	public function getDefaultAction() {
		return $this->defaultAction;
	}

	public function setViewTemplate($name) {
		$this->viewTemplate = $name;
	}

	public function getViewTemplate() {
		return $this->viewTemplate;
	}

	public function generateCurrentView($arguments=null) {
		return $this->generateViewFromModule($this->name, $this->nameView, $arguments);
	}

	public function generateView($name=null, $arguments=null) {
		return $this->generateViewFromModule($this->name, $name, $arguments);
	}

	public function processModel($name=null, $arguments=null) {
		return $this->processModelFromModule($this->name, $name, $arguments);
	}

	public function doAction($name=null, $arguments=null) {
		return $this->doActionFromModule($this->name, $name, $arguments);
	}

	protected function getCallBase($name) {
		if(count($this->moduleCallList)) {
			$module=array_pop($this->moduleCallList);
			$this->moduleCallList[]=$module;
		} else {
			$module=$this->name;
		};
		$base=null;
		$select=false;
		foreach ($this->modulePathBase as $key => $value) {
			if($select) {
				$base=$key;
				break;
			}
			if($key===$module) {
				$select=true;
			}
		}
		return $base;
	}

	public function processModelBase($name=null, $arguments=null) {
		$base=$this->getCallBase($name);
		if($base) {
			return $this->processModelFromModule($base, $name, $arguments);
		}
		return null;
	}

	public function generateViewBase($name=null, $arguments=null) {
		$base=$this->getCallBase($name);
		if($base) {
			return $this->generateViewFromModule($base, $name, $arguments);
		}
		return null;
	}

	public function doActionBase($name=null, $arguments=null) {
		$base=$this->getCallBase($name);
		if($base) {
			return $this->doActionFromModule($base, $name, $arguments);
		}
		return null;
	}

	public function setView($name) {
		$this->nameView = $name;
	}

	public function getView() {
		return $this->nameView;
	}

	public function doRedirect($name) {
		$this->nameRedirect = $name;
	}

	public function getRedirect() {
		return $this->nameRedirect;
	}

	public function generateCurrentViewFromModule($module, $arguments=null) {
		return $this->generateViewFromModule($module, $this->nameView_, $arguments);
	}

	public function generateViewFromModule($module, $name=null, $arguments=null) {

		$this->moduleCallList[]=$module;
		$this->pushArguments();
		$this->arguments=$arguments;

		if(is_null($this->arguments)) {
			$this->arguments=array();
		};

		if (is_null($name)) {
			$name = "default";
		}

		$pathT = $this->cloud->getTemplatePath();
		if ($module === $this->name) {
			foreach ($this->modulePathBase as $moduleName => $path) {
				if ($pathT) {
					$this->viewPath=$pathT . "sys/view/" . $moduleName . "/";
					if ($this->includeFile($pathT . "sys/view/" . $moduleName . "/" . $name . ".php")) {
						$this->popArguments();
						array_pop($this->moduleCallList);
						return true;
					}
				}
				$this->viewPath=$path . "view/";
				if ($this->includeFile($path . "view/" . $name . ".php")) {
					$this->popArguments();
					array_pop($this->moduleCallList);
					return true;
				}
			}
		} else {
			if ($pathT) {
				$this->viewPath=$pathT . "sys/view/" . $module . "/";
				if ($this->includeFile($pathT . "sys/view/" . $module . "/" . $name . ".php")) {
					$this->popArguments();
					array_pop($this->moduleCallList);
					return true;
				}
			}
			$path = $this->cloud->getModulePath($module);
			if ($path) {
				$this->viewPath=$path . "view/";
				if ($this->includeFile($path . "view/" . $name . ".php")) {
					$this->popArguments();
					array_pop($this->moduleCallList);
					return true;
				}
			}
		}

		$this->popArguments();
		array_pop($this->moduleCallList);
		return false;
	}

	public function processModelX($name,$arguments=null) {

		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)) {
			$this->arguments=array();
		};

		$file = $this->cloud->getTemplatePath()."sys/model/".$name.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			return true;
		};

		$this->popArguments();

		return $this->processModel($name,$arguments);
	}

	public function callFromThis($name=null, $arguments=null) {
		return $this->callFromModule($this->name, $name, $arguments);
	}

	public function callFromModule($module, $name=null, $arguments=null) {
		$this->moduleCallList[]=$module;
		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)) {
			$this->arguments=array();
		};
		if (is_null($name)) {
			array_pop($this->moduleCallList);
			return false;
		};
		if ($module === $this->name) {
			foreach ($this->modulePathBase as $path) {
				if ($this->includeFile($path . $name . ".php")) {
					array_pop($this->moduleCallList);
					$this->popArguments();
					return true;
				}
			}
		} else {
			$path = $this->cloud->getModulePath($module);
			if ($path) {
				if ($this->includeFile($path . $name . ".php")) {
					array_pop($this->moduleCallList);
					$this->popArguments();
					return true;
				}
			}
		}
		array_pop($this->moduleCallList);
		$this->popArguments();
		return false;
	}

	public function processModelFromModule($module, $name=null, $arguments=null) {
		if(is_null($name)) {
			$name="default";
		};
		return $this->callFromModule($module, "model/".$name, $arguments);
	}

	public function doActionFromModule($module, $name=null, $arguments=null) {
		if(is_null($name)) {
			$name="default";
		};
		return $this->callFromModule($module, "action/".$name, $arguments);
	}

	//
	// DataSource Manager
	//

	public function &getDataSource($ds) {
		return $this->cloud->dataSource->getDataSource($ds);
	}

	public function setDataSource($name) {
		return $this->cloud->dataSource->setModuleDataSource($this->name, $name);
	}

	//
	// Constructor
	//

	public function __construct(&$moduleObject, &$cloud) {
		parent::__construct($cloud);
		$this->initParametersManager($moduleObject);
		$this->initArgumentsManager();
		$this->initAlertManager();
		$this->initErrorManager();
		$this->initLanguageManager();
		$this->initFormManager();
		$this->initComponentManager();
		$this->initRequestManager();
		$this->initModuleCore($moduleObject);
		$this->initModelViewControllerManager();
	}
}


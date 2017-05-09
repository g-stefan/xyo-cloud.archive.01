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

	private function initParametersManager(&$moduleObject){
		$this->parameters=$moduleObject->parameters;
		if(is_null($this->parameters)){
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
		if(array_key_exists($otherName,$this->parameters)){
			$this->parameters[$name] = $this->parameters[$otherName];
		};
	}

	public function getParameterBase($name, $default=null) {
		if (array_key_exists($name, $this->parameters)) {
			return $this->parameters[$name];
		}
		foreach ($this->modulePathBase as $moduleName => $path) {
			$module=&$this->getModule($moduleName);
			if($module->isParameter($name)){
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

	private function initArgumentsManager(){
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
	// Message
	//

	protected $message;

	private function initMessageManager() {
		$this->message=array();
	}

	public function clearMessage() {
		$this->message = array();
	}

	public function isMessage($name=null) {
		if ($name) {
			if (array_key_exists($name, $this->message)) {
				return true;
			}
			return false;
		};
		return (count($this->message) > 0);
	}

	public function getMessage($name, $default=null) {
		if (array_key_exists($name, $this->message)) {
			return $this->message[$name];
		}
		return $default;
	}

	public function setMessage($name, $value) {
		$this->message[$name] = $value;
	}

	//
	// Error Manager
	//

	protected $error;

	private function initErrorManager() {
		$this->error=array();
	}

	public function clearError() {
		$this->error = array();
	}

	public function isError($name=null) {
		if ($name) {
			if (array_key_exists($name, $this->error)) {
				return true;
			}
			return false;
		};
		return (count($this->error) > 0);
	}

	public function getError($name, $default=null) {
		if (array_key_exists($name, $this->error)) {
			return $this->error[$name];
		}
		return $default;
	}

	public function setError($name, $value) {
		$this->error[$name] = $value;
	}

	//
	//  From Manager
	//

	protected $formName;
	protected $formNameV;
	protected $elementValue;
	protected $elementPrefix;
	protected $elementPrefixV;

	private function initFormManager(){
		$this->setFormName("fn");
		$this->setElementPrefix("e");
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
		return $this->formNameV . $name . ($postfix ? "_" . $postfix : "");
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

	public function setElementError($name, $value) {
		if (array_key_exists($this->elementPrefix, $this->error)) {

		} else {
			$this->error[$this->elementPrefix] = array();
		}
		$this->error[$this->elementPrefix][$name] = $value;
	}

	public function getElementError($name, $default=null) {
		if (array_key_exists($this->elementPrefix, $this->error)) {
			if (array_key_exists($name, $this->error[$this->elementPrefix])) {
				return $this->error[$this->elementPrefix][$name];
			}
		}
		return $default;
	}

	public function eElementError($name, $default=null) {		
		echo $this->getElementError($name, $default);
	}

	public function clearElementError($name=null) {
		if (array_key_exists($this->elementPrefix, $this->error)) {
			if ($name) {
				if (array_key_exists($name, $this->error[$this->elementPrefix])) {
					unset($this->error[$this->elementPrefix][$name]);
				}
			} else {
				$this->error[$this->elementPrefix] = array();
			}
		}
	}

	public function isElementError($name=null) {
		if (array_key_exists($this->elementPrefix, $this->error)) {
			if ($name) {
				if (array_key_exists($name, $this->error[$this->elementPrefix])) {
					return true;
				}
			} else {
				return (count($this->error[$this->elementPrefix]) > 0);
			}
		}
		return false;
	}

	public function setElementMessage($name, $value) {
		if (array_key_exists($this->elementPrefix, $this->message)) {

		} else {
			$this->message[$this->elementPrefix] = array();
		}
		$this->message[$this->elementPrefix][$name] = $value;
	}

	public function getElementMessage($name, $default=null) {
		if (array_key_exists($this->elementPrefix, $this->message)) {
			if (array_key_exists($name, $this->message[$this->elementPrefix])) {
				return $this->message[$this->elementPrefix][$name];
			}
		}
		return $default;
	}

	public function eElementMessage($name, $default=null) {
		echo $this->getElementMessage($name, $default);
	}

	public function clearElementMessage($name=null) {
		if (array_key_exists($this->elementPrefix, $this->message)) {
			if ($name) {
				if (array_key_exists($name, $this->message[$this->elementPrefix])) {
					unset($this->message_[$this->elementPrefix][$name]);
				}
			} else {
				$this->message_[$this->elementPrefix] = array();
			}
		}
	}

	public function isElementMessage($name=null) {
		if (array_key_exists($this->elementPrefix, $this->message)) {
			if ($name) {
				if (array_key_exists($name, $this->message[$this->elementPrefix])) {
					return true;
				}
			} else {
				return (count($this->message[$this->elementPrefix]) > 0);
			}
		}
		return false;
	}

	public function getElementValueStr($element, $default=null, $size=0) {
		$retV=$this->getElementValue($element,$default);
		if(!is_null($retV)) {
			if($size){
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
			return 1*$retV;
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
			echo "<input type=\"hidden\" name=\"" . htmlspecialchars($key) . "\" value=\"" . htmlspecialchars($value) . "\" />";
		}
	}

	public function eFormRequest($parameters=null) {
		$this->eFormRequestModule($this->name, $this->arrayMerge($this->keepRequest, $parameters));
	}

	public function eFormRequestModule($module, $parameters=null) {
		$this->eFormBuildRequest($this->cloud->requestModuleDirect($module, $parameters));
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
	// Component Manager
	//

	public function redirectComponent($name,$parameters=null) {
		$this->cloud->redirectComponent($name,$parameters);
	}

	public function processComponent($name,$parameters=null) {
		$this->cloud->processComponent($name,$parameters);
	}

	public function setDefaultComponent($name) {
		$this->cloud->setDefaultComponent($name);
	}

	public function getDefaultComponent($name) {
		return $this->cloud->getDefaultComponent($name);
	}

	public function setComponent($module) {
		return $this->cloud->setComponent($module);
	}

	public function isComponent($name) {
		return $this->cloud->isComponent($name);
	}

	public function getComponent() {
		return $this->cloud->getComponent();
	}

	public function generateComponentView($parameters=null) {
		return $this->cloud->generateComponentView($parameters);
	}

	//
	// Request Manager
	//

	protected $keepRequest;

	private function initRequestManager(){
		$this->keepRequest=array();
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

	public function requestUriRouteModule($requestMain,$module, $parameters=null){
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

	public function isAjax(){
		return $this->cloud->isAjax;
	}

	public function isJSON(){
		return $this->cloud->isJSON;
	}

	public function logMessage($type, $message) {
		$this->cloud->logMessage($type, $message, $this->name);
	}

	public function setSetting($name,$value){
		return $this->cloud->set($name,$value);
	}

	public function getSetting($name,$default=null){
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
		echo "<script type=\"text/javascript\">//<![CDATA[\n";
	}

	public function ejsEnd() {
		echo "\n//]]></script>";
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
	
	private function initModuleCore(&$moduleObject){
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

	public function setReturnValue($value){
		$this->returnValue=$value;
	}

	public function getReturnValue(){
		return $this->returnValue;
	}

	public function setSession($key,$value){
		$_SESSION["xyo_module_".$this->name."_".$this->instance."_".$key]=$value;
	}

	public function getSession($key,$default=null){
		$key_="xyo_module_".$this->name."_".$this->instance."_".$key;
		if(array_key_exists($key_,$_SESSION)){
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

	private function initModelViewControllerManager(){
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

		if(is_null($this->arguments)){
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

	public function processViewX($name,$suffix,$path,$arguments=null) {
		$this->moduleCallList[]=$this->name;
		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)){
			$this->arguments=array();
		};

		$this->viewPath=$this->cloud->getTemplatePath() . "view/".$path."/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList);
			return true;
		};

		$this->viewPath=$path."/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList);
			return true;
		};

		$this->viewPath=$this->cloud->getTemplatePath() . "sys/view/".$this->name."/".$path."/";
		$file=$this->viewPath.$name.$suffix.".php";
		if($this->includeFile($file)) {
			$this->popArguments();
			array_pop($this->moduleCallList_);
			return true;
		};

		foreach ($this->modulePathBase as $path) {

			$this->viewPath=$path . "view/".$path."/";
			$file=$this->viewPath.$name.$suffix.".php";
			if($this->includeFile($file)) {
				$this->popArguments();
				array_pop($this->moduleCallList);
				return true;
			};

		};

		$this->popArguments();
		array_pop($this->moduleCallList);
		return false;
	}

	public function processModelX($name,$arguments=null) {

		$this->pushArguments();
		$this->arguments=$arguments;
		if(is_null($this->arguments)){
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
		if(is_null($this->arguments)){
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
	// Constructor
	//

	public function __construct(&$moduleObject, &$cloud) {
		parent::__construct($cloud);
		$this->initParametersManager($moduleObject);
		$this->initArgumentsManager();
		$this->initMessageManager();
		$this->initErrorManager();
		$this->initFormManager();
		$this->initRequestManager();
		$this->initModuleCore($moduleObject);
		$this->initModelViewControllerManager();
	}
}


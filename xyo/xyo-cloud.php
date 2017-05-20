<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

//
// XYO Cloud
//
// - Implements: Content-Based Router
// - Becomes: Model View Presenter / Controller / Supervising Controller or
// anything else
// - Module management, by contract
//

define("XYO_CLOUD", 1);
$xyo_Path = dirname(realpath(__FILE__)) . "/";
require_once($xyo_Path . "xyo-attributes.php");
require_once($xyo_Path . "xyo-config.php");
require_once($xyo_Path . "xyo-request.1.php");
require_once($xyo_Path . "xyo-module.php");

class xyo_ModuleObject {
	public 	$parent;
	public 	$module;
	public 	$className;
	public 	$enabled;
	public 	$path;
	public 	$init;
	public 	$loaded;
	public 	$check;
	public 	$parameters;
	public 	$component;
	public 	$baseClass;
	public 	$pathBase;
	public 	$registered;
	public 	$object;
}

class xyo_Cloud extends xyo_Config {

	//
	// Module Manager
	//

	protected $moduleList;
	protected $moduleLoader;
	protected $referenceBase;
	protected $referenceLinks;	

	protected function initModuleManager() {
		$this->moduleLoader = null;
		$this->moduleList = [];
		$this->referenceBase = [];
		$this->referenceLinks = [];
	}

	public function setModuleLoader($name) {
		$this->moduleLoader = &$this->getModule($name);
	}

	public function execModule($module, $parameters=null) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->enabled) {
				if ($moduleObject->loaded) {

				} else {
					if ($this->loadModule($moduleObject->module)) {

					} else {
						return null;
					}
				}
				return $moduleObject->object->moduleMainExec($parameters);
			}
		}
		return null;
	}

	public function &getModuleObject($module) {
		$rValue = null;
		if (strlen($module) == 0) {
			return $rValue;
		}

		if (array_key_exists($module, $this->moduleList)) {
			if ($this->moduleList[$module]->check) {

			} else {
				return $this->moduleList[$module];
			}
		}

		if ($this->moduleLoader) {
			if ($this->moduleLoader->systemSetModule($module)) {
				if (array_key_exists($module, $this->moduleList)) {
					$this->moduleList[$module]->check = false;
					return $this->moduleList[$module];
				}
			}
		}

		if (array_key_exists($module, $this->moduleList)) {
			if ($this->moduleList[$module]->check) {
				$this->moduleList[$module]->check = false;
				$this->moduleList[$module]->enabled = false;
			}
			return $this->moduleList[$module];
		}

		return $rValue;
	}

	public function &getModule($module) {
		$rValue = null;
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->enabled) {

				if ($moduleObject->loaded) {

				} else {
					if ($this->loadModule($moduleObject->module)) {

					} else {
						return $rValue;
					}
				}
				return $moduleObject->object;
			}
		}
		return $rValue;
	}

	public function enableModule($module, $enable=true) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->enabled = $enable;
			return true;
		}
		return false;
	}

	public function disableModule($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->enabled = false;
			return true;
		};
		return false;
	}

	public function getModulePath($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			return $moduleObject->path;		
		};
		return null;
	}

	public function getModulePathBase($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			return $moduleObject->pathBase;
		};
		return null;
	}

	public function initModule($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {

			if ($moduleObject->loaded) {
				return true;
			}

			if ($moduleObject->init) {
				return true;
			}

			$initFile = $moduleObject->path . "cloud.php";
			if (file_exists($initFile)) {
				require_once($initFile);
			}
			
			$moduleObject->init = true;
			return true;

		}
		return false;
	}

	public function loadModule($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {

			if (!$moduleObject->enabled) {
				return false;
			}

			if ($moduleObject->loaded) {
				return true;
			}

			if (!$moduleObject->init) {

				$initFile = $moduleObject->path . "cloud.php";
				if (file_exists($initFile)) {
					require_once($initFile);
				}

			}
			
			$moduleObject->init = true;

			if (!$this->loadReferenceLinks($module)) {
				return false;
			}

			$moduleFile = $moduleObject->path . "module.php";
			$className = "xyo_Module";
			$module = $moduleObject->module;			
			if (file_exists($moduleFile)) {
				require_once($moduleFile);
			}
			$moduleObject->className = $className;

			if ($className === "xyo_Module") {
				if (array_key_exists($module, $this->referenceBase)) {
					$base = &$this->getModuleObject($this->referenceBase[$module]);
					if ($base) {
						if ($base->loaded) {
							$moduleObject->baseClass = "*";
							$moduleObject->className = $base->className;
						} else {
							return false;
						}
					}
				}
			} else {
				$moduleObject->baseClass = $className;
			}

			$moduleObject->pathBase = array($module => $moduleObject->path);
			$moduleBase = $module;
			while (array_key_exists($moduleBase, $this->referenceBase)) {
				$moduleBase = $this->referenceBase[$moduleBase];
				$base = &$this->getModuleObject($moduleBase);
				if ($base) {
					$moduleObject->pathBase[$moduleBase] = $base->path;
				}
			}

			$moduleObject->loaded = true;
			$moduleObject->object = new $moduleObject->className($moduleObject, $this);
			if ($moduleObject->enabled) {
				$moduleObject->object->moduleInit();
			}

			return $moduleObject->enabled;
		}
		return false;
	}

	public function requireModule($module) {
		if($this->loadModule($module)){
			
		}else{
			die("FATAL: Required module ".$module." not found.");
		};
	}

	public function setModuleCheck($module, $check) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->check = $check;
		}
	}

	public function setModuleParameters($module, $parameters) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->parameters = $parameters;
		}
	}

	public function setModule($moduleParent, $path, $module, $enabled, $parameters=null, $registered=false, $override=false) {
		if ($override) {

		} else {
			if (array_key_exists($module, $this->moduleList)) {
				$this->moduleList[$module]->enabled = $enabled;
				return true;
			}
		}

		if (strlen($moduleParent) > 0) {
			if (array_key_exists($moduleParent, $this->moduleList)) {

			} else {
				$check = &$this->getModuleObject($moduleParent);
				if ($check) {

				} else {
					return false;
				}
			}
		}

		$pathModule = null;

		if (strlen($moduleParent) > 0) {
			if (strlen($path) > 0) {
				$pathModule = $this->moduleList[$moduleParent]->path . $path . "/";
			} else {
				$pathModule = $this->moduleList[$moduleParent]->path . $module . "/";
			}
		} else if (strlen($path) > 0) {
			$pathModule = $path . "/";
		} else {
			$pathModule = "module/" . $module . "/";
		}		

		if ($parameters) {

		} else {
			$parameters = array();
		}

		$this->moduleList[$module] = new xyo_ModuleObject();
		$this->moduleList[$module]->parent = $moduleParent;
		$this->moduleList[$module]->module = $module;
		$this->moduleList[$module]->className = null;
		$this->moduleList[$module]->enabled = $enabled;
		$this->moduleList[$module]->path = $pathModule;
		$this->moduleList[$module]->init = false;
		$this->moduleList[$module]->loaded = false;
		$this->moduleList[$module]->check = false;
		$this->moduleList[$module]->parameters = $parameters;
		$this->moduleList[$module]->component = null;
		$this->moduleList[$module]->baseClass = null;
		$this->moduleList[$module]->pathBase = null;
		$this->moduleList[$module]->registered = $registered;
		$this->moduleList[$module]->object = null;
		return true;
	}

	public function removeModule($module) {
		if (array_key_exists($module, $this->modulesList)) {
			unset($this->modulesList[$module]);
		};
	}

	public function getModuleParameters($name) {
		$moduleObject = &$this->getModuleObject($name);
		if ($moduleObject) {
			return $moduleObject->parameters;
		}
		return null;
	}

	public function getModuleExecPath($module) {
		$moduleName = $module;
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleName = $moduleObject->module;
			while ($moduleObject) {
				if ($moduleObject->registered) {
					return $moduleName;
				}
				$moduleObject = &$this->getModuleObject($moduleObject->parent);
				if ($moduleObject) {
					$moduleName = $moduleObject->module . "." . $moduleName;
				};
			};
		};
		return $moduleName;
	}

	public function setReferenceLink($derivate, $base) {
		if (array_key_exists($derivate, $this->referenceLinks)) {

		} else {
			$this->referenceLinks[$derivate] = array();
		};
		$this->referenceLinks[$derivate][$base] = $base;
	}

	public function setReferenceBase($derivate, $base) {
		$this->setReferenceLink($derivate, $base);
		$this->referenceBase[$derivate] = $base;
	}

	public function loadReferenceLinks($derivate) {
		if (array_key_exists($derivate, $this->referenceLinks)) {
			foreach ($this->referenceLinks[$derivate] as $base) {
				if ($this->loadModule($base)) {

				} else {
					if ($this->get("log_module",false)) {
						$this->cloud->logMessage("module", "LOAD-FAIL: [" . $base . "] on [" . $derivate . "]");
					}
					return false;
				}
			}
		}
		return true;
	}

	public function setVersion($module, $version) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->version = $version;
		};
	}

	public function getVersion($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			return $moduleObject->version;
		};
		return null;
	}

	public function loadModuleExecPath($module) {

		if (strlen($module) == 0) {
			return null;
		};

		$m = explode(".", $module);
		if (is_array($m)) {
			$module = array_pop($m);
			if (strlen($module) == 0) {
				return null;
			};
			if (array_key_exists($module, $this->moduleList)) {

			} else {
				foreach ($m as $v) {
					if ($this->loadModule($v)) {

					} else {
						return null;
					};
				};
			};
		};
		return $module;
	}

	public function moduleFromExecPath($module) {
		if (strlen($module) == 0) {
			return null;
		};

		$m = explode(".", $module);
		if (is_array($m)) {
			$module = array_pop($m);
			if (strlen($module) == 0) {
				return null;
			};
		};
		return $module;
	}

	public function isModuleLoaded($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->enabled) {
				if ($moduleObject->loaded) {
					return true;
				}
			}
		};
		return false;
	}

	public function isModuleEnabled($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->enabled) {
				return true;
			}
		};
		return false;
	}

	public function setModuleAsComponent($module, $enabled=true) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->component = $enabled;
			return true;
		}
		return false;
	}

	public function isModuleAsComponent($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->component) {
				return true;
			}
		}
		return false;
	}


	//
	// Group Manager
	//

	protected $groupList;
	protected $groupLoader;
	protected $groupLoadedOk;

	protected function initGroupManager() {

		$this->groupLoader = null;	
		$this->groupList = [];
		$this->groupLoadedOk = [];

	}

	public function setGroupLoader($name) {
		$this->groupLoader = &$this->getModule($name);
	}

	public function &getGroup($group) {
		$moduleList = array();

		if (array_key_exists($group, $this->groupLoadedOk)) {

		} else {
			$this->groupLoaderOk[$group] = true;

			if ($this->groupLoader) {
				$this->groupLoader->systemSetGroup($group);
			}
		}

		if (array_key_exists($group, $this->groupList)) {

		} else {
			return $moduleList;
		}

		asort($this->groupList[$group]);
		$moduleList = array_keys($this->groupList[$group]);
		return $moduleList;
	}

	public function execGroup($group, $parameters=null) {
		$moduleList = &$this->getGroup($group);
		foreach ($moduleList as $module) {
			$this->execModule($module, $parameters);
		}
	}

	public function loadGroup($group) {
		$moduleList = &$this->getGroup($group);
		foreach ($moduleList as $module) {
			$this->loadModule($module);
		}
	}

	public function setModuleGroup($module, $group, $order=0) {
		if (array_key_exists($group, $this->groupList)) {

		} else {
			$this->groupList[$group] = array();
		};
		$this->groupList[$group][$module] = $order;
	}

	public function removeModuleFromGroup($module, $group) {
		if (array_key_exists($group, $this->groupList)) {
			unset($this->groupList[$group][$module]);
		};
	}

	public function removeGroup($group) {
		if (array_key_exists($group, $this->groupList)) {
			unset($this->groupList[$group]);
		};
	}

	//
	// Component Manager
	//

	protected $component;
	protected $defaultComponent;
	protected $redirectComponent=null;
	protected $redirectComponentParameters=null;

	private function initComponentManager() {
		$this->component=null;
		$this->defaultComponent=null;
		$this->redirectComponent=null;
		$this->redirectComponentParameters=null;
	}

	public function setComponent($module) {
		$this->component = $module;
	}

	public function isComponent($name) {
		return ($this->component === $name);
	}

	public function getComponent() {
		return $this->component;
	}

	public function hasComponent() {
		return strlen($this->component)>0;
	}

	public function generateComponentView($parameters=null) {
		if ($this->component) {
			$componentModule=&$this->getModule($this->component);
			if($componentModule) {
				return $componentModule->applicationView($parameters);
			}
		}
		return null;
	}

	public function setDefaultComponent($name) {
		$this->defaultComponent=$name;
		if ($this->component) {
		} else {
			$this->setComponent($name);
		}
	}

	public function getDefaultComponent() {
		return $this->defaultComponent;
	}

	public function redirectComponent($name,$parameters=null) {
		$this->redirectComponent=$name;
		$this->redirectComponentParameters=$parameters;
	}

	public function processComponent($name,$parameters=null) {
		if(is_null($this->redirectComponent)){
			$this->redirectComponent=$name;		
			$this->redirectComponentParameters=$parameters;
		};
		while($this->redirectComponent) {
			$this->component=$this->redirectComponent;
			$parameters_=$this->redirectComponentParameters;
			$this->redirectComponent=null;
			$this->redirectComponentParameters=null;

			$componentModule=&$this->getModule($this->component);
			if($componentModule) {
				$componentModule->mergeParameters($parameters_);
				$componentModule->applicationPrepare();
				$componentModule->applicationInit();
				$componentModule->applicationAction();
			}
		}
	}


	//
	//  Request Manager
	//

	protected $request;
	protected $requestBuilder;
	public $isAjax;
	public $isJSON;

	private function initRequestManager() {

		$this->request=new xyo_Attributes(array_merge(xyo_Cloud_Request__stripSlashesDeep($_COOKIE),xyo_Cloud_Request__stripSlashesDeep($_GET),xyo_Cloud_Request__stripSlashesDeep($_POST)));
		$this->requestBuilder=null;		
		$this->isAjax=false;
		$this->isJSON=false;
	
	}

	public function getRequest($name, $default=null) {
		return $this->request->get($name, $default);
	}

	public function setRequest($name, $value) {
		$this->request->set($name, $value);
	}

	public function getRequestDirect() {
		return $this->request->getAttributes();
	}

	public function setRequestDirect($value) {
		$this->request->setAttributes($value);
	}

	public function clearRequest(){
		$this->request->clear();
	}

	public function mergeRequest($value) {
		$this->request->merge($value);
	}

	public function isRequest($name) {
		return $this->request->is($name);
	}

	public function unsetRequest($name) {
		$this->request->unsetAttribute($name);
	}

	public function initRequest(){
		$this->isAjax=1*$this->request->get("ajax",0);
		$this->isJSON=1*$this->request->get("json",0);

		$redirect=$this->request->get("__","");
		if(strlen($redirect)>0){
			$redirectList=explode("/",$redirect);
			if(count($redirectList)>0){
				//  /run/[module-name]
				if($redirectList[0]=="run"){
					if(count($redirectList)>1){
						$this->request->set("run",$redirectList[1]);
					};
				};
				// /core/run/[module-name]
				foreach($this->get("core_list",array()) as $key=>$value){
					if($key==$redirectList[0]){
						$this->set("core",$key);
						if(count($redirectList)>1){
							if($redirectList[1]=="run"){
								if(count($redirectList)>2){
									$this->request->set("run",$redirectList[2]);
								};								
							};
						};
						break;
					};
				};
			};
		};

	}

	public function pushRequest($request) {
		if($request) {
		} else {
			return array();
		}
		if(count($request)) {
		} else {
			return array();
		}
		$retV=array();
		$sp=0;
		if(array_key_exists("x_",$request)) {
			$sp=1*$request["x_"];
		};
		++$sp;
		$newXSp="x_".$sp."_";
		foreach($request as $key=>$value) {
			if(strncmp($key,"x_",2)==0) {
				$retV[$key]=$value;
			} else {
				$retV[$newXSp.$key]=$value;
			}
		};
		$retV["x_"]=$sp;
		return $retV;
	}

	public function popRequest($request) {
		if($request) {
		} else {
			return array();
		};
		if(count($request)) {
		} else {
			return array();
		}
		$retV=array();
		$sp=0;
		if(array_key_exists("x_",$request)) {
			$sp=1*$request["x_"];
		};
		if($sp==0) {
			return array();
		};
		$xSp="x_".$sp."_";
		$xSpLen=strlen($xSp);
		foreach($request as $key=>$value) {
			if(strncmp($xSp,$key,$xSpLen)==0) {
				$retV[substr($key,$xSpLen)]=$value;
			} else if(strncmp($key,"x_",2)==0) {
				$retV[$key]=$value;
			};
		};
		--$sp;
		if($sp>0) {
			$retV["x_"]=$sp;
		} else {
			unset($retV["x_"]);
		};
		return $retV;
	}

	public function getRequestStack($request) {
		$retV=array();
		foreach($request as $key=>$value) {
			if(strncmp($key,"x_",2)==0) {
				$retV[$key]=$value;
			};
		};
		return $retV;
	}

	public function hasRequestStack($request) {
		if(array_key_exists("x_",$request)) {
			return true;
		};
		return false;
	}


	public function moduleFromRequest($request) {
		if(array_key_exists("run",$request)) {
			return $request["run"];
		};
		return null;
	}

	public function moduleFromRequestDirect($request) {
		if(array_key_exists("run",$request)) {
			return array("run"=>$request["run"]);
		};
		return array();
	}

	public function callRequest($requestThis,$requestCall=null) {
		if($requestCall) {
		} else {
			return $requestThis;
		};
		$retV=$this->pushRequest($requestThis);
		return array_merge($retV,$requestCall);
	}

	public function returnRequest($requestThis,$requestReturn=null) {
		if($requestReturn) {
		} else {
			return $this->popRequest($requestThis);
		}
		$retV=$this->popRequest($requestThis);
		return array_merge($retV,$requestReturn);
	}

	public function runRequest($parameters) {
		$module=$this->loadModuleExecPath($this->get("run"));
		if($module) {
			return $this->execModule($module,$parameters);
		};
		return null;
	}

	public function setRequestBuilder($requestBuilder) {
		$this->requestBuilder=$requestBuilder;
	}

	public function requestUriRoute($requestMain=null,$parameters=null) {		

		if ($this->requestBuilder) {
			return $this->requestBuilder->systemRequestUriRoute($requestMain,$parameters);
		};

		if(strlen($requestMain)==0){
			$requestMain="index.php";
		};

		$core="";
		foreach($this->get("core_list",array()) as $key=>$value){
			if($value==$requestMain){
				$core=$key;
				break;
			};
		};

		$redirect=$this->getRequest("__","");
		if((strlen($redirect)>0)||$this->get("use_redirect",false)){
			if(strlen($core)>0){
				if ($parameters) {
					$retV=$this->cloud->get("site","");
					if (array_key_exists("run", $parameters)) {
						$retV.=$core."/run/".rawurlencode($parameters["run"]);
					};
					$first = false;
					foreach ($parameters as $key => $value) {
						if ($key === "run") {
							continue;
						};
						if ($first) {
							$retV.="&";
						} else {
							$retV.="?";
							$first = true;
						}
						$retV.=rawurlencode($key) . "=" . rawurlencode($value);
					};
					return $retV;
				};
				return $this->cloud->get("site","").$core;
			};
		};

		$retV = $requestMain;
		if ($parameters) {
			$first = false;
			if (array_key_exists("run", $parameters)) {
				$retV.="?run=" . rawurlencode($parameters["run"]);
				$first = true;				
			};
			foreach ($parameters as $key => $value) {
				if ($key === "run") {
					continue;
				};
				if ($first) {
					$retV.="&";
				} else {
					$retV.="?";
					$first = true;
				}
				$retV.=rawurlencode($key) . "=" . rawurlencode($value);
			};
		};
		return $retV;
	}

	public function setSiteFromServerRequest() {
		if ($this->requestBuilder) {
			return $this->requestBuilder->systemSetSiteFromServerRequest();
		};
		$site=$this->get("site","");
		if(strlen($site)==0){
			$site=$_SERVER["REQUEST_URI"];
			$x=@strrpos($site,"/",-1);
			if($x===false){
			}else
			if($x>=0){
				$redirect=$this->getRequest("__","");
				if((strlen($redirect)>0)||$this->get("use_redirect",false)){

					$found=false;
                       			$site=substr($site,0,$x+1);
					foreach($this->get("core_list",array()) as $key=>$value){
						if(!$found){
							$x=@strpos($site,"/".$key."/run/",0);
							if($x===false){
							}else
							if($x>=0){
								$this->set("site",substr($site,0,$x+1));
								$found=true;
								break;
							};
						};
					};

					if(!$found){
						$x=@strpos($site,"/run/",0);
						if($x===false){
						}else
						if($x>=0){
							$this->set("site",substr($site,0,$x+1));
							$found=true;
						};
					};
                        
				}else{
					$this->set("site",substr($site,0,$x+1));
				};
			};
		};
	}

	public function requestUri($parameters=null) {
		return $this->requestUriRoute($this->get("request_main","public"),$parameters);
	}

	public function requestModuleDirect($module, $parameters=null) {
		if ($parameters) {

		} else {
			$parameters = array();
		}
		if($module) {
			$module_ = $this->getModuleExecPath($module);
			$parameters["run"] = $module_;
		}
		return $parameters;
	}

	public function requestUriModule($module, $parameters=null) {
		return $this->requestUri($this->requestModuleDirect($module, $parameters));
	}

	public function requestUriRouteModule($requestMain,$module, $parameters=null) {
		return $this->requestUriRoute($requestMain,$this->requestModuleDirect($module, $parameters));
	}
	
	public function getModuleNameFromRequest() {
		$module=$this->getRequest("run",$this->component);
		if($module) {
			$m = explode(".", $module);
			if (is_array($m)) {
				return array_pop($m);
			};
			return $module;
		};
		return null;
	}

	public function getParameterRequest($name, $parameters, $default=null) {
		if ($parameters) {
			if (array_key_exists($name, $parameters)) {
				return $parameters[$name];
			}
		};
		return $this->getRequest($name, $default);
	}

	public function isParameterRequest($name, $parameters) {
		if ($parameters) {
			if (array_key_exists($name, $parameters)) {
				return true;
			};
		};
		return $this->isRequest($name);
	}

	//
	// Storage Manager
	//

	public function getStoragePath($module) {
		return "repository/module/".$module;
	}

	public function getStorageFilename($module,$fileName) {
		return "repository/module/".$module."/".$fileName;
	}

	//
	// Template Manager
	//

	protected $template;
	protected $templatePath;

	private function initTemplateManager(){
		$this->template=null;
		$this->templatePath=null;
	}

	public function setTemplate($module) {
		$this->template = $module;
		$this->templatePath = $this->getModulePath($module);
	}

	public function getTemplate() {
		return $this->template;
	}

	public function getTemplatePath() {
		return $this->templatePath;
	}

	//
	// HTML
	//
	
	protected $htmlClassList;

	public function initHTML(){
		$this->htmlClassList=array();
	}
	
	public function setHTMLClass($class){
		$this->htmlClassList[$class]=$class;
	}

	public function removeHTMLClass($class){
		if(array_key_exists($class,$this->htmlClassList)){
			unset($this->htmlClassList[$class]);
		};
	}

	public function getHTMLClass(){
		$retV="";
		foreach($this->htmlClassList as $class){
			if(strlen($retV)){
				$retV.=" ";
			};
			$retV.=$class;
		};
		return $retV;
	}

	//
	// Main
	//

	protected $isInitOk;

	public function __construct() {
		parent::__construct($this);

		$this->set("kernel_version","2.0.0.0");

		$this->set("core","public");
		$this->set("core_list",array("public"=>"index.php"));
		$this->set("site","");
		$this->set("use_redirect",false);
		$this->set("log_module",true);
		$this->set("log_request",false);
		$this->set("log_response",false);
		$this->set("request_main","index.php");

		$this->isInitOk=true;		

		$this->initModuleManager();
		$this->initGroupManager();
		$this->initComponentManager();
		$this->initRequestManager();		
		$this->initTemplateManager();
		$this->initHTML();
	}

	public function getClientIP() {
		if(array_key_exists("HTTP_CLIENT_IP",$_SERVER)) {
			return $_SERVER["HTTP_CLIENT_IP"];
		};
		if(array_key_exists("HTTP_X_FORWARDED_FOR",$_SERVER)) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		};
		if(array_key_exists("HTTP_X_FORWARDED",$_SERVER)) {
			return $_SERVER["HTTP_X_FORWARDED"];
		};
		if(array_key_exists("HTTP_FORWARDED_FOR",$_SERVER)) {
			return $_SERVER["HTTP_FORWARDED_FOR"];
		};
		if(array_key_exists("HTTP_FORWARDED",$_SERVER)) {
			return $_SERVER["HTTP_FORWARDED"];
		};
		if(array_key_exists("REMOTE_ADDR",$_SERVER)) {
			return $_SERVER["REMOTE_ADDR"];
		};
		return null;
	}

	public function logMessage($type, $message_,$module_=null) {
		$fs = fopen("log/" . date("Y-m-d")."-". $type.".log", "ab");
		if ($fs) {
			if($module_) {
				fwrite($fs, date("Y-m-d H:i:s") . " [".$this->getModuleExecPath($module_)."] [".$this->getClientIP()."]: ");
			} else {
				fwrite($fs, date("Y-m-d H:i:s") . ": ");
			}
			if (is_array($message_)) {
				fwrite($fs, "Array (\r\n");
				foreach ($message_ as $key => $value) {
					if (is_bool($key)) {
						if ($key) {
							fwrite($fs, "true");
						} else {
							fwrite($fs, "false");
						}
					} else if (is_string($key)) {
						fwrite($fs, "\"" . $key . "\"");
					} else {
						fwrite($fs, $key);
					};
					fwrite($fs, " = ");
					if (is_bool($value)) {
						if ($value) {
							fwrite($fs, "true");
						} else {
							fwrite($fs, "false");
						}
					} else if (is_string($value)) {
						fwrite($fs, "\"" . $value . "\"");
					} else {
						fwrite($fs, $value);
					};
					fwrite($fs, "\r\n");
				}
				fwrite($fs, ")");
			} else {
				fwrite($fs, $message_);
			};
			fwrite($fs, "\r\n");
			fclose($fs);
		}
	}

	public static function logResponseShutdown($x) {
		$retV = ob_get_contents();
		ob_end_clean();
		$fs = fopen($x[0] . date("Y-m-d")."-response.log", "ab");
		if ($fs) {
			fwrite($fs, date("Y-m-d H:i:s") . " [".$x[1]."]\n");
			fwrite($fs, $retV);
			fwrite($fs, "\n\n");
			fclose($fs);
		};
		echo $retV;
	}

	public function setInitOk($value) {
		if ($this->isInitOk) {
			$this->isInitOk = $value;
		};
	}

	public function main() {
		
		$coreList=array_flip($this->get("core_list",array()));
		$coreList[$this->get("request_main","index.php")]=$this->get("core","public");
		$this->set("core_list",array_flip($coreList));

		$this->initRequest();
		$this->includeConfig("xyo-cloud");

		if ($this->get("log_request",false)) {
			ob_start();

			print_r($this->request->getAttributes());

			$retV = ob_get_contents();
			ob_end_clean();
			$fs = fopen("log/" . date("Y-m-d")."-request.log", "ab");
			if ($fs) {
				fwrite($fs, date("Y-m-d H:i:s") . " [".$this->getClientIP()."]\n");
				fwrite($fs, $retV);
				fwrite($fs, "\n\n");
				fclose($fs);
			};
		};

		if ($this->get("log_response",false)) {
			ob_start();
			$x=array(0=>"log/",1=>$this->getClientIP());
			register_shutdown_function(xyo_Cloud::$logResponseShutdown, $x);
		};

		$this->execGroup("xyo-system-init", null);
		if ($this->isInitOk) {
			$exec_ = true;
			$module = $this->loadModuleExecPath($this->request->get("run",$this->getComponent()));
			if ($module) {
				$this->initModule($module);
				if ($this->isModuleAsComponent($module)) {
					if($this->isAjax || $this->isJSON) {
						$exec_ = false;
						$this->execModule($module, null);
					};
				} else {
					$exec_ = false;
					$this->execModule($module, null);
				};
			};
			if ($exec_) {
				$this->setComponent($module);
				$this->loadGroup("xyo-system-load");

				if($this->hasComponent()) {
					$this->processComponent($this->getComponent(),null);
				};

				$this->execGroup("xyo-system-exec", null);
			};
		};
	}

}


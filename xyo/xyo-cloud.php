<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
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
require_once($xyo_Path . "xyo-language.php");
require_once($xyo_Path . "xyo-module.php");
require_once($xyo_Path . "xyo-datasource.php");

class xyo_ModuleObject {
	public  $parent;
	public  $module;
	public  $className;
	public  $enabled;
	public  $path;
	public  $init;
	public  $loaded;
	public  $check;
	public  $parameters;
	public  $application;
	public  $baseClass;
	public  $pathBase;
	public  $registered;
	public  $object;
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
		$this->moduleList = array();
		$this->referenceBase = array();
		$this->referenceLinks = array();
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
		if(!$this->loadModule($module)) {
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

	public function setModule($moduleParent=null, $path=null, $module, $enabled=true, $parameters=null, $registered=true, $override=false) {
		if (!$override) {
			if (array_key_exists($module, $this->moduleList)) {
				$this->moduleList[$module]->enabled = $enabled;
				return true;
			}
		}

		if (strlen($moduleParent) > 0) {
			if (array_key_exists($moduleParent, $this->moduleList)) {

			} else {
				$check = &$this->getModuleObject($moduleParent);
				if (!$check) {
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

		if (!$parameters) {
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
		$this->moduleList[$module]->application = null;
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

	public function setModuleAsApplication($module, $enabled=true) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			$moduleObject->application = $enabled;
			return true;
		}
		return false;
	}

	public function isModuleAnApplication($module) {
		$moduleObject = &$this->getModuleObject($module);
		if ($moduleObject) {
			if ($moduleObject->application) {
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
		$this->groupList = array();
		$this->groupLoadedOk = array();

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
	// Application Manager
	//

	protected $application;
	protected $defaultApplication;
	protected $redirectApplication=null;
	protected $redirectApplicationParameters=null;

	private function initApplicationManager() {
		$this->application=null;
		$this->defaultApplication=null;
		$this->redirectApplication=null;
		$this->redirectApplicationParameters=null;
	}

	public function setApplication($module) {
		$this->application = $module;
	}

	public function isApplication($name) {
		return ($this->application === $name);
	}

	public function getApplication() {
		return $this->application;
	}

	public function hasApplication() {
		return strlen($this->application)>0;
	}

	public function generateApplicationView($parameters=null) {
		if ($this->application) {
			$applicationModule=&$this->getModule($this->application);
			if($applicationModule) {
				return $applicationModule->applicationView($parameters);
			};
		};
		return null;
	}

	public function setDefaultApplication($name) {
		$this->defaultApplication=$name;
		if ($this->application) {
		} else {
			$this->setApplication($name);
		}
	}

	public function getDefaultApplication() {
		return $this->defaultApplication;
	}

	public function redirectApplication($name,$parameters=null) {
		$this->redirectApplication=$name;
		$this->redirectApplicationParameters=$parameters;
	}

	public function processApplication($name,$parameters=null) {
		if(is_null($this->redirectApplication)) {
			$this->redirectApplication=$name;
			$this->redirectApplicationParameters=$parameters;
		};
		while($this->redirectApplication) {
			$this->application=$this->redirectApplication;
			$parameters_=$this->redirectApplicationParameters;
			$this->redirectApplication=null;
			$this->redirectApplicationParameters=null;

			$applicationModule=&$this->getModule($this->application);
			if($applicationModule) {
				$applicationModule->mergeParameters($parameters_);
				$applicationModule->applicationPrepare();
				$applicationModule->applicationInit();
				$applicationModule->applicationAction();
			}
		}
	}


	//
	//  Request Manager
	//

	protected $request;
	protected $requestBuilder;
	public $isAjax;
	public $isAjaxJs;
	public $isJson;

	private function initRequestManager() {

		$this->request=new xyo_Attributes(array_merge(xyo_Cloud_Request__stripSlashesDeep($_COOKIE),xyo_Cloud_Request__stripSlashesDeep($_GET),xyo_Cloud_Request__stripSlashesDeep($_POST)));
		$this->requestBuilder=null;
		$this->isAjax=false;
		$this->isAjaxJs=false;
		$this->isJson=false;

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

	public function clearRequest() {
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

	public function initRequest() {
		$this->isAjax=1*$this->request->get("ajax",0);
		$this->isAjaxJs=1*$this->request->get("ajax-js",0);
		$this->isJson=1*$this->request->get("json",0);

		$redirect=$this->request->get("__","");
		if(strlen($redirect)>0) {
			$redirectList=explode("/",$redirect);
			if(count($redirectList)>0) {
				//  /run/[module-name]
				if($redirectList[0]=="run") {
					if(count($redirectList)>1) {
						$this->request->set("run",$redirectList[1]);
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

		if(strlen($requestMain)==0) {
			$requestMain="index.php";
		};

		$redirect=$this->getRequest("__","");
		if((strlen($redirect)>0)||$this->get("use_redirect",false)) {
			if ($parameters) {
					$retV=$this->cloud->get("site","");
					if (array_key_exists("run", $parameters)) {
						$retV.="/run/".rawurlencode($parameters["run"]);
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
			return $this->cloud->get("site","");
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
		if(strlen($site)==0) {
			if(array_key_exists("REQUEST_URI",$_SERVER)) {
				$site=$_SERVER["REQUEST_URI"];
				$x=@strrpos($site,"/",-1);
				if($x===false) {
				} else if($x>=0) {
					$redirect=$this->getRequest("__","");
					if((strlen($redirect)>0)||$this->get("use_redirect",false)) {

						$x=@strpos($site,"/run/",0);
						if($x===false) {
						} else if($x>=0) {
							$this->set("site",substr($site,0,$x+1));
							$found=true;
						};						

					} else {
						$this->set("site",substr($site,0,$x+1));
					};
				};
			};
		};
	}

	public function requestUri($parameters=null) {
		return $this->requestUriRoute($this->get("request_main","index.php"),$parameters);
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
		$module=$this->getRequest("run",$this->application);
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
	// HTML Manager
	//

	protected $htmlClassList;
	protected $htmlBodyClassList;
	protected $htmlCssList;
	protected $htmlJsList;
	protected $htmlJsSourceList;
	protected $htmlTitle;
	protected $htmlDescription;
	protected $htmlIcon;

	private function initHtmlManager() {
		$this->htmlClassList=array();
		$this->htmlBodyClassList=array();
		$this->htmlCssList=array();
		$this->htmlJsList=array();
		$this->htmlJsSourceList=array();
		$this->htmlTitle="XYO Cloud";
		$this->htmlDescription="";
		$this->htmlIcon="favicon.ico";
	}

	public function setHtmlClass($class) {
		$this->htmlClassList[$class]=$class;
	}

	public function removeHtmlClass($class) {
		if(array_key_exists($class,$this->htmlClassList)) {
			unset($this->htmlClassList[$class]);
		};
	}

	public function getHtmlClass() {
		$retV="";
		foreach($this->htmlClassList as $class) {
			if(strlen($retV)) {
				$retV.=" ";
			};
			$retV.=$class;
		};
		return $retV;
	}

	public function eHtmlClass() {
		$value=$this->getHtmlClass();
		if($value) {
			echo " class=\"".$value."\"";
		};
	}

	public function setHtmlBodyClass($class) {
		$this->htmlBodyClassList[$class]=$class;
	}

	public function removeHtmlBodyClass($class) {
		if(array_key_exists($class,$this->htmlBodyClassList)) {
			unset($this->htmlBodyClassList[$class]);
		};
	}

	public function getHtmlBodyClass() {
		$retV="";
		foreach($this->htmlBodyClassList as $class) {
			if(strlen($retV)) {
				$retV.=" ";
			};
			$retV.=$class;
		};
		return $retV;
	}

	public function eHtmlBodyClass() {
		$value=$this->getHtmlBodyClass();
		if($value) {
			echo " class=\"".$value."\"";
		};
	}

	public function eHtmlLanguage() {
		echo " lang=\"".$this->get("language","en")."\"";
	}

	public function setHtmlJs($module,$url,$opt="") {
		if(!array_key_exists($module,$this->htmlJsList)) {
			$this->htmlJsList[$module]=array();
		};
		$this->htmlJsList[$module][$url]=array(0 => $url, 1 => $opt);
	}

	public function removeHtmlJs($module,$url) {
		if(!array_key_exists($module,$this->htmlJsList)) {
			return;
		};
		unset($this->htmlJsList[$module][$url]);
	}

	public function removeHtmlJsAll($module) {
		if(!array_key_exists($module,$this->htmlJsList)) {
			return;
		};
		unset($this->htmlJsList[$module]);
	}

	public function eHtmlJs() {
		foreach($this->htmlJsList as $key=>$js) {
			foreach($js as $info) {
				$extra="";
				if(strlen($info[1])>0) {
					$extra=" ".$info[1];
				};
				echo "<script src=\"" . $info[0] . "\"".$extra."></script>\n";
			};
		};
	}

	public function setHtmlJsSource($module,$code,$opt="none") {
		if(!array_key_exists($module,$this->htmlJsSourceList)) {
			$this->htmlJsSourceList[$module]=array();
		};
		$this->htmlJsSourceList[$module][]=array(0=>$code,1=>$opt);
	}

	public function removeHtmlJsSourceAll($module) {
		if(!array_key_exists($module,$this->htmlJsSourceList)) {
			return;
		};
		unset($this->htmlJsSourceList[$module]);
	}

	public function eHtmlJsSource() {
		if(count($this->htmlJsSourceList)>0) {
			$simple=array();
			$load=array();

			foreach($this->htmlJsSourceList as $key=>$js) {
				foreach($js as $code) {
					if($code[1]==="load") {
						$load[]=$code[0];
						continue;
					};
					$simple[]=$code[0];
				};
			};

			if(count($simple)||count($load)) {
				echo "<script>\n";
				foreach($simple as $code) {
					echo $code;
				};
				if(count($load)) {
					echo "var __load__=function(){";
					echo "window.removeEventListener(\"load\", __load__);\n";
					foreach($load as $code) {
						echo $code;
					};
					echo "__load__=null;};\n";
					echo "window.addEventListener(\"load\",__load__);\n";
				};
				echo "</script>\n";
			};
		};
	}

	public function setHtmlCss($module,$url) {
		if(!array_key_exists($module,$this->htmlCssList)) {
			$this->htmlCssList[$module]=array();
		};
		$this->htmlCssList[$module][$url]=$url;
	}

	public function removeHtmlCss($module,$url) {
		if(!array_key_exists($module,$this->htmlCssList)) {
			return;
		};
		unset($this->htmlCssList[$module][$url]);
	}

	public function removeHtmlCssAll($module) {
		if(!array_key_exists($module,$this->htmlCssList)) {
			return;
		};
		unset($this->htmlCssList[$module]);
	}

	public function eHtmlCss() {
		foreach($this->htmlCssList as $key=>$css) {
			foreach($css as $url) {
				echo "<link rel=\"stylesheet\" href=\"" . $url . "\">\n";
			};
		};
	}

	public function setHtmlTitle($title) {
		$this->htmlTitle=$title;
	}

	public function eHtmlTitle() {
		if(strlen($this->htmlTitle)>0) {
			echo "<title>".$this->htmlTitle."</title>\n";
		};
	}

	public function setHtmlDescription($description) {
		$this->htmlDescription=$description;
	}

	public function eHtmlDescription() {
		if(strlen($this->htmlDescription)>0) {
			echo "<meta name=\"description\" content=\"".$this->htmlDescription."\">\n";
		};
	}

	public function setHtmlIcon($uri) {
		$this->htmlIcon=$uri;
	}

	public function eHtmlIcon() {
		if(strlen($this->htmlIcon)>0) {
			echo "<link rel=\"icon\" href=\"".$this->htmlIcon."\">\n";
		};
	}

	public function setHtmlJsSourceOrAjax($module,$source,$opt="none") {
		if($this->isAjaxJs) {
			echo $source;
			return;
		};
		if($this->isAjax) {
			echo "<script>\n";
			echo $source;
			echo "</script>\n";
			return;
		};
		$this->setHtmlJsSource($module,$source,$opt);
	}

	public function eHtmlScript() {
		$this->eHtmlJs();
		$this->eHtmlJsSource();
	}

	//
	// Template Manager
	//

	protected $template;
	protected $templatePath;

	private function initTemplateManager() {
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
	// DataSource Manager
	//

	public $dataSource;

	private function initDataSourceManager() {
		$this->dataSource=new xyo_DataSource($this);
		//
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-csv", "xyo-datasource-csv");
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-mysql", "xyo-datasource-mysql");
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-mysqli", "xyo-datasource-mysqli");
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-postgresql", "xyo-datasource-postgresql");
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-sqlite", "xyo-datasource-sqlite");
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-xyo", "xyo-datasource-xyo");
		//
		$this->setModule(null, "xyo/xyo-datasource/xyo-datasource-quantum", "xyo-datasource-quantum");
	}

	//
	// Main
	//

	protected $isInitOk;
	protected $site;

	public function __construct() {
		parent::__construct($this);

		$this->set("kernel_version","3.1.0.0");
		
		$this->set("site","");
		$this->set("use_redirect",false);
		$this->set("log_module",true);
		$this->set("log_request",false);
		$this->set("log_response",false);
		$this->set("request_main","index.php");

		$this->isInitOk=true;

		$this->initModuleManager();
		$this->initGroupManager();
		$this->initApplicationManager();
		$this->initRequestManager();
		$this->initHtmlManager();
		$this->initTemplateManager();
		$this->initDataSourceManager();
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

		// start up session - cookie only
		ini_set("session.use_cookies", 1);
		ini_set("session.use_trans_sid", 0);
		session_start();
		
		if(version_compare(PHP_VERSION, "5.4.0")>=0){
			session_register_shutdown();
		}else{
			register_shutdown_function("session_write_close");
		};
		
		//
		$this->set("version", "5.5.0.0");
		//
		$this->set("log_module",false);
		$this->set("log_request",false);
		$this->set("log_response",false);
		$this->set("log_language",false);
		$this->set("use_redirect",false);
		//
		$this->set("language", "en");
		$this->set("locale", "en");
		$this->set("locale_date_format","Y-m-d");
		$this->set("locale_datetime_format","Y-m-d H:i:s");
		$this->set("locale_time_format","H:i:s");
		//
		$this->initRequest();
		$this->dataSource->loadConfig();
		$this->includeConfig("xyo-cloud");
		//
		$this->setSiteFromServerRequest();
		//

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
			$module = $this->loadModuleExecPath($this->request->get("run",$this->getApplication()));
			if ($module) {
				$this->initModule($module);
				if ($this->isModuleAnApplication($module)) {
					if($this->isAjax || $this->isJson || $this->isAjaxJs) {
						$exec_ = false;
						$this->execModule($module, null);
					};
				} else {
					$exec_ = false;
					$this->execModule($module, null);
				};
			};
			if ($exec_) {
				$this->setApplication($module);
				$this->loadGroup("xyo-system-load");

				if($this->hasApplication()) {
					$this->processApplication($this->getApplication(),null);
				};

				$this->execGroup("xyo-system-exec", null);
			};
		};
	}

}


<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
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
$xyoPath = dirname(realpath(__FILE__)) . "/";
require_once($xyoPath . "xyo-attributes.php");
require_once($xyoPath . "xyo-request.1.php");
require_once($xyoPath . "xyo-config.php");
require_once($xyoPath . "xyo-module.php");

class xyo_Cloud extends xyo_Config {

	protected $modules_;
	protected $request_;
	protected $referenceLinks_;
	protected $referenceBase_;
	protected $isInitOk_;
	protected $moduleGroup_;
	protected $moduleGroupLoaderOk_;
	protected $component_;
	protected $moduleLoader_;
	protected $requestBuilder_;
	protected $template_;
	protected $templatePath_;
	protected $defaultComponent_;
	protected $redirectComponent_;
	protected $redirectComponentParameters_;
	protected $isAjaxJs_;
	protected $isAjax_;
	protected $isJSON_;

	public function __construct() {
		parent::__construct($this);

		$this->modules_ = array();
		$this->request_ = new xyo_Request();
		$this->isInitOk_ = true;

		$this->moduleGroup_ = array();
		$this->moduleGroupLoaderOk_ = array();

		$this->referenceLinks_ = array();
		$this->referenceBase_ = array();

		$this->component_ = null;

		$this->moduleLoader_ = null;

		$this->template_ = null;
		$this->templatePath_ = null;

		$this->requestBuilder_ = null;

		$this->defaultComponent_=null;
		$this->redirectComponent_=null;
		$this->redirectComponentParameters_=null;

		$this->isAjaxJs_=0;
		$this->isAjax_=0;
		$this->isJSON_=0;

		$this->set("system_kernel_version", "1.0.0.0");
		$this->set("request_main", "index.php");		
		$this->set("system_core", "xyo");
		$this->set("site", "");

		$this->set("system_log_request", false);
		$this->set("system_log_response", false);
		$this->set("system_log_module", false);
	}

	public function setModuleLoader($name) {
		$this->moduleLoader_ = &$this->getModule($name);
	}

	public function setRequestBuilder($name) {
		$this->requestBuilder_ = &$this->getModule($name);
	}

	public function setTemplate($module) {
		$this->template_ = $module;
		$this->templatePath_ = $this->getModulePath($module);
	}

	public function getTemplate() {
		return $this->template_;
	}

	public function getTemplatePath() {
		return $this->templatePath_;
	}

	public function setIsInitOk($value_) {
		if ($this->isInitOk_) {
			$this->isInitOk_ = $value_;
		};
	}

	public function getRequest($name, $default_=null) {
		return $this->request_->get($name, $default_);
	}

	public function getRequestDirect() {
		return $this->request_->getAttributes();
	}

	public function setRequest($name, $value_) {
		$this->request_->set($name, $value_);
	}

	public function mergeRequest($value_) {
		$this->request_->merge($value_);
	}

	public function setRequestDirect($value_) {
		$this->request_->setDirect($value_);
	}

	public function isRequest($name) {
		return $this->request_->is($name);
	}

	public function unsetRequest($name) {
		$this->request_->unset_($name);
	}

	public function execModule($module, $parameters=null) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			if ($o["enabled"]) {
				if ($o["loaded"]) {

				} else {
					if ($this->loadModule($o["module"])) {

					} else {
						return null;
					}
				}
				return $o["object"]->moduleMainExec($parameters);
			}
		}
		return null;
	}

	public function &getModuleObject($module) {
		$rValue = null;
		if (strlen($module) == 0) {
			return $rValue;
		}

		if (array_key_exists($module, $this->modules_)) {
			if ($this->modules_[$module]["check"]) {

			} else {
				return $this->modules_[$module];
			}
		}

		if ($this->moduleLoader_) {
			if ($this->moduleLoader_->systemSetModule($module)) {
				if (array_key_exists($module, $this->modules_)) {
					$this->modules_[$module]["check"] = false;
					return $this->modules_[$module];
				}
			}
		}

		if (array_key_exists($module, $this->modules_)) {
			if ($this->modules_[$module]["check"]) {
				$this->modules_[$module]["check"] = false;
				$this->modules_[$module]["enabled"] = false;
			}
			return $this->modules_[$module];
		}

		return $rValue;
	}

	public function &getModule($module) {
		$rValue = null;
		$o = &$this->getModuleObject($module);
		if ($o) {
			if ($o["enabled"]) {

				if ($o["loaded"]) {

				} else {
					if ($this->loadModule($o["module"])) {

					} else {
						return $rValue;
					}
				}
				return $o["object"];
			}
		}
		return $rValue;
	}

	public function enableModule($module, $enable=true) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			$o["enabled"] = $enable;
			return true;
		}
		return false;
	}

	public function disableModule($module) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			$o["enabled"] = false;
			return true;
		};
		return false;
	}

	public function getModulePath($module) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			return $o["path"];		
		};
		return null;
	}

	public function getModulePathBase($module) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			return $o["base_path"];
		};
		return null;
	}

	public function loadModule($module) {
		$module_ = &$this->getModuleObject($module);
		if ($module_) {
			if ($module_["enabled"]) {

			} else {
				return false;
			}
			if ($module_["loaded"]) {
				return true;
			}

			$initFile = $module_["path"] . "cloud.php";
			if (file_exists($initFile)) {
				require_once($initFile);
			}

			if (!$this->loadReferenceLinks($module)) {
				return false;
			}

			$moduleFile = $module_["path"] . "module.php";
			$className = "xyo_Module";
			$module = $module_["module"];
			if (file_exists($moduleFile)) {
				require_once($moduleFile);
			}
			$module_["class"] = $className;

			if ($className === "xyo_Module") {
				if (array_key_exists($module, $this->referenceBase_)) {
					$base_ = &$this->getModuleObject($this->referenceBase_[$module]);
					if ($base_) {
						if ($base_["loaded"]) {
							$module_["base_class"] = "*";
							$module_["class"] = $base_["class"];
						} else {
							return false;
						}
					}
				}
			} else {
				$module_["base_class"] = $className;
			}

			$module_["base_path"] = array($module => $module_["path"]);
			$moduleBase_ = $module;
			while (array_key_exists($moduleBase_, $this->referenceBase_)) {
				$moduleBase_ = $this->referenceBase_[$moduleBase_];
				$base_ = &$this->getModuleObject($moduleBase_);
				if ($base_) {
					$module_["base_path"][$moduleBase_] = $base_["path"];
				}
			}


			$module_["loaded"] = true;
			$module_["object"] = new $module_["class"]($module_, $this);
			if ($module_["enabled"]) {
				$module_["object"]->moduleInit();
			}
			return $module_["enabled"];
		}
		return false;
	}

	public function requireModule($module) {
		if($this->loadModule($module)){
			
		}else{
			die("FATAL: Required module ".$module." not found.");
		};
	}

	public function &getGroup($group) {
		$ml = array();

		if (array_key_exists($group, $this->moduleGroupLoaderOk_)) {

		} else {
			$this->moduleGroupLoaderOk_[$group] = true;

			if ($this->moduleLoader_) {
				$this->moduleLoader_->systemSetGroup($group);
			}
		}

		if (array_key_exists($group, $this->moduleGroup_)) {

		} else {
			return $ml;
		}

		asort($this->moduleGroup_[$group]);
		$ml = array_keys($this->moduleGroup_[$group]);
		return $ml;
	}

	public function execGroup($group, $parameters=null) {
		$ml = &$this->getGroup($group);
		foreach ($ml as $module) {
			$this->execModule($module, $parameters);
		}
	}

	public function loadGroup($group) {
		$ml = &$this->getGroup($group);
		foreach ($ml as $module) {
			$this->loadModule($module);
		}
	}

	public function setModuleCheck($module, $check) {
		$mod = &$this->getModuleObject($module);
		if ($mod) {
			$mod["check"] = $check;
		}
	}

	public function setModuleParameters($module, $parameters) {
		$mod = &$this->getModuleObject($module);
		if ($mod) {
			$mod["parameters"] = $parameters;
		}
	}

	public function setModule($moduleParent, $path, $module, $enabled, $parameters=null, $registered=false, $override=false) {
		if ($override) {

		} else {
			if (array_key_exists($module, $this->modules_)) {
				$this->modules_[$module]["enabled"] = $enabled;
				return true;
			}
		}

		if (strlen($moduleParent) > 0) {
			if (array_key_exists($moduleParent, $this->modules_)) {

			} else {
				$check_ = &$this->getModuleObject($moduleParent);
				if ($check_) {

				} else {
					return false;
				}
			}
		}

		$pathModule = null;

		if (strlen($moduleParent) > 0) {
			if (strlen($path) > 0) {
				$pathModule = $this->modules_[$moduleParent]["path"] . $path . "/";
			} else {
				$pathModule = $this->modules_[$moduleParent]["path"] . $module . "/";
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

		$this->modules_[$module] = array();
		$this->modules_[$module]["parent"] = $moduleParent;
		$this->modules_[$module]["module"] = $module;
		$this->modules_[$module]["class"] = null;
		$this->modules_[$module]["enabled"] = $enabled;
		$this->modules_[$module]["path"] = $pathModule;
		$this->modules_[$module]["loaded"] = false;
		$this->modules_[$module]["check"] = false;
		$this->modules_[$module]["parameters"] = $parameters;
		$this->modules_[$module]["component"] = null;
		$this->modules_[$module]["base_class"] = null;
		$this->modules_[$module]["base_path"] = null;
		$this->modules_[$module]["registered"] = $registered;
		$this->modules_[$module]["object"] = null;
		return true;
	}

	public function setModuleGroup($module, $group, $order=0) {
		if (array_key_exists($group, $this->moduleGroup_)) {

		} else {
			$this->moduleGroup_[$group] = array();
		};
		$this->moduleGroup_[$group][$module] = $order;
	}

	public function removeModule($module) {
		if (array_key_exists($module, $this->modules_)) {
			unset($this->module_[$module]);
		};
	}

	public function removeModuleFromGroup($module, $group) {
		if (array_key_exists($group, $this->moduleGroup_)) {
			unset($this->moduleGroup_[$group][$module]);
		};
	}

	public function removeGroup($group) {
		if (array_key_exists($group, $this->moduleGroup_)) {
			unset($this->moduleGroup_[$group]);
		};
	}

	public function setComponent($module) {
		$this->component_ = $module;
	}

	public function isComponent($name) {
		return ($this->component_ === $name);
	}

	public function getComponent() {
		return $this->component_;
	}

	public function generateComponentView($params=null) {
		if ($this->component_) {
			$com=&$this->getModule($this->component_);
			if($com) {
				return $com->applicationView($params);
			}
		}
		return null;
	}

	public function setModuleAsComponent($module, $enabled) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			$o["component"] = $enabled;
			return true;
		}
		return false;
	}

	public function isModuleAsComponent($module) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			if ($o["component"]) {
				return true;
			}
		}
		return false;
	}

	public function getModuleParameters($name) {
		$mod = &$this->getModuleObject($name);
		if ($mod) {
			return $mod["parameters"];
		}
		return null;
	}

	public function main() {
		$this->includeConfig("xyo-cloud");

		if ($this->get("system_log_request")) {
			ob_start();

			print_r($this->request_->getAttributes());

			$ret_v = ob_get_contents();
			ob_end_clean();
			$fs = fopen("log/" . date("Y-m-d")."-request.log", "ab");
			if ($fs) {
				fwrite($fs, date("Y-m-d H:i:s") . " [".$this->getClientIp_()."]\n");
				fwrite($fs, $ret_v);
				fwrite($fs, "\n\n");
				fclose($fs);
			};
		};

		if ($this->get("system_log_response")) {
			ob_start();

			function _xyo_cloud__log_response__shutdown($x) {
				$ret_v = ob_get_contents();
				ob_end_clean();
				$fs = fopen($x[0] . date("Y-m-d")."-response.log", "ab");
				if ($fs) {
					fwrite($fs, date("Y-m-d H:i:s") . " [".$x[1]."]\n");
					fwrite($fs, $ret_v);
					fwrite($fs, "\n\n");
					fclose($fs);
				};
				echo $ret_v;
			}

			$x=array(0=>"log/",1=>$this->getClientIp_());
			register_shutdown_function("_xyo_cloud__log_response__shutdown", $x);
		};

		$this->execGroup("xyo-system-init", null);
		if ($this->isInitOk_) {
			$exec_ = true;
			$module = $this->loadModuleExecPath_($this->getRequest("run",$this->component_));
			if ($module) {
				if ($this->isModuleAsComponent($module)) {
					if($this->getRequest("ajax-js",0)*1) {
						$this->isAjaxJs_=1;
						$exec_ = false;
						$this->execModule($module, null);
					}else
					if($this->getRequest("ajax",0)*1) {
						$this->isAjax_=1;
						$exec_ = false;
						$this->execModule($module, null);
					}else
					if($this->getRequest("json",0)*1) {
						$this->isJSON_=1;
						$exec_ = false;
						$this->execModule($module, null);
					}
				} else {
					$exec_ = false;
					$this->execModule($module, null);
				};
			};
			if ($exec_) {
				$this->setComponent($module);
				$this->loadGroup("xyo-system-load");

				if($this->component_) {
					$this->processComponent($this->component_,null);
				};

				$this->execGroup("xyo-system-exec", null);
			};
		};
	}

	public function getModuleNameFromRequest() {
		$module=$this->getRequest("run",$this->component_);
		if($module) {
			$m = explode(".", $module);
			if (is_array($m)) {
				return array_pop($m);
			};
			return $module;
		};
		return null;
	}

	public function logMessage($type, $message_,$module_=null) {
		$fs = fopen("log/" . date("Y-m-d")."-". $type.".log", "ab");
		if ($fs) {
			if($module_) {
				fwrite($fs, date("Y-m-d H:i:s") . " [".$this->getModuleExecPath_($module_)."] [".$this->getClientIp_()."]: ");
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

	public function getParameterRequest($name, $parameters, $default_=null) {
		if ($parameters) {
			if (array_key_exists($name, $parameters)) {
				return $parameters[$name];
			}
		};
		return $this->getRequest($name, $default_);
	}

	public function isParameterRequest($name, $parameters) {
		if ($parameters) {
			if (array_key_exists($name, $parameters)) {
				return true;
			};
		};
		return $this->isRequest($name);
	}

	public function requestModuleDirect($module, $parameters=null) {
		if ($parameters) {

		} else {
			$parameters = array();
		}
		if($module) {
			$module_ = $this->getModuleExecPath_($module);
			$parameters["run"] = $module_;
		}
		return $parameters;
	}

	public function getModuleExecPath_($module) {
		$m = "";
		$x = &$this->getModuleObject($module);
		if ($x) {
			$m = $x["module"];
			while ($x) {
				if ($x["registered"]) {
					return $m;
				}
				$x = &$this->getModuleObject($x["parent"]);
				if ($x) {
					$m = $x["module"] . "." . $m;
				};
			};
		};
		return $m;
	}

	public function setReferenceLink($derivate, $base) {
		if (array_key_exists($derivate, $this->referenceLinks_)) {

		} else {
			$this->referenceLinks_[$derivate] = array();
		};
		$this->referenceLinks_[$derivate][$base] = $base;
	}

	public function setReferenceBase($derivate, $base) {
		$this->setReferenceLink($derivate, $base);
		$this->referenceBase_[$derivate] = $base;
	}

	public function loadReferenceLinks($derivate) {
		if (array_key_exists($derivate, $this->referenceLinks_)) {
			foreach ($this->referenceLinks_[$derivate] as $base) {
				if ($this->loadModule($base)) {

				} else {
					if ($this->get("system_log_module", false)) {
						$this->logMessage("module", "LOAD-FAIL: [" . $base . "] on [" . $derivate . "]");
					}
					return false;
				}
			}
		}
		return true;
	}

	public function setVersion($module, $version) {
		$module_ = &$this->getModuleObject($module);
		if ($module_) {
			$module_["version"] = $version;
		};
	}

	public function getVersion($module) {
		$module_ = &$this->getModuleObject($module);
		if ($module_) {
			return $module_["version"];
		};
		return null;
	}

	public function requestUri($parameters=null) {
		if ($this->requestBuilder_) {
			return $this->requestBuilder_->systemRequestUri($parameters);
		};	
		if($this->get("system_use_redirect",false)){
			$retV = $this->get("request_main");		
			if ($parameters) {
				$first = false;
				if (array_key_exists("run", $parameters)) {
					if($retV=="administrator.php"){
						$retV=$this->get("site")."admin/run/".rawurlencode($parameters["run"]);
					};
					if($retV=="public.php"){
						$retV=$this->get("site")."public/run/".rawurlencode($parameters["run"]);
					};
					if($retV=="index.php"){
						$retV=$this->get("site")."run/".rawurlencode($parameters["run"]);
					};
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
				}
			};
			return $retV;
		};

		$retV = $this->get("request_main");		
		if ($parameters) {
			$first = false;
			if (array_key_exists("run", $parameters)) {
				$retV.="?run=" . rawurlencode($parameters["run"]);
				$first = true;				
			}
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
			}
		};
		return $retV;
	}

	public function requestUriModule($module, $parameters=null) {
		return $this->requestUri($this->requestModuleDirect($module, $parameters));
	}

	public function clearRequest() {
		$this->request_->clear();
	}

	public function setDefaultComponent($name) {
		$this->defaultComponent_=$name;
		if ($this->component_) {
		} else {
			$this->setComponent($name);
		}
	}

	public function getDefaultComponent() {
		return $this->defaultComponent_;
	}

	public function redirectComponent($name,$parameters=null) {
		$this->redirectComponent_=$name;
		$this->redirectComponentParameters_=$parameters;
	}

	public function processComponent($name,$parameters=null) {
		$this->redirectComponent_=$name;
		$this->redirectComponentParameters_=$parameters;
		while($this->redirectComponent_) {
			$this->component_=$this->redirectComponent_;
			$parameters_=$this->redirectComponentParameters_;
			$this->redirectComponent_=null;
			$this->redirectComponentParameters_=null;

			$com=&$this->getModule($this->component_);
			if($com) {
				$com->mergeParameters($parameters_);
				$com->applicationPrepare();
				$com->applicationInit();
				$com->applicationAction();
			}
		}
	}


	public function loadModuleExecPath_($module) {

		if (strlen($module) == 0) {
			return null;
		};

		$m = explode(".", $module);
		if (is_array($m)) {
			$module = array_pop($m);
			if (strlen($module) == 0) {
				return null;
			};
			if (array_key_exists($module, $this->modules_)) {

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

	public function moduleFromExecPath_($module) {
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
		$o = &$this->getModuleObject($module);
		if ($o) {
			if ($o["enabled"]) {
				if ($o["loaded"]) {
					return true;
				}
			}
		};
		return false;
	}

	public function isModuleEnabled($module) {
		$o = &$this->getModuleObject($module);
		if ($o) {
			if ($o["enabled"]) {
				return true;
			}
		};
		return false;
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

	public function runRequest($request) {
		$module=$this->loadModuleExecPath_($this->getRequest("run"));
		if($module) {
			return $this->execModule($module,$request);
		};
		return null;
	}

	public function getClientIp_() {
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

	public function getStoragePath($module) {
		return "repository/module/".$module;
	}

	public function getStorageFilename($module,$fileName) {
		return "repository/module/".$module."/".$fileName;
	}

	public function isAjaxJs(){
		return $this->isAjaxJs_;
	}

	public function isAjax(){
		return $this->isAjax_;
	}

	public function isJSON(){
		return $this->isJSON_;
	}

}


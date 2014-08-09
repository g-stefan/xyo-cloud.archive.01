<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

class xyo_Module extends xyo_Config {

	protected $path;
	protected $name;
	protected $instance;
	protected $returnValue;
	protected $isOk;
	//
	protected $moduleBaseClass_;
	protected $parameters_;
	protected $parametersStack_;
	protected $elementValue_;
	protected $elementPrefix_;
	protected $elementPrefixV_;
	protected $formName_;
	protected $formNameV_;
	protected $error_;
	protected $message_;
	protected $nameView_;
	protected $nameRedirect_;
	protected $cancelAction_;
	protected $redirectMax_;
	protected $defaultAction_;
	protected $viewTemplate_;
	protected $returnParameters_;
	protected $keepRequest_;
	protected $modulePathBase_;
	protected $moduleCallList_;
//
	protected $viewPath;

	public function __construct(&$object, &$cloud) {
		parent::__construct($cloud);
		$this->isOk = true;
		$this->path = $object["path"];
		$this->name = $object["module"];
		$this->moduleBaseClass_ = $object["base_class"];
		$this->modulePathBase_ = $object["base_path"];
		$this->parameters_ = $object["parameters"];
		if ($this->parameters_) {

		} else {
			$this->parameters_ = array();
		};
		$this->parametersStack_ = array();
		$this->returnParameters_ = array();
		$this->redirectMax_ = 8;

		$this->instance = 0;
		$this->nameView_ = null;

		$this->nameRedirect_ = null;
		$this->viewTemplate_ = null;

		$this->error_ = array();
		$this->message_ = array();

		$this->defaultAction_ = null;
		$this->keepRequest_ = array();
		$this->elementValue_ = array();

		$this->setFormName("fn");
		$this->setElementPrefix("e");

		$this->moduleCallList_=array();
	}

	public function isBase($name) {
		return ($name === $this->moduleBaseClass_);
	}

	public function pushParameters() {
		$this->parametersStack_[] = array($this->parameters_, $this->returnParameters_);
		$this->returnParameters_ = array();
	}

	public function popParameters($mode=false,$default=array()) {
		$retV=$default;
		$pop_ = array_pop($this->parametersStack_);
		if ($pop_) {
			if($mode) {
				$retV=array_merge($default,$this->returnParameters_);
				$this->parameters_ = $pop_[0];
				$this->returnParameters_ = $pop_[1];
			} else {
				$this->parameters_ = array_merge($pop_[0], $this->returnParameters_);
				$this->returnParameters_ = $pop_[1];
			}
		} else {
			// stack unwinding error
			if($mode) {
				$retV=array_merge($default,$this->returnParameters_);
				$this->parameters_ = array();
				$this->returnParameters_ = array();
			} else {
				$this->parameters_ = $this->returnParameters_;
				$this->returnParameters_ = array();
			}
		}
		return $retV;
	}

	public function mergeParameters($parameters) {
		if (is_null($parameters)) {
			return;
		};
		$this->parameters_ = array_merge($this->parameters_, $parameters);
	}

	public function moduleInit() {
		foreach (array_reverse($this->modulePathBase_, true) as $module => $path) {
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

	public function applicationInit() {
		foreach (array_reverse($this->modulePathBase_, true) as $path) {
			$this->includeFile($path . "init-application.php");
		}
	}

	public function applicationPrepare() {
		$template = $this->cloud->getTemplate();
		if ($template) {
			$modTemplate = &$this->cloud->getModule($template);
			if ($modTemplate) {
				$this->keepRequest_ = $this->xyo_array_merge_ex_($modTemplate->getKeepRequestDirect(), $this->keepRequest_);
			}
		}
	}

	public function applicationAction() {
		$this->nameView_ = null;
		$this->nameRedirect_ = null;
		$this->cancelAction_ = false;
		$redirect_ = 0;
		$action_ = $this->defaultAction_;
		while ($redirect_ < $this->redirectMax_) {
			++$redirect_;
			$this->doAction($action_);
			if ($this->cancelAction_) {
				return;
			}
			if ($this->nameRedirect_) {
				$action_ = $this->nameRedirect_;
				$this->nameRedirect_ = null;
				continue;
			}
			break;
		}
	}

	public function applicationView($parameters=null) {
		if ($this->viewTemplate_) {
			$this->generateView($this->viewTemplate_,$parameters);
		} else {
			$this->generateView($this->nameView_,$parameters);
		}
	}

	public function cancelAction() {
		$this->cancelAction_ = true;
	}

	public function setRedirectLevels($count) {
		$this->redirectMax_ = $count;
	}

	public function getRedirectLevels() {
		return $this->redirectMax_;
	}

	public function setDefaultAction($name) {
		$this->defaultAction_ = $name;
	}

	public function getDefaultAction() {
		return $this->defaultAction_;
	}

	public function setViewTemplate($name) {
		$this->viewTemplate_ = $name;
	}

	public function getViewTemplate() {
		return $this->viewTemplate_;
	}

	public function generateCurrentView($parameters=null) {
		return $this->generateViewFromModule($this->name, $this->nameView_, $parameters);
	}

	public function generateView($name=null, $parameters=null) {
		return $this->generateViewFromModule($this->name, $name, $parameters);
	}

	public function processModel($name=null, $parameters=null, $push=true) {
		return $this->processModelFromModule($this->name, $name, $parameters, $push);
	}

	public function doAction($name=null, $parameters=null) {
		return $this->doActionFromModule($this->name, $name, $parameters);
	}

	public function getCallBase___($name) {
		if(count($this->moduleCallList_)) {
			$module_=array_pop($this->moduleCallList_);
			$this->moduleCallList_[]=$module_;
		} else {
			$module_=$this->name;
		};
		$base_=null;
		$select_=false;
		foreach ($this->modulePathBase_ as $key_ => $value_) {
			if($select_) {
				$base_=$key_;
				break;
			}
			if($key_===$module_) {
				$select_=true;
			}
		}
		return $base_;
	}

	public function processModelBase($name=null, $parameters=null, $push=true) {
		$base_=$this->getCallBase___($name);
		if($base_) {
			return $this->processModelFromModule($base_, $name, $parameters, $push);
		}
		return null;
	}

	public function generateViewBase($name=null, $parameters=null) {
		$base_=$this->getCallBase___($name);
		if($base_) {
			return $this->generateViewFromModule($base_, $name, $parameters);
		}
		return null;
	}

	public function doActionBase($name=null, $parameters=null) {
		$base_=$this->getCallBase___($name);
		if($base_) {
			return $this->doActionFromModule($base_, $name, $parameters);
		}
		return null;
	}

	public function setView($name) {
		$this->nameView_ = $name;
	}

	public function getView() {
		return $this->nameView_;
	}

	public function doRedirect($name) {
		$this->nameRedirect_ = $name;
	}

	public function getRedirect() {
		return $this->nameRedirect_;
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

	public function loadModule($module) {
		return $this->cloud->loadModule($module);
	}

	public function execModule($module, $params=null) {
		return $this->cloud->execModule($module, $params);
	}

	public function loadGroup($group) {
		return $this->cloud->loadGroup($group);
	}

	public function execGroup($group, $params=null) {
		return $this->cloud->execGroup($group, $params);
	}

	public function &getModule($module) {
		return $this->cloud->getModule($module);
	}

	public function &getGroup($group) {
		return $this->cloud->getGroup($group);
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

	public function requestThisDirect($parameters=null) {
		return $this->cloud->requestModuleDirect($this->name, $this->xyo_array_merge_ex_($this->keepRequest_, $parameters));
	}

	public function requestUriThis($parameters=null) {
		return $this->cloud->requestUriModule($this->name, $this->xyo_array_merge_ex_($this->keepRequest_, $parameters));
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

	public function generateComponentView($params=null) {
		return $this->cloud->generateComponentView($params);
	}

	public function clearRequest() {
		$this->cloud->clearRequest();
	}

	public function setDefaultComponent($name) {
		$this->cloud->setDefaultComponent($name);
	}

	public function getDefaultComponent($name) {
		return $this->cloud->getDefaultComponent($name);
	}


	public function ejsBegin() {
		echo "<script type=\"text/javascript\">//<![CDATA[\n";
	}

	public function ejsEnd() {
		echo "\n//]]></script>";
	}

	public function eFormBuildRequest($requestDirect_) {
		foreach ($requestDirect_ as $key_ => $value_) {
			echo "<input type=\"hidden\" name=\"" . htmlspecialchars($key_) . "\" value=\"" . htmlspecialchars($value_) . "\" />";
		}
	}

	public function getRequest($name, $default_=null) {
		return $this->cloud->getRequest($name, $default_);
	}

	public function setRequest($name, $value_) {
		return $this->cloud->setRequest($name, $value_);
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

	public function includeLocal($name) {
		if (file_exists($this->path . $name)) {
			include($this->path . $name);
			return true;
		};
		return false;
	}

	public function eFormRequest($parameters=null) {
		$this->eFormRequestModule($this->name, $this->xyo_array_merge_ex_($this->keepRequest_, $parameters));
	}

	public function eFormRequestModule($module, $parameters=null) {
		$this->eFormBuildRequest($this->cloud->requestModuleDirect($module, $parameters));
	}

	public function setElementPrefix($name) {
		$this->elementPrefix_ = $name;
		$this->elementPrefixV_ = $name . "_";
	}

	public function getElementPrefix() {
		return $this->elementPrefix_;
	}

	public function setFormName($name) {
		$this->formName_ = $name;
		$this->formNameV_ = $name . "_";
	}

	public function getFormName() {
		return $this->formName_;
	}

	public function eFormName() {
		echo htmlspecialchars($this->getFormName());
	}

	public function getElementName($name) {
		return $this->elementPrefixV_ . $name;
	}

	public function eElementName($name) {
		echo htmlspecialchars($this->getElementName($name));
	}

	public function getElementId($name, $postfix_=null) {
		return $this->formNameV_ . $name . ($postfix_ ? "_" . $postfix_ : "");
	}

	public function eElementId($name, $postfix_=null) {
		echo htmlspecialchars($this->getElementId($name, $postfix_));
	}

	public function setElementValue($name, $value) {
		$this->elementValue_[$this->elementPrefixV_ . $name] = $value;
	}

	public function getElementValue($name, $default=null) {
		return $this->cloud->getParameterRequest($this->elementPrefixV_ . $name, $this->elementValue_, $default);
	}

	public function isElement($name) {
		return $this->cloud->isParameterRequest($this->elementPrefixV_ . $name, $this->elementValue_);
	}

	public function eElementValue($name, $default=null) {
		echo htmlspecialchars($this->getElementValue($name, $default));
	}

	public function setParameterIfNotExists($name, $value) {
		if (array_key_exists($name, $this->parameters_)) {

		} else {
			$this->parameters_[$name] = $value;
		}
	}

	public function setElementValueIfNotExists($name, $value) {
		if (array_key_exists($name, $this->elementValue_)) {

		} else {
			$this->elementValue_[$name] = $value;
		}
	}

	public function ePath() {
		echo $this->getPath();
	}

	public function setElementError($name, $value) {
		if (array_key_exists($this->elementPrefix_, $this->error_)) {

		} else {
			$this->error_[$this->elementPrefix_] = array();
		}
		$this->error_[$this->elementPrefix_][$name] = $value;
	}

	public function getElementError($name, $default_=null) {
		if (array_key_exists($this->elementPrefix_, $this->error_)) {
			if (array_key_exists($name, $this->error_[$this->elementPrefix_])) {
				return $this->error_[$this->elementPrefix_][$name];
			}
		}
		return $default_;
	}

	public function eElementError($name, $default_=null) {		
		echo $this->getElementError($name, $default_);
	}

	public function clearElementError($name=null) {
		if (array_key_exists($this->elementPrefix_, $this->error_)) {
			if ($name) {
				if (array_key_exists($name, $this->error_[$this->elementPrefix_])) {
					unset($this->error_[$this->elementPrefix_][$name]);
				}
			} else {
				$this->error_[$this->elementPrefix_] = array();
			}
		}
	}

	public function isElementError($name=null) {
		if (array_key_exists($this->elementPrefix_, $this->error_)) {
			if ($name) {
				if (array_key_exists($name, $this->error_[$this->elementPrefix_])) {
					return true;
				}
			} else {
				return (count($this->error_[$this->elementPrefix_]) > 0);
			}
		}
		return false;
	}

	public function clearError() {
		$this->error_ = array();
	}

	public function isError($name=null) {
		if ($name) {
			if (array_key_exists($name, $this->error_)) {
				return true;
			}
			return false;
		};
		return (count($this->error_) > 0);
	}

	public function getError($name, $default=null) {
		if (array_key_exists($name, $this->error_)) {
			return $this->error_[$name];
		}
		return $default;
	}

	public function setError($name, $value) {
		$this->error_[$name] = $value;
	}

	public function getParameterRequest($name, $default_=null) {
		return $this->cloud->getParameterRequest($name, $this->parameters_, $default_);
	}

	public function isParameterRequest($name) {
		return $this->cloud->isParameterRequest($name, $this->parameters_);
	}

	public function isParameter($name) {
		return array_key_exists($name, $this->parameters_);
	}

	public function eRequestUri($parameters=null) {
		echo $this->requestUri($parameters);
	}

	public function eFormAction($parameters=null) {
		echo $this->cloud->requestUriModule($this->name, $parameters);
	}

	public function clearParameters() {
		$this->parameters_ = array();
	}

	public function clearElements() {
		$this->elementValue_ = array();
	}

	public function setParameter($name, $value) {
		$this->parameters_[$name] = $value;
	}

	public function getParameter($name, $default=null) {
		if (array_key_exists($name, $this->parameters_)) {
			return $this->parameters_[$name];
		}
		return $default;
	}

	public function returnParameter($name, $value) {
		$this->returnParameters_[$name] = $value;
		$this->parameters_[$name] = $value;
	}

	public function returnParameters($parameters_) {
		$this->returnParameters_=array_merge($this->returnParameters_,$parameters_);
		$this->parameters_=array_merge($this->parameters_,$parameters_);
	}

	public function keepParameter($name) {
		if (array_key_exists($name, $this->parameters_)) {
			$this->returnParameters_[$name] = $this->parameters_[$name];
		}
	}

	public function generateCurrentViewFromModule($module, $parameters=null) {
		return $this->generateViewFromModule($module, $this->nameView_, $parameters);
	}

	public function generateViewFromModule($module, $name=null, $parameters=null) {
		$this->moduleCallList_[]=$module;
		$this->pushParameters();
		$this->mergeParameters($parameters);
		if ($name) {

		} else {
			$name = "default";
		}

		$pathT = $this->cloud->getTemplatePath();
		if ($module === $this->name) {
			foreach ($this->modulePathBase_ as $module_ => $path) {
				if ($pathT) {
					$this->viewPath=$pathT . "sys/view/" . $module_ . "/";
					if ($this->includeFile($pathT . "sys/view/" . $module_ . "/" . $name . ".php")) {
						$this->popParameters();
						array_pop($this->moduleCallList_);
						return true;
					}
				}
				$this->viewPath=$path . "view/";
				if ($this->includeFile($path . "view/" . $name . ".php")) {
					$this->popParameters();
					array_pop($this->moduleCallList_);
					return true;
				}
			}
		} else {
			if ($pathT) {
				$this->viewPath=$pathT . "sys/view/" . $module . "/";
				if ($this->includeFile($pathT . "sys/view/" . $module . "/" . $name . ".php")) {
					$this->popParameters();
					array_pop($this->moduleCallList_);
					return true;
				}
			}
			$path = $this->cloud->getModulePath($module);
			if ($path) {
				$this->viewPath=$path . "view/";
				if ($this->includeFile($path . "view/" . $name . ".php")) {
					$this->popParameters();
					array_pop($this->moduleCallList_);
					return true;
				}
			}
		}

		$this->popParameters();
		array_pop($this->moduleCallList_);
		return false;
	}

	public function processViewX($name_,$suffix_,$path_,$parameters=null) {
		$this->moduleCallList_[]=$this->name;
		$this->pushParameters();
		$this->mergeParameters($parameters);

		$this->viewPath=$this->cloud->getTemplatePath() . "view/".$path_."/";
		$file_=$this->viewPath.$name_.$suffix_.".php";
		if($this->includeFile($file_)) {
			$this->popParameters();
			array_pop($this->moduleCallList_);
			return true;
		};

		$this->viewPath=$this->cloud->get("path_base") . $path_."/";
		$file_=$this->viewPath.$name_.$suffix_.".php";
		if($this->includeFile($file_)) {
			$this->popParameters();
			array_pop($this->moduleCallList_);
			return true;
		};

		$this->viewPath=$this->cloud->getTemplatePath() . "sys/view/".$this->name."/".$path_."/";
		$file_=$this->viewPath.$name_.$suffix_.".php";
		if($this->includeFile($file_)) {
			$this->popParameters();
			array_pop($this->moduleCallList_);
			return true;
		};

		foreach ($this->modulePathBase_ as $path) {

			$this->viewPath=$path . "view/".$path_."/";
			$file_=$this->viewPath.$name_.$suffix_.".php";
			if($this->includeFile($file_)) {
				$this->popParameters();
				array_pop($this->moduleCallList_);
				return true;
			};

		};

		$this->popParameters();
		array_pop($this->moduleCallList_);
		return false;
	}

	public function callFromThis($name=null, $parameters=null, $push=true, $mode=false,$default=array()) {
		return $this->callFromModule($this->name, $name, $parameters, $push, $mode,$default);
	}

	public function callFromModule($module, $name=null, $parameters=null, $push=true, $mode=false,$default=array()) {
		$this->moduleCallList_[]=$module;
		if ($push) {
			$this->pushParameters();
		}
		$this->mergeParameters($parameters);
		if ($name) {

		} else {
			array_pop($this->moduleCallList_);
			if($mode) {
				return null;
			}
			return false;
		}
		if ($module === $this->name) {
			foreach ($this->modulePathBase_ as $path) {
				if ($this->includeFile($path . $name . ".php")) {
					array_pop($this->moduleCallList_);
					if ($push) {
						if($mode) {
							return $this->popParameters($mode,$default);
						} else {
							$this->popParameters();
						}
					}
					if($mode) {
						return null;
					}
					return true;
				}
			}
		} else {
			$path = $this->cloud->getModulePath($module);
			if ($path) {
				if ($this->includeFile($path . $name . ".php")) {
					array_pop($this->moduleCallList_);
					if ($push) {
						if($mode) {
							return $this->popParameters($mode,$default);
						} else {
							$this->popParameters();
						}
					}
					if($mode) {
						return null;
					}
					return true;
				}
			}
		}
		array_pop($this->moduleCallList_);
		if ($push) {
			if($mode) {
				$this->popParameters($mode,$default);
				return null;
			} else {
				$this->popParameters();
			}
		}
		if($mode) {
			return null;
		}
		return false;
	}

	public function processModelFromModule($module, $name=null, $parameters=null, $push=true, $mode=false) {
		if($name) {
		} else {
			$name="default";
		};
		return $this->callFromModule($module, "model/".$name, $parameters, $push, $mode);
	}

	public function doActionFromModule($module, $name=null, $parameters=null) {
		if($name) {
		} else {
			$name="default";
		};
		return $this->callFromModule($module, "action/".$name, $parameters, false, false);
	}

	public function keepRequest($name) {
		if ($this->cloud->isParameterRequest($name, $this->parameters_)) {
			$this->keepRequest_[$name] = $this->cloud->getParameterRequest($name, $this->parameters_);
		}
	}

	public function keepRequestElement($name) {
		if ($this->cloud->isParameterRequest($this->elementPrefixV_ . $name, $this->elementValue_)) {
			$this->keepRequest_[$this->elementPrefixV_ . $name] = $this->cloud->getParameterRequest($this->elementPrefixV_ . $name, $this->elementValue_);
		}
	}

	public function clearKeepRequest() {
		$this->keepRequest_ = array();
	}

	public function setKeepRequest($name, $value) {
		$this->keepRequest_[$name] = $value;
	}

	public function setKeepRequestElement($name, $value) {
		$this->keepRequest_[$this->elementPrefixV_ . $name] = $value;
	}

	public function unsetKeepRequest($name) {
		if (array_key_exists($name, $this->keepRequest_)) {
			unset($this->keepRequest_[$name]);
		}
	}

	public function unsetKeepRequestElement($name) {
		if (array_key_exists($this->elementPrefixV_ . $name, $this->keepRequest_)) {
			unset($this->keepRequest_[$this->elementPrefixV_ . $name]);
		}
	}

	public function getKeepRequestDirect($parameters=null) {
		return $this->xyo_array_merge_ex_($this->keepRequest_, $parameters);
	}

	public function getRequestDirect() {
		return $this->cloud->getRequestDirect();
	}

	public function transferKeepRequest($name,$transfer) {
		$this->transferRequest($name,$transfer);
		$this->keepRequest($transfer);
	}

	public function xyo_array_merge_ex_($a, $b) {
		if ($b) {

		} else {
			return $a;
		}
		return array_merge($a, $b);
	}

	public function jsEscape($x) {
		return str_replace(array("'", "\""), array("&#39;", "&#34;"), $x);
	}

	public function setElementMessage($name, $value) {
		if (array_key_exists($this->elementPrefix_, $this->message_)) {

		} else {
			$this->message_[$this->elementPrefix_] = array();
		}
		$this->message_[$this->elementPrefix_][$name] = $value;
	}

	public function getElementMessage($name, $default_=null) {
		if (array_key_exists($this->elementPrefix_, $this->message_)) {
			if (array_key_exists($name, $this->message_[$this->elementPrefix_])) {
				return $this->message_[$this->elementPrefix_][$name];
			}
		}
		return $default_;
	}

	public function eElementMessage($name, $default_=null) {
		echo $this->getElementMessage($name, $default_);
	}

	public function clearElementMessage($name=null) {
		if (array_key_exists($this->elementPrefix_, $this->message_)) {
			if ($name) {
				if (array_key_exists($name, $this->message_[$this->elementPrefix_])) {
					unset($this->message_[$this->elementPrefix_][$name]);
				}
			} else {
				$this->message_[$this->elementPrefix_] = array();
			}
		}
	}

	public function isElementMessage($name=null) {
		if (array_key_exists($this->elementPrefix_, $this->message_)) {
			if ($name) {
				if (array_key_exists($name, $this->message_[$this->elementPrefix_])) {
					return true;
				}
			} else {
				return (count($this->message_[$this->elementPrefix_]) > 0);
			}
		}
		return false;
	}

	public function clearMessage() {
		$this->message_ = array();
	}

	public function isMessage($name=null) {
		if ($name) {
			if (array_key_exists($name, $this->message_)) {
				return true;
			}
			return false;
		};
		return (count($this->message_) > 0);
	}

	public function getMessage($name, $default=null) {
		if (array_key_exists($name, $this->message_)) {
			return $this->message_[$name];
		}
		return $default;
	}

	public function setMessage($name, $value) {
		$this->message_[$name] = $value;
	}

	public function getModulePath($module) {
		return $this->cloud->getModulePath($module);
	}

	public function getModulePathBase($module) {
		return $this->cloud->getModulePathBase($module);
	}

	public function getBasePathOf($file) {
		foreach ($this->modulePathBase_ as $path) {
			if (file_exists($path . $file)) {
				return $path;
			}
		}
		return null;
	}

	public function getBaseFile($file) {
		foreach ($this->modulePathBase_ as $path) {
			if (file_exists($path . $file)) {
				return $path . $file;
			}
		}
		return null;
	}

	public function getPathBase($module=null) {
		if($module) {
			if(array_key_exists($module,$this->modulePathBase_)) {
				return $this->modulePathBase_[$module];
			}
			return null;
		}
		return $this->modulePathBase_;
	}

	public function logMessage($type, $message_) {
		$this->cloud->logMessage($type, $message_,$this->name);
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
				$this->keepRequest_[$key] = $value;
			};
		};
	}

	public function unsetKeepRequestStack() {
		foreach($this->keepRequest_ as $key=>$value) {
			if(strncmp($key,"x_",2)==0) {
				unset($this->keepRequest_[$key]);
			};
		};
	}

	public function setRequestDirect($value) {
		$this->cloud->setRequestDirect($value);
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

	public function getElementValueStr($element, $default=null) {
		$retV=$this->getElementValue($element);
		if($retV) {
			return trim($retV);
		}
		return $default;
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
		return $default;
	}

	public function redirectComponent($name,$parameters=null) {
		$this->cloud->redirectComponent($name,$parameters);
	}

	public function processComponent($name,$parameters=null) {
		$this->cloud->processComponent($name,$parameters);
	}

	public function getStoragePath() {
		return $this->cloud->getStoragePath($this->name);
	}

	public function getStorageFilename($fileName) {
		return $this->cloud->getStorageFilename($this->name,$fileName);
	}

	public function getSetting($name,$default_=null){
		return $this->cloud->get($name,$default_);
	}

}

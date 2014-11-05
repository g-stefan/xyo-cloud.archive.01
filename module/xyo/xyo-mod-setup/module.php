<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$className = "xyo_mod_Setup";

class xyo_mod_Setup extends xyo_Module {

	protected $options_;
	protected $state_;

	function __construct(&$object, &$cloud) {
		parent::__construct($object, $cloud);
		if ($this->isBase("xyo_mod_Setup")) {
			require_once($this->path . "link.php");
			require_once($this->path . "link2.php");
			require_once($this->path . "version.php");
			require_once($this->path . "attributes.php");
		}
		$this->options_ = array();
	}

	function setModule($parent, $path, $module, $enabled, $parameters=null, $cmd=false, $registered=false, $override=false) {
		$this->cloud->setModule($parent, $path, $module, $enabled, $parameters, $cmd, $registered, $override);
	}

	function registerModule($parent, $path, $module, $enabled, $cmd=false, $component=false, $version=null, $description=null) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module;
				$dsModule->tryLoad();
				$dsModule->path = $path;
				$dsModule->enabled = $enabled;
				$dsModule->version = $version;
				$dsModule->parent = $parent;
				$dsModule->description = $description;
				$dsModule->cmd = $cmd;
				$dsModule->component = $component;
				$dsModule->parameter = 0;
				return $dsModule->save();
			}
		}
		return false;
	}

	function setModuleAsComponent($module, $component) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {
					$dsModule->component = $component;
					return $dsModule->save();
				}
			}
		}
		return false;
	}

	function setModuleVersion($module, $version) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {
					$dsModule->version = $version;
					return $dsModule->save();
				}
			}
		}
		return false;
	}

	function setModuleDescription($module, $description) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {
					$dsModule->description = $description;
					return $dsModule->save();
				}
			}
		}
		return false;
	}

	function registerModuleAcl($module, $moduleGroup, $core, $userGroup, $order, $enabled) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			$dsModuleGroup = &$ds->getDataSource("db.table.xyo_module_group");
			$dsCore = &$ds->getDataSource("db.table.xyo_core");
			$dsUserGroup = &$ds->getDataSource("db.table.xyo_user_group");
			$dsAclModule = &$ds->getDataSource("db.table.xyo_acl_module");
			if ($dsModule &&
			    $dsModuleGroup &&
			    $dsCore &&
			    $dsUserGroup &&
			    $dsAclModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {
					$dsAclModule->id_xyo_module = $dsModule->id;
					if ($moduleGroup) {
						$dsModuleGroup->name = $moduleGroup;
						if ($dsModuleGroup->load(0, 1)) {
							$dsAclModule->id_xyo_module_group = $dsModuleGroup->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_module_group = 0;
					}
					if ($core) {
						$dsCore->name = $core;
						if ($dsCore->load(0, 1)) {
							$dsAclModule->id_xyo_core = $dsCore->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_core = 0;
					}
					if ($userGroup) {
						$dsUserGroup->name = $userGroup;
						if ($dsUserGroup->load(0, 1)) {
							$dsAclModule->id_xyo_user_group = $dsUserGroup->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_user_group = 0;
					}
					$dsAclModule->tryLoad();
					$dsAclModule->module = $module;
					$dsAclModule->enabled = $enabled;
					$dsAclModule->order = $order;
					return $dsAclModule->save();
				}
			}
		}
		return false;
	}

	function removeModuleAcl($module, $moduleGroup, $core, $userGroup) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			$dsModuleGroup = &$ds->getDataSource("db.table.xyo_module_group");
			$dsCore = &$ds->getDataSource("db.table.xyo_core");
			$dsUserGroup = &$ds->getDataSource("db.table.xyo_user_group");
			$dsAclModule = &$ds->getDataSource("db.table.xyo_acl_module");
			if ($dsModule &&
			    $dsModuleGroup &&
			    $dsCore &&
			    $dsUserGroup &&
			    $dsAclModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {
					$dsAclModule->id_xyo_module = $dsModule->id;
					if ($moduleGroup) {
						$dsModuleGroup->name = $moduleGroup;
						if ($dsModuleGroup->load(0, 1)) {
							$dsAclModule->id_xyo_module_group = $dsModuleGroup->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_module_group = 0;
					}
					if ($core) {
						$dsCore->name = $core;
						if ($dsCore->load(0, 1)) {
							$dsAclModule->id_xyo_core = $dsCore->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_core = 0;
					}
					if ($userGroup) {
						$dsUserGroup->name = $userGroup;
						if ($dsUserGroup->load(0, 1)) {
							$dsAclModule->id_xyo_user_group = $dsUserGroup->id;
						} else {
							return false;
						}
					} else {
						$dsAclModule->id_xyo_user_group = 0;
					}
					return $dsAclModule->delete();
				}
			}
		}
		return false;
	}

	function &getDataSource($name) {
		$retV = null;
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			return $ds->getDataSource($name);
		}
		return $retV;
	}

	function setDataSource($module_, $name_) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			if($module_){
				$ds->setDataSourceDescriptor($name_, $this->getModulePath($module_) . "datasource/" . $name_ . ".php");
			}else{
				$ds->setDataSourceDescriptor($name_, "datasource/" . $name_ . ".php");
			};
			$ds_ = &$ds->getDataSource($name_);
			if ($ds_) {
				if ($ds_->getType() == "table") {
					// has effect only once on succesive call
					$ds_->createStorage();
				}
				return true;
			};
		}
		return false;
	}

	function installDataSource($module_, $name_, $description_=null) {

		$file_ = $this->getModulePath($module_) . "datasource/" . $name_ . ".php";
		if (file_exists($file_)) {
			if (copy($file_, $this->cloud->get("path_base") . "datasource/" . $name_ . ".php")) {

				$ds = &$this->cloud->getModule("xyo-mod-datasource");
				if ($ds) {
					$dsDataSource = &$ds->getDataSource("db.table.xyo_datasource");
					if ($dsDataSource) {
						$dsDataSource->name = $name_;
						$dsDataSource->tryLoad();
						$dsDataSource->enabled = 1;
						$dsDataSource->description = $description_;
						$dsDataSource->descriptor = $this->getPathRelativeToBase($this->cloud->get("path_base")) . "datasource/" . $name_ . ".php";
						if ($dsDataSource->save()) {
							$ds = &$ds->getDataSource($name_);
							if ($ds) {

								if ($ds->getType() == "table") {

									// has effect only once on succesive call
									$ds->createStorage();
								}
								return true;
							}
						}
					}
				}
			};
		};
		return false;
	}

	function registerDataSource($module_, $name_, $description_=null) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsDataSource = &$ds->getDataSource("db.table.xyo_datasource");
			if ($dsDataSource) {
				$dsDataSource->name = $name_;
				$dsDataSource->tryLoad();
				$dsDataSource->enabled = 1;
				$dsDataSource->description = $description_;
				if($module_){
					$dsDataSource->descriptor = $this->getPathRelativeToBase($this->getModulePath($module_)) . "datasource/" . $name_ . ".php";
				}else{
					$dsDataSource->descriptor = "datasource/" . $name_ . ".php";
				};
				if ($dsDataSource->save()) {
					$ds = &$ds->getDataSource($name_);
					if ($ds) {

						if ($ds->getType() == "table") {

							// has effect only once on succesive call
							$ds->createStorage();
						}
						return true;
					}
				}
			}
		}
		return false;
	}

	function registerModuleGroup($name) {
		$dsModuleGroup = &$this->getDataSource("db.table.xyo_module_group");
		$dsModuleGroup->clear();
		$dsModuleGroup->name = $name;
		$dsModuleGroup->tryLoad();
		$dsModuleGroup->enabled = 1;
		$dsModuleGroup->save();
	}

	function registerCore($name, $main) {
		$dsCore = &$this->getDataSource("db.table.xyo_core");
		$dsCore->clear();
		$dsCore->name = $name;
		$dsCore->tryLoad();
		$dsCore->main = $main;
		$dsCore->enabled = 1;
		$dsCore->save();
	}

	function unregisterModule($module_) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module_;
				if ($dsModule->load(0, 1)) {
					$dsX = &$ds->getDataSource("db.table.xyo_form_element");
					if ($dsX) {
						$dsX->id_xyo_module = $dsModule->id;
						$dsX->delete();
					};
					$dsX = &$ds->getDataSource("db.table.xyo_acl_module");
					if ($dsX) {
						$dsX->id_xyo_module = $dsModule->id;
						$dsX->delete();
					};
					$dsModule->delete();
					return true;
				};
			};
		};
		return false;
	}

	function uninstallModule($module_) {
		if ($this->execModuleUninstall($module_)) {
			$modPath_ = $this->getModulePath($module_);
			$this->unregisterModule($module_);
			if (!is_null($modPath_)) {
				$this->removeDirectoryRecursive($modPath_);
				$this->removeDirectoryRecursive($this->cloud->getStoragePath($module_));
			};
			return true;
		};
		return false;
	}

	function enableModule($module_, $enable_) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module_;
				if ($dsModule->load(0, 1)) {
					$dsModule->enabled = $enable_;
					if ($dsModule->save()) {
						return true;
					};
				};
			};
		};
		return false;
	}

	function createModulePackage($moduleName) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $moduleName;
				if ($dsModule->load(0, 1)) {
					if ($dsModule->cmd) {
						return array("module" => $moduleName, "file" => null);
					}
					$version_ = new xyo_mod_setup_Version($this);
					$version = $version_->getModuleVersion($moduleName);
					if (strlen($version)) {
						$version = "-" . $version;
					} else {
						$version = "";
					}
					$modulePath = $this->getModulePath($moduleName);
					$moduleContent = $this->getFileList($modulePath);
					$moduleFile = $this->cloud->get("path_base");

					if (count($moduleContent)) {
						$packageFile = $this->cloud->get("path_base") . "package/" . $moduleName . $version . ".tar.gz";
						$archive = new pear__archive_tar($packageFile, "gz");
						if ($archive->createModify($moduleContent, $moduleName, $modulePath)) {
							$archive->_pear__archive_tar();
							return array("module" => $moduleName, "file" => $moduleName . $version . ".tar.gz");
						}
					}
				}
			}
		}
		return array("module" => $moduleName, "file" => null);
	}

	function getModulePath($module) {
		$path_ = $this->cloud->getModulePath($module);
		if ($path_) {
			return $path_;
		};
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModule = &$ds->getDataSource("db.table.xyo_module");
			if ($dsModule) {
				$dsModule->name = $module;
				if ($dsModule->load(0, 1)) {

					$pathModule = null;
					if (strlen($dsModule->parent) > 0) {
						if (strlen($dsModule->path) > 0) {
							$pathModule = $this->getModulePath($dsModule->parent) . $dsModule->path . "/";
						} else {
							$pathModule = $this->getModulePath($dsModule->parent) . $module . "/";
						}
					} else if (strlen($dsModule->path) > 0) {
						$pathModule = $this->get("path_base") . "module/" . $dsModule->path . "/";
					} else {
						$pathModule = $this->get("path_base") . "module/" . $module . "/";
					}
					return $pathModule;
				};
			};
		};
		return null;
	}

	function getModuleReferenceLink($moduleName) {
		$link = new xyo_mod_setup_Link($this);
		$link->loadModuleLink($moduleName);
		return $link->getLink();
	}

	function createModulePackageWithLink($name) {
		$retV = array();
		$v = $this->getModuleReferenceLink($name);
		if (count($v)) {
			foreach ($v as $value_) {
				$retv[] = $this->createModulePackage($value_["module"]);
			}
		}
		return $retV;
	}

	function getFileList($path) {
		$this_ = array();
		if (!$dh = @opendir($path)
		   ) {
			return $this_;
		};
		while (false !== ($obj = readdir($dh))) {
			if ($obj == '.' || $obj == '..'
			   ) {
				continue;
			}
			if (is_dir($path . $obj)) {
				$v = $this->getFileList($path . $obj . "/");
				if (count($v)) {
					$this_ = array_merge($this_, $v);
				} else {
					array_push($this_, $path . $obj);
				}
			} else {
				array_push($this_, $path . $obj);
			};
		};
		closedir($dh);
		return $this_;
	}

	function getFileList2($path) {
		$this_ = array();
		if (!$dh = @opendir($path)
		   ) {
			return $this_;
		}
		while (false !== ($obj = readdir($dh))) {
			if ($obj == '.' || $obj == '..'
			   ) {
				continue;
			}
			array_push($this_, $path . $obj);
		}
		closedir($dh);
		return $this_;
	}

	function getDirList2($path) {
		$this_ = array();
		if (!$dh = opendir($path)
		   ) {
			return $this_;
		}
		while (false !== ($obj = readdir($dh))) {
			if ($obj == '.' || $obj == '..'
			   ) {
				continue;
			}
			if (is_dir($path . $obj)) {
				array_push($this_, $path . $obj);
			};
		}
		closedir($dh);
		return $this_;
	}

	function getPackageList2($path_) {
		$list2_ = array();
		$list_ = $this->getFileList2($path_);
		foreach ($list_ as $value_) {
			$x = str_replace($path_, "", $value_);
			$lastdot = strrpos($x, '.');
			if (!($lastdot === FALSE)) {
				$ext = substr($x, $lastdot + 1);
				if ($ext === "zip") {
					$list2_[$x] = $x;
				};
				if ($ext === "gz") {
					$x2 = substr($x, 0, -3);
					$lastdot = strrpos($x2, '.');
					if (!($lastdot === FALSE)) {
						$ext = substr($x2, $lastdot + 1);
						if ($ext == "tar") {
							$list2_[$x] = $x;
						};
					};
				};
			};
		};
		$list_ = $this->getDirList2($path_);
		foreach ($list_ as $value_) {
			$x = str_replace($path_, "", $value_);
			$list2_[$x] = $x;
		};

		return $list2_;
	}

	function getModuleNameFromVer($name_) {
		$x = explode("-", $name_);
		if (is_array($x)) {
			$m = array();
			foreach ($x as $v) {
				if (is_numeric(substr($v, 0, 1))) {
					break;
				};
				$m[] = $v;
			}
			return implode("-", $m);
		};
		return $name_;
	}

	function installModulePackageZip($packageName) {
		$packageFile = $this->cloud->get("path_base") . "package/" . $packageName;
		$archive = new ZipArchive();
		if ($archive->open($packageFile) === TRUE) {

		} else {
			return false;
		};
		$content = array();
		for ($k = 0; $k < $archive->numFiles; ++$k) {
			$x = $archive->statIndex($k);
			$content[] = array("filename" => $x["name"]);
		}

		if (count($content)) {
			$moduleName_ = explode('/', $content[0]["filename"]);
			if (count($moduleName_)) {
				$moduleName = $moduleName_[0];

				$modulePath2 = $this->cloud->get("path_base") . "module/" . $this->getModuleNameFromVer($moduleName);
				$modulePath = $modulePath2 . "-";

				$parent_ = null;
				$opt_ = $this->getPackageOption($packageName);
				if ($opt_) {
					$parent_ = $opt_->get("try_install_within_parent");
					if ($parent_) {
						$parentPath_ = $this->getModulePath($parent_);
						if ($parentPath_) {
							$modulePath2 = $parentPath_ . $this->getModuleNameFromVer($moduleName);
							$modulePath = $modulePath2 . "-";
						}
					}
				}

				$this->removeDirectoryRecursive($modulePath2);
				$this->removeDirectoryRecursive($modulePath);
				$archive->extractTo($modulePath);
				$archive->close();
				rename($modulePath . "/" . $moduleName, $modulePath2);
				$this->removeDirectoryRecursive($modulePath);

				$this->removeDirectoryRecursive($this->cloud->getStoragePath($this->getModuleNameFromVer($moduleName)));
				@mkdir($this->cloud->getStoragePath($this->getModuleNameFromVer($moduleName)),0777,true);
				@copy($this->path."index.html",$this->cloud->getStorageFilename($this->getModuleNameFromVer($moduleName),"index.html"));

				return array("path" => $modulePath2, "module" => $this->getModuleNameFromVer($moduleName), "parent" => $parent_);
			}
		}
		$archive->close();
		return array();
	}

	function installModulePackageTarGz($packageName) {
		$packageFile = $this->cloud->get("path_base") . "package/" . $packageName;
		$archive = new pear__archive_tar($packageFile, "gz");
		$content = $archive->listContent();
		if (count($content)) {
			$moduleName_ = explode('/', $content[0]["filename"]);
			if (count($moduleName_)) {
				$moduleName = $moduleName_[0];

				$modulePath = $this->cloud->get("path_base") . "module/" . $this->getModuleNameFromVer($moduleName);

				$parent_ = null;
				$opt_ = $this->getPackageOption($packageName);
				if ($opt_) {
					$parent_ = $opt_->get("try_install_within_parent");
					if ($parent_) {
						$parentPath_ = $this->getModulePath($parent_);
						if ($parentPath_) {

							$modulePath = $parentPath_ . $this->getModuleNameFromVer($moduleName);
						}
					}
				}

				$this->removeDirectoryRecursive($modulePath);
				$archive->extractModify($modulePath, $moduleName);
				$archive->_pear__archive_tar();

				$this->removeDirectoryRecursive($this->cloud->getStoragePath($this->getModuleNameFromVer($moduleName)));
				@mkdir($this->cloud->getStoragePath($this->getModuleNameFromVer($moduleName)),0777,true);
				@copy($this->path."index.html",$this->cloud->getStorageFilename($this->getModuleNameFromVer($moduleName),"index.html"));


				return array("path" => $modulePath, "module" => $moduleName, "parent" => $parent_);
			}
		}
		$archive->_pear__archive_tar();
		return array();
	}

	function getFileFromPackageZip($packageName, $file_) {
		$packageFile = $this->cloud->get("path_base") . "package/" . $packageName;
		$archive = new ZipArchive();
		if ($archive->open($packageFile) === TRUE) {

		} else {
			return false;
		};

		$content = array();
		for ($k = 0; $k < $archive->numFiles; ++$k) {
			$x = $archive->statIndex($k);
			$content[] = array("filename" => $x["name"]);
		}

		if (count($content)) {
			$moduleName_ = explode('/', $content[0]["filename"]);
			if (count($moduleName_)) {
				$moduleName = $moduleName_[0];
				$cloud_ = null;
				foreach ($content as $value_) {
					if ($value_["filename"] === $moduleName . "/" . $file_) {
						$cloud_ = $value_["filename"];
						break;
					}
				}
				if ($cloud_) {
					$cloudContent = "";
					$fp = $archive->getStream($cloud_);
					if ($fp) {
						while (!feof($fp)) {
							$cloudContent.=fread($fp, 1024);
						}
					};
					return array("module" => $moduleName, "content" => $cloudContent);
				}
			}
		}
		$archive->close();
		return array();
	}

	function getFileFromPackageTarGz($packageName, $file_) {
		$packageFile = $this->cloud->get("path_base") . "package/" . $packageName;
		$archive = new pear__archive_tar($packageFile, "gz");
		$content = $archive->listContent();
		if (count($content)) {
			$moduleName_ = explode('/', $content[0]["filename"]);
			if (count($moduleName_)) {
				$moduleName = $moduleName_[0];
				$cloud_ = null;
				foreach ($content as $value_) {
					if ($value_["filename"] === $moduleName . "/" . $file_) {
						$cloud_ = $value_["filename"];
						break;
					}
				}
				if ($cloud_) {
					$cloudContent = $archive->extractInString($cloud_);
					if ($cloudContent) {
						return array("module" => $moduleName, "content" => $cloudContent);
					}
				}
			}
		}
		$archive->_pear__archive_tar();
		return array();
	}

	function isPackageDir($packageName) {
		$packageDir = $this->cloud->get("path_base") . "package/" . $packageName;
		return is_dir($packageDir);
	}

	function getFileFromPackage($packageName, $file_) {
		$packageDir = $this->cloud->get("path_base") . "package/" . $packageName;
		if (is_dir($packageDir)) {

			$packageFile = $this->cloud->get("path_base") . "package/" . $packageName . "/" . $file_;
			$content = @file_get_contents($packageFile);
			if ($content === FALSE) {

			} else {
				return array("module" => $packageName, "content" => $content);
			};
		} else {

			$lastdot = strrpos($packageName, '.');
			if (!($lastdot === FALSE)) {
				$ext = substr($packageName, $lastdot + 1);
				if ($ext === "zip") {
					return $this->getFileFromPackageZip($packageName, $file_);
				};
				if ($ext === "gz") {
					$x2 = substr($packageName, 0, -3);
					$lastdot = strrpos($x2, '.');
					if (!($lastdot === FALSE)) {
						$ext = substr($x2, $lastdot + 1);
						if ($ext == "tar") {
							return $this->getFileFromPackageTarGz($packageName, $file_);
						};
					};
				};
			};
		};
		return array();
	}

	function execPackageLicence($packageName) {
		$v = $this->getFileFromPackage($packageName, "setup/license.txt");
		if (count($v)) {
			echo htmlentities($v["content"]);
		}
	}

	function installModulePackage($packageName) {
		$packageDir = $this->cloud->get("path_base") . "package/" . $packageName;
		if (is_dir($packageDir)) {


			$modulePath2 = $this->cloud->get("path_base") . "module/" . $this->getModuleNameFromVer($packageName);

			$parent_ = null;
			$opt_ = $this->getPackageOption($packageName);
			if ($opt_) {
				$parent_ = $opt_->get("try_install_within_parent");
				if ($parent_) {
					$parentPath_ = $this->getModulePath($parent_);
					if ($parentPath_) {
						$modulePath2 = $parentPath_ . $this->getModuleNameFromVer($packageName);
					}
				}
			}

			$this->removeDirectoryRecursive($modulePath2);

			$this->recursiveCopyDirectory($packageDir, $modulePath2);

			$this->removeDirectoryRecursive($this->cloud->getStoragePath($this->getModuleNameFromVer($packageName)));
			@mkdir($this->cloud->getStoragePath($this->getModuleNameFromVer($packageName)),0777,true);
			@copy($this->path."index.html",$this->cloud->getStorageFilename($this->getModuleNameFromVer($packageName),"index.html"));

			return array("path" => $modulePath2, "module" => $this->getModuleNameFromVer($packageName), "parent" => $parent_);
		} else {

			$lastdot = strrpos($packageName, '.');
			if (!($lastdot === FALSE)) {
				$ext = substr($packageName, $lastdot + 1);
				if ($ext === "zip") {
					return $this->installModulePackageZip($packageName);
				};
				if ($ext === "gz") {
					$x2 = substr($packageName, 0, -3);
					$lastdot = strrpos($x2, '.');
					if (!($lastdot === FALSE)) {
						$ext = substr($x2, $lastdot + 1);
						if ($ext == "tar") {
							return $this->installModulePackageTarGz($packageName);
						};
					};
				};
			};
		};
		return array();
	}

	function getPackageLink($packageName) {
		$this->state_ = array();
		$this->processLink($packageName, "", null);
		return $this->state_;
	}

	function processLink($package, $path_, $module_) {
		$path = $path_;
		if ($module_) {
			$path.=$module_ . "/";
			$this->state_[$module_] = true;
		} else {
			$module_ = $package;
		}

		$link_ = new xyo_mod_setup_Link2($this);
		$v = $this->getFileFromPackage($package, $path . "cloud.php");
		if (count($v)) {
			$x = $link_->getModuleLinkFromString($this->getModuleNameFromVer($module_), $v["content"]);
			foreach ($x as $key => $value) {
				if (array_key_exists($key, $this->state_)) {

				} else {
					$this->state_[$key] = false;
				};
			}
		}
		$v = $this->getFileFromPackage($package, $path . "setup/link.php");
		if (count($v)) {
			$path = "";
			eval("?>" . $v["content"]);
		}
	}

	function getPackageOption($packageName) {
		$v = $this->getFileFromPackage($packageName, "setup/option.php");
		if (count($v)) {
			$x = new xyo_mod_setup_Attributes();
			$x->evalString($v["content"]);
			return $x;
		}
		return null;
	}

	function execModuleInstall($module) {
		$modPath_ = $this->getModulePath($module);
		if (!is_null($modPath_)) {
			$config_ = $modPath_ . "setup/install.php";
			if (file_exists($config_)) {
				$allOk = true;
				$pathSetup = $modPath_ . "setup/";
				include($config_);
				return $allOk;
			}
			return true;
		}
		return false;
	}

	function execModuleUpdate($module) {
		$modPath_ = $this->getModulePath($module);
		if (!is_null($modPath_)) {
			$config_ = $modPath_ . "setup/update.php";
			if (file_exists($config_)) {
				$allOk = true;
				$pathSetup = $modPath_ . "setup/";
				include($config_);
				return $allOk;
			}
			return true;
		}
		return false;
	}

	function execModuleUninstall($module) {
		$modPath_ = $this->getModulePath($module);
		if (!is_null($modPath_)) {
			$config_ = $modPath_ . "setup/uninstall.php";
			if (file_exists($config_)) {
				$allOk = true;
				$pathSetup = $modPath_ . "setup/";
				include($config_);
				return $allOk;
			};
			return true;
		}
		return false;
	}

	function getPathRelativeToBase($path_) {
		$path2_ = $this->cloud->get("path_base");

		$path_separator = "/";
		$cloud_path = explode($path_separator, $path_);
		if (count($cloud_path) == 1) {
			if ($cloud_path[0] === $path_) {
				$path_separator = "\\";
				$cloud_path = explode($path_separator, $path_);
			};
		};
		if (count($cloud_path) > 1) {
			$cloud_path = array_chunk($cloud_path, count($cloud_path) - 1);
			$cloud_path = $cloud_path[0];
		} else {
			$cloud_path__xyo = null;
			$cloud_path = null;
		};

		$exec_path = explode($path_separator, $path2_);
		if (count($exec_path) > 1) {
			$exec_path = array_chunk($exec_path, count($exec_path) - 1);
			$exec_path = $exec_path[0];
		} else {
			$exec_path = null;
		};

		$path = array();
		$a = count($exec_path);
		$b = count($cloud_path);

		for ($k = 0; ($k < $a) && ($k < $b); ++$k) {
			if ($exec_path[$k] === $cloud_path[$k]) {

			} else {
				break;
			};
		};

		$m = $k;

		for ($k = $m; $k < $a; ++$k) {
			$path[] = "..";
		};

		for ($k = $m; $k < $b; ++$k) {
			$path[] = $cloud_path[$k];
		};

		$r = implode("/", $path) . "/";
		if ($r === "/"
		   ) {
			$r = "";
		}
		return $r;
	}

	function removeDirectoryRecursive($dir, $DeleteMe=true) {
		if (!is_dir($dir)) {
			return false;
		}
		if (!$dh = opendir($dir)
		   ) {
			return false;
		}
		while (false !== ($obj = readdir($dh))) {
			if ($obj == '.' || $obj == '..') {
				continue;
			}
			if (is_dir($dir . '/' . $obj)) {
				if (!$this->removeDirectoryRecursive($dir . '/' . $obj, true)
				   ) {
					return false;
				}
			} else {
				if (!unlink($dir . '/' . $obj)
				   ) {
					return false;
				}
			};
		}
		closedir($dh);
		if ($DeleteMe) {
			if (!rmdir($dir)
			   ) {
				return false;
			}
		}
		return true;
	}

	function recursiveCopyDirectory($src, $dst) {
		$dir = opendir($src);
		@mkdir($dst);
		while (false !== ($file = readdir($dir))) {
			if (( $file != '.') && ($file != '..')) {
				if (is_dir($src . '/' . $file)) {
					$this->recursiveCopyDirectory($src . '/' . $file, $dst . '/' . $file);
				} else {
					copy($src . '/' . $file, $dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}

	function installBaseDirectory($source, $destination) {
		$this->recursiveCopyDirectory($source, $this->cloud->get("path_base") . $destination);
	}

	function registerUserGroup($name,$description,$enabled) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsUserGroup=&$ds->getDataSource("db.table.xyo_user_group");
			if($dsUserGroup) {
				$dsUserGroup->name=$name;
				$dsUserGroup->tryLoad();
				$dsUserGroup->description=$description;
				$dsUserGroup->enabled=$enabled;
				return $dsUserGroup->save();
			};

		}
		return false;
	}

	function registerUserGroupXUserGroup($nameSuper,$name,$enabled) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsUserGroupSuper=&$ds->getDataSource("db.table.xyo_user_group");
			if($dsUserGroupSuper) {
				$dsUserGroupSuper->name=$nameSuper;
				if($dsUserGroupSuper->load(0,1)) {
					$dsUserGroup=&$ds->getDataSource("db.table.xyo_user_group");
					if($dsUserGroup) {
						$dsUserGroup->name=$name;
						if($dsUserGroup->load(0,1)) {
							$dsUserGroupXUserGroup=&$ds->getDataSource("db.table.xyo_user_group_x_user_group");
							if($dsUserGroupXUserGroup) {
								$dsUserGroupXUserGroup->id_xyo_user_group_super=$dsUserGroupSuper->id;
								$dsUserGroupXUserGroup->id_xyo_user_group=$dsUserGroup->id;
								$dsUserGroupXUserGroup->tryLoad();
								$dsUserGroupXUserGroup->enabled=$enabled;
								return $dsUserGroupXUserGroup->save();
							}
						};
					};
				}
			};
		}
		return false;
	}

	function linkModuleVersion($module) {
		$link_=$this->getModuleReferenceLink($module);
		if(array_key_exists($module,$link_)) {
			$this->setModuleVersion($module,$link_[$module]["version"]);
		};
	}

	function installFormElement($module_, $name_) {

		$file_ = $this->getModulePath($module_) . "/view/form/" . $name_ . "-require.php";
		if (file_exists($file_)) {
			copy($file_, $this->cloud->get("path_base") . "form/" . $name_ . "-require.php");
		};

		$file_ = $this->getModulePath($module_) . "/view/form/" . $name_ . "-process.php";
		if (file_exists($file_)) {
			copy($file_, $this->cloud->get("path_base") . "form/" . $name_ . "-process.php");
		};

		$file_ = $this->getModulePath($module_) . "/view/form/" . $name_ . ".php";
		if (file_exists($file_)) {
			copy($file_, $this->cloud->get("path_base") . "form/" . $name_ . ".php");				
		};

		$path_="view/form/language/";
		$fileList_ = $this->getFileList($this->getModulePath($module_) . $path_);
		foreach($fileList_ as $k=>$v){
			$pos1=strrpos($v,$path_)+strlen($path_);
			$pos2=strrpos($v,"/".$name_ . ".php",$pos1);
			if($pos2){
				$lang_=substr($v,$pos1,$pos2-$pos1);
				@mkdir($this->cloud->get("path_base") . "form/language");
				@mkdir($this->cloud->get("path_base") . "form/language/" .$lang_);
				@copy($v,$this->cloud->get("path_base") . "form/language/" .$lang_."/". $name_ . ".php");
			};
		}; 		

		return true;
	}

	function uninstallFormElement($name_) {

		$file_ = $this->cloud->get("path_base") . "form/" . $name_ . "-require.php";
		if (file_exists($file_)) {
			unlink($file_);
		};

		$file_ = $this->cloud->get("path_base") . "form/" . $name_ . "-process.php";
		if (file_exists($file_)) {
			unlink($file_);
		};

		$file_ = $this->cloud->get("path_base") . "form/" . $name_ . ".php";
		if (file_exists($file_)) {
			unlink($file_);
		};

	}

	function selectMouleAclAsTemplate($module,$core,$userGroup) {
		$ds = &$this->cloud->getModule("xyo-mod-datasource");
		if ($ds) {
			$dsModuleGroup=&$ds->getDataSource("db.table.xyo_module_group");
			$dsUserGroup=&$ds->getDataSource("db.table.xyo_user_group");
			$dsCore=&$ds->getDataSource("db.table.xyo_core");
			$dsAclModule=&$ds->getDataSource("db.table.xyo_acl_module");
			$dsModule=&$ds->getDataSource("db.table.xyo_module");
			if($dsModuleGroup&&
			   $dsUserGroup&&
			   $dsCore&&
			   $dsAclModule&&
			   $dsModule) {
				$idUserGroup=0;
				if($userGroup) {
					$dsUserGroup->clear();
					$dsUserGroup->name=$userGroup;
					$dsUserGroup->enabled=1;
					if($dsUserGroup->load(0,1)) {
						$idUserGroup=$dsUserGroup->id;
					} else {
						return false;
					};
				};

				$idCore=0;
				if($core) {
					$dsCore->clear();
					$dsCore->name=$core;
					$dsCore->enabled=1;
					if($dsCore->load(0,1)) {
						$idCore=$dsCore->id;
					} else {
						return false;
					};
				};


				$idModuleGroupTemplate=0;
				$idModuleGroupLoad=0;
				$idModuleGroupExec=0;

				$dsModuleGroup->clear();
				$dsModuleGroup->name="xyo-template";
				$dsModuleGroup->enabled=1;
				if($dsModuleGroup->load(0,1)) {
					$idModuleGroupTemplate=$dsModuleGroup->id;
				}

				$dsModuleGroup->clear();
				$dsModuleGroup->name="xyo-system-load";
				$dsModuleGroup->enabled=1;
				if($dsModuleGroup->load(0,1)) {
					$idModuleGroupLoad=$dsModuleGroup->id;
				}

				$dsModuleGroup->clear();
				$dsModuleGroup->name="xyo-system-exec";
				$dsModuleGroup->enabled=1;
				if($dsModuleGroup->load(0,1)) {
					$idModuleGroupExec=$dsModuleGroup->id;
				}

				if($idModuleGroupTemplate&&
				   $idModuleGroupLoad&&
				   $idModuleGroupExec) {
					$dsModule->clear();
					$dsModule->name=$module;
					$dsModule->enabled=1;
					if($dsModule->load(0,1)) {
						$dsAclModule->clear();
						$dsAclModule->id_xyo_user_group=$idUserGroup;
						$dsAclModule->id_xyo_core=$idCore;
						$dsAclModule->id_xyo_module_group=$idModuleGroupTemplate;
						$moduleList=array();
						for($dsAclModule->load(); $dsAclModule->isValid(); $dsAclModule->loadNext()) {
							if($dsAclModule->id_xyo_module==$dsModule->id) {} else {
								$moduleList[]=$dsAclModule->id_xyo_module;
							};
						};

						if(count($moduleList)) {

							$dsAclModule->clear();
							$dsAclModule->id_xyo_module_group=array($idModuleGroupLoad,$idModuleGroupExec);
							$dsAclModule->id_xyo_user_group=$idUserGroup;
							$dsAclModule->id_xyo_core=$idCore;
							$dsAclModule->id_xyo_module=$moduleList;
							$dsAclModule->update(array("enabled"=>0));

						};

						$dsAclModule->clear();
						$dsAclModule->id_xyo_module_group=$idModuleGroupLoad;
						$dsAclModule->id_xyo_user_group=$idUserGroup;
						$dsAclModule->id_xyo_core=$idCore;
						$dsAclModule->id_xyo_module=$dsModule->id;
						$dsAclModule->tryLoad(0,1);
						$dsAclModule->module=$dsModule->name;
						$dsAclModule->enabled=1;
						$dsAclModule->save();

						$dsAclModule->clear();
						$dsAclModule->id_xyo_module_group=$idModuleGroupExec;
						$dsAclModule->id_xyo_user_group=$idUserGroup;
						$dsAclModule->id_xyo_core=$idCore;
						$dsAclModule->id_xyo_module=$dsModule->id;
						$dsAclModule->tryLoad(0,1);
						$dsAclModule->module=$dsModule->name;
						$dsAclModule->enabled=1;
						$dsAclModule->save();

						return true;
					}
				}
			}
		}
		return false;
	}
}


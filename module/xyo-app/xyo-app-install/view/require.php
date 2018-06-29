<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->generateComponent("xui.form-action-begin");

echo "<div class=\"xui_right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"default",
	"try"=>"default",
	"next"=>"primary"
)));
echo "</div>";
echo "<div class=\"xui-separator\"></div>";
echo "<br />";

                    $mode = $this->getRequest("mode");
                    $package = $this->getRequest("package");

                    $this->eFormRequest(array(
                        "back" => "package",
                        "this" => "require",
                        "next" => "license",
                        "mode" => $mode,
                        "package" => $package,
                    ));

                    $listModuleToCheck = array();
                    $listModuleToCheck2 = array();
                    $listModule = array();

                    $packagePath =  "package/";
                    $modSetup = &$this->cloud->getModule("xyo-mod-setup");
                    if ($modSetup) {
                        if ($mode === "all") {
                            $listModuleToCheck = $modSetup->getPackageList2($packagePath);
                        } else {
                            $listModuleToCheck = array($package => $package);
                        }

                        foreach ($listModuleToCheck as $key => $value) {                            
                            $key2 = $modSetup->getModuleNameFromVer($key);
                            $listModuleToCheck2[$key2] = $key;
                        }


                        foreach ($listModuleToCheck2 as $key => $value) {
                            $requireModule = $modSetup->getPackageLink($value);
                            foreach ($requireModule as $key2 => $value2) {
                                if (array_key_exists($key2, $listModuleToCheck2)) {
                                    $listModule[$key2] = true;
                                } else {
                                    $listModule[$key2] = $value2;
                                }
                            }
                        }

                        $dsModule = &$this->getDataSource("db.table.xyo_module");
                        if ($dsModule) {
                            foreach ($listModule as $key => $value) {
                                if ($value) {
                                    
                                } else {
                                    $dsModule->clear();
                                    $dsModule->name = $key;
                                    if ($dsModule->load()) {
                                        $listModule[$key] = true;
                                    } else {
                                        // system module ..
                                        $modObject = &$this->cloud->getModuleObject($key);
                                        if ($modObject) {
                                            $listModule[$key] = true;
                                        };
                                    }
                                }
                            }
                        }
                    }
	

		echo "<ul class=\"list-group\">";

                    $error = false;
                    foreach ($listModule as $key => $value) {
                        if ($value) {
				echo "<li class=\"list-group-item list-group-item-success\">";
	                            echo $key;
				echo "<span class=\"glyphicon glyphicon-ok pull-right\"></span>";
	                        echo "</li>";
				
                        } else {

				echo "<li class=\"list-group-item list-group-item-danger\">";
	                            echo $key;
				echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
	                        echo "</li>";

                            $error = true;
                        }
                    }

		echo "</ul>";

                    if ($error) {
                        $this->setError("module_not_found");
                        $this->generateView("msg-error");
                    } else {
                        $this->eFormRequest(array(
                            "check_require" => "ok",
                        ));
                    }

$this->generateComponent("xui.form-action-end");

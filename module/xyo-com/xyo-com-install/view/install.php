<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

<form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >
		    <div class="btn-group pull-right">
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled"/>
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled"/>
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		   </div>
<div class="clearfix"></div>
<br />

<?php

                    $mode = $this->getRequest("mode");
                    $package = $this->getRequest("package");

                    $listModuleToCheck = array();
                    $listModuleToCheck2 = array();
                    $orderModule = array();
                    $packagePath =  "package/";
                    $dsModule = &$this->getDataSource("db.table.xyo_module");
                    $modSetup = &$this->cloud->getModule("xyo-mod-setup");
                    if ($modSetup && $dsModule) {
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
                            $orderModule[$key] = 1;
                        }

                        foreach ($listModuleToCheck2 as $key => $value) {
                            $requireModule = $modSetup->getPackageLink($value);
                            foreach ($requireModule as $key2 => $value2) {
                                if (array_key_exists($key2, $orderModule)) {
                                    ++$orderModule[$key2];
                                } else {
                                    $orderModule[$key2] = 1;
                                }
                            }
                        }

                        $orderModule2 = array();
                        foreach ($listModuleToCheck2 as $key => $value) {
                            $orderModule2[$key] = $orderModule[$key];
                        }

                        arsort($orderModule2);

                        $error = false;

		echo "<ul class=\"list-group\">";

                        foreach ($orderModule2 as $key => $value) {
                            $ret = $modSetup->installModulePackage($listModuleToCheck2[$key]);
                            if (count($ret)) {
                                $doUpdate = false;
                                $dsModule->clear();
                                $dsModule->name = $ret["module"];
                                if ($dsModule->load()) {
                                    $doUpdate = true;
                                };

                                if ($modSetup->registerModule($ret["parent"], null, $ret["module"])) {
                                    $modSetup->setModule($ret["parent"], null, $ret["module"], true,null,false,true);

                                    if ($doUpdate) {
                                        if ($modSetup->execModuleUpdate($ret["module"])) {
						echo "<li class=\"list-group-item list-group-item-success\">";
	        		                echo $ret["module"];
						echo "<span class=\"glyphicon glyphicon-ok pull-right\"></span>";
			                        echo "</li>";

                                        } else {

						echo "<li class=\"list-group-item list-group-item-danger\">";
	        		                echo $$ret["module"];
						echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
	                		        echo "</li>";

                                            $error = true;
                                        }
                                    } else {
                                        if ($modSetup->execModuleInstall($ret["module"])) {
						echo "<li class=\"list-group-item list-group-item-success\">";
	        		                    echo $ret["module"];
						echo "<span class=\"glyphicon glyphicon-ok pull-right\"></span>";
			                        echo "</li>";
                                        } else {
						echo "<li class=\"list-group-item list-group-item-danger\">";
	        		                echo $$ret["module"];
						echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
	                		        echo "</li>";


                                            $error = true;
                                        }
                                    }
                                }
                            } else {

				echo "<li class=\"list-group-item list-group-item-danger\">";
       		                echo $$ret["module"];
				echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
               		        echo "</li>";

                                $error = true;
                            }
                        }

		echo "</ul>";


                        if ($error) {
                            $this->setError("error", "module_install_error");
                            $this->generateView("msg-error");
                        }
                    }
?>
    
</form>


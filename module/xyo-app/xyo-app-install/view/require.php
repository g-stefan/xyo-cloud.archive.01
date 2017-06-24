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
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" />
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		   </div>
<div class="clearfix"></div>
<br />

    <?php
                    $mode = $this->getRequest("mode");
                    $package = $this->getRequest("package");

                    $this->eFormRequest(array(
                        "back" => "package",
                        "this" => "require",
                        "next" => "licence",
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
        ?>    
</form>


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
                        "back" => "require",
                        "this" => "license",
                        "next" => "install",
                        "mode" => $mode,
                        "package" => $package,
                        "check_require" => "ok"
                    ));

 ?>

                    
        
<?php

                    $listModuleToCheck = array();
                    $listModule = array();
                    $packagePath = $path = "package/";
                    $modSetup = &$this->cloud->getModule("xyo-mod-setup");
                    if ($modSetup) {
                        if ($mode === "all") {
                            $listModuleToCheck = $modSetup->getPackageList2($packagePath);
                        } else {
                            $listModuleToCheck = array($package => $package);
                        };

                        foreach ($listModuleToCheck as $key => $value) {
				echo "<div class=\"panel panel-default\">";
					echo "<div class=\"panel-heading\">";
						echo "<h3 class=\"panel-title\">";
							echo $this->getFromLanguage("label_license")." ".$key;
						echo "</h3>";
					echo "</div>";
					echo "<div class=\"panel-body\">";
		                            $modSetup->execPackageLicense($key);						
					echo "</div>";
				echo "</div>";
                        };

                    };

    
$this->generateComponent("xui.form-action-end");

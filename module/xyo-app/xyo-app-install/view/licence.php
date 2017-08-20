<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->generateComponent("xui.form-action-begin");
?>

		 <div class="xui-form-button-group xui--right">
                    	<input type="submit" class="xui-form-button xui-form-button--default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>"></input>
		</div>
		<div class="xui-separator"></div>

<br />


<?php

                    $mode = $this->getRequest("mode");
                    $package = $this->getRequest("package");

                    $this->eFormRequest(array(
                        "back" => "require",
                        "this" => "licence",
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
							echo $this->getFromLanguage("label_licence")." ".$key;
						echo "</h3>";
					echo "</div>";
					echo "<div class=\"panel-body\">";
		                            $modSetup->execPackageLicence($key);						
					echo "</div>";
				echo "</div>";
                        };

                    };

    
$this->generateComponent("xui.form-action-end");

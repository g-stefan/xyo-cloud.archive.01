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

                    <?php $this->eLanguage("title_package"); ?>
			<br />
			<br />

    <?php
                    $this->eFormRequest(array(
                        "back" => "welcome",
                        "this" => "package",
                        "next" => "require",
                        "select" => "package"
                    ));


                    $mode = $this->getRequest("mode", "single");
                    $modeList = array(
                        "single" => $this->getFromLanguage("mode_single"),
                        "all" => $this->getFromLanguage("mode_all"),
                    );
    ?>
                    
                        <label class="xui-form-label" for="mode"><?php $this->eLanguage("label_mode"); ?></label><br/>
                        <select class="xui-form-select" name="mode" onChange="this.form.submit();">
            <?php
                    foreach ($modeList as $key => $value) {
                        $selected = "";
                        if ($key === $mode) {
                            $selected = "selected=\"selected\" ";
                        }
                        echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";
                    }
            ?>
                </select>
                <br />

        <?php
                    if ($mode === "single") {
        ?>
                        <label class="xui-form-label" for="package"><?php $this->eLanguage("label_package"); ?></label><br/>
                        <select name="package" class="xui-form-select">
            <?php
                        $this->processModel("select-packages");
                        $packagesList = $this->getParameter("select_packages", array("*" => $this->getFromLanguage("package_none")));

                        foreach ($packagesList as $key => $value) {
                            $selected = "";
                            if ($key === $mode) {
                                $selected = "selected=\"selected\" ";
                            }
                            echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";
                        }
            ?>
                    </select>
        <?php
                    } else {
                        echo "<br />";
                        $this->processModel("select-packages");
                        $packagesList = $this->getParameter("select_packages", array("*" => $this->getFromLanguage("package_none")));
                        if (array_key_exists("*", $packagesList)) {
                            $this->eLanguage("no_package_found");
                        } else {
                            echo "<span>";
                            $this->eLanguage("label_package");
                            echo "</span><br /><br />";
                            foreach ($packagesList as $key => $value) {
                                echo $key . "<br />";
                            }
                        }
                    }

$this->generateComponent("xui.form-action-end");


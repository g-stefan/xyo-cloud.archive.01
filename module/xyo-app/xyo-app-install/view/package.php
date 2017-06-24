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
                    
                        <label for="mode"><?php $this->eLanguage("label_mode"); ?></label><br/>
                        <select class="selectpicker" data-width="auto" name="mode" onChange="this.form.submit();">
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
                        <label for="package"><?php $this->eLanguage("label_package"); ?></label><br/>
                        <select name="package" class="selectpicker" data-width="auto">
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
        ?>
</form>


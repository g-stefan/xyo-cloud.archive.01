<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$layer = $this->getElementValue("layer", "xyo");
$layerList = array(
	"xyo",
	"csv",
	"sqlite",
	"mysqli",
	"mysql",
	"postgresql"
);

$this->generateComponent("xui.form-action-begin");

?>

		 <div class="xui-form-button-group xui--right">
                    	<input type="submit" class="xui-form-button xui-form-button--default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" ></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" ></input>
		</div>
		<div class="xui-separator"></div>

<br />

<?php
                    if ($this->isError()) {
                        $this->generateView("msg-error");
                    }
?>

	<select class="xui-form-select" name="<?php $this->eElementName("layer"); ?>" onChange="this.form.submit();">
<?php
                    foreach ($layerList as $value) {
                        $selected = "";
                        if ($value === $layer) {
                            $selected = "selected=\"selected\" ";
                        }
                        echo "<option value=\"" . $value . "\" " . $selected . ">" . $value . "</option>";
                    }

?>
	</select>
	<br/>
                
        <?php $this->generateViewLanguage("form-datasource-" . $layer); ?>
                    
<?php

                    $this->eFormRequest(array(
                        "back" => "check",
                        "this" => "datasource",
                        "next" => "datasource-check",
                        "website_language" => $this->getSystemLanguage(),
                        "select" => "datasource"
                    ));

$this->generateComponent("xui.form-action-end");

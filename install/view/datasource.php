<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
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

?>
<form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >
		<div class="btn-group pull-right">
			<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		</div>
<div class="clearfix"></div>
<br />

<?php
                    if ($this->isError("error")) {
                        $this->generateView("msg-error");
                    }
?>

	<select class="selectpicker" data-width="auto" name="<?php $this->eElementName("layer"); ?>" onChange="this.form.submit();">
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

?>
</form>

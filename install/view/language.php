<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$language = $this->getSystemLanguage();
$languageList = array(
	"en-GB" => $this->getFromLanguage("language_en_gb"),
        "ro-RO" => $this->getFromLanguage("language_ro_ro"),
);

$this->generateComponent("xui.form-action-begin");

?>

		 <div class="xui-form-button-group xui--right">
                    	<input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>"></input>
		</div>
		<div class="xui-separator"></div>

<br />
			<label for="website_language">
			<?php $this->generateViewLanguage("msg-language"); ?>
			</label>
			<br />
                    <select class="selectpicker" data-width="auto" name="website_language" onChange="this.form.submit();">
<?php
                    foreach ($languageList as $key => $value) {
                        $selected = "";
                        if ($key === $language) {
                            $selected = "selected=\"selected\" ";
                        }
                        echo "<option value=\"" . $key . "\" " . $selected . ">" . $value . "</option>";
                    }

?>
		    </select> 

<?php
                    $this->eFormRequest(array(
                        "back" => "language",
                        "this" => "language",
                        "next" => "licence"
                    ));

$this->generateComponent("xui.form-action-end");

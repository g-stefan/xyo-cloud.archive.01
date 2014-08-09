<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
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

?>
<form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >
		    <div class="btn-group pull-right">
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		   </div>
<div class="clearfix"></div>
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

?>
</form>

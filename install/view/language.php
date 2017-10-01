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

echo "<div class=\"xui_right\">";
$this->generateComponent("xui.form-submit-button-group",array("group"=>array(
	"back"=>"disabled",
	"try"=>"disabled",
	"next"=>"primary"
)));
echo "</div>";
echo "<div class=\"xui-separator\"></div>";
echo "<br />";

?>
			<label for="website_language" class="xui-form-label">
			<?php $this->generateViewLanguage("msg-language"); ?>
			</label>
			<br />
                    <select class="xui-form-select" name="website_language" onChange="this.form.submit();">
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

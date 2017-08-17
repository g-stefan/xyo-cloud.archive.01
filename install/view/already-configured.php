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
                    	<input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" disabled="disabled"></input>
		</div>
		<div class="xui-separator"></div>
		
<br />

<?php $this->generateViewLanguage("msg-already-configured"); ?>

<?php

    $this->eFormRequest(array(
        "back" => "already-configured",
        "this" => "already-configured",
        "next" => "already-configured",
        "website_language" => $this->getSystemLanguage()
    ));

$this->generateComponent("xui.form-action-end");
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
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		   </div>
<div class="clearfix"></div>
<br />

<?php

                    if ($this->isError()) {
                        $this->generateView("msg-error");
                    }

?>
        <?php $this->generateViewLanguage("form-settings"); ?>

<?php
                    $this->eFormRequest(array(
                        "back" => "install",
                        "this" => "settings",
                        "next" => "settings-step",
                        "website_language" => $this->getSystemLanguage(),
                        "select" => "settings"
                    ));

?>
</form>

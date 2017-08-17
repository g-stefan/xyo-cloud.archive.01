<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');


$this->generateComponent("xui.form-action-begin",array("action"=>$this->getFormActionRouteModule("administrator.php","xyo-app-dashboard")));

?>

		<div class="xui-form-button-group xui--right">
                    	<input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--disabled" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled"></input><!--
                    	--><input type="submit" class="xui-form-button xui-form-button--success" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" ></input>
		</div>
		<div class="xui-separator"></div>

<br />

<?php $this->generateViewLanguage("msg-done"); ?>

<?php

        if ($this->isError()) {
            $this->generateView("msg-error");
        };

?>
    
<?php

    // set datasource loader
    $this->cloud->set("datasource_loader", "xyo-mod-ds-loader-ds");

    $administrator = $this->getRequest("administrator_username");
    if ($administrator) {
        $this->accessControlList->reloadDataSource();
        $this->user->reloadDataSource();
        $authorization = $this->user->getAuthorizationRequestDirect($administrator);
        if ($authorization) {
            $this->eFormBuildRequest($authorization);
        };
    };

$this->generateComponent("xui.form-action-end");


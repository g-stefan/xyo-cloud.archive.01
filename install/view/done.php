<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>
<form name="<?php $this->eFormName(); ?>" method="POST" action="administrator.php?run=xyo-com-install" >
		<div class="btn-group pull-right">
			<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" disabled="disabled" />
                    	<input type="submit" class="btn btn-success" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" />
		</div>
<div class="clearfix"></div>
<br />

<?php $this->generateViewLanguage("msg-done"); ?>

<?php

        if ($this->isError("error")) {
            $this->generateView("msg-error");
        };

?>
    
<?php

    // set datasource loader
    $this->cloud->set("system_datasource_loader", "xyo-mod-ds-loader-ds");

    $administrator = $this->getRequest("administrator_username");
    if ($administrator) {
        $this->accessControlList->reloadDataSource();
        $this->user->reloadDataSource();
        $authorization = $this->user->getAuthorizationRequestDirect($administrator);
        if ($authorization) {
            $this->eFormBuildRequest($authorization);
        };
    };

?>
</form>

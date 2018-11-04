<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>
<div class="xui application">
	<div class="xui app-toolbar" id="xui-app-toolbar">
		<div class="xui app-toolbar_content" id="xui-app-toolbar_content">
<?php
           $this->runModule("xyo-mod-toolbar", array_merge(array(
                        "module" => $this->name,
                        "config" => $this->getParameter("toolbar", "toolbar/default")
                            ), $this->toolbarParameter)
            );

?>	
		</div>
	</div>

<?php
	if ($this->isAlert()) {
    		$this->generateView("message/alert");
	}
	if ($this->isError()) {
		$this->generateView("message/error");
	}

?>
	<div class="xui application_content -has-toolbar <?php if($this->hasAlert__){echo "-has-message-alert";}; ?> <?php if ($this->hasError__){echo "-has-message-error";}; ?>">
	<?php $this->generateCurrentView(); ?>
	</div>
</div>

<div class="xui separator" id="xui-application-responsive"></div>

<?php

$this->setHtmlJsSourceOrAjax("XUI.App.Toolbar.linkResponsive(\"xui-application-responsive\",\"xui-app-toolbar\",\"xui-app-toolbar_content\");","load");

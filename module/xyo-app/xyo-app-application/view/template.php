<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$hasMessage=false;
if($this->isAlert()){
	$hasMessage=true;
};
if($this->isError()){
	$hasMessage=true;
};

?>
<div class="xui application -has-toolbar<?php if($hasMessage)echo "-has-message"; ?>">
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
	if($hasMessage){
		if ($this->isError()) {
			$this->generateView("message/error");
		}else
		if ($this->isAlert()) {
    			$this->generateView("message/alert");
		}
	};
?>
	<div class="xui application_content">
	<?php $this->generateCurrentView(); ?>
	</div>
</div>

<div class="xui separator" id="xui-application-responsive"></div>

<?php

$this->setHtmlJsSourceOrAjax("XUI.App.Toolbar.linkResponsive(\"xui-application-responsive\",\"xui-app-toolbar\",\"xui-app-toolbar_content\");","load");

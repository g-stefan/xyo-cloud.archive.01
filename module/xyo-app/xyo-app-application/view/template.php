<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
?>
<div class="xui-application">
	<div class="xui-toolbar" id="xui-toolbar"><div class="xui_right" id="xui-toolbar__container">
<?php
           $this->execModule("xyo-mod-toolbar", array_merge(array(
                        "module" => $this->name,
                        "config" => $this->getParameter("toolbar", "toolbar/default")
                            ), $this->toolbarParameter)
            );

?>	
	</div></div>

<?php
	if ($this->isAlert()) {
    		$this->generateView("message/alert");
	}
	if ($this->isError()) {
		$this->generateView("message/error");
	}

?>
	<div class="xui-content xui-content_has-toolbar <?php if($this->hasAlert__){echo "xui-content_has-message-alert";}; ?> <?php if ($this->hasError__){echo "xui-content_has-message-error";}; ?>">
	<?php $this->generateCurrentView(); ?>
	</div>
</div>
<?php

$this->setHtmlJsSourceOrAjax("XUI.Responsive.Element.linkContainer(\"xui-content\",\"xui-toolbar\",\"xui-toolbar__container\",[\"xui-toolbar_important\",\"xui-toolbar_small\",\"xui-toolbar_large\"]);","load");

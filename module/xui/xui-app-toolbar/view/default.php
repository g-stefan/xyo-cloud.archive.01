<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

<div class="xui text -label-40">
	Application - Toolbar
</div>
<div style="border: 1px solid #000000;width: 100%;">
<div class="xui app-toolbar" id="xui-app-toolbar">
<div class="xui app-toolbar_content" id="xui-app-toolbar_content">
<?php foreach($xuiContext->context as $context){ ?>
<?php if($context=="disabled")continue; ?>

	<div class="xui app-toolbar_button -<?php echo $context ?> -effect-ripple">
		<div class="xui app-toolbar_button_icon">
			<i class="material-icons">people</i>
		</div>
		<div class="xui app-toolbar_button_text">
			<?php echo ucfirst($context); ?>
		</div>
	</div>

<?php }; ?>

	<div class="xui app-toolbar_button -important -effect-ripple">
		<div class="xui app-toolbar_button_icon">
			<i class="material-icons">people</i>
		</div>
		<div class="xui app-toolbar_button_text">
			Important 1
		</div>
	</div>

	<div class="xui app-toolbar_button -important -effect-ripple">
		<div class="xui app-toolbar_button_icon">
			<i class="material-icons">people</i>
		</div>
		<div class="xui app-toolbar_button_text">
			Important 2
		</div>
	</div>


	<div class="xui app-toolbar_button -important -effect-ripple">
		<div class="xui app-toolbar_button_icon">
			<i class="material-icons">people</i>
		</div>
		<div class="xui app-toolbar_button_text">
			Important 3
		</div>
	</div>


</div>
</div>
</div>

<div style="position: relative;width: 100%;" id="xui-responsive"></div>

<?php 

$this->setHtmlJsSourceOrAjax("XUI.App.Toolbar.linkResponsive(\"xui-responsive\",\"xui-app-toolbar\",\"xui-app-toolbar_content\");","load");

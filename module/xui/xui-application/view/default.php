<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<div class="xui text -label-40">
	Application
</div>

<div style="position:relative;width:800px;height:600px;border:1px solid #000000">
	<div class="xui application -has-toolbar">
		<div class="xui app-toolbar" id="xui-app-toolbar">
			<div class="xui app-toolbar_content" id="xui-app-toolbar_content">

				<div class="xui app-toolbar_button -primary -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 1
					</div>
				</div>

				<div class="xui app-toolbar_button -warning -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 2
					</div>
				</div>

				<div class="xui app-toolbar_button -success -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 2
					</div>
				</div>


			</div>
		</div>
		<div class="xui application_content">
			<br />
			<br />
			<br />
			Hello World!
			<br />
			<br />
			<br />
		</div>
		<div style="position: relative;width: 100%;" id="xui-responsive"></div>
	</div>
</div>

<br />
<br />

<div style="position:relative;width:800px;height:600px;border:1px solid #000000">
	<div class="xui application -has-toolbar -has-message">
		<div class="xui app-toolbar" id="xui-app-toolbar-2">
			<div class="xui app-toolbar_content" id="xui-app-toolbar_content">

				<div class="xui app-toolbar_button -primary -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 1
					</div>
				</div>

				<div class="xui app-toolbar_button -warning -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 2
					</div>
				</div>

				<div class="xui app-toolbar_button -success -important -effect-ripple">
					<div class="xui app-toolbar_button_icon">
						<i class="material-icons">people</i>
					</div>
					<div class="xui app-toolbar_button_text">
						Button 2
					</div>
				</div>


			</div>
		</div>
		<div class="xui application_content">
			<div class="xui alert -primary">
				Alert
			</div> 
			<br />
			<br />
			<br />
			Hello World!
			<br />
			<br />
			<br />
		</div>
		<div style="position: relative;width: 100%;" id="xui-responsive"></div>
	</div>
</div>


<?php 

$this->setHtmlJsSourceOrAjax("XUI.App.Toolbar.linkResponsive(\"xui-responsive\",\"xui-app-toolbar\",\"xui-app-toolbar_content\");","load");

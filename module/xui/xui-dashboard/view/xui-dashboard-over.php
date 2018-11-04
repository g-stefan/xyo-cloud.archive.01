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
	Dashboard - Over
</div>
<div style="position:relative;width:800px;height:400px;border:1px solid #000000">
	<div class="xui dashboard -over -closed" id="dashboard-mode-over">
		<!-- app-header -->
		<div class="xui app-header -elevation-4">
			<div class="xui app-brand">
				<div class="xui app-brand_content">
					<div class="xui app-brand_logo"></div>
					<div class="xui app-brand_name">Brand</div>
					<div class="xui app-brand_mark">TM</div>
				</div>
			</div>
			<div class="xui app-bar">
				<div class="xui button -size-40x40 -left -effect-ripple" onclick="XUI.Dashboard.toogleOver('dashboard-mode-over');">
					<i class="material-icons">menu</i>
				</div>
				<div class="xui text -size-h24x40 -left">
					Application
				</div>
				<div class="xui button -size-32x40 -circle -right -effect-ripple">
					<i class="material-icons">eject</i>
				</div>
				<div class="xui button -size-32x40 -circle -right -effect-ripple">
					<i class="material-icons">person</i>
				</div>
			</div>
		</div>
		<!-- /app-header -->
		<div class="xui navigation-drawer">
			<div class="xui navigation-drawer_content">
				<!-- app-user -->
				<div class="xui app-user">
					<div class="xui app-user_content">
						<div class="xui app-user_background-img"></div>
						<div class="xui app-user_background"></div>
						<div class="xui app-user_image -elevation-2"></div>
						<div class="xui app-user_info">User</div>
					</div>
				</div>
				<!-- /app-user -->
				<!-- menu -->
				<div class="xui menu">
					<?php $this->generateViewFromModule("xui-menu","xui-menu-content"); ?>
				</div>
				<!-- /menu -->
			</div>
		</div>
		<div class="xui content">
			<!-- content -->
			Hello World!
			<!-- /content -->
		</div>
		<div class="xui content-cover"></div>
	</div>
</div>


/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

/* --- dasboard navigation drawer --- */

.xui-dashboard .xui-navigation-drawer{
	position: relative;
	height: calc(100% - 48px);
	overflow:auto;
	float:left;
	left: 0;
	right: 0;
	border-right: 1px solid <?php echo $xuiTheme->dashboard["navigation.drawer.color.border"]; ?>;
	transition: width 0.5s ease;	
	z-index: 4;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-separator{
	background-color: <?php echo $xuiTheme->dashboard["navigation.drawer.background.color"]; ?>;
	height: 4px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-separator .xui-line{
	height: 2px;
	overflow: hidden;
	border-bottom: 1px solid <?php echo $xuiTheme->dashboard["navigation.drawer.color.border"]; ?>;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer a.xui-action{
	text-decoration: none;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer a.xui-action:visited{
	text-decoration: none;
}

.xui-dashboard .xui-navigation-drawer .xui-action .xui-icon-left{
	transition: color 0.5s ease;
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.icon.left"]; ?>;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active{
	background-color: <?php echo $xuiTheme->dashboard["navigation.drawer.background.color.active"]; ?> !important;
	border-left: 4px solid <?php echo $xuiTheme->dashboard["navigation.drawer.bar.color.active"]; ?>;
	padding-left: 8px !important;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action_active{
	background-color: <?php echo $xuiTheme->dashboard["navigation.drawer.background.color"]; ?> !important;
	border-left: 0px solid <?php echo $xuiTheme->dashboard["navigation.drawer.bar.color.active"]; ?>;
	padding-left: 12px !important;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-icon-left{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.active"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action:hover .xui-icon-left{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.icon.left.hover"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active:hover .xui-icon-left{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.active"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action .xui-icon-left{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.popup.active"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action .xui-text{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-text{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.active"]; ?>;
	font-weight: normal;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action .xui-text{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color"]; ?>;
	font-weight: normal;
}

.xui-dashboard .xui-navigation-drawer .xui-action .xui-icon-right{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.icon.right"]; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-icon-right{
	color: <?php echo $xuiTheme->dashboard["navigation.drawer.color.icon.right"]; ?>;
}

/* --- dasboard navigation drawer user --- */

.xui-dashboard .xui-navigation-drawer .xui-user{
	position: relative;
	overflow: hidden;
	height: <?php echo 48*3; ?>px;
	margin-top: -8px;
	margin-bottom: 8px;
	transition: height 0.5s ease, width 0.5s ease;	
	background-color: <?php echo $xuiTheme->dashboard["navigation.drawer.user.background.color"]; ?>;	

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_normal.xui-navigation-drawer_closed .xui-user{
	position: relative;
	overflow: hidden;
	height: 48px;
	margin-top: -8px;
	margin-bottom: 8px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer_mini.xui-navigation-drawer_closed .xui-user{
	position: relative;
	overflow: hidden;
	height: 48px;
	margin-top: -8px;
	margin-bottom: 8px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}


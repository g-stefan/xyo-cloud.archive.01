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
	border-right: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	transition: width 0.5s ease;	
	z-index: 4;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-separator{
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
	height: 4px;
	overflow: hidden;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-separator .xui-line{
	height: 2px;
	overflow: hidden;
	border-bottom: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;

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
	color: <?php echo $this->navigationDrawerColorIconLeft; ?>;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active{
	background-color: <?php echo $this->navigationDrawerBackgroundColorActive; ?> !important;
	border-left: 4px solid <?php echo $this->navigationDrawerBarColorActive; ?>;
	padding-left: 8px !important;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action_active{
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?> !important;
	border-left: 0px solid <?php echo $this->navigationDrawerBarColorActive; ?>;
	padding-left: 12px !important;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-icon-left{
	color: <?php echo $this->navigationDrawerColorActive; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action:hover .xui-icon-left{
	color: <?php echo $this->navigationDrawerColorIconLeftHover; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active:hover .xui-icon-left{
	color: <?php echo $this->navigationDrawerColorActive; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action .xui-icon-left{
	color: <?php echo $this->navigationDrawerColorPopupActive; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action .xui-text{
	color: <?php echo $this->navigationDrawerColor; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-text{
	color: <?php echo $this->navigationDrawerColorActive; ?>;
	font-weight: normal;
}

.xui-dashboard .xui-navigation-drawer .xui-popup_active > .xui-action .xui-text{
	color: <?php echo $this->navigationDrawerColor; ?>;
	font-weight: normal;
}

.xui-dashboard .xui-navigation-drawer .xui-action .xui-icon-right{
	color: <?php echo $this->navigationDrawerColorIconRight; ?>;
}

.xui-dashboard .xui-navigation-drawer .xui-action_active .xui-icon-right{
	color: <?php echo $this->navigationDrawerColorIconRight; ?>;
}

/* --- dasboard navigation drawer user --- */

.xui-dashboard .xui-navigation-drawer .xui-user{
	position: relative;
	overflow: hidden;
	height: <?php echo 48*3; ?>px;
	margin-top: -8px;
	margin-bottom: 8px;
	transition: height 0.5s ease, width 0.5s ease;	
	background-color: <?php echo $this->navigationDrawerUserBackgroundColor; ?>;	

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


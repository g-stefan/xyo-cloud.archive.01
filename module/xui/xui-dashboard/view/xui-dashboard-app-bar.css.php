/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/


/* --- dasboard app bar --- */

.xui-dashboard .xui-app-bar{
	position: relative;	
	background-color: <?php echo $this->appBarBackgroundColor; ?>;
	z-index: 4;
}

.xui-dashboard .xui-app-bar .xui-button{
	color: <?php echo $this->appBarColor; ?>;
	background-color: <?php echo $this->appBarBackgroundColor; ?>;
}

.xui-dashboard .xui-app-bar .xui-button:hover{
	background-color: <?php echo $this->appBarBackgroundColorHover; ?>;
}

.xui-dashboard .xui-app-bar .xui-button .xui_effect-ripple__element{
	background-color: <?php echo $this->appBarBackgroundColorRipple; ?>;
}

.xui-dashboard .xui-app-bar .xui-app-title{
	color: <?php echo $this->appBarColor; ?>;
}

/* --- dasboard app bar brand --- */

.xui-dashboard .xui-app-bar .xui-brand{
	width: <?php echo $this->navigationDrawerOpenWidth-1; ?>px;
	transition: width 0.5s ease;
	background-color: <?php echo $this->appBarBrandBackgroundColor; ?>;
}

.xui-dashboard .xui-app-bar .xui-brand_normal.xui-brand_closed{
	width: <?php echo $this->navigationDrawerMiniWidth-1; ?>px;
}

.xui-dashboard .xui-app-bar .xui-brand_mini.xui-brand_closed{
	width: <?php echo $this->navigationDrawerMiniWidth-1; ?>px;
}

.xui-dashboard .xui-app-bar .xui-brand_mini.xui-brand_open{
	width: <?php echo $this->navigationDrawerMiniWidth-1; ?>px;
}

.xui-dashboard .xui-app-bar .xui-brand_over.xui-brand_open{
	padding-left: 0px;
	width: 0px;
}

.xui-dashboard .xui-app-bar .xui-brand_over.xui-brand_closed{
	padding-left: 0px;
	width: 0px;
}


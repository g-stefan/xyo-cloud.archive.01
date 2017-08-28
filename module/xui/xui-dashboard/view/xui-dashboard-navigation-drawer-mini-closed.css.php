/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

/* --- dasboard navigation drawer mini closed --- */

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed{
	width: <?php echo $this->navigationDrawerMiniWidth; ?>px;
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
	padding-top: 8px;
	z-index: 4;
	overflow: visible;
	position: absolute;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup {
	position: relative;
	width: <?php echo $this->navigationDrawerMiniWidth-9; ?>px;
	height: auto;
	overflow: hidden;
	cursor: pointer;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed > .xui-popup {
	transition: width 0.5s ease;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next{
	position: relative;
	height: 0px;
	overflow: hidden;
	width: <?php echo $this->navigationDrawerMiniWidth-1; ?>px;	
	z-index: 5;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action{
	position: relative;
	width: <?php echo $this->navigationDrawerMiniWidth-1; ?>px;
	height: 40px;
	overflow: hidden;
	padding-left: 12px;
	cursor: pointer;
	display: block;
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
	transition: background-color 0.5s ease, height 0.5s ease;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;

	-webkit-touch-callout: none;
	-webkit-user-select: none;
     	-khtml-user-select: none;
       	-moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed > .xui-action {
	transition: background-color 0.5s ease, height 0.5s ease, width 0.5s ease;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-separator{
	transition: height 0.5s ease;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action:hover{
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
	width: <?php echo $this->navigationDrawerOpenWidth; ?>px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action .xui--effect-ripple__element {
	background-color: <?php echo $this->navigationDrawerBackgroundColorRipple; ?>;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action .xui-icon-left{
	position: relative;
	float:left;
	width: 48px;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	font-size: 24px;
	line-height: 24px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action .xui-text{
	position: relative;
	float:left;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	font-size: 15px;
	line-height: 24px;
	margin-left: 8px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action .xui-icon-right{
	position: relative;
	float:right;
	width: 48px;
	height: 40px;
	padding-left: 12px;
	padding-top: 8px;
	padding-bottom: 8px;
	padding-right: 12px;
	overflow: hidden;
	transition: transform 0.3s ease;
	font-size: 24px;
	line-height: 24px;

	font-family: "Roboto", sans-serif;
	box-sizing: border-box;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--on .xui-icon-right{
	transform: rotate(90deg);
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--off .xui-icon-right{
	transform: rotate(0deg);
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--on .xui-next .xui-action{
	height: 40px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--off .xui-next .xui-action{
	height: 0px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed + .xui-content{
	margin-left: <?php echo $this->navigationDrawerMiniWidth; ?>px;
}

/* --- hover --- */

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover{
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
	width: <?php echo $this->navigationDrawerOpenWidth; ?>px;
	overflow: visible;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-action{
	width: <?php echo $this->navigationDrawerOpenWidth; ?>px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next{
	position: relative;
	height: 0px;
	overflow: visible;
	width: <?php echo $this->navigationDrawerOpenWidth; ?>px;
	margin-left: <?php echo $this->navigationDrawerMiniWidth; ?>px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-popup{
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
	height: auto;
	width: <?php echo $this->navigationDrawerOpenWidth-$this->navigationDrawerMiniWidth; ?>px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-popup .xui-next{
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
	height: auto;
	width: <?php echo $this->navigationDrawerOpenWidth-$this->navigationDrawerMiniWidth; ?>px;
	margin-left: 0px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-action{
	height: 40px;
	width: <?php echo $this->navigationDrawerOpenWidth-$this->navigationDrawerMiniWidth; ?>px;
	padding-left: 0px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-action .xui-icon-left{
	display: none;	
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-action .xui-text{
	width: auto;
	padding-left: 0px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-icon-right{
	transform: rotate(90deg);
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-popup--off .xui-icon-right{
	transform: rotate(0deg);
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-popup .xui-action{
	height: 40px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-popup--off .xui-next .xui-action{
	height: 0px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-next .xui-separator{
	width: <?php echo $this->navigationDrawerOpenWidth-$this->navigationDrawerMiniWidth; ?>px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-popup--off .xui-next .xui-separator{
	height: 0px;
} 



/* --- outline --- */

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-action{
	border-top: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	border-right: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action:hover{
	border-top: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	border-right: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	border-bottom: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-action{
	border-top: 0px solid #000000;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-action:hover .xui-icon-left{
	padding-top: 7px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup:hover .xui-action .xui-icon-left{
	padding-top: 7px;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-action{
	border-top: none;
	border-bottom: none;
	background-color: <?php echo $this->navigationDrawerBackgroundColor; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-action:hover{
	border-top: none;
	background-color: <?php echo $this->navigationDrawerBackgroundColorHover; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-action:last-child{
	border-top: none;
	border-bottom: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-popup .xui-next .xui-action:last-child{
	border-top: none;
	border-bottom: none;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-popup:last-child .xui-next .xui-action:last-child{
	border-top: none;
	border-bottom: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-separator{
	border-right: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
} 

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup .xui-next .xui-separator:last-child{
	border-top: none;
	border-bottom: 1px solid <?php echo $this->navigationDrawerColorBorder; ?>;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--active .xui-next > .xui-action--active{
	padding-left: 0px !important;
}

.xui-dashboard .xui-navigation-drawer--mini.xui-navigation-drawer--closed .xui-popup--active .xui-next > .xui-action--active .xui-text{
	margin-left: 4px;
}




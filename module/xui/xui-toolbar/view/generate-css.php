<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");
$xuiElevation=&$this->getModule("xui-elevation");

?>
/*
//
//
//
*/

.xui-toolbar__item{
	position: relative;
	display: inline-block;
	width: auto;
	height: 38px;
	overflow: hidden;
	
	padding-top: 6px;
	padding-left: 10px;
	padding-bottom: 6px;
	padding-right: 10px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 4px;
	margin-right: 0px;

	box-sizing: border-box;

	user-select: none;
	cursor: pointer;

	border-top: 1px solid transparent;
	border-right: 1px solid transparent;
	border-bottom: 1px solid transparent;
	border-left: 1px solid transparent;

	transition: border 0.3s ease, box-shadow 0.3s ease;

	border-radius: 3px;

<?php $xuiElevation->eElevationCss(0); ?>
}

.xui-toolbar__item .xui_effect-ripple__element{
	background-color: #C0C0C0;
}

.xui-toolbar__icon{
	position: relative;
	display: block;
	float: left;

	font-size: 24px;
	line-height: 24px;
	font-weight: normal;

	margin-right: 0px;
}

.xui-toolbar__text{
	position: relative;
	display: none;
	float: left;

	font-size: 16px;
	line-height: 16px;
	font-weight: normal;

	margin-top: 4px;

	color: #000000;
}


<?php foreach($xuiTheme->colorTypeButton as $key=>$value){ 

	if($key=="disabled"){
		continue;
	};

	$colorIcon=$value; 
	$colorText="#000000"; 

	if($key=="default"){
		$colorIcon=$xuiPalette->palette["core-medium-gray"];
	};

?>

.xui-toolbar__item_<?php echo $key; ?> .xui-toolbar__icon{
	color: <?php echo $colorIcon; ?>;
}

.xui-toolbar__item_<?php echo $key; ?> .xui-toolbar__text{
	color: <?php echo $colorText; ?>;
}

.xui-toolbar__item.xui-toolbar__item_<?php echo $key; ?>:hover{
	border-top: 1px solid <?php echo $colorIcon; ?>;
	border-right: 1px solid <?php echo $colorIcon; ?>;
	border-bottom: 1px solid <?php echo $colorIcon; ?>;
	border-left: 1px solid <?php echo $colorIcon; ?>;

<?php $xuiElevation->eElevationCss(2); ?>
}

.xui-toolbar__item.xui-toolbar__item_<?php echo $key; ?> .xui_effect-ripple__element{
	background-color: <?php echo $xuiColor->rgbHexHSLAdjust($colorIcon,0,0,25); ?>;
}

.xui-toolbar__item_<?php echo $key; ?>:active .xui-toolbar__icon{
	color: <?php echo $xuiColor->rgbHexHSLAdjust($colorIcon,0,0,-15); ?>;
}

<?php }; ?>


.xui-toolbar__item_disabled .xui-toolbar__icon{
	color: #E6E9ED;
}

.xui-toolbar__item_disabled .xui-toolbar__text{
	color: #E6E9ED;
}

.xui-toolbar__item.xui-toolbar__item_disabled .xui_effect-ripple__element{
	background-color: transparent;
}


a.xui-toolbar__item:visited{
	text-decoration: none;	
}

a.xui-toolbar__item:hover{
	text-decoration: none;
}


@media only screen and (min-width: 960px){

	.xui-toolbar__item{
		margin-left: 4px;
		margin-right: 4px;
	}

	.xui-toolbar__icon{
		margin-right: 10px;
	}

	.xui-toolbar__text{
		display: block;
	}

}

.xui-toolbar__item:active{
	margin-top: 2px;
	margin-bottom: 0px;
<?php $xuiElevation->eElevationCss(2); ?>
}

.xui-toolbar__item:hover:active{
	transition: box-shadow 0s ease;
<?php $xuiElevation->eElevationCss(0); ?>
}


.xui-toolbar__item.xui-toolbar__item_disabled:active{
	margin-top: 0px;
	margin-bottom: 2px;
}





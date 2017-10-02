<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-form-checkbox{
	display: inline-block;
	vertical-align: middle;
	cursor: pointer;
	position: relative;

	font-size: 16px;
	line-height: 24px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	font-family: "Roboto", sans-serif;
}

/* --- */

.xui-form-checkbox input[type="checkbox"]{
	display: none;
}

.xui-form-checkbox label {
	display: inline-block;
        vertical-align: middle;

	font-family: "Roboto", sans-serif;
	font-size: 16px;
	line-height: 24px;
	font-weight: normal;

	padding-top: 4px;
	padding-right: 0px;
	padding-bottom: 4px;
	padding-left: 26px;

	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;

	cursor: pointer;
	box-sizing: border-box;

	<?php echo $xuiTheme->colorTypeLabel["default"]; ?>
}

.xui-form-checkbox label::before {
	display: block;	
	cursor: pointer;
	position: absolute;
	cursor: pointer;
	left: 0px;
	top: 5px;
	content: " ";

	width: 22px;
	height: 22px;
	border-radius: 0px;
	background-color: transparent;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 4px;

	box-sizing: border-box;

	border: 2px solid <?php echo $xuiTheme->colorTypeInput["default"]; ?>;
	border-radius: 3px;
}

.xui-form-checkbox input[type="checkbox"]:active + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-checkbox input[type="checkbox"]:focus + label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInputActive; ?>;
}

.xui-form-checkbox input[type="checkbox"] + label::after {
	display: block;	
	cursor: pointer;
	position: absolute;
	top: 8px;
	left: 3px;
	content: " ";

	border-radius: 0px;

	width: 16px;
	height: 16px;

	padding-top: 0px;
	padding-left: 0px;
	padding-bottom: 0px;
	padding-right: 0px;

	margin-top: 0px;
	margin-left: 0px;
	margin-bottom: 0px;
	margin-right: 0px;

	box-sizing: border-box;

	background: transparent;
}

.xui-form-checkbox input[type="checkbox"]:checked + label::after {
	background-size: 16px 16px;
	background-repeat: no-repeat;

	background-image: <?php

$color=$xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput["default"],0,5,-20);

$svg="<?xml version=\"1.0\" encoding=\"UTF-8\"?>".
"<svg viewBox=\"0 0 128 128\" xmlns=\"http://www.w3.org/2000/svg\">".
" <g transform=\"matrix(1.3223902,0,0,1.3223902,-22.471841,-26.903714)\">".
"  <path d=\"m 33.772,55.509 c -0.4167,0 -1.101,0.2515 -1.4034,0.5658 l -13.472,13.753 c -0.60451,0.6108 -0.60361,1.3626 0,1.9652 l 21.177,20.113 13.753,13.754 c 0.3054,0.305 0.70589,0.557 1.1227,0.557 0.3081,0 0.60001,-0.323 0.8416,-0.557 l 13.753,-13.473 43.506,-43.506 c 0.612,-0.60181 0.61002,-1.641 0,-2.2455 l -13.754,-13.753 c -0.61099,-0.6018 -1.362,-0.61079 -1.965,0 l -42.382,42.382 -20.054,-18.99 c -0.3027,-0.3054 -0.70601,-0.5658 -1.1227,-0.5658 l 3.97e-4,0 z\" style=\"stroke-width:0.616;fill:".$color.";fill-opacity:1\" />".
" </g>".
"</svg>";

	echo "url(\"data:image/svg+xml;base64,".base64_encode($svg)."\")";

?>;

}

<?php foreach($xuiTheme->colorTypeInput as $key=>$value){ ?>

.xui-form-checkbox_<?php echo $key; ?> label {
	color: <?php echo $xuiTheme->colorTypeLabel[$key]; ?>;
}

.xui-form-checkbox_<?php echo $key; ?> label::before {
	border: 2px solid <?php echo $xuiTheme->colorTypeInput[$key]; ?>;
}

.xui-form-checkbox_<?php echo $key; ?> input[type="checkbox"]:checked + label::after {
	background-image: <?php

$color=$xuiColor->rgbHexHSLAdjust($xuiTheme->colorTypeInput[$key],0,5,-20);

$svg="<?xml version=\"1.0\" encoding=\"UTF-8\"?>".
"<svg viewBox=\"0 0 128 128\" xmlns=\"http://www.w3.org/2000/svg\">".
" <g transform=\"matrix(1.3223902,0,0,1.3223902,-22.471841,-26.903714)\">".
"  <path d=\"m 33.772,55.509 c -0.4167,0 -1.101,0.2515 -1.4034,0.5658 l -13.472,13.753 c -0.60451,0.6108 -0.60361,1.3626 0,1.9652 l 21.177,20.113 13.753,13.754 c 0.3054,0.305 0.70589,0.557 1.1227,0.557 0.3081,0 0.60001,-0.323 0.8416,-0.557 l 13.753,-13.473 43.506,-43.506 c 0.612,-0.60181 0.61002,-1.641 0,-2.2455 l -13.754,-13.753 c -0.61099,-0.6018 -1.362,-0.61079 -1.965,0 l -42.382,42.382 -20.054,-18.99 c -0.3027,-0.3054 -0.70601,-0.5658 -1.1227,-0.5658 l 3.97e-4,0 z\" style=\"stroke-width:0.616;fill:".$color.";fill-opacity:1\" />".
" </g>".
"</svg>";

	echo "url(\"data:image/svg+xml;base64,".base64_encode($svg)."\")";

?>;
}
	
<?php }; ?>


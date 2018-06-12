<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

?>

/* --- */

.xui-table{
	position: relative;
	box-sizing: border-box;
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;
	width: 100%;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 0px;
	padding-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 0px;
	border: 0px solid #000000;
	border-spacing: 0px;
}

.xui-table thead{
	width: 100%;
}

.xui-table thead tr{
	width: 100%;
	background-color: <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.background"]; ?>;
}

.xui-table thead tr th{
	font-size: 16px;
	line-height: 20px;
	font-weight: normal;
	color: <?php echo $xuiTheme->theme["default"]["table"]["color.text.head"]; ?>;
}

.xui-table tbody{
	width: 100%;
}

.xui-table tbody tr{
	width: 100%;
	background-color: <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.background"]; ?>;
	color: <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.text"]; ?>;
}

.xui-table thead th{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	color: <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.text"]; ?>;
	padding: 4px;
	box-sizing: border-box;
}

.xui-table thead th:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-bottom: 0px solid #000000;
}

.xui-table tbody tr td{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-right: 0px solid #000000;
	border-bottom: 0px solid #000000;
	padding: 4px;
	box-sizing: border-box;
}

.xui-table tbody tr td:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
	border-bottom: 0px solid #000000;
}

.xui-table tbody tr:nth-child(even){
	background-color: <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.background.even"]; ?>;
}

.xui-table tbody tr:last-child td{
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["normal"]["color.border"]; ?>;
}

.xui-table tbody tr:last-child td:first-child{
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 3px;
	border-bottom-right-radius: 0px;
}

.xui-table tbody tr:last-child td:last-child{
	border-top-left-radius: 0px;
	border-top-right-radius: 0px;
	border-bottom-left-radius: 0px;
	border-bottom-right-radius: 3px;
}

.xui-table tbody tr:hover{
	background-color: <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.background"]; ?>;
	color: <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.text"]; ?>;
}

.xui-table tbody tr:hover td{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
}

.xui-table tbody tr:hover td:first-child{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
	border-right: 0px solid #000000;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
}

.xui-table tbody tr:hover td:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme["default"]["table"]["active"]["color.border"]; ?>;
}

.xui-table tbody tr:hover + tr td{
	border-top: 0px solid #000000;
}

<?php foreach($xuiTheme->theme as $key=>$value){
	if($key=="default"){
		continue;
	};
?>

.xui-table_<?php echo $key; ?> thead tr th{
	color: <?php echo $xuiTheme->theme[$key]["table"]["color.text.head"]; ?>;
}

.xui-table_<?php echo $key; ?> thead tr{
	background-color: <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.background"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr{
	background-color: <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.background"]; ?>;
	color: <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.text"]; ?>;
}

.xui-table_<?php echo $key; ?> thead th{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	color: <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.text"]; ?>;
}

.xui-table_<?php echo $key; ?> thead th:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr td{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr td:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:nth-child(even){
	background-color: <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.background.even"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:last-child td{
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["normal"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:hover{
	background-color: <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.background"]; ?>;
	color: <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.text"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:hover td{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:hover td:first-child{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
	border-left: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
}

.xui-table_<?php echo $key; ?> tbody tr:hover td:last-child{
	border-top: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
	border-right: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
	border-bottom: 1px solid <?php echo $xuiTheme->theme[$key]["table"]["active"]["color.border"]; ?>;
}


<?php }; ?>

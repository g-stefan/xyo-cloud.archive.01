/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<style>

<?php 

$xuiPalette=&$this->getModule("xui-palette");

?>
<?php foreach($xuiPalette->palette as $key=>$value){ ?>

.xui.-fg-<?php echo $key; ?> {
	color: <?php echo $value; ?> !important;
}

.xui.-fg-<?php echo $key; ?>-hover:hover {
	color: <?php echo $value; ?> !important;
}

.xui.-bg-<?php echo $key; ?> {
	background-color: <?php echo $value; ?> !important;
}

.xui.-bg-<?php echo $key; ?>-hover:hover {
	background-color: <?php echo $value; ?> !important;
}
  
<?php }; ?>

</style>

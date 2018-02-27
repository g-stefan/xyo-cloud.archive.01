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

?>

<br>
<br>
<form style="padding:30px;">
<hr>
<?php foreach($xuiTheme->colorTypeButton as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<?php  ?>
<button type="button" class="xui-form-button-icon-right xui-form-button-icon-right_<?php echo $key; ?>"<?php echo $disabled; ?>><?php echo $key; ?><i class="material-icons">radio_button_unchecked</i></button>
<br><br>
<?php }; ?>
<hr>

<br>
<br>
<br>
<br>
<br>

</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

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

?>

<br>
<br>
<form>
<hr>
<?php foreach($xuiPalette->colorTypeButton as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<?php  ?>
<button type="button" class="xui-form-button-icon-left xui-form-button-icon-left--<?php echo $key; ?> xui--elevation-2"<?php echo $disabled; ?>><i class="material-icons">radio_button_unchecked</i><?php echo $key; ?></button>
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

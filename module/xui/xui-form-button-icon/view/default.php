<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>

<div style="padding:32px;">
<form>

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<?php  ?>
<button type="button" class="xui-form-button-icon xui-form-button-icon_<?php echo $key; ?>"<?php echo $disabled; ?>><i class="material-icons">radio_button_unchecked</i></button>
<br><br>
<?php }; ?>

</form>
</div>

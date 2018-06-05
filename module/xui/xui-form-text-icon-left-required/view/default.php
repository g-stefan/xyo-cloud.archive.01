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
<label class="xui-form-label xui-form-label_<?php echo $key; ?>"><?php echo $key; ?></label><br>
<div class="xui-form-text-icon-left-required xui-form-text-icon-left-required_<?php echo $key; ?>">
<input type="text" value="" <?php echo $disabled; ?>></input>
<i class="material-icons">person</i>
</div>
<br />
<?php }; ?>

</form>
</div>
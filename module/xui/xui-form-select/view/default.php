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
<label for="xui-form-select-id-<?php echo $key; ?>" class="xui-form-label xui-form-label_<?php echo $key; ?>"><?php echo $key; ?></label><br>
<select class="xui-form-select xui-form-select_<?php echo $key; ?>" id="xui-form-select-id-<?php echo $key; ?>" name="cars-<?php echo $key; ?>" <?php echo $disabled; ?>>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
<br />
<?php }; ?>

</form>
</div>

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
<input type="button" value="<?php echo $key; ?>" class="xui-form-button xui-form-button--<?php echo $key; ?> xui--elevation-2"<?php echo $disabled; ?>></input>
<br><br>
<?php }; ?>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<label class="xui-form-label xui-form-label--<?php echo $key; ?>"><?php echo $key; ?></label><br>
<input type="text" value="" class="xui-form-text xui-form-text--<?php echo $key; ?>"<?php echo $disabled; ?>></input>
<br><br>
<?php }; ?>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<label class="xui-form-label xui-form-label--<?php echo $key; ?>"><?php echo $key; ?></label><br>
<textarea class="xui-form-textarea xui-form-textarea--<?php echo $key; ?>"<?php echo $disabled; ?>></textarea>
<br><br>
<?php }; ?>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<div class="xui-form-radio xui-form-radio--<?php echo $key; ?>">
    <input type="radio" id="radio-item-<?php echo $key; ?>" name="radio-item" value="radio-option-<?php echo $key; ?>"<?php echo $disabled; ?>></input>
    <label for="radio-item-<?php echo $key; ?>"><?php echo $key; ?></label>
</div>
<?php }; ?>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<div class="xui-form-checkbox xui-form-checkbox--<?php echo $key; ?>">
    <input type="checkbox" id="chekbox-item-<?php echo $key; ?>" name="chekbox-item" value="chekbox-option-<?php echo $key; ?>"<?php echo $disabled; ?>></input>
    <label for="chekbox-item-<?php echo $key; ?>"><?php echo $key; ?></label>
</div>
<?php }; ?>
<hr>
<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<label class="xui-form-label xui-form-label--<?php echo $key; ?>"><?php echo $key; ?></label><br>
<select class="xui-form-select xui-form-select--<?php echo $key; ?>" name="cars-<?php echo $key; ?>" <?php echo $disabled; ?>>
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
<br><br>
<?php }; ?>
<hr>
<br>
<br>
<label class="xui-form-label xui-form-label--default">Datepicker</label><br>
<input type="text" value="" class="xui-form-text xui-form-text--default datepicker-here" data-language="en"></input>
<br>
<br>
<label class="xui-form-label xui-form-label--default">Datetimepicker</label><br>
<input type="text" value="" class="xui-form-text xui-form-text--default datepicker-here" data-timepicker="true" data-language="en"></input>
<br>
<br>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>


<?php foreach($xuiPalette->colorTypeInput as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>

<div class="xui-form-text-material xui-form-text-material--<?php echo $key; ?>">
	<label for="text-material-<?php echo $key; ?>"><?php echo $key; ?></label>
	<input id="text-material-<?php echo $key; ?>" type="text" value="" <?php echo $disabled; ?>></input>
</div>

<br>

<?php }; ?>

<br>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
<br>

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

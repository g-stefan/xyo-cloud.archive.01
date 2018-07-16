<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$xuiColor=&$this->getModule("xui-color");
$xuiPalette=&$this->getModule("xui-palette");
$xuiTheme=&$this->getModule("xui-theme");

?>

<div style="padding:32px;">
<form>

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<?php  ?>
<input type="button" value="<?php echo $key; ?>" class="xui-form-button xui-form-button_<?php echo $key; ?>"<?php echo $disabled; ?>></input>
<br /><br /><pre style="border-radius:3px;width:640px;display:block;height:auto;"><code data-language="html"><?php 

	if($key=="disabled"){
		$disabled="\n\t".trim($disabled);
	};
	echo htmlentities("<input type=\"button\"\n\tvalue=\"".$key."\"\n\tclass=\"xui-form-button xui-form-button_".$key."\"".$disabled."></input>");

?></code></pre>
<br /><br />
<?php }; ?>

</form>
</div>
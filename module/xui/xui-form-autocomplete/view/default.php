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

$script="";

$script.="var data = [";
$script.="  { value: \"one\", label: \"one\" },";
$script.="  { value: \"two\", label: \"two\" },";
$script.="  { value: \"three\", label: \"three\" }";
$script.="];";

?>

<div style="padding:32px;">
<form>

<?php foreach($xuiTheme->theme as $key=>$value){ ?>
<?php $disabled=""; if($key=="disabled"){ $disabled=" disabled=\"disabled\""; }; ?>
<div class="xui-form-autocompleter" style="width:240px;">
	<label class="xui-form-label xui-form-label_<?php echo $key; ?>"><?php echo $key; ?></label><br>
	<input type="text" id="autocomplete_<?php echo $key; ?>" value="" class="xui-form-text xui-form-text_<?php echo $key; ?>"<?php echo $disabled; ?> autocomplete="off" style="width:100%;"></input>
</div>
<br />
<?php

$script.="$(\"#autocomplete_".$key."\").autocompleter({";
if($key==="primary"){
	$script.="source: \"".$this->requestUriThis(array("action"=>"data","ajax"=>"1"))."\",";
}else{
	$script.="source: data,";
};
$script.="delay: 300,";
$script.="highlightMatches: true,";
$script.="limit: 10,";
$script.="cache: false,";
$script.="customClass:[\"xui-form-autocompleter\"]";
$script.="});";

?>

<?php }; ?>

</form>
</div>

<?php 
$this->setHtmlJsSourceOrAjax($script,"load");
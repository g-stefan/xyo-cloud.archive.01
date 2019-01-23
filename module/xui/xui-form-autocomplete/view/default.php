<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");
?>

<?php $xuiContext=&$this->getModule("xui-context"); ?>

<?php

$script="";

?>

<?php foreach($xuiContext->context as $context){ ?>
<?php $disabled=($context=="disabled")?" disabled=\"disabled\"":""; ?>
<div class="xui text -label-40">
	Form - Autocomplete - <?php echo ucfirst($context); ?>
</div>
<form style="position:relative;width:480px;">
	<input class="xui form-text -<?php echo $context; ?>" type="text" id="autocomplete-<?php echo $context; ?>" name="autocomplete-<?php echo $context; ?>" value=""<?php echo $disabled; ?> autocomplete="off"></input>
</form>

<?php

$script.="$(\"#autocomplete-".$context."\").autocompleter({";
$script.="source: \"".$this->requestUriThis(array("action"=>"data","ajax"=>"1"))."\",";
$script.="delay: 300,";
$script.="highlightMatches: true,";
$script.="limit: 10,";
$script.="cache: false,";
$script.="customClass:[\"xui-form-autocomplete\"]";
$script.="});";

?>

<?php }; ?>	

<?php

$this->setHtmlJsSourceOrAjax($script,"load");

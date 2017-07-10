<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$path = $this->getParameter("path", array());
$allOk = true;
foreach ($path as $key => $value) {
	if ($value == "yes") {
		continue;
	};
	$allOk = false;
	break;
};			

?>
<form name="<?php $this->eFormName(); ?>" method="POST" action="<?php $this->eFormAction(); ?>" >
		    <div class="btn-group pull-right">
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("back"); ?>" value="<?php $this->eLanguage("cmd_back"); ?>" />
                    	<input type="submit" class="btn btn-default" name="<?php $this->eElementName("try"); ?>" value="<?php $this->eLanguage("cmd_try"); ?>" />
                    	<input type="submit" class="btn btn-primary" name="<?php $this->eElementName("next"); ?>" value="<?php $this->eLanguage("cmd_next"); ?>" <?php if(!$allOk){echo "disabled=\"disabled\" ";}; ?>/>
		   </div>
<div class="clearfix"></div>
<br />

<?php if($allOk){ ?>
	<?php $this->generateViewLanguage("msg-check-ok"); ?>
<?php }else{ ?>
	<?php $this->generateViewLanguage("msg-check-error"); ?>
	<ul class="list-group">
<?php

		foreach ($path as $key => $value) {
			if ($value == "yes") {
				continue;
			};
			echo "<li class=\"list-group-item list-group-item-danger\">";
                        echo $key;
			echo "<span class=\"glyphicon glyphicon-remove pull-right\"></span>";
                        echo "</li>";
		};

?>
	</ul>
<?php }; ?>

<?php
                    $this->eFormRequest(array(
                        "back" => "licence",
                        "this" => "check",
                        "next" => "datasource",
                        "website_language" => $this->getSystemLanguage()
                    ));
?>
</form>

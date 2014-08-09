<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->isError("error")) {
    $msgLang = "error_unknown";
    $msgTxt = "";
    $err = $this->getError("error");
    if ($err) {
        if (is_array($err)) {
            reset($err);
            $msgLang = key($err);
            $msgTxt = current($err);
        } else {
            $msgLang = $err;
        }
    }
?>
	<div class="alert alert-danger" role="alert">
		<b><?php $this->eLanguage($msgLang); ?></b> <?php echo $msgTxt; ?> 	
	</div>
<?php
};


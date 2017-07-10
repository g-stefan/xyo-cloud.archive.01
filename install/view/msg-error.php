<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

if ($this->isError()) {
    $msgLang = "error_unknown";
    $msgTxt = "";
    $err = $this->getError();
    if ($err) {
        if (is_array($err)) {
            reset($err);
            $msgLang = key($err);
            $msgTxt = current($err);
        } else {
            $msgLang = $err;
        }
    }
    if($msgLang === "element"){
	return;
    };
?>
	<div class="alert alert-danger" role="alert">
		<b><?php $this->eLanguage($msgLang); ?></b> <?php echo $msgTxt; ?> 	
	</div>
<?php
};


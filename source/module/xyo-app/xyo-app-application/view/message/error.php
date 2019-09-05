<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

if ($this->isError()) {
    $msgLang = "error_unknown";
    $msgTxt = "";
    $msg = $this->getError();
    if ($msg) {
        if (is_array($msg)) {
            reset($msg);
            $msgLang = key($msg);
            $msgTxt = current($msg);
        } else {
            $msgLang = $msg;
        }
    }
    if($msgLang === "element"){	
	return;
    };

    ?>
<div class="xui alert -danger">
        <?php if (strlen($msgTxt)) { ?>
		<strong><?php $this->eLanguage($msgLang); ?></strong>
		<?php echo $msgTxt; ?>
	<?php } else { ?>
		<?php $this->eLanguage($msgLang); ?>
	<?php } ?>
</div>
<?php
};

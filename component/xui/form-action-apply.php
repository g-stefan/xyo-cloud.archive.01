<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
$onClick = $this->getArgument("click","this.form.submit();");

?>
<div style="margin-top:8px;margin-bottom:8px;overflow:hidden;height:1px;background-color:#C2CEE1;"></div>
<button type="button" class="xui-form-button xui-form-button_primary xui_right" onclick="<?php echo $onClick; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php $this->eLanguage("label_button_apply"); ?>&nbsp;&nbsp;&nbsp;&nbsp;</button>
<div class="xui-separator"></div>
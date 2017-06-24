<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$label=$this->getArgument("label",$this->getParameter("form_submit_label"));

?>
<button type="submit" class="btn btn-success"><?php echo $label; ?></button>

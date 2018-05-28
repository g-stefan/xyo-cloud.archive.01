<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');
?>
<div style="padding:32px;">
<?php foreach($this->theme as $context=>&$value){?>
<?php echo $context; ?>
<hr>
<br>
normal
&nbsp;&nbsp;&nbsp;&nbsp;
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["normal"]["color.high"]; ?>;color:<?php echo $value["normal"]["color.contrast"]; ?>;">X</span>
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["normal"]["color"]; ?>;color:<?php echo $value["normal"]["color.contrast"]; ?>;">X</span>
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["normal"]["color.low"]; ?>;color:<?php echo $value["normal"]["color.contrast"]; ?>;">X</span>
&nbsp;&nbsp;&nbsp;&nbsp;
active
&nbsp;&nbsp;&nbsp;&nbsp;
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["active"]["color.high"]; ?>;color:<?php echo $value["active"]["color.contrast"]; ?>;">X</span>
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["active"]["color"]; ?>;color:<?php echo $value["active"]["color.contrast"]; ?>;">X</span>
<span style="padding:16px;line-height:32px;background-color:<?php echo $value["active"]["color.low"]; ?>;color:<?php echo $value["active"]["color.contrast"]; ?>;">X</span>
<br>
<br>
<br>
<?php }; ?>
</div>
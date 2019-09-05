<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");


?>

<br>
<br>

<?php
$this->generateComponent("xui.box-1x1-begin");
$this->generateComponent("xui.panel-begin",array("title-text"=>"XYO Cloud - version ".$this->cloud->get("xyo_cloud_version")));

?>
    Copyright (c) 2018-2019 Grigore Stefan &lt;<a href="mailto:g_stefan@yahoo.com" target="_blank">g_stefan@yahoo.com</a>&gt;<br/>
    Created by Grigore Stefan &lt;<a href="mailto:g_stefan@yahoo.com" target="_blank">g_stefan@yahoo.com</a>&gt;<br/>
    MIT License (MIT) &lt;<a href="http://opensource.org/licenses/MIT" target="_blank">http://opensource.org/licenses/MIT</a>&gt;<br/>
    <br/>
    This product includes PHP software, freely available from &lt;<a href="http://www.php.net/software/">http://www.php.net/software/</a>&gt;<br/>
    <br/>
    This product may include software endorsed with following licenses:
    <ul style="margin-top:2px;">
        <li>MIT License (MIT)</li>
        <li>PHP License version 3.01</li>
        <li>The BSD License</li>
        <li>GNU Lesser General Public License (GNU LGPL) version 2.1</li>
        <li>SIL OPEN FONT LICENSE Version 1.1</li>
	<li>Apache License, Version 2.0</li>
    </ul>
    Full text can be read <a href="licenses.txt" target="_blank">here</a>.<br/>
    <br />
    This product includes icons created by Tango Desktop Project &lt;<a href="http://tango.freedesktop.org/" target="_blank">http://tango.freedesktop.org/</a>&gt;<br/>
    <br />
    <?php

    $list = $this->getGroup("xyo-info-about");
    foreach ($list as $value) {
        echo "<div style=\"overflow:hidden;width:auto;height:1px;margin-top:6px;margin-bottom:6px;clear:both;border-bottom:1px solid #ccc;\"></div>";
        $this->generateViewFromModule($value,"info-about");
    }

?>

<?php

$this->generateComponent("xui.panel-end");
$this->generateComponent("xui.box-1x1-end");
    
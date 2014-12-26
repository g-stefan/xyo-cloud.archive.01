<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

echo "<a class=\"widget-user-form\" href=\"".$this->requestUriModule("xyo-com-user-form", array("stamp"=>md5(time().rand())))."\"><div class=\"pull-left\"  style=\"position:relative;width:2em;height:1em;margin-right:3px;\"><i class=\"fa fa-unlock-alt\" style=\"font-size:24px;position:absolute;top:-3px;\"></i></div></a>";

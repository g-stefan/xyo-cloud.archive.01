<?php
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

$this->ejsBegin();
echo "\$(\"#xyo-app-table-modal-edit\").iziModal(\"close\");";
echo "doCommand(\"table-view\");";
$this->ejsEnd();

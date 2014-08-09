<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$mode = $this->getRequest("mode");
if ($mode) {

} else {
    $this->doRedirect("package");
    return;
}
$package = $this->getRequest("package");
if ($mode === "single") {
    if ($package === "*") {
        $this->doRedirect("package");
        return;
    }
}
if ($mode === "all") {
    $modSetup = &$this->getModule("xyo-mod-setup");
    if ($modSetup) {
        $path = $this->cloud->get("path_base") . "package/";
        $list = $modSetup->getPackageList2($path);
        if (count($list)) {

        } else {
            $this->doRedirect("package");
            return;
        }
    }
}
$this->setView("require");

<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$fileName = $this->cloud->get("path_base") . "config/config.website.php";
$fileHandle = null;
if (strlen($fileName)) {
    $fileHandle = fopen($fileName, "w");
};

if ($fileHandle) {
    fwrite($fileHandle, "<" . "?" . "php\r\n");
    fwrite($fileHandle, "defined('XYO_CLOUD') or die('Access is denied');\r\n");
    fwrite($fileHandle, "// \r\n");
    fwrite($fileHandle, "// Website Config\r\n");
    fwrite($fileHandle, "// \r\n");
    fwrite($fileHandle, "\$this->set(\"system_configured\",true);\r\n");
    fwrite($fileHandle, "\$this->set(\"system_datasource_layer\",\"" .
            $this->cloud->get("system_datasource_layer", "xyo-mod-datasource-xyo") .
            "\");\r\n");
    fwrite($fileHandle, "\$this->set(\"system_default_language\",\"" . $this->getSystemLanguage() . "\");\r\n");
    fwrite($fileHandle, "\r\n\r\n");
    fclose($fileHandle);
} else {
    $this->setError("error", array("config_file_not_writable" => $fileName));
}


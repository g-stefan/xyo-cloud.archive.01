<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$layer = $this->getElementValue("layer", "xyo");

$configFileName = null;
$fileName = "config/config.ds.db.php";
$moduleName = "";
if ($layer === "xyo") {    
    $moduleName = "xyo-mod-datasource-xyo";
} else
if ($layer === "csv") {
    $moduleName = "xyo-mod-datasource-csv";
} else
if ($layer === "mysql") {
    $moduleName = "xyo-mod-datasource-mysql";
} else
if ($layer === "postgresql") {
    $moduleName = "xyo-mod-datasource-postgresql";
} else
if ($layer === "sqlite") {
    $moduleName = "xyo-mod-datasource-sqlite";
} else {
    $this->setError("error", array("unknown_layer" => $layer));
    return;
}

$configFileName = $fileName;

$this->setParameter("config_file", $configFileName);

$fileHandle = null;
if ($fileName) {
    $fileHandle = fopen($fileName, "w");
};

if ($fileHandle) {
    fwrite($fileHandle, "<" . "?" . "php\r\n");
    fwrite($fileHandle, "defined('XYO_CLOUD') or die('Access is denied');\r\n");
    fwrite($fileHandle, "// \r\n");
    fwrite($fileHandle, "// Data Source Layer Config\r\n");
    fwrite($fileHandle, "// \r\n");

    if ($layer === "xyo") {
        fwrite($fileHandle, "\$this->setConnection" .
                "(\"db\"," .
                "\"repository/datasource/db/\");" .
                "\r\n");
    } else
    if ($layer === "csv") {
        fwrite($fileHandle, "\$this->setConnection" .
                "(\"db\"," .
                "\"repository/datasource/db/\");" .
                "\r\n");
    } else
    if ($layer === "mysql") {
        fwrite($fileHandle, "\$this->setConnection(" .
                "\"db\",\"" .
                addslashes($this->getElementValueStr("username")) .
                "\",\"" .
                addslashes($this->getElementValueStr("password")) .
                "\",\"" .
                addslashes($this->getElementValueStr("server")) .
                "\",\"" .
                addslashes($this->getElementValueStr("port")) .
                "\",\"" .
                addslashes($this->getElementValueStr("database")) .
                "\",\"" .
                addslashes($this->getElementValueStr("prefix")) .
                "\");\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(" .
                "\"db\",\"debug\",true);\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(" .
                "\"db\",\"log\",false);\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(" .
                "\"db\",\"force_use\",false);\r\n");
    } else
    if ($layer === "postgresql") {
        fwrite($fileHandle, "\$this->setConnection(" .
                "\"db\",\"" .
                addslashes($this->getElementValueStr("username")) .
                "\",\"" .
                addslashes($this->getElementValueStr("password")) .
                "\",\"" .
                addslashes($this->getElementValueStr("server")) .
                "\",\"" .
                addslashes($this->getElementValueStr("port")) .
                "\",\"" .
                addslashes($this->getElementValueStr("database")) .
                "\",\"" .
                addslashes($this->getElementValueStr("prefix")) .
                "\");\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(" .
                "\"db\",\"debug\",true);\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(" .
                "\"db\",\"log\",false);\r\n");
    } else
    if ($layer === "sqlite") {
        fwrite($fileHandle, "\$this->setConnection(\"db\"," .                
                ".\"repository/datasource/db." . md5(date("l jS \of F Y h:i:s A")) . ".sqlite\",0666);\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(\"db\",\"debug\"," .
                "true);\r\n");
        fwrite($fileHandle, "\$this->setConnectionOption(\"db\",\"log\"," .
                "false);\r\n");
    };

    fwrite($fileHandle, "\r\n\r\n");
    fclose($fileHandle);
} else {
    $this->setError("error", array("config_not_writable" => $fileName));
    return;
}

$fileName = "config/config.ds.php";
$fileHandle = null;
if (strlen($fileName)) {
    $fileHandle = fopen($fileName, "w");
};

if ($fileHandle) {
    fwrite($fileHandle, "<" . "?" . "php\r\n");
    fwrite($fileHandle, "defined('XYO_CLOUD') or die('Access is denied');\r\n");
    fwrite($fileHandle, "// \r\n");
    fwrite($fileHandle, "// DataSource Config\r\n");
    fwrite($fileHandle, "// \r\n");
	fwrite($fileHandle, "\$this->setDataSourceDescriptor(\"db.table.xyo_datasource\",\"datasource/db.table.xyo_datasource.php\");\r\n");
    fwrite($fileHandle, "// \r\n");
    fwrite($fileHandle, "\$this->setDataSourceConnectionProvider(\"quantum\",\"xyo-mod-datasource-quantum\");\r\n");
    fwrite($fileHandle, "\$this->setDataSourceConnectionProvider(\"db\",\"".$moduleName."\");\r\n");
    fwrite($fileHandle, "\r\n\r\n");
    fclose($fileHandle);
} else {
    $this->setError("error", array("config_not_writable" => $fileName));
    return;
}




$fileName = "config/config.website.php";
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
    fwrite($fileHandle, "\$this->set(\"system_configured\",false);\r\n");
    fwrite($fileHandle, "\$this->set(\"system_datasource_layer\",\"" .
            $moduleName .
            "\");\r\n");
    fwrite($fileHandle, "\r\n\r\n");
    fclose($fileHandle);

    $this->cloud->set("system_datasource_layer", $moduleName);
} else {
    $this->setError("error", array("config_not_writable" => $fileName));
    return;
}

$moduleDatasourceLayer = null;
$layerModule = $this->cloud->get("system_datasource_layer");
$moduleDatasourceLayer = &$this->cloud->getModule($layerModule);
if ($moduleDatasourceLayer) {
    
} else {
    $this->setError("error", array("unknown_layer" => $layer));
    return;
};

$modDs=&$this->cloud->getModule("xyo-mod-datasource");
$modDs->includeConfig("config.ds");


$this->cloud->set("system_datasource_loader", "xyo-mod-ds-loader-ds");
$moduleDatasourceLayer->includeFile($configFileName);

if ($this->isError()) {
    
} else {


    $conDb = &$moduleDatasourceLayer->getConnection("db");
    if ($conDb) {
        if ($conDb->open()) {
            $conDb->close();
        } else {
            $this->setError("error", array("connection_error" => "db"));
            return;
        }
    } else {
        $this->setError("error", array("connection_unknown" => "db"));
        return;
    }
}


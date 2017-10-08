<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

//
// Execute an module from current directory, to be used as service (not for web)
//
// - string $xyoCloudServiceModuleName (optional) Module name to be "seen"
//      by the system, default to "-xyo-mod-service-"
// Example:
//      in service.php
//      $xyoClud...  - options
//      include([path to "xyo-cloud-service.php" ]);
//
// Another example:
//      in application.php - main module script
//
//      $xyoClud...  - options
//	include([path to "xyo-cloud-service.php" ]);
//	defined('XYO_CLOUD') or die('Access is denied');
//
//      ... module code ...
//

//
// Options
//
//	$xyoCloudServiceRequestMain
//	$xyoCloudServiceSite
//	$xyoCloudServiceModuleName
//

if (defined('XYO_CLOUD')) {
	return;
};
define("XYO_CLOUD_SERVICE", 1);

require_once("xyo-cloud.php");
$pathBaseAbsolute=realpath(dirname(realpath(__FILE__))."/../");
$currentDirectory=getcwd();
@chdir($pathBaseAbsolute);

$xyoCloud = new xyo_Cloud();
defined('XYO_CLOUD') or die('Access is denied');

if(isset($xyoCloudServiceSite)) {
	$xyoCloud->set("site",$xyoCloudServiceSite);
};
if(isset($xyoCloudServiceRequestMain)) {
	$xyoCloud->set("request_main",$xyoCloudServiceRequestMain);
};

if (!isset($xyoCloudServiceModuleName)) {
	$xyoCloudServiceModuleName = "-service-";
};

$run=$xyoCloud->getRequest("run", $xyoCloudServiceModuleName);
if($run==$xyoCloudServiceModuleName) {
	$xyoCloud->setModule(null, $currentDirectory, $xyoCloudServiceModuleName, true, null, false, true);
	$xyoCloud->setModuleCheck($xyoCloudServiceModuleName, false);
	$xyoCloud->setRequest("run", $xyoCloudServiceModuleName);
};
$xyoCloud->main();

@chdir($currentDirectory);
//
// Force exit
//
exit();

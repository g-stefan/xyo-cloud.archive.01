<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

//
// Execute an module/component from current directory
//
// - string $xyoCloudExec (optional) File to use as "router",
//      default to who included this file.
// - string $xyoCloudExecCore(optional) Core of the system,
//      default to "public"
// - string $xyoCloudExecModuleName (optional) Module name to be "seen"
//      by the system, default to "-xyo-exec-"
// - string $xyoCloudExecModuleGroup (optional) Module group,
//      default to null
// - bool $xyoCloudExecModuleAsRequest (optional) Execute module as request,
//      default to false
// - bool $xyoCloudExecModuleAsComponentRequest (optional) Execute module as component request,
//      default to false
// - bool $xyoCloudExecModuleAsComponent (optional) Execute module as component,
//      default to false
//
// Example:
//      in index.php
//      $xyoClud...  - options
//      include([path to "xyo-cloud-exec.php" ]);
//
if (defined('XYO_CLOUD')) {
	$xyoCloudExec = null;
	return;
};
define("XYO_CLOUD_EXEC", 1);

if (isset($xyoCloudExec)) {

} else {
	$caller = debug_backtrace();
	$caller = $caller[0];
	$xyoCloudExec = $caller["file"];
};

require_once("xyo-cloud.php");

$path_separator = "/";
$cloud_path = explode($path_separator, __FILE__);
if (count($cloud_path) == 1) {
	if ($cloud_path[0] === __FILE__) {
		$path_separator = "\\";
		$cloud_path = explode($path_separator, __FILE__);
	};
};
if (count($cloud_path) > 1) {
	$cloud_path = array_chunk($cloud_path, count($cloud_path) - 2);
	$cloud_path = $cloud_path[0];
} else {
	$cloud_path__xyo = null;
	$cloud_path = null;
};


$exec_path = explode($path_separator, $xyoCloudExec);
if (count($exec_path) > 1) {
	$exec_path = array_chunk($exec_path, count($exec_path) - 1);
	$exec_path = $exec_path[0];
} else {
	$exec_path = null;
};

$path = array();
$path__abs = array();
$path__mod = array();
$a = count($exec_path);
$b = count($cloud_path);

for ($k = 0; ($k < $a) && ($k < $b); ++$k) {
	if ($exec_path[$k] === $cloud_path[$k]) {
		$path__abs[] = $cloud_path[$k];
	} else {
		break;
	};
};
$m = $k;
for ($k = $m; $k < $a; ++$k) {
	$path[] = "..";
};
for ($k = $m; $k < $b; ++$k) {
	$path[] = $cloud_path[$k];
};

if ($m < $a) {
	if ($exec_path[$m] == "module") {
		for ($k = $m + 1; $k < $a; ++$k) {
			$path__mod[] = $exec_path[$k];
		};
	} else {
		$path__mod[] = "..";
		for ($k = $m; $k < $b; ++$k) {
			$path__mod[] = "..";
		};
		for ($k = $m; $k < $a; ++$k) {
			$path__mod[] = $exec_path[$k];
		};
	};
};

$cloud_path = implode("/", $path) . "/";
$cloud_path__absolute = implode($path_separator, $path__abs) . $path_separator;
$module_path = implode("/", $path__mod);

$xyoCloud = new xyo_Cloud($cloud_path__absolute, $cloud_path);
defined('XYO_CLOUD') or die('Access is denied');

if (!isset($xyoCloudExecCore)) {
	$xyoCloudExecCore = "public";
};

$path_separator = "/";
$request_main = explode($path_separator, $xyoCloudExec);
if (count($request_main) == 1) {
	if ($request_main[0] === $xyoCloudExec) {
		$path_separator = "\\";
		$request_main = explode($path_separator, $xyoCloudExec);
	};
};
if (count($request_main)) {
	$request_main = $request_main[count($request_main) - 1];
} else {
	$request_main = "index.php";
};

$xyoCloud->set("request_main", $request_main);
$xyoCloud->set("system_core", $xyoCloudExecCore);


if (!isset($xyoCloudExecModuleName)) {
	$xyoCloudExecModuleName = "-xyo-exec-";
};

if (!isset($xyoCloudExecModuleGroup)) {
	$xyoCloudExecModuleGroup = null;
};

$xyoCloud->setModule(null, $module_path, $xyoCloudExecModuleName, true, null, false, true);
$xyoCloud->setModuleCheck($xyoCloudExecModuleName, true);
if ($xyoCloudExecModuleGroup) {
	$xyoCloud->setModuleGroup($xyoCloudExecModuleName, $xyoCloudExecModuleGroup);
};
if (!isset($xyoCloudExecModuleAsRequest)) {
	$xyoCloudExecModuleAsRequest = false;
};
if (!isset($xyoCloudExecModuleAsComponentRequest)) {
	$xyoCloudExecModuleAsComponentRequest = false;
};
if (!isset($xyoCloudExecModuleAsComponent)) {
	$xyoCloudExecModuleAsComponent = false;
};
if ($xyoCloudExecModuleAsComponent) {
	$xyoCloud->setModuleAsComponent($xyoCloudExecModuleName, true);
	$xyoCloud->setComponent($xyoCloudExecModuleName);
};
if ($xyoCloudExecModuleAsRequest || $xyoCloudExecModuleAsComponentRequest) {
	$mode_ = "run";
	$xyoCloud->setRequest($mode_, $xyoCloudExecModuleName);
};
$xyoCloud->main();


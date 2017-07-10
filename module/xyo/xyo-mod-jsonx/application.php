<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

//
//  input
//
//  {
//      "run"=>"module",
//      "model"=>"name",      		- optional, if not set default model called
//      "parameters":{        		- optional
//             "name1":"value1",
//             "name2":"value2", ...
//      }
//  }
//

//
//  Execute model from module, return value must be set in $this->returnValue
//

header("Content-Type: application/json");

$request = json_decode(file_get_contents("php://input"),true);

if(!$request){
	$result="{}\r\n";
	header("Content-Length: ".strlen($result));
	echo $result;
	return;
};
if(!array_key_exists("run",$request)){
	$result="{}\r\n";
	header("Content-Length: ".strlen($result));
	echo $result;
	return;
};
$module_=trim($request["run"]);
$module=$this->cloud->loadModuleExecPath_($module_);
if(!$module){
	$result="{}\r\n";
	header("Content-Length: ".strlen($result));
	echo $result;
	return;
};
$moduleX=&$this->getModule($module);
if(!$moduleX){
	$result="{}\r\n";
	header("Content-Length: ".strlen($result));
	echo $result;
	return;
};
$this->cloud->setRequest("run",$module_);
$this->cloud->setRequest("ajax",1);
$parameters=array();
if(array_key_exists("parameters",$request)){
	$parameters=$request["parameters"];
	foreach($request["parameters"] as $key=>$value){
		$this->cloud->setRequest($key,$value);
	};
};
$model="default";
if(array_key_exists("model",$request)){
	$model=trim($request["model"]);
};

$moduleX->applicationInit();

$moduleX->callFromThis("model/".$model, $parameters);

$result=json_encode($moduleX->getReturnValue());
header("Content-Length: ".strlen($result));
echo $result;
                            
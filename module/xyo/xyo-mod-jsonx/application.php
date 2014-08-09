<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
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
//      "procedure"=>"name",      - optional
//      "parameters":{            - optional
//             "name1":"value1",
//             "name2":"value2", ...
//      }
//  }
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

$retV=$moduleX->callFromThis("model/".$model, $parameters, true, true);

$result=json_encode($retV);
header("Content-Length: ".strlen($result));
echo $result;

                            
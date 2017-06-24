<?php
//
// Copyright (c) 2014 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$this->processModel("datasource-layer");

$connection=$this->getParameterRequest("connection",null);
$date=$this->getParameterRequest("date",null);
$stamp=$this->getParameterRequest("stamp",null);

$layer_module=$this->getParameter("layer_module",null);
$layer_config=$this->getParameter("layer_config",null);
$layer=$this->getParameterRequest("layer",null);

if($layer
&&$layer_module
&&$layer_config
&&$connection){}else{	
	return;
};

$moduleDatasourceLayer = &$this->getModule($layer_module);
if($moduleDatasourceLayer){
}else{
    return;
};

$this->cloud->dataSource->setDataSourceConnectionProvider("backup",$layer_module);
$moduleDatasourceLayer->includeFile($layer_config);

$index1=1*$this->getParameterRequest("index1",0);
$index2=1*$this->getParameterRequest("index2",0);
$step2=1*$this->getParameterRequest("step2",100);
if($step2){}else{$step2=64;};

$dsList = array();
$dsListIndex=0;
$list = array();
$path="datasource";
if (!$dh = @opendir($path)){
}else{
	while (false !== ($obj = readdir($dh))) {
		if ($obj == '.' || $obj == '..') {
			continue;
		};
		if (is_dir($path . $obj)) {
		} else {
			array_push($list, $obj);
		};
	};
	closedir($dh);
};

$connectionX=$connection.".table.";

foreach($list as $value){
	if(strncmp($value,$connectionX,strlen($connectionX))==0){
		$valueX=str_replace(".php","",$value);
		$dsList[$dsListIndex]=$valueX;
		$dsListIndex++;
	};
};

$count1=$dsListIndex;
$next_index1=$index1;
$next_index2=($index2+$step2);
$count2=0;

if($index1<$dsListIndex){

    $ok=false;
	$skip_=true;
	$matches = array();
    if(preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/",$dsList[$index1], $matches)){
    	if(count($matches) > 3) {
			if($matches[1]==$connection){
			$skip_=false;

	$dsProcess=&$this->getDataSource($dsList[$index1]);
	if($dsProcess){
		if($dsProcess->getType()==="table"){
			$descriptor=$this->cloud->dataSource->getDataSourceDescriptor($dsList[$index1]);
			$oldSource=explode(".",$dsList[$index1]);
			$newDatasource="backup.".$oldSource[1].".".$oldSource[2];
			$this->cloud->dataSource->setDataSourceDescriptor($newDatasource,$descriptor);
			$moduleDatasourceLayer->setDataSourceDescriptor($newDatasource,$descriptor);
			$dsProcessBackup=$moduleDatasourceLayer->getDataSource($newDatasource);

			if($dsProcessBackup){				
			}else{
				return;
			};

			if($index2){
			}else{
				$dsProcessBackup->recreateStorage();
			};

			$dsProcess->clear();
			$count2=$dsProcess->count();
			if($dsProcess->load($index2,$step2)){
				for(;$dsProcess->isValid();$dsProcess->loadNext()){
					$dsProcessBackup->clear();
					$dsProcess->transferTo($dsProcessBackup);
					$dsProcessBackup->insert();
				}
				$ok=true;
			}
		}
	}

			}
		}
	}

	if($ok){
	}else{
		$next_index1+=1;
		$next_index2=0;
		$count2=0;
	};


	if($count2){}else{$count2=1;$index2=1;};
	if($index2>$count2){
		$index2=$count2;
	};
			
	echo "progressBarSetProcent1(".floor(($index1*100)/$count1).");";
	echo "progressBarSetProcent2(".floor(($index2*100)/$count2).");";
	
	if($next_index2){}else{
		if($skip_){
		}else{
			echo "statusInfo(\"".$dsList[$index1]."\");";
		};
	
		if($next_index1<$dsListIndex){
				echo "progressBarSetProcent1(".floor(($next_index1*100)/$count1).");";
				echo "progressBarSetProcent2(0);";
		};
	};	

?>
	$.ajax({
		type: "POST",
		url: "<?php

echo $this->requestUriThis(array(
		"action"=>"backup-step",
		"index1"=>$next_index1,
		"index2"=>$next_index2,
		"step2"=>$step2,
		"layer"=>$layer,
		"date"=>$date,
		"stamp"=>$stamp,
		"connection"=>$connection,
		"ajax-js"=>1
));
		  ?>",
		success:function(result){
			eval(result);
		}
	});

<?php
}else{
	echo "progressBarSetProcent1(100);";
	echo "progressBarSetProcent2(100);";
	echo "statusInfo(\"".$this->getFromLanguage("msg_done").".\");";
};


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

$modDs=&$this->getModule("xyo-mod-datasource");
$modDs->setDataSourceConnectionProvider("backup",$layer_module);
$moduleDatasourceLayer->includeFile($layer_config);

$index1=1*$this->getParameterRequest("index1",0);
$index2=1*$this->getParameterRequest("index2",0);
$step2=1*$this->getParameterRequest("step2",100);
if($step2){}else{$step2=64;};

$dsList=&$this->getDataSource("db.table.xyo_datasource");
$dsList->clear();
$dsList->setOrder("id",1);
$count1=$dsList->count();
$next_index1=$index1;
$next_index2=($index2+$step2);
$count2=0;

if($dsList->load($index1,1)){

    $ok=false;
	$skip_=true;
	$matches = array();
    if(preg_match("/([^\\.]*)\\.([^\\.]*)\\.([^\\.]*)/",$dsList->name, $matches)){
    	if(count($matches) > 3) {
			if($matches[1]==$connection){
			$skip_=false;

	$dsProcess=&$this->getDataSource($dsList->name);
	if($dsProcess){
		if($dsProcess->getType()==="table"){
			$descriptor=$this->dataSourceProvider->getDataSourceDescriptor($dsList->name);
			$oldSource=explode(".",$dsList->name);
			$newDatasource="backup.".$oldSource[1].".".$oldSource[2];
			$this->dataSourceProvider->setDataSourceDescriptor($newDatasource,$descriptor);
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
			echo "statusInfo(\"".$dsList->name."\");";
		};
		$dsList->clear();
		if($dsList->load($next_index1,1)){
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


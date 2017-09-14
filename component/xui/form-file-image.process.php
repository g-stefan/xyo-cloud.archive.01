<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

$element = $this->getArgument("element");

$fileName = $this->getArgument("filename","");
$extension = $this->getArgument("extension",false);
$deleteBeforeSave = $this->getArgument("delete_before_save",false);
$elementName = $this->getElementName($element);
$isOk=false;
if(strlen($fileName)){
	if(array_key_exists($elementName,$_FILES)){
		if(1*$_FILES[$elementName]["error"]){
			if(strlen($_FILES[$elementName]["name"])){
				$this->setElementError($element, $this->getFromLanguage("el_".$element."_file_upload_error"));
			};
		}else{
			if($extension){
				$fileName.=".".strtolower(pathinfo($_FILES[$elementName]["name"], PATHINFO_EXTENSION));
			};
			if (move_uploaded_file($_FILES[$elementName]["tmp_name"], $fileName)) {
				if($deleteBeforeSave){
					$fileDelete=$this->getElementValue($element."_file","");
					if(strlen($fileDelete)){
						$readonly=$this->getArgument("readonly",array());
						$toDel=true;
						foreach($readonly as $key=>$value){
							if($value===$fileDelete){
								$toDel=false;
								break;
							};
						};
						if($fileName===$fileDelete){
							$toDel=false;
						};
						if($toDel){
							if(file_exists($fileDelete)){
								@unlink($fileDelete);
							};
						};
					};
				};
				$this->setElementValue($element."_delete",0);
				$isOk=true;
			} else {
				$this->setElementError($element, $this->getFromLanguage("el_".$element."_file_upload_move_error"));
			};
		};
	};
};

$isDeleted=false;
$elementDelete = $this->getElementValue($element."_delete");
if(strlen($elementDelete)){	
	if(1*$elementDelete==1){
		$fileDelete=$this->getElementValue($element."_file","");
		$readonly=$this->getArgument("readonly",array());
		$toDel=true;
		foreach($readonly as $key=>$value){
			if($value===$fileDelete){
				$toDel=false;
				break;
			};
		};
		if($toDel){
			if(file_exists($fileDelete)){
				@unlink($fileDelete);
			};
		};
		$this->setElementValue($element,"");
		$isOk=true;
		$isDeleted=true;
	};
};

if(!$isOk){
	$value=$this->getElementValue($element."_value","");
	$this->setElementValue($element,$value);
	$list=str_getcsv($value,",","\"","\\");
	$fileName=$list[0];
};

$this->setElementValue($element."_offset_x",number_format(1*$this->getElementValue($element."_offset_x",0),0,".",""));
$this->setElementValue($element."_offset_y",number_format(1*$this->getElementValue($element."_offset_y",0),0,".",""));
$this->setElementValue($element."_zoom",number_format($this->getElementValue($element."_zoom",1),4,".",""));
$this->setElementValue($element."_width",number_format(1*$this->getElementValue($element."_width",320),0,".",""));
$this->setElementValue($element."_height",number_format(1*$this->getElementValue($element."_height",240),0,".",""));
$this->setElementValue($element."_view_x",number_format(1*$this->getElementValue($element."_view_x",320),0,".",""));
$this->setElementValue($element."_view_y",number_format(1*$this->getElementValue($element."_view_y",240),0,".",""));

if(!$isDeleted){
	$value="\"".$fileName."\",";
	$value.=$this->getElementValue($element."_offset_x").",";
	$value.=$this->getElementValue($element."_offset_y").",";
	$value.=$this->getElementValue($element."_zoom").",";
	$value.=$this->getElementValue($element."_width").",";
	$value.=$this->getElementValue($element."_height").",";
	$value.=$this->getElementValue($element."_view_x").",";
	$value.=$this->getElementValue($element."_view_y");
	$this->setElementValue($element,$value);
};




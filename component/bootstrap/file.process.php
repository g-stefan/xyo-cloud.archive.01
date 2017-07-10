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
$isOk=false;
$elementName = $this->getElementName($element);
$this->setElementValue($element,"");
if(strlen($fileName)){
	if(array_key_exists($elementName,$_FILES)){
		if(1*$_FILES[$elementName]["error"]){
			$this->setElementError($element, $this->getFromLanguage("el_".$element."_file_upload_error"));
		}else{
			if($extension){
				$fileName.=pathinfo($_FILES[$elementName]["name"], PATHINFO_EXTENSION);
			};
			if (move_uploaded_file($_FILES[$elementName]["tmp_name"], $fileName)) {
				if($deleteBeforeSave){
					$fileDelete=$this->getElementValue($element."_file","");
					if(strlen($fileDelete)){
						if(file_exists($fileDelete)){
							@unlink($fileDelete);
						};
					};
				};
				$this->setElementValue($element,$fileName);
				$isOk=true;
			} else {
				$this->setElementError($element, $this->getFromLanguage("el_".$element."_file_upload_move_error"));
			};
		};
	};
};

if(!$isOk){
	$this->setElementValue($element,$this->getElementValue($element."_file",""));	
};

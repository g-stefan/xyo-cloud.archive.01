<?php
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined('XYO_CLOUD') or die('Access is denied');

header("Content-type: text/plain");

?>
/*
//
//
//
*/

XUI.FormTextMaterial={};

(function(){

	var this_=this;

	/* --- */

	this.textMaterial={};

	/* --- */

	this.textMaterial.onFocus=function(event){
		var scan=this;	
		var nodeName;
		for(scan=scan.previousElementSibling;scan;scan=scan.previousElementSibling){
			nodeName=scan.nodeName.toLowerCase();
			if(nodeName==="label"){
				break;
			};
			if(nodeName==="textarea"){
				scan=null;
				break;
			};
		};
		if(scan!=null){			
			if(!scan.classList.contains("xui-form-text-material_has-value")){
				scan.classList.add("xui-form-text-material_has-value");
			};
			if(!scan.classList.contains("xui-form-text-material_focus")){
				scan.classList.add("xui-form-text-material_focus");
			};
		};
	};

	this.textMaterial.onBlur=function(event){
		var scan=this;	
		var nodeName;
		for(scan=scan.previousElementSibling;scan;scan=scan.previousElementSibling){
			nodeName=scan.nodeName.toLowerCase();
			if(nodeName==="label"){
				break;
			};
			if(nodeName==="input"){
				scan=null;
				break;
			};
		};
		if(scan!=null){
			if((""+this.value).length==0){
				if(scan.classList.contains("xui-form-text-material_has-value")){
					scan.classList.remove("xui-form-text-material_has-value");
				};
			};
			if(scan.classList.contains("xui-form-text-material_focus")){
				scan.classList.remove("xui-form-text-material_focus");
			};
		};
	};

	this.textMaterial.initElement=function(element){
		var scan=element;	
		var nodeName;
		for(scan=scan.previousElementSibling;scan;scan=scan.previousElementSibling){
			nodeName=scan.nodeName.toLowerCase();
			if(nodeName==="label"){
				break;
			};
			if(nodeName==="input"){
				scan=null;
				break;
			};
		};
		if(scan!=null){
			if(!scan.classList.contains("xui-form-text-material_active")){
				scan.classList.add("xui-form-text-material_active");
			};
		};
	};

	this.textMaterial.init=function(){
		var elList=XUI.getByClassName(document,"xui-form-text-material");
		for(var elIndex=0;elIndex < elList.length;++elIndex){
			var elListInput=elList[elIndex].getElementsByTagName("input");
			for(var elIndexInput=0;elIndexInput < elListInput.length;++elIndexInput){
				elListInput[elIndexInput].addEventListener("focus",this_.textMaterial.onFocus);
				elListInput[elIndexInput].addEventListener("blur",this_.textMaterial.onBlur);
				this.initElement(elListInput[elIndexInput]);
			};
		};
	};


	/* --- */

	this.init=function(){
		this.textMaterial.init();
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormTextMaterial);


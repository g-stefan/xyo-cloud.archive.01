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

XUI.FormTextareaMaterial={};

(function(){

	var this_=this;

	/* --- */

	this.textareaMaterial={};

	/* --- */

	this.textareaMaterial.onFocus=function(event){
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
			if(!scan.classList.contains("xui-form-textarea-material--has-value")){
				scan.classList.add("xui-form-textarea-material--has-value");
			};
			if(!scan.classList.contains("xui-form-textarea-material--focus")){
				scan.classList.add("xui-form-textarea-material--focus");
			};
		};
	};

	this.textareaMaterial.onBlur=function(event){
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
			if((""+this.value).length==0){
				if(scan.classList.contains("xui-form-textarea-material--has-value")){
					scan.classList.remove("xui-form-textarea-material--has-value");
				};
			};
			if(scan.classList.contains("xui-form-textarea-material--focus")){
				scan.classList.remove("xui-form-textarea-material--focus");
			};
		};
	};

	this.textareaMaterial.initElement=function(element){
		var scan=element;	
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
			if(!scan.classList.contains("xui-form-textarea-material--active")){
				scan.classList.add("xui-form-textarea-material--active");
			};
		};
	};

	this.textareaMaterial.init=function(){
		var elList=XUI.getByClassName(document,"xui-form-textarea-material");
		for(var elIndex=0;elIndex < elList.length;++elIndex){
			var elListTextArea=elList[elIndex].getElementsByTagName("textarea");
			for(var elIndexTextArea=0;elIndexTextArea < elListTextArea.length;++elIndexTextArea){
				elListTextArea[elIndexTextArea].addEventListener("focus",this_.textareaMaterial.onFocus);
				elListTextArea[elIndexTextArea].addEventListener("blur",this_.textareaMaterial.onBlur);
				this.initElement(elListTextArea[elIndexTextArea]);
			};
		};
	};


	/* --- */

	this.init=function(){
		this.textareaMaterial.init();
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormTextareaMaterial);


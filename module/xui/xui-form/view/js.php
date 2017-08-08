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

XUI.Form={};

(function(){

	var this_=this;

	/* --- */
	this.textMaterial={};

	this.textMaterial.onFocus=function(event){
		var scan=this;	
		var nodeName;
		for(scan=scan.previousElementSibling;scan;scan=scan.previousElementSibling){
			nodeName=scan.nodeName.toLowerCase();
			if(nodeName==="label"){
				break;
			};
			if((nodeName==="input")||(nodeName==="textarea")){
				scan=null;
				break;
			};
		};
		if(scan!=null){			
			if(!scan.classList.contains("xui-form__text-material--has-value")){
				scan.classList.add("xui-form__text-material--has-value");
			};
			if(!scan.classList.contains("xui-form__text-material--focus")){
				scan.classList.add("xui-form__text-material--focus");
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
			if((nodeName==="input")||(nodeName==="textarea")){
				scan=null;
				break;
			};
		};
		if(scan!=null){
			if((""+this.value).length==0){
				if(scan.classList.contains("xui-form__text-material--has-value")){
					scan.classList.remove("xui-form__text-material--has-value");
				};
			};
			if(scan.classList.contains("xui-form__text-material--focus")){
				scan.classList.remove("xui-form__text-material--focus");
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
			if((nodeName==="input")||(nodeName==="textarea")){
				scan=null;
				break;
			};
		};
		if(scan!=null){
			if(!scan.classList.contains("xui-form__text-material--active")){
				scan.classList.add("xui-form__text-material--active");
			};
		};

		var el = document.createElement("div");
		el.innerHTML = "";
		el.className = "xui-form__text-material__border";
		el.style.pointerEvents = "none";
		element.parentElement.appendChild(el);
	};

	this.textMaterial.init=function(){
		var elList=XUI.getByClassName(document,"xui-form__text-material");
		for(var elIndex=0;elIndex < elList.length;++elIndex){
			var elListInput=elList[elIndex].getElementsByTagName("input");
			for(var elIndexInput=0;elIndexInput < elListInput.length;++elIndexInput){
				elListInput[elIndexInput].addEventListener("focus",this_.textMaterial.onFocus);
				elListInput[elIndexInput].addEventListener("blur",this_.textMaterial.onBlur);
				this.initElement(elListInput[elIndexInput]);
			};
			var elListTextArea=elList[elIndex].getElementsByTagName("textarea");
			for(var elIndexTextArea=0;elIndexTextArea < elListTextArea.length;++elIndexTextArea){
				elListTextArea[elIndexTextArea].addEventListener("focus",this_.textMaterial.onFocus);
				elListTextArea[elIndexTextArea].addEventListener("blur",this_.textMaterial.onBlur);
				this.initElement(elListTextArea[elIndexTextArea]);
			};
		};
	};

	/* --- */

	this.init=function(){
		$(".xui-form__select").select2({
			minimumResultsForSearch: Infinity
		});

		this.textMaterial.init();
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.Form);


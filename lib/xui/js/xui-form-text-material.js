
/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.FormTextMaterial={};

(function(){

	var this_=this;

	/* --- */

	this.textMaterial={};

	/* --- */

	this.textMaterial.onFocus=function(event){
		if(!this.parentElement.classList.contains("-has-value")){
			this.parentElement.classList.add("-has-value");
		};
		if(!this.parentElement.classList.contains("-focus")){
			this.parentElement.classList.add("-focus");
		};
	};

	this.textMaterial.onBlur=function(event){
		if((""+this.value).length==0){
			if(this.parentElement.classList.contains("-has-value")){
				this.parentElement.classList.remove("-has-value");
			};
		};
		if(this.parentElement.classList.contains("-focus")){
			this.parentElement.classList.remove("-focus");
		};		
	};

	this.textMaterial.init=function(){
		var elList=XUI.getByClassName(document,"xui form-text-material");
		for(var elIndex=0;elIndex < elList.length;++elIndex){
			var elListInput=elList[elIndex].getElementsByTagName("input");
			for(var elIndexInput=0;elIndexInput < elListInput.length;++elIndexInput){
				elListInput[elIndexInput].addEventListener("focus",this_.textMaterial.onFocus);
				elListInput[elIndexInput].addEventListener("blur",this_.textMaterial.onBlur);
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




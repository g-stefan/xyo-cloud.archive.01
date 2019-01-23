
/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.FormTextareaMaterial={};

(function(){

	var this_=this;

	/* --- */

	this.textareaMaterial={};

	/* --- */

	this.textareaMaterial.onFocus=function(event){
		if(!this.parentElement.classList.contains("-has-value")){
			this.parentElement.classList.add("-has-value");
		};
		if(!this.parentElement.classList.contains("-focus")){
			this.parentElement.classList.add("-focus");
		};
	};

	this.textareaMaterial.onBlur=function(event){
		if((""+this.value).length==0){
			if(this.parentElement.classList.contains("-has-value")){
				this.parentElement.classList.remove("-has-value");
			};
		};
		if(this.parentElement.classList.contains("-focus")){
			this.parentElement.classList.remove("-focus");
		};		
	};

	this.textareaMaterial.init=function(){
		var elList=XUI.getByClassName(document,"xui form-textarea-material");
		for(var elIndex=0;elIndex < elList.length;++elIndex){
			var elListInput=elList[elIndex].getElementsByTagName("textarea");
			for(var elIndexInput=0;elIndexInput < elListInput.length;++elIndexInput){
				elListInput[elIndexInput].addEventListener("focus",this_.textareaMaterial.onFocus);
				elListInput[elIndexInput].addEventListener("blur",this_.textareaMaterial.onBlur);
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




<?php
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//

defined("XYO_CLOUD") or die("Access is denied");

?>

/*
//
// Copyright (c) 2018 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

<script>

XUI={};

(function(){

	var this_=this;

	this.getByClassName=function(el,className){
		var classNameList=className.split(" ");
		var i;
		var retV=[];
		var elList=el.getElementsByClassName(className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].classList){
				for(i=0;i<classNameList.length;++i){
					if(!elList[elIndex].classList.contains(classNameList[i])){
						break;
					};
				};
				if(i==classNameList.length){
					retV[retV.length]=elList[elIndex];
				};
			};
		};
		return retV;
	};

	this.getByClassNameAndAttribute=function(el,className,attribute){
		var retV=[];
		var elList=this.getByClassName(el,className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].getAttribute(attribute)){
				retV[retV.length]=elList[elIndex];
			};
		};
		return retV;
	};

	this.getByClassNameAndAttributeValue=function(el,className,attribute,attributeValue){
		var retV=[];
		var elList=this.getByClassName(el,className);
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			if(elList[elIndex].getAttribute(attribute)==attributeValue){
				retV[retV.length]=elList[elIndex];
			};
		};
		return retV;
	};

	this.getByClassNameFirst=function(el,className){
		var retV=[];
		var elList=this.getByClassName(el,className);
		if(elList.length>0){
			return elList[0];
		};
		return null;
	};

	this.getNextSiblingByClassName=function(el,className){
		var classNameList=className.split(" ");
		var i;
		for(var scan=el.nextSibling;scan;scan=scan.nextSibling){
			if(scan.classList){
				for(i=0;i<classNameList.length;++i){
					if(!scan.classList.contains(classNameList[i])){
						break;
					};
				};
				if(i==classNameList.length){
					return scan;
				};
			};
		};
		return null;
	};

	this.getOffsetX=function(el){	
		var clientRect = el.getBoundingClientRect();

		var scrollLeft = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft;
		var clientLeft = document.documentElement.clientLeft || document.body.clientLeft || 0;

		return Math.floor(clientRect.left + scrollLeft - clientLeft);
	};

	this.getOffsetY=function(el){	
		var clientRect = el.getBoundingClientRect();

		var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
		var clientTop = document.documentElement.clientTop || document.body.clientTop || 0;

		return Math.floor(clientRect.top + scrollTop - clientTop);
	};

	this.isChildOf=function(child, parent) {		
		var el = child.parentNode;
		while (el != null) {
			if (el == parent) {
				return true;
			};
			el = el.parentNode;
		};
		return false;
	};

	this.getCookie=function(name){
		var start,len,end;
		start=document.cookie.indexOf(name+"=");
		len=start+name.length+1;
		if((!start)&&(name!=document.cookie.substring(0,name.length))){
			return null;
		};
		if(start==-1){
			return null;
		};
		end=document.cookie.indexOf(";",len);
		if (end==-1){
			end=document.cookie.length;
		};
		return unescape(document.cookie.substring(len,end));
	};

	this.setCookie=function(name,value,expires,path,domain,secure){
		document.cookie=name+"="+escape(value)+
		((expires)?";expires="+expires.toGMTString():"")+
		((path)?";path="+path:"")+
		((domain)?";domain="+domain:"")+
		((secure)?";secure":"");
	};

	this.removeCookie=function(name,path,domain){
		if(this.getCookie(name)){
			document.cookie=name+"="+
			((path)?";path="+path:"")+
			((domain)?";domain="+domain:"")+
			";expires=Thu, 01-Jan-1970 00:00:01 GMT";
		};
	};
	
	this.triggerEvent=function(el,eventToTrigger){
		if ("createEvent" in document) {
			var elEvent = document.createEvent("HTMLEvents");
			elEvent.initEvent(eventToTrigger, false, true);
			el.dispatchEvent(elEvent);
			return;
		};
		el.fireEvent(eventToTrigger);
	};

}).apply(XUI);

</script>


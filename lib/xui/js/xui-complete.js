/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

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

	this.getCookie=function (name){
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

}).apply(XUI);

/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.EffectRipple={};

(function(){

	var this_=this;

	this.animationInterval=300;
	this.animationStep=20;
	this.animationIntervalOut=200;
	this.animationMinOpacity=0.1;
	this.animationMaxOpacity=1;

	this.outEffect=function(el,animationProcessOut){
		if(el.classList.contains("xui_effect-ripple_animation-active")){
			el.classList.remove("xui_effect-ripple_animation-active");
			el.classList.remove("xui_effect-ripple_animation-in");
			el.classList.add("xui_effect-ripple_animation-out");
			animationProcessOut();
			return;
		};
		if(el.classList.contains("xui_effect-ripple_animation-in")){
			setTimeout(function(){
				this_.outEffect(el,animationProcessOut);
			},Math.floor(this_.animationInterval/2));
		};
	};

	this.initElement=function(parent,el){
		var frameAnimationOut=0;
		var opacityOutEl=this_.animationMaxOpacity;
		var opacityOutElDelta=((0.0-this_.animationMaxOpacity)*this_.animationStep)/this_.animationIntervalOut;
		var animationProcessOut=function(){
			frameAnimationOut+=this_.animationStep;

			opacityOutEl+=opacityOutElDelta;

			el.style.opacity=opacityOutEl;
	
			if(frameAnimationOut<this_.animationIntervalOut){
				setTimeout(animationProcessOut,this_.animationStep);
				return;
			};

			// reset
			frameAnimationOut=0;
			opacityOutEl=this_.animationMaxOpacity;
			el.style.opacity=0.0;
		};

		parent.addEventListener("mouseup", function(event){			
			this_.outEffect(el,animationProcessOut);
		});

		parent.addEventListener("mouseleave", function(event){
			this_.outEffect(el,animationProcessOut);
		});

	};

	this.prepareElement=function(parent,effectColor,effectColorClass){
		var el=XUI.getByClassNameFirst(parent,"xui_effect-ripple__element");

		if(!el){
			var childN=[];
			for(var k=0;k<parent.childNodes.length;++k){
				childN[k]=parent.childNodes[k];
			};
			while (parent.firstChild) {
				parent.removeChild(parent.firstChild);
			};
                
			var el = document.createElement("div");
			el.innerHTML = "";
			el.className = "xui_effect-ripple__element";
			el.style.pointerEvents = "none";
	
			if(effectColor){
				el.style.backgroundColor=effectColor;
			};

			if(effectColorClass){
				el.className = "xui_effect-ripple__element " + effectColorClass;
			};

			parent.appendChild(el);
				
			var elSuper = document.createElement("div");
			elSuper.innerHTML = "";
			elSuper.className = "xui_effect-ripple__super";
			parent.appendChild(elSuper);

			for(var k=0;k<childN.length;++k){
				elSuper.appendChild(childN[k]);
			};
        
			childN=null;

			this_.initElement(parent,el);
		};

		return el;
	};

	this.add=function(el,effectType,effectColor,effectColorClass){
		var parent=el;

		this.prepareElement(parent,effectColor,effectColorClass);

		parent.addEventListener("mousedown", function(event){

			var el=XUI.getByClassNameFirst(parent,"xui_effect-ripple__element");

			if(!el){
				el=this_.prepareElement(parent);
			};
			
			if(el.classList.contains("xui_effect-ripple_animation-in")){
				return;
			};

			el.classList.remove("xui_effect-ripple_animation-out");	
			el.classList.remove("xui_effect-ripple_animation-dummy");	

			var sizeParent = Math.max(parent.offsetWidth, parent.offsetHeight);
			var sizeElInitial = 6;

			var elLeftX;
			var elLeftY;

			if(effectType=="center"){
				elLeftX=parent.clientWidth/2;
				elLeftY=parent.clientHeight/2;
			}else{
				elLeftX=event.pageX-XUI.getOffsetX(parent);
				elLeftY=event.pageY-XUI.getOffsetY(parent);
			};

			el.style.height=sizeElInitial+"px";
			el.style.width=sizeElInitial+"px";	
			el.style.left=elLeftX-(sizeElInitial/2)+"px";
			el.style.top=elLeftY-(sizeElInitial/2)+"px";

			el.classList.add("xui_effect-ripple_animation-in");

			var frameAnimation=0;
			var sizeEl=sizeElInitial;
			var sizeElDelta=(3*((sizeParent-sizeElInitial)*this_.animationStep))/this_.animationInterval;
			var opacityEl=this_.animationMinOpacity;
			var opacityElDelta=((this_.animationMaxOpacity-this_.animationMinOpacity)*this_.animationStep)/this_.animationInterval;
			
			var animationProcessIn=function(){
				frameAnimation+=this_.animationStep;

				sizeEl+=sizeElDelta;
				opacityEl+=opacityElDelta;

				el.style.opacity=opacityEl;

				el.style.height=Math.floor(sizeEl)+"px";
				el.style.width=Math.floor(sizeEl)+"px";
				el.style.left=Math.floor(elLeftX-(sizeEl/2))+"px";
				el.style.top=Math.floor(elLeftY-(sizeEl/2))+"px";
	
				if(frameAnimation<this_.animationInterval){
					setTimeout(animationProcessIn,this_.animationStep);
					return;
				};

				el.classList.add("xui_effect-ripple_animation-active");
			};

			animationProcessIn();			
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui_effect-ripple");
		for(var elIndex=0;elIndex<elList.length;++elIndex){
			var effectType=elList[elIndex].getAttribute("data-xui-ripple");
			var effectColor=elList[elIndex].getAttribute("data-xui-ripple-color");
			var effectColorClass=elList[elIndex].getAttribute("data-xui-ripple-color-class");
			this_.add(elList[elIndex],effectType,effectColor,effectColorClass);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	

}).apply(XUI.EffectRipple);

/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Responsive={};

(function(){

	var this_=this;

	this.initOk=false;
	this.processResponsiveList=[];

	this.currentState=0;
	this.lastState=0;

	this.init=function(){

		this.initOk=true;
				
		this.elResponsive = document.createElement("div");
		this.elResponsive.innerHTML = "";
		this.elResponsive.className = "xui-responsive";
		this.elResponsive.style.pointerEvents = "none";
		this.elResponsive.style.display = "none";

		document.body.appendChild(this.elResponsive);

		this.elResponsiveAfter = window.getComputedStyle ? window.getComputedStyle(this.elResponsive, ":after") : null;
		this.currentState = 0;
		this.lastState = 0;

		this.processEvent = function(){
			this_.currentState = parseInt(("" + this_.elResponsiveAfter.getPropertyValue("content")).replace(/["']/g, ""));
			if(this_.lastState == this_.currentState){
				return;
			};
			for(var k=0;k<this_.processResponsiveList.length;++k){
				this_.processResponsiveList[k][0].call(this_.processResponsiveList[k][1],this_.currentState,this_.lastState);
			};
			this_.lastState = this_.currentState;
		}

		if(this.elResponsiveAfter){
			window.addEventListener("load", this_.processEvent);
			window.addEventListener("resize", this_.processEvent);
			window.addEventListener("orientationchange", this_.processEvent);
			this_.processEvent();
		};
	};

	this.addProcessResponsive=function(processResponsive,processResponsiveThis){
		this.processResponsiveList[this.processResponsiveList.length]=[processResponsive,processResponsiveThis];
		if(this.initOk){
			processResponsive.call(processResponsiveThis,1*this.currentState,1*this.lastState);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);		
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Responsive);

/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Responsive.Element={};

(function(){

	var this_=this;

	this.elements={};
	this.elementsState=[];

	this.add=function(elementId,fnNotify){
		var elResponsive=document.getElementById(elementId+"__responsive-iframe");
		if(!elResponsive){
			var element=document.getElementById(elementId);
			if(element){
				elResponsive=document.createElement("iframe");
				elResponsive.id=elementId+"__responsive-iframe";
				elResponsive.style.position="absolute";
				elResponsive.style.top="0px";
				elResponsive.style.left="0px";
				elResponsive.style.width="100%";
				elResponsive.style.height="0px";
				elResponsive.style.opacity="0";
				elResponsive.style.zIndex=-1000;
				elResponsive.style.pointerEvents="none";
				elResponsive.style.display="block";
				elResponsive.style.border="0px";

				element.appendChild(elResponsive);
				if(!Array.isArray(this.elements[elementId])){
					this.elements[elementId]=[];
				};
				this.elements[elementId].push(fnNotify);

				this.processEvent=function(){
					var state=elResponsive.offsetWidth;
					if(this_.elementsState[elementId]!=state){
						this_.elementsState[elementId]=state;
						for(var k=0;k<this_.elements[elementId].length;++k){
							if(this_.elements[elementId][k]){
								this_.elements[elementId][k].call(undefined,state);
							};
						};
					};
				};
								
				var elWindow=elResponsive.contentWindow;
				if(elWindow!=null){
					elWindow.addEventListener("resize", this.processEvent);
					this.processEvent();
					return true;
				};
			};
			return false;
		};
		this.elements[elementId].push(fnNotify);
		if(fnNotify){
			fnNotify.call(undefined,elResponsive.offsetWidth);
		};
		return true;
	};

	this.remove=function(elementId,fnNotify){
		if(!Array.isArray(this.elements[elementId])){
			return false;
		};
		if(fnNotify===null){
			this.elements[elementId]=[];
		}else{
			for(var k=0;k<this.elements[elementId].length;++k){
				if(this.elements[elementId][k]===fnNotify){
					delete this.elements[elementId][k];				
				};
			};
		};
		if(this.elements[elementId].length==0){
			delete this.elements[elementId];
			delete this.elementsState[elementId];
			var elResponsive=document.getElementById(elementId+"__responsive-iframe");
			if(elResponsive){
				elResponsive.parentElement.removeChild(elem);
			};
		};
	};

	this.linkContainer=function(responsiveId,superId,containerId,classList){
		var elSuper=document.getElementById(superId);
		var elContainer=document.getElementById(containerId);
		var processing=false;
		var checkState=0;
		var lastState=0;
		var memoryState={};

		var processEvent=function(){
			var childrenState=0;
			var ln=elContainer.children.length;
			if(ln>0){
				var offsetTop=0;
				for(var k=0;k<ln;++k){
					childrenState+=elContainer.children[k].offsetWidth;
					if(offsetTop!=elContainer.children[k].offsetTop){
						if(offsetTop==0){
							offsetTop=elContainer.children[k].offsetTop;
							continue;
						};
						if(elContainer.children[k].offsetWidth==0){
							continue;
						};
						childrenState=checkState+1;
						break;
					};
				};
			};
			var currentClass="";
			var nextClass=classList[classList.length-1];
			if(elSuper.classList){
				for(var k=0;k<classList.length;++k){
					if(elSuper.classList.contains(classList[k])){
						currentClass=classList[k];
						if(childrenState>checkState){
							lastState=checkState;							
							if(k-1>0){
								nextClass=classList[k-1];
							}else{
								nextClass=classList[0];
							};
							break;
						};
						if(checkState>lastState){
							lastState=checkState;							
							if(k+1<classList.length){
								nextClass=classList[k+1];
							}else{
								nextClass=classList[classList.length-1];
							};
							if(memoryState[nextClass]>checkState){
								nextClass=currentClass;									
							};
							break;	
						};
						memoryState[currentClass]=checkState;
						nextClass=currentClass;
						break;	
					};
				};
				if(currentClass==nextClass){
					processing=false;
					return;
				};
				if(currentClass.length>0){
					elSuper.classList.remove(currentClass);
				};
				if(nextClass.length>0){
					elSuper.classList.add(nextClass);
				};
				setTimeout(processEvent,100);
				return;
			};
			processing=false;
		};

		XUI.Responsive.Element.add(responsiveId,function(state){
			checkState=state;
			if(processing){
				return;
			};
			processing=true;
			setTimeout(processEvent,100);
		});
	};

}).apply(XUI.Responsive.Element);

/*                                                             
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Toggle={};

(function(){

	var this_=this;

	this.onClickTogleElementListClass=function(el,elList,toggleClass){
		var elList_=elList;
		var toggleClass_=toggleClass;

		for(var k=0;k<toggleClass_.length;++k){
			toggleClass_[k]=toggleClass_[k].trim();
		};
		
		if(elList_){
			if(elList_.length){
				if(toggleClass_.length>1){
					el.addEventListener("click", function(event){
						var thisEl=this;
						if(this.getAttribute("data-xui-toggle")=="parent"){
							thisEl=this.parentNode;
						};
						thisEl.classList.toggle("xui_toggle_active");
						for(var elIndex in elList_){
							if(elList_[elIndex].classList.contains(toggleClass_[0])){
								elList_[elIndex].classList.remove(toggleClass_[0]);
								elList_[elIndex].classList.add(toggleClass_[1]);
								continue;
							};
							if(elList_[elIndex].classList.contains(toggleClass_[1])){
								elList_[elIndex].classList.remove(toggleClass_[1]);
								elList_[elIndex].classList.add(toggleClass_[0]);
								continue;
							};
							elList_[elIndex].classList.add(toggleClass_[0]);
						};
					});
					return;
				};

				el.addEventListener("click", function(event){
					var thisEl=this;
					if(this.getAttribute("data-xui-toggle")=="parent"){
						thisEl=this.parentNode;
					};
					thisEl.classList.toggle("xui_toggle_active");
					for(var elIndex in elList_){
						elList_[elIndex].classList.toggle(toggleClass_[0]);
					};
				});
				
			};
			return;
		};
		if(toggleClass_.length>1){
			el.addEventListener("click", function(event){
				var thisEl=this;
				if(this.getAttribute("data-xui-toggle")=="parent"){
					thisEl=this.parentNode;
				};
				if(thisEl.classList.contains(toggleClass_[0])){
					thisEl.classList.remove(toggleClass_[0]);
					thisEl.classList.add(toggleClass_[1]);
					return;
				};
				if(thisEl.classList.contains(toggleClass_[1])){
					thisEl.classList.remove(toggleClass_[1]);
					thisEl.classList.add(toggleClass_[0]);
					return;
				};
				thisEl.classList.add(toggleClass_[0]);
			});
			return;
		};
		el.addEventListener("click", function(event){
			var thisEl=this;
			if(this.getAttribute("data-xui-toggle")=="parent"){
				thisEl=this.parentNode;
			};
			thisEl.classList.toggle(toggleClass_[0]);
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui_toggle");
		for(var elIndex=0;elIndex<elList.length; ++elIndex){
			var toggleAction=elList[elIndex].getAttribute("data-xui-toggle-action");
			var toggleClass=elList[elIndex].getAttribute("data-xui-toggle-class");
			var toggleGroup=elList[elIndex].getAttribute("data-xui-toggle-group");
			if(toggleGroup){
				if(!toggleAction){
					continue;
				};
			};
			var toggleClassItems=["xui_toggle_on","xui_toggle_off"];
			if(toggleClass){
				toggleClassItems=toggleClass.split(",");
			};			
			if(toggleAction){
				var groupItems=toggleAction.split(",");				
				for(groupItemsIndex=0;groupItemsIndex<groupItems.length;++groupItemsIndex){
					var groupList=groupItems[groupItemsIndex].trim().split(":");
					var groupName=groupList[0];
					var groupClass=groupList[1];
					var groupClassItems=toggleClassItems;
					if(groupClass){
						groupClassItems=groupClass.trim().split("/");
						for(var k=0;k<groupClassItems.length;++k){
							groupClassItems[k]=groupName+"_"+groupClassItems[k];
						};
					};
						
					var list=XUI.getByClassNameAndAttributeValue(document,"xui_toggle","data-xui-toggle-group",groupName);
					this.onClickTogleElementListClass(elList[elIndex],list,groupClassItems);

				};
				continue;
			};

			this.onClickTogleElementListClass(elList[elIndex],null,toggleClassItems);
		};
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Toggle);

/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

XUI.Dashboard={};

(function(){

	var this_=this;

	this.cookieOk=false;

	this.setCookie=function(value){
		if(value=="mini-open"){
			value="mini-closed";
		};
		if(value=="over-open"){
			value="over-closed";
		};
		XUI.setCookie("xui-dashboard",value);		
	};

	this.processResponsive=function(state){

		var elList=XUI.getByClassName(document,"xui-dashboard");
		for(var elIndex=0; elIndex<elList.length; ++elIndex){
			var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui-navigation-drawer");
			if(elNavigation){
				if(state<600){
					elNavigation.classList.remove("xui-navigation-drawer_normal");
					elNavigation.classList.remove("xui-navigation-drawer_mini");
					elNavigation.classList.add("xui-navigation-drawer_over");
					if(this.cookieOk){
						this.cookieUpdateMode("over");
					};
				};
				if((state>=600)&&(state<960)){
					elNavigation.classList.remove("xui-navigation-drawer_over");
					elNavigation.classList.remove("xui-navigation-drawer_normal");
					elNavigation.classList.add("xui-navigation-drawer_mini");
					if(this.cookieOk){
						this.cookieUpdateMode("mini");
					};
				};
				if(state>=960){
					elNavigation.classList.remove("xui-navigation-drawer_over");
					elNavigation.classList.remove("xui-navigation-drawer_mini");
					elNavigation.classList.add("xui-navigation-drawer_normal");
					if(this.cookieOk){
						this.cookieUpdateMode("normal");
					};
				};

				if(state<960){
                
					if(elNavigation.classList.contains("xui-navigation-drawer_open")){
						elNavigation.classList.remove("xui-navigation-drawer_open");
						elNavigation.classList.add("xui-navigation-drawer_closed");
						if(this.cookieOk){
							this.cookieUpdateState("closed");
						};
					};

                              	};

				if(state>=1280){
					if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
						elNavigation.classList.remove("xui-navigation-drawer_closed");
						elNavigation.classList.add("xui-navigation-drawer_open");
						if(this.cookieOk){
							this.cookieUpdateState("open");
						};
					};
				}
			};

			var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui-brand");
			if(elBrand){
				if(state<600){
					elBrand.classList.remove("xui-brand_normal");
					elBrand.classList.remove("xui-brand_mini");
					elBrand.classList.add("xui-brand_over");
				};
				if((state>=600)&&(state<960)){
					elBrand.classList.remove("xui-brand_normal");
					elBrand.classList.remove("xui-brand_over");
					elBrand.classList.add("xui-brand_mini");					
				};
				if(state>=960){
					elBrand.classList.remove("xui-brand_over");
					elBrand.classList.remove("xui-brand_mini");
					elBrand.classList.add("xui-brand_normal");
				};

				if(state<960){
                
					if(elBrand.classList.contains("xui-brand_open")){
						elBrand.classList.remove("xui-brand_open");
						elBrand.classList.add("xui-brand_closed");
					};

                              	};

				if(state>=1280){
					if(elBrand.classList.contains("xui-brand_closed")){
						elBrand.classList.remove("xui-brand_closed");
						elBrand.classList.add("xui-brand_open");
					};
				};

			};
			

		};

	}

	this.notifyResponsive=function(e){
		this_.processResponsive(e.detail.state,e.detail.last);
	}

	this.cookieUpdateState=function(newState){
		var cookieState=XUI.getCookie("xui-dashboard");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=scan[0];
			state=newState;
			this.setCookie(mode+"-"+state);
		};		
	}

	this.cookieUpdateMode=function(newMode){
		var cookieState=XUI.getCookie("xui-dashboard");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=newMode;
			state=scan[1];
			this.setCookie(mode+"-"+state);
		};		
	}

	this.toogleAction=function(){
		var el=XUI.getByClassNameFirst(document,"xui-dashboard");
		if(el){
			var elNavigation=XUI.getByClassNameFirst(el,"xui-navigation-drawer");
			if(elNavigation){
				var mode="";
				var state="";
				if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
					mode="normal";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_mini")){
					mode="mini";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_over")){
					mode="over";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_open")){
					state="closed";
				};
				if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
					state="open";
				};
				this.setCookie(mode+"-"+state);
			};
		};
	}

	this.init=function(){
		this.cookieOk=false;
		XUI.Responsive.addProcessResponsive(this.processResponsive,this);
		var cookieState=XUI.getCookie("xui-dashboard");
		if(cookieState){
			var mode;
			var state;
			var scan=cookieState.split("-");
			mode=scan[0];
			state=scan[1];
			var elList=XUI.getByClassName(document,"xui-dashboard");
			for(var elIndex=0; elIndex<elList.length; ++elIndex){
				var elNavigation=XUI.getByClassNameFirst(elList[elIndex],"xui-navigation-drawer");
				if(elNavigation){
					if(mode=="normal"){
						if(elNavigation.classList.contains("xui-navigation-drawer_over")){
							elNavigation.classList.remove("xui-navigation-drawer_over");
							elNavigation.classList.add("xui-navigation-drawer_normal");
						};
					};
					if(mode=="over"){
						if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
							elNavigation.classList.remove("xui-navigation-drawer_normal");
							elNavigation.classList.add("xui-navigation-drawer_over");
						};
					};
					if(state=="open"){
						if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
							elNavigation.classList.remove("xui-navigation-drawer_closed");
							elNavigation.classList.add("xui-navigation-drawer_open");
						};
					};	
					if(state=="closed"){
						if(elNavigation.classList.contains("xui-navigation-drawer_open")){
							elNavigation.classList.remove("xui-navigation-drawer_open");
							elNavigation.classList.add("xui-navigation-drawer_closed");
						};
					};	
				};
				var elBrand=XUI.getByClassNameFirst(elList[elIndex],"xui-brand");
				if(elBrand){
					if(mode=="normal"){
						if(elBrand.classList.contains("xui-brand_over")){
							elBrand.classList.remove("xui-brand_over");
							elBrand.classList.add("xui-brand_normal");
						};
					};
					if(mode=="over"){
						if(elBrand.classList.contains("xui-brand_normal")){
							elBrand.classList.remove("xui-brand_normal");
							elBrand.classList.add("xui-brand_over");
						};
					};
					if(state=="open"){
						if(elBrand.classList.contains("xui-brand_closed")){
							elBrand.classList.remove("xui-brand_closed");
							elBrand.classList.add("xui-brand_open");
						};
					};	
					if(state=="closed"){
						if(elBrand.classList.contains("xui-brand_open")){
							elBrand.classList.remove("xui-brand_open");
							elBrand.classList.add("xui-brand_closed");
						};
					};	
				};
			};
		}else{		
			var el=XUI.getByClassNameFirst(document,"xui-dashboard");
			if(el){
				var elNavigation=XUI.getByClassNameFirst(el,"xui-navigation-drawer");
				if(elNavigation){
					var mode="";
					var state="";
					if(elNavigation.classList.contains("xui-navigation-drawer_normal")){
						mode="normal";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_over")){
						mode="over";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_open")){
						state="open";
					};
					if(elNavigation.classList.contains("xui-navigation-drawer_closed")){
						state="closed";
					};
					this.setCookie(mode+"-"+state);
				};
			};
		};
		this.cookieOk=true;
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Dashboard);

/*
//
//
//
*/

XUI.FormFile={};

(function(){

	var this_=this;

	this.init=function(){

		$(".xui-form-file__file").each(function(){
									
			var el=$(this);
			var elLabel=el.next("label");
			var elLabelOriginal=elLabel.html();

			el.on("change", function(e){		
				var fileName="";
				if(e.target.value){
					fileName=e.target.value;
					if(fileName.indexOf("\\")>=0){
						fileName = e.target.value.split("\\").pop();
					}else
					if(fileName.indexOf("/")>=0){
						fileName = e.target.value.split("/").pop();
					};
				};

				if(fileName.length>0){
					elLabel.html("<i class=\"material-icons\">file_upload</i>"+fileName);
				}else{
					elLabel.html(elLabelOriginal);
				};
			});

			el.on("focus",function(){
				el.addClass("xui-form-file__file_focus");
			});

			el.on("blur",function(){
				el.removeClass("xui-form-file__file_focus");
			});
		});

	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormFile);

/*
//
//
//
*/

XUI.FormSelect={};

(function(){

	var this_=this;

	/* --- */

	this.initById=function(id){
		$("#"+id).select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true
		}).maximizeSelect2Height();
	};


	this.init=function(id){
		$(".xui-form-select").select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true
		}).maximizeSelect2Height();
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormSelect);

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
			if(!scan.classList.contains("xui-form-textarea-material_has-value")){
				scan.classList.add("xui-form-textarea-material_has-value");
			};
			if(!scan.classList.contains("xui-form-textarea-material_focus")){
				scan.classList.add("xui-form-textarea-material_focus");
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
				if(scan.classList.contains("xui-form-textarea-material_has-value")){
					scan.classList.remove("xui-form-textarea-material_has-value");
				};
			};
			if(scan.classList.contains("xui-form-textarea-material_focus")){
				scan.classList.remove("xui-form-textarea-material_focus");
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
			if(!scan.classList.contains("xui-form-textarea-material_active")){
				scan.classList.add("xui-form-textarea-material_active");
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


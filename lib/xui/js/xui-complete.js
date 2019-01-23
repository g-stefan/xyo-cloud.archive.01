
/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
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




/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
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
		if(el.classList.contains("-animation-active")){
			el.classList.remove("-animation-active");
			el.classList.remove("-animation-in");
			el.classList.add("-animation-out");
			animationProcessOut();
			return;
		};
		if(el.classList.contains("-animation-in")){
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
		var el=XUI.getByClassNameFirst(parent,"xui -effect-ripple_element");

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
			el.className = "xui -effect-ripple_element";
			el.style.pointerEvents = "none";
	
			if(effectColor){
				el.style.backgroundColor=effectColor;
			};

			if(effectColorClass){
				el.className = "xui -effect-ripple_element " + effectColorClass;
			};

			parent.appendChild(el);
				
			var elSuper = document.createElement("div");
			elSuper.innerHTML = "";
			elSuper.className = "xui -effect-ripple_super";
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

			var el=XUI.getByClassNameFirst(parent,"xui -effect-ripple_element");

			if(!el){
				el=this_.prepareElement(parent);
			};
			
			if(el.classList.contains("-animation-in")){
				return;
			};

			el.classList.remove("-animation-out");	
			el.classList.remove("-animation-dummy");	

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

			el.classList.add("-animation-in");

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

				el.classList.add("-animation-active");
			};

			animationProcessIn();			
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui -effect-ripple");
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
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
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
		this.elResponsive.className = "xui responsive";
		this.elResponsive.id = "xui-responsive";
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
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.Responsive.Element={};

(function(){

	var this_=this;

	this.elements={};
	this.elementsState=[];
	this.elementSuffix="_responsive-iframe";

	this.add=function(elementId,fnNotify){
		var elResponsive=document.getElementById(elementId+this.elementSuffix);
		if(!elResponsive){
			var element=document.getElementById(elementId);
			if(element){
				elResponsive=document.createElement("iframe");
				elResponsive.id=elementId+this.elementSuffix;
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
			var elResponsive=document.getElementById(elementId+this.elementSuffix);
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
				for(var k=0;k<ln;++k){
					childrenState+=elContainer.children[k].offsetWidth;
					if(elContainer.children[k].offsetTop!=0){
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
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
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
						this.classList.toggle("-active");
						var thisEl=this;
						if(this.getAttribute("data-xui-toggle")=="parent"){
							thisEl=this.parentNode;
						};
						if(this.getAttribute("data-xui-toggle")=="parent-2"){
							thisEl=this.parentNode.parentNode;
						};
						if(this.getAttribute("data-xui-toggle")=="next-sibling"){
							thisEl=this.nextElementSibling;
						};						
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
					this.classList.toggle("-active");
					var thisEl=this;
					if(this.getAttribute("data-xui-toggle")=="parent"){
						thisEl=this.parentNode;
					};
					if(this.getAttribute("data-xui-toggle")=="parent-2"){
						thisEl=this.parentNode.parentNode;
					};
					if(this.getAttribute("data-xui-toggle")=="next-sibling"){
						thisEl=this.nextElementSibling;
					};
					for(var elIndex in elList_){
						elList_[elIndex].classList.toggle(toggleClass_[0]);
					};
				});
				
			};
			return;
		};
		if(toggleClass_.length>1){
			el.addEventListener("click", function(event){
				this.classList.toggle("-active");
				var thisEl=this;
				if(this.getAttribute("data-xui-toggle")=="parent"){
					thisEl=this.parentNode;
				};
				if(this.getAttribute("data-xui-toggle")=="parent-2"){
					thisEl=this.parentNode.parentNode;
				};
				if(this.getAttribute("data-xui-toggle")=="next-sibling"){
					thisEl=this.nextElementSibling;
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
			this.classList.toggle("-active");
			var thisEl=this;
			if(this.getAttribute("data-xui-toggle")=="parent"){
				thisEl=this.parentNode;
			};
			if(this.getAttribute("data-xui-toggle")=="parent-2"){
				thisEl=this.parentNode.parentNode;
			};
			if(this.getAttribute("data-xui-toggle")=="next-sibling"){
				thisEl=this.nextElementSibling;
			};
			thisEl.classList.toggle(toggleClass_[0]);
		});
	};

	this.init=function(){
		var elList=XUI.getByClassName(document,"xui -toggle");
		for(var elIndex=0;elIndex<elList.length; ++elIndex){
			var toggleAction=elList[elIndex].getAttribute("data-xui-toggle-action");
			var toggleClass=elList[elIndex].getAttribute("data-xui-toggle-class");
			var toggleGroup=elList[elIndex].getAttribute("data-xui-toggle-group");
			if(toggleGroup){
				if(!toggleAction){
					continue;
				};
			};
			var toggleClassItems=["-on","-off"];
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
							groupClassItems[k]=groupClassItems[k];
						};
					};
						
					var list=XUI.getByClassNameAndAttributeValue(document,"xui -toggle","data-xui-toggle-group",groupName);
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
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.Dashboard={};

(function(){

	var this_=this;

	this.mainSelector="xui dashboard -main";

	this.getDefaultState=function(){
		return {
			mode:"normal",
			state:"open"
		};
	};

	this.getState=function(){
		var el=XUI.getByClassNameFirst(document,this.mainSelector);
		if(el){
			var mode="";
			var state="";

			if(el.classList.contains("-normal")){
				mode="normal";
			}else
			if(el.classList.contains("-mini")){
				mode="mini";
			}else
			if(el.classList.contains("-over")){
				mode="over";
			};

			if(el.classList.contains("-open")){
				state="open";
			}else
			if(el.classList.contains("-closed")){
				state="closed";
			};

			if((mode.length>0)&&(state.length>0)){
				return {
					mode:mode,
					state:state
				};
			};
		};
		return this.getDefaultState();
	};

	this.setClass=function(el,x,classList){
		for(var k in classList){
			if(x!=classList[k]){
				el.classList.remove("-"+classList[k]);
			};
		};
		el.classList.add("-"+x);
	};

	this.setState=function(state){
		var oldState=this.getState();
		if((state.mode==oldState.mode)&&(state.state==oldState.state)){
			return;
		};
		var el=XUI.getByClassNameFirst(document,this.mainSelector);
		if(el){
			this.setClass(el,state.mode,["normal","mini","over"]);
			this.setClass(el,state.state,["open","closed"]);
		};
	};

	this.encodeState=function(state){
		return state.mode+"-"+state.state;
	};

	this.decodeState=function(state){
		if(state){
			state=(""+state).split("-");
			if(state.length>=2){
				return {
					mode:state[0],
					state:state[1]
				};
			};
		};
		return this.getDefaultState();
	};

	this.setCookie=function(state,isUser){
		XUI.setCookie("xui-dashboard",this.encodeState(state));
		if(isUser){
			if(state.mode=="normal"){
				XUI.setCookie("xui-dashboard-user",this.encodeState(state));
			};
		};
	};

	this.getCookie=function(isUser){
		var state=this.decodeState(XUI.getCookie("xui-dashboard"));
		if(isUser){
			if(state.mode=="normal"){
				stateUser=XUI.getCookie("xui-dashboard-user");
				if(stateUser){
					state=this.decodeState(stateUser);
				};
			};
		};
		return state;
	};

	this.setNextState=function(state,isUser){
		if(!isUser){
			if(state.mode=="normal"){
				userState=this.getCookie(true);
				if(userState.mode=="normal"){
					state.state=userState.state;
				};
			};
		};
		this.setCookie(state,isUser);
		this.setState(state);
	};

	this.processResponsive=function(state){
		var nextState=this.getDefaultState();
		if(state<600){
			nextState.mode="over";
			nextState.state="closed";
		}else
		if((state>=600)&&(state<960)){
			nextState.mode="mini";
			nextState.state="closed";
		}else
		if(state>=960){
			nextState.mode="normal";
			nextState.state="closed";
		}else
		if(state>=1280){
			nextState.mode="normal";
			nextState.state="open";
		};
		this.setNextState(nextState,false);
	};

	this.notifyResponsive=function(e){
		this_.processResponsive(e.detail.state,e.detail.last);
	};
             
	this.toogleNormal=function(id){
		var el=document.getElementById(id);		
		if(el){
			if(el.classList.contains("-closed")){
				el.classList.remove("-closed");
				el.classList.add("-open");
				return;
			};
			if(el.classList.contains("-open")){
				el.classList.remove("-open");
				el.classList.add("-closed");
				return;
			};
		};
	};

	this.toogleMini=function(id){
		this.toogleNormal(id);
	};

	this.toogleOver=function(id){
		this.toogleNormal(id);
	};

	this.toogleAction=function(){
		var state=this.getState();

		if(state.state=="open"){
			state.state="closed";
		}else
		if(state.state=="closed"){
			state.state="open";
		};

		this.setNextState(state,true);
	};

	this.init=function(){
		XUI.Responsive.addProcessResponsive(this.processResponsive,this);		
		this.setNextState(this.getCookie(true),false);
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);

}).apply(XUI.Dashboard);



/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
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




/*                                                             
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.FormFile={};

(function(){

	var this_=this;

	this.init=function(){

		var elList=XUI.getByClassName(document,"xui form-file_file");
		for($k=0;$k<elList.length;++$k){
			var el=elList[$k];
			var elLabel=el.nextElementSibling;
			var elButton=elLabel.nextElementSibling;
			var elLabelSpanList=elLabel.getElementsByTagName("span");
			var elLabelSpanTextOriginal="";
			var elLabelSpan=null;

			if(elLabelSpanList.length>0){
				elLabelSpan=elLabelSpanList[0];
				elLabelSpanTextOriginal=elLabelSpan.innerHTML;
			};				

			el.addEventListener("change", function(e){
				if(elLabelSpan){
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
						if(elLabelSpan.innerHTML!=fileName){
							elLabelSpan.innerHTML=fileName;
						};
					}else{
						if(elLabelSpan.innerHTML!=elLabelSpanTextOriginal){
							elLabelSpan.innerHTML=elLabelSpanTextOriginal;
						};
					};
				};
			});

			el.addEventListener("focus", function(){
				if(!el.classList.contains("form-file_file-focus")){
					el.classList.add("form-file_file-focus");
				};
			});

			el.addEventListener("blur", function(){
				if(el.classList.contains("form-file_file-focus")){
					el.classList.remove("form-file_file-focus");
				};
			});

			elButton.addEventListener("click", function(){
				el.value=null;
				XUI.triggerEvent(el,"change");
				return false;
			});
			
		};

	};	

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormFile);



/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



XUI.FormSelect={};

(function(){

	var this_=this;

	this.initById=function(id){
		var theme=$("#"+id).attr("data-xui-select-theme");
		if(!theme){
			theme="default";
		}else{
			theme="default "+theme;
		};
		$("#"+id).select2({
			minimumResultsForSearch: Infinity,
			dropdownAutoWidth: true,
			theme: theme
		}).maximizeSelect2Height();
	};

	this.init=function(id){
		$(".xui.form-select").each(function() {
			var theme=$(this).attr("data-xui-select-theme");
			if(!theme){
				theme="default";
			}else{
				theme="default "+theme;
			};
			$(this).select2({
				minimumResultsForSearch: Infinity,
				dropdownAutoWidth: true,
				theme: theme
			}).maximizeSelect2Height();
		});
	};

	this.load=function(event){
		window.removeEventListener("load", this_.load);
		this_.init();
	};

	window.addEventListener("load", this.load);	
	
}).apply(XUI.FormSelect);




/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/



if(!XUI.App){
	XUI.App={};
};

XUI.App.Toolbar={};

(function(){

	var this_=this;

	this.linkResponsive=function(idResponsive,idToolbar,idToolbarContent){
		XUI.Responsive.Element.linkContainer(
			idResponsive,idToolbar,idToolbarContent,
			["-important","-small","-large"]
		);
	}

}).apply(XUI.App.Toolbar);



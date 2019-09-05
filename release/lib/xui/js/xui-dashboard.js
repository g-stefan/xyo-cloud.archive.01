
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



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


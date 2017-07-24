/*
//
// Copyright (c) 2017 Grigore Stefan, <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// The MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

function setCheckboxState(this_) {
	var el;
	for(k=1; k<=id_.length; ++k) {
		el=document.getElementById("cbox_"+k);
		if(el) {
			el.checked=this_.checked;
		}
	}
	return false;
}

function clearSearch(this_,field) {
	if(this_) {
		this_.form.elements[field].value="";
		this_.form.submit();
	}
	return false;
}


function selectIdOne() {
	var id;
	id=0;
	for(k=1; k<=id_.length; ++k) {
		el=document.getElementById("cbox_"+k);
		if(el) {
			if(el.checked) {
				id=1*id_[k-1];
			}
		}
	}
	return id;
}



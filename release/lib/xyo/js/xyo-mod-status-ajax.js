/*
//
// Copyright (c) 2018-2019 Grigore Stefan <g_stefan@yahoo.com>
// Created by Grigore Stefan <g_stefan@yahoo.com>
//
// MIT License (MIT) <http://opensource.org/licenses/MIT>
//
*/

$(document).ajaxStart(function() {
	$("#xyo-mod-status-ajax").removeClass("xyo-mod-status-ajax_error");
	$("#xyo-mod-status-ajax").addClass("xyo-mod-status-ajax_on");
});

$(document).ajaxStop(function() {
	$("#xyo-mod-status-ajax").removeClass("xyo-mod-status-ajax_on");
});

$(document).ajaxError(function(){
	$("#xyo-mod-status-ajax").removeClass("xyo-mod-status-ajax_on");
	$("#xyo-mod-status-ajax").addClass("xyo-mod-status-ajax_error");
})


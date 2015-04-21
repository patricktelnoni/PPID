var menu = window.location.pathname.split("/");
//alert(menu[4])
if(menu[4] == 'createarticle')
	var app=angular.module('ppid', ['textAngular']);
else
	var app=angular.module('ppid', []);
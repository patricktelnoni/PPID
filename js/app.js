var menu = window.location.pathname.split("/");
//alert(menu[4])
if(menu[4] == 'add' || menu[4] == 'edit')
	var app=angular.module('ppid', ['textAngular', 'ui.bootstrap']);
else if(menu[4] ==  'listcontent')
	var app=angular.module('ppid', ['smart-table', 'ui.bootstrap']);
else
	var app=angular.module('ppid', ['ui.bootstrap']);
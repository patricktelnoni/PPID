var menu = window.location.pathname.split("/");
//alert(menu[4])
if(menu[3] == 'createarticle' || menu[3] == 'editArticle')
	var app=angular.module('ppid', ['textAngular']);
else if(menu[4] ==  'listcontent')
	var app=angular.module('ppid', ['smart-table', 'ui.bootstrap']);
else
	var app=angular.module('ppid', []);
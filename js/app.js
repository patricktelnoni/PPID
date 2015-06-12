var menu = window.location.pathname.split("/");
//alert(menu[2]);
if(menu[4] == 'add' || menu[4] == 'edit')
	var app=angular.module('ppid', ['textAngular', 'ui.bootstrap', 'ngAnimate']);
else if(menu[4] ==  'listcontent')
	var app=angular.module('ppid', ['smart-table', 'ui.bootstrap', 'ngAnimate']);
else if(menu[3] == 'viewAlbum')
	var app=angular.module('ppid', [ 'ngAnimate', 'ui.bootstrap', 'bootstrapLightbox']);
else if(menu[2] == 'c_informasi' && menu[3] == '')
	var app=angular.module('ppid', ['smart-table', 'ui.bootstrap', 'ngAnimate']);
else
	var app=angular.module('ppid', ['ui.bootstrap', 'ngAnimate']);
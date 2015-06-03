
<script type="text/javascript">

app.controller('listfoto', function($scope, $http, Lightbox) {		
	$scope.url 				= "<?=base_url()?>index.php/c_foto/listfoto/";
	$scope.items			= [];

	var menu = window.location.pathname.split("/");                
	fetch(3);        
			        
	function fetch(page){
		$http.get($scope.url+page).then(function(response) {
		           	//$scope.items			= response.data.content; 
		           	$scope.totalItems 	= response.data.total;
		           	angular.copy(response.data.content, $scope.items);              
		          	});
	}

	$scope.openLightboxModal = function (index) {
	    Lightbox.openModal($scope.items, index);
	  };
				       	
	 $scope.pageChanged = function() {            
		 fetch($scope.currentPage);
	 };		 

	 $scope.fadein= function(){
		 //alert('fadein');
		 	$scope.caption=true;
		 }
	 $scope.fadeout= function(){
		 	//alert('fadeout');
		 	$scope.caption=false;
		 }
});

</script>
<div class="contentMain" style="padding-top:5%;">		
				<div class="slideshow"
					
				 </div>

<div class="row" ng-controller="listfoto" id="feature">
  <ul id="gallery" >
  <li ng-repeat="image in items">
    <a ng-click="openLightboxModal($index)">
      <img ng-src="{{image.thumbUrl}}" class="img-thumbnail" alt="" >
    </a>
  </li>
</ul>
</div>
   </div>
   
   <link rel="stylesheet" href="<?=base_url()?>angular/angular-bootstrap-lightbox.css">
   <script src="<?=base_url()?>angular/angular-bootstrap-lightbox.js"></script>
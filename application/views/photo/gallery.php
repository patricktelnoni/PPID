
<script type="text/javascript">

app.controller('listalbum', function($scope, $http, $sce) {		
	$scope.url 				= "<?=base_url()?>index.php/service/c_foto/listalbum/";
	$scope.items			= [];

	  			                
	fetch(1);        
			        
	function fetch(page){
		$http.get($scope.url+page).then(function(response) {
		           	//$scope.items			= response.data.content; 
		           	$scope.totalItems 	= response.data.total;
		           	angular.copy(response.data.content, $scope.items);              
		          	});
	}
				       	
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
				 
<style>
 .ng-hide-add, .ng-hide-remove {
    /* ensure visibility during the transition */
    display: block !important; /* yes, important */
}
.fade-in-out {
    position				:absolute;
    top					:0;
    right					:0;
    background			:rgba(66, 139, 202, 0.75);
    width					:100%;
    height				:100%;
    padding				:2%;
    
    text-align			:center;
    color					:#fff !important;
    z-index				:2;
     
}

.fade-in-out{
	-webkit-transition: .5s linear all; /* Chrome */
	transition: .5s linear all;
	opacity: 0;
}
 
.fade-in-out:hover {
	opacity: 1;
}
</style>
<div class="row" ng-controller="listalbum" id="feature">
  <div class="col-sm-3 feature" ng-repeat="album in items" ng-animate="{enter: 'animate-enter', leave: 'animate-leave'}">
    <div class="thumbnail" ng-mouseover="fadein()" ng-mouseleave="fadeout()">
    
    <div class="fade-in-out" ng-show="caption">
                    <h4>{{album.nama}}</h4>
                    
                    <p><a  href="<?=base_url()?>index.php/c_foto/viewAlbum/{{album.albumid}}" 
                    title="Zoom" class="label label-danger" href="">Lihat album</a>
                    </p>
       </div>
    	<img src="{{album.path}}" width="150" height="150" alt="{{album.nama}}" id="{{album.fotoid}}"/>
    
      
      
    </div>
  </div>
</div>
   </div>
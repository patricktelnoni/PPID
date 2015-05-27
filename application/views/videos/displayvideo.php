
<script type="text/javascript">

app.controller('listVideo', function($scope, $http, $sce) {		
	$scope.url 				= "<?=base_url()?>index.php/c_video/listvideo/";
	$scope.items			= [];
	$scope.trustSrc = function(src) {
	    return $sce.trustAsResourceUrl(src);
	  }
	  			                
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
});
</script>
<div class="contentMain" style="padding-top:5%;">		
				<div class="slideshow"
					
				 </div>
				 
<div class="row" ng-controller='listVideo'>
		    
	    <div class="col-sm-4" ng-repeat='row in items'>
	    	<h4>{{row.title}}</h4>
		    <div class="embed-responsive embed-responsive-16by9">
			    <iframe class="embed-responsive-item" src="{{trustSrc(row.link)}}"></iframe>
			</div>			              
	     </div>
	     <div class="col-lg-6" >     
        <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" items-per-page="5"></pagination>
     </div>      
	</div>
   </div>
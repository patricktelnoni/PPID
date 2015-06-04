	
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">	
			
			<div class="contentMain" style="padding-top:5%;">		
				<div class="slideshow">
					
						
					
					<script type="text/javascript">

					app.controller('listInformasi', function(refreshContent, $scope, $http) {
						$scope.urlmenu 	= '<?=base_url()?>index.php/service/c_menu/getSideMenu/2';
						$scope.urlmain		= '<?=base_url()?>index.php/service/c_informasi/getContentInformasi/2';
						
						$scope.menu = [];
						$scope.items = [];
						fetch($scope.urlmenu, $scope.menu);
						fetch($scope.urlmain, $scope.items);
						function fetch(url, data){
								$http.get(url).then(function(response) {
								           	//$scope.items			= response.data.content; 
								           	$scope.totalItems 	= response.data.total;
								           	if(url == $scope.urlmain)
									           	angular.copy(response.data.content, data);
								           	if(url == $scope.urlmenu)									           	
								           		angular.copy(response.data, data);              
								          	});
							}				
							 
						$scope.reloadContent = function(detil){
							$scope.info = detil;
							refreshContent.getContent(detil).then(function(response){
						        $scope.items = response.data.content;
						    }, function(error){
						        console.log('opsssss' + error);
						    });
							//alert(detil);
							};
						
						 
							$scope.pageChanged = function() {            
								 fetch('<?=base_url()?>index.php/service/c_informasi/getContentInformasi/'+ $scope.currentPage + '/'+ $scope.info);
							 }
						 
					}).factory('refreshContent', function($http){
						var getContent =  function (jenis){
						 	return $http.get('<?=base_url()?>index.php/service/c_informasi/getContentInformasi/' + jenis);						 
						 };
						 return {getContent: getContent};

						});
					 
 			</script>
				 </div>
				 
<div class="row" ng-controller='listInformasi'>
			<input type="hidden" ng-model="info">
	<div class="tabbable tabs-left col-sm-3 ">
	<div id='cssmenu' style="padding-top: 10%; margin-top: 10%;">
      <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist" >  
      	 <li class="has-sub" ng-repeat='m in menu' ><a href="#polling" data-toggle="tab" ng-click="reloadContent(m.id)">{{m.name}}</a>
	      	<ul>
	      		<li ng-repeat='sm in m.children'  >
	      				<a href='#' ng-click="reloadContent(sm.id)" ><span>{{sm.name}}</span></a> 
	      		</li>		   		
	      	</ul>	  
	      </li>        
      </ul>
      </div>
    </div>
    <div class="col-xs-4 col-lg-4" ng-repeat='row in items'>
	    <div class="thumbnail">
	      <img src="<?=base_url()."icon/pdf.png"?>" alt="Link download" height="100" width="121">
	      <div class="caption">
	        <h3>{{row.judul}}</h3>
	        
	        <p><a href="{{row.link}}" class="btn btn-primary" role="button">Link sedotnya gan..</a> </p>
	      </div>
	    </div>              
     </div>  
  	<pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" items-per-page="10"></pagination>
     
			</div>
			 
              
			</div>
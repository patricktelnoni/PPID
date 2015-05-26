<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">

	
	app.controller('listFeedback', function($scope, $http) {		
		//$scope.url 				= "<?=base_url()?>index.php/c_feedback/listreplyrest/"+$scope.currentPage;
        $scope.items			= [];
        
        fetch(1);
        
        function fetch(page){
	        	$http.get("<?=base_url()?>index.php/c_feedback/listreplyrest/"+page).then(function(response) {
	            	//$scope.items			= response.data.content; 
	            	$scope.totalItems 	= response.data.num_results;
	            	angular.copy(response.data.content, $scope.items);              
	          	});
            }
       	
        $scope.pageChanged = function() {
            //alert($scope.currentPage);
            fetch($scope.currentPage);
          };
		 //$scope.jumlahdata=10;				
	});		

			 	
 </script>
	
<div class="contentMain" ng-controller="listFeedback" style="margin-top: 50px;">	
<div class="col-lg-10">
<article ng-repeat="row in items" id="post-36" class="post-36 post type-post status-publish format-standard hentry category-builder tag-home-php clearfix" role="article">

	<header class="article-header">
		<h2 class="h3">{{row.nama}}</h2>
  		<p class="byline vcard">Posted <time class="updated" datetime="2013-09-10" pubdate="">September 10, 2013</time> by <span class="author">{{row.nama}}</span></p>
	</header> <!-- end article header -->

	<section class="entry-content clearfix">
   		<p>{{row.pesan}} <a href="http://bragthemes.com/demo/builder/2013/09/10/custom-home-php-page-template/#more-36" class="more-link">
		</a>
		</p>
		<p><div class=" alert alert-success" role="alert" id="messages" ><b>Balasan:</b>{{row.reply}}</div></p>
   	</section> <!-- end article section -->
   		
</article>
<pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" items-per-page="5"></pagination>
 </div>
	<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>



<script type="text/javascript">

app.controller('listVideo', function($scope, $http, $sce) {		
	$scope.url 				= "<?=base_url()?>index.php/admin/c_video/fetchcontent/";
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
<div class="contentMain" ng-controller="listVideo" >	
<table  st-table="datatable" 
class="table table-striped table-condensed table-bordered"  
	style="width:90%; 
			padding-top: 10%; 
			margin-left: 5%; 
			margin-top: 5%;">
	<thead>
        <tr>
            <th>No</th>
            <th st-sort="title">Nama Video</th>
            <th st-sort="postdate">Tanggal buat</th>            
            <th st-sort="author">Link</th>            
            <th>Aksi</th>
        </tr>
      
    </thead>
    <tr>
				<th colspan="6"><input st-search="" class="form-control" placeholder="global search ..." type="text"/></th>
			</tr>
    <tbody>     
        <tr ng-repeat="row in items">
            <td>{{$index+1}}</td>
            <td>{{row.title}}</td>            
            <td>{{row.link}}</td>
            <td>{{row.postdate}}</td>            
            <td><a href="<?=base_url()."index.php/admin/c_video/edit/{{row.videoid}}"?>" class="btn btn-warning" role="button">Edit</a> |
            		<a href="<?=base_url()."index.php/admin/c_video/delete/{{row.videoid}}"?>" class="btn btn-danger" role="button">Delete</a></td>
        </tr>        
    </tbody>
    <tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<div st-pagination="" st-items-by-page="5" st-displayed-pages=""></div>
				</td>
			</tr>
		</tfoot>
</table>
<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>
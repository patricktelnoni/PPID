<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
		
<script type="text/javascript">
	app.controller('listInformasi', function($scope, $http) {
		
		$scope.url	= '<?=base_url()?>index.php/service/admin/c_artikel/listcontent/';
		$scope.items = [];
		fetch(1);
		
		function fetch(page){
			$http.get($scope.url+page).then(function(response) {
			           	//$scope.items			= response.data.content; 
			           	$scope.totalItems 	= response.data.total;
			           	angular.copy(response.data.content, $scope.items)
			}
			           	);
			
		}
			$scope.pageChanged = function() {            
				 fetch($scope.currentPage);
			 }
		//$scope.items = <?php //echo file_get_contents("http://l-lin.github.io/angular-datatables/data.json")?>;
		$scope.jumlahdata=10;
		 				
	});				 	
 </script>			
<div class="contentMain" ng-controller="listInformasi" >	
<table  st-table="items" 
class="table table-striped table-condensed table-bordered"  
	style="width:90%; 
			padding-top: 10%; 
			margin-left: 5%; 
			margin-top: 5%;">
	<thead>
        <tr>
            <th>No</th>
            <th st-sort="title">Nama Dokumen</th>            
            <th st-sort="author">Waktu dan Tempat</th>            
            <th>Aksi</th>
        </tr>
      
    </thead>
    <tr>
				<th colspan="5"><input st-search="" class="form-control" placeholder="global search ..." type="text"/></th>
			</tr>
    <tbody>     
        <tr ng-repeat="row in items">
            <td>{{$index+1}}</td>
            <td>{{row.title}}</td>            
            <td>{{row.author}}</td>            
            <td><a href="<?=base_url()."index.php/service/admin/c_artikel/edit/{{row.id}}"?>" class="btn btn-warning" role="button">Edit</a> |
            		<a href="<?=base_url()."index.php/service/admin/c_artikel/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a></td>
        </tr>        
    </tbody>
    <tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" items-per-page="10"></pagination>
				</td>
			</tr>
		</tfoot>
</table>
<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>




    
	
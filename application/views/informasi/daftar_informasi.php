<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">
	app.controller('listInformasi', function($scope) {
		 $scope.url 				= "<?=base_url()?>index.php/service/c_informasi/listfoto/";
		 $scope.items = [];
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
	});				 	
 </script>			
<div class="contentMain">	
<table class="table table-striped table-condensed table-bordered" name="results" style="padding-top: 10%; margin-left: 5%; margin-top: 10%;">
	<thead>
        <tr>
            <th>No</th>
            <th>Nama Dokumen</th>
            <th>Bentuk Dokumen</th>
            <th>Waktu dan Tempat</th>
            <th>Link</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody ng-controller="listInformasi">     
        <tr ng-repeat="row in items">
            <td>{{row.no}}</td>
            <td>{{row.title}}</td>
            <td>Softcopy</td>
            <td>{{row.content}}</td>
            <td><a href={{row.link}}> Download</a></td>
            <td>{{row.title}}</td>
        </tr>
        
    </tbody>
</table>
	
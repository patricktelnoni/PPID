<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">

	
	app.controller('listFeedback', function($scope, $modal, $log, $http) {	
		$scope.balas = function(status){
			if(status == '1')
				return false;
			else
				return true;
		}
		 $scope.reply = function (feedback) {			
			 var modalInstance = $modal.open({
			        templateUrl	: 'myModalContent.html',
			        controller	: function ($scope, $http, $modalInstance, items, $timeout) {						
						$scope.items = items;
							$scope.selected = {
							    row: $scope.items[feedback]
							};
							//ngModel.$render
							$scope.formData = {feedbackid:$scope.selected.row.id};
							$scope.submit=function()
							{
								//alert('Submitting form..');
								$http({
									  method  	: 'POST',
									  url     		: '<?=base_url()?>index.php/admin/c_reply/reply',
									  data    	: $.param($scope.formData),  // pass in data as strings
									  headers 	: { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
									 }).success(function(data) {
									    console.log(data);

									if (!data.success) {
									      // if not successful, bind errors to error variables
									    $scope.errorReply = data.errors.reply;
										
									} else {
									      // if successful, bind success message to message
										$scope.message = data.message;										
										$timeout(function(){$modalInstance.close($scope.selected.row);}, 3000);
										location.reload();
										//var hider = $scope.balas+'-'+feedback;
										//alert(hider);  
										//$scope.hider=false;
									}
								});
							}
							$scope.ok = function () {								
							    $modalInstance.close($scope.selected.row);							
							};							
				
							$scope.cancel = function () {
							    $modalInstance.dismiss('cancel');
							}
						},
			        resolve		: {
			            items: function () {
			                return $scope.items;
			            }
			        }
			    });

			   /*  modalInstance.result.then(function (selectedCustomer) {
			        $scope.selected.row = $scope.items[index];
			    }, function () {
			        $log.info('Modal dismissed at: ' + new Date());
			    }); */	  
		 }
		 $scope.items = [
			<?php
			 $i=0; 
			foreach($content as $key )
			{ ?>
		 		{no:'<?=$i+1?>',pesan: '<?=$key['pesan']?>' , email: '<?=$key['email']?>', id: <?=$key['feedbackid']?>, nama:'<?=$key['nama']?>', dibalas:'<?=$key['dibalas']?>'}
			 <?php					 
				 if($i != $total-1)	{echo ", \n";}					 
				$i++;						
			}?>				 
		];
		 $scope.jumlahdata=10;				
	});		

			 	
 </script>	
 <script type="text/ng-template" id="myModalContent.html">
  <div class = "modal-header"> <h3> Balas masukan  </h3></div>
<div class=" alert alert-success" role="alert" id="messages" ng-show="message">{{ message }}</div> 
<div class = "modal-body"> 
	<form class="form-horizontal" role="form" >

		<div class = "form-group"> 
			<label class = "col-lg-2 control-label" > Nama: </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="Nama masyarakat" 
                        ng-model="selected.row.nama"
                        ng-value="selected.row.nama"
						disabled="true">
            </div> </div>
<div class = "form-group"> 
			<label class = "col-lg-2 control-label" > Pesan: </label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="Isi masukan" disabled="true" 
                        ng-model="selected.row.pesan"
                        ng-value="selected.row.pesan">
            </div> </div>

<div class = "form-group"> 
			<label class = "col-lg-2 control-label" > Balasan: </label>
            <div class="col-lg-10">
                <textarea name="balasan" id="balasan" class="form-control" rows="5"  required ng-model="formData.reply" ng-class="{ 'has-error' : errorReply }"></textarea>
            </div> </div>

        </form>

</div>
    <div class="modal-footer">
        <button ng-click="submit()" class="btn btn-primary">Balas</button > <button class = "btn btn-warning"  ng-click= "cancel()"> Tutup </button>
    </div >
</script>		
<div class="contentMain" ng-controller="listFeedback">	

<table st-table="items" class="table table-striped table-condensed table-bordered" name="results" style="padding-top: 10%; margin-left: 5%; margin-top: 5%; width:90%;">
	<thead>
        <tr>
            <th>No</th>
            <th>Nama Penulis</th>            
            <th>Email</th>           
            <th>Pesan</th>            
            <th>Aksi</th>
        </tr>
    </thead>
    <tr>
			<th colspan="5"><input st-search="" class="form-control" placeholder="global search ..." type="text"/></th>
	</tr>
    <tbody >     
        <tr ng-repeat="row in items">
            <td>{{$index+1}}</td>
            <td>{{row.nama}}</td>            
            <td>{{row.email}}</td>            
            <td>{{row.pesan}}</td>            
            <td style="float: center;">
            		<a href="<?=base_url()."index.php/c_feedback/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a> &nbsp;|&nbsp;
            		<a href="#" class="btn btn-info" role="button" data-toggle="modal" data-target="#replyModal" ng-click="reply($index)" ng-show="balas({{row.dibalas}})">Balas</a>
            		
  
            		</td>
        </tr>        
    </tbody>
    <tr>
				<td colspan="5" class="text-center">
					<div st-pagination="" st-items-by-page="jumlahdata" st-displayed-pages=""></div>
				</td>
			</tr>
</table>
	<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>
<script type="text/javascript" src="<?=base_url()?>bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>

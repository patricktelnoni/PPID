<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">
	app.controller('listFeedback', function($scope) {
		 $scope.items = [
			<?php
			 $i=0; 
			foreach($content as $key )
			{ ?>
		 		{no:'<?=$i+1?>',pesan: '<?=$key['pesan']?>' , email: '<?=$key['email']?>', id: <?=$key['feedbackid']?>, nama:'<?=$key['nama']?>'}
			 <?php					 
				 if($i != $total-1)	{echo ", \n";}					 
				$i++;						
			}?>				 
		];
		 $scope.jumlahdata=10;				
	});		

			 	
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
            <td>
            		<a href="<?=base_url()."index.php/c_feedback/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a></td>
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
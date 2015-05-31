<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
		
<script type="text/javascript">
	app.controller('listInformasi', function($scope) {
		
		
		$scope.datatable = [
		    			<?php
		    			 $i=0; 
		    			foreach($content as $key )
		    			{ ?>
		    		 		{no:'<?=$i+1?>',title: '<?=$key['judul']?>' , content: '<?=$key['isi']?>', id: <?=$key['artikelid']?>, author:'<?=$key['author']?>'}
		    			 <?php					 
		    				 if($i != $total-1)	{echo ", \n";}					 
		    				$i++;						
		    			}?>				 
		    		];
		
		//$scope.items = <?php //echo file_get_contents("http://l-lin.github.io/angular-datatables/data.json")?>;
		$scope.jumlahdata=10;
		 				
	});				 	
 </script>			
<div class="contentMain" ng-controller="listInformasi" >	
<table  st-table="datatable" 
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
        <tr ng-repeat="row in datatable">
            <td>{{$index+1}}</td>
            <td>{{row.title}}</td>            
            <td>{{row.author}}</td>            
            <td><a href="<?=base_url()."index.php/admin/c_artikel/edit/{{row.id}}"?>" class="btn btn-warning" role="button">Edit</a> |
            		<a href="<?=base_url()."index.php/admin/c_konten/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a></td>
        </tr>        
    </tbody>
    <tfoot>
			<tr>
				<td colspan="5" class="text-center">
					<div st-pagination="" st-items-by-page="jumlahdata" st-displayed-pages=""></div>
				</td>
			</tr>
		</tfoot>
</table>
<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>




    
	
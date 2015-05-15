<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">
	app.controller('listInformasi', function($scope) {

		$scope.jumlahdata=10;
		 $scope.items = [
			<?php
			 $i=0; 
			foreach($content as $key )
			{ ?>
		 		{no:'<?=$i+1?>',title: '<?=$key['judul']?>' , content: '<?=strip_tags($key['isi'])?>', id: <?=$key['infoid']?>, link: '<?=$key['link']?>'}
			 <?php					 
				 if($i != $total-1)	{echo ", \n";}					 
				$i++;						
			}?>				 
		];				
	});				 	
 </script>			
<div class="contentMain" ng-controller="listInformasi">	
<table name="results"  st-table="items" 
class="table table-striped table-condensed table-bordered"  
	style="width:90%; 
			padding-top: 10%; 
			margin-left: 5%; 
			margin-top: 5%;">
	<thead>
        <tr>
            <th>No</th>
            <th>Nama Dokumen</th>
            <th>Bentuk Dokumen</th>
            <th>Waktu dan Tempat</th>
            <th>Link</th>
            <th>Status</th>
            <th>Aksi</th>
            
        </tr>
    </thead>
    <tr>
				<th colspan="7"><input st-search="" class="form-control" placeholder="global search ..." type="text"/></th>
			</tr>
    <tbody >     
        <tr ng-repeat="row in items">
            <td>{{row.no}}</td>
            <td>{{row.title}}</td>
            <td>Softcopy</td>
            <td>{{row.content}}</td>
            <td><a href={{row.link}}> Download</a></td>
            <td>{{row.title}}</td>
            <td><a href="<?=base_url()."index.php/c_artikel/editArticle/{{row.id}}"?>" class="btn btn-warning" role="button">Edit</a> |
            		<a href="<?=base_url()."index.php/c_konten/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a></td>
        </tr>
        
    </tbody>
    <tfoot>
			<tr>
				<td colspan="7" class="text-center">
					<div st-pagination="" st-items-by-page="5" st-displayed-pages=""></div>
				</td>
			</tr>
		</tfoot>
</table>
	<script type="text/javascript" src="<?=base_url()?>smart-table/smart-table.js"></script>
<script type="text/javascript" src="<?=base_url()?>smart-table/lrInfiniteScrollPlugin.js"></script>
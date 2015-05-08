<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">
	app.controller('listInformasi', function($scope) {
		 $scope.items = [
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
	});				 	
 </script>			
<div class="contentMain">	
<table class="table table-striped table-condensed table-bordered" name="results" style="padding-top: 10%; margin-left: 5%; margin-top: 20%;">
	<thead>
        <tr>
            <th>No</th>
            <th>Nama Dokumen</th>            
            <th>Waktu dan Tempat</th>            
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody ng-controller="listInformasi">     
        <tr ng-repeat="row in items">
            <td>{{row.no}}</td>
            <td>{{row.title}}</td>            
            <td>{{row.author}}</td>            
            <td><a href="<?=base_url()."index.php/c_artikel/editArticle/{{row.id}}"?>" class="btn btn-warning" role="button">Edit</a> |
            		<a href="<?=base_url()."index.php/c_konten/delete/{{row.id}}"?>" class="btn btn-danger" role="button">Delete</a></td>
        </tr>        
    </tbody>
</table>
	
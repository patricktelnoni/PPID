<?php		 
		if($this->session->userdata('logged_in'))
		{
			$row = $content->row();
			?>
		<link rel='stylesheet' href='<?=base_url()?>angular/textAngular/src/textAngular.css'>
		<link rel='stylesheet' href='<?=base_url()?>bootstrap/css/bootstrap.css'>
		<link rel='stylesheet' href='<?=base_url()?>dropzone/dropzone.css'>
		<link rel='stylesheet' href='<?=base_url()?>font-awesome/css/font-awesome.min.css'>		
<style>
	.ta-editor {
	  height			: 400px;
	  overflow		: auto;
	  font-family	: inherit;
	  font-size		: 100%;
	  margin			: 20px 0;
	  position		: absolute;
	  top				: 0;
	  width			: 80%;
	}
	.editor-wrapper {
	  position		: relative;
	  height			: 470px;
	}
	.ta-toolbar {
	  padding-top	: 2%;
	  position		: top;
	  bottom			: 0;
	  width			: 100%;
	}
.dropzone {
  width: 250px;
  height: 45px;
  border: 1px solid #ccc;
  text-align: center;
  padding: 30px;
  margin: 20px;
  
  border:none;
  font-family: Arial;
}

.dropzone .dz-default.dz-message span {
  display: none;
}
  .dropzone.dz-drag-hover {
    border-style: none; }
</style>		
				
		<form method="post" id="myAwesomeDropzone" class="dropzone fallback dz-clickable"
			enctype="multipart/form-data" accept-charset="utf-8" 
			action="<?=base_url()?>index.php/admin/c_artikel/save" style="padding-top: 10%; width:100%;">
			<table>
				<tr style="visibility: hidden;">
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="text" name="artikelid" class="form-control" value="<?=$row->artikelid?>"/><br>           
	          		</div></td>  			
	  			</tr>			
				<tr>
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="text"   name="judul" class="form-control" value="<?=$row->judul?>"/><br>           
	          		</div></td>  			
	  			</tr>
	  			<tr >
					<td><label class="col-md-8 control-label">Jenis Berita</label></td>
	          		<td><div class="col-md-4">
	               		<select class="form-control" id="sel1" name="tipe">
						    <option value="1" <?php if($row->jenis == 'Kegiatan'){echo 'selected="selected"';}?> > Kegiatan </option>
						    <option value="2" <?php if($row->jenis == 'Berita Dinas'){echo 'selected="selected"';}?>> Berita Dinas </option>
						    <option value="3" <?php if($row->jenis == 'Umum'){echo 'selected="selected"';}; ?> > Umum </option>									    
						  </select>           
	          		</div>
	          		
	          		</td>  			
	  			</tr>
	  			<tr>
					<td><label class="col-md-8 control-label">Gambar background</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="file" name="background" class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>	
	  			<tr id="editor">
	  				<td><label class="col-md-8 control-label">Isi</label></td>
	  				<td>
		  				<div ng-controller="editorcontrol" class="container app">		  		
			  				<div text-angular="text-angular" name="isi" ng-model="htmlcontent" ></div>		  				
		  				</div>
	  				</td>
	  			</tr>
	  			<tr>  			
	  				<td class="col-md-4 "> <button type="submit" class="btn btn-success">Simpan</button></td>  				
	  			</tr>
	  		</table>  		
  		</form>
  		
		<script type="text/javascript">
		//Dropzone.autoDiscover = false;
			
		        
			app.controller('editorcontrol', function($scope) {
				$scope.htmlcontent = '<div align="left"><?=$row->isi?></div>';
			});	
  		</script>  		
  		
  		
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-rangy.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-sanitize.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular.min.js'></script>
					
		
<?php }?>
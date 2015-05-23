<?php		 
		if($this->session->userdata('logged_in'))
		{?>
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
				
		<form ng-controller="formController"   method="post" id="myAwesomeDropzone" class="dropzone fallback dz-clickable"
			enctype="multipart/form-data" accept-charset="utf-8" 
			action="<?=base_url()?>index.php/c_konten/save/<?=$token?>" style="padding-top: 10%; width:100%;">
			<table>
				<tr>
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="text" name="id" class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>			
				<tr>
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="text" ng-model="name"  name="judul" class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>
	  			<tr >
					<td><label class="col-md-8 control-label">Jenis Berita</label></td>
	          		<td>
		          		<div class="col-md-4">
		               		<select class="form-control" id="sel1" name="tipe" ng-change='loadMenu()'  ng-model="item">
							    <option value="1"> Kegiatan </option>
							    <option value="2"> Berita Dinas </option>
							    <option value="3"> Umum </option>						   			    
							  </select>           
		          		</div>          		
	          		</td>  			
	  			</tr>		  			
	  			<tr id="editor" ng-hide="editor">
	  				<td><label class="col-md-8 control-label">Isi</label></td>
	  				<td>
		  				<input type="file" name="preview">
	  				</td>
	  			</tr>
	  			<tr>  			
	  				<td class="col-md-4 "> <button type="submit" class="btn btn-success">Simpan</button></td>  				
	  			</tr>
	  		</table>  		
  		</form>
  		<script type="text/javascript" src='<?//=base_url()?>angular/angular-dropzone.js '></script>
  		<script type="text/javascript" src='<?=base_url()?>dropzone/dropzone.js '></script>
		<script type="text/javascript">
		
		
			app.controller('formController', function(loadMenu, loadSubMenu, $scope) {		
				 $scope.dropzoneConfig = {
						    'options': { // passed into the Dropzone constructor
						      'url': '<?=base_url()?>index.php/c_konten/save'
						    },
						    'eventHandlers': {
						      'sending': function (file, xhr, formData) {
						      },
						      'success': function (file, response) {
						      }
						    }
						  };	
				$scope.result 		= [];					
			});			
			//angular.module('ppid', ['dropzone']);
			app.controller('editorcontrol', function($scope) {
				$scope.htmlcontent = 'Ketik isi berita di sini...';
			});	
  		</script>  		
  		
  		
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-rangy.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-sanitize.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular.min.js'></script>
		<script src='<?=base_url()?>jquery/jquery.min.js'></script>			
		<script src="<?=base_url()?>angular/angular-file-upload.min.js"></script> 
<?php }?>
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
			action="<?=base_url()?>index.php/c_konten/save" style="padding-top: 10%; width:100%;">
			<table>	
				<tr>
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input style="width:80%;" type="text" ng-model="name"  name="judul" class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>
	  			<tr >
					<td><label class="col-md-8 control-label">Jenis Berita</label></td>
	          		<td><div class="col-md-4">
	               		<select class="form-control" id="sel1" name="tipe" ng-change='loadSub()'  ng-model="item">
						    <option value="kegiatan"> Kegiatan </option>
						    <option value="beritadinas"> Berita Dinas </option>
						    <option value="umum"> Umum </option>
						    <option value="iberkala" > Informasi Berkala </option>
						    <option value="irutin" > Informasi Setiap Saat </option>
						    <option value="imendadak" > Informasi Serta Merta </option>					    
						  </select>           
	          		</div>
	          		<div class="col-md-4" ng-show="submenu">
		          		<select class="form-control" ng-model='submenu' name='submenu'>
		          			<option ng-repeat="menu in result" value="{{menu.id}}">{{menu.name}}</option>
		          		</select>
	          		</div>
	          		</td>  			
	  			</tr>
	  			
	  			<tr id="file"  ng-show="file">
	  				<td><label class="col-md-8 control-label">Attachment</label></td>
			  		<td style="height: 400 px;">				  		  
				  		<div >
						  	<div class="dz-message dz-preview" style="width: 100%;  border: 2px; border-style: dashed; border-color: #808080;" data-dz-message><span>Drop <i>file</i> di sini atau.. </span></div>
						    <input name="file" type="file" multiple />
						    
						    
						  </div>
					</td>
				</tr>
	  			<tr id="editor" ng-hide="editor">
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
  		<script type="text/javascript" src='<?//=base_url()?>angular/angular-dropzone.js '></script>
  		<script type="text/javascript" src='<?=base_url()?>dropzone/dropzone.js '></script>
		<script type="text/javascript">
		//Dropzone.autoDiscover = false;
		var u = window.location.hostname; 

		//Dropzone.prototype.defaultOptions = {
		  
		Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

				  // The configuration we've talked about above
				  url						: '<?=base_url()?>index.php/c_konten/save',
				  autoProcessQueue	: true,
				  uploadMultiple		: false,
				  parallelUploads		: 100,
				  maxFiles				: 100,
				  acceptedFiles		: 'application/pdf',

				  // The setting up of the dropzone
				  init: function() {
				    var myDropzone = this;

				    // First change the button to actually tell Dropzone to process the queue.
				    ///console.log(this);
				     this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
				      // Make sure that the form isn't actually being sent.
				      e.preventDefault();
				      e.stopPropagation();
				      myDropzone.processQueue();
				    });
				  }
				}
		
			app.controller('formController', function(loadChildren, $scope) {		
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
				$scope.loadSub 	= function(){
						var jenis = $scope.item;
						//alert(jenis);
						 if(jenis == 'iberkala'){
								loadChildren.getChildren(1).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								$scope.submenu 	= true;
								$scope.file			= true;
								$scope.editor 		= true;
							 }
						 else if(jenis == 'irutin'){
							 //console.log('informasi rutin');
							 loadChildren.getChildren(2).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								 $scope.submenu = true;
								 $scope.file 		= true;
								 $scope.editor 	= true;
							 }
						 else if(jenis == 'imendadak'){
							 //console.log('informasi serta merta');
							 loadChildren.getChildren(3).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								 $scope.submenu = true;
								 $scope.file 		= true;
								 $scope.editor 	= true;
							 }
						 else{
							 //alert(jenis);
							 //console.log(jenis);
							 $scope.submenu = false;
							 $scope.file 		= false;
							 $scope.editor 	= false; 
							 
						}
					};
					
			}).factory('loadChildren', function($http){
					 var getChildren =  function (jenis){
						 	return $http.get('<?=base_url()?>index.php/c_informasi/getChildren/' + jenis);						 
						 };
						 return {getChildren: getChildren};
					 
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
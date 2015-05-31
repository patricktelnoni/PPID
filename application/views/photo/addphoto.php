<?php		 
		if($this->session->userdata('logged_in'))
		{?>
		<link rel='stylesheet' href='<?=base_url()?>angular/textAngular/src/textAngular.css'>
		<link rel='stylesheet' href='<?=base_url()?>bootstrap/css/bootstrap.css'>
		<link rel='stylesheet' href='<?=base_url()?>dropzone/dropzone.css'>
		<link rel='stylesheet' href='<?=base_url()?>font-awesome/css/font-awesome.min.css'>		
<style>
	
.dropzone {
  width: 250px;
  height: 45px;
  border: 1px solid #ccc;
  text-align: center;
  
  
  
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
			<table style="width:90%;">					
				<tr>
					<td class="col-md-2 "><label class="control-label">Album</label></td>
	          		<td class="col-md-6"><div >
	               		<input style="width:60%;" type="text" ng-model="name"  name="judul" class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>
	  			
	  			<tr id="file">
	  				<td class="col-md-2 "><label class=" control-label">Foto</label></td>
			  		<td style="height: 400 px;">				  		  
				  		<div >
						  	<div class="dz-message dz-preview" style="width: 100%;  border: 2px; border-style: dashed; border-color: #808080;" data-dz-message><span>Drop <i>file</i> di sini atau Klikk </span></div>
						    		    
						  </div>
					</td>
				</tr>	  			
	  			<tr>  			
	  				<td class="col-md-1 "> <button type="submit" class="btn btn-success">Simpan</button></td>  				
	  			</tr>
	  		</table>  		
  		</form>  		
  		<script type="text/javascript" src='<?=base_url()?>dropzone/dropzone.js '></script>
		<script type="text/javascript">
		//Dropzone.autoDiscover = false;
		var u = window.location.hostname; 

		//Dropzone.prototype.defaultOptions = {
		  
		Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

				  // The configuration we've talked about above
				  url						: '<?=base_url()?>index.php/admin/c_informasi/attach/<?=$token?>',
				  autoProcessQueue	: true,
				  uploadMultiple		: true,
				  parallelUploads		: 100,
				  maxFiles				: 100,
				  //acceptedFiles		: 'application/pdf',
				  addRemoveLinks		: true,
				  removedfile			: function(file) {
					  $.ajax({
		                    url			: "<?=base_url()?>index.php/admin/c_foto/removeAttachment",
		                    data		: { tokenId: '<?=$token?>'},
		                    type		: 'POST',
		                    success	: function (data) {
		                        if (data.NotificationType === "Error") {
		                           // toastr.error(data.Message);
		                        } else {
		                            //toastr.success(data.Message);                          
		                        }
		                    },
		                    error: function (data) {
		                        //toastr.error(data.Message);
		                    }
		                }) ;
				      var _ref;
				      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
				      
				    },
				  // The setting up of the dropzone
				  init: function() {
				    var myDropzone = this;
				  
				}
		}
		
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
				$scope.loadMenu 	= function(){
						var jenis = $scope.item;
						//alert(jenis);
						 if(jenis == '4'){
								loadMenu.getMenu(1).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								
							 }
						 else if(jenis == '5'){
							 //console.log('informasi rutin');
							 loadMenu.getMenu(2).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								
							 }
						 else if(jenis == '6'){
							 //console.log('informasi serta merta');
							 loadMenu.getMenu(3).then(function(response){
							        $scope.result = response.data;
							    }, function(error){
							        console.log('opsssss' + error);
							    });
								
							 }
						 else{							 
							 
						}
					};

					$scope.loadSubMenu	=	function(){
							
							var menu = $scope.menu;
							//alert(menu);
							loadSubMenu.getSubMenu(menu).then(function(response){
						        $scope.res = response.data;
						    }, function(error){
						        console.log('opsssss' + error);
						    });
						}
					
			}).factory('loadMenu', function($http){
					 var getMenu =  function (jenis){
						 	return $http.get('<?=base_url()?>index.php/admin/c_menu/getMenu/' + jenis);						 
						 };
						 return {getMenu: getMenu};
						 
					 
				}).factory('loadSubMenu', function($http){
					//alert('Entering sub menu factory');
					var getSubMenu = function (menu)
					{
						return $http.get('<?=base_url()?>index.php/admin/c_menu/getSubMenu/' + menu);
					}
					return {getSubMenu: getSubMenu};
				});			
				
  		</script>  		
  		
  		
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-rangy.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-sanitize.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular.min.js'></script>
		<script src='<?=base_url()?>jquery/jquery.min.js'></script>			
		<script src="<?=base_url()?>angular/angular-file-upload.min.js"></script> 
<?php }?>
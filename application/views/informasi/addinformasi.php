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
			
			 <div class="col-lg-14">
        		
                <div class="col-lg-8 form-group">
                   <div class="col-md-3"> <label for="InputName">Judul</label></div>
                   
                    <div class="col-lg-8 input-group">
                        <input style="width:60%;" type="text" name="id" class="form-control" value=""/><br>
                    </div>
                   
                </div>
                <div class="col-lg-8 form-group">
                    <div class="col-md-3"><label for="InputEmail"> Judul</label></div>
                    <div class="col-lg-8 input-group">
                      <input style="width:60%;" type="text" ng-model="name"  name="judul" class="form-control" value=""/><br>
                    </div>
                
                </div>
                <div class="col-lg-8 form-group">
                    <div class="col-md-3"> <label for="InputEmail">Jenis Informasi</label></div>
                    <div class="col-lg-8 input-group">
                        <select class="form-control" id="sel1" name="tipe" ng-change='loadMenu()'  ng-model="item">						   
						    <option value="4" > Informasi Berkala </option>
						    <option value="5" > Informasi Setiap Saat </option>
						    <option value="6" > Informasi Serta Merta </option>					    
						  </select>      
                    
                    </div>
                </div>
                <div class="col-lg-8 form-group">
                    <div class="col-md-3"> <label for="InputMessage">Menu</label></div>
                    <div class="col-lg-8 input-group">
                        <select class="form-control" ng-model='menu' name='menu' ng-change='loadSubMenu()'>
		          			<option ng-repeat="menu in result" value="{{menu.id}}">{{menu.name}}</option>
		          		</select>
                    </div>                    
                </div>
                
                <div class="col-lg-8 form-group">
                    <div class="col-md-3"> <label for="InputMessage">SKPD</label></div>
                    <div class="col-lg-8 input-group">
                        <select class="form-control" ng-model='submenu' name='submenu'>
		          			<option ng-repeat="submenu in res" value="{{submenu.id}}">{{submenu.name}}</option>
		          		</select>
                    </div>                    
                </div>          
                
                <div class="col-lg-8 form-group">
                    <div class="col-md-3"> <label for="InputMessage">File</label></div>
                    <div class="col-lg-8 input-group">
                        <div class="dz-message dz-preview" style="width: 100%;  border: 2px; border-style: dashed; border-color: #808080;" data-dz-message><span>Drop <i>file</i> di sini atau Klikk </span></div>
                    </div>
                    
                     <div class="table table-striped" class="files" id="previews">
 
  <div id="template" class="file-row">
    <!-- This is used as the file preview template -->
    <div>
        <span class="preview"><img data-dz-thumbnail /></span>
    </div>
    <div>
        <p class="name" data-dz-name></p>
        <strong class="error text-danger" data-dz-errormessage></strong>
    </div>
    <div>
        <p class="size" data-dz-size></p>
        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
        </div>
    </div>
    <div>
      <button class="btn btn-primary start">
          <i class="glyphicon glyphicon-upload"></i>
          <span>Start</span>
      </button>
      <button data-dz-remove class="btn btn-warning cancel">
          <i class="glyphicon glyphicon-ban-circle"></i>
          <span>Cancel</span>
      </button>
      <button data-dz-remove class="btn btn-danger delete">
        <i class="glyphicon glyphicon-trash"></i>
        <span>Delete</span>
      </button>
    </div>
  </div>
 
</div>                    
                </div>                
                  <div class="col-lg-8 form-group">
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-left" style="margin-left: 150px;">
                </div>
            </div>			 		
  		</form>  		
  		<script type="text/javascript" src='<?=base_url()?>dropzone/dropzone.js '></script>
		<script type="text/javascript">
		//Dropzone.autoDiscover = false;
		var u = window.location.hostname; 
		var previewNode = document.querySelector("#template");
		previewNode.id = "";
		var previewTemplate = previewNode.parentNode.innerHTML;
		previewNode.parentNode.removeChild(previewNode); 
		

		//Dropzone.prototype.defaultOptions = {
		  
		Dropzone.options.myAwesomeDropzone = { // The camelized version of the ID of the form element

				  // The configuration we've talked about above
				  url						: '<?=base_url()?>index.php/admin/c_informasi/attach/<?=$token?>',
				  autoProcessQueue	: true,
				  uploadMultiple		: false,
				  parallelUploads		: 100,
				  maxFiles				: 100,
				  acceptedFiles		: 'application/pdf',
				  previewsContainer: "#previews",
				  addRemoveLinks		: true,
				  removedfile			: function(file) {
					  $.ajax({
		                    url			: "<?=base_url()?>index.php/admin/c_informasi/removeAttachment",
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
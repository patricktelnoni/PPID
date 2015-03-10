<div class="contentMain">		
				<div class="slideshow">
					
	<div>
					
    <?php		 
		if($this->session->userdata('logged_in'))
		{?>
		<form method="post" accept-charset="utf-8" action="<?=base_url()?>index.php/c_artikel/save" style="padding-top: 5%;">
		<table >
		
		
			<tr>
				<td><label class="col-md-8 control-label">Judul</label></td>
          		<td><div class="col-md-4">
               		<input type="text" ng-model="name"  class="form-control" value=""/><br>           
          		</div></td>  			
  			</tr>
  			
  			<tr>
  				<td><label class="col-md-8 control-label">Isi</label></td>
  				<td>
	  				<div ng-app="textAngularEditor" ng-controller="editorcontrol" class="container app">
		  		
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
			var myApp_ = angular.module("textAngularEditor", ['textAngular']);
				myApp_.controller('editorcontrol', function($scope) {
				$scope.htmlcontent = 'Type here';
			});	
  		</script>
  		<link rel='stylesheet' href='<?=base_url()?>angular/textAngular/src/textAngular.css'>
<script src='<?=base_url()?>angular/textAngular/dist/textAngular-rangy.min.js'></script>
<script src='<?=base_url()?>angular/textAngular/dist/textAngular-sanitize.min.js'></script>
<script src='<?=base_url()?>angular/textAngular/dist/textAngular.min.js'></script>
<link rel='stylesheet' href='<?=base_url()?>styles/bootstrap.min.css'>
<link rel='stylesheet' href='<?=base_url()?>font-awesome/css/font-awesome.min.css'>

<style>
	.ta-editor {
	  height		: 400px;
	  overflow		: auto;
	  font-family	: inherit;
	  font-size		: 100%;
	  margin		: 20px 0;
	  position		: absolute;
	  top			: 0;
	  width			: 60%;
	}
	.editor-wrapper {
	  position		: relative;
	  height		: 470px;
	}
	/*.ta-toolbar {
	  position		: absolute;
	  bottom		: 0;
	  width			: 60%;
	}*/
</style>
  		
		<?php }?>
					</div>
					
			</div>

	
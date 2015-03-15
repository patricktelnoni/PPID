<?php		 
		if($this->session->userdata('logged_in'))
		{?>
		<link rel='stylesheet' href='<?=base_url()?>angular/textAngular/src/textAngular.css'>
		<link rel='stylesheet' href='<?=base_url()?>bootstrap/css/bootstrap.css'>
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
	  width			: 80%;
	}
	.editor-wrapper {
	  position		: relative;
	  height		: 470px;
	}
	.ta-toolbar {
	  position		: top;
	  bottom		: 0;
	  width			: 100%;
	}
</style>		
		<form method="post" accept-charset="utf-8" action="<?=base_url()?>index.php/c_artikel/save" style="padding-top: 5%;">
			<table>	
				<tr>
					<td><label class="col-md-8 control-label">Judul</label></td>
	          		<td><div class="col-md-4">
	               		<input type="text" ng-model="name"  class="form-control" value=""/><br>           
	          		</div></td>  			
	  			</tr>
	  			
	  			<tr>
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
			//var app = angular.module("ppid", ['textAngular']);
			app.controller('editorcontrol', function($scope) {
				$scope.htmlcontent = 'Type here';
			});	
  		</script>  		
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-rangy.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular-sanitize.min.js'></script>
		<script src='<?=base_url()?>angular/textAngular/dist/textAngular.min.js'></script>		
<?php }?>
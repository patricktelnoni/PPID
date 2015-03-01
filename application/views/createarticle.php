
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
	.ta-toolbar {
	  position		: absolute;
	  bottom		: 0;
	  width			: 60%;
	}
</style>

<?php		 
		if($this->session->userdata('logged_in'))
		{?>
		<form method="post" accept-charset="utf-8" action="<?=base_url()?>index.php/c_artikel/save">
		<table>
		
		
			<tr>
				<td>Judul :</td>
				<td><input type="text" name="judul"></td>  			
  			</tr>
  			
  			<tr>
  				<td>Isi</td>
  				<td>
	  				<div ng-app="textAngularEditor" ng-controller="editorcontrol" class="container app">
		  				<div text-angular="text-angular" name="isi" ng-model="htmlcontent" style="width: 50%"></div>
		  				<div text-angular-toolbar class="toolbar" name="toolbar"></div>
	  				</div>
  				</td>
  			</tr>
  		
  		</table>
  		<br><br><br><br><br><br><br><br>  		
  		<input type="submit" value="Simpan"/>
  		</form>
		<script type="text/javascript">
			var myApp_ = angular.module("textAngularEditor", ['textAngular']);
				myApp_.controller('editorcontrol', function($scope) {
				$scope.htmlcontent = 'Type here';
			});	
  		</script>
		<?php }?>
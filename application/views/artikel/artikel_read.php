<?php echo $this->session->flashdata('message');?>
		<?php $row = $content->row();?>
			<script type="text/javascript">
			app.controller('data', function($scope, $http) {
						$scope.url		= '<?=base_url()?>index.php/service/c_artikel/fetch/read/<?=$this->uri->segment(3)?>';
						 $scope.items = [];
						 fetch();
							
						function fetch(){
							$http.get($scope.url).then(function(response) {
							           	$scope.items			= response.data;								           	
							}
						);
								
					}				
			 	});
			</script>			
			<div class="contentMain" style="margin-top: 25%;" ng-controller="data">		
				<div class="item" ng-class="{active:!$index}" ng-repeat="row in items">
          
              <h2>{{row.judul}}</h2>
              {{row.isi}}.
              
            </div>
          </div>
        </div> 
				
			</div>
              
			
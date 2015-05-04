	
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">	
			
			<div class="contentMain" style="padding-top:5%;">		
				<div class="slideshow">
					
						
					
					<script type="text/javascript">

					app.controller('listInformasi', function(refreshContent, $scope) {
						$scope.menu = <?php echo file_get_contents(base_url().'index.php/c_menu/getSideMenu/2'); ?>;
						$scope.reloadContent = function(detil){
							refreshContent.getContent(detil).then(function(response){
						        $scope.items = response.data;
						    }, function(error){
						        console.log('opsssss' + error);
						    });
							//alert(detil);
							};
						
						 $scope.items = [
							<?php
							 $i=0; 
							foreach($content as $key )
							{ ?>
						 		{judul: '<?=$key['judul']?>' , isi: '<?=$key['isi']?>', id: <?=$key['infoid']?>, link: '<?=$key['link']?>'}
							 <?php					 
								 if($i != $total-1)	{echo ", \n";}					 
								$i++;						
							}?>				 
						];				
					}).factory('refreshContent', function($http){
						var getContent =  function (jenis){
						 	return $http.get('<?=base_url()?>index.php/c_informasi/getContentInformasi/' + jenis);						 
						 };
						 return {getContent: getContent};

						});
				 	
 			</script>
				 </div>
				 
<div class="row" ng-controller='listInformasi'>
			
	<div class="tabbable tabs-left col-sm-3 ">
	<div id='cssmenu' style="padding-top: 10%; margin-top: 10%;">
      <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist" >  
      	 <li class="has-sub" ng-repeat='m in menu' ><a href="#polling" data-toggle="tab" ng-click="reloadContent(m.id)">{{m.name}}</a>
	      	<ul>
	      		<li ng-repeat='sm in filtered = (m.children | filter: query)' ng-class="filtered.length==$index+1?'last':' ' ">
	      				<a href='#' ng-click="reloadContent(sm.id)" ><span>{{sm.name}}</span></a> 
	      		</li>		   		
	      	</ul>	  
	      </li>        
      </ul>
      </div>
    </div>
    <div class="col-xs-4 col-lg-4" ng-repeat='row in items'>
	    <div class="thumbnail">
	      <img src="<?=base_url()."icon/pdf.png"?>" alt="Link download" height="100" width="121">
	      <div class="caption">
	        <h3>{{row.judul}}</h3>
	        
	        <p><a href="{{row.link}}" class="btn btn-primary" role="button">Link sedotnya gan..</a> </p>
	      </div>
	    </div>
              <!-- <h2>{{row.judul}}</h2>              
              <p><a class="btn btn-default" href="{{row.link}}" role="button">Link sedotnya gan</a></p> -->
     </div>  
  
     
			</div>
			 
              
			</div>
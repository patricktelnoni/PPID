<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 <script src="<?=base_url()?>jquery/jquery.min.js"></script>
		<link href="<?=base_url()?>bootstrap/carousel.css" rel="stylesheet">
		<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>bootstrap/assets/docs.min.js"></script>		
			
			
			<div class="contentMain" ng-app="artikel">		
				<div class="slideshow">
					
	<div >
					
    <div id="myCarousel" class="carousel slide" data-ride="carousel" ng-controller='LoopController' style="width: 600px; ">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox"  >
        <div class="item" ng-class="{active:!$index}" ng-repeat="row in items">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>{{row.title}}</h1>
              <p>{{row.content}}.</p>
              
            </div>
          </div>
        </div>        
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
						<!-- <table class="contentToday" ng-controller='LoopController' >
							
								<tr ng-repeat='row in items' class="repeated-item">
									<td style="padding:10px 10px 0 10px">
										<span class="divTitleCenter1x">
											<a class="titleCenter" href="./c_artikel/read/{{row.id}}">
												{{row.title}}
											</a>
										</span>
									</td>
									<td style="padding-left:10px">								
										<br>									
											{{row.content}}	
									</td>
								</tr>				
							
							
						</table> -->
					</div>
					<script type="text/javascript">
					
					var artikel = angular.module('artikel', []);					 
					artikel.controller('LoopController', function($scope) {
						 $scope.items = [
						<?php
						 $i=0; 
						foreach($content as $key )
						{ ?>
						 {title: '<?=$key['judul']?>' , content: '<?=$key['isi']?>', id: <?=$key['artikelid']?>}
						 <?php					 
								 if($i != count($key)-1)
								 	{echo ", \n";}					 
								 $i++;						
								}?>				 
					 ];				
			 	});
 			</script>
				 </div>
				<!-- <div class="mainBatas"></div>
				<div class="listTopik">
				<span style="color:#a8480e"><B><u>HEADLINE</u></B></span><br>
					
					<div style="padding-top:6px"><a class="hrefTopik"><span style="font-weight:bold" title=""></span></a><br>
					<span class="textRight"></span>
					</div>
					<!--<br>
					<a class="hrefTopik" href="index.php?g="><u>more</u>
					</a>-->
					
				<!-- </div>-->
			</div>
              
			
<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 <script src="<?=base_url()?>jquery/jquery.min.js"></script>
		 
		<link href="<?=base_url()?>bootstrap/carousel.css" rel="stylesheet">
		<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>bootstrap/assets/docs.min.js"></script>		
			
			
			<div class="contentMain" ng-app="artikel" style="padding-top:5%;">		
				<div class="slideshow">
					
						
					
					<script type="text/javascript">
					$(document).ready(function() {
					    $( '.dropdown' ).hover(
					        function(){
					            $(this).children('.sub-menu').slideDown(200);
					        },
					        function(){
					            $(this).children('.sub-menu').slideUp(200);
					        }
					    );
					});
					
					var artikel = angular.module('artikel', []);					 
					
				 	artikel.controller('tabs', function($scope){

				 		/*$scope.changeTab = function(tab) {
					 		console.log('Tab controller here...');
				 		    $scope.view_tab = tab;
				 		}
				 		 $scope.view_tab = '1';*/
				 		var tabClasses;
				 		  
				 		  function initTabs() {
				 		    tabClasses = ["","","",""];
				 		  }
				 		  
				 		  $scope.getTabClass = function (tabNum) {
				 		    return tabClasses[tabNum];
				 		  };
				 		  
				 		  $scope.getTabPaneClass = function (tabNum) {
				 		    return "tab-pane " + tabClasses[tabNum];
				 		  }
				 		  
				 		  $scope.setActiveTab = function (tabNum) {
				 		    initTabs();
				 		    tabClasses[tabNum] = "active";
				 		  };
				 		  
				 		  /* $scope.tab1 = "This is first section";
				 		  $scope.tab2 = "This is SECOND section";
				 		  $scope.tab3 = "This is THIRD section";
				 		  $scope.tab4 = "This is FOUTRH section"; */
				 		  
				 		  //Initialize 
				 		  initTabs();
				 		  $scope.setActiveTab(6);
					 	});
				 	artikel.controller('profil', function($scope){
				 		$scope.iMainTabIndex = 1;
				 		  $scope.iTab1Index = 1;
					 	});
				 	
 			</script>
				 </div>
	<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
  <div class="row" ng-controller="tabs">
			
	<div class="tabbable tabs-left col-sm-3 ">
		<div id='cssmenu'>
      <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist">
      	 <li class="has-sub" ng-class="getTabClass(1)" ng-click="setActiveTab(1)">
      	 	<a href="#polling" data-toggle="tab">Bencana Alam / Kebakaran </a>
      	 	 <ul>
               <li><a href='#'><span>Prosedur Peringatan Dini</span></a></li>
               <li><a href='#'><span>Prosedur Peringatan Dini</span></a></li>
               <li><a href='#'><span>Perubahan Status Gunung Kelud</span></a></li>
               <li class='last'><a href='#'><span>Peta Informasi Bencana</span></a></li>
            </ul>
      	 
      	 </li>
         <li ng-class="getTabClass(2)" ng-click="setActiveTab(2)"><a href="#deal" data-toggle="tab">Bencana Non Alam </a></li>
         <li ng-class="getTabClass(3)" ng-click="setActiveTab(3)"><a href="#bond" data-toggle="tab">Bencana Sosial</a></li>
         <li ng-class="getTabClass(4)" ng-click="setActiveTab(4)"><a href="#collateral" data-toggle="tab">Rencana Gangguan </a></li>
         <li ng-class="getTabClass(5)" ng-click="setActiveTab(5)"><a href="#rating" data-toggle="tab">Wabah Penyakit </a></li>
         <li ng-class="getTabClass(6)" ng-click="setActiveTab(7)"><a href="#rating" data-toggle="tab">Makanan Beracun  </a></li>
         <li ng-class="getTabClass(7)" ng-click="setActiveTab(6)"><a href="#rating" data-toggle="tab">Gerakan ISIS </a></li>
         
      </ul>
      </div>
    </div>
    <div class="tab-content col-lg-8">
    	<div ng-class="getTabPaneClass(6)" id="main">     
          <div class="col-lg-5">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-2"></div>
        <div class="col-lg-5">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" style="width: 140px; height: 140px;">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        </div>
        
        <div ng-class="getTabPaneClass(1)" id="deal" ng-controller="profil">
        <p> Mamamaaakkkk Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>   
            
            
         </div>       
        
        <div ng-class="getTabPaneClass(2)" id="bond" ng-controller="profil">     
          <p> Bangkeeee Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        
        <div ng-class="getTabPaneClass(3)" id="collateral" ng-controller="profil">     
          <p>Aseemmmm  Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        
        <div ng-class="getTabPaneClass(4)" id="rating" ng-controller="profil">     
          <p>Galauuuu Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>      
      
      <div ng-class="getTabPaneClass(5)" id="polling" ng-controller="profil">     
         <p> Oraaaaa Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>      
      </div>
        <!-- /.col-lg-4 -->
        
      
      <!-- /.row -->
				 
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
              
			</div>
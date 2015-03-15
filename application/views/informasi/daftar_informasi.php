<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
		 
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
<script type="text/javascript">
					
					//var app = angular.module('ppid', []);					 
					
				 	app.controller('tabController', function($scope){

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
				 	app.controller('profil', function($scope){
				 		$scope.iMainTabIndex = 1;
				 		  $scope.iTab1Index = 1;
					 	});
				 	
 			</script>			
<div class="contentMain">	
	<div class="row" ng-controller="tabController" style="padding-top:5%;">
			
	<div class="tabbable tabs-left col-sm-3 ">
      <div id='cssmenu'>
      <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist">     
      	 <li class="has-sub" ng-class="getTabClass(6)" ng-click="setActiveTab(6)"><a href="#polling" data-toggle="tab">Main</a>
      	 	<ul>
               <li><a href='#'><span>Dasar Hukum</span></a></li>               
               <li class='last'><a href='#'><span>Struktur PPID</span></a></li>
            </ul> 
      	 </li>
         <li class="has-sub" ng-class="getTabClass(1)" ng-click="setActiveTab(1)"><a href="#deal" data-toggle="tab">Profil</a>
         	<ul>
               <li><a href='#'><span>Dasar Hukum</span></a></li>               
               <li class='last'><a href='#'><span>Struktur PPID</span></a></li>
            </ul> 
         </li>
         <li class="has-sub" ng-class="getTabClass(2)" ng-click="setActiveTab(2)"><a href="#bond" data-toggle="tab">Hak & Kewajiban</a>
         	<ul>
               <li><a href='#'><span>Pemohon Informasi</span></a></li>
               
               <li class='last'><a href='#'><span>Badan Publik</span></a></li>
            </ul> 
         </li>
         <li class="has-sub" ng-class="getTabClass(3)" ng-click="setActiveTab(3)"><a href="#collateral" data-toggle="tab">Prosedur</a>
         	<ul>
               <li><a href='#'><span>Permohonan Informasi</span></a></li>
               <li><a href='#'><span>Pengajuan Keberatan</span></a></li>
               <li><a href='#'><span>Pengajuan Sengketa</span></a></li>
               <li><a href='#'><span>Penyelesaian Sengketa</span></a></li>
               <li class='last'><a href='#'><span>Alur Permohonan</span></a></li>
            </ul> 
         </li>
         <li class="has-sub" ng-class="getTabClass(4)" ng-click="setActiveTab(4)"><a href="#rating" data-toggle="tab">Foto Kegiatan</a>
         	<ul>             
               <li class='last'><a href='#'><span>Arsip foto</span></a></li>
            </ul> 
         </li>
         <li ng-class="getTabClass(5)" ng-click="setActiveTab(5)"><a href="#polling" data-toggle="tab">Polling</a></li>
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
        <div ng-class="col-lg-8">
        	<ul class="nav nav-tabs">
		        <li ng-class="{'active': iMainTabIndex == 1}"><a href="" ng-click="iMainTabIndex = 1">Dasar Hukum</a></li>
		        <li ng-class="{'active': iMainTabIndex == 2}"><a href="" ng-click="iMainTabIndex = 2">Struktur PPID</a></li>
		        
		     </ul> 
		     <div class="tab-content ">
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 1}">
	          	
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		                  
	        </div> 
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 2}">
	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		          
	        </div>
	        
	      </div>
        	
        </div>    
            
            
         </div>       
        
        <div ng-class="getTabPaneClass(2)" id="bond" ng-controller="profil">     
          <div ng-class="col-lg-8">
        	<ul class="nav nav-tabs">        	
		        <li ng-class="{'active': iMainTabIndex == 1}"><a href="" ng-click="iMainTabIndex = 1">Permohonan Informasi</a></li>
		        <li ng-class="{'active': iMainTabIndex == 2}"><a href="" ng-click="iMainTabIndex = 2">Badan Publik</a></li>
		        
		        
		     </ul> 
		     <div class="tab-content ">
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 1}">	          	
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		                  
	        </div> 
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 2}">	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		          
	        </div>        
	      </div>
        	
        	</div> 
        </div>
        
        <div ng-class="getTabPaneClass(3)" id="collateral" ng-controller="profil">     
          <div ng-class="col-lg-8">
        	<ul class="nav nav-tabs">        	
		        <li ng-class="{'active': iMainTabIndex == 1}"><a href="" ng-click="iMainTabIndex = 1">Permohonan Informasi</a></li>
		        <li ng-class="{'active': iMainTabIndex == 2}"><a href="" ng-click="iMainTabIndex = 2">Pengajuan Keberatan</a></li>
		        <li ng-class="{'active': iMainTabIndex == 3}"><a href="" ng-click="iMainTabIndex = 3">Pengajuan Sengketa</a></li>
		        <li ng-class="{'active': iMainTabIndex == 4}"><a href="" ng-click="iMainTabIndex = 4">Penyelesaian Sengketa</a></li>
		        <li ng-class="{'active': iMainTabIndex == 5}"><a href="" ng-click="iMainTabIndex = 5">Alur Permohonan</a></li>
		        
		     </ul> 
		     <div class="tab-content ">
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 1}">
	          	
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		                  
	        </div> 
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 2}">	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		          
	        </div>
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 3}">	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		          
	        </div>
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 4}">	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		          
	        </div>
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 5}">	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>		          
	        </div>
	        
	      </div>
        	
        	</div> 
        </div>
        
        <div ng-class="getTabPaneClass(4)" id="rating" ng-controller="profil">     
          <div ng-class="col-lg-8">
        	<ul class="nav nav-tabs">
		        <li ng-class="{'active': iMainTabIndex == 1}"><a href="" ng-click="iMainTabIndex = 1">Arsip foto</a></li>
		        <li ng-class="{'active': iMainTabIndex == 2}"><a href="" ng-click="iMainTabIndex = 2">Daftar album</a></li>
		        
		     </ul> 
		     <div class="tab-content ">
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 1}">
	          	
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		                  
	        </div> 
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 2}">
	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		          
	        </div>
	        
	      </div>
        	
        </div> 
        </div>      
      
      <div ng-class="getTabPaneClass(5)" id="polling" ng-controller="profil">     
          <div ng-class="col-lg-8">
        	<ul class="nav nav-tabs">
		        <li ng-class="{'active': iMainTabIndex == 1}"><a href="" ng-click="iMainTabIndex = 1">Dasar Hukum</a></li>
		        <li ng-class="{'active': iMainTabIndex == 2}"><a href="" ng-click="iMainTabIndex = 2">Struktur PPID</a></li>
		        
		     </ul> 
		     <div class="tab-content ">
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 1}">
	          	
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		                  
	        </div> 
	        <div class="tab-pane col-lg-10" ng-class="{'active': iMainTabIndex == 2}">
	          
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		          
	        </div>
	        
	      </div>
        	
        </div> 
        </div>
      </div>   
    </div>
<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
			
		<link href="<?=base_url()?>styles/sidenav.css" rel="stylesheet">
			
			<div class="contentMain" style="padding-top:5%;">		
				<div class="slideshow">
					
						
					
					<script type="text/javascript">
					
					//var artikel = angular.module('ppid', []);					 
					
				 	app.controller('tabs', function($scope){

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
				 </div>
				 
				  <div class="row" ng-controller="tabs">
			
	<div class="tabbable tabs-left col-sm-3 ">
	<div id='cssmenu'>
      <ul class="nav nav-tabs nav-stacked nav-pills" role="tablist">
      	 <li class="has-sub" ng-class="getTabClass(6)" ng-click="setActiveTab(6)"><a href="#polling" data-toggle="tab">Profil</a>
      	  <ul>
               <li><a href='#'><span>Profil Badan Publik</span></a></li>
               <li><a href='#'><span>Struktur Organisasi</span></a></li>
               <li><a href='#'><span>Profil Pejabat Struktural</span></a></li>
               <li class='last'><a href='#'><span>Lap. Harta Kekayaan Pejabat</span></a></li>
            </ul>   	 
      	 </li>
         <li class="has-sub" ng-class="getTabClass(1)" ng-click="setActiveTab(1)"><a href="#deal" data-toggle="tab">Program dan Kegiatan</a>
         <ul>
               <li><a href='#'><span>Rencana Kerja Tahunan</span></a></li>
               
               <li class='last'><a href='#'><span>Agenda Kegiatan</span></a></li>
            </ul>            
         </li>
         <li class="has-sub" ng-class="getTabClass(2)" ng-click="setActiveTab(2)"><a href="#bond" data-toggle="tab">Keuangan Daerah</a>
         <ul>
               <li><a href='#'><span>Ringkasan RKA - SKPD</span></a></li>
               <li><a href='#'><span>Ringkasan RKA - PPKD </span></a></li>
               <li><a href='#'><span>Raperda APBD </span></a></li>
               <li><a href='#'><span>Raperda Perubahan APBD </span></a></li>
               <li><a href='#'><span>Perda APBD Perda </span></a></li>
               <li><a href='#'><span>Perubahan APBD</span></a></li>
               <li><a href='#'><span>Ringkasan DPA - SKPD </span></a></li>
               <li><a href='#'><span>Ringkasan DPA - PPKD </span></a></li>
               <li><a href='#'><span>Lap. Realisasi Anggaran - SKPD </span></a></li>
               <li><a href='#'><span>Lap. Realisasi Anggaran - PPKD </span></a></li>
               <li><a href='#'><span>Lap. Keuangan Pemerintah Daerah Telah Diaudit </span></a></li>
               <li><a href='#'><span>Opini Atas Lap. Keuangan Pemerintah Daerah </span></a></li>
               <li><a href='#'><span>Neraca </span></a></li>
               <li><a href='#'><span>Laporan Arus Kas </span></a></li>               
               <li class='last'><a href='#'><span>Daftar Aset</span></a></li>
            </ul>         
         </li>
         <li class="has-sub" ng-class="getTabClass(3)" ng-click="setActiveTab(3)"><a href="#collateral" data-toggle="tab">Pengadaan Barang/Jasa</a>
         	<ul>
               <li><a href='#'><span>Rencana Pengadaan</span></a></li>
               <li><a href='#'><span>Pengumuman Pengadaan </span></a></li>
               <li><a href='#'><span>Pemenang Pengadaan </span></a></li>
               <li class='last'><a href='#'><span>Penyedia Barang</span></a></li>
            </ul>          
         </li>
         <li class="has-sub" ng-class="getTabClass(4)" ng-click="setActiveTab(4)"><a href="#rating" data-toggle="tab">Kinerja Badan Publik</a>
         	<ul>
               <li><a href='#'><span>Laporan Akuntabilitas Kinerja Instansi Pemerintah </span></a></li>
               <li><a href='#'><span>Informasi Laporan Penyelenggaraan Pemerintah </span></a></li>
               <li><a href='#'><span>Kota Bontang Dalam Angka</span></a></li>
               <li><a href='#'><span>Indikator Kinerja Utama</span></a></li>
               <li class='last'><a href='#'><span>Penetapan dan Pengukuran Kinerja</span></a></li>
            </ul>      
         </li>
         <li class="has-sub" ng-class="getTabClass(5)" ng-click="setActiveTab(5)"><a href="#polling" data-toggle="tab">Lap Akses Informasi</a>
         	<ul>
               <li class='last'><a href='#'><span>Permohonan Dokumen Publik</span></a></li>
            </ul>	
         </li>
         <li class="has-sub" ng-class="getTabClass(5)" ng-click="setActiveTab(5)"><a href="#polling" data-toggle="tab">Pengaduan Masyarakat</a>
         	<ul>
               <li class='last'><a href='#'><span>Pengaduan Masyarakat Lap. Rekapitulasi Pengaduan</span></a></li>
            </ul> 
         
         </li>
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
        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>   
            
            
         </div>       
        
        <div ng-class="getTabPaneClass(2)" id="bond" ng-controller="profil">     
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        
        <div ng-class="getTabPaneClass(3)" id="collateral" ng-controller="profil">     
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>
        
        <div ng-class="getTabPaneClass(4)" id="rating" ng-controller="profil">     
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        </div>      
      
      <div ng-class="getTabPaneClass(5)" id="polling" ng-controller="profil">     
         <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
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
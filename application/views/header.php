 <script type="text/javascript">		
		app.controller('checkActive', function($scope, $location){
			$scope.isActive = function($path){
				var curUrl 	 = $location.absUrl().substr(<?=strlen(base_url().'index.php/c_')?>);
				var urlLen	 = <?=strlen(base_url().'index.php/c_')?>;
				var endpoint = getNextStop(curUrl, urlLen);
				//alert($path);
				if($location.absUrl().substr(urlLen, endpoint) === $path)
				{				
					return "active";
				}
				else{}
			}
			
		});	
		function getNextStop ($url, len){
			if($url.indexOf("/") === "-1")
			{					
				return 0;
			}
			else{
				var i = 0;
				while(i < $url.length)
				{
					if($url.charAt(i) == "/")
					{						
						return i;
						break;
					}
					i++;
				}
			}				
		}
					
    </script>	 
   <style>
   
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    right: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-left: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    right							: 100%;
    margin-left					: 10px;
    -webkit-border-radius	: 6px 0 6px 6px;
    -moz-border-radius		: 6px 0 6px 6px;
    border-radius				: 6px 0 6px 6px;
}
   </style>
	<nav class="navbar navbar-inverse navbar-fixed-top">
      
        <div class="navbar-header">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?=base_url()?>">PPID Bontang</a>
            </div>          
        </div>
        <div id="navbar" class="navbar-collapse collapse" >
        	<ul class="nav navbar-nav" ng-controller='checkActive'>
                <li ng-class="{ active: isActive('beranda')}"><a href="<?=base_url()?>">Beranda</a></li>
                <li ng-class="{ active: isActive('informasi')}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                	Informasi <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
		                <li><a href="<?=base_url()?>index.php/c_informasi">Daftar Informasi</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_berkala">Informasi berkala</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_rutin">Informasi Setiap Saat</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_mendadak">Informasi Serta Merta</a></li>
                	</ul>
                </li>
                <li ng-class="{ active: isActive('form')}"><a href="<?=base_url()?>index.php/c_feedback/">Permintaan Data</a></li>
                
                
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> --> 
              </ul>
        <?php if(!$this->session->userdata('logged_in')){?>
        
          
          <div class="navbar-right">
          <form class="navbar-form" action="<?=base_url()?>index.php/c_authentication/login" method="POST">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
         	<a class="btn btn-success" href="<?=base_url()?>index.php/c_registration">Sign Up</a>	  
         	    
          </form>
          
         
         	
          
          
          <?php 
			}
          else {?>
          <div class="navbar-form navbar-right">
          
          <ul class="nav navbar-nav" ng-controller='checkActive'>
                
                <li ng-class="{ active: isActive('informasi')}">
                <div class="dropdown btn-group ">
        			<button class="btn btn-info">Manajemen</button>
       				 <button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret" style="height: 20px;"></span></button>
			        <ul class="dropdown-menu multi-level" role="menu">
			          <li class="dropdown-submenu pull-left">
			          	<a class="trigger left-caret" href="#">Artikel</a>
			          		<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>index.php/admin/c_artikel/listcontent">Daftar Artikel</a></li>
								<li><a href="<?=base_url()?>index.php/admin/c_artikel/add">Tambah Artikel</a></li>
							</ul>
			          </li>
			          <li class="divider"></li>
			          <li class="dropdown-submenu pull-left">
			          		<a class="trigger left-caret" href="">Informasi</a>
			          		<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>index.php/admin/c_informasi/listcontent">Daftar Informasi</a></li>
								<li><a href="<?=base_url()?>index.php/admin/c_informasi/add">Tambah Informasi</a></li>
							</ul>
			          </li>
			          <li class="divider"></li>
			          <li class="dropdown-submenu pull-left">
			          		<a class="trigger left-caret" href="">Saran</a>
			          		<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>index.php/admin/c_feedback/listcontent">Daftar Saran</a></li>
								
							</ul>
			          </li>
			         <li class="divider"></li>
			          <li class="dropdown-submenu pull-left">
			          		<a class="trigger left-caret" href="">Gallery Video</a>
			          		<ul class="dropdown-menu">
								<li><a href="<?=base_url()?>index.php/admin/c_video/listcontent">Daftar Video</a></li>
								<li><a href="<?=base_url()?>index.php/admin/c_video/add">Tambah Video</a></li>
							</ul>
			          </li>
			        </ul>
			    </div>
                <!-- <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-expanded="false">
                
                	Manajemen <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
		                <li><a href="<?=base_url()?>index.php/admin/c_informasi/listcontent">Artikel</a></li>
		                <li><a href="<?=base_url()?>index.php/admin/c_informasi/listcontent">Informasi</a></li>
		                
                	</ul> -->
                </li>
          </ul> &nbsp;
          <!-- <button class="btn btn-info" onclick="window.location='<?//=base_url()?>index.php/admin/c_informasi/listcontent'">Manajemen Informasi</button>
          <button class="btn btn-info" onclick="window.location='<?//=base_url()?>index.php/admin/c_artikel/listcontent'">Manajemen Artikel</button>
          	<button class="btn btn-primary" onclick="window.location='<?//=base_url()?>index.php/c_konten/createcontent'">Buat Artikel</button> -->
          	<button class="btn btn-success" onclick="window.location='<?=base_url()?>index.php/c_authentication/logout'">Log Out</button>
          </div>
           
          <?php
			}?>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
   
   

 
   	
        <div class="clearboth">
        </div>

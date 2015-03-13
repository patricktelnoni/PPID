	
<nav class="navbar navbar-inverse navbar-fixed-top" ng-app="navigasi">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">PPID Bontang</a>
            </div>          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav" ng-controller="activeLink">
                <li ng-class="{ active: isActive('beranda')}"><a href="#">Beranda</a></li>
                <li ng-class="{ active: isActive('informasi')}"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                	Informasi <span class="caret"></span></a>
                	<ul class="dropdown-menu" role="menu">
		                <li><a href="<?=base_url()?>index.php/c_informasi">Daftar Informasi</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_berkala">Informasi berkala</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_rutin">Informasi Setiap Saat</a></li>
		                <li><a href="<?=base_url()?>index.php/c_informasi/informasi_mendadak">Informasi Serta Merta</a></li>
                	</ul>
                </li>
                
                
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
          	<button class="btn btn-primary" onclick="window.location='./c_artikel/createarticle'">Buat Artikel</button>
          	<button class="btn btn-success" onclick="window.location='./c_authentication/logout'">Log Out</button>
          </div>
           
          <?php
			}?>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    <script type="text/javascript">
		var app = angular.module('navigasi', []);
		app.controller('activeLink', function($scope, $location){
			$scope.isActive = function($path){
				var endpoint = getNextStop($location.absUrl().substr(<?=strlen(base_url().'index.php/c_');?>), (<?=strlen(base_url().'index.php/c_');?>));
				//alert($path);
				if($location.absUrl().substr(<?=strlen(base_url().'index.php/c_');?>, endpoint) === $path)
				{
					//alert($location.absUrl().substr(<?=strlen(base_url().'index.php/c_');?>, endpoint));	
					return "active";
				}
				else{			
					//alert(endpoint);
							
					//alert($location.absUrl().substr(<?=strlen(base_url().'index.php/c_');?>, 44));
				}
			}

			function getNextStop ($url, len){
				if($url.indexOf("/") === "-1")
				{
					//alert("no backslash");
					return 0;
				}
				else{
					var i = 0;
					while(i < $url.length)
					{
						if($url.charAt(i) == "/")
						{
							//alert(i);
							return i;
							break;
						}
						i++;
					}
				}
				
			}
			
				//alert(<?php echo strlen(base_url().'index.php/c_'); ?>);
			 		
			});

		
				
    </script>
        
   	<script src="<?=base_url()?>jquery/jquery.min.js"></script>

	<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>bootstrap/assets/docs.min.js"></script>
    	        
        <div class="clearboth">
        </div>
 
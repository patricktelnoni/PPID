
<nav class="navbar navbar-inverse navbar-fixed-top">
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
        <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
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
                </li>
              </ul>
        <?php if(!$this->session->userdata('logged_in')){?>
        <script type="text/javascript">
		/*var app = angular.module('nav', []);
		app.controller('link', ['$scope', '$http',
		 function($scope, $http){
			
			$scope.redirect = function(){
				  window.location = "c_registration";
			}
			$scope.login = function(){
				 // window.location = "c_authentication/login";
				//console.log('Login');
				$http.post('<?=base_url()?>index.php/c_authentication/login', {'email': $scope.email, 'password': $scope.password})
				.success(function(data) {
				    console.log(data);

				    if (!data.success) {
				      // if not successful, bind errors to error variables
				      $scope.errorName = data.errors.name;
				      $scope.errorSuperhero = data.errors.superheroAlias;
				    } else {
				      // if successful, bind success message to message
				      $scope.message = data.message;
				    }
				  })
				.error();          
	              
				}
			}]);*/

		
				
        </script>
          <form class="navbar-form navbar-right" action="./c_authentication/login" method="POST">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
            <button class="btn btn-success" ng-click="redirect()">Sign Up</button>
          </form>
          
          <?php }?>
          
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
    
    	        
        <div class="clearboth">
        </div>
 
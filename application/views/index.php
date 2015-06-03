<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
<meta charset="UTF-8">
<head>
<title>Web PPID Bontang</title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<link href="<?=base_url()?>bootstrap/css/bootstrap.css" rel="stylesheet">

<script type="text/javascript" src="<?=base_url()?>angular/angular.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.0/angular-animate.js"></script>
<script src="<?=base_url()?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/app.js"></script>
<script type="text/javascript" src="<?=base_url()?>bootstrap/ui-bootstrap-tpls-0.13.0.js"></script>
</head>

<body ng-app="ppid">
<!-- <p>Nothing here {{'yet' + '!'}}</p> <br>
		 <p>1 + 2 = {{ 1 + 2 }}</p>	  -->
		
	<div class="wrap">
		<?php $header!=''?$this->load->view($header):'';?>
		           
		<div class="clearboth"></div>
		<div class="content" id="contentDraw">

			
			<?php	
			$body!=''?$this->load->view($body):'';
			//$this->load->view($body);
			?>
			<div class="clearboth"></div>   

			
			  
		
				

							
			</div>
			</div>
			<?php $left != ''?$this->load->view($left):'';?>                          
				<div class="clearboth">
				</div>
		
	    </div>
<?php
		
	$footer != ''?$this->load->view($footer):'';	
		//$this->load->view('footer');
?>
	</div>                


 	



<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>bootstrap/assets/docs.min.js"></script>
	

</body>

  
</html>
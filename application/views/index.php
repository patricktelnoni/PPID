<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
<meta charset="UTF-8">
<head>
<title>Web PPID Bontang</title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<link href="<?=base_url()?>bootstrap/css/bootstrap.css" rel="stylesheet">


<script type="text/javascript" src="<?=base_url()?>angular/angular.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/app.js"></script>
</head>

<body ng-app="ppid">
<!-- <p>Nothing here {{'yet' + '!'}}</p> <br>
		 <p>1 + 2 = {{ 1 + 2 }}</p>	  -->
		
	<div class="wrap">
		<?php $header!=''?$this->load->view($header):'';?>
		<div class="menu floatLeft">
		
		
		</div>           
		<div class="clearboth"></div>
		<div class="content" id="contentDraw">
		<table align="left" cellpadding="0" cellspacing="0">
		<tr>
			
		<td class="contentCenter-0">
			 
			
			<?php	
			$body!=''?$this->load->view($body):'';
			//$this->load->view($body);
			?>
			<div class="clearboth"></div>   
			</td>
			
			  
		</tr>
         <tr>
				<!-- ISI BAGIAN KIRI -->
				    

		<th bgcolor="#FFFFFF" class="contentLeft-1" style="padding-top:5px">
			 <!-- <div class="leftAtas">
					<div class="header_menu"><img src="images/home.png" width="224" height="112" alt="ABOUT US" />
					
			</div>
			</div>-->
			<?php $left != ''?$this->load->view($left):'';?>                          
				<div class="clearboth">
				</div>
		</th>
		 
				
				                                          
            </tr>
        </table>
	    </div>
<?php
		
	$footer != ''?$this->load->view($footer):'';	
		//$this->load->view('footer');
?>
	</div>                

</body>

  	<script src="<?=base_url()?>jquery/jquery.min.js"></script>   		
	<script src="<?=base_url()?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>bootstrap/assets/docs.min.js"></script>
</html>
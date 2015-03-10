<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
<meta charset="UTF-8">
<head>
<title>Web PPID Bontang</title>
<link rel="shortcut icon" href="./favicon.ico"/>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<link href="<?//=base_url()?>styles/style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>styles/menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url()?>styles/dropdown/menuatas.css" />
<link href="<?=base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<!--
.style1 {font-size: 18px}
-->
</style>
<script type="text/javascript" src="<?=base_url()?>angular/angular.js"></script>



<link rel="stylesheet" href="<?=base_url()?>styles/slideshowtheme.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript">
/* $.(document).ready(function() {
$('.slideshow').before('<div id="navg">').cycle({
fx:'fade',
speed: '1000',
timeout: 4000,
pager: '#navg',
pagerClick: function(){$('.slideshow').cycle('pause');}
});
}); */
</script>

<!-- <script type="text/javascript" src="./library/functions.js"></script>
<script type="text/javascript" language="javascript" src="./library/stuHover.js"></script>
<script type="text/javascript" src="./library/scrolltext.js"></script> -->
</head>

<body>
<!-- <p>Nothing here {{'yet' + '!'}}</p> <br>
		 <p>1 + 2 = {{ 1 + 2 }}</p> -->	 
		
	<div class="wrap">
		<?php $header!=''?$this->load->view($header):'';?>
		<div class="menu floatLeft">
		<?php $this->load->view('/library/menu.php');?>
		
		</div>           
		<div class="clearboth"></div>
		<div class="content" id="contentDraw">
		<table align="left" cellpadding="0" cellspacing="0">
		<tr>
			
		<td class="contentCenter-0">
			 
			
			<?php		 
		if($this->session->userdata('logged_in'))
		{
			echo anchor('c_artikel/createarticle', 'Buat tulisan', 'title="Buat tulisan baru"');
			}
			$body!=''?$this->load->view($body):'';
			//$this->load->view($body);
			?>
			<div class="clearboth"></div>   
			</td>
			<?php $right !=''?$this->load->view($right):'';//$this->load->view('menukanan');?>
			  
		</tr>
         <tr>
				<!-- ISI BAGIAN KIRI -->
				<?php// include("view/menuhome.php"); ?>      

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
</html>
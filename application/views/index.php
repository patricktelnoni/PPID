<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
<meta charset="UTF-8">
<head>
<title>Web PPID Bontang</title>
<link rel="shortcut icon" href="./favicon.ico"/>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<link href="<?=base_url()?>styles/style.css" rel="stylesheet" type="text/css" />
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
			
		<td class="contentCenter-0"  colspan="2">
			<div id="cse" style="width:100%;height"></div> 
			
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
		 
			
				<!-- ISI BAGIAN TENGAH -->                    
				<td valign="top" class="contentCenter-0">
                    <div class="contenCenter">
						       
						<div class="contentCenter-2">
							<div  class="divTitleCenter1">
								<a href="index.php?g=activity_list" style="text-decoration:none; color:#000"> Kegiatan Mendatang</a>
							</div>	
							
							<table class="contentEdit" cellpadding="4" width='100%' height="100%" id="reportTable" style="padding:0 5px 0 5px;">
								
								<tr>
								
									<td class="listHome">
										<table border="0" height="100%" cellspacing="0">
										<tr>
											<td style="vertical-align:top; text-align:left" height="20%">
											<a class="titleListDefault"  href="index.php?g=activity&id=<?=$row['activityId']?>" title="<?=$row['name']?>"><?=substr($row['name'],0,50)."..."?></a>
											</td>
										</tr>
										<tr>
											<td style="vertical-align:top" height="80%">
											
														<img border="none" style="padding:5px 5px 1px 0" align="left" src="<?=$row['imagePath']?>" width="60" alt="" />
												
											<span class="textHome"> <?=substr($row['description'],0,200)."..."?></span><br>
											</td>
										</tr>
										</table>
									</td>
									<?php
									
								
								?>		
							</tr>			
							</table>
							
							<?php
							if ($y>0)
							{
							?>							
								<a class="titleTextLeft" style="" href="index.php?g=activity_list" title="Lihat semua Kegiatan">Lihat Semua Kegiatan>></a>										
							<?php
							}
							else
							{
								//echo "TIDAK ADA KEGIATAN MENDATANG LAIN";
							}
							?>	
							<br><br>
							<div  class="divTitleCenter1">
							<a href="index.php?g=article_list" style="text-decoration:none; color:#000">Artikel Terbaru</a>
							</div>	
							
						<table class="contentEdit" cellpadding="4" width='100%' id="reportTable" style="padding:0 5px 0 5px;">
							
							<tr>
							
									<td class="listHome">
										<table border="0" height="100%" cellspacing="0">
										<tr>
											<td style="vertical-align:top; text-align:left" height="90%">
											<a class="titleListDefault"  href="index.php?g=articles&id=<?=$row['articleId']?>" title="<?=$row['title']?>"><?=substr($row['title'],0,50)."..."?></a>
											<br><span class="textListDefault">
												<?=!empty($row['authorName'])?"Oleh ".$row['authorName'].", ":''?>
													<?php echo DateTimeToDate($row['postDate'],'-').", "?>
													Dibaca: <?php echo $row['hit']?><?if ($numComment>0) echo", ".$numComment." Komentar"?>
											</span>
											</td>
										</tr>
										<tr>
											<td style="vertical-align:top" height="90%">
										
														<img border="none" style="padding:5px 5px 1px 0" align="left" src="<?=$row['imagePath']?>" width="60" alt="" />
												
											<span class="textHome"> <?=substr($row['description'],0,150)."..."?></span><br>
											</td>
										</tr>
										</table>
									</td>
									
						</tr>	
							
						</table>							
							
							<?php
							if ($y>0)
							{
							?>							
								<a class="titleTextLeft" style="" href="index.php?g=article_list" title="Lihat semua Artikel">Lihat Semua Artikel>></a>										
							<?php
							}
							else
							{
								echo "TIDAK ADA ARTIKEL";
							}
							?>	
						</div>
					                </td>
				
				                                          
            </tr>
        </table>
	    </div>
<?php	
	$footer!=''?$this->load->view($footer):'';	
		//$this->load->view('footer');
?>
	</div>                

</body>
</html>
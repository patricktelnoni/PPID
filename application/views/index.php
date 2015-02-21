<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Perkantas Jawa Timur</title>
<meta name="description" content="<?=substr("Perkantas memuridkan, membina, mempersiapkan siswa dan mahasiswa Kristen, menjadi pemimpin masa depan. Moto Perkantas: Student Today Leader Tomorrow. Perkantas Indonesia",0,160)?> "/>
<meta name="keywords" content="perkantas,perkantas jatim, pemuridan, ktb, kelompok tumbuh bersama, kristen, christian, student ministry, jawa timur, surabaya, pelayanan, mahasiswa, siswa, alumni, menulis"/>
<meta name="google-site-verification" content="SPBSm3NRgbYLLVLYjMNTYMOdRKMyciz9lUbX1dlF6zQ" />
<link rel="shortcut icon" href="./favicon.ico"/>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<link href="./styles/style.css" rel="stylesheet" type="text/css" />
<link href="./styles/menu.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="./styles/dropdown/menuatas.css" />
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<script type="text/javascript" src="./library/jquery/jquery.js"></script>
<script type="text/javascript" src="./library/jquery/jquery.cycle.min.js"></script>
<script type="text/javascript" src="./library/jquery/jquery.cycle.all.min.js"></script>
<link rel="stylesheet" href="./styles/slideshowtheme.css" type="text/css" media="screen" charset="utf-8" />
<script type="text/javascript">
$(document).ready(function() {
$('.slideshow').before('<div id="navg">').cycle({
fx:'fade',
speed: '1000',
timeout: 4000,
pager: '#navg',
pagerClick: function(){$('.slideshow').cycle('pause');}
});
});
</script>
<script type="text/javascript" src="./library/functions.js"></script>
<script type="text/javascript" language="javascript" src="./library/stuHover.js"></script>
<script type="text/javascript" src="./library/scrolltext.js"></script>
</head>

<body>
	<div class="wrap">
		<?php $this->load->view(header);?>
		<div class="menu floatLeft">
		<?php include("./library/menu.php");?>
		</div>                    
		<div class="clearboth"></div>
		<div class="content" id="contentDraw">
		<table align="left" cellpadding="0" cellspacing="0">
		<tr>
			<td class="contentCenter-0"  colspan="2" style="padding-bottom:10px">
			<div id="cse" style="width:100%;height"></div> 
			<div class="contentMain">		
				<div class="slideshow">
					<?php foreach ($data as $main){?>
					<div>
						<table class="contentToday">
							<tr>
								<td style="padding:10px 10px 0 10px"><img src="<?=$main['imagePath']?>" width="370" height="235" /></td>
							</tr>
							<tr>
								<td style="padding-left:10px">
									<b><u><?=$main['contentCategory']?></u></b><br>
									<span class="divTitleCenter1x">
										<a class="titleCenter" href="index.php?g=<?=$main['contentTarget']?>&id=<?=$main['contentId']?>"><u><?=!empty($main['name'])?$main['name']:$main['title']?></u></a>
									</span>	
								</td>
							</tr>
						</table>
					</div>
					<?php }?>
				 </div>
				<div class="mainBatas"></div>
				<div class="listTopik">
				<span style="color:#a8480e"><B><u>HEADLINE</u></B></span><br>
					<?php foreach ($data as $main){?>
					<div style="padding-top:6px"><a class="hrefTopik" href="index.php?g=<?=$main['contentTarget']?>&id=<?=$main['contentId']?>"><span style="font-weight:bold" title="<?=!empty($main['name'])?$main['name']:$main['title']?>"><?=substr(!empty($main['name'])?$main['name']:$main['title'],0,54)?></span></a><br>
					<span class="textRight"><?=substr($main['description'],0,72)."..."?></span>
					</div>
					<!--<br>
					<a class="hrefTopik" href="index.php?g=<?=$main['contentTarget']?>&id=<?=$main['contentId']?>"><u>more</u>
					</a>-->
					<?php }?>
				</div>
			</div>
             <div class="clearboth"></div>    
			</td>
			<?php include("view/menukanan.php"); ?>   
		</tr>
         <tr>
				<!-- ISI BAGIAN KIRI -->
				<?php// include("view/menuhome.php"); ?>      

		<th bgcolor="#FFFFFF" class="contentLeft-1" style="padding-top:5px">
			 <!-- <div class="leftAtas">
					<div class="header_menu"><img src="images/home.png" width="224" height="112" alt="ABOUT US" />
					
			</div>
			</div>-->
			<?php include("view/menukiri.php"); ?>                          
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
								<?php
								$y = 0;
								$i=0;
								//print_r($listBook);
								$list = $activity->getNextActivities($data['activityId']);
								foreach ($list as $row)
								{
									$i++;
								if ($i<=2){
									//$numComment = $comment->countComment($row['articleId'],$ARTICLE_TABLE);
									if ($y==2){
										echo "</tr><tr>	";
										$y = 0;
									}
									$y++;
									?>
									<td class="listHome">
										<table border="0" height="100%" cellspacing="0">
										<tr>
											<td style="vertical-align:top; text-align:left" height="20%">
											<a class="titleListDefault"  href="index.php?g=activity&id=<?=$row['activityId']?>" title="<?=$row['name']?>"><?=substr($row['name'],0,50)."..."?></a>
											</td>
										</tr>
										<tr>
											<td style="vertical-align:top" height="80%">
											<?
												if (!empty($row['imagePath'])){?>
														<img border="none" style="padding:5px 5px 1px 0" align="left" src="<?=$row['imagePath']?>" width="60" alt="" />
												<?php
												}
												?>	
											<span class="textHome"> <?=substr($row['description'],0,200)."..."?></span><br>
											</td>
										</tr>
										</table>
									</td>
									<?php
									}
									else break;
								}
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
							<?php
							$y = 0;
							$list = $article->getRightArticle();
							$i=0;
							foreach ($list as $row)
							{
								$i++;
								if ($i<=6)
								{
									$numComment = $comment->countComment($row['articleId'],$ARTICLE_TABLE);
									if ($y==2){
										echo "</tr><tr>	";
										$y = 0;
									}
									$y++;
									?>
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
											<?
												if (!empty($row['imagePath'])){?>
														<img border="none" style="padding:5px 5px 1px 0" align="left" src="<?=$row['imagePath']?>" width="60" alt="" />
												<?php
												}
												?>	
											<span class="textHome"> <?=substr($row['description'],0,150)."..."?></span><br>
											</td>
										</tr>
										</table>
									</td>
									<?php
								}
								else break;
							}
							?>		
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
					</div>	
					<!--<object width="400" height="300">
						<param name="movie" value="http://www.youtube.com/v/TRK2Y1cZaME&hl=en&fs=1&"></param>
						<param name="allowFullScreen" value="true"></param>
						<param name="allowscriptaccess" value="always"></param>
						<embed src="http://www.4shared.com/embed/151982126/4ae8ce81" width="400" height="20" allowfullscreen="true" allowscriptaccess="always" flashvars="autostart=false"></embed>
					</object>-->
					<!--<embed src="http://www.youtube.com/v/s392HyzQ79M&hl=en&fs=1&&autoplay=1" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="400" height="300"></embed>-->

                </td>
				<!-- ISI BAGIAN KANAN -->
				                                          
            </tr>
        </table>
	    </div>
<?php		
		$this->load->view('footer');
?>
	</div>                
<?php include("./view/google_analytic.php");?>
</body>
</html>
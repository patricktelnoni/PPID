<?php echo $this->session->flashdata('message');?>
		<?php //print_r($content);?>
			
			<div class="contentMain">		
				<div class="slideshow">
					
					<div>
						<table class="contentToday">
							
							<?php
							$i=0; 
							foreach($content as $key )
							{
								//print_r($key);
								//echo $key;
								//echo $content[$key][$val]['judul'];
							
								?>
							<tr>
								<td style="padding:10px 10px 0 10px">
									<span class="divTitleCenter1x">
										<a class="titleCenter" href="./c_artikel/read/<?=$key['artikelid']?>">
											<?=$key['isi']?>
										</a>
									</span>
								</td>
							</tr>
							<tr>
								<td style="padding-left:10px">
									
									<br>
									
										<?=$key['judul']?>
									
								</td>
							</tr>
							<?php }?>
						</table>
					</div>
					
				 </div>
				<div class="mainBatas"></div>
				<div class="listTopik">
				<span style="color:#a8480e"><B><u>HEADLINE</u></B></span><br>
					
					<div style="padding-top:6px"><a class="hrefTopik"><span style="font-weight:bold" title=""></span></a><br>
					<span class="textRight"></span>
					</div>
					<!--<br>
					<a class="hrefTopik" href="index.php?g="><u>more</u>
					</a>-->
					
				</div>
			</div>
              
			
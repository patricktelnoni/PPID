<?php echo $this->session->flashdata('message');?>
		<?php $row = $content->row();?>
			
			<div class="contentMain" style="margin-top: 25%;">		
				
				<div class="listTopik">
				<h2><?=$row->judul?></h2>
									<span class="divTitleCenter1x">
										
											<?=$row->isi?>
										
									</span>
				
					
					<div style="padding-top:6px"><a class="hrefTopik"><span style="font-weight:bold" title=""></span></a><br>
					<span class="textRight"></span>
					</div>
					<!--<br>
					<a class="hrefTopik" href="index.php?g="><u>more</u>
					</a>-->
					
				</div>
			</div>
              
			
$scope.items = [
			<?php
			 $i=0; 
			foreach($content as $key )
			{ ?>
		 		{no:'<?=$i+1?>',title: '<?=$key['judul']?>' , content: '<?=$key['isi']?>', id: <?=$key['artikelid']?>, author:'<?=$key['author']?>'}
			 <?php					 
				 if($i != $total-1)	{echo ", \n";}					 
				$i++;						
			}?>				 
		];
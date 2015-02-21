<?

  session_start();
  header("Cache-control: private"); // fix problem with IE6 
  	if(isset($_SESSION['SMEPAPBDSESS']))
	{
		  //$timeout = 300;
		  ///
		  
		  /// 

  	} 
	else 
	{
		//session_destroy();
		
		header("location: ./login.php?".rand()."");
		//exit;
  	}



?>

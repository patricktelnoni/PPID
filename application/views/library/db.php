<?php
Class db
{
	public $Host 	  = "localhost";
	public $UserName = "root";
	public $Password = "";
	public $Database = "perkantasjatim";
	 // public $Host 	  = "localhost";
	 // public $UserName = "perkant1_pkjatim";
	 // public $Password = "!3perkantasjatim#";
	 // public $Database = "perkant1_perkantasjatim";
	function Db_Connect()
	{
		$MySqlConn = mysql_connect($this->Host, $this->UserName, $this->Password);
		mysql_select_db($this->Database,$MySqlConn)or die ('Could not select database');;
	}
	
	function Db_Close()
	{
		mysql_close();
	}
}
?>

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends CI_Model {

	/**	 
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>	 
	 */
	function __construct()
    {
        parent::__construct();
    }
	
	public function login($username, $password)
	{
		$sql = "
				SELECT *
				FROM user 
				WHERE username 	= '".$username."'
				AND password = MD5(SHA1('".$password."'))				
				";
		$query = $this->db->query($sql);
		
		if($query->num_rows() != 0)
		{
			$row 		= $query->row_array();				
			$user_data 	= array(
						   'userid'  	=> $row['userid'],
			               'username'  	=> $row['username'],						   
			               'logged_in' 	=> TRUE
			               );
			$this->session->set_userdata($user_data);
			echo "{success: true}";		
		}
		else {
			echo "{success:false, errors: { reason: 'Username atau password tidak cocok !' }}";
		}		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/models/M_Login.php */
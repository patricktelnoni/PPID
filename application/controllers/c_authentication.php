<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_authentication extends public_abstraction {

	public function __construct() {
		parent:: __construct();
		$this->load->model(array('m_artikel', 'm_authentication'));		
		$this->load->library('pbkdf2');
		
		$config['iterations'] 	= 500;
		$config['hash_length'] 	= 64;
		$config['salt_length'] 	= 16;
		
		$this->pbkdf2->initialize($config);
		
	}
	public function login()
	{		
		$data = $this->m_authentication->read();
		//print_r($data);
		if($data){
			$pbkdf2 = $this->pbkdf2->encrypt($this->input->post('password'), $data['password'], TRUE);
			
			if ($pbkdf2->hash === $data['password'])
			{
				$newdata = array(
						'username'  => $data['email'],						
						'logged_in' => TRUE
				);
				
				$this->session->set_userdata($newdata);
				redirect('c_artikel');
				//$this->session->set_flashdata('message', 'ciyeee login pake salt ciyee');
			}
			else
			{
				$this->session->set_flashdata('message', 'ciyeee ditolak ciyee');
				redirect('c_authentication ');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Ga terdaftar dodoll');
			redirect('c_authentication ');
		}
		 
		
		//redirect('c_authentication ');
	}
	public function logout()
	{
		$this->session->sess_destroy();
        redirect('./');
	}
	public function index()
	{
		$data = array();
		//$this->output->set_header('Content-type: text/javascript');
		$page['header']	= 'header';	
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/artikel/artikel';
		$page['page']	= 'index';				
		
		$artikel = $this->m_artikel->read();

		//echo "artikel";
		//print_r($artikel);
		$i=0;		
	 	foreach ($artikel->result_array() as $row)
		{	
			$data['content'][$i]['artikelid']	= $row['artikelid'];
			$data['content'][$i]['judul'] 		= $row['judul'];
			$data['content'][$i]['isi'] 		= $row['isi'];
			
			$i++;
		} 
		$data['total']		= $artikel->num_rows();
		//print_r($data);
		
		parent::loadPage(array_merge($page, $data));
		
	}
	
}

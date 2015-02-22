<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_registration extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_login');
	}
	public function login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$this->m_login->login($username, $password);
	}
	
	public function index()
	{
		//$this->output->set_header('Content-type: text/javascript');
		$this->load->view('registration');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_artikel extends abstraction {
	
	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_user');
	}
	public function login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$this->m_login->login($username, $password);
	}
	public function listuser()
	{
		echo $this->m_user->listuser();
	}
	public function adduser()
	{
		
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$this->m_user->adduser($username, $password);
	}
	public function updateuser()
	{
		$userid 	= $this->input->post('userid');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$this->m_user->updateuser($userid, $username, $password);
	}
	public function deleteuser()
	{
		$userid 	= $this->input->post('userid');
		$this->m_user->deleteuser($userid);
	}
	public function index()
	{
		//$this->output->set_header('Content-type: text/javascript');
		$this->load->view('index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
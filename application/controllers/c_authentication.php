<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class c_authentication extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_authentication');
	}
	public function login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$this->m_login->login($username, $password);
	}
	public function logout()
	{
		$this->session->sess_destroy();
        redirect('./');
	}
	public function index()
	{
		//$this->output->set_header('Content-type: text/javascript');
		$data['body'] = 'body';
		$this->load->view('index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
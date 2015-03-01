<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class private_abstraction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loginCheck();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	private function loginCheck()
	{
		if (!$this->session->userdata ('logged_in')) {
			redirect ("c_authentication");
		}
		else{
			
		}
	}
	
	public function loadPage($page=array())
	{		
		foreach ($page as $val => $key)
		{
			
			$load[$val] = $key;
		}			
		$mainpage = $page['page'];		
		
		$this->load->view($mainpage, $load);
	}
}

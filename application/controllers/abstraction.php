<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class abstraction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->loginCheck();
	}
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function loginCheck()
	{
		if (!$this->session->userdata ('logged_in')) {
			redirect ("c_login");
		}
		else{
			/*
			 * Rediret to some action
			 * */
		}
	}
}

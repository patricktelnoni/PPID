<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/abstraction/public_abstraction.php';

class c_registration extends public_abstraction {

	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_authentication');
	}
	public function signup()
	{
		$this->m_authentication->save();
	}
	
	public function index()
	{
		//$this->output->set_header('Content-type: text/javascript');
		parent:: loadPage('registration');
		/* $data['body'] = 'registration';
		$this->load->view('index', $data); */
	}
}

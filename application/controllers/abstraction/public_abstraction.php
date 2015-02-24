<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_abstraction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->loginCheck();
	}
	
	/*  public function index()
	{
		 $data['body'] = 'registration';
		$this->load->view('welcome_message'); 
	}  */
	
	public function loadPage($body)
	{
		$data['body'] = $body;
		$this->load->view('index', $data);
	}
}

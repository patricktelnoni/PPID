<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_abstraction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->loginCheck();
	}
		
	public function loadPage($page=array(), &$data=null)
	{
		//print_r($data);
		foreach ($page as $val => $key)
		{			
			$load[$val] = $key;
		}
		$mainpage = $page['page'];
		
		if($data !== null)
		{
			foreach ($data as $val => $key)
			{
					
				$load[$val] = $key;
			}
		}
		//print_r($load);
		$this->load->view($mainpage, $load);
	}
}

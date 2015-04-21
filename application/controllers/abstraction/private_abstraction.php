<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class private_abstraction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('m_artikel');
		$this->loginCheck();
		//echo "private abstraction construct";
	}
	
	public function index()
	{
		/* $data = array();
		
		$page['header']	= 'header';	
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'artikel/artikel';
		$page['page']	= 'index';
				
		$artikel = $this->m_artikel->read();	
		
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
		
		$this->loadPage(array_merge($page, $data)); */
	}
	
	public function loginCheck()
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

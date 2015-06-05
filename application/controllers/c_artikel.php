<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';

class c_artikel extends public_abstraction{ 
	
	private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model('m_artikel');
		$this->load->helper('string');
	}
	public function index()
	{		
		$data = array();
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'artikel/artikel';
		$page['page']		= 'index';
				
		$artikel 				= $this->m_artikel->read();	
		
		$i=0;		
	 	foreach ($artikel->result_array() as $row)
		{	
			$data['content'][$i]['artikelid']		= $row['artikelid'];
			$data['content'][$i]['judul'] 			= $row['judul'];
			$data['content'][$i]['isi'] 				= $row['isi'];
			$data['content'][$i]['background'] 	= $row['background'];
			
			$i++;
		} 
		$data['total']		= $artikel->num_rows();
		//print_r($data);
		
		parent::loadPage(array_merge($page, $data));
	}
	
	public function postAttachment()
	{
		print_r($_FILES);
	}

	
	public function read()
	{
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'artikel/artikel_read';
		$page['page']		= 'index';
		
		
		parent::loadPage($page);
	}

	
	
}

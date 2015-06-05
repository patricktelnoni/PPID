<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_artikel extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model(array('m_artikel', 'm_konten'));
		$this->load->helper('string');
	}
	public function index()
	{		
	
	}	
	
	public function listcontent()
	{
		$data = array();
		
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/artikel/listartikel';
		$page['page']	= 'index';		
		
		parent::loadPage($page);
	}
	
	
	public function edit()
	{
		$data = array();
		
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/artikel/editarticle';
		$page['page']	= 'index';
		
		$artikel['content'] = $this->m_artikel->read();
		
		parent::loadPage(array_merge($page, $artikel));
	}
	
	public function delete()
	{
		$this->m_artikel->delete();
		redirect('c_artikel/listArtikel');
	}

	public function add()
	{
		$page['body']		= 'artikel/addarticle';
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		
		$page['page']		= 'index';
		
		$data['token']		= random_string('alnum', 30);
		
		parent::loadPage(array_merge($page, $data));
	}
	
}

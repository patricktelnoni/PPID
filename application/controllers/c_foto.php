<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_foto extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper(array('url', 'captcha'));
		$this->load->library('session');
		$this->load->model('m_foto');
	}
	public function index()
	{		
		$data = array();		
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'photo/gallery';
		$page['page']		= 'index';
				
		
		parent::loadPage($page);
	}
	
	public function gallery()
	{
		
	}
		
	public function viewAlbum()
	{
		$data = array();		
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'photo/viewalbum';
		$page['page']		= 'index';
				
		
		parent::loadPage($page);
	}	
	
}
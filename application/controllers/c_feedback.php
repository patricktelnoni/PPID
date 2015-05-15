<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_feedback extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper('url');
		
		$this->load->model('m_feedback');
	}
	public function index()
	{		
		$data = array();
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'feedback/form_feedback';
		$page['page']		= 'index';
				
		parent::loadPage($page);
	}
	
	public function save()
	{		
		//print_r($_POST);
		$data = array(
				'nama'	=> $this->input->post('nama'),				
				'email'	=> $this->input->post('email'),
				'pesan'	=> $this->input->post('pesan')
		);
		if($this->input->post('id') == '')
			$this->m_feedback->create($data);
		else
			$this->m_feedback->update($data);
		
		redirect('c_artikel');
	}
}
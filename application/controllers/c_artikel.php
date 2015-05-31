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
			$data['content'][$i]['background'] 	= base_url().$row['background'];
			
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
	public function save()
	{		
		//print_r($_POST);
		//echo $_FILES[];
		//print_r($_FILES['uploadFile']['name']);
		/* $data = array(
				'penulis'	=> $this->session->userdata('username'),				
				'isi'			=> $this->input->post('isi'),
				'judul'		=> $this->input->post('judul')
		);
		if($this->input->post('id') == '')
			$this->m_artikel->create($data);
		else
			$this->m_artikel->update($data);
		
		redirect('c_artikel'); */
	}
	
	public function read()
	{
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'artikel/artikel_read';
		$page['page']		= 'index';
		
		$artikel['content'] = $this->m_artikel->read();
		
		parent::loadPage(array_merge($page, $artikel));
	}

	
	
}

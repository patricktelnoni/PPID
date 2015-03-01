<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/abstraction/private_abstraction.php';

class c_artikel extends private_abstraction {
	
	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_artikel');
	}
	public function index()
	{		
		$data = array();
		
		$page['header']	= 'header';	
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer;';
		$page['body']	= 'artikel';
		$page['page']	= 'index';
				
		$artikel = $this->m_artikel->read();	
		
		$i=0;		
	 	foreach ($artikel->result_array() as $row)
		{			
			$data['content'][$i]['judul'] = $row['judul'];
			$data['content'][$i]['isi'] = $row['isi'];
			$i++;
		} 
		//print_r($data);
		
		parent::loadPage(array_merge($page, $data));
	}
	function createarticle()
	{
		$page['header']	= 'header'; 
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer;';
		$page['body']	= 'createarticle';
		$page['page']	= 'index';
		/* $page	= array(
				'body' 	=> 'createarticle',
				'header'=> 'header',
				'page' 	=>'index',
				'left'	=> '',
				'right' => 'menukanan'
		); */
		parent::loadPage($page);
		
	}
	
	function save()
	{		
		//print_r($_POST);
		$data = array(
				'penulis'	=> $this->session->userdata('username'),				
				'isi'		=> $this->input->post('isi'),
				'judul'		=> $this->input->post('judul')
		);
		if($this->input->post('id') == '')
			$this->m_artikel->create($data);
		else
			$this->m_artikel->update($data);
		
		redirect('c_artikel');
	}
}

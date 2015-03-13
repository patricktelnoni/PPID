<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/abstraction/public_abstraction.php';

class c_informasi extends public_abstraction {
	
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
		$page['footer']	= 'footer';
		$page['body']	= 'informasi/daftar_informasi';
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
		
		parent::loadPage(array_merge($page, $data));
	}
	
	public function informasi_berkala()
	{
		$page['header']	= 'header';	
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'informasi/informasi_berkala';
		$page['page']	= 'index';
		
		parent::loadPage($page);
		
	}
	
	public function informasi_rutin()
	{
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'informasi/informasi_rutin';
		$page['page']	= 'index';
	
		parent::loadPage($page);
	
	}
	
	public function informasi_mendadak()
	{
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'informasi/informasi_mendadak';
		$page['page']	= 'index';
	
		parent::loadPage($page);
	
	}
	public function save()
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
	
	public function read()
	{
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'artikel/artikel_read';
		$page['page']	= 'index';
		
		$artikel['content'] = $this->m_artikel->read();
		
		parent::loadPage(array_merge($page, $artikel));
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_artikel extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model(array('m_informasi', 'm_artikel', 'm_konten'));
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
		
		$artikel = $this->m_artikel->read();
		
		//echo "artikel";
		//print_r($artikel->num_rows());
		$i=0;
		foreach ($artikel->result_array() as $row)
		{
			$data['content'][$i]['artikelid']	= $row['artikelid'];
			$data['content'][$i]['author']		= $row['penulis'];
			$data['content'][$i]['judul'] 		= $row['judul'];
			$data['content'][$i]['isi'] 			= $row['isi'];
		
			$i++;
		}
		$data['total']		= $artikel->num_rows();
				
		if($artikel->num_rows() > 0)
			parent::loadPage(array_merge($page, $data));
		else 
			parent::loadPage($page);
	}
	
	public function save()
	{
		$tipe = $this->input->post('tipe');
		
		$data = array(
				'penulis'	=> $this->session->userdata('username'),
				'isi'			=> $this->input->post('isi'),
				'judul'		=> $this->input->post('judul'),
				'jenis'		=> $this->input->post('jenis')
		);
		
			if($this->input->post('id') == '')
				$this->m_artikel->create($data);
			else
				$this->m_artikel->update($data);
		
		
			
		
		redirect('c_artikel');
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

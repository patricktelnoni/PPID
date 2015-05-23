<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_informasi extends c_konten{ 
	
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
		$page['body']	= '/informasi/listinformasi';
		$page['page']	= 'index';
		
		$artikel = $this->m_informasi->read();	
		
		$i=0;		
	 	foreach ($artikel->result_array() as $row)
		{	
			$data['content'][$i]['infoid']	= $row['infoid'];
			$data['content'][$i]['judul'] 	= $row['judul'];
			$data['content'][$i]['isi'] 		= $row['isi'];
			$data['content'][$i]['link']		= base_url().$row['file'];
			
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
				'penulis'		=> $this->session->userdata('username'),
				'isi'				=> $this->input->post('isi'),
				'judul'			=> $this->input->post('judul'),
				'jenis'			=> $this->input->post('jenis'),
				'tgl' 			=> date("Y-m-d"),
				'tipe_info' 	=> $this->input->post('menu'),
				'sub_info' 	=> $this->input->post('submenu')
		);
		
			$isToken 	= $this->m_informasi->cekToken();
				
			//print_r($isToken);
			if($this->input->post('id') == ''){
				if($isToken->num_rows() > 0)
					$this->m_informasi->updatePost($data, $isToken->row()->infoid);
				else
					$this->m_informasi->create($data);
			}
			else{
				$this->m_informasi->update($data);
			}
		
		redirect('c_artikel');
	}
	
	public function edit()
	{
		$data = array();
		
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/informasi/editinformasi';
		$page['page']	= 'index';
		
		$artikel['content'] = $this->m_artikel->read();
		
		parent::loadPage(array_merge($page, $artikel));
	}
	
	public function delete()
	{
		$this->m_informasi->delete();
		redirect('c_informasi/listArtikel');
	}

	public function add()
	{
		$page['body']		= 'informasi/addinformasi';
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		
		$page['page']		= 'index';
		
		$data['token']		= random_string('alnum', 30);
		
		parent::loadPage(array_merge($page, $data));
	}
	
}

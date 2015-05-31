<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_foto extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model(array('m_foto'));
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
		$page['body']	= '/informasi/listkonten';
		$page['page']	= 'index';
		
		$artikel = $this->m_artikel->read();		
		
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
		$data2 		= array('tgl' 			=> date("Y-m-d"),
									'tipe_info' 	=> $this->input->post('menu'),
									'sub_info' 	=> $this->input->post('submenu'));
			
		$data 		= array_merge($data, $data2);
		$isToken 	= $this->m_informasi->cekToken();				

		if($this->input->post('id') == ''){
			if($isToken->num_rows() > 0)
				$this->m_foto->updatePost($data, $isToken->row()->infoid);
			else
				$this->m_foto->create($data);
		}
		else{
			$this->m_foto->update($data);
		}
			redirect('c_artikel');
	}
	
	public function add()
	{
		$data = array();
	
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/photo/addphoto';
		$page['page']	= 'index';
	
		$data['token']		= random_string('alnum', 30);
		
		parent::loadPage(array_merge($page, $data));
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
	
	public function attach()
	{
		
	}
	
	public function delete()
	{
		$this->m_informasi->delete();
		redirect('c_informasi/listcontent');
	}	
}

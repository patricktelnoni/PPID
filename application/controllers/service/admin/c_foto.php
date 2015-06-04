<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_foto extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model(array('m_foto'));
		$this->load->helper('string');
		$this->load->library('image_lib');
		
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
		$data 		= array('nama'	=> $this->input->post('album'),
									'token'	=> $this->uri->segment(4));		
		//$isToken 	= $this->m_foto->cekToken();				

		/* if($this->input->post('id') == ''){
			if($isToken->num_rows() > 0)
				$this->m_foto->updatePost($data, $isToken->row()->infoid);
			else */
				$this->m_foto->create($data);
		/* }
		else{
			$this->m_foto->update($data);
		} */
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
	
	private function make_thumb($file = array()) {
		
		//print_r($file);
		$config1['image_library'] 		= 'gd2';
		$config1['source_image']		= './upload/foto/'.$file['file_name'];		
		$config1['new_image'] 			= './upload/foto/thumbs/'.$file['file_name'];
		$config1['maintain_ratio'] 		= TRUE;
		$config1['create_thumb'] 		= TRUE;
		$config1['height'] 				= '150';
		$config1['width'] 					= '150';
			
		$this->load->library('image_lib'); //load library
		$this->image_lib->initialize($config1);
		$this->image_lib->resize();
		$this->image_lib->clear();
		
		return $config1['new_image']."";
		
	}
	
	public function attach()
	{		
		$upload = parent::postAttachment('foto');	
		$thumbs = $this->make_thumb($upload);
		$this->m_foto->postAttachment('./upload/foto/'.$upload['file_name'], $thumbs);
	}
	
	public function delete()
	{
		$this->m_informasi->delete();
		redirect('c_informasi/listcontent');
	}	
}

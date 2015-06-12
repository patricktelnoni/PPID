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
	
	public function save()
	{			
		$data 		= array('nama'	=> $this->input->post('album'),
									'token'	=> $this->uri->segment(4));		
		
				$this->m_foto->create($data);
	
			redirect('c_artikel');
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
		$this->m_foto->delete();
		redirect('c_foto/listcontent');
	}	
}

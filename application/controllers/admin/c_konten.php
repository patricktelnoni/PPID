<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/../abstraction/private_abstraction.php';

class c_konten extends private_abstraction {
	
	public function __construct() {
		parent:: __construct();		
		$this->load->helper(array("file", 'url'));
		$this->load->model(array('m_informasi', 'm_artikel', 'm_konten'));
	}
	
	public function loadPage($content=array())
	{
		//print_r($content['content']);
		parent::loadPage($content);
	}
	public function index()
	{		
		
	}	
	
	public function postAttachment($tipe="")
	{			
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['file']['name']);
		for($i=0; $i<$cpt; $i++)
		{
		
				$_FILES['file']['name']			= $files['file']['name'][$i];
				$_FILES['file']['type']				= $files['file']['type'][$i];
				$_FILES['file']['tmp_name']		= $files['file']['tmp_name'][$i];
				$_FILES['file']['error']				= $files['file']['error'][$i];
				$_FILES['file']['size']				= $files['file']['size'][$i];
		
				$config['upload_path'] 		= './upload/'.$tipe;
				$config['allowed_types'] 	= 'gif|jpg|png|JPEG|JPG|PNG|pdf';
				$config['max_size']      		= '0';
    			$config['overwrite']     		= FALSE;
				$config['max_width'] 		= '0';
				$config['max_height'] 		= '0';
				
				
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload('file'))
				{
					echo $this->upload->display_errors();						
				}
				else{
					$fInfo = $this->upload->data();
					
					return $fInfo;
				}
		
		
		} 

								
	}
	public function removeAttachment()
	{
		$filePath = $this->m_konten->removeAttachment();
		
		if($filePath->num_rows() > 0)
		{	
			$path = $filePath->row();		
			unlink($path->file);
		}	
	}
	public function save()
	{		
		//print_r($_POST);
		
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
	public function listcontent()
	{
	
	}
	
	public function edit()
	{
	
	}
	
	public function delete()
	{
	
	}
		
	public function add()
	{
			
	}	
		
	
}

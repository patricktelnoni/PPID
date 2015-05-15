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
	
	public function postAttachment()
	{	
		if(isset($_FILES)){			
			$path = './upload/'.$_FILES['file']['name'];
			if (file_exists("./upload/" . $_FILES['file']['name']."/"))
			{
				echo "{success:false, errors:{reason: 'File untuk nama yang sama sudah diupload.' }}";
			}
			else
			{
				if(move_uploaded_file($_FILES["file"]["tmp_name"], "./upload/" . $_FILES['file']['name']))
				{				
					$this->m_konten->postAttachment($path);
				}
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
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'artikel/createarticle';
		$page['page']		= 'index';
	
		$data['token']		= random_string('alnum', 30);
	
		parent::loadPage(array_merge($page, $data));
	
	}	
		
	
}

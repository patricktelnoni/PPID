<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/abstraction/private_abstraction.php';

class c_konten extends private_abstraction {
	
	public function __construct() {
		parent:: __construct();		
		$this->load->helper(array("file", 'url'));
		$this->load->model(array('m_informasi', 'm_artikel', 'm_konten'));
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
		$tipe = $this->input->post('tipe');
		
		$data = array(
				'penulis'	=> $this->session->userdata('username'),
				'isi'			=> $this->input->post('isi'),
				'judul'		=> $this->input->post('judul'),
				'jenis'		=> $this->input->post('jenis')
		);
		if($tipe == '1' OR $tipe == '2' OR $tipe == '3')
		{			
			if($this->input->post('id') == '')
				$this->m_artikel->create($data);
			else
				$this->m_artikel->update($data);
		}			
		else{
			//print_r($_POST);
			$data2 		= array('tgl' 			=> date("Y-m-d"),
										'tipe_info' 	=> $this->input->post('menu'),
										'sub_info' 	=> $this->input->post('submenu'));
			$data 		= array_merge($data, $data2);
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
		}		
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
	
	public function delete()
	{
		$this->m_artikel->delete();
		redirect('c_artikel/listArtikel');
	}
}

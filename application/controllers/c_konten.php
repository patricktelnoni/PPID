<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/abstraction/private_abstraction.php';

class c_konten extends private_abstraction {
	
	public function __construct() {
		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('m_konten');
		$this->load->helper("file");
		//$this->load->model('m_informasi');
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
		print_r($_POST);
		$tipe = $this->input->post('tipe');
		
		if($tipe == 'kegiatan' OR $tipe == 'beritadinas' OR $tipe == 'umum')
		{
			$data = array(
					'penulis'	=> $this->session->userdata('username'),
					'isi'			=> $this->input->post('isi'),
					'judul'		=> $this->input->post('judul')
			);
			/* if($this->input->post('id') == '')
				$this->m_artikel->create($data);
			else
				$this->m_artikel->update($data); */
		}			
		else{
			if(isset($_FILES))
			{
				print_r($_FILES);
			}
		}		
		//redirect('c_artikel');
	}
	
	public function upload()
	{
		
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

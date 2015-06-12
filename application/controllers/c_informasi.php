<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once 'c_konten.php';
require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_informasi extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper('url');
		
		$this->load->model('m_informasi');
	}
	public function index()
	{		
		$data = array();
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'informasi/daftar_informasi';
		$page['page']		= 'index';		
		
		parent::loadPage($page);
	}	
	
	
	
	public function getContentInformasi()
	{
		$data = array();
		$content = $this->m_informasi->readInformasi();
		
		$i=0;
		foreach ($content->result_array() as $row)
		{
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']	= base_url().$row['file'];
			$i++;
		}
		
		echo json_encode($data);
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

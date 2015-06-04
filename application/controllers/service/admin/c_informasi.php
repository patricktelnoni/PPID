<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';
//require_once dirname(__FILE__).'/../../abstraction/private_abstraction.php';

class c_informasi extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model('m_informasi');
		
		$this->load->helper('string');
	}
	public function index()
	{		
		$data = array();
		
		$info = $this->m_informasi->read();
		
		$i=0;
		foreach ($info['query']->result_array() as $row)
		{
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']		= base_url().$row['file'];
				
			$i++;
		}
		
		$total		= $info['total']->num_rows();
		
		$result = array('total' 		=> $total,
				'content'	=> $data);
		echo json_encode($result);
	}	
	
	public function listcontent()
	{		
		$data = array();
		
		$info = $this->m_informasi->read();	
		//print_r($info);
		$i=0;		
	 	foreach ($info['query']->result_array() as $row)
		{	
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']		= base_url().$row['file'];
			
			$i++;
		}		
				
		$total		= $info['total']->num_rows();
		
		$result = array('total' 		=> $total,
				'content'	=> $data);
		echo json_encode($result);
		
	}
	
	public function attach(){
		$path = parent::postAttachment('informasi');
		$this->m_informasi->postAttachment($path);
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

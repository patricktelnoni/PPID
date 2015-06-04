<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '/../abstraction/public_abstraction.php';
class c_informasi extends public_abstraction{ 


	public function __construct() {
		//echo "constructor here";
		parent:: __construct();		
		$this->load->helper('url');
		
		$this->load->model('m_informasi');
	}
	public function index()
	{		
		$data = array();		
		$i=0;
		
		$info = $this->m_informasi->read();
	 	foreach ($info['query']->result_array() as $row)
		{	
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']		= base_url().$row['file'];
			
			$i++;
		} 
		
		$total		= $info['total']->num_rows();
		
		$result = array(
				'total'		=>		$total,
				'content'	=>		$data);
		
		echo json_encode($result);
	}	
	
	public function listcontent()
	{
		$data = array();		
		$i=0;
		
		$info = $this->m_informasi->read();
	 	foreach ($info['query']->result_array() as $row)
		{	
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']		= base_url().$row['file'];
			
			$i++;
		} 
		
		$total		= $info['total']->num_rows();
		
		$result = array(
				'total'		=>		$total,
				'content'	=>		$data);
		
		echo json_encode($result);
	}
	
	public function getContentInformasi()
	{
		$data = array();
		$content = $this->m_informasi->readInformasi();
		
		$i=0;
		//print_r($content);
		foreach ($content['query']->result_array() as $row)
		{
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']	= base_url().$row['file'];
			$i++;
		}
		
		$total = $content['total']->num_rows();
		$result = array('total' 	=> $total,
							'content'	=> $data);
		echo json_encode($result);
	}
	
	public function informasi_berkala()
	{
		$data = array();
	
		if($this->uri->segment(3))
			$artikel = $this->m_informasi->readInformasi();
		else
			$artikel = $this->m_informasi->readInformasi(1);
	
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
	
		parent::loadPage(array_merge($page, $data));
	
	}
	public function informasi_rutin()
	{	
		if($this->uri->segment(3))
			$artikel = $this->m_informasi->readInformasi();
		else 
			$artikel = $this->m_informasi->readInformasi(2);
		
		$i=0;
		foreach ($artikel->result_array() as $row)
		{
			$data[$i]['infoid']	= $row['infoid'];
			$data[$i]['judul'] 	= $row['judul'];
			$data[$i]['isi'] 		= $row['isi'];
			$data[$i]['link']		= base_url().$row['file'];
				
			$i++;
		}
		$data['total']		= $artikel->num_rows();
		
		echo json_encode($data);
			
	
	}
	
	public function informasi_mendadak()
	{
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= 'informasi/informasi_mendadak';
		$page['page']	= 'index';
	
		if($this->uri->segment(3))
			$artikel = $this->m_informasi->readInformasi();
		else 
			$artikel = $this->m_informasi->readInformasi(3);
		
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
		
		parent::loadPage(array_merge($page, $data));
	
	}
	public function save()
	{		
		
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

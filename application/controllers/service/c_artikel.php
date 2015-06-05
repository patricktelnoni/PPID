<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/../abstraction/public_abstraction.php';

class c_artikel extends public_abstraction{ 
	
	private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model('m_artikel');
		$this->load->helper('string');
	}
	public function fetch()
	{			
		$data=array();		
		$artikel 				= $this->m_artikel->read();	
		//print_r($artikel);
		$i=0;		
	 	foreach ($artikel->result_array() as $row)
		{	
			$data[$i]['artikelid']		= $row['artikelid'];
			$data[$i]['judul'] 			= $row['judul'];
			$data[$i]['isi'] 				= strip_tags($row['isi']);
			$data[$i]['background'] 	= base_url().$row['background'];
			
			$i++;
		} 
		//$data['total']		= $artikel->num_rows();
		
		echo json_encode($data);
		
		
	}
	
	public function postAttachment()
	{
		print_r($_FILES);
	}
	public function save()
	{		
		
		$data = array(
				'penulis'	=> $this->session->userdata('username'),				
				'isi'			=> $this->input->post('isi'),
				'judul'		=> $this->input->post('judul')
		);
		if($this->input->post('id') == '')
			$this->m_artikel->create($data);
		else
			$this->m_artikel->update($data);
		
		
	}
	
	public function read()
	{		
		
		$artikel['content'] = $this->m_artikel->read();
		
		
	}

	
	
}

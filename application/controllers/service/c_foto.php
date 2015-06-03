<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_foto extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper(array('url', 'captcha'));
		$this->load->library('session');
		$this->load->model('m_foto');
	}
	

	public function listalbum()
	{
		$album 				= $this->m_foto->read();
		
		$i=0;
		foreach ($album->result_array() as $row)
		{
			$data[$i]['albumid']	= $row['albumid'];
			$data[$i]['nama'] 		= $row['nama'];
			
			$foto = $this->m_foto->getFoto($row['albumid']);
			
			$res = $foto->row();
			
				$data[$i]['fotoid']	= $res->fotoid;
				$data[$i]['path']	= base_url().$res->path;
			
			
			$i++;
		}
		$total		= $album->num_rows();
		
		$result = array(	'total'		=>		$total,
								'content'	=>		$data);
		
		echo json_encode($result);		
	}
	
	public function listfoto()
	{
		$data		= array();
		$foto		= $this->m_foto->fetchalbum();	
		$i			= 0;
		
		foreach ($foto->result_array() as $row)
		{
			$data[$i]['fotoid']		= $row['fotoid'];			
			$data[$i]['url']		= base_url().$row['path'];			
			$data[$i]['thumbUrl']	= base_url().$row['thumbs'];
				
			$i++;
		}
		$total		= $foto->num_rows();
	
		$result = array(	
						'total'		=>		$total,
						'content'	=>		$data);
	
		echo json_encode($result);
	}
}
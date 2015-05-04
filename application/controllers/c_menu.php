<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'c_konten.php';
require_once '/abstraction/public_abstraction.php';
class c_menu extends public_abstraction{ 
	
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
				
		$artikel = $this->m_informasi->read();	
		
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
		//print_r($data);
		
		parent::loadPage(array_merge($page, $data));
	}
	
	public function getSubMenu(){
		$data 	= array();
		$i 			= 0;
		
		$submenu 	= $this->m_informasi->getSubMenu();
		
		foreach ($submenu->result_array() as $res)
		{			
			$data[$i]['id']			= $res['idtipe'];
			$data[$i]['name'] 		= $res['tipeinfo'];
			$i++;
		}
		echo json_encode($data);
	}
	
	public function getSideMenu()
	{
		$data 	= array();
		$i 			= 0;
		$menu 	= $this->m_informasi->getMenu();
		
		foreach ($menu->result_array() as $res)
		{			
			$j = 0;
			$data[$i]['id']		= $res['idtipe'];			
			$data[$i]['name'] 	= $res['tipeinfo'];
			$submenu			= $this->m_informasi->getSubMenu($res['idtipe']);
			//print_r($submenu->result_array());
			foreach ($submenu->result_array() as $r){					
				$data[$i]['children'][$j]['id'] 	   = $r['idtipe'];
				$data[$i]['children'][$j]['name']  = $r['tipeinfo'];
				$j++;
			}
			$i++;
		}		
		echo json_encode($data);		
	}
	
	public function getMenu()
	{	
		$data = array();
		$i = 0;
		
		$menu = $this->m_informasi->getMenu();
		
		foreach ($menu->result_array() as $res)
		{			
			$data[$i]['id']			= $res['idtipe'];
			$data[$i]['name'] 		= $res['tipeinfo'];
			$i++;
		}
		
		echo json_encode($data);
	}
}

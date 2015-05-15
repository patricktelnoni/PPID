<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/c_konten.php';
//require_once dirname(__FILE__).'/abstraction/private_abstraction.php';
class c_feedback extends c_konten{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper('url');
		
		$this->load->model('m_feedback');
	}
	public function index()
	{		
		
	}	
	
	public function listcontent(){
		$data = array();
		
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/feedback/listfeedback';
		$page['page']	= 'index';
	
		$artikel = $this->m_feedback->read();
	
		//echo "artikel";
		//print_r($artikel);
		$i=0;
		foreach ($artikel->result_array() as $row)
		{
			$data['content'][$i]['feedbackid']	= $row['feedbackid'];
			$data['content'][$i]['nama']		= $row['nama'];
			$data['content'][$i]['email'] 		= $row['email'];
			$data['content'][$i]['pesan'] 		= $row['pesan'];
	
			$i++;
		}
		$data['total']		= $artikel->num_rows();
		//print_r($data);
	
		parent::loadPage(array_merge($page, $data));
	}
	
	public function delete()
	{
		$this->m_feedback->delete();
		redirect('c_feedback/listFeedback');
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_video extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper(array('url', 'captcha'));
		$this->load->library('session');
		$this->load->model('m_video');
	}
	public function index()
	{		
		$data = array();		
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'videos/displayvideo';
		$page['page']		= 'index';
				
		
		parent::loadPage($page);
	}

	public function listvideo()
	{
		$video 				= $this->m_video->read();
		
		$i=0;
		foreach ($video->result_array() as $row)
		{
			$data[$i]['artikelid']	= $row['videoid'];
			$data[$i]['title'] 		= $row['title'];
			$param 					= parse_url($row['link']);
			//print_r($param['query']);
			if(isset($param['query'])){
				$param2 = explode("=", $param['query']);					
				$data[$i]['link']	= isset($param['query']) ? $param['scheme'].'://'.$param['host']."/embed/".$param2[1] : $row['link'];
			}
			//echo  $param['host']."/embed/".$param['query']['v'];
			$i++;
		}
		$total		= $video->num_rows();
		
		$result = array(	'total'		=>		$total,
								'content'	=>		$data);
		
		echo json_encode($result);
		
	}
	
	
}
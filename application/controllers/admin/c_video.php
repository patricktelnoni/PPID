<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/c_konten.php';

class c_video extends c_konten{ 
	
	//private $private;
	public function __construct() {
		parent:: __construct();
		
		//$private->loginCheck();
		$this->load->model(array('m_video', 'm_artikel', 'm_konten'));
		$this->load->helper('string');
	}
	public function index()
	{		
		
	}	
	
	public function fetchcontent()
	{
		$video = $this->m_video->read();
		
		$i=0;
		$data = array();
		foreach ($video->result_array() as $row)
		{
			$data[$i]['videoid']	= $row['videoid'];
			$data[$i]['title']		= $row['title'];
			$data[$i]['link'] 		= $row['link'];
			$data[$i]['postdate']	= $row['postdate'];
		
			$i++;
		}
		$total		= $video->num_rows();
		
		$result = array('total' 		=> $total,
							  'content'	=> $data);
		echo json_encode($result);
	}
	public function listcontent()
	{	
		$page['header']	= 'header';
		$page['left']	= '';
		$page['right']	= 'menukanan';
		$page['footer']	= 'footer';
		$page['body']	= '/videos/listvideo';
		$page['page']	= 'index';
		
		parent::loadPage($page);
	}
	
	public function save()
	{
		$tipe = $this->input->post('tipe');
		
		$data = array(				
				'title'			=> $this->input->post('title'),
				'link'			=> $this->input->post('link'),
				'postdate'	=> 'NOW()'
		);
		
			if($this->input->post('videoid') == '')
				$this->m_video->create($data);
			else
				$this->m_video->update($data);	
		
		redirect('c_artikel');
	}
	
	public function delete()
	{
		$this->m_artikel->delete();
		redirect('c_artikel/listArtikel');
	}

	public function add()
	{
		$page['body']		= 'videos/addvideo';
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		
		$page['page']		= 'index';		
		
		parent::loadPage($page);
	}
	
	public function edit()
	{
		$page['body']		= 'videos/editvideo';
		$page['header']	= 'header';
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
	
		$page['page']		= 'index';
	
		$video['content'] = $this->m_video->readwhere();
		
		parent::loadPage(array_merge($page, $video));
		
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/abstraction/public_abstraction.php';
class c_feedback extends public_abstraction{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper(array('url', 'captcha'));
		$this->load->library('session');
		$this->load->model('m_feedback');
	}
	public function index()
	{		
		$data = array();
		
		$vals = array(
				'img_path' => 'captcha/',
				'img_url' => base_url().'captcha/',
		);
		
		/* Generate the captcha */
		$data['captcha'] = create_captcha($vals);
		
		/* Store the captcha value (or 'word') in a session to retrieve later */
		$this->session->set_userdata('captcha', $data['captcha']['word']);
		
		
		/* Load the captcha view containing the form (located under the 'views' folder) */
		//$this->load->view('captcha-view', $captcha);
		
		$page['header']	= 'header';	
		$page['left']		= '';
		$page['right']		= 'menukanan';
		$page['footer']		= 'footer';
		$page['body']		= 'feedback/form_feedback';
		$page['page']		= 'index';
				
		parent::loadPage(array_merge($page, $data));
	}
	
	public function save()
	{		
		
		//print_r($_POST);
		//print_r($this->session->userdata('captcha'));
		if($this->session->userdata('captcha') == $this->input->post('captcha'))
		{
			$data = array(
					'nama'	=> $this->input->post('nama'),
					'email'		=> $this->input->post('email'),
					'pesan'	=> $this->input->post('pesan')
			);
			if($this->input->post('id') == '')
				$this->m_feedback->create($data);
			else
				$this->m_feedback->update($data);
			
			$this->session->set_flashdata('flashError', '');
			$this->session->set_flashdata('flashSuccess', 'Masukan anda berhasil kami simpan');
			
			redirect('c_artikel');
		}
		else{
			$this->session->set_flashdata('flashSuccess', '');
			$this->session->set_flashdata('flashError', 'Kode keamanan (captcha) yang anda masukan salah.');
			redirect('c_feedback');
		}
		
		
	}
}
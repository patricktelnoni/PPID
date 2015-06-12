<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/abstraction/public_abstraction.php';

class c_registration extends public_abstraction {

	public function __construct() {
		parent:: __construct();
		
		$this->load->model('m_authentication');
		$this->load->library('pbkdf2');
		
		$config['iterations'] 	= 500;
		$config['hash_length'] 	= 64;
		$config['salt_length'] 	= 16;
		
		$this->pbkdf2->initialize($config);
		
	}
	public function signup()
	{
		$pbkdf2 = $this->pbkdf2->encrypt($this->input->post('password'), TRUE);
		
		$data = array(
				'email'		=> $this->input->post('email'),
				'password'	=> $pbkdf2->hash,
				'nama'		=> $this->input->post('name'),
				'alamat'	=> $this->input->post('address'),
				'kota'		=> $this->input->post('city'),
				'propinsi'	=> $this->input->post('province'),
				'kodepos'	=> $this->input->post('postalcode'),
				'telepon'	=> $this->input->post('phone')				
		);
		
		if($this->input->post('id') == '')		
			$this->m_authentication->create($data);
		else
			$this->m_authentication->update($data);			
		
	}
	
	public function index()
	{		
		$page['body'] 	= 'registration';
		$page['header'] = 'header';
		$page['left'] 	= '';
		$page['footer'] = '';
		$page['page'] 	= 'index';
		$page['right'] 	= 'menukanan';
			
		parent::loadPage($page);		
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/c_konten.php';
//require_once dirname(__FILE__).'/abstraction/private_abstraction.php';
class c_reply extends c_konten{ 
	
	private $pa;
	
	
	public function __construct() {
		
		parent:: __construct();		
		$this->load->helper('url');
		
		$this->load->model(array('m_feedback','m_reply'));
	}
	public function index()
	{		
		
	}	
	
	public function reply()
	{
		$errors	= array();  	// array to hold validation errors
		$data		= array(); 		// array to pass back data
		// validate the variables ======================================================
		if (empty($this->input->post('reply')))
			$errors['reply'] = 'Pesan balasan harus diisi.';
	
		// return a response ===========================================================
		// response if there are errors
		if ( ! empty($errors)) {
			// if there are items in our errors array, return those errors
			$data['success'] = false;
			$data['errors']  = $errors;
		} else {
			// if there are no errors, return a message
			//print_r($_POST);
			$post = array(
				'feedbackid'	=> $this->input->post('feedbackid'),
				'reply'			=> $this->input->post('reply')				
			);
			if($this->m_reply->create($post)){
				
				$feedback 		= array('dibalas' => '1');
				
				if($this->m_feedback->update($feedback)){
					$data['success'] = true;
					$data['message'] = 'Masukan berhasil disimpan. Panel akan ditutup dalam 3 detik';
				}
				else{
					$data['success'] = false;
					$data['message'] = 'Gagal saat mengupdate data';
				}
			}
			else{
				$errors['reply'] = 'Error, tidak bisa menyimpan data';
				
				$data['success'] = false;
				$data['errors']  = "Gagal saat anada menyimpan data";
			}
		}
		// return all our data to an AJAX call
		echo json_encode($data);
	}
	
}

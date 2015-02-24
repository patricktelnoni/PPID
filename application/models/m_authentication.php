<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once '/interface/iCrud.php';

class m_authentication extends CI_Model implements iCrud{

	function __construct()
    {
        parent::__construct();
    }
	
	public function save()
	{
		$data = array('email'		=> $this->input->post('email'),
					  'password'	=> md5($this->input->post('password')),
					  'nama'		=> $this->input->post('name'),
					  'alamat'		=> $this->input->post('address'),
					  'kota'		=> $this->input->post('city'),
					  'propinsi'	=> $this->input->post('province'),
					  'kodepos'		=> $this->input->post('postalcode'),
					  'telepon'		=> $this->input->post('phone')				
						); 
		
		if($this->input->post('id') == '')
			$this->create($data);
		else
			$this->update($data);					
	}	
	
	public function create($data){
		$query = $this->db->insert('user', $data);
	}
	
	public function update($data){
		$query = $this->db->update('user', $data);
	}
	
	public function read(){}
	
	public function delete(){}
	
}

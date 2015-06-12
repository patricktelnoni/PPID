<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__).'/interface/i_crud.php';

class m_authentication extends CI_Model implements i_crud{

	function __construct()
    {
        parent::__construct();
        
    }
		
	public function create($data){
		$query = $this->db->insert('user', $data);
	}
	
	public function update($data){
		$query = $this->db->update('user', $data);
	}
	
	public function read(){
		
		$query = $this->db->get_where('user', array('email' => $this->input->post('email')));		
		
		return $query->row_array(); 
			
	}
	
	public function delete(){}
	
}

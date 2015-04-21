<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '/interface/i_crud.php';
class m_informasi extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}

	public function create($data){
		
	}
	
	public function update($data){
		
	}
	
	public function read(){		
		$query = $this->db->get_where('user', array('id' => $id));
	}
	
	public function delete(){		
		$query = $this->db->delete('user', array('id' => $id));
	}
	public function getChildren()
	{			
		$jenis 	= (int)$this->uri->segment(3);
		
		$sql 		= "SELECT * FROM info WHERE jenis = ?";	
		$query 	= $this->db->query($sql, array($jenis));
				
		return $query;
	}
}

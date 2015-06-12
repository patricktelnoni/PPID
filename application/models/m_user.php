<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_user extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}

	public function create($data){
		$this->db->insert('artikel', $data);
	}
	
	public function update($data){
		$this->db->insert('artikel', $data);
	}
	
	public function read(){
		/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		
		$query = $this->db->get_where('user', array('id' => $id));
	}
	
	public function delete(){
		/* $sql = "DELETE FROM some_table WHERE id = ? ";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		$query = $this->db->delete('user', array('id' => $id));
	}
	
}

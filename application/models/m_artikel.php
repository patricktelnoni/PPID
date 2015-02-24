<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_artikel extends CI_Model implements iCrud{

	public function __construct()
	{
		parent::__construct();		
	}

	public function save(){
		$data = array(
				'title' => 'My title' ,
				'name' => 'My Name' ,
				'date' => 'My date'
		);
		
		if($this->input->post('id') != "")
			$this->create();//$this->db->insert('artikel', $data);
		else 
			$this->update();//$this->db->update('artikel', $data);
	}
	
	public function create(){
		$this->db->insert('artikel', $data);
	}
	
	public function update(){
		$this->db->insert('artikel', $data);
	}

	public function read(){
		/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		
		$query = $this->db->get_where('artikel', array('id' => $id));
	}
	
	public function delete(){
		/* $sql = "DELETE FROM some_table WHERE id = ? ";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		$query = $this->db->delete('artikel', array('id' => $id));
	}
	
}

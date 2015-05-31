<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_foto extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}
	
	public function create($data){
		$this->db->insert('artikel', $data);
	}
	
	public function update($data){
		$this->db->where('artikelid', $this->input->post('artikelid'));
		$this->db->update('artikel', $data);
	}

	public function read(){
		/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		$artikelid = $this->uri->segment(4) != ''? $this->uri->segment(4): '';		
		
		$sql = $artikelid != '' ? $this->db->get_where('artikel', array('artikelid' => $artikelid)) : $this->db->get('artikel');
				
		//print_r($sql);
		return $sql; 
	}
	
	public function delete(){		
		$query = $this->db->delete('artikel', array('artikelid' => $this->uri->segment(3)));
	}
	
}

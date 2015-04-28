<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '/interface/i_crud.php';
class m_konten extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}
	
	public function postAttachment($path)
	{
		$token 	= $this->uri->segment(3);
		
		$konten	= $this->db->get_where('informasi', array('token' => $token));
		if($konten->num_rows() >0){
			$this->db->where('token', $token);
			$this->db->update('informasi', array('file' => $path));
		}
		else{ 
			$this->db->insert('informasi', array('token' => $token, 'file' => $path));
		}
	}
	public function removeAttachment()
	{		
		$token 	= $this->input->post('token');		
		$konten	= $this->db->get_where('informasi', array('token' => $token));
		
		if($konten->num_rows() >0){
			$this->db->where('token', $token);
			$this->db->update('informasi', array('file' => ' '));
		}
		else{
			$this->db->delete('informasi', array('token' => $token));
		}
		
		return $konten;
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
		$artikelid = $this->uri->segment(3) != ''? $this->uri->segment(3): '';		
		
		$sql = $artikelid != '' ? $this->db->get_where('artikel', array('artikelid' => $artikelid)) : $this->db->get('artikel');
				
		return $sql; 
	}
	
	public function delete(){
		/* $sql = "DELETE FROM some_table WHERE id = ? ";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		
		$query = $this->db->delete('artikel', array('id' => $id));
	}
	
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once '/interface/i_crud.php';
class m_informasi extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}

	public function cekToken(){
		$token 	= $this->uri->segment(3);
				
		$isToken = $this->db->get_where('informasi', array('token' => $token));
		
		
		return $isToken;
	}
	public function create($data){
		$this->db->insert('informasi', $data);
	}
	
	public function update($data){
		
	}
	
	public function updatePost($data, $id){		
		$this->db->where('infoid', $id);
		$this->db->update('informasi', $data);
	}
	
	public function read(){		
		$query = $this->db->get('informasi');
		return $query;
	}
	
	public function delete(){		
		$query = $this->db->delete('user', array('id' => $id));
	}
	
	public function getMenu()
	{			
		$jenis 	= (int)$this->uri->segment(3);				
		$query 	= $this->db->get_where('info', array('jenis' => $jenis));				
		
		return $query;
	}
	
	public function getSubMenu($up = "")
	{
		$parent 	= (int)$this->uri->segment(3);						
		$query 	= $up == "" ? $this->db->get_where('info', array('parent' => $parent)) :$this->db->get_where('info', array('parent' => $up));
	
		//print_r($query->result_array());
		
		return $query;		
	}
	
	public function getParent($child)
	{
		$query = $this->db->get_where('info', array('idtipe'=>$child));		
		//echo $query->row()->parent;
		return $query->row()->parent;
	}
	
	public function readInformasi($jenis = "")
	{
		$parent = $this->uri->segment(3)? $this->getParent($this->uri->segment(3)): "";
		if($jenis != ""){
			$idmin	= $this->db->select_min('idtipe', 'idmin')->from('info')->where('jenis', $jenis)->get()->row()->idmin;
			$idmax	= $this->db->select_max('idtipe', 'idmax')->from('info')->where('jenis', $jenis)->get()->row()->idmax;
		}
		
		$this->db->select('*');
		$this->db->from('informasi');
		$this->db->join('info', 'info.idtipe = informasi.tipe_info');
		
		if($jenis != ""){			
			$this->db->where('info.jenis', $jenis);			
			$this->db->or_where('info.parent >=', $idmin);
			$this->db->where('info.parent <=', $idmax);		
					
		}
		else{		
			$this->db->where('info.parent', $parent);		
		}
		
		$query = $this->db->get();
		
		return $query;
	}
}

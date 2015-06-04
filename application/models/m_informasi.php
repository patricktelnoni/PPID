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
		$offset 				=	$this->uri->segment(5) ? ($this->uri->segment(5) -1)*10 : ($this->uri->segment(4) -1)*10;
		$limit					=	10 ;
		//echo $offset.'-'.$limit;
		$result['total']		=	$this->db->get('informasi');
		$result['query']	=	$this->db->get('informasi', $limit, $offset);
		
		return $result;
	}
	
	public function delete(){		
		$query = $this->db->delete('user', array('id' => $id));
	}
	
	public function getMenu()
	{			
		$jenis 	= (int)$this->uri->segment(4);				
		$query 	= $this->db->get_where('info', array('jenis' => $jenis));				
		
		return $query;
	}
	
	public function getSubMenu($up = "")
	{
		$parent 	= $this->uri->segment(4);						
		$query 	= $up == "" ? $this->db->get_where('info', array('parent' => $parent)) :$this->db->get_where('info', array('parent' => $up));	
		
		return $query;		
	}
	
	public function getParent($child)
	{
		$query = $this->db->get_where('info', array('idtipe'=>$child));		
		//echo $query->row()->parent;
		return $query->row()->parent;
	}
	
	public function readInfo($jenis = "", $lim)
	{
		$parent = $this->uri->segment(4)? $this->getParent($this->uri->segment(4)): "";
		if($jenis != ""){
			$idmin	= $this->db->select_min('idtipe', 'idmin')->from('info')->where('jenis', $jenis)->get()->row()->idmin;
			$idmax	= $this->db->select_max('idtipe', 'idmax')->from('info')->where('jenis', $jenis)->get()->row()->idmax;
		}		
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
		
		if($lim)
		{
			$offset 				=	$this->uri->segment(5) ? ($this->uri->segment(5) -1)*5 : 0;
			$limit					=	5 ;
			
			$this->db->limit($limit, $offset);		}
		
		$query = $this->db->get();
		
		return $query;
	}
	
	public function readInformasi($jenis = "")
	{		
		$result['total']		=	$this->readInfo($jenis, false);		
		$result['query']	=	$this->readInfo($jenis, true);
		
		return $result;
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
}

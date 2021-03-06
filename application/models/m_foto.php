<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_foto extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}
	
	public function create($data){
		$this->db->insert('album', $data);
	}
	
	public function update($data){
		$this->db->where('artikelid', $this->input->post('artikelid'));
		$this->db->update('artikel', $data);
	}

	public function read(){
		/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		if($this->uri->segment(5))
		{
			$albumid = '';
			$offset 	=	$this->uri->segment(5) ? ($this->uri->segment(5) -1)*10 : "0";
			$limit		=	10 ;
			
			$sql = $this->db->get('album', $limit, $offset);
		}
		elseif($this->uri->segment(3) == 'listalbum'){
			$albumid = '';
			$offset 	=	$this->uri->segment(4) ? ($this->uri->segment(4) -1)*10 : "0";
			$limit		=	10 ;
			
			$sql = $this->db->get('album', $limit, $offset);
		}
		else{
			$albumid = $this->uri->segment(4) != ''? $this->uri->segment(4): '';
			
			$sql = $this->db->get_where('album', array('albumid' => $albumid));
		}				
		
		return $sql; 
	}
	
	public function delete(){		
		$query = $this->db->delete('artikel', array('artikelid' => $this->uri->segment(5)));
	}
	
	public function postAttachment($path, $thumbs)
	{
		$token 	= $this->uri->segment(4);		
		
		$this->db->insert('foto', array('token' => $token, 'path' => $path, 'thumbs' => $thumbs));
		
	}
	
	public function removeAttachment()
	{
		$token 	= $this->input->post('token');	
		
		$this->db->delete('informasi', array('token' => $token));
		
	
		return $konten;
	}
	
	public function getFoto($albumid)
	{		
		$sql = $this->db->get_where('foto', array('albumid' => $albumid));		
	
		return $sql;
	}
	
	public function fetchalbum()
	{
		$sql = $this->db->get_where('foto', array('albumid' => $this->uri->segment(4)));
		
		return $sql;
	}
}

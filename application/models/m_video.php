<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_video extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}
	
	public function create($data){
		$this->db->insert('video', $data);
	}
	
	public function update($data){
		$this->db->where('videoid', $this->input->post('videoid'));
		$this->db->update('video', $data);
	}
	
	public function updatePost($data, $id){		
		$this->db->where('infoid', $id);
		$this->db->update('informasi', $data);
	}
	
	public function read(){		
		$offset 				= ($this->uri->segment(4)) ? $this->uri->segment(4)*5 : $this->uri->segment(3)*5;
		$limit					= $offset - 5;
		$result['total']		= $this->db->get('video');
		$result['query ']	= $this->db->get('video', $offset, $limit);
		return $result;
	}
	
	public function delete(){		
		$query = $this->db->delete('user', array('id' => $id));
	}
	
	public function readwhere(){
		$videoid 		= $this->uri->segment(4) ? $this->uri->segment(4) : "";
		
		$query = $this->db->get_where('video', array('videoid' => $videoid));
		
		//print_r($query->row());
		return $query;
	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_reply extends CI_Model implements i_crud{

	public function __construct()
	{
		parent::__construct();		
	}
	
	public function create($data){
		return $this->db->insert('reply', $data);
	}
	
	public function update($data){
		$this->db->where('replyid', $this->input->post('id'));
		$this->db->update('reply', $data);
	}

	public function read(){
		/* $sql = "SELECT * FROM some_table WHERE id = ? AND status = ? AND author = ?";
		$this->db->query($sql, array(3, 'live', 'Rick')); */
		$feedbackid = $this->uri->segment(4) != ''? $this->uri->segment(4): '';		
		
		$sql = $feedbackid != '' ? $this->db->get_where('feedback', array('feedbackid' => $feedbackid)) : $this->db->get('feedback');
				
		return $sql; 
		//print_r($sql)
	}
	
	public function delete(){		
		$query = $this->db->delete('feedback', array('feedbackid' => $this->uri->segment(3)));
	}
	
}
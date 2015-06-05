<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__).'/interface/i_crud.php';
class m_artikel extends CI_Model implements i_crud{

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
		//$artikelid = $this->uri->segment(5) != ''? $this->uri->segment(5): "";		
		if($this->uri->segment(5))
		{
			if($this->uri->segment(4) != 'read')
			{
				$offset 	=	$this->uri->segment(6) ? ($this->uri->segment(6) -1)*10 : "0";
				$limit		=	10 ;
				$sql 		= $this->db->get('artikel', $limit, $offset);
			}
			else{
				$sql = $this->db->get_where('artikel', array('artikelid' => $this->uri->segment(5)));
			}
			
		}
		elseif($this->uri->segment(3) > 0)
		{
			$sql = $this->db->get_where('artikel', array('artikelid' => $this->uri->segment(3)));
		}
		else
		{
			$sql = $this->db->get('artikel',5,0);
		}			
		
		return $sql; 
	}
	
	public function delete(){		
		$query = $this->db->delete('artikel', array('artikelid' => $this->uri->segment(3)));
	}
	
}

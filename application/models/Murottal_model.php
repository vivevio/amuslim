<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murottal_model extends AM_Model {

	protected $table_name = "tb_murottal";

	public function get_one( $id = array() )
	{
		
		$this->db->where( 'murottal_id', (int)$id[0] );
		return $this->db->get( $this->table_name )->row();
	}

}

/* End of file Murottal_model.php */
/* Location: ./application/models/Murottal_model.php */
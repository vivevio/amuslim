<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayat_model extends AM_Model {

	protected $table_name = "tb_ayat";

	public function get_one( $id = array() )
	{
		
		$this->db->where( 'ayat_id', (int)$id[0] );
		return $this->db->get( $this->table_name )->row();
	}

	public function get_many( $param = array() )
	{

		$this->db->order_by('nomor_surah', 'ASC');
		return $this->db->get( $this->table_name )->result();
	}

}

/* End of file Ayat_model.php */
/* Location: ./application/models/Ayat_model.php */
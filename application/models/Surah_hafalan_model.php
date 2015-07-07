<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surah_hafalan_model extends AM_Model {

	protected $table_name = "tb_surah_hafalan";

	public function get_one( $param = array() )
	{
		
		$ayat_foreign_key = $this->table_name . '.ayat_id=tb_ayat.ayat_id';
		$murottal_foreign_key = $this->table_name . '.murottal_id=tb_murottal.murottal_id';

		$this->db->join('tb_ayat', $ayat_foreign_key, 'left');
		$this->db->join('tb_murottal', $murottal_foreign_key, 'left');
		
		$this->db->where('surah_hafalan_id', $param[0]);
		
		return $this->db->get( $this->table_name )->row();
	}

	public function get_many( $param = array() )
	{
		
		$ayat_foreign_key = $this->table_name . '.ayat_id=tb_ayat.ayat_id';
		$murottal_foreign_key = $this->table_name . '.murottal_id=tb_murottal.murottal_id';

		$this->db->join('tb_ayat', $ayat_foreign_key, 'left');
		$this->db->join('tb_murottal', $murottal_foreign_key, 'left');
		
		return $this->db->get( $this->table_name )->result();
	}


}

/* End of file Surah_hafalan_model.php */
/* Location: ./application/models/Surah_hafalan_model.php */
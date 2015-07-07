<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surah_audio_model extends AM_Model {

	protected $table_name = "tb_ayat_audio";

	public function get_one( $param = array() )
	{
		
		$ayat_foreign_key = $this->table_name . '.ayat_id=tb_ayat.ayat_id';
		$murottal_foreign_key = $this->table_name . '.murottal_id=tb_murottal.murottal_id';

		$this->db->join('tb_ayat', $ayat_foreign_key, 'left');
		$this->db->join('tb_murottal', $murottal_foreign_key, 'left');
		
		$this->db->where('ayat_audio_id', $param[0]);
		
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

/* End of file Surah_audio_model.php */
/* Location: ./application/models/Surah_audio_model.php */
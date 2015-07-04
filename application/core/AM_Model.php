<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AM_Model extends CI_Model {

	protected $table_name = "";

	public function __construct()
	{
		parent::__construct();
	}

	public function get_one( $param = array() )
	{
		
		if( isset( $param['where'] ) )
			$this->db->where( $param['where'] );
		
		return $this->db->get( $this->table_name )->row();
	}

	public function get_many()
	{
		
		return $this->db->get( $this->table_name )->result();
	}

	public function add( $data )
	{
		
		return $this->db->insert( $this->table_name, $data );
	}

	public function update( $id = array(), $data )
	{
		
		$this->db->where( $id );
		return $this->db->update( $this->table_name, $data );
	}

	public function delete( $id = array() )
	{
		
		$this->db->where( $id );
		return $this->db->delete( $this->table_name );
	}

}

/* End of file AM_Model.php */
/* Location: ./application/core/AM_Model.php */
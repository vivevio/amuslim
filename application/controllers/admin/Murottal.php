<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murottal extends AM_Admin {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('murottal_model');
	}

	public function index()
	{
		
		$data['msg'] = $this->session->flashdata('msg');
		$data['murottals'] = $this->murottal_model->get_many();
		$this->template->view_admin( 'murottal/all_murottal', $data );
	}

	public function change( $id )
	{
		$data['post'] = $this->murottal_model->get_one( array( $id ) );
		$data['js_footer'] = $this->load->view('admin/murottal/js', null, TRUE);
		$this->template->view_admin( 'murottal/edit_murottal', $data );
	}

	public function add()
	{
		
		$data['js_footer'] = $this->load->view('admin/murottal/js', null, TRUE);
		$this->template->view_admin( 'murottal/add_murottal', $data );
	}

	public function save_changes( $type = "old-data" )
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();
		
		$this->load->helper('array');
		$selected_field = array('name');

		if( $type === 'old-data' ) {

			$selected_field[] = 'id';
			$field = elements( $selected_field, $_POST );
			$data['nama_murottal'] = $field['name'];
			$q = $this->murottal_model->update( array( 'murottal_id' => $field['id'] ), $data );
			if( $q ) {

				$return['result'] = TRUE;
				$return['msg'] = 'Success to update murottal.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Failed to update murottal.';
			}

		} else {

			$field = elements( $selected_field, $_POST );
			$q = $this->murottal_model->add( array( 'nama_murottal' => $field['name'] ) );
			if( $q ) {

				$return['result'] = TRUE;
				$return['msg'] = 'Success to added murottal.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Failed to added murottal.';
			}
		}
	
		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();
	}

	function delete( $id = NULL )
	{

		$this->load->library('session');

		$d = $this->murottal_model->delete( array( 'murottal_id' => $id ) );
		if( $d ) {

			$this->session->set_flashdata('msg', $this->message_success('Murottal has been deleted.'));
			redirect('admin/murottal','refresh');
		} else {

			$this->session->set_flashdata('msg', $this->message_error('Murottal fail to delete.'));
			redirect('admin/murottal','refresh');
		}
	}


}

/* End of file Murottal.php */
/* Location: ./application/controllers/admin/Murottal.php */
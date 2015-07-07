<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayat extends AM_Admin {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('ayat_model');
	}

	public function index()
	{
		
		$data['msg'] = $this->session->flashdata('msg');
		$data['posts'] = $this->ayat_model->get_many();
		$this->template->view_admin( 'ayat/all', $data );
	}

	public function change( $id )
	{

		$this->load->helper('form');
		$data['post'] = $this->ayat_model->get_one( array( $id ) );
		$data['optional_plugin_style'] = 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';
		$data['optional_plugin'] = 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';
		$data['js_footer'] = $this->load->view('admin/ayat/js', null, TRUE);
		$this->template->view_admin( 'ayat/edit', $data );
	}

	public function add()
	{
		
		$this->load->helper('form');
		$data['js_footer'] = $this->load->view('admin/ayat/js', null, TRUE);
		$data['optional_plugin_style'] = 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';
		$data['optional_plugin'] = 'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';
		$this->template->view_admin( 'ayat/add', $data );
	}

	public function save_changes( $type = "old-data" )
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();
		
		$this->load->helper('array');
		$selected_field = array('name','info', 'nomor_surah', 'sumber_info');

		if( $type === 'old-data' ) {

			$selected_field[] = 'id';
			$field = elements( $selected_field, $_POST );

			$data = array(
					'nama_ayat' => $field['name'],
					'info' => $field['info'],
					'sumber_info' => $field['sumber_info'],
					'nomor_surah' => $field['nomor_surah']
				);

			$q = $this->ayat_model->update( array( 'ayat_id' => $field['id'] ), $data );
			if( $q ) {

				$return['result'] = TRUE;
				$return['msg'] = 'Success to update surah.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Failed to update surah.';
			}

		} else {

			$field = elements( $selected_field, $_POST );
			$data = array(
					'nama_ayat' => $field['name'],
					'info' => $field['info'],
					'sumber_info' => $field['sumber_info'],
					'nomor_surah' => $field['nomor_surah']
				);
			$q = $this->ayat_model->add( $data );
			if( $q ) {

				$return['result'] = TRUE;
				$return['msg'] = 'Success to added surah.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Failed to added surah.';
			}
		}
	
		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();
	}

	function delete( $id = NULL )
	{

		$this->load->library('session');

		$d = $this->ayat_model->delete( array( 'ayat_id' => $id ) );
		if( $d ) {

			$this->session->set_flashdata('msg', $this->message_success('Surah has been deleted.'));
			redirect('admin/ayat','refresh');
		} else {

			$this->session->set_flashdata('msg', $this->message_error('Surah fail to delete.'));
			redirect('admin/ayat','refresh');
		}
	}


}

/* End of file Ayat.php */
/* Location: ./application/controllers/admin/Ayat.php */
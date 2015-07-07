<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surah_hafalan extends AM_Admin {

	public function __construct()
	{

		parent::__construct();
		$this->load->model('surah_hafalan_model');
	}

	public function index()
	{
		
		$data['msg'] = $this->session->flashdata('msg');
		$data['posts'] = $this->surah_hafalan_model->get_many();
		$this->template->view_admin( 'surah_hafalan/all', $data );
	}

	public function change( $id )
	{

		$this->load->helper('form');
		$data['msg'] = $this->session->flashdata('msg');
		$data['post'] = $this->surah_hafalan_model->get_one( array( $id ) );
		$this->template->view_admin( 'surah_hafalan/edit', $data );
	}

	public function add()
	{
		
		$this->load->helper('form');
		$data['msg'] = $this->session->flashdata('msg');
		// $data['js_footer'] = $this->load->view('admin/ayat/js', null, TRUE);
		$this->template->view_admin( 'surah_hafalan/add', $data );
	}

	public function save_changes( $type = "old-data" )
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();
		
		$this->load->helper('array');
		$selected_field = array('ayat_id','murottal_id');
		if( $type === 'old-data' ) {

			$selected_field[] = 'id';
			$field = elements( $selected_field, $_POST );

			$data = array(
					'ayat_id' => $field['ayat_id'],
					'murottal_id' => $field['murottal_id'],
				);
			if( $_FILES['file']['error'] === 0 ) {

				$do_upload = $this->_do_upload_audio( PUBLICAUDIOHAFALAN );
				if( $do_upload['result'] ) {

					$file_data = $do_upload['msg'];
					$data['url_audio'] = $this->public_audio . $file_data['file_name'];

				} else {

					$this->session->set_flashdata('msg',  $this->message_error( $do_upload['msg'] ) );
					redirect('admin/surah_hafalan/change/' . $field['id'],'refresh');
				}
			}

			$q = $this->surah_hafalan_model->update( array( 'ayat_id' => $field['id'] ), $data );
			if( $q ) {

				$this->session->set_flashdata('msg',  $this->message_success('Surah has been added.'));
			} else {

				$this->session->set_flashdata('msg',  $this->message_error('Failed to add surah.'));
			}

			redirect('admin/surah_hafalan/change/' . $field['id'],'refresh');

		} else {

			$field = elements( $selected_field, $_POST );
			$data = array(
					'ayat_id' => $field['ayat_id'],
					'murottal_id' => $field['murottal_id'],
				);

			$do_upload = $this->_do_upload_audio( PUBLICAUDIOHAFALAN );
			if( $do_upload['result'] ) {

				$this->load->helper('date');
				$file_data = $do_upload['msg'];
				$data['url_audio'] = $this->public_audio . $file_data['file_name'];
				$data['date_added'] = now();

				$q = $this->surah_hafalan_model->add( $data );
				if( $q ) {

					$this->session->set_flashdata('msg',  $this->message_success('Surah has been added.'));

				} else {

					$this->session->set_flashdata('msg',  $this->message_error('Failed to add surah.'));
				}

				redirect('admin/surah_hafalan/','refresh');
				
			} else {

				$this->session->set_flashdata('msg',  $this->message_error( $do_upload['msg'] ) );
				
				redirect('admin/surah_hafalan/add','refresh');
			}

		}
	}

	function delete( $id = NULL )
	{

		$this->load->library('session');

		$this->_delete_file_audio( (int)$id );
		$d = $this->surah_hafalan_model->delete( array( 'surah_hafalan_id' => (int)$id ) );
		if( $d ) {
			
			$this->session->set_flashdata('msg', $this->message_success('Surah has been deleted.'));
			redirect('admin/surah_hafalan','refresh');
		} else {

			$this->session->set_flashdata('msg', $this->message_error('Surah fail to delete.'));
			redirect('admin/surah_hafalan','refresh');
		}
	}


}

/* End of file Surah_hafalan.php */
/* Location: ./application/controllers/admin/Surah_hafalan.php */
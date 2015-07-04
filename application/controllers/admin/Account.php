<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends AM_admin {

	public function __construct()
	{
		
		parent::__construct();
	}

	public function index( $user_id = NULL )
	{

		$data['user'] = ( $user_id == NULL ? $this->_user : $this->ion_auth->user( $user_id )->row() );
		$data['js_footer'] = $this->load->view('admin/account/js_edit_account', null, TRUE);	
		$this->template->view_admin('account/my_account', $data);	
	}

	public function all()
	{
		
		$this->load->helper('user');
		$this->load->library('session');

		$data['msg'] = $this->session->flashdata('msg');
		$data['users'] = $this->_users;
		$data['current_user'] = $this->_user->id;
		$this->template->view_admin('account/all_account', $data);	
	}

	public function add()
	{
		
		$this->load->helper('form');
		$data['js_footer'] = $this->load->view('admin/account/js_edit_account', null, TRUE);	
		$this->template->view_admin('account/add_account', $data);	
	}

	public function check_username()
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();

		$this->load->helper('array');
		$field = elements( array('value'), $_POST );

		if ( ! $this->ion_auth->username_check( $field['value'] ) ) {

			$return['result'] = TRUE;
			$return['msg'] = '<i class="fa fa-check"></i> You can use this username.';
		} else {

			$return['result'] = FALSE;
			$return['msg'] = '<i class="fa fa-times-circle-o"></i> You can not use this username.';
		}

		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();
	}

	public function check_email()
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();

		$this->load->helper('array');
		$field = elements( array('value'), $_POST );

		if ( ! $this->ion_auth->email_check( $field['value'] ) ) {

			$return['result'] = TRUE;
			$return['msg'] = '<i class="fa fa-check"></i> You can use this email.';
		} else {

			$return['result'] = FALSE;
			$return['msg'] = '<i class="fa fa-times-circle-o"></i> You can not use this email.';
		}

		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();
	}

	public function save_changes( $type = 'edit_old' )
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();
		
		$this->load->helper('array');
		$selected_field = array('id', 'username', 'email', 'first_name', 'last_name', 'password');

		if( $type === 'edit_old' ) {

			$field = elements( $selected_field, $_POST );
			$id = $field['id'];
			$data['username'] = $field['username'];
			$data['email'] = $field['email'];
			$data['first_name'] = $field['first_name'];
			$data['last_name'] = $field['last_name'];

			if( ! empty( $field['password'] ) ) {

				$data['password'] = $field['password'];
			}

			$update = $this->ion_auth->update( $id, $data );
			if( $update ) {

				$return['result'] = TRUE;
				$return['msg'] = 'Your account has updated.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Your account failed to update. <br>' . $this->ion_auth->errors();
			}

		} else {
			
			unset( $selected_field[0] );
			$selected_field[] = 'group_id';
			$field = elements( $selected_field, $_POST );
			$additional_data = array(
					'first_name' => $field['first_name'],
					'last_name' => $field['last_name']
				);
			$add = $this->ion_auth->register($field['username'], $field['password'], $field['email'], $additional_data, array( $field['group_id'] ));
			if( $add) {

				$return['result'] = TRUE;
				$return['msg'] = 'Account success to added.';

			} else {

				$return['result'] = FALSE;
				$return['msg'] = 'Account failed to add. <br>' . $this->ion_auth->errors();
			}
		}

		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();
	}

	function delete( $user_id = NULL )
	{

		$this->load->library('session');

		$d = $this->ion_auth->delete_user( $user_id );
		if( $d ) {

			$this->session->set_flashdata('msg', $this->message_success('User success deleted.'));
			redirect('admin/account/all','refresh');
		} else {

			$this->session->set_flashdata('msg', $this->message_error('User fail to delete.'));
			redirect('admin/account/all','refresh');
		}
	}

}

/* End of file account.php */
/* Location: ./application/controllers/admin/account.php */
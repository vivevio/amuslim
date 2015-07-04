<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basecamp extends AM_Controller {

	public function __construct()
	{
		
		parent::__construct();	

	}

	public function index()
	{
		
		if ( $this->ion_auth->logged_in() )
		{
			redirect('/admin/dashboard');
			exit();
		}

		$this->load->view('admin/login');
	}

	public function check()
	{
		
		if( ! isset( $_POST ) || empty( $_POST ) ) show_404();

		$this->load->helper('array');

		$field = elements( array('username', 'password', 'remember'), $_POST );
		$remember = ( $field['remember'] === '1' ? TRUE : FALSE );

		$check = $this->ion_auth->login( $field['username'], $field['password'], $remember);
		if( $check ) {

			$return['result'] = TRUE;
			$return['message'] = site_url('admin/dashboard');
		} else {
			
			$return['result'] = FALSE;
			$return['message'] = $this->ion_auth->errors();
		}

		header('Content-Type: application/json');
		echo json_encode( $return );
		exit();

	}

	public function logout()
	{
		
		$this->ion_auth->logout();
		redirect('basecamp','refresh');
	}

}

/* End of file Basecamp.php */
/* Location: ./application/controllers/Basecamp.php */
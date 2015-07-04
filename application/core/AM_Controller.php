<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AM_Controller extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
	}

}

class AM_admin extends AM_Controller {
	public $_user, $_users;

	public function __construct()
	{
		
		parent::__construct();
		if ( ! $this->ion_auth->logged_in() )
		{
			show_404();
			exit();
		}

		/**
		 * 1 = Admin
		 * 2 = Contributor
		 */
		$group = array(1, 2);
		if ( ! $this->ion_auth->in_group( $group ) ) {

			show_404();
			exit();
		}

		$this->_user = $this->ion_auth->user()->row(); 
		$this->_users = $this->ion_auth->users()->result(); 
	}

	public function message_success( $message )
	{
		
		$msg = "<div class='callout callout-success'><h4>Information!</h4> <p>$message</p></div>";
		return $msg;
	}

	public function message_error( $message )
	{
		
		$msg = "<div class='callout callout-danger'><h4>Information!</h4> <p>$message</p></div>";
		return $msg;
	}
}

/* End of file AM_Controller.php */
/* Location: ./application/core/AM_Controller.php */
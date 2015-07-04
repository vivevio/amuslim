<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends AM_admin {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		// print_r( $this->_user );
		$this->template->view_admin('dashboard/dashboard.php');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AM_Controller extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->public_audio = 'public/audio/';
		$this->public_audio_hafalan = 'public/audio-hafalan/';
		DEFINE( 'PUBLICAUDIO', './' . $this->public_audio );
		DEFINE( 'PUBLICAUDIOHAFALAN', './' . $this->public_audio_hafalan );
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

	protected function _do_upload_audio( $dir = PUBLICAUDIO )
	{
		
		$config['upload_path']          = $dir;
        $config['allowed_types']        = 'mp3|aif|aiff|wav';
        $config['encrypt_name']        = TRUE;
        $config['max_size']             = 8000;


        $return = array();
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload( 'file' )) {

            $return['result'] = FALSE;
            $return['msg'] = $this->upload->display_errors();

        } else {

            $return['result'] = TRUE;
            $return['msg'] = $this->upload->data();
        }

        return $return;
	}

	protected function _delete_file_audio( $id )
	{

		$this->load->model('surah_audio_model');
		$post = $this->surah_audio_model->get_one( array( $id ) );
		if( $post ) {

			$file_path = $post->url_audio;
			unlink( './' . $file_path );
			return true;
		} else {

			return false;
		}
	}
}

/* End of file AM_Controller.php */
/* Location: ./application/core/AM_Controller.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
     /* 
     |-------------------------------------- 
     |    Template Library 
     |-------------------------------------- 
     | 
     */
  
class Template 
{ 
    protected $_CI;
    protected $template_data = array(); 
  
    public function __construct() 
    { 
        $this->_CI =& get_instance();
    }

    private function set( $name, $value )
    {
        $this->template_data[ $name ] = $value;
    }

    public function view_admin( $template = null, $data = null )
    {
        $data['CI'] = $this->_CI;
        $data['_user'] = $this->_CI->_user;
        $data['_content']   = $this->_CI->load->view('admin/' . $template, $data, true);
        $data['_menu']      = $this->_CI->load->view('admin/menu', $data, true);
        $this->_CI->load->view('admin/template', $data);
    }

    public function view_public( $template, $data = null )
    {
        
        $data['_content']   = $this->_CI->load->view('public/' . $template, $data, true);
        $data['_menu']      = $this->_CI->load->view('public/sidebar', $data, true);
        $this->_CI->load->view('public/template', $data);
    }

    private function _is_ajax()
    {
        
        return (
        $this->_CI->input->server('HTTP_X_REQUESTED_WITH') &&
        ( $this->_CI->input->server('HTTP_X_REQUESTED_WITH') == 'XMLHttpRequest') );
    }

    /*
    |--------------------------------------
    |   Load Components
    |--------------------------------------
    | Fungsi ini untuk mengecek file ada atau tidak
    | sebelum include file header, sidebar, dan footer yang berada di folder views
    |
    |   $file_name = nama file yang akan di include (recomended: header, sidebar, footer)
    |   $file_call = nama yang akan di jadikan variabel yang nantinya akan di panggil dari file-file yang berada di folder views
    |
    */
    private function load_component( $file_name, $file_call, $data )
    {
        $dir = dirname( dirname( __FILE__ ) );
        $file_directory = $dir . '/views/public/' . $file_name . '.php';

        if( file_exists( $file_directory ) )
            $this->set( $file_call, $this->_CI->load->view('public/' . $file_name, $data, TRUE) );
    }

} 
  
  
/* End of file template.php */
/* Location: ./application/libraries/template.php */
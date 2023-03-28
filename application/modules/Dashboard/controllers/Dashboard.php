<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller  {

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    *	- or -
    * 		http://example.com/index.php/welcome/index
    *	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */
    public $admin_email = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdl_dashboard');      
        Modules::run('Login/_login');
    }

    public function index()
    {
        if($this->session->userdata('admin_status') == 0 && $this->session->userdata('user_type') == 'seller')
        {
           
            $data['content']  = 'Dashboard/dashboard';
            $this->load->view('Template/seller_template',$data);
        }
        else
        {
            $data['content']  = 'Dashboard/dashboard';
            $this->load->view('Template/template',$data);

        }

    }

}
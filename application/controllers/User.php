<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        
        // Load Helpers
        $this->load->helper('url');
        $this->load->helper('uuid_helper');
        $this->load->helper('cookie');
        
        // Load Models
        $this->load->model('User_model');
    }
    
    public function index()
	{    
        show_404();
	}
    
    public function register()
    {
        $this->session->gorillaUuid = username_generator();
        
        $params = array(
            'ip_address'    => $this->input->ip_address(),
            'uuid'          => $this->session->gorillaUuid
        );
        
        if ( $this->User_model->register( $params ) )
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'controller'    => $this->uri->segment(1)
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('user/register', $data);
            $this->load->view('templates/footer', $data);
        }
        else
        {
            echo "registration error. this shouldn't happen";
        }
    }
    
    public function u($gorillaUuid = null)
    {
        if (! $gorillaUuid)
        {
            redirect('/home');
        }
        else
        {
            $this->session->gorillaUuid = $gorillaUuid;
            
            $params = array(
                'ip_address'    => $this->input->ip_address(),
                'uuid'          => $this->session->gorillaUuid,
            );
            
            if ( $this->User_model->checkUuid( $params ) )
            {
                $this->User_model->checkin( $params );
            }
            
            redirect("/home");
        }
    }
}

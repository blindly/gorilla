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
        
        $this->User_model->register( $params );
                
        $this->load->view('user/register', $params);
    }
    
    public function u($uuid = null)
    {
        if (! $uuid)
        {
            redirect('/home');
        }
        else
        {
            $this->session->gorillaUuid = $uuid;
            
            $params = array(
                'ip_address'    => $this->input->ip_address(),
                'uuid'          => $this->session->gorillaUuid,
            );

            if ( ! $this->User_model->checkUuid( $params ) )
            {
                redirect('/home');
            }
            else
            {
                $this->User_model->checkin( $params );
                redirect("/expenses");
            }
        }
    }
}

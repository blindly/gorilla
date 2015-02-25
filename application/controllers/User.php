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
    }
    
    public function index()
	{    
        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $this->session->gorillaUuid )
            $this->session->gorillaUuid = uuid_generator();
            
        $cookie = array(
                'name'   => 'uuid',
                'value'  => $this->session->gorillaUuid,
                //'expire' => '86500', /// 24 hours
                'expire' => '15570000', /// 6 months
                'domain' => 'gorilla.borke.us',
                'path'   => '/',
                'prefix' => 'gorilla_',
                'secure' => TRUE
        );

        $this->input->set_cookie($cookie);
        
        // Send user to their page
        redirect('/expenses');
	}
    
    public function uuid($gorillaUuid = null)
    {
        if ($gorillaUuid)
        {
            $this->session->gorillaUuid = $gorillaUuid;
        }

        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $this->session->gorillaUuid )
            $this->session->gorillaUuid = uuid_generator();
            
        $cookie = array(
                'name'   => 'uuid',
                'value'  => $this->session->gorillaUuid,
                //'expire' => '86500', /// 24 hours
                'expire' => '15570000', /// 6 months
                'domain' => 'gorilla.borke.us',
                'path'   => '/',
                'prefix' => 'gorilla_',
                'secure' => TRUE
        );

        $this->input->set_cookie($cookie);
        
        // Send user to their page
        redirect('/expenses');
        
        /*
        $data = array(
            'gorillaUuid' => $gorillaUuid,
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('expenses/index', $data);
        $this->load->view('templates/footer', $data);
        */
    }
    
}

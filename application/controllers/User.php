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
        $this->load->model('user');
    }
    
    public function index()
	{    
        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $this->session->gorillaUuid )
            $this->session->gorillaUuid = uuid_generator();
        
        $params = array(
            'ip_address'    => $this->input->ip_address(),
            'uuid'          => $this->session->gorillaUuid
        );
        
        if ( ! $this->User->check( $params ) )
        {
            $this->User->register( $params );
        }
        
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
        $params = array(
            'ip_address'    => $this->input->ip_address(),
            'uuid'          => $gorillaUuid
        );
        
        if ( ! $this->User->check( $params ) )
        {
            redirect('/user');
        }
        else
        {
            if ( $this->input->cookie('gorilla_uuid') )
            {
                delete_cookie('gorilla_uuid');
            }
            
            $this->session->gorillaUuid = $gorillaUuid;

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
            
            redirect('/expenses');
        }

        /*
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
        //redirect('/expenses');
        
        
        $data = array(
            'gorillaUuid' => $gorillaUuid,
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('expenses/index', $data);
        $this->load->view('templates/footer', $data);
        */
        
    }
    
}

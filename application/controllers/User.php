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
        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');

        if ( ! $this->session->gorillaUuid )
        {
            $this->session->gorillaUuid = uuid_generator();
        }
        else
        {
            if ( $this->User_model->checkUuid( array('uuid' => $this->session->gorillaUuid  ) ) )
            {
                $this->session->username = $this->User_model->getUsername( array('uuid' => $this->session->gorillaUuid) );
            }
            else
            {
                $this->session->username = username_generator();
            }
        }
        
        $params = array(
            'ip_address'    => $this->input->ip_address(),
            'uuid'          => $this->session->gorillaUuid,
            'username'      => $this->session->username
        );
        
        echo "<pre>";
        print_r($params);
        exit;
        
        if ( ! $this->User_model->checkUuid( $params ) )
        {
            $this->User_model->register( $params );
        }
        else
        {
            $this->User_model->checkin( $params );
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
        
        if ( ! $this->User_model->check( $params ) )
        {
            redirect('/user');
        }
        else
        {
            $this->User_model->checkin( $params );
            
            if ( $this->input->cookie('gorilla_uuid') )
            {
                delete_cookie('gorilla_uuid');
            }
            
            $this->session->gorillaUuid = $gorillaUuid;

            $cookie = array(
                    'name'   => 'uuid',
                    'value'  => $this->session->gorillaUuid,
                    'expire' => '15570000', /// 6 months
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'gorilla_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
            
            redirect('/expenses');
        }
    }
    
    public function name($username = null)
    {
        $params = array(
            'ip_address'    => $this->input->ip_address(),
            'username'      => $username
        );
        
        if ( ! $this->User_model->checkUsername( $params ) )
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
            $this->session->username = $this->User_model->getUsername( array('uuid' => $this->session->gorillaUuid) );
            
            $params = array(
                'ip_address'    => $this->input->ip_address(),
                'username'      => $this->session->username,
                'uuid'          => $this->session->gorillaUuid
            );
            
            $this->User_model->checkin( $params );
            
            $cookie = array(
                    'name'   => 'uuid',
                    'value'  => $this->session->gorillaUuid,
                    'expire' => '15570000', /// 6 months
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'gorilla_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
            
            redirect('/expenses');
        }
    }
}

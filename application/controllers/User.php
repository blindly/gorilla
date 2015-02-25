<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    
	public function index()
	{
        // Load Helpers
        $this->load->helper('url');
        
        $this->load->helper('uuid_helper');
        
        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $this->session->gorillaUuid )
        {
            $this->session->gorillaUuid = uuid_generator();
            $cookie = array(
                    'name'   => 'uuid',
                    'value'  => $this->session->gorillaUuid,
                    'expire' => '86500',
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'gorilla_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
        }
        
        // Send user to their page
        redirect('/user/uuid/'. $this->session->gorillaUuid);
	}
    
    public function uuid($gorillaUuid = null)
    {
        if ($gorillaUuid)
        {
            $this->session->gorillaUuid = $gorillaUuid;
        }
        
        $data = array(
            'gorillaUuid' => $gorillaUuid,
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function addExpenses()
    {
        $this->load->database();

        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'description'   => $_POST['description'],
            'amount'        => $_POST['amount'],
            'merchant'      => $_POST['merchant'],
            'location'      => $_POST['location'],
            //'date'          => $_POST['date'],
        );

        $this->db->insert('expenses', $data);
        
        echo "<pre>";
        print_r($_SESSION);
    }
    
}

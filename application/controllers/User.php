<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        // Load Helpers
        $this->load->helper('url');
        $this->load->helper('uuid_helper');
        
        // Load UUID from Cookie if user has been here before
        $gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $gorillaUuid )
        {
            $gorillaUuid = uuid_generator();
            $cookie = array(
                    'name'   => 'uuid',
                    'value'  => $gorillaUuid,
                    'expire' => '86500',
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'gorilla_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
        }
        
        // Send user to their page
        redirect('/user/uuid/'. $gorillaUuid);
	}
    
    public function uuid($gorillaUuid = null)
    {
        echo "<h1>Hi</h1>";
        echo $gorillaUuid;
    }
    
}

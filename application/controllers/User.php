<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
        $this->load->helper('uuid_helper');
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
        
        echo $gorillaUuid ;
	}
}

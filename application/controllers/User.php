<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{        
        $gorillaUuid = $this->input->cookie('gorillaUuid');
        if ( ! $gorillaUuid )
        {
            $gorillaUuid = com_create_guid();
            $cookie = array(
                    'name'   => 'gorillaUuid',
                    'value'  => $gorillaUuid,
                    'expire' => '86500',
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'myprefix_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
        }
        
        echo $gorillaUuid;
	}
}

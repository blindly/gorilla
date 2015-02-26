<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        if ($this->session->gorillaUuid)
        {
            if ( ! $this->User_model->checkUuid( array('uuid' =>  $this->session->gorillaUuid) ) )
            {
                $this->session->gorillaUuid = null;
            }
        }
        
        $data = array(
            'gorillaUuid'   => $this->session->gorillaUuid,
            'controller'    => $this->uri->segment(1)
        );
            
        $this->load->view('templates/header', $data);
		$this->load->view('home/index', $data);
        $this->load->view('templates/header', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index()
	{
        $data = array(
            'gorillaUuid'   => $this->session->gorillaUuid,
            'controller'    => $this->uri->segment(1)
        );
            
        $this->load->view('templates/header', $data);
		$this->load->view('help/index', $data);
        $this->load->view('templates/footer', $data);
	}
}

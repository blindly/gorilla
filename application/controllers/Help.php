<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index()
	{
        $params = array('gorillaUuid' => $this->session->gorillaUuid);
            
        $this->load->view('templates/header', $params);
		$this->load->view('help/index', $params);
        $this->load->view('templates/footer', $params);
	}
}

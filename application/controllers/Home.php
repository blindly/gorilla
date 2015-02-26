<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $params = array('gorillaUuid' => null)
            
        $this->load->view('templates/header', $params);
		$this->load->view('home/index', $params);
        $this->load->view('templates/header', $params);
	}
}

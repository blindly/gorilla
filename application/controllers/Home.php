<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header', $params = array());
		$this->load->view('home/index', $params = array());
        $this->load->view('templates/header', $params = array());
	}
}

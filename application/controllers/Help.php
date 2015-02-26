<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function index()
	{
        $this->load->view('templates/header', $params = array());
		$this->load->view('help/index');
        $this->load->view('templates/footer', $params = array());
	}
}

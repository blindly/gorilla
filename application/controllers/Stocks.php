<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        
        // Load Helpers
        $this->load->helper('url');
        $this->load->helper('uuid_helper');
        
        // Load Database
        $this->load->database();
        
        // Load Models
        $this->load->model('Bills_model');
        $this->load->model('User_model');
    }
    
    public function index()
    {    
        if ( ! $this->session->gorillaUuid)
        {
            redirect('/home');
        }
        else
        {
            if ( ! $this->User_model->checkUuid( array('uuid' =>  $this->session->gorillaUuid) ) )
            {
                redirect('/home');
            }
        }
        
        $data = array(
            'gorillaUuid'   => $this->session->gorillaUuid,
            'controller'    => $this->uri->segment(1)
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('bills/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function add()
    {
        //setlocale(LC_MONETARY,"en_US");
        
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'stock'         => $this->input->post('stock'),
        );
        
        echo $this->Stocks_model->add($data);
    }
    
    public function delete()
    {
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'deletes'       => $this->input->post('deletes'),
        );
        
        echo $this->Stocks_model->delete($data);
    }
    
    public function listing()
    {
        $this->load->library('parser');
        

        // Initialize grand total for expenses
        $grandTotal = 0;

        // Get All Mileage Expenses
        $this->db->where('uuid', $this->session->gorillaUuid);
        //$this->db->where('timestamp = DATE_SUB(NOW(), INTERVAL 1 MONTH)');
        //$this->db->order_by('week', 'asc');
        $stocks = $this->db->get('stocks');

        if ($stocks->num_rows() > 0 )
        {        
            $data = array(
                'total' => number_format((float)$total, 2, '.', ''),
                'stocks_listings' => $stocks->result_array()
            );

            $this->parser->parse('stocks/listing_parser', $data);
        }
        else
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'message'      => "No bills found. You should add some!",
            );

            $this->load->view('templates/message', $data);
        }
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bills extends CI_Controller {
    
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
        setlocale(LC_MONETARY,"en_US");
        
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'amount'        => number_format( (float) $this->input->post('amount'), 2, '.', ',' ),
            'company'       => ucfirst( $this->input->post('company') ),
            'week'      => $this->input->post('week'),
        );
        
        echo $this->Bills_model->add($data);
    }
    
    public function delete()
    {
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'deletes' => $this->input->post('deletes'),
        );
        
        echo $this->Bills_model->delete($data);
    }
    
    public function listing()
    {
        $this->load->library('parser');
        

        // Initialize grand total for expenses
        $grandTotal = 0;

        // Get All Mileage Expenses
        $this->db->where('uuid', $this->session->gorillaUuid);
        //$this->db->where('timestamp = DATE_SUB(NOW(), INTERVAL 1 MONTH)');
        $this->db->order_by('week', 'desc');
        $bills = $this->db->get('bills');

        if ($bills->num_rows() > 0 )
        {
            $total = 0;
            foreach ($bills->result() as $bill)
            {
                $total = $total + $bill->amount;
                
                echo "<pre>";
                print_r($total);
                echo "</pre>";
            }
            
            $grandTotal = $grandTotal + $total;

            echo "<pre>";
            print_r($grandTotal);
            echo "</pre>";
            
            $data = array(
                'total' => number_format((float)$total, 2, '.', ''),
                'bills_listings' => $bills->result_array()
            );

            $this->parser->parse('bills/listing_parser', $data);


            $data = array(
                'grandTotal' => number_format((float)$grandTotal, 2, '.', ''),
            );

            $this->parser->parse('templates/grand_total', $data);
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

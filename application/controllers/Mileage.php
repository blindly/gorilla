<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mileage extends CI_Controller {
    
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
        $this->load->model('Mileage_model');
    }
    
    public function index()
    {    
        if ( ! $this->session->gorillaUuid)
        {
            redirect('/user');
        }
        
        $data = array(
            'gorillaUuid' => $this->session->gorillaUuid,
            'controller'  => $this->uri->segment(1)
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('mileage/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    
    public function add()
    {
        $valid = true;
        $requiredFields = array('uuid', 'amount', 'category', 'merchant', 'location', 'datestamp');
        
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'amount'        => number_format((float)$this->input->post('amount'), 2, '.', ''),
            'type'          => ucfirst( $this->input->post('type') ),
            'gallon'        => number_format((float)$this->input->post('gallon'), 2, '.', ''),
            'merchant'      => ucfirst( $this->input->post('merchant') ),
            'location'      => ucfirst( $this->input->post('location') ),
            'description'   => ucfirst( $this->input->post('description') ),
            'datestamp'     => $this->input->post('datestamp'),
            'deductable'    => $this->input->post('deductable'),
        );
        
        /*
        foreach ($requiredFields as $field)
        {
            if ( ! array_key_exists($field, $requiredFields) )
            {
                $valid = false;
                break;
            }
        }
        */
        
        //if ( $valid )
        
            echo $this->Mileage_model->add($data);
        //else
            //echo "error";
    }
    
    public function listing()
    {
        $this->load->library('parser');
        

        // Initialize grand total for expenses
        $grandTotal = 0;

        // Get All Mileage Expenses
        $this->db->where('uuid', $this->session->gorillaUuid);
        //$this->db->where('timestamp = DATE_SUB(NOW(), INTERVAL 1 MONTH)');
        $this->db->order_by('datestamp', 'desc');
        $expenses = $this->db->get('mileage');

        if ($expenses->num_rows() > 0 )
        {
            $total = 0;
            foreach ($expenses->result() as $expense)
            {
                $total = $total + $expense->amount;
            }

            $grandTotal = $grandTotal + $total;

            $data = array(
                'total' => number_format((float)$total, 2, '.', ''),
                'expenses_listings' => $expenses->result_array()
            );

            $this->parser->parse('mileage/listing_parser', $data);


            $data = array(
                'grandTotal' => number_format((float)$grandTotal, 2, '.', ''),
            );

            $this->parser->parse('templates/grand_total', $data);
        }
        else
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'message'      => "No mileage logs entered. You should add some!",
            );

            $this->load->view('templates/message', $data);
        }
    }
    
}

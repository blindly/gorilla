<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses extends CI_Controller {
    
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
        $this->load->model('Expenses_model');
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
        $this->load->view('expenses/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function add()
    {
        setlocale(LC_MONETARY,"en_US");
        
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'amount'        => number_format( (float) $this->input->post('amount'), 2, '.', ',' ),
            'category'      => ucfirst( $this->input->post('category') ),
            'merchant'      => ucfirst( $this->input->post('merchant') ),
            'location'      => ucfirst( $this->input->post('location') ),
            'description'   => ucfirst( $this->input->post('description') ),
            'datestamp'     => $this->input->post('datestamp'),
            'deductible'    => $this->input->post('deductible'),
        );
        
        echo $this->Expenses_model->add($data);
    }
    
    public function delete()
    {
        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'deletes' => $this->input->post('deletes'),
        );
        
        echo $this->Expenses_model->delete($data);
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
        $expenses = $this->db->get('expenses');

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

            $this->parser->parse('expenses/listing_parser', $data);


            $data = array(
                'grandTotal' => number_format((float)$grandTotal, 2, '.', ''),
            );

            $this->parser->parse('templates/grand_total', $data);
        }
        else
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'message'      => "No expenses found. You should add some!",
            );

            $this->load->view('templates/message', $data);
        }
    }
    
    /*
    | Listing with categories
    public function listing()
    {
        $this->load->library('parser');
        
        // Get all Categories
        $this->db->distinct();
        $this->db->select('category');
        //$this->db->where('timestamp = DATE_SUB(NOW(), INTERVAL 1 MONTH)');
        $this->db->where('uuid', $this->session->gorillaUuid);
        $categories = $this->db->get('expenses');

        if ($categories->num_rows() > 0)
        {
            // Initialize grand total for expenses
            $grandTotal = 0;
            
            // Get categories in an array and then sort it
            $categoriesArray = array();
            foreach ($categories->result() as $result)
            {
                array_push($categoriesArray, $result->category);
            }
            sort($categoriesArray);
            
            // Go through each category and get all the expenses
            foreach ($categoriesArray as $category)
            {
                // Get All Expenses for category
                $this->db->where('category', $category);
                $this->db->where('uuid', $this->session->gorillaUuid);
                //$this->db->where('timestamp = DATE_SUB(NOW(), INTERVAL 1 MONTH)');
                $this->db->order_by('datestamp', 'desc');
                $expenses = $this->db->get('expenses');
                
                $total = 0;
                foreach ($expenses->result() as $expense)
                {
                    $total = $total + $expense->amount;
                }

                $grandTotal = $grandTotal + $total;

                $data = array(
                    'total' => number_format((float)$total, 2, '.', ''),
                    'category' => $category,
                    'expenses_listings' => $expenses->result_array()
                );

                $this->parser->parse('expenses/listing_parser', $data);
            }
    
            $data = array(
                'grandTotal' => number_format((float)$grandTotal, 2, '.', ''),
            );

            $this->parser->parse('expenses/grand_total', $data);
        }
        else
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'message'      => "No expenses listed. You should add some!",
            );

            $this->load->view('templates/message', $data);
        }
    }
    */
    
}

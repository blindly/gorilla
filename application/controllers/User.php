<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    
	public function index()
	{
        // Load Helpers
        $this->load->helper('url');
        
        $this->load->helper('uuid_helper');
        
        // Load UUID from Cookie if user has been here before
        $this->session->gorillaUuid = $this->input->cookie('gorilla_uuid');
        if ( ! $this->session->gorillaUuid )
        {
            $this->session->gorillaUuid = uuid_generator();
            $cookie = array(
                    'name'   => 'uuid',
                    'value'  => $this->session->gorillaUuid,
                    'expire' => '86500',
                    'domain' => 'gorilla.borke.us',
                    'path'   => '/',
                    'prefix' => 'gorilla_',
                    'secure' => TRUE
            );

            $this->input->set_cookie($cookie);
        }
        
        // Send user to their page
        redirect('/user/me');
	}
    
    public function uuid($gorillaUuid = null)
    {
        if ($gorillaUuid)
        {
            $this->session->gorillaUuid = $gorillaUuid;
        }
        
        $data = array(
            'gorillaUuid' => $gorillaUuid,
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function me()
    {
        // Load Helpers
        $this->load->helper('url');
        
        if ( ! $this->session->gorillaUuid)
        {
            redirect('/user');
        }
        
        $data = array(
            'gorillaUuid' => $this->session->gorillaUuid,
        );
        
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function addExpenses()
    {
        $this->load->database();

        $data = array(
            'uuid'          => $this->session->gorillaUuid,
            'amount'        => number_format((float)$this->input->post('amount'), 2, '.', ''),
            'category'      => ucfirst( $this->input->post('category') ),
            'merchant'      => ucfirst( $this->input->post('merchant') ),
            'location'      => ucfirst( $this->input->post('location') ),
            'description'   => ucfirst( $this->input->post('description') ),
            'datestamp'     => $this->input->post('datestamp'),

        );

        $this->db->insert('expenses', $data);
        
        echo "done";
    }
    
    public function listExpenses()
    {
        $this->load->database();
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

                $this->parser->parse('user/expenses_parser', $data);
            }
    
            $data = array(
                'grandTotal' => number_format((float)$grandTotal, 2, '.', ''),
            );

            $this->parser->parse('user/grand_total', $data);
        }
        else
        {
            $data = array(
                'gorillaUuid'   => $this->session->gorillaUuid,
                'message'      => "No expenses listed. You should add some!",
            );

            $this->load->view('user/message', $data);
        }
    }
    
}

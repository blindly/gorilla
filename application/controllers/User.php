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
            'amount'        => ucfirst( $this->input->post('amount') ),
            'merchant'      => ucfirst( $this->input->post('merchant') ),
            'location'      => ucfirst( $this->input->post('location') ),
        );

        $this->db->insert('expenses', $data);
        
        echo "done";
    }
    
    public function listExpenses()
    {
        $this->load->database();
                
        // Get All Expenses
        $this->db->where('uuid', $this->session->gorillaUuid);
        $expenses = $this->db->get('expenses');
                
        if ($expenses->num_rows() > 0)
        {

            echo "
                <table class='table table-striped'>
                    <tr>
                        <th>Amount</th>
                        <th>Merchant</th>
                        <th>Location</th>
                        <th>Timestamp</th>
                    </tr>";
            
            foreach ($expenses->result() as $expense)
            {
                echo "
                    <tr>
                        <td>\$$expense->amount</td>
                        <td>$expense->merchant</td>
                        <td>$expense->location</td>
                        <td>$expense->timestamp</td>
                    </tr>";

            }
        
            echo "</table>";

        }
    }

    public function dashboard()
    {
        $this->load->database();
        $this->load->library('parser');
        
        // Get all Categories
        $this->db->distinct();
        $this->db->select('category');
        $categories = $this->db->get('expenses');

        if ($categories->num_rows() > 0)
        {
            foreach ($categories->result() as $category)
            {
                // Get All Expenses for category
                $this->db->where('category', $category);
                $this->db->where('uuid', $this->session->gorillaUuid);
                $expenses = $this->db->get('expenses');

                $data = array(
                    'expenses_listings' => $expenses->result_array()
                );

                $this->parser->parse_string('user/expenses_parser', $data);
            }
        }
        else
        {
            // Get All Expenses
            $this->db->where('uuid', $this->session->gorillaUuid);
            $expenses = $this->db->get('expenses');

            $data = array(
                'gorillaUuid' => $gorillaUuid,
                'expenses' => $expenses,
            );

            $this->load->view('templates/header', $data);
            $this->load->view('user/expenses', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expenses_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        
        $this->load->database();
    }
    
    public function add($params = array())
    {
        $params['amount'] = str_replace('$','', $params['amount']);
        $this->db->insert('expenses', $params);
        
        if ( $this->db->affected_rows() > 0 ) 
            echo "done";
        else
            echo "error";
    }
}
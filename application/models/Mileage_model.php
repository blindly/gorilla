<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mileage_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        
        $this->load->database();
    }
    
    public function add($params = array())
    {
        $params['amount'] = str_replace('$','', $params['amount']);
        $params['gallon'] = str_replace('$','', $params['gallon']);
        $this->db->insert('mileage', $params);
        
        if ( $this->db->affected_rows() > 0 ) 
            echo "done";
        else
            echo "error";
    }
}
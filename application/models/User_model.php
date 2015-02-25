<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        
        $this->load->database();
    }
    
    public function register($params = array())
    {
        $this->db->insert('users', $params);
        
        if ( $this->db->affected_rows() > 0 ) 
            echo "done";
        else
            echo "error";
    }
    
    public function check($params = array())
    {        
        $this->db->where('uuid', $params['uuid']);
        $valid = $this->db->get('users');
        
        if ( $valid->num_rows() > 0 ) 
            return true;
    }
}
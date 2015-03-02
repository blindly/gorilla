<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        
        $this->load->database();
    }
    
    public function add($params = array())
    {
        $this->db->insert('stocks', $params);
        
        if ( $this->db->affected_rows() > 0 ) 
            echo "done";
        else
            echo "error";
    }

    public function delete($params = array())
    {
        foreach ($params['deletes'] as $id)
        {
            $data = array(
                'uuid'  => $params['uuid'],
                'id'    => $id,
            );
            
            $this->db->delete('stocks', $data);
        }
    }

}
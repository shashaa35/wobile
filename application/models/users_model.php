<?php

class Users_model extends CI_Model {

    /**
     * @desc load both db
     */
        function __construct() {
        parent::__Construct();

        $this->db = $this->load->database('default', TRUE, TRUE);
        
    }
    //global variables
    function login($username,$password) {
        $query=$this->db->get_where('users',array('username'=>$username,'password'=>$password));
        $result=$query->result_array();
        $status=sizeof($result);
        if($status>0)
            return true;
        else
            return false;
    }
    function signup($username,$password,$email)
    {
        $data=array('username'=>$username,'password'=>$password,'email'=>$email);
        $query=$this->db->insert('users',$data);
        if($query>0)
            {
                return true;
            }
        else
            return false;
    }
    
}
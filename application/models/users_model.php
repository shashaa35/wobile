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
    function get_user_id($username,$password)
    {
        $sql="select distinct id from users where username='$username' and password='$password'";
        $q = $this->db->query($sql);
        $result = $q->result_array();
        return $result[0]['id'];
    }
    function insert_contact($user_id,$name,$fb_link,$email,$phone)
    {
        $sql="INSERT INTO `contacts`( `user_id`, `name`, `fb_link`, `email`, `phone`, `last_usage`) 
                VALUES ($user_id,$name,$fb_link,$email,$phone,CURRENT_TIMESTAMP)";
        $q = $this->db->query($sql);    
    }
    function get_recents($user_id)
    {
        $sql="Select * from contacts where user_id=$user_id order by last_usage desc";
        $q = $this->db->query($sql);
        $result = $q->result_array();
        return $result;      
    }
    
}
<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-02-28
 * Time: 11:28 PM
 */

/*
* This is a login model, it contains commun function used by Login controller 
*/
class Login_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // check whether the login and password are valid or not
    public function login_valid($email=NULL, $password=NULL)
    {
        if ($email && $password)
        {
            $this->db->select('*');
            $this->db->where("email", $email);
            $this->db->where("password", $password);
            $query = $this->db->get("user");
            return $query->result();
        }
        else
        {
            return false;
        }

    }
}
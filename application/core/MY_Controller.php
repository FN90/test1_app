<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-02-28
 * Time: 9:55 PM
 */

class MY_Controller extends CI_Controller
{
    /*
	** construct
	*/
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load session library
        $this->load->library('session');
        //set and load admin_language
        $this->is_logged_in(); // If user not logged in, send them to login page
        //$this->sg_new_sql_dump();
        $admin_language=($this->session->userdata('admin_language')) ? $this->session->userdata('admin_language') : default_language;
        $this->session->set_userdata('admin_language', $admin_language);
        $this->lang->load('admin', $this->session->userdata('admin_language'));
    }
    /*
	** To access admin section user must be:
	*	1-be logged in
	*	2-have access: admin or superadmin
	*/
    public function is_logged_in()
    {
        //if user not logged in, redirect to login
        if(!$this->session->userdata('admin_is_logged'))
        {
            $this->redirect=base_url().'index.php/login';
            redirect($this->redirect);
        }
        else
        {

        }

    }
}

class Login_Controller extends CI_Controller
{
    /*
    ** construct
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        //load session library
        $this->load->library('session');
        //set and load admin_language
        //$this->sg_new_sql_dump();
        $admin_language=($this->session->userdata('admin_language')) ? $this->session->userdata('admin_language') : default_language;
        $this->session->set_userdata('admin_language', $admin_language);
        $this->lang->load('admin', $this->session->userdata('admin_language'));
    }
}
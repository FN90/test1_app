<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-02-28
 * Time: 10:01 PM
 */
class Login extends Login_Controller
{
    public function __construct()
    {
        parent::__construct();
        // load libs and model
        $this->load->helper('url');
        $this->load->library( 'session' );
        $this->load->model('login_model');
    }
    public function index()
    {
        // if user is already logged in redirect to the main page
        if($this->session->userdata('admin_is_logged'))
            redirect(base_url()."management/boat");
        // else redirect to login form
        $data['content'] = 'login_form';
        $this->load->view( $data['content']);
    }

    // log user in
    public function log_user()
    {
        if($this->input->post('email') && $this->input->post('password'))
        {
            // check if the user provide the correct email and password
            if($this->input->post('email')=="admin@umoncton.ca" && $this->input->post('password')=="admin")
            {
                // put variable in the session
                $this->session->set_userdata('admin_is_logged', true);
                $this->session->set_userdata('username', "Administrateur");
                $this->session->set_userdata('user_photo', 'user.png');
                // redirect to dashboard
                redirect(base_url()."management/boat");
            }
            else
            {
                // check email and password in database
                if($user_record=$this->login_model->login_valid($this->input->post('email'), $this->input->post('password')))
                {
                    // put variable in the session
                    $this->session->set_userdata('admin_is_logged', true);
                    $this->session->set_userdata('username', $user_record[0]->first_name." ".$user_record[0]->last_name);
                    $this->session->set_userdata('user_photo', $user_record[0]->first_name.$user_record[0]->last_name.".jpg");
                    // redirect to dashboard
                    redirect(base_url()."management/boat");
                }
                else
                {
                    // put error message into session, to be shown in login form
                    $this->session->set_userdata('login_message', lang('login_message'));
                    redirect(base_url()."login");
                }
            }
        }
    }

    // logout
    public function logout()
    {
        // delete flag from the session
        $this->session->unset_userdata('admin_is_logged');
        // redirect to dashboard
        redirect(base_url()."index.php/login");
    }

    // Switch language in login form
    public function switch_lang($language=NULL)
    {
        // switch user language and redirect
        if($language=='french' || $language=='spanich')
            $this->session->set_userdata('admin_language', $language);
        my_redirect("management", "boat");
    }

}
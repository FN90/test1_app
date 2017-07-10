<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-07-08
 * Time: 10:01 PM
 */
class Switch_language extends MY_Controller
{
    public $name = NULL;
    public $folder = "default";
    public function __construct()
    {
        parent::__construct();
        $this->name =strtolower(get_class($this));
        $this->load->helper('url');
    }
    public function index($language=NULL)
    {
        // switch user language and redirect
        if($language=='french' || $language=='spanich')
            $this->session->set_userdata('admin_language', $language);
        my_redirect("management", "boat");
    }
}
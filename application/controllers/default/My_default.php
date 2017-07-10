<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-07-08
 * Time: 10:01 PM
 */
class My_default extends CI_Controller
{
    public $name = NULL;
    public $folder = "default";
    public function __construct()
    {
        parent::__construct();
        $this->name =strtolower(get_class($this));
        $this->load->helper('url');
        //$this->load->model('default_model');
    }
    public function index()
    {
        $data['content'] = $this->folder."/".$this->name."_view";
        $this->load->view('theme/template', $data);
    }



}
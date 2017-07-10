<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-07-08
 * Time: 10:01 PM
 */
class Book extends MY_Controller
{
    public $name = NULL;
    public $folder = "management";
    public function __construct()
    {
        parent::__construct();
        $this->name =strtolower(get_class($this));
        // load libs and model
        $this->load->helper('url');
        $this->load->model('base_model');
    }
    /*
    * index: default entry
    */
    public function index()
    {
        $data['row'] = NULL;
        $data['rows'] = NULL;
        // get rows records from database
        $data['rows'] = $this->base_model->get_all($this->name);
        $data['content'] = $this->folder."/".$this->name."_form";
        $data['listing'] = $this->folder."/".$this->name."_listing";
        $this->load->view('theme/template', $data);
    }

    /*
    * Insert data into db
    */
    public function insert()
    {
        if($_POST)
        {
             $data = array(
                'name'=>$this->input->post('name'),
                'url_on_amazon'=>$this->input->post('url_on_amazon'),
            );
             // send data to the model
            $this->base_model->insert($this->name, $data);
            redirect(base_url().$this->folder."/".$this->name);          
        }
       
    }

    /*
    * Update data
    */
    public function update()
    {
        if($_POST)
        {
            // init data
             $data = array(
                'id'=>$this->input->post('id'),
                'name'=>$this->input->post('name'),
                'url_on_amazon'=>$this->input->post('url_on_amazon'),
            );
             // send data to the model
            $this->base_model->update($this->name, $data);
            redirect(base_url().$this->folder."/".$this->name);          
        }
    }

    /*
    * Get data from db to edit
    */
    public function edit($id=NULL)
    {
        // if no id specified : redirect
        if(!$id)
            my_redirect($this->folder, $this->name);

        // get data record and send them to the form view or redirect
        $data['row'] = NULL;
        if($id && $data['row'] = $this->base_model->get($this->name, $id))
        {
            $data['content'] = $this->folder."/".$this->name."_form";
            $this->load->view('theme/template', $data);
        }
        else
        {
            my_redirect($this->folder, $this->name);
        }
    }

    /*
    * Delete data from db
    */
    public function delete($id=NULL)
    {
        if($id)
        {
            // delete data and redirect to index
            $this->base_model->delete($this->name, $id);
            my_redirect($this->folder, $this->name);
        }
    }

    /*
    * POST Delete data from db (used when bootstrap modal is triggered)
    */
    public function post_delete()
    {
        if($id=$this->input->post('id'))
        {
            // delete data and redirect to index
            $this->base_model->delete($this->name, $id);
            my_redirect($this->folder, $this->name);
        }
    }


}
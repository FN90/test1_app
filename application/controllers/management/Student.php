<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-07-08
 * Time: 10:01 PM
 */
class Student extends MY_Controller
{
    public $name = NULL;
    public $folder = "management";
    public function __construct()
    {
        parent::__construct();
        $this->name =strtolower(get_class($this));
        // load libs and model
        $this->load->helper('url');
        $this->load->model($this->name.'_model');
    }
    /*
    * index: default entry
    */
    public function index()
    {
        $data['row'] = NULL;
        $data['rows'] = NULL;
        // get rows records from database
        $data['rows'] = $this->student_model->get_all();
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
            // init data
            $data = array(
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'has_skipair'=>$this->input->post('has_skipair') ? true:false,
            );
            // send data to the model
            $this->student_model->insert($data);
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
                'first_name'=>$this->input->post('first_name'),
                'last_name'=>$this->input->post('last_name'),
                'has_skipair'=>$this->input->post('has_skipair') ? true:false,
            );
            // send data to the model
            $this->student_model->update($data);
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

        // get data record and send them to the view or redirect
        $data['row'] = NULL;
        if($id && $data['row'] = $this->student_model->get($id))
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
            $this->student_model->delete($id);
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
            // delete and redirect
            $this->student_model->delete($id);
            my_redirect($this->folder, $this->name);
        }
    }

    /*
    * View details
    */
    public function view($id=NULL)
    {
        // if no id specified : redirect
        if(!$id)
            my_redirect($this->folder, $this->name);

        // get data record and send them to the view or redirect
        $data['row'] = NULL;
        if($id && $data['row'] = $this->student_model->get($id))
        {
            // load views
            $data['content'] = $this->folder."/".$this->name."_view";
            $this->load->view('theme/template', $data);
        }
        else
        {
            // redirect to index
            my_redirect($this->folder, $this->name);
        }
    }
}
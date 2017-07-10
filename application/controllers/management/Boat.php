<?php

/**
 * Created by PhpStorm.
 * User: Fahmi
 * Date: 2017-07-08
 * Time: 10:01 PM
 */
class Boat extends MY_Controller
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
        $data['rows'] = $rows = $this->base_model->get_all($this->name);
        // for each row get nbr of students and books
        if($rows)
        {
            foreach ($rows as $row) 
            {
                // count students
                $row->students_count = 0;
                if($students = $this->base_model->get_boat_students($row->id))
                {
                    $row->students_count = count($students);
                    // count students that has skipair
                    $row->students_has_skipair_count = 0;
                    foreach ($students as $student) {
                        # code...
                        if($student->has_skipair)
                            $row->students_has_skipair_count++;
                    }
                }

                // count books
                $row->books_count = 0;
                if($books = $this->base_model->get_boat_books($row->id))
                {
                    $row->books_count = count($books);
                }
            }
        }
        $data['rows'] = $rows;
        // load views
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
                'name'=>$this->input->post('name'),
                'price'=>$this->input->post('price'),
                'color'=>$this->input->post('color'),
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
                'price'=>$this->input->post('price'),
                'color'=>$this->input->post('color'),
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
        if(!$id)
            my_redirect($this->folder, $this->name);

        // get correspondant data and send them to the view
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
        // delete if id is valid and redirect
        if($id)
        {
            $this->base_model->delete($this->name, $id);
            my_redirect($this->folder, $this->name);
        }
        my_redirect($this->folder, $this->name);
    }

    /*
    * POST Delete data from db
    */
    public function post_delete()
    {
        // delete and redirect
        if($id=$this->input->post('id'))
        {
            $this->base_model->delete($this->name, $id);
            my_redirect($this->folder, $this->name);
        }
        my_redirect($this->folder, $this->name);
    }

    /*
    * View details
    */
    public function view($id=NULL)
    {
        if(!$id)
            my_redirect($this->folder, $this->name);

        // get correspendent data and send them to the view
        $data['row'] = NULL;
        if($id && $data['row'] = $this->base_model->get($this->name, $id))
        {
            $data['content'] = $this->folder."/".$this->name."_view";
            $this->load->view('theme/template', $data);
        }
        else
        {
            my_redirect($this->folder, $this->name);
        }
    }

    /*
    * boat student assignement
    */
    public function students($id=NULL)
    {
        $data['row'] = NULL;
        $data['boat_students'] = NULL;
        $data['students'] = NULL;

        // put current boat id into session
        $this->session->set_userdata('boat_id', $id);
        // get boat and get student assigned
         if(!$id)
            my_redirect($this->folder, $this->name);

        if($id && $row = $this->base_model->get($this->name, $id))
        {
            $data['row'] = $row;
            // get student for the current boat
            $data['boat_students'] = $this->base_model->get_boat_students($id);
            // get current boat students ids
            $boat_students_ids = $this->base_model->get_boat_students_ids($id);
            // get student that are not assigned to the current boat
            $students = $this->base_model->get_all_not_boat($id, $boat_students_ids);
            // for each student check assignement status
            if($students)
            {
                foreach ($students as &$student) 
                {
                    if($student_assigned_boat =  $this->base_model->get_student_assigned_boat($student->id))
                    {
                        // add new attributes to the object
                        $student->assigned = TRUE;
                        $student->boat = $student_assigned_boat->name;
                    }
                    else
                    {
                         // add new attributes to the object
                        $student->assigned = FALSE;
                        $student->boat = "";
                    }
                }
            }

            // load views
            $data['students'] = $students;
            $data['content'] = $this->folder."/".$this->name."_student_view";
            $this->load->view('theme/template', $data);
        }
        else
        {
            my_redirect($this->folder, $this->name);
        }   
    }

     /*
    * boat books assignement
    */
    public function books($id=NULL)
    {
        $data['row'] = NULL;
        $data['boat_students'] = NULL;
        $data['students'] = NULL;

        // put current boat id into session
        $this->session->set_userdata('boat_id', $id);
        // get boat and get student assigned
         if(!$id)
            my_redirect($this->folder, $this->name);

        if($id && $row = $this->base_model->get($this->name, $id))
        {
            $data['row'] = $row;
            // get books for the current boat
            $data['boat_books'] = $this->base_model->get_boat_books($id);
            // get current boat books ids
            $boat_books_ids = $this->base_model->get_boat_books_ids($id);
            // get books that are not assigned to the current boat
            $books = $this->base_model->get_all_books_not_boat($id, $boat_books_ids);
            // for each student check assignement status
            if($books)
            {
                foreach ($books as &$book) 
                {
                     // add new attributes to the object to designate whether the book is chosen or not
                    if($book_assigned_boat =  $this->base_model->get_book_assigned_boat($book->id))
                    {
                        $book->assigned = TRUE;
                        $book->boat = $book_assigned_boat->name;
                    }
                    else
                    {
                        $book->assigned = FALSE;
                        $book->boat = "";
                    }
                }
            }
            $data['books'] = $books;
            // load views
            $data['content'] = $this->folder."/".$this->name."_book_view";
            $this->load->view('theme/template', $data);
        }
        else
        {
            my_redirect($this->folder, $this->name);
        }   
    }

    /*
    * POST Delete student assignement data from db
    */
    public function post_delete_student_assgnement()
    {
        if($student_id=$this->input->post('id'))
        {
            // delete current student assignement
            $this->base_model->delete_student_assignement($this->session->userdata('boat_id'), $student_id);
            // update student change 
             $data = array(
                'id'=>$this->session->userdata('boat_id'),
                'last_student_change'=>date('Y-m-d h:i:s'),
            );
            $this->base_model->update($this->name, $data);
            // redirect
            my_redirect($this->folder, $this->name, "students/".$this->session->userdata('boat_id'));
        }
    }


    /*
    * POST Delete book assignement data from db
    */
    public function post_delete_book_assgnement()
    {
        if($book_id=$this->input->post('id'))
        {
            // delete assignement and redirect
            $this->base_model->delete_book_assignement($this->session->userdata('boat_id'), $book_id);
            my_redirect($this->folder, $this->name, "books/".$this->session->userdata('boat_id'));
        }
    }

    /*
    * POST add student assignement data from db
    */
    public function post_assign_student()
    {
        if($student_id=$this->input->post('id'))
        {
            // delete current assignement if exists
            $this->base_model->delete_current_assignement($student_id);
            // assign student
            $data = array(
                    'id_boat'=>$this->session->userdata('boat_id'),
                    'id_student'=>$student_id,
                );
            $this->base_model->insert('boat_has_student', $data);
            // update student change 
             $data = array(
                'id'=>$this->session->userdata('boat_id'),
                'last_student_change'=>date('Y-m-d h:i:s'),
            );
            $this->base_model->update($this->name, $data);
            // redirect
            my_redirect($this->folder, $this->name, "students/".$this->session->userdata('boat_id'));
        }
    }

     /*
    * POST add book assignement data from db
    */
    public function post_assign_book()
    {
        if($book_id=$this->input->post('id'))
        {
            // delete current assignement if exists
            $this->base_model->delete_current_book_assignement($book_id);
            // assign student
            $data = array(
                    'id_boat'=>$this->session->userdata('boat_id'),
                    'id_book'=>$book_id,
                );
            $this->base_model->insert('boat_has_book', $data);
            // redirect
            my_redirect($this->folder, $this->name, "books/".$this->session->userdata('boat_id'));
        }
    }
}
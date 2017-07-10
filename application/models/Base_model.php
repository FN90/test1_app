<?php
/*
* This is a commun model, it can be used by any controller, you only need to specify table name
* for general CRUD operations (Create, Read, Update, Delete)
* If you need more sophisticated model functions, just add them at anytime by editing this file
*/
class Base_model extends CI_Model 
{
    
    public function __construct()   
    {
        $this->load->database(); 
    }

    /*
    * insert
    */
    public function insert($table, $data)
    {
    	if($table && $data)
    	{
    		$this->db->insert($table, $data);
    	}
    }

    /*
    * update
    */
    public function update($table, $data)
    {
    	if($table && $data)
    	{
            $this->db->where('id', $data['id']);
			$this->db->update($table, $data);
    	}
    }

    /*
    * delete
    */
    public function delete($table, $id)
    {
    	if($table && $id)
    	{
    		$this->db->delete($table, array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
    	}
    }

    /*
    * get data
    */
    public function get($table, $id)
    {
    	if($table && $id)
    	{
			$this->db->select("*");
            $this->db->where('id', $id); // Produces: WHERE name = 'Joe'
            $query = $this->db->get($table);
            $query = $query->result();
            if($query)
                return $query[0];
            else
                return NULL;
    	}
    }

    /*
    * get all data
    */
    public function get_all($table)
    {
        if($table)
        {
            $this->db->select("*");
            $query = $this->db->get($table);
            $query = $query->result();
            return $query;
        }
    }

    /*
    * get all data
    */
    public function get_all_not_boat($boat_id, $ignore)
    {
        $this->db->select("*, student.id AS id");
        $this->db->from('student');
        //$this->db->where('boat_has_student.id_boat', $boat_id);
        $this->db->join('boat_has_student', 'boat_has_student.id_student = student.id', 'left');
        if($ignore)  $this->db->where_not_in('student.id', $ignore);
        $query = $this->db->get();
        $query = $query->result();
        return $query;
    }

    /*
    * get all data
    */
    public function get_all_books_not_boat($boat_id, $ignore)
    {
        $this->db->select("*, book.id AS id");
        $this->db->from('book');
        $this->db->join('boat_has_book', 'boat_has_book.id_book = book.id', 'left');
        if($ignore)  $this->db->where_not_in('book.id', $ignore);
        $query = $this->db->get();
        $query = $query->result();
        return $query;
    }

    /*
    * get boat students
    */
    public function get_boat_students($id)
    {
        if($id)
        {
            $this->db->select("*, student.id AS id");
            $this->db->from('student');
            $this->db->where('boat_has_student.id_boat', $id);
            $this->db->join('boat_has_student', 'boat_has_student.id_student = student.id');
            $query = $this->db->get();
            $query = $query->result();
            return $query;
        }
        else
        {
            return NULL;
        }
    }

     /*
    * get boat students
    */
    public function get_boat_books($id)
    {
        if($id)
        {
            $this->db->select("*, book.id AS id");
            $this->db->from('book');
            $this->db->where('boat_has_book.id_boat', $id);
            $this->db->join('boat_has_book', 'boat_has_book.id_book = book.id');
            $query = $this->db->get();
            $query = $query->result();
            return $query;
        }
        else
        {
            return NULL;
        }
    }

    /* 
    * get boat students ids
    */
    public function get_boat_students_ids($id)
    {
        if($id)
        {
            $this->db->select("*, student.id AS id");
            $this->db->from('student');
            $this->db->where('boat_has_student.id_boat', $id);
            $this->db->join('boat_has_student', 'boat_has_student.id_student = student.id');
            $query = $this->db->get();
            $query = $query->result();
            $ids = array();
            if($query)
            {
                foreach ($query as $row) {
                    $ids[] = $row->id;
                }
            }
            return $ids;
        }
        else
        {
            return NULL;
        }
    }

    /* 
    * get boat students ids
    */
    public function get_boat_books_ids($id)
    {
        if($id)
        {
            $this->db->select("*, book.id AS id");
            $this->db->from('book');
            $this->db->where('boat_has_book.id_boat', $id);
            $this->db->join('boat_has_book', 'boat_has_book.id_book = book.id');
            $query = $this->db->get();
            $query = $query->result();
            $ids = array();
            if($query)
            {
                foreach ($query as $row) {
                    $ids[] = $row->id;
                }
            }
            return $ids;
        }
        else
        {
            return NULL;
        }
    }

    /*
    * get student assigned boat
    */
    public function get_student_assigned_boat($id)
    {
        if($id)
        {
            $this->db->select("*");
            $this->db->from('boat');
            $this->db->where('boat_has_student.id_student', $id);
            $this->db->join('boat_has_student', 'boat_has_student.id_boat = boat.id');
            $query = $this->db->get();
            $query = $query->result();
            return $query ? $query[0]:NULL;
        }
        else
        {
            return NULL;
        }
    }

    /*
    * get book assigned boat
    */
    public function get_book_assigned_boat($id)
    {
        if($id)
        {
            $this->db->select("*");
            $this->db->from('boat');
            $this->db->where('boat_has_book.id_book', $id);
            $this->db->join('boat_has_book', 'boat_has_book.id_boat = boat.id');
            $query = $this->db->get();
            $query = $query->result();
            return $query ? $query[0]:NULL;
        }
        else
        {
            return NULL;
        }
    }

    /*
    * delete
    */
    public function delete_student_assignement($boat_id, $student_id)
    {
        if($boat_id && $student_id)
        {
            $this->db->delete('boat_has_student', array('id_boat'=>$boat_id, 'id_student' => $student_id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }
    }

    /*
    * delete
    */
    public function delete_book_assignement($boat_id, $book_id)
    {
        if($boat_id && $book_id)
        {
            $this->db->delete('boat_has_book', array('id_boat'=>$boat_id, 'id_book' => $book_id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }
    }

    /*
    * delete current assignement
    */
    public function delete_current_assignement($student_id)
    {
        if($student_id)
        {
            $this->db->delete('boat_has_student', array('id_student' => $student_id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }
    }

    /*
    * delete current assignement
    */
    public function delete_current_book_assignement($book_id)
    {
        if($book_id)
        {
            $this->db->delete('boat_has_book', array('id_book' => $book_id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
        }
    }

    /*
    * insert
    */
    public function assign_student_boat($table, $data)
    {
        if($table && $data)
        {
            $this->db->insert($table, $data);
        }
    }
}
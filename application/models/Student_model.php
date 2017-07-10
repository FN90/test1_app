<?php
/*
* This is a login model, it contains commun function used by Student controller 
* We can use Base_model instead of this one, it is just a practice if we need to use separated models
*/
class Student_model extends CI_Model 
{

    public function __construct()   
    {
        $this->load->database(); 
    }

    /*
    * insert
    */
    public function insert($data)
    {
    	if($data)
    	{
    		$this->db->insert('student', $data);
    	}
    }

    /*
    * update
    */
    public function update($data)
    {
    	if($data)
    	{
            $this->db->where('id', $data['id']);
			$this->db->update('student', $data);
    	}
    }

    /*
    * delete
    */
    public function delete($id)
    {
    	if($id)
    	{
    		$this->db->delete('student', array('id' => $id));  // Produces: // DELETE FROM mytable  // WHERE id = $id
    	}
    }

    /*
    * get data
    */
    public function get($id)
    {
    	if($id)
    	{
			$this->db->select("*");
            $this->db->where('id', $id); // Produces: WHERE name = 'Joe'
            $query = $this->db->get("student");
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
    public function get_all()
    {
        $this->db->select("*");
        $query = $this->db->get("student");
        $query = $query->result();
        return $query;
    }
}
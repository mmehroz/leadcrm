<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_frontend extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
  
   
    //check relation reference
    public function get_relation_pax($table,$column,$reference,$input)
    {
        $this->db->select($column);
        $this->db->where($reference,$input);
        $this->db->where('is_enable',1);
        $result =  $this->db->get($table)->result();
        return $result[0]->$column;

    }

    //check relation reference multiple
    public function get_relation_pax_multiple($table,$column,$wheres)
    {
        $this->db->select($column);
        //$this->db->where($reference,$input);
        foreach($wheres as $key_wh => $wh):
            $this->db->where($key_wh,$wh);
        endforeach;
        $this->db->where('is_enable',1);
        $result =  $this->db->get($table)->result();
        return $result[0]->$column;

    }

    public function db_command($data, $id ,$table)
    {
        // Insert
        if ($id == NULL)
        {
            $this->db->set($data);
            $this->db->insert($table);
            $id = $this->db->insert_id();
        }
        // Update
        else
        {
            $filter = 'id';
            $id     = $filter($id);
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update($table);
        }

        return $id;
    }
    public function db_delete($id,$table)
    {
        $this->db->where($this->_primary_key, $id);
        $delete =  $this->db->delete($table);
        if($delete)
        {
            return 1;
        }else
        {
            return 0;
        }
    }

}
?>

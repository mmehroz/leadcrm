<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_account extends CI_Model {

    protected $_table_name     = 'user_list';
    protected $_order_by       = 'id';
    protected $_primary_column = 'id';


    function __construct()
    {
        parent::__construct();
    }
    //Single User List
    public function _this_controller_record($id)
    {
        $this->db->select('*');
        if ($id > 0)
        {
                $this->db->where('id', $id);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('user_list');
        return $query->result();
    }


    public function _get_single_record_byid($id)
    {
        $this->db->where($this->_primary_column ,$id);
        $this->db->order_by($this->_order_by);
        $query =  $this->db->get($this->_table_name);
        return $query->result();    
    }
    public function _get_single_record_byusername($username,$id)
    {  
        $this->db->select('id,username'); 
        $this->db->where('username' ,$username);
        $this->db->order_by($this->_order_by);
        $query =  $this->db->get($this->_table_name);
        $row   = $query->num_rows();  
        if($id != null)
        {
            $result = $query->result();
            if($row > 0)
            {
                if($result[0]->id == $id)
                {
                    return 0;
                }else
                {
                    return 1; 
                } 
            }else
            {
                return $row;
            }   
        }else
        {
            return  $row; 
        }
    }

    //Country List
    public function country_list($parm)
    {
        $this->db->select('code,name');
        $this->db->order_by('code','asc');
        $result =  $this->db->get('countries')->result();
        $array = array(
            '' => 'Select Country'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->code] = $res->name;
            }
        }
        return $array;
    }

    public function _change_user_status($id,$status,$table)
    {
        if($id != null)
        {
            $data['is_enable'] = $status;

            $this->db->set($data);
            $this->db->where('id', $id);
            $update =  $this->db->update($table);


          //  $update =  $this->db_command($data,$id,$table);
            if($update)
            {
                return 1;
            }else
            {
                return 0;
            }
        }  
    }


    public function _change_seller_status($id,$status,$table)
    {
        if($id != null)
        {

            $data['admin_status'] = $status;

            $this->db->set($data);
            $this->db->where('id', $id);
            $update =  $this->db->update($table);


            //  $update =  $this->db_command($data,$id,$table);
            if($update)
            {
                return 1;
            }else
            {
                return 0;
            }
        }
    }

    //User Print Status
    public function _change_user_is_print($id,$status)
    {
        if($id != null)
        {
            $data['is_print'] = $status;  
            $update =  $this->db_command($data,$id,$this->_table_name);  
            if($update)
            {
                return 1;
            }else
            {
                return 0;
            }
        }  
    }

    //Get Relation Pax
    public function get_relation_pax($table,$column,$reference,$input)
    {
        $this->db->select($column);
        $this->db->where($reference,$input);
        $this->db->where('is_enable',1);
        $result =  $this->db->get($table)->result();
        return $result[0]->$column;

    }
    //Get Relation Pax
    public function get_relation_pax_new($table,$column,$reference,$input)
    {
        $this->db->select($column);
        $this->db->where($reference,$input);
       // $this->db->where('is_enable',1);
        $result =  $this->db->get($table)->result();
        return $result[0]->$column;

    }

    //Get Relation Pax
    public function get_relation_pax_data_array($table,$column,$input_array)
    {
        $this->db->select($column);
        foreach($input_array as $key => $val)
        {
            $this->db->where($key, $val);
        }
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

    public function _delete($id)
    {
        $delete = $this->db_delete($id,$this->_table_name);
        return $delete;
    } 

    public function  get_usertype($code) {
        switch ($code) {
            case '1': return 'Super Admin';
            case '2': return 'Collection Agent';
            case '3': return 'Distribution Agent';
            case '4': return 'Collection Sub Agent';
            case '5': return 'Distribution Sub Agent';


        }
        return false;
    }  
}
?>

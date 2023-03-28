<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_users extends CI_Model {

    protected $_table_name     = 'user_list';
    protected $_order_by       = 'id';
    protected $_primary_column = 'id';


    function __construct()
    {
        parent::__construct();
    }

			
			
	//Final Deals Home
    public function _this_controller_record ()
    {
      
        $this->db->where('is_draft', 0);
        $this->db->where('isFinal', 1);

        $this->db->order_by('id','desc');      
	  $query =  $this->db->get($this->_table_name);
        return $query->result(); 
    }
	//Inbox List
	public function _this_controller_inbox_list_record ()
    {
      
       $this->db->where('is_draft', 0);
	   //Customer Support
        if($this->session->userdata('user_type') == 2)
		{
			$this->db->where('isCustomer', 1);
		}
		//Manager
        if($this->session->userdata('user_type') == 3)
		{
			$this->db->where('isManager', 1);
		}
		//Agent
        if($this->session->userdata('user_type') == 4)
		{
			$this->db->where('isAgent', 1);
			$this->db->where('created_by', $this->session->userdata('id'));
		}
		//Admin
        if($this->session->userdata('user_type') == 5)
		{
			$this->db->where('isAdmin', 1);
		}
		
        $this->db->order_by('id','desc');      
	  $query =  $this->db->get($this->_table_name);
        return $query->result(); 
    }
	//Sent List
	public function _this_controller_sent_list_record ()
    {
      
        
        //$this->db->where('isFinal', '0');
        //Customer Support
        if($this->session->userdata('user_type') == 2)
		{			
			$where = "(`isFinal` = '0' AND `isCustomer` = '2') AND (`is_draft` = '0' OR `is_draft` = '2')";
			$this->db->or_where($where);
		}
		//Manager
        if($this->session->userdata('user_type') == 3)
		{
			$where = "(`isFinal` = '0' AND `isManager` = '2') AND (`is_draft` = '0' OR `is_draft` = '2')";		
			$this->db->or_where($where);
			
		}
		//Agent
        if($this->session->userdata('user_type') == 4)
		{
			$this->db->where('isFinal', '0');
			$this->db->where('isAgent', '0');
			$this->db->where('created_by', $this->session->userdata('id'));
			
			$this->db->where('is_draft', '0');
			$this->db->or_where('is_draft', '2');
		}
		//Admin
        if($this->session->userdata('user_type') == 5)
		{
			$where = "(`isFinal` = '0' AND `isAdmin` = '2') AND (`is_draft` = '0' OR `is_draft` = '2')";
			$this->db->where($where);
		}
		
        $this->db->order_by('id','desc');      
	    $query =  $this->db->get($this->_table_name);
        return $query->result(); 
        //return $this->db->last_query(); 
    }
	
	
	//Saved List
	public function _this_controller_saved_list_record ()
    {
      
        $this->db->where('is_draft', 2);
        //Customer Support
        if($this->session->userdata('user_type') == 2)
		{
			
			$this->db->where('isCustomer', 1);
		}
		//Manager
        if($this->session->userdata('user_type') == 3)
		{
			
			$this->db->where('isManager', 1);
		}
		//Agent
        if($this->session->userdata('user_type') == 4)
		{
			$this->db->where('isAgent', 1);
		}
		//Admin
        if($this->session->userdata('user_type') == 5)
		{
			$this->db->where('isAdmin', 1);
		}
		
        $this->db->order_by('id','desc');      
	  $query =  $this->db->get($this->_table_name);
        return $query->result(); 
        //return $this->db->last_query(); 
    }
	
	
    
	public function _this_viewdeals_record()
    {
      /*
	//Super Admin
			if($this->session->userdata('user_type') == 1)
			{
				$deal_type = "";

			}
			//Customer
			if($this->session->userdata('user_type') == 2)
			{
				$deal_type = "customer";
				$this->db->where('deal_type', $deal_type);
			}
			//Manager
			if($this->session->userdata('user_type') == 3)
			{
				$deal_type = "manager";
				$this->db->where('deal_type', $deal_type);
			}
			//Agent
			if($this->session->userdata('user_type') == 4)
			{
				$deal_type = "agent";
				$this->db->where('deal_type', $deal_type);
			}
			//Admin
			if($this->session->userdata('user_type') == 5)
			{
				$deal_type = "admin";
				$this->db->where('deal_type', $deal_type);
			}
		*/	
        $this->db->where('is_draft', 0);

        $this->db->order_by('id','desc');      
	  $query =  $this->db->get($this->_table_name);
        return $query->result(); 
    }

    public function get_saved_deals_by_user($id){
        $this->db->select('*')
                 ->where('created_by', $id)
                 ->where('is_draft', 1);
				 
        $this->db->order_by('id','desc');
        $query = $this->db->get('user_list');
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function get_cc_by_formID($id){
        $this->db->select('*')
                 ->where('form_id', $id)
                 ->where('status', 1);
				 
        $query = $this->db->get('cc_details');
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
        $query =  $this->db->get('login');
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

    public function _change_user_status($id,$status)
    {
        if($id != null)
        {
            $data['is_enable'] = $status;  
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
            //$id     = $filter($id);
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update($table);
        }

        //return $id;
        return $this->db->last_query();
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

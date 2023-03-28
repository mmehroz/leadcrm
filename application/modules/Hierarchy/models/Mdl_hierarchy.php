<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mdl_hierarchy extends CI_Model 
{
    protected $_order_by       = 'id';
    protected $_primary_column = 'id';

    function __construct()
    {
        parent::__construct();		

    }
    public function _this_hierarchy_record ($table,$ref,$input)
    {
        $this->db->order_by($this->_order_by);
        if($ref != null)
        {
            $this->db->where($ref,$input);
        }

        $query =  $this->db->get($table);
        return $query->result(); 
    } 
    public function _get_single_record_byid($table,$id)
    {

        $this->db->where($this->_primary_column ,$id);
        //$this->db->where('is_enable',1);
        $this->db->order_by($this->_order_by);
        $query =  $this->db->get($table);
        return $query->result();    
    }

    public function _change_user_status($table,$id,$status)
    {
        if($id != null)
        {
            $data['is_enable'] = $status;  
            $update =  $this->db_command($data,$id,$table);  
            if($update)
            {
                return 1;
            }else
            {
                return 0;
            }
        }  
    } 

    public function _delete($id,$table)
    {
        $delete = $this->db_delete($id,$table);
        return $delete;
    }
    //Country List
    public function country_list($parm)
    {
        $this->db->select('id,country_name');
        //$this->db->where('id',$parm);
        $this->db->where('is_enable',1);
        $result =  $this->db->get('country_list')->result();
        $array = array(
            '0' => 'Select Country'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->country_name;
            }
        }
        return $array; 
    }

    //State List
    public function state_list($country_id)
    {
        $this->db->select('id,state_name');
        $this->db->where('country_id',$country_id);
        $this->db->where('is_enable',1);
        $result =  $this->db->get('state_list')->result();
        $array = array(
            '0' => 'Select State'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->state_name;
            }
        }
        return $array;
    }

    //City List
    public function city_list($id)
    {
        $this->db->select('id,title');
        $this->db->where('is_enable',1);
        $this->db->where('state_id',$id);
        $result =  $this->db->get('city_list')->result();
        $array = array(
            // '' => 'Select City'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array;
    }
    //Slider List
    public function slider_list($id)
    {
        $this->db->select('*');
        if($id != null)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('is_enable',1);
        $result =  $this->db->get('slider_list')->result();
        $array = array(
            //  '' => 'Select Token Purpose'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->slider_name;
            }
        }
        return $array;
    }

    //Brand List
    public function brand_list($id)
    {
        $this->db->select('*');
        if($id != null)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('is_enable',1);
        $result =  $this->db->get('brand_list')->result();
        $array = array(
            //  '' => 'Select Token Purpose'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->brand_name;
            }
        }
        return $array;
    }
	
	  //Adds List
    public function adds_list($id)
    {
        $this->db->select('*');
        if($id != null)
        {
            $this->db->where('id',$id);
        }
        $this->db->where('is_enable',1);
        $result =  $this->db->get('adds_list')->result();
        $array = array(
            //  '' => 'Select Token Purpose'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->adds_name;
            }
        }
        return $array;
    }

    //Currency List
    public function currency_list($parm)
    {
        $this->db->select('id,title,code');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('currency_list')->result();
        $array = array(
            '' => 'Select Currency'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->code;
            }
        }
        return $array; 
    }

    //Product List
    public function product_list($parm)
    {
        $this->db->select('*');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('product_list')->result();
        $array = array(
            '' => 'Select Product'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }

    //Location List
    public function location_list($parm)
    {
        $this->db->select('*');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('location_list')->result();
        $array = array(
            '' => 'Select Location'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }

    //Territory List
    public function territory_list($parm)
    {
        $this->db->select('*');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('territory_list')->result();
        $array = array(
            '' => 'Select Territory'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }
	
	//Trans Code List
    public function trans_code_list($parm)
    {
        $this->db->select('*');
    	$this->db->order_by('id','asc');
        $this->db->group_by('trans_code');
	    $result =  $this->db->get('inv_distribution')->result();
        $array = array(
            '' => 'Select Packed Code'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->trans_code] = $res->trans_code;
            }
        }
        return $array; 
    }
	
	
	//Distribution Channel List
    public function distribution_channel($parm)
    {
        $this->db->select('*');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('distribution_channel')->result();
        $array = array(
            '' => 'Select Distribution Channel'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }
	
	

    //Category List
    public function category_list($parm)
    {
        $this->db->select('id,category_name');
        $this->db->where('is_enable',1);
        $this->db->where('parent_category_id',0);
        $result =  $this->db->get('category_list')->result();
        $array = array(
            '' => 'Select Category'
        );
        if($parm !=null){
            $array = array(
                  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->category_name;
            }
        }
        return $array; 
    }

    //Year List
    public function year_list($parm)
    {
        $this->db->select('id,title');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('year_list')->result();
        $array = array(
            '' => 'Select Year'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }

    //Month List
    public function month_list($parm)
    {
        $this->db->select('id,title');
        $this->db->where('is_enable',1);
        $result =  $this->db->get('month_list')->result();
        $array = array(
            '' => 'Select Month'
        );
        if($parm !=null){
            $array = array(
                //  '' => 'Select Country'
            );
        }
        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array; 
    }

    //City List by State
    public function city_list_by_state($country_id,$state_id)
    {
        $this->db->select('id,title');
        $this->db->where('country_id',$country_id);
        $this->db->where('state_id',$state_id);
        $this->db->where('is_enable',1);
        $result =  $this->db->get('city_list')->result();
        $array = array(
            '' => 'Select City'
        );

        if(count($result)){
            foreach($result as $res){
                $array[$res->id] = $res->title;
            }
        }
        return $array;
    }

    //Get Exit Column
    public function get_exist_column($table)
    {
        $this->db->select('column_name'); 
        $this->db->from('information_schema.COLUMNS');
        $this->db->where('TABLE_SCHEMA','bizzworld');
        $this->db->where('TABLE_NAME',$table);
        $_return =  $this->db->get()->result(); 

        foreach ($_return as $key => $value) {
            $return[] = $value->column_name;
        }
        #$return = json_decode(json_encode($_return), True);
        return $return;

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
    //Get Relation Pax Data array
    public function get_relation_pax_dataarray($param,$default)
    {
        foreach($param as $key => $parm):

            if($key > 0)
            {
                $pax = end($_return); 
            }else
            {
                $pax = $default;   
            } 
            $_return[$parm['dropdown']] = $this->get_relation_pax($parm['table'],$parm['column'],$parm['ref'],$pax);

            endforeach;  
        return $_return;
    } 
    //Check already Exit
    public function check_already_exists($column,$value,$table)
    {
        $this->db->select('id');
        $this->db->where($column,$value);
        $query =  $this->db->get($table);
        $count = $query->num_rows();
        return $count;
    }

    public function uploadImage($id)
    {

        $targetDir1 = FCPATH."public_html/assets/purposeimage/";
        $fileName1 = $id.".jpeg";
        if(move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir1.$fileName1))
        {
            #echo "Upload Success";
        }else
        {
            #echo "Error: Image Not Uploaded..!";    
        }

    }


    //User Status
    public function _change_user_status_h($id,$status,$table)
    {
        if($id != null)
        {
            $data['is_enable'] = $status;  
            $update =  $this->db_command($data,$id,$table);  
            if($update)
            {
                return 1;
            }else
            {
                return 0;
            }
        }  
    }

    //User Status Year & Month
    public function _change_status_year_month($id,$status,$table)
    {
        if($id != null)
        {


            if($status == '1')
            {					
                $data=array('is_enable' => '0');
                $this->db->where('id!=',$id);
                $update = $this->db->update($table,$data);

                $data1=array('is_enable' => '1');
                $this->db->where('id',$id);
                $update = $this->db->update($table,$data1);
            }
            else
            {

                $data=array('is_enable' => '0');
                $update = $this->db->update($table,$data);

            }


            if($update)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }  
    }

	 //Change Status Logo Image
    public function _change_status_logo_image($id,$status,$table)
    {
        if($id != null)
        {


            if($status == '1')
            {					
                $data=array('show_logo' => '0');
                $this->db->where('id!=',$id);
                $update = $this->db->update($table,$data);

                $data1=array('show_logo' => '1');
                $this->db->where('id',$id);
                $update = $this->db->update($table,$data1);
            }
            else
            {

                $data=array('show_logo' => '0');
                $update = $this->db->update($table,$data);

            }


            if($update)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }  
    }
	
	
	 //Change Status Logo Title
    public function _change_status_logo_title($id,$status,$table)
    {
        if($id != null)
        {


            if($status == '1')
            {					
                $data=array('show_title' => '0');
                $this->db->where('id!=',$id);
                $update = $this->db->update($table,$data);

                $data1=array('show_title' => '1');
                $this->db->where('id',$id);
                $update = $this->db->update($table,$data1);
            }
            else
            {

                $data=array('show_title' => '0');
                $update = $this->db->update($table,$data);

            }


            if($update)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }  
    }
	
	


}
?>
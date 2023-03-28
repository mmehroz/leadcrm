<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hierarchy extends MX_Controller  
{

    private $pakkabina_db; 


    function __construct()
    {
        parent::__construct();
        Modules::run('Login/_login');
        $this->load->model('Mdl_hierarchy'); 
    }
    public function index()
    {   
        redirect(base_url().'Dashboard','refresh');  
    } 

    public function country_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Country Managment','small'=>'Country list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/country_list','List_View' => 'Hierarchy/country_list','edit' => 'Hierarchy/action/country_list',
                'command'    => 'Hierarchy/command/country_list'); 
            $param_view['column']  = array(  
                'country_name'      =>'Country Name',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                'country_name'             =>'required-field',
            );

            $param_view['unique']  = array(  
                'country_name'      =>'Country Name',
            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            /* //Filter Data
            $param_view['fillter'] ['Country']   = array(
            'table'  =>  'country_list',
            'name'   =>  'country_id',
            'class'  =>  'country_id state_get required-field',
            'type'   =>   0,
            );  
            $param_view['fillter'] ['State']   = array(
            'table'  =>  'state_list',
            'name'   =>  'state_id',
            'class'  =>  'state_id required-field',
            'type'   =>   0,
            ); */     



            $param_view['heading'] = array('h1'   => 'Country Managment','small'=>'Country list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/country_list','delete' => 'Hierarchy/delete/country_list'); 
            $param_view['column']  = array(  //'country_code'      =>'Country Code',
                'country_name'      =>'Country Name',
                // 'cnic_digit'      =>'Cnic Digit'
            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 

    //State List 
    public function state_list($param)
    {
        if($param != null)
        {
            $param_view['heading']    = array('h1'        => 'State Managment','small'=>'State list Edit'); 
            $param_view['links']      = array('action'    => 'Hierarchy/command/state_list',
                'List_View' => 'Hierarchy/state_list',
                'edit' => 'Hierarchy/action/state_list',
                'command'      => 'Hierarchy/command/state_list'); 

            $param_view['fillter'] ['Country']   = array(
                'table'  =>  'country_list',
                'name'   =>  'country_id',
                'class'  =>  'country_id required-field',
                'type'   =>   1,
            );  

            $param_view['relation'][]   = array(
                'table'   =>  'state_list',
                'ref'     =>  'id',
                'column'  =>  'country_id',
                'dropdown'=>  'country_list',
            );  
            $param_view['relation_ref'] = array(
                'state_list'     =>  'country_list',

            );

            $param_view['column']     = array(  

                //  'state_code'              =>'State Code',
                'state_name'             =>'State Name',
                'is_enable'         =>'Active Status',
            ); 
            $param_view['unique']  = array(  
                //  'state_code'       =>'State Code',
                'state_name'      =>'State Name',
            );
            $param_view['input_validation']=array(
                //  'state_code'              =>'required-field',
                'state_name'             =>'required-field',
            );                            
            ######      ######       ######  

            return $param_view; 
        }
        else
        {

            $data_post = $this->input->post();
            if($data_post != null)
            {
                //print_r($data_post);


                $param_view['where']  = array(
                    'country_id'  => $data_post['country_id'],
                    'state_id'    => $data_post['state_id'],

                );

                $param_view['heading'] = array('h1'   => 'State Managment','small'=>'State List'); 
                $param_view['links']   = array('edit' => 'Hierarchy/action/state_list','delete' => 'Hierarchy/delete/state_list'); 
                $param_view['column']  = array(  
                    'country_id' => 'Country Name',
                    'state_name'             =>'State Name',
                    //    'state_code'              =>'State Code'
                );  
                $param_view['relation_data']['country_id']=array(
                    'tbl'=>'country_list',
                    'rel'=>'country_id',
                    'col'=>'country_name'

                );                             

                ######      ######       ######  
                $uri                   = $this->uri->segment(2);
                $this->load_hierarchy($uri,$param_view); 							

            }
            else
            {
                //Filter Data
                $param_view['fillter'] ['Country']   = array(
                    'table'  =>  'country_list',
                    'name'   =>  'country_id',
                    'class'  =>  'country_id required-field',
                    'type'   =>   1,
                );
                $param_view['fillter_links']      = array('action'    => 'Hierarchy/command/state_list',
                    'List_View' => 'Hierarchy/state_list',
                    'edit' => 'Hierarchy/action/state_list',
                    'command'      => 'Hierarchy/get_state_by_country',
                    'btn_click'   => 'filter_state'
                ); 


                $param_view['heading'] = array('h1'   => 'State Managment','small'=>'State List'); 
                $param_view['links']   = array('edit' => 'Hierarchy/action/state_list','delete' => 'Hierarchy/delete/state_list'); 
                $param_view['column']  = array(  
                    'country_id' => 'Country Name',
                    'state_name'             =>'State Name',
                    //    'state_code'              =>'State Code'
                );  
                $param_view['relation_data']['country_id']=array(
                    'tbl'=>'country_list',
                    'rel'=>'country_id',
                    'col'=>'country_name'

                );                             

                ######      ######       ######  
                $uri                   = $this->uri->segment(2);
                $this->load_hierarchy($uri,$param_view);    
            }
        }   

    }

    //City List 
    public function city_list($param)
    {
        if($param != null)
        {
            $param_view['heading']    = array('h1'        => 'City Managment','small'=>'City list Edit'); 
            $param_view['links']      = array('action'    => 'Hierarchy/command/city_list',
                'List_View' => 'Hierarchy/city_list',
                'edit' => 'Hierarchy/action/city_list',
                'command'      => 'Hierarchy/command/city_list'); 

            $param_view['fillter'] ['Country']   = array(
                'table'  =>  'country_list',
                'name'   =>  'country_id',
                'class'  =>  'state_get required-field',
                'type'   =>   1,
            );  
            $param_view['fillter'] ['State']   = array(
                'table'  =>  'state_list',
                'name'   =>  'state_id',
                'class'  =>  'state_id required-field',
                'type'   =>   0,
            );                                              

            $param_view['relation'][]   = array(
                'table'   =>  'city_list',
                'ref'     =>  'id',
                'column'  =>  'state_id',
                'dropdown'=>  'state_list',
            );  

            $param_view['relation'][]   = array(
                'table'   =>  'state_list',
                'ref'     =>  'id',
                'column'  =>  'country_id',
                'dropdown'=>  'country_list',
            );  
            $param_view['relation_ref'] = array(


                'state_list'     =>  'country_list',
                'city_list'     =>  'state_list',    

            ); 

            $param_view['column']     = array(  

                // 'code'              =>'City Code',
                'title'             =>'City Name',
                'is_enable'         =>'Active Status',
            ); 
            $param_view['unique']  = array(  
                //  'code'       =>'City Code',
                'title'      =>'City Name',
            );
            $param_view['input_validation']=array(
                //  'code'              =>'required-field',
                'title'             =>'required-field',
            );                            
            ######      ######       ######  

            return $param_view; 
        }
        else
        {
			$data_post = $this->input->post();
            if($data_post != null)
            {
                //print_r($data_post);


                $param_view['where']  = array(
                    'country_id'  => $data_post['country_id'],
                    'state_id'    => $data_post['state_id'],

                );

				$param_view['heading'] = array('h1'   => 'City Managment','small'=>'City List'); 
				$param_view['links']   = array('edit' => 'Hierarchy/action/city_list','delete' => 'Hierarchy/delete/city_list'); 
				$param_view['column']  = array(  
					'country_id' => 'Country Name',
					'state_id' => 'State Name',
					'title'             =>'City Name',
					//   'code'              =>'City Code'
				);  
				$param_view['relation_data']['country_id']=array(
					'tbl'=>'country_list',
					'rel'=>'country_id',
					'col'=>'country_name'

				);  
				$param_view['relation_data']['state_id']=array(
					'tbl'=>'state_list',
					'rel'=>'state_id',
					'col'=>'state_name'

				);                             

				######      ######       ######  
				$uri                   = $this->uri->segment(2);
				$this->load_hierarchy($uri,$param_view);    						

            }
            else
            {

				$param_view['fillter'] ['Country']   = array(
					'table'  =>  'country_list',
					'name'   =>  'country_id',
					'class'  =>  'country_id state_get required-field',
					'type'   =>   1,
				);  
				$param_view['fillter'] ['State']   = array(
					'table'  =>  'state_list',
					'name'   =>  'state_id',
					'class'  =>  'state_id',
					'type'   =>   1,
				);
				$param_view['fillter_links']      = array('action'    => 'Hierarchy/command/city_list',
					'List_View' => 'Hierarchy/city_list',
					'edit' => 'Hierarchy/action/city_list',
					'command'      => 'Hierarchy/city_list',
					'btn_click'   => 'filter_city'
				); 


				$param_view['heading'] = array('h1'   => 'City Managment','small'=>'City List'); 
				$param_view['links']   = array('edit' => 'Hierarchy/action/city_list','delete' => 'Hierarchy/delete/city_list'); 
				$param_view['column']  = array(  
					'country_id' => 'Country Name',
					'state_id' => 'State Name',
					'title'             =>'City Name',
					//   'code'              =>'City Code'
				);  
				/* $param_view['relation_data']['country_id']=array(
					'tbl'=>'country_list',
					'rel'=>'country_id',
					'col'=>'country_name'

				);  
				$param_view['relation_data']['state_id']=array(
					'tbl'=>'state_list',
					'rel'=>'state_id',
					'col'=>'state_name'

				);                   */           

				######      ######       ######  
				$uri                   = $this->uri->segment(2);
				$this->load_hierarchy($uri,$param_view);    
			}
        }
    }

    //Currency List
    public function currency_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Currency Managment','small'=>'Currency list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/currency_list','List_View' => 'Hierarchy/currency_list','edit' => 'Hierarchy/action/currency_list',
                'command'    => 'Hierarchy/command/currency_list'); 
            $param_view['fillter'] ['Country']   = array(
                'table'  =>  'country_list',
                'name'   =>  'country_id',
                'class'  =>  'required-field',
                'type'   =>   1,
            );  

            $param_view['column']  = array(  
                'code'      =>'Code',
                'title'      =>'Title',
                // 'cnic_digit'      =>'Cnic Digit',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                'code'      =>'Code',
                'title'      =>'Title',
            );

            $param_view['unique']  = array(  
                'code'      =>'Code',
                'title'      =>'Title',

            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Currency Managment','small'=>'Currency list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/currency_list','delete' => 'Hierarchy/delete/currency_list'); 
            $param_view['column']  = array(   
                'country_id' => 'Country Name',
                'title'      =>'Title',
                'code'      =>'Code',

            ); 
            $param_view['relation_data']['country_id']=array(
                'tbl'=>'country_list',
                'rel'=>'country_id',
                'col'=>'country_name'

            );  							
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 


    //Territory List
    public function territory_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Territory Managment','small'=>'Territory list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/territory_list','List_View' => 'Hierarchy/territory_list','edit' => 'Hierarchy/action/territory_list',
                'command'    => 'Hierarchy/command/territory_list'); 
            $param_view['column']  = array(  
                // 'code'      =>'Code',
                'title'      =>'Title',
                // 'cnic_digit'      =>'Cnic Digit',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                // 'code'      =>'Code',
                'title'      =>'Title',
            );

            $param_view['unique']  = array(  
                //    'code'      =>'Code',
                'title'      =>'Title',

            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Territory Managment','small'=>'Territory list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/territory_list','delete' => 'Hierarchy/delete/territory_list'); 
            $param_view['column']  = array(  // 'code'      =>'Code',
                'title'      =>'Title'

            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 



    //Product List 
    public function product_list($param)
    {
        if($param != null)
        {
            $param_view['heading']    = array('h1'        => 'Product Managment','small'=>'Product list Edit'); 
            $param_view['links']      = array('action'    => 'Hierarchy/command/product_list',
                'List_View' => 'Hierarchy/product_list',
                'edit' => 'Hierarchy/action/product_list',
                'command'      => 'Hierarchy/command/product_list'); 

            $param_view['fillter'] ['Category']   = array(
                'table'  =>  'category_list',
                'name'   =>  'category_id',
                'class'  =>  'category_id required-field',
                'type'   =>   1

            );  


            $param_view['relation'][]   = array(
                'table'   =>  'product_list',
                'ref'     =>  'id',
                'column'  =>  'year_id',
                'dropdown'=>  'year_list',
            );

            $param_view['relation'][]   = array(
                'table'   =>  'product_list',
                'ref'     =>  'id',
                'column'  =>  'month_id',
                'dropdown'=>  'month_list',
            );

            $param_view['relation'][]   = array(
                'table'   =>  'product_list',
                'ref'     =>  'id',
                'column'  =>  'category_id',
                'dropdown'=>  'category_list',
            );  
            /* $param_view['relation'][]   = array(
                'table'   =>  'product_list',
                'ref'     =>  'id',
                'column'  =>  'currency_id',
                'dropdown'=>  'currency_list',
            );   */
            $param_view['relation_ref'] = array(
               // 'product_list'     =>  'currency_list',
                'product_list'     =>  'category_list',
                'product_list'     =>  'month_list',
                'product_list'     =>  'year_list',

            );
			
			 $param_view['fillter'] ['Month']   = array(
                'table'  =>  'month_list',
                'name'   =>  'month_id',
                'class'  =>  'month_id required-field',
                'type'   =>   1,
            );

            $param_view['fillter'] ['Year']   = array(
                'table'  =>  'year_list',
                'name'   =>  'year_id',
                'class'  =>  'year_id required-field',
                'type'   =>   1,
            );

            $param_view['column']     = array(  

                'title'              =>'Product Name',
              //  'unit_price'             =>'Price',
                'is_enable'         =>'Active Status',
            ); 
            $param_view['unique']  = array(  
                'title'       =>'Product Name',
                /* 'state_name'      =>'State Name', */
            );
            $param_view['input_validation']=array(
                'title'              =>'required-field',
                //'unit_price'             =>'required-field',
            );    


          /*   $param_view['fillter'] ['Currency']   = array(
                'table'  =>  'currency_list',
                'name'   =>  'currency_id',
                'class'  =>  'currency_id required-field',
                'type'   =>   1,
            );   */

           

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Product Managment','small'=>'Product List'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/product_list','delete' => 'Hierarchy/delete/product_list'); 
            $param_view['column']  = array(  
                'category_id' => 'Category',
                'title'             =>'Product Name',
                //'unit_price'              =>'Price',								 
               // 'currency_id' => 'Currency',
                'month_id' => 'Month',
                'year_id' => 'Year',
            );  
           /*  $param_view['relation_data']['currency_id']=array(
                'tbl'=>'currency_list',
                'rel'=>'currency_id',
                'col'=>'title'           
            );  */    
            $param_view['relation_data']['month_id']=array(
                'tbl'=>'month_list',
                'rel'=>'month_id',
                'col'=>'title'           
            );     
            $param_view['relation_data']['year_id']=array(
                'tbl'=>'year_list',
                'rel'=>'year_id',
                'col'=>'title'           
            );     		   
            $param_view['relation_data']['category_id']=array(
                'tbl'=>'category_list',
                'rel'=>'category_id',
                'col'=>'title'           
            );            		   

            ######      ######       ######  
            $uri                   = $this->uri->segment(2);
            $this->load_hierarchy($uri,$param_view);    
        }   

    }



    //Location List 
    public function location_list($param)
    {
        if($param != null)
        {
            $param_view['heading']    = array('h1'        => 'Location Managment','small'=>'Location list Edit'); 
            $param_view['links']      = array('action'    => 'Hierarchy/command/location_list',
                'List_View' => 'Hierarchy/location_list',
                'edit' => 'Hierarchy/action/location_list',
                'command'      => 'Hierarchy/command/location_list'); 

            $param_view['fillter'] ['Country']   = array(
                'table'  =>  'country_list',
                'name'   =>  'country_id',
                'class'  =>  'state_get required-field',
                'type'   =>   1,
            );  
            $param_view['fillter'] ['State']   = array(
                'table'  =>  'state_list',
                'name'   =>  'state_id',
                'class'  =>  'city_get state_list state_id required-field',
                'type'   =>   1,
            );
            $param_view['fillter'] ['City']   = array(
                'table'  =>  'city_list',
                'name'   =>  'city_id',
                'class'  =>  'city_id city_list required-field',
                'type'   =>   1,
            );														  

            $param_view['relation'][]   = array(
                'table'   =>  'location_list',
                'ref'     =>  'id',
                'column'  =>  'city_id',
                'dropdown'=>  'city_list',
            );  

            $param_view['relation'][]   = array(
                'table'   =>  'city_list',
                'ref'     =>  'id',
                'column'  =>  'state_id',
                'dropdown'=>  'state_list',
            );  
            $param_view['relation'][]   = array(
                'table'   =>  'state_list',
                'ref'     =>  'id',
                'column'  =>  'country_id',
                'dropdown'=>  'country_list',
            );  
            $param_view['relation_ref'] = array(

                'state_list'     =>  'country_list',
                'city_list'     =>  'state_list',
                'location_list'     =>  'city_list',

            ); 

            $param_view['column']     = array(  

                //'code'              =>'City Code',
                'title'             =>'Title',
                'is_enable'         =>'Active Status',
            ); 
            $param_view['unique']  = array(  
                //'code'       =>'City Code',
                'title'      =>'Title',
            );
            $param_view['input_validation']=array(
                //'code'              =>'required-field',
                'title'             =>'required-field',
            );                            
            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Location Managment','small'=>'Location List'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/location_list','delete' => 'Hierarchy/delete/location_list'); 
            $param_view['column']  = array(  
                'country_id' => 'Country Name',
                'state_id' => 'State Name',
                'city_id'             =>'City Name',
                'title'              =>'Title'
            );  
            $param_view['relation_data']['country_id']=array(
                'tbl'=>'country_list',
                'rel'=>'country_id',
                'col'=>'country_name'

            );  
            $param_view['relation_data']['state_id']=array(
                'tbl'=>'state_list',
                'rel'=>'state_id',
                'col'=>'state_name'

            );   
            $param_view['relation_data']['city_id']=array(
                'tbl'=>'city_list',
                'rel'=>'city_id',
                'col'=>'title'

            ); 		   

            ######      ######       ######  
            $uri                   = $this->uri->segment(2);
            $this->load_hierarchy($uri,$param_view);    
        }
    }

    //Category List
    public function category_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Category Managment','small'=>'Category list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/category_list','List_View' => 'Hierarchy/category_list','edit' => 'Hierarchy/action/category_list',
                'command'    => 'Hierarchy/command/category_list'); 
            $param_view['column']  = array(  
                // 'country_code'      =>'Country Code',
                'title'      =>'Category Name',
                //'amount'      =>'Amount',
                //'cnic_digit'      =>'Cnic Digit',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                //'country_code'              =>'required-field',
                'title'             =>'required-field',
              //  'amount'             =>'required-field',
            );

            $param_view['unique']  = array(  
                //   'country_code'      =>'Country Code',
                'title'      =>'Category Name',
                //	 'cnic_digit'      =>'Cnic Digit',
            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Category Managment','small'=>'Category list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/category_list','delete' => 'Hierarchy/delete/category_list'); 
            $param_view['column']  = array( // 'country_code'      =>'Country Code',
                'title'      =>'Category Name',
               // 'amount'      =>'Amount'
            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 

    //Year List
    public function year_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Year Managment','small'=>'Year list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/year_list','List_View' => 'Hierarchy/year_list','edit' => 'Hierarchy/action/year_list',
                'command'    => 'Hierarchy/command/year_list'); 
            $param_view['column']  = array(  
                // 'country_code'      =>'Country Code',
                'title'      =>'Year',
                //'cnic_digit'      =>'Cnic Digit',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                //'country_code'              =>'required-field',
                'title'             =>'required-field',
            );

            $param_view['unique']  = array(  
                //   'country_code'      =>'Country Code',
                'title'      =>'Year',
                //	 'cnic_digit'      =>'Cnic Digit',
            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Year Managment','small'=>'Year list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/year_list','delete' => 'Hierarchy/delete/year_list'); 
            $param_view['column']  = array( // 'country_code'      =>'Country Code',
                'title'      =>'Year',
                //'cnic_digit'      =>'Cnic Digit'
            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    }

	
	//Department List
	public function department_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Department Managment','small'=>'Department list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/department_list','List_View' => 'Hierarchy/department_list','edit' => 'Hierarchy/action/department_list',
                'command'    => 'Hierarchy/command/department_list'); 
            $param_view['column']  = array(  
                'department_name'      =>'Department Name',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                'department_name'             =>'required-field',
            );

            $param_view['unique']  = array(  
                'department_name'      =>'Department Name',
            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            /* //Filter Data
            $param_view['fillter'] ['Country']   = array(
            'table'  =>  'country_list',
            'name'   =>  'country_id',
            'class'  =>  'country_id state_get required-field',
            'type'   =>   0,
            );  
            $param_view['fillter'] ['State']   = array(
            'table'  =>  'state_list',
            'name'   =>  'state_id',
            'class'  =>  'state_id required-field',
            'type'   =>   0,
            ); */     



            $param_view['heading'] = array('h1'   => 'Department Managment','small'=>'Department list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/department_list','delete' => 'Hierarchy/delete/department_list'); 
            $param_view['column']  = array(  //'country_code'      =>'Country Code',
                'department_name'      =>'Department Name',
                // 'cnic_digit'      =>'Cnic Digit'
            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 


	
	//Distribution Channel List
	public function distribution_channel($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Distribution Managment','small'=>'Distribution Channel list Edit'); 
            $param_view['links']   = array('action'     => 'Hierarchy/command/distribution_channel','List_View' => 'Hierarchy/distribution_channel','edit' => 'Hierarchy/action/distribution_channel',
                'command'    => 'Hierarchy/command/distribution_channel'); 
            $param_view['column']  = array(  
                'title'      =>'Distribution Channel Name',
                'is_enable'         =>'Active Status',
            );
            $param_view['input_validation']=array(
                'title'             =>'required-field',
            );

            $param_view['unique']  = array(  
                'title'      =>'Distribution Channel Name',
            );

            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            /* //Filter Data
            $param_view['fillter'] ['Country']   = array(
            'table'  =>  'country_list',
            'name'   =>  'country_id',
            'class'  =>  'country_id state_get required-field',
            'type'   =>   0,
            );  
            $param_view['fillter'] ['State']   = array(
            'table'  =>  'state_list',
            'name'   =>  'state_id',
            'class'  =>  'state_id required-field',
            'type'   =>   0,
            ); */     



            $param_view['heading'] = array('h1'   => 'Distribution Managment','small'=>'Distribution Channel list'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/distribution_channel','delete' => 'Hierarchy/delete/distribution_channel'); 
            $param_view['column']  = array(  //'country_code'      =>'Country Code',
                'title'      =>'Distribution Channel Name',
                // 'cnic_digit'      =>'Cnic Digit'
            ); 
            ######      ######       ######  

            $this->load_hierarchy($uri,$param_view);    
        }                                        

    } 

	
	
	//category_channel List 
    public function category_channel($param)
    {
        if($param != null)
        {
            $param_view['heading']    = array('h1'        => 'Category Channel Managment','small'=>'Category Channel list Edit'); 
            $param_view['links']      = array('action'    => 'Hierarchy/command/category_channel',
                'List_View' => 'Hierarchy/category_channel',
                'edit' => 'Hierarchy/action/category_channel',
                'command'      => 'Hierarchy/command/category_channel'); 

            $param_view['fillter'] ['Category']   = array(
                'table'  =>  'category_list',
                'name'   =>  'category_id',
                'class'  =>  'category_id required-field',
                'type'   =>   1

            );
			 $param_view['fillter'] ['Channel']   = array(
                'table'  =>  'distribution_channel',
                'name'   =>  'dis_channel_id',
                'class'  =>  'dis_channel_id required-field',
                'type'   =>   1,
            );

			
			  
			$param_view['fillter'] ['Currency']   = array(
                'table'  =>  'currency_list',
                'name'   =>  'currency_id',
                'class'  =>  'currency_id required-field',
                'type'   =>   1,
            );  
		

            $param_view['relation'][]   = array(
                'table'   =>  'category_channel',
                'ref'     =>  'id',
                'column'  =>  'category_id',
                'dropdown'=>  'category_list',
            );  
             $param_view['relation'][]   = array(
                'table'   =>  'category_channel',
                'ref'     =>  'id',
                'column'  =>  'currency_id',
                'dropdown'=>  'currency_list',
            );
			
			 $param_view['relation'][]   = array(
                'table'   =>  'category_channel',
                'ref'     =>  'id',
                'column'  =>  'dis_channel_id',
                'dropdown'=>  'distribution_channel',
            );  
			
			
            $param_view['relation_ref'] = array(
                'category_channel'     =>  'distribution_channel',
				'category_channel'     =>  'currency_list',
                'category_channel'     =>  'category_list'
            );

            $param_view['column']     = array(  

               // 'title'              =>'Product Name',
                'rate'             =>'Price',
                'shipping'             =>'Shipping',
                'is_enable'         =>'Active Status',
            ); 
            $param_view['unique']  = array(  
               // 'title'       =>'Product Name',
                /* 'state_name'      =>'State Name', */
            );
            $param_view['input_validation']=array(
                'title'              =>'required-field',
                'rate'             =>'required-field',
                'shipping'             =>'required-field',
            );    


       
            ######      ######       ######  

            return $param_view; 
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Category Channel Managment','small'=>'Category Channel List'); 
            $param_view['links']   = array('edit' => 'Hierarchy/action/category_channel','delete' => 'Hierarchy/delete/category_channel'); 
            $param_view['column']  = array(  
                'category_id' => 'Category',
                'dis_channel_id'    =>'Channel',
                'rate'              =>'Price',								 
                'shipping'              =>'Shipping',								 
                'currency_id' => 'Currency'
            );  
            $param_view['relation_data']['currency_id']=array(
                'tbl'=>'currency_list',
                'rel'=>'currency_id',
                'col'=>'code'           
            );     
           $param_view['relation_data']['dis_channel_id']=array(
                'tbl'=>'distribution_channel',
                'rel'=>'dis_channel_id',
                'col'=>'title'           
            ); 
  /*			
            $param_view['relation_data']['year_id']=array(
                'tbl'=>'year_list',
                'rel'=>'year_id',
                'col'=>'title'           
            );     	 */	   
            $param_view['relation_data']['category_id']=array(
                'tbl'=>'category_list',
                'rel'=>'category_id',
                'col'=>'title'           
            );            		   

            ######      ######       ######  
            $uri                   = $this->uri->segment(2);
            $this->load_hierarchy($uri,$param_view);    
        }   

    }

	
    //Get State List By Country Id
    public function get_state_by_country()
    {

        $country_id = $this->input->post('country_id');  
        $this->db->where('country_id',$country_id);
        //$this->db->where('is_enable',1);
        //$this->db->where('r_noofcopy >',0);
        $filtered_state = $this->db->get('state_list')->result();


        $country_names=$this->Mdl_hierarchy->get_relation_pax('country_list','country_name','id',$country_id);

        ?>
        <div class="table-header">
            Results for State <?php //echo $country_names; ?>
        </div>

        <table id="state_table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Country Name </th>
                    <th>State Name</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach($filtered_state as $row): ?>
                    <tr>
                        <td><?php //echo $fc->product_id; 


                            $country_name=$this->Mdl_hierarchy->get_relation_pax('country_list','country_name','id',$row->country_id);
                            echo $country_name;
                        ?></td>
                        <td><?php echo $row->state_name; ?></td>
                        <td>
                            <label class=" inline">
                                <input  ref="<?php echo $row->id; ?>"  <?php if($row->is_enable == 0){ echo 'value="0" ';}else{echo 'value="1" checked="checked"';}  ?>    type="checkbox" class="ace ace-switch ace-switch-5 status" />
                                <span class="lbl"></span>
                            </label>
                        </td>


                        <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                            <a class="green" href="<?php echo base_url('Hierarchy/action/state_list/'.$row->id.''); ?>">
                                <i class="icon-pencil bigger-130"></i>
                            </a>    
                            <!--
                            <a class="red" href="<?php //echo base_url('Users/delete/'.$row->id.''); ?>">
                            <i class="icon-trash bigger-130"></i>
                            </a>-->
                        </div>

                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">


                                    <li>
                                        <a href="<?php echo base_url('Hierarchy/action/state_list/'.$row->id.''); ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="icon-edit bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <!--<li>
                                    <a href="<?php //echo base_url('Users/delete/'.$row->id.''); ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                    <i class="icon-trash bigger-120"></i>
                                    </span>
                                    </a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>



                    </tr>
                    <?php endforeach; ?>
            </tbody>

        </table>

        <script type="text/javascript">
            jQuery(function($) 
                {
                    var oTable1 = $('#state_table').dataTable( 
                        {
                            "aoColumns": 
                            [
                                { "bSortable": true }, 
                                { "bSortable": true }, 
                                { "bSortable": true }, 
                                { "bSortable": true }
                            ] 
                    });      
            });
        </script>

        <?php

    }



    //Get State List By Country Id
    public function get_city_by_countrystate()
    {

        $country_id = $this->input->post('country_id');  
        $state_id = $this->input->post('state_id');  
        $this->db->where('country_id',$country_id);
        if($state_id > 0)
        {
            $this->db->where('state_id',$state_id);
        }
        //$this->db->where('is_enable',1);
        //$this->db->where('r_noofcopy >',0);
        $filtered_city = $this->db->get('city_list')->result();


        $country_names=$this->Mdl_hierarchy->get_relation_pax('country_list','country_name','id',$country_id);
        $state_names=$this->Mdl_hierarchy->get_relation_pax('state_list','state_name','id',$state_id);

        ?>
        <div class="table-header">
            Results for City <?php //echo $country_names; ?> <?php 
            //echo $state_names;
            ?>
        </div>

        <table id="state_table" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Country Name </th>
                    <th>State Name</th>
                    <th>City Name</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach($filtered_city as $row): ?>
                    <tr>
                        <td><?php //echo $fc->product_id; 


                            $country_name=$this->Mdl_hierarchy->get_relation_pax('country_list','country_name','id',$row->country_id);
                            echo $country_name;
                        ?></td>

                        <td><?php //echo $fc->product_id; 


                            $state_name=$this->Mdl_hierarchy->get_relation_pax('state_list','state_name','id',$row->state_id);
                            echo $state_name;
                        ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td>
                            <label class=" inline">
                                <input  ref="<?php echo $row->id; ?>"  <?php if($row->is_enable == 0){ echo 'value="0" ';}else{echo 'value="1" checked="checked"';}  ?>    type="checkbox" class="ace ace-switch ace-switch-5 status" />
                                <span class="lbl"></span>
                            </label>
                        </td>


                        <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">

                            <a class="green" href="<?php echo base_url('Hierarchy/action/city_list/'.$row->id.''); ?>">
                                <i class="icon-pencil bigger-130"></i>
                            </a>    
                            <!--
                            <a class="red" href="<?php //echo base_url('Users/delete/'.$row->id.''); ?>">
                            <i class="icon-trash bigger-130"></i>
                            </a>-->
                        </div>

                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">


                                    <li>
                                        <a href="<?php echo base_url('Hierarchy/action/city_list/'.$row->id.''); ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="icon-edit bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <!--<li>
                                    <a href="<?php //echo base_url('Users/delete/'.$row->id.''); ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                    <i class="icon-trash bigger-120"></i>
                                    </span>
                                    </a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>



                    </tr>
                    <?php endforeach; ?>
            </tbody>

        </table>

        <script type="text/javascript">
            jQuery(function($) 
                {
                    var oTable1 = $('#state_table').dataTable( 
                        {
                            "aoColumns": 
                            [
                                { "bSortable": true }, 
                                { "bSortable": true }, 
                                { "bSortable": true }, 
                                { "bSortable": true },
                                { "bSortable": true }
                            ] 
                    });      
            });
        </script>

        <?php

    }

	//Logo List
	 public function logo_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Logo Managment','small'=>'Logo list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/logo_list','List_View' => 'Hierarchy/logo_list','edit' => 'Hierarchy/action/logo_list',
                'command'    => 'Hierarchy/command/logo_list');


            $param_view['column']  = array(
                'title'             =>'Title',
                //'is_enable'         =>'Active Status',
            );
            $param_view['unique']  = array(

                //'title'      =>'Title',
              //  'form_reason_id'      =>'Form Reason',
            );
            $param_view['add_class']  = array(

                //'valid_date'      => 'Valid Date',
            );
            $param_view['input_validation'] = array
            (
              //  'title'          =>'Title',
              //  'valid_date'     => 'Valid Date',
            );

            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Logo Managment','small'=>'Logo list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/logo_list','delete' => 'Hierarchy/delete/logo_list');
            $param_view['column']  = array
            (
              //  'form_reason_id'    =>'Form Reason',
                'title'             =>'Title',
                'logo_image'        => 'Logo Image',
                'show_logo'        => 'Show Logo',
                'show_title'        => 'Show Title'
            );
            ######      ######       ######

            $this->load_hierarchy($uri,$param_view);
        }

    }

	
    public function slider_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Slider Managment','small'=>'Slider list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/slider_list','List_View' => 'Hierarchy/slider_list','edit' => 'Hierarchy/action/slider_list',
                'command'    => 'Hierarchy/command/slider_list');

   $param_view['fillter'] ['Category']   = array(
                'table'  =>  'category_list',
                'name'   =>  'category_id',
                'class'  =>  'category_id required-field',
                'type'   =>   1

            );  


            $param_view['relation_ref'] = array(
             
                'slider_list'     =>  'category_list',
              

            );
            $param_view['column']  = array(
                'slider_name'             =>'Slider Name',
                'is_enable'         =>'Active Status',
            );
            $param_view['unique']  = array(

                //'title'      =>'Title',
              //  'form_reason_id'      =>'Form Reason',
            );
            $param_view['add_class']  = array(

                //'valid_date'      => 'Valid Date',
            );
            $param_view['input_validation'] = array
            (
              //  'title'          =>'Title',
              //  'valid_date'     => 'Valid Date',
            );

            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Slider Managment','small'=>'Slider list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/slider_list','delete' => 'Hierarchy/delete/slider_list');
            $param_view['column']  = array
            (
                'category_id'    =>'Category Name',
                'slider_name'             =>'Slider Name',
                'slider_image'        => 'Slider Image'
            );
			$param_view['relation_data']['category_id']=array(
                'tbl'=>'category_list',
                'rel'=>'category_id',
                'col'=>'category_name'           
            ); 
            ######      ######       ######

            $this->load_hierarchy($uri,$param_view);
        }

    }

    public function brand_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Brand Managment','small'=>'Brand list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/brand_list','List_View' => 'Hierarchy/brand_list','edit' => 'Hierarchy/action/brand_list',
                'command'    => 'Hierarchy/command/brand_list');


            $param_view['column']  = array(
                'brand_name'             =>'Brand Name',
                'brand_description'             =>'Brand Description',
                'is_enable'         =>'Active Status',
            );
            $param_view['unique']  = array(

                //'title'      =>'Title',
                //  'form_reason_id'      =>'Form Reason',
            );
            $param_view['add_class']  = array(

               // 'brand_description'      => 'Valid Date',
            );
            $param_view['input_validation'] = array
            (
                'brand_name'             =>'Brand Name',
                 'title'          =>'Title',
                //  'valid_date'     => 'Valid Date',
            );



            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Brand Managment','small'=>'Brand list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/brand_list','delete' => 'Hierarchy/delete/brand_list');
            $param_view['column']  = array
            (
                //  'form_reason_id'    =>'Form Reason',
                'brand_name'             =>'Brand Name',
                'brand_image'             =>'Brand Image',
                'brand_description'             =>'Brand Description'
                //   'valid_date'        => 'Valid Date'
            );

                ######      ######       ######

                $this->load_hierarchy($uri,$param_view);
        }

    }

	
	 public function adds_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Adds Managment','small'=>'Adds list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/adds_list','List_View' => 'Hierarchy/adds_list','edit' => 'Hierarchy/action/adds_list',
                'command'    => 'Hierarchy/command/adds_list');


            $param_view['column']  = array(
                'adds_name'             =>'Adds Name',
                'adds_description'             =>'Adds Description',
                'is_enable'         =>'Active Status',
            );
            $param_view['unique']  = array(

                //'title'      =>'Title',
                //  'form_reason_id'      =>'Form Reason',
            );
            $param_view['add_class']  = array(

               // 'brand_description'      => 'Valid Date',
            );
            $param_view['input_validation'] = array
            (
                'adds_name'             =>'Adds Name',
                // 'title'          =>'Title',
                //  'valid_date'     => 'Valid Date',
            );



            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Adds Managment','small'=>'Adds list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/adds_list','delete' => 'Hierarchy/delete/adds_list');
            $param_view['column']  = array
            (
                //  'form_reason_id'    =>'Form Reason',
                'adds_name'             =>'Adds Name',
                'adds_image'             =>'Adds Image',
                'adds_description'             =>'Adds Description'
                //   'valid_date'        => 'Valid Date'
            );

                ######      ######       ######

                $this->load_hierarchy($uri,$param_view);
        }

    }

	//Request List
	 public function request_call($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Logo Managment','small'=>'Logo list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/request_call','List_View' => 'Hierarchy/request_call','edit' => 'Hierarchy/action/request_call',
                'command'    => 'Hierarchy/command/request_call');


            $param_view['column']  = array(
                'title'             =>'Title',
                //'is_enable'         =>'Active Status',
            );
            $param_view['unique']  = array(

                //'title'      =>'Title',
              //  'form_reason_id'      =>'Form Reason',
            );
            $param_view['add_class']  = array(

                //'valid_date'      => 'Valid Date',
            );
            $param_view['input_validation'] = array
            (
              //  'title'          =>'Title',
              //  'valid_date'     => 'Valid Date',
            );

            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Request Call Managment','small'=>'Request Call list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/request_call','delete' => 'Hierarchy/delete/request_call');
            $param_view['column']  = array
            (
              //  'form_reason_id'    =>'Form Reason',
                'mobile'             =>'Mobile No',
                'ip_address'        => 'IP Address',
                'created_date'        => 'Date'
            );
            ######      ######       ######

            $this->load_hierarchy($uri,$param_view);
        }

    }

	//Delivery Charges List
	 public function delivery_charges_list($param)
    {

        $uri                   = $this->uri->segment(2);

        if($param != null)
        {
            $param_view['heading'] = array('h1'         => 'Charges Managment','small'=>'Charges list Edit');
            $param_view['links']   = array('action'     => 'Hierarchy/command/delivery_charges_list','List_View' => 'Hierarchy/delivery_charges_list','edit' => 'Hierarchy/action/delivery_charges_list',
                'command'    => 'Hierarchy/command/delivery_charges_list');


            $param_view['column']  = array(
                'delivery_charges'             =>'Delivery Charges',
                'sale_tax'         =>'Sale Tax',
            );
            

            ######      ######       ######

            return $param_view;
        }
        else
        {
            $param_view['heading'] = array('h1'   => 'Charges Managment','small'=>'Charges list');
            $param_view['links']   = array('edit' => 'Hierarchy/action/delivery_charges_list','delete' => 'Hierarchy/delete/delivery_charges_list');
            $param_view['column']  = array
            (
              //  'form_reason_id'    =>'Form Reason',
                'delivery_charges'             =>'Delivery Charges',
                'sale_tax'        => 'Sale Tax',
               
            );
            ######      ######       ######

            $this->load_hierarchy($uri,$param_view);
        }

    }

	

    public function country_dd($id)
    {
        return $this->Mdl_hierarchy->country_list($id);
    }

    //category List
    public function category_dd($id)
    {
        return $this->Mdl_hierarchy->category_list($id);
    }


    //Product List
    public function product_dd($id)
    {
        return $this->Mdl_hierarchy->product_list($id);
    }

    //Location List
    public function location_dd($id)
    {
        return $this->Mdl_hierarchy->location_list($id);
    }


    //Location List
    public function territory_dd($id)
    {
        return $this->Mdl_hierarchy->territory_list($id);
    }

	//Trans Code List
    public function trans_code_dd($id)
    {
        return $this->Mdl_hierarchy->trans_code_list($id);
    }
	
	
    //get state dropdown
    public function get_state_byid()
    {
        $country_id         =  $this->input->post('country_id');
        $data['result_set'] = $this->Mdl_hierarchy->state_list($country_id);
        foreach($data['result_set'] as $key => $value):
            $option .= '<option value = '.$key.' >'.$value.'</option>';
            endforeach;
        echo $option;
    }



    public function get_city_byid()
    {
        $country_id         =  $this->input->post('country_id');
        $data['result_set'] = $this->Mdl_hierarchy->city_list($country_id);
        foreach($data['result_set'] as $key => $value):
            $option .= '<option value = '.$key.' >'.$value.'</option>';
            endforeach;
        echo $option;
    }

    public function get_state_city_byid()
    {
        $country_id         =  $this->input->post('country_id');
        $state_id         =  $this->input->post('state_id');
        $data['result_set'] = $this->Mdl_hierarchy->city_list_by_state($country_id,$state_id);
        foreach($data['result_set'] as $key => $value):
            $option .= '<option value = '.$key.' >'.$value.'</option>';
            endforeach;
        echo $option;
    } 

    public function load_hierarchy($uri,$param_view)
    {

        $data['param_view'] = $param_view;
        $where =  $param_view['where'];
        $data['result_set'] = $this->Mdl_hierarchy->_this_hierarchy_record($uri,$where['ref'],$where['input']);

        foreach($data['result_set'] as $fetch):

            foreach($param_view['relation_data'] as $key => $rel)
            {
                if($fetch->$key != null)
                {
                    $fetch->$key  =   $this->Mdl_hierarchy->get_relation_pax($rel['tbl'],$rel['col'],'id',$fetch->$key);

                }
            }


            endforeach;

        #  exit;
        $data['content']    = 'Hierarchy/hierarchy';
        $this->load->view('Template/template',$data);       
    }
    public function action($id = null)
    { 

        $table = $this->uri->segment(3);  
        $id    = $this->uri->segment(4);  

        if($id > 0)
        {
            $data['result_set'] = $this->Mdl_hierarchy->_get_single_record_byid($table,$id);   
        } 
        $param_view = $this->{$table}(1); 
        // print_r($param_view);
        //          exit;
        $data['param_view'] = $param_view; 


        $data['content'] = 'Hierarchy/action';

        $this->load->view('Template/template',$data);

    }



    public function command()
    { 

        $uri       = $this->uri->segment(3);
        $post_view = $this->input->post();


       
        if($uri == 'madani_month' || $uri == 'madani_year' || $uri == 'logo_list')
        {

        }
		else
        {
            if(!isset($post_view['is_enable'])){$post_view['is_enable'] = 0;}  
        }      

        $column    = $this->Mdl_hierarchy->get_exist_column($uri);

        $post_data = array();
        foreach($column as $key)
        {
            if(array_key_exists($key, $post_view))
            {
                $post_data[$key] = $post_view[$key];
            }
        }


          /*  print_r($post_data);
        //       echo $uri;
               exit;
 */
        if($uri == 'slider_list')
        {




            //$update_id = $this->uri->segment(4);
            if($post_view['id'] != null)
            {
                if($_FILES['token_file']['name'] != "")
                {
                    $old_image = $post_view['old_image'];
                    unlink("public_html/frontend/image/slider/".$old_image);
                    $targetDir = FCPATH."public_html/frontend/image/slider/";
                    $fileName ="slider_".time().$this->session->userdata('id').'.jpg';
                    move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                    $cat_image = $fileName;
                }else
				{
					$cat_image = $post_view['old_image'];
				}
            }
            else
            {


                if($_FILES['token_file']['name'] != "")
                {
                    $targetDir = FCPATH."public_html/frontend/image/slider/";
                    $fileName ="slider_".time().$this->session->userdata('id').'.jpg';
                    move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                    $cat_image = $fileName;
                }
                else
                {
                    $cat_image = "";
                }

            }
            $post_data['slider_image'] = $cat_image;
			
			/* print_R($post_data);
			exit; */
            $db_command =  $this->Mdl_hierarchy->db_command($post_data,$post_view['id'],$uri);
            $last_insert_id = $this->db->insert_id();

            if($db_command)
            {
                if($post_view['id'] != null)
                {
                    $this->session->set_flashdata('update', 'your data successfully Updated');  
                }else
                {
                    $this->session->set_flashdata('saved', 'your data successfully Saved');    
                }

                redirect(base_url().'Hierarchy/'.$uri,'refresh');  
            }


        }
        else 
        if($uri == 'logo_list')
        {




            //$update_id = $this->uri->segment(4);
            if($post_view['id'] != null)
            {
                if($_FILES['token_file']['name'] != "")
                {
                    $old_image = $post_view['old_image'];
                    unlink("public_html/frontend/image/logo/".$old_image);
                    $targetDir = FCPATH."public_html/frontend/image/logo/";
                    $fileName ="logo_".time().$this->session->userdata('id').'.jpg';
                    move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                    $cat_image = $fileName;
                }
            }
            else
            {


                if($_FILES['token_file']['name'] != "")
                {
                    $targetDir = FCPATH."public_html/frontend/image/logo/";
                    $fileName ="slider_".time().$this->session->userdata('id').'.jpg';
                    move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                    $cat_image = $fileName;
                }
                else
                {
                    $cat_image = "";
                }

            }
            $post_data['logo_image'] = $cat_image;
            $db_command =  $this->Mdl_hierarchy->db_command($post_data,$post_view['id'],$uri);
            $last_insert_id = $this->db->insert_id();

            if($db_command)
            {
                if($post_view['id'] != null)
                {
                    $this->session->set_flashdata('update', 'your data successfully Updated');  
                }else
                {
                    $this->session->set_flashdata('saved', 'your data successfully Saved');    
                }

                redirect(base_url().'Hierarchy/'.$uri,'refresh');  
            }


        }
        else
            if($uri == 'brand_list')
            {




                //$update_id = $this->uri->segment(4);
                if($post_view['id'] != null)
                {
                    if($_FILES['token_file']['name'] != "")
                    {
                        $old_image = $post_view['old_image'];
                        unlink("public_html/frontend/image/brand/".$old_image);
                        $targetDir = FCPATH."public_html/frontend/image/brand/";
                        $fileName ="brand_".time().$this->session->userdata('id').'.jpg';
                        move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                        $cat_image = $fileName;
                    }
                }
                else
                {


                    if($_FILES['token_file']['name'] != "")
                    {
                        $targetDir = FCPATH."public_html/frontend/image/brand/";
                        $fileName ="brand_".time().$this->session->userdata('id').'.jpg';
                        move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                        $cat_image = $fileName;
                    }
                    else
                    {
                        $cat_image = "";
                    }

                }
                $post_data['brand_image'] = $cat_image;
                $db_command =  $this->Mdl_hierarchy->db_command($post_data,$post_view['id'],$uri);
                $last_insert_id = $this->db->insert_id();

                if($db_command)
                {
                    if($post_view['id'] != null)
                    {
                        $this->session->set_flashdata('update', 'your data successfully Updated');
                    }else
                    {
                        $this->session->set_flashdata('saved', 'your data successfully Saved');
                    }

                    redirect(base_url().'Hierarchy/'.$uri,'refresh');
                }


            }
 else
            if($uri == 'adds_list')
            {




                //$update_id = $this->uri->segment(4);
                if($post_view['id'] != null)
                {
                    if($_FILES['token_file']['name'] != "")
                    {
                        $old_image = $post_view['old_image'];
                        unlink("public_html/frontend/image/adds/".$old_image);
                        $targetDir = FCPATH."public_html/frontend/image/adds/";
                        $fileName ="adds_".time().$this->session->userdata('id').'.jpg';
                        move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                        $cat_image = $fileName;
                    }
                }
                else
                {


                    if($_FILES['token_file']['name'] != "")
                    {
                        $targetDir = FCPATH."public_html/frontend/image/adds/";
                        $fileName ="adds_".time().$this->session->userdata('id').'.jpg';
                        move_uploaded_file($_FILES['token_file']['tmp_name'], $targetDir.$fileName);
                        $cat_image = $fileName;
                    }
                    else
                    {
                        $cat_image = "";
                    }

                }
                $post_data['adds_image'] = $cat_image;
                $db_command =  $this->Mdl_hierarchy->db_command($post_data,$post_view['id'],$uri);
                $last_insert_id = $this->db->insert_id();

                if($db_command)
                {
                    if($post_view['id'] != null)
                    {
                        $this->session->set_flashdata('update', 'your data successfully Updated');
                    }else
                    {
                        $this->session->set_flashdata('saved', 'your data successfully Saved');
                    }

                    redirect(base_url().'Hierarchy/'.$uri,'refresh');
                }


            }
                    
		  else
            {

            $db_command =  $this->Mdl_hierarchy->db_command($post_data,$post_view['id'],$uri);

            if($db_command)
            {
                if($post['id'] != null)
                {
                    $this->session->set_flashdata('update', 'your data successfully Updated');  
                }else
                {
                    $this->session->set_flashdata('saved', 'your data successfully Saved');    
                }

                redirect(base_url().'Hierarchy/'.$uri,'refresh');  
            }

        }  

    } 
    public function change_user_status_h()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];
        $table              =  $post['table'];


        $_return['_return'] =  $this->Mdl_hierarchy->_change_user_status_h($id,$status,$table);
        $return             = json_encode($_return);
        echo $return; 

    }
    //Status Change Year & Month
    public function change_status_year_month()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];
        $table              =  $post['table'];

        $_return['_return'] =  $this->Mdl_hierarchy->_change_status_year_month($id,$status,$table);
        $return             =  json_encode($_return);
        echo $return; 
    }

	   //Status Change Logo Image
    public function change_status_logo_image()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];
        $table              =  $post['table'];

        $_return['_return'] =  $this->Mdl_hierarchy->_change_status_logo_image($id,$status,$table);
        $return             =  json_encode($_return);
        echo $return; 
    }

	   //Status Change Logo Title
    public function change_status_logo_title()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];
        $table              =  $post['table'];

        $_return['_return'] =  $this->Mdl_hierarchy->_change_status_logo_title($id,$status,$table);
        $return             =  json_encode($_return);
        echo $return; 
    }

	

    public function hierarchy_unique_exception()
    {
        $value  = $this->input->post('input');
        $column = $this->input->post('column');
        $table  = $this->input->post('ref');
        $_ref_attr_segemt  = $this->input->post('ref_attr_segemt');

        $this->db->select('id'); 
        $this->db->where($column,$value); 
        $query =  $this->db->get($table);
        $count = $query->num_rows();

        if($count > 0)
        {
            $_result = $query->result(); 
            if($_result[0]->id == $_ref_attr_segemt)
            {
                $count = 0 ;  
            }
        }

        $array['return'][0] = $count;


        echo json_encode($array);
    } 
    public function delete()
    {
        $table  = $this->uri->segment(3);
        $id    = $this->uri->segment(4);
        $delete = $this->Mdl_hierarchy->_delete($id,$table);

        if($delete == 1)
        {
            $this->session->set_flashdata('delete', 'your data successfully Deleted!'); 
        }else
        {
            $this->session->set_flashdata('error', 'No record found for Deleting !');   
        }
        redirect(base_url().'Hierarchy/'.$table,'refresh');   
    } 




    ###################### Pakkabina work starting from Here ####################


    public function get_dvn_parent_details()
    {

        $data      = $this->input->post();
        $act       = $data['act'];
        $searchby  = $data['searchby'];
        $keyword   = $data['keyword'];
        $div       = $data['div'];
        $inputbox  = $data['inputbox'];
        $html      = '';    
        $get_dvn_bycode =  $this->isAscii($keyword);           

        $param_view['relation'][]   = array(
            'table'   =>  'division_list',
            'ref'     =>  'id',
            'column'  =>  'kabina_id',
            'dropdown'=>  'kabina_list ',

        );    
        $param_view['relation'][]   = array(
            'table'   =>  'kabina_list',
            'ref'     =>  'id',
            'column'  =>  'kabinat_id',
            'dropdown'=>  'kabinat_list',
        );             
        $param_view['relation'][]   = array(
            'table'   =>  'kabinat_list',
            'ref'     =>  'id',
            'column'  =>  'country_id',
            'dropdown'=>  'country_list',
        ); 

        if($get_dvn_bycode ==1):

            $get_searched_data =  $this->get_dvn_bycode($keyword);        
            else:

            $get_searched_data =  $this->get_dvn_byname($keyword);      
            endif;        

        foreach($get_searched_data as $gsd) :

            $relation_pax = $this->_get_relation_pax_dataarray($param_view['relation'],$gsd->id);
            $rp           = $relation_pax;
            $segment_data =  $rp['country_list'].'___'.$rp['kabinat_list'].'___'.$rp['kabina_list'].'___'.$gsd->id;

            //                       $segment_data
            $html .= '<li class="ui-menu-item">
            <a id="Datadiv" class="ui-corner-all" onclick="setSearchData(\''.$div.'\',\''.$gsd->code.' | '.$gsd->title.'\',\''.$inputbox.'\',\''.$segment_data.'\');">
            '.$gsd->code.' | '.$gsd->title.'
            </a>
            </li>';
            endforeach;   

        echo $html ;

    }

    public function isAscii($str) 
    {
        return 0 == preg_match('/[^\x00-\x7F]/', $str);
    }

    public function _get_relation_pax_dataarray($param,$default)
    {
        foreach($param as $key => $parm):

            if($key > 0)
            {
                $pax = end($_return); 
            }else
            {
                $pax = $default;   
            } 
            $_return[trim($parm['dropdown'])] = $this->_get_relation_pax($parm['table'],$parm['column'],$parm['ref'],$pax);

            endforeach;  
        return $_return;
    }

    public function _get_relation_pax($table,$column,$reference,$input)
    {
        $this->pakkabina_db->select($column);
        $this->pakkabina_db->where($reference,$input);
        $this->pakkabina_db->where('is_enable',1);
        $result =  $this->pakkabina_db->get($table)->result();
        return $result[0]->$column;

    } 


    ###################### Pakkabina work Ending from Here ####################



}

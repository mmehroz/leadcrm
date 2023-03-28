<?php
// error_reporting(1);
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller  {

    function __construct()
    {
        parent::__construct();
        Modules::run('Login/_login');
        $this->load->model('Mdl_users');
        $this->load->module('Hierarchy');
        //$this->load->library('excel');
    }
    public function index()
    {    
        $data['result_set'] = $this->Mdl_users->_this_controller_record();
        $data['content']    = 'Users/users';
        $this->load->view('Template/template',$data);
    }
	
	//inbox list
	 public function inbox_list()
    {    
        $data['result_set'] = $this->Mdl_users->_this_controller_inbox_list_record();
        $data['content']    = 'Users/inbox_list';
        $this->load->view('Template/template',$data);
    }
	//sent list
	public function sent_list()
    {    
        $data['result_set'] = $this->Mdl_users->_this_controller_sent_list_record();
        $data['content']    = 'Users/sent_list';
        $this->load->view('Template/template',$data);
    }
	//saved list
	public function saved_list()
    {    
        $data['result_set'] = $this->Mdl_users->_this_controller_saved_list_record();
        $data['content']    = 'Users/saved_list';
        $this->load->view('Template/template',$data);
    }
	
	
	public function viewdeals()
    {    
        $data['result_set'] = $this->Mdl_users->_this_viewdeals_record();
        $data['content']    = 'Users/viewdeals';
        $this->load->view('Template/template',$data);
    }

    public function savedeals()
    {    
        $id = $this->session->userdata('id');
        $data['result_set'] = $this->Mdl_users->get_saved_deals_by_user($id);
        $data['content']    = 'Users/users_saved';
        $this->load->view('Template/template',$data);
    }

    public function datatable_ajax($get=null){
        $result = $this->Mdl_users->_this_controller_record();
        echo json_encode($result);
    }

    public function update_status($type){
        $id     = $_POST['id'];
        $value  = $_POST['value'];

		if($type == "deal_type")
		{
			
			//Send Status Forward
			if($_POST['edit_type'] == 'inbox_send')
			{
				
				//Agent
					if($_POST['value'] == 'send_agent')
					{
						$data['is_draft'] = 0;
						$data['isAgent'] = 1;						
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Manager
					if($_POST['value'] == 'send_manager')
					{
						$data['is_draft'] = 0;
						$data['isAgent'] = 0;							
						$data['isManager'] = 1;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Customer
					if($_POST['value'] == 'send_customer')
					{
						$data['is_draft'] = 0;
						$data['isCustomer'] = 1;					
						$data['isManager'] = 2;							
						$data['isAgent'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}					
					//Admin
					if($_POST['value'] == 'send_admin')
					{
						$data['is_draft'] = 0;
						$data['isAdmin'] = 1;							
						$data['isCustomer'] = 2;							
						$data['isManager'] = 2;							
						$data['isAgent'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}	
					//Final Status
					if($_POST['value'] == 'send_final')
					{
						$data['is_draft'] = 0;
						$data['isAgent'] = 0;						
						$data['isManager'] = 0;						
						$data['isCustomer'] = 0;						
						$data['isAdmin'] = 0;						
						$data['isFinal'] = 1;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}	
	                $data['modify_date']   = date('Y-m-d H:i:s');
					$data['modify_by']     = $this->session->userdata('id');
					//$db_command = $this->db->update('user_list', $data,$post['id']);                	
					$db_command = $this->Mdl_users->db_command($data,$id,'user_list');  
		
		
				$data_h['deals_type'] = 'deals form Send'; 
				$data_h['deals_id'] = $id; 
				$data_h['created_date'] = date('Y-m-d H:i:s');
				$data_h['created_by'] = $this->session->userdata('id');
				$this->db->insert('history_list', $data_h);
				
				  echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
				
				
				
			} //Send Status Revert
			else if($_POST['edit_type'] == 'inbox_revert')
			{
				
				//Agent
					if($_POST['value'] == 'send_agent')
					{
						$data['is_draft'] = 0;
						$data['isAgent'] = 1;	
						$data['isCustomer'] = 0;						
						$data['isManager'] = 0;	
						$data['isAdmin'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Manager
					if($_POST['value'] == 'send_manager')
					{
						$data['is_draft'] = 0;
						$data['isManager'] = 1;				
						$data['isAgent'] = 0;						
						$data['isCustomer'] = 0;						
						$data['isAdmin'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Customer
					if($_POST['value'] == 'send_customer')
					{
						$data['is_draft'] = 0;
						$data['isCustomer'] = 1;						
						$data['isManager'] = 0;						
						$data['isAgent'] = 0;						
						$data['isAdmin'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}					
					//Admin
					if($_POST['value'] == 'send_admin')
					{
						$data['is_draft'] = 0;
						$data['isAdmin'] = 1;					
						$data['isManager'] = 0;						
						$data['isCustomer'] = 0;						
						$data['isAgent'] = 0;							
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}	
	                $data['modify_date']   = date('Y-m-d H:i:s');
					$data['modify_by']     = $this->session->userdata('id');
					//$db_command = $this->db->update('user_list', $data,$post['id']);                	
					$db_command = $this->Mdl_users->db_command($data,$id,'user_list');  
		
		
				$data_h['deals_type'] = 'deals form Send'; 
				$data_h['deals_id'] = $id; 
				$data_h['created_date'] = date('Y-m-d H:i:s');
				$data_h['created_by'] = $this->session->userdata('id');
				$this->db->insert('history_list', $data_h);
				
				  echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
				
				
				
				
			}
			else
			{
		            //Agent
					if($_POST['value'] == 'send_agent')
					{
						$data['is_draft'] = 0;
						$data['isAgent'] = 1;
						$data['isManager'] = 0;
						$data['isCustomer'] = 0;
						$data['isAdmin'] = 0;
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Manager
					if($_POST['value'] == 'send_manager')
					{
						$data['is_draft'] = 0;
						$data['isManager'] = 1;
						$data['isAgent'] = 0;
						$data['isCustomer'] = 0;
						$data['isAdmin'] = 0;
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}
					//Customer
					if($_POST['value'] == 'send_customer')
					{
						$data['is_draft'] = 0;
						$data['isCustomer'] = 1;
						$data['isAgent'] = 0;
						$data['isManager'] = 0;
						$data['isAdmin'] = 0;
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}					
					//Admin
					if($_POST['value'] == 'send_admin')
					{
						$data['is_draft'] = 0;
						$data['isAdmin'] = 1;
						$data['isAgent'] = 0;
						$data['isCustomer'] = 0;
						$data['isManager'] = 0;
						$data_h['deals_to'] = $this->session->userdata('id'); 
			            $data_h['deals_from'] = $_POST['value']; 
					}	
					//Final
					if($_POST['value'] == 'send_final')
					{
						$data['isFinal'] = 1;
						$data['is_draft'] = 0;
						$data['isAdmin'] = 0;
						$data['isAgent'] = 0;
						$data['isCustomer'] = 0;
						$data['isManager'] = 0;
						$data_h['deals_to'] = $this->session->userdata('id'); 
						$data_h['deals_from'] = 'Final'; 
					}	

	                $data['modify_date']   = date('Y-m-d H:i:s');
					$data['modify_by']     = $this->session->userdata('id');
					//$db_command = $this->db->update('user_list', $data,$post['id']);                	
					$db_command = $this->Mdl_users->db_command($data,$id,'user_list');  
		
		
				$data_h['deals_type'] = 'deals form Send'; 
				$data_h['deals_id'] = $id; 
				$data_h['created_date'] = date('Y-m-d H:i:s');
				$data_h['created_by'] = $this->session->userdata('id');
				$this->db->insert('history_list', $data_h);
				
				  echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
		
			}
		
		}
		else
		{
			
			
			
			   $this->db->update('user_list', array($type => $value), array('id' => $id));
               echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
		}
	
	}
	
	//Delete Record CC Details
	 public function delete_cc_details()
	 {
        $id     = $this->input->post('id');
		$this->db->where('id', $id);
        $this->db->delete('cc_details'); 
         echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
			
	}
	
	public function update_status_type($type){
        $id     = $_POST['id'];
        $value  = $_POST['value'];

        $this->db->update('user_list', array($type => $value), array('id' => $id));
        echo '<div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Status Updated.
             </div>';
    }
	

    public function action($id = null)
    { 

        $id = $this->uri->segment(3);  
        if($id > 0)
        {
            $data['result_set'] = $this->Mdl_users->_get_single_record_byid($id);  
            $data['cc_details'] = $this->Mdl_users->get_cc_by_formID($id);
            // var_dump($data['cc_details']);exit;
        } 
		if($data['result_set'][0]->is_draft == 1)
		{
		
        $data['content']   = 'Users/saved_edit';
        $this->load->view('Template/template',$data);
	
		}else
		{

        $data['content']   = 'Users/deals_edit';
        $this->load->view('Template/template',$data);
			
		}
    }
	
	 public function downloadPDF($id = null)
    { 
        $this->load->library('m_pdf');
      
        $id = $this->uri->segment(3);  
        if($id > 0)
        {
           $data['result_set'] = $this->Mdl_users->_get_single_record_byid($id);  
           $data['result_set_cc'] = $this->Mdl_users->get_cc_by_formID($data['result_set'][0]->id);  
            // echo '<pre>';
            // var_dump($data);exit;
        } 
       
	   //now pass the data//
		// $this->data['title']="Saved Deals";
		// $this->data['description']="";
		 //$this->data['description']=$this->official_copies;
		 //now pass the data //
 
		
		$html=$this->load->view('Users/sample_form',$data, true); //load the pdf_output.php by passing our data and get all data in $html varriable.
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath =time()."-download.pdf";
 
		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output();
		
		//redirect(base_url().$pdfFilePath,'refresh');  
	   
	   
	   
	   
// $html2pdf->WriteHTML($content); // in $content you put your content to have in pdf
  //  $html2pdf->Output('exemple.pdf');

	// $html2pdf->Output($thefullpath, 'F');
	    //$html2pdf->WriteHTML($content);
	   // print_r($this->html2pdf->create('download'));
        //redirect('Users', 'refresh');
    }

   /*  public function downloadPDF($id = null)
    { 
        $this->load->library('html2pdf');
        // var_dump(FCPATH.'/public_html/assets/pdfs/');exit;
        $this->html2pdf->folder(FCPATH.'/public_html/assets/pdfs/');
        $this->html2pdf->filename(uniqid().'.pdf', array(0, 0, 0, 0));
        $this->html2pdf->paper('a4', 'portrait');
        $id = $this->uri->segment(3);  
        if($id > 0)
        {
            $data['result_set'] = $this->Mdl_users->_get_single_record_byid($id);  
            // echo '<pre>';
            // var_dump($data);exit;
        } 
        // $this->load->view('Users/sample_form',$data);
        $this->html2pdf->WriteHTML($this->load->view('Users/sample_form',$data, true));
       $this->html2pdf->Output("outstanding.pdf","I");

// $html2pdf->WriteHTML($content); // in $content you put your content to have in pdf
  //  $html2pdf->Output('exemple.pdf');

	// $html2pdf->Output($thefullpath, 'F');
	    //$html2pdf->WriteHTML($content);
	   // print_r($this->html2pdf->create('download'));
        //redirect('Users', 'refresh');
    } */

    public function sample_form(){
        
        $data['content']    = 'Users/sample_form';
        $this->load->view('Template/template',$data);
    }

    public function createdeal()
	{

        $data['content']    = 'Users/create_form';
        $this->load->view('Template/template',$data);
    
    }

    public function command()
    { 
	    $post = $this->input->post();
	
        if(isset($post['save']))
		{
			//Update Form
			    if($post['id'] > 0)
				{
					if($post['edit_type'] == "saved_edit")
					{
						$data['is_draft'] = 1;
						$data_h['deals_to'] = $this->session->userdata('id'); 
						$data_h['deals_from'] = 'Saved'; 
					}
					else
					{
						$data['is_draft'] = 2;
						$data_h['deals_to'] = $this->session->userdata('id'); 
						$data_h['deals_from'] = 'Saved Form Process'; 
					}
					
					
					
				}
				else
				{
					$data['is_draft'] = 1;
					$data_h['deals_to'] = $this->session->userdata('id'); 
					$data_h['deals_from'] = 'Saved'; 
				}
            
        } else {
				//Update Form
			    if($post['id'] > 0)
				{
					if($post['edit_type'] == "deals_edit")
					{
						//$data['is_draft'] = 1;
						$data_h['deals_to'] = $this->session->userdata('id'); 
						$data_h['deals_from'] = 'Deals Edit'; 
					}
					else
					{						
						//Super Admin
						if($this->session->userdata('user_type') == 1)
						{						
							$data_h['deals_to'] = $this->session->userdata('id'); 
							$data_h['deals_from'] = 'SuperAdmin'; 
						}else
						//Customer
						if($this->session->userdata('user_type') == 2)
						{
							$data_h['deals_to'] = $this->session->userdata('id'); 
							$data_h['deals_from'] = 'Customer'; 
						}else
						//Manager
						if($this->session->userdata('user_type') == 3)
						{
							$data_h['deals_to'] = $this->session->userdata('id'); 
							$data_h['deals_from'] = 'Manager'; 
						}else
						//Agent
						if($this->session->userdata('user_type') == 4)
						{
							$data['is_draft'] = 0;
							//$data['isManager'] = 1;
							$data_h['deals_to'] = $this->session->userdata('id'); 
							$data_h['deals_from'] = 'Manager'; 
						}else
						//Admin
						if($this->session->userdata('user_type') == 5)
						{
							$data_h['deals_to'] = $this->session->userdata('id'); 
							$data_h['deals_from'] = 'Admin'; 
						}
						
						
						//Agent
					if($_POST['send_status'] == 'send_agent')
					{
						$data['isAgent'] = 1;
					}
					//Manager
					if($_POST['send_status'] == 'send_manager')
					{
						$data['isManager'] = 1;
					}
					//Customer
					if($_POST['send_status'] == 'send_customer')
					{
						$data['isCustomer'] = 1;
					}					
					//Admin
					if($_POST['send_status'] == 'send_admin')
					{
						$data['isAdmin'] = 1;
					}
					
					
					}
						
					
				}
				else
				{			
					//Agent
					if($_POST['send_status'] == 'send_agent')
					{
						$data['isAgent'] = 1;
					}
					//Manager
					if($_POST['send_status'] == 'send_manager')
					{
						$data['isManager'] = 1;
					}
					//Customer
					if($_POST['send_status'] == 'send_customer')
					{
						$data['isCustomer'] = 1;
					}					
					//Admin
					if($_POST['send_status'] == 'send_admin')
					{
						$data['isAdmin'] = 1;
					}	
					$data['is_draft'] = 0;
					$data_h['deals_to'] = $this->session->userdata('id'); 
					$data_h['deals_from'] = $_POST['send_status']; 
				}
        }
         
/*     echo "<pre>";
print_r($_POST['send_status']);
print_r($data);
exit;  */
		if(isset($post['states']))
		{
			$states = $post['states'];
		}else
		{
			$states = $post['old_states'];
			
		}

        $ip_address      = $this->input->ip_address();

		
		$data['deal_date']      = $post['deal_date'];
        $data['agent']          = $post['agent'];
        $data['manager']     	= $post['manager'];
        $data['center']       	= $post['center'];
        $data['full_name']      = $post['full_name'];
        $data['street_address'] = $post['street_address'];
        $data['country']        	= $post['country'];
        $data['states']        	= $states;
        $data['email_address']  = $post['email_address'];
        $data['dob']        	= $post['dob'];
        $data['home_phone']     = $post['home_phone'];
        $data['work_mobile']    = $post['work_mobile'];
        $data['city']        	= $post['city'];
        $data['zipcode']        = $post['zipcode'];
        $data['sins']        	= $post['sins'];
        $data['mmn']        	= $post['mmn'];

		$data['id1']        	= $post['id1'];
        $data['product1']       = $post['product1'];
        $data['qty1']        	= $post['qty1'];
        $data['price1']        	= $post['price1'];
        $data['payment_option1']= $post['payment_option1'];
        $data['total1']        	= $post['total1'];
        $data['agent_notes']    = $post['agent_notes'];
        $data['manager_notes']  = $post['manager_notes'];
        $data['customer_services_notes'] = $post['customer_services_notes'];
        $data['ip_address']     = $ip_address;
          
				
               if($post['id'] > 0)
				{
					$deals_id = $post['id']; 
					/* echo "YES";
					echo $post['id'];
					print_r($post);
					exit;  */
					$data['modify_date']   = date('Y-m-d H:i:s');
					$data['modify_by']     = $this->session->userdata('id');
					//$db_command = $this->db->update('user_list', $data,$post['id']);                	
					$db_command = $this->Mdl_users->db_command($data,$post['id'],'user_list');                	
					
					//print_r($post);
				/* 	print_r($db_command);
					exit; */
					if(isset($post['save']))
					{
						$data_h['deals_type'] = 'saved deals form update'; 
					}
					else
					{
						$data_h['deals_type'] = 'deals form update'; 
					}
					
					$data_h['deals_id'] = $post['id']; 
					
					$data_h['created_date'] = date('Y-m-d H:i:s');
					$data_h['created_by'] = $this->session->userdata('id');
				
				$this->db->insert('history_list', $data_h);
				
				}
				else
				{
	
				$data['created_date']   = date('Y-m-d H:i:s');
				$data['created_by']     = $this->session->userdata('id');
				$db_command = $this->db->insert('user_list', $data);
				$deals_id = $this->db->insert_id(); 
		
		            if(isset($post['save']))
					{
						$data_h['deals_type'] = 'saved deals form add'; 
					}
					else
					{
						$data_h['deals_type'] = 'deals form add'; 
					}
					
				$data_h['deals_id'] = $deals_id; 
				
				$data_h['created_date'] = date('Y-m-d H:i:s');
				$data_h['created_by'] = $this->session->userdata('id');
				
				$this->db->insert('history_list', $data_h);
				
				}
				
       
		
		//$db_command1 =  $this->Mdl_users->db_command($data_h,null,'history_list');
        if($db_command)
        {
			//echo count($post['cc_number']);
			//$aa = array();
            for ($i=0; $i < count($post['cc_number']); $i++) { 
                $data = array(
                    'form_id'       => $deals_id,
                    'cc_number'     => $post['cc_number'][$i],
                    'cvc'           => $post['cvc'][$i],
                    'exp'           => $post['exp'][$i],
                    'apr'           => $post['apr'][$i],
                    'owe'           => $post['owe'][$i],
                    'avail'         => $post['avail'][$i],
                    'int_rate'      => $post['int_rate'][$i],
                    'bank'          => $post['bank'][$i],
                    'bank_tollfree' => $post['bank_tollfree'][$i],
                    'min_pay'       => $post['min_pay'][$i],
                    'last_pay'      => $post['last_pay'][$i],
                    'current_pay'   => $post['current_pay'][$i],
                    'next_pay'      => $post['next_pay'][$i],
                    'last_pay_date' => $post['last_pay_date'][$i],
                    'next_pay_date' => $post['next_pay_date'][$i]
                   
                    );
				/* 	 echo "<pre>";
print_r($data); */
              if($post['cc_id'][$i] > 0)
				{
				
				$this->db->update('cc_details', $data,$post['cc_id'][$i]);
                	//$aa[] = $data;
				}else
				{
				$new_record = $this->Mdl_users->db_command($data,NULL,'cc_details');       
				//$this->db->insert('cc_details', $data);
                	//$aa[] = $data;
				} 
				
            }
/*  echo "<pre>";
print_r($data); */
//print_r($new_record);
			/* exit;  */
			
            if($post['id'] != null)
            {
                $this->session->set_flashdata('update', 'your data successfully Updated');  
            }else
            {
                $this->session->set_flashdata('saved', 'your data successfully Saved');    
            }

            redirect(base_url().'Users','refresh');  
        }  

    } 
    
	public function view_detail($id = null)
    { 

        $id = $this->uri->segment(3);       
        $result_set = $this->Mdl_users->_get_single_record_byid($id);  
		//print_r($result_set); 

		 $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            //name the worksheet
            $this->excel->getActiveSheet()->setTitle('Deal Form Details');
            //set cell A1 content with some text
            $this->excel->getActiveSheet()->setCellValue('A1', 'Sr No');
            $this->excel->getActiveSheet()->setCellValue('B1', 'Deal Date');
            $this->excel->getActiveSheet()->setCellValue('C1', 'Agent');
            $this->excel->getActiveSheet()->setCellValue('D1', 'Manager');
            $this->excel->getActiveSheet()->setCellValue('E1', 'Center');
            $this->excel->getActiveSheet()->setCellValue('F1', 'Full Name');
            $this->excel->getActiveSheet()->setCellValue('G1', 'Street Address');
            $this->excel->getActiveSheet()->setCellValue('H1', 'State');
            $this->excel->getActiveSheet()->setCellValue('I1', 'Email Address');
            $this->excel->getActiveSheet()->setCellValue('J1', 'Date of Birth');
            $this->excel->getActiveSheet()->setCellValue('K1', 'Home Phone');
            $this->excel->getActiveSheet()->setCellValue('L1', 'Work Mobile');
            $this->excel->getActiveSheet()->setCellValue('M1', 'City');
            $this->excel->getActiveSheet()->setCellValue('N1', 'Zip Code');
            $this->excel->getActiveSheet()->setCellValue('O1', 'SIN');
            $this->excel->getActiveSheet()->setCellValue('P1', 'MMN');
            $this->excel->getActiveSheet()->setCellValue('Q1', 'CC Number 1');
            $this->excel->getActiveSheet()->setCellValue('R1', 'CVC 1');
            $this->excel->getActiveSheet()->setCellValue('S1', 'EXP 1');
            $this->excel->getActiveSheet()->setCellValue('T1', 'OWE 1');
            $this->excel->getActiveSheet()->setCellValue('U1', 'Avail 1');
            $this->excel->getActiveSheet()->setCellValue('V1', 'Int Rate 1');
            $this->excel->getActiveSheet()->setCellValue('W1', 'Bank 1');
            $this->excel->getActiveSheet()->setCellValue('X1', 'CC Number 2');
            $this->excel->getActiveSheet()->setCellValue('Y1', 'CVC 2');
            $this->excel->getActiveSheet()->setCellValue('Z1', 'EXP 2');
            $this->excel->getActiveSheet()->setCellValue('AA1', 'OWE 2');
            $this->excel->getActiveSheet()->setCellValue('AB1', 'Avail 2');
            $this->excel->getActiveSheet()->setCellValue('AC1', 'Int Rate 2');
            $this->excel->getActiveSheet()->setCellValue('AD1', 'Bank 2');
            $this->excel->getActiveSheet()->setCellValue('AE1', 'CC Number 3');
            $this->excel->getActiveSheet()->setCellValue('AF1', 'CVC 3');
            $this->excel->getActiveSheet()->setCellValue('AG1', 'EXP 3');
            $this->excel->getActiveSheet()->setCellValue('AH1', 'OWE 3');
            $this->excel->getActiveSheet()->setCellValue('AI1', 'Avail 3');
            $this->excel->getActiveSheet()->setCellValue('AJ1', 'Int Rate 3');
            $this->excel->getActiveSheet()->setCellValue('AK1', 'Bank 3');
            $this->excel->getActiveSheet()->setCellValue('AL1', 'ID 1');
            $this->excel->getActiveSheet()->setCellValue('AM1', 'Product 1');
            $this->excel->getActiveSheet()->setCellValue('AN1', 'Qty 1');
            $this->excel->getActiveSheet()->setCellValue('AO1', 'Price 1');
            $this->excel->getActiveSheet()->setCellValue('AP1', 'Payment Option 1');
            $this->excel->getActiveSheet()->setCellValue('AQ1', 'Total 1');
            $this->excel->getActiveSheet()->setCellValue('AR1', 'Agent Notes');
            $this->excel->getActiveSheet()->setCellValue('AS1', 'Manager Notes');
            $this->excel->getActiveSheet()->setCellValue('AT1', 'Customer Services Notes');

            for ($col = ord('A'); $col <= ord('Z'); $col++) {
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('H1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('I1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('J1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('L1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('M1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('N1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('O1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('P1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('Q1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('R1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('S1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('T1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('U1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('V1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('W1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('X1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('Y1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('Z1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AA1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AB1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AC1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AD1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AE1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AF1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AG1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AH1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AI1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AJ1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('Ak1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AL1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AM1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AN1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AO1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AP1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AQ1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AR1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AS1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('AT1')->getFont()->setBold(true);
                //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
            }
            $row_count = 2;
            $srno = 1;
            //Customer Record Result
            foreach ($result_set as $row) {
               
                $total_price = $row->order_price_total;
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row_count, $srno);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row_count, $row->deal_date);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row_count, $row->agent);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row_count, $row->manager);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row_count, $row->center);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row_count, $row->full_name);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row_count, $row->street_address);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $row_count, $row->states);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, $row_count, $row->email_address);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, $row_count, $row->dob);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(10, $row_count, $row->home_phone);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(11, $row_count, $row->work_mobile );
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(12, $row_count, $row->city);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(13, $row_count, $row->zipcode);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(14, $row_count, $row->sins);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(15, $row_count, $row->mmn);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(16, $row_count, $row->cc_number1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(17, $row_count, $row->cvc1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(18, $row_count, $row->exp1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(19, $row_count, $row->owe1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(20, $row_count, $row->avail1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(21, $row_count, $row->int_rate1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(22, $row_count, $row->bank1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(23, $row_count, $row->cc_number2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(24, $row_count, $row->cvc2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(25, $row_count, $row->exp2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(26, $row_count, $row->owe2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(27, $row_count, $row->avail2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(28, $row_count, $row->int_rate2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(29, $row_count, $row->bank2);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(30, $row_count, $row->cc_number3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(31, $row_count, $row->cvc3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(32, $row_count, $row->exp3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(33, $row_count, $row->owe3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(34, $row_count, $row->avail3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(35, $row_count, $row->int_rate3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(36, $row_count, $row->bank3);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(37, $row_count, $row->id1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(38, $row_count, $row->product1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(39, $row_count, $row->qty1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(40, $row_count, $row->price1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(41, $row_count, $row->payment_option1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(42, $row_count, $row->total1);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(43, $row_count, $row->agent_notes);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(44, $row_count, $row->manager_notes);
                $this->excel->getActiveSheet()->setCellValueByColumnAndRow(45, $row_count, $row->customer_services_notes);
                $row_count++;
                $srno++;


            }
            //$column_count++;
            $filename = 'deal_form-detail.xlsx'; //save our workbook as this file name
            header('Content-Type: application/vnd.ms-excel'); //mime type
            header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache

            //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
            //if you want to save it as .XLSX Excel 2007 format
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            //force user to download the Excel file without writing it to server's HD
            $objWriter->save('php://output');
       $data['content']   = 'Users/action';
        $this->load->view('Template/template',$data); 

    }
	
	
	
	public function check_user_exists()
    {
        $post               =  $this->input->post();
        $username           =  $post['username'];
        $id                 =  (!empty($post['id'])?$post['id']:NULL);
        $cmd_return         =  $this->Mdl_users->_get_single_record_byusername($username,$id);

        $_return['_return'] =  $cmd_return;

        $return = json_encode($_return);
        echo $return; 

    }
    public function change_user_status()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];

        $_return['_return'] =  $this->Mdl_users->_change_user_status($id,$status);
        $return             = json_encode($_return);
        echo $return; 

    }  

    //User Print Status
    public function change_user_is_print()
    {
        $post               =  $this->input->post();
        $id                 =  $post['id'];
        $status             =  $post['status'];

        $_return['_return'] =  $this->Mdl_users->_change_user_is_print($id,$status);
        $return             = json_encode($_return);
        echo $return; 
    } 


    public function delete($id)
    {
        $delete = $this->Mdl_users->_delete($id);

        if($delete == 1)
        {
            $this->session->set_flashdata('delete', 'your data successfully Deleted!'); 
        }else
        {
            $this->session->set_flashdata('error', 'No record found for Deleting !');   
        }
        redirect(base_url().'Users','refresh');  
    }  
    public function data_permission()
    {
        $data['permission_view'] = $this->hierarchy_list();   
        $data['content']    = 'Users/data_permission';
        $this->load->view('Template/template',$data);
    }
    public function module_permission()
    {
        $data['permission_view'] = $this->menulist();   
        $data['content']    = 'Users/module_permission';
        $this->load->view('Template/template',$data);
    }
    function menulist()
    {     

        $this->db->select('*'); 
        $this->db->order_by('sort_order','asc');
        $result   =  $this->db->get('admin_module_list')->result();
        $userid =  $this->uri->segment(3);
        $permission  = json_decode($this->already_exists_row('admin_module_permission','userid',$userid,'permission'));
        $permission = json_decode(json_encode($permission), True); 
        #  $this->Mdl_users->debug_r($permission,1); 
        $html      = ''; 
        $html_div  = ''; 
        $html .='<div class="tabbable tabs-left">';

        $count = 0; 
        foreach($result as $res):
            $count++; 

            if($res->parent_id == 0):
                if($count == 1): 
                    $html_li .='<li class="active">';
                    $html_div_in.='<div id="'.$res->mdl_name.'" class="tab-pane in active">';
                    else:
                    $html_li .='<li class="">';
                    $html_div_in.='<div id="'.$res->mdl_name.'" class="tab-pane ">';
                    endif;

                $html_li .='<a data-toggle="tab" href="#'.$res->mdl_name.'">
                <i class="blue icon-dashboard bigger-110"></i>
                '.$res->mdl_name.'
                </a></li>';

                $param = array('a'=>'','e'=>'','d'=>'','v'=>'');

                if($permission[$res->id]['a'] != 0):
                    $param['a']        = 'checked="checked"'; 
                    endif;
                if($permission[$res->id]['e'] != 0):
                    $param['e']        = 'checked="checked"'; 
                    endif;
                if($permission[$res->id]['d'] != 0):
                    $param['d']        = 'checked="checked"';    
                    endif;
                if($permission[$res->id]['v'] != 0):
                    $param['v']        = 'checked="checked"';   
                    endif;

                $html_div_in.= '<h3 class="row-fluid header smaller lighter blue">
                <span class="span7">'.$res->mdl_name.'</span><!-- /span -->
                <input type="hidden" name="'.$res->id.'" />
                <span class="span5">
                <label class="pull-right inline">
                <small class="muted">Status:</small>

                <input name="v_'.$res->id.'"  '.$param['v'] .' type="checkbox" class="ace ace-switch ace-switch-5" />
                <span class="lbl"></span>
                </label>
                </span>
                </h3>';

                $id       =    $res->id;
                $submenu  =   $this->get_child($result, $id,$permission);
                $html_div_in .= $submenu;            
                $html_div_in.='</div>';            
                endif;




            endforeach;

        $html_ul .='<ul class="nav nav-tabs" id="myTab3">';  
        $html_ul .= $html_li;
        $html_ul .='</ul>';   
        $html_div.='<div class="tab-content">';   
        $html_div.=$html_div_in;   
        $html_div.='</div>';   


        #  return $menu;
        return $html_ul.$html_div;
    }
    function get_child($items, $id,$permission)
    {
        $submenu     ='';

        foreach($items as $item){

            if($item->parent_id == $id){



                if($item->controller == null && $item->ref_controller == null && $item->function == null):
                    $param = array('a'=>'','e'=>'','d'=>'','v'=>'');

                    if($permission[$item->id]['a'] != 0):
                        $param['a']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['e'] != 0):
                        $param['e']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['d'] != 0):
                        $param['d']        = 'checked="checked"';    
                        endif;
                    if($permission[$item->id]['v'] != 0):
                        $param['v']        = 'checked="checked"';   
                        endif;
                    $submenu.= '<h3 class="row-fluid header smaller lighter blue">
                    <span class="span7">'.$item->mdl_name.'</span><!-- /span -->
                    <input type="hidden" name="'.$item->id.'" />
                    <span class="span5">
                    <label class="pull-right inline">
                    <small class="muted">Status:</small>

                    <input name="v_'.$item->id.'"  '.$param['v'] .' type="checkbox" class="ace ace-switch ace-switch-5" />
                    <span class="lbl"></span>
                    </label>
                    </span>
                    </h3>'; 
                    $id       = $item->id;
                    $innersub =   $this->get_inner_child($items, $id,$permission);
                    $submenu .=$innersub;


                    elseif($item->controller != null && $item->ref_controller == null ):

                    $param = array('a'=>'','e'=>'','d'=>'','v'=>'');

                    if($permission[$item->id]['a'] != 0):
                        $param['a']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['e'] != 0):
                        $param['e']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['d'] != 0):
                        $param['d']        = 'checked="checked"';    
                        endif;
                    if($permission[$item->id]['v'] != 0):
                        $param['v']        = 'checked="checked"';   
                        endif;



                    # $this->Mdl_users->debug_r($permission,1);  
                    #     if($permission[$item->id]['a'])
                    $submenu ='<h5 class="header smaller lighter blue">
                    <span class="span5"> <small>Permissions</small>   
                    <i class="icon-double-angle-left"></i> 
                    '.$item->mdl_name.'</span><!-- /span -->

                    <span class="span5 pull-right">
                    <input type="hidden" name="'.$item->id.'" />
                    <label>
                    <input name="d_'.$item->id.'" '.$param['d'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> Delete</span>
                    </label>
                    <label>
                    <input name="e_'.$item->id.'"  '.$param['e'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> Edit</span>
                    </label>
                    <label>
                    <input name="a_'.$item->id.'" '.$param['a'].'  class="ace ace-checkbox-2" type="checkbox" />
                    <span class="lbl"> Add</span>
                    </label>
                    <label>
                    <input name="v_'.$item->id.'" '.$param['v'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> View</span>
                    </label>   

                    </span>

                    </h5>'; 

                    endif;    




                $menu_retun.= $submenu;
                $submenu = null;

            }   

        }



        if($menu_retun != null):
            return $menu_retun; 
            endif;

    }  
    function get_inner_child($items, $id,$permission)
    {

        $submenu    = null;
        $menu_retun = null;
        foreach($items as $item){

            if($item->parent_id == $id){

                if($item->controller == null && $item->ref_controller != null && $item->function != null):

                    $param = array('a'=>'','e'=>'','d'=>'','v'=>'');

                    if($permission[$item->id]['a'] != 0):
                        $param['a']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['e'] != 0):
                        $param['e']        = 'checked="checked"'; 
                        endif;
                    if($permission[$item->id]['d'] != 0):
                        $param['d']        = 'checked="checked"';    
                        endif;
                    if($permission[$item->id]['v'] != 0):
                        $param['v']        = 'checked="checked"';   
                        endif;


                    $submenu ='<h5 class="header smaller lighter blue">

                    <span class="span5"> <small>Permissions</small>   
                    <i class="icon-double-angle-left"></i> 
                    '.$item->mdl_name.'</span><!-- /span -->

                    <span class="span7 pull-right">
                    <input type="hidden" name="'.$item->id.'"/>  
                    <label>
                    <input name="d_'.$item->id.'" '.$param['d'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> Delete</span>
                    </label>
                    <label>
                    <input name="e_'.$item->id.'"  '.$param['e'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> Edit</span>
                    </label>
                    <label>
                    <input name="a_'.$item->id.'" '.$param['a'].'  class="ace ace-checkbox-2" type="checkbox" />
                    <span class="lbl"> Add</span>
                    </label>
                    <label>
                    <input name="v_'.$item->id.'" '.$param['v'].' type="checkbox" class="ace ace-checkbox-2" />
                    <span class="lbl"> View</span>
                    </label>  

                    </span>

                    </h5>'; 

                    endif;


                $menu_retun.= $submenu; 
                $submenu  = null;             
            }



        }


        if($menu_retun != null):
            return $menu_retun; 
            endif;
    }  
    public function allow_permission()
    {

        $postdata = $this->input->post();

        $userid   = $postdata['id'];
        $usertype   = 1;
        #  $this->Mdl_users->debug_r($postdata,1);
        foreach($postdata as $key => $value):  

            $param = array('a'=>0,'e'=>0,'d'=>0,'v'=>0);
            if(is_numeric($key) == true):
                if($postdata['a_'.$key] != null):
                    $param['a']        = 1; 
                    endif;
                if($postdata['e_'.$key] != null):
                    $param['e']        = 1;  
                    endif;
                if($postdata['d_'.$key] != null):
                    $param['d']        = 1;   
                    endif;
                if($postdata['v_'.$key] != null):
                    $param['v']        = 1;  
                    endif;
                $permission[$key] = $param;
                endif;

            endforeach; 

        $permission_json = json_encode($permission);
        #  $this->Mdl_users->debug_r($permission_json,0);   
        //echo "<pre>";
        //print_r($permission_json);
        //exit;
        $id  = $this->already_exists_row('admin_module_permission','userid',$userid,'id');

        # return $permission_json;
        $data = array(
            'userid'     => $userid,
            'usertype'     => $usertype,
            'permission' => $permission_json
        );
        #$this->Mdl_users->debug_r($data,0);   
        $db_command =  $this->Mdl_users->db_command($data,$id,'admin_module_permission');
        if($db_command)
        {
            if($id > 0)
            {
                $this->session->set_flashdata('update', 'your data successfully Updated');  
            }else
            {
                $this->session->set_flashdata('saved', 'your data successfully Saved');    
            }

            redirect(base_url().'Users','refresh');  
        }

    }            
    public function already_exists_row($table,$ref,$input,$return)
    {


        $this->db->select($return); 
        $this->db->where($ref ,$input); 
        $query =  $this->db->get($table);
        $count = $query->num_rows();
        if($count > 0)
        {
            $result = $query->result();

            return $result[0]->$return;  
        }else{
            return $count;  
        }


    }
    public function hierarchy_list()
    {
        // $user_type = $this->session->userdata('user_type');
        //       echo $user_type;
        //       exit;
        $userid                  =  $this->uri->segment(3);
        $admin_data_permission   = json_decode($this->already_exists_row('admin_data_permission','userid',$userid,'permission'));

        $p_country               = json_decode(json_encode($admin_data_permission->country_id), True);
        $p_city                  = json_decode(json_encode($admin_data_permission->city_id), True);


        #@@@ Country Select 


        $this->db->select('*');
        $this->db->where('is_enable',1);
        $country_list  = $this->db->get('country_list')->result();
        $count_kbnt    = 0;

        foreach($country_list as $kbnt_key => $kbnt):
            if($p_country[$kbnt->id] ==  $kbnt->id): $check = 'checked="checked"'; else: $check = null; endif;

            $count_kbnt++;
            if($count_kbnt == 1): 
                $html_li .='<li class="active">';
                $html_div_in.='<div id="__'.$kbnt->id.'" class="tab-pane in active">';
                else:
                $html_li .='<li class="">';
                $html_div_in.='<div id="__'.$kbnt->id.'" class="tab-pane ">';
                endif;

            $html_li .='<a data-toggle="tab" href="#__'.$kbnt->id.'">
            <i class="blue icon-dashboard bigger-110"></i>
            '.$kbnt->country_name.'
            </a></li>';    

            $html_div_in.= '<h3 class="row-fluid header smaller lighter blue">
            <span class="span7">'.$kbnt->title.'</span><!-- /span -->
            <input type="hidden" name="'.$res->id.'" />
            <span class="span5">
            <label class="pull-right inline">
            <small class="muted">Status:</small>

            <input name="country_id__'.$kbnt->id.'"  type="checkbox" '.$check.' country_ref="'.$kbnt->id.'"  type="checkbox" class="ace ace-switch ace-switch-5 country_id_'.$kbnt->id.'" />
            <span class="lbl"></span>
            </label>
            </span>
            </h3>';    

            $this->db->select('*');
            $this->db->where('country_id',$kbnt->id);
            $this->db->where('is_enable',1);
            $city_list  = $this->db->get('city_list')->result();

            $count_cl = 0;            
            foreach($city_list as $cl_key => $cl):
                if($p_city[$cl->id] ==  $cl->id): $check = 'checked="checked"'; else: $check = null; endif;
                $count_cl++;
                $html_div_in .='<ul style="list-style: none !important;">';

                $html_div_in .= '<div class="col-sm-4 col-xs-12">
                <li>  
                <label>
                <input name         ="city_id__'.$cl->id.'" '.$check.'  
                type        ="checkbox" 
                class       ="ace ace-checkbox-2 country_checkbox" 
                />
                <span class="lbl">  '.$cl->title.'</span>
                </label>  
                </li>
                </div>'; 
                $html_div_in .= '</ul>';   
                endforeach; 

            $html_div_in.='</div>';   
            endforeach;    
        $html_ul .='<ul class="nav nav-tabs" id="myTab3">';  
        $html_ul .= $html_li;
        $html_ul .='</ul>';   
        $html_div.='<div class="tab-content">';   
        $html_div.=$html_div_in;   
        $html_div.='</div>';    
        $return_html .= $html.'<div class="row"><div class="col-xs-12"><div class="tabbable tabs-left">'.$html_ul.$html_div.'</div></div></div>';
        $html          = null;  
        $html_ul       = null;  
        $html_li       = null;  
        $html_div_in   = null;  
        $html_div      = null;  





        #  return $menu;
        return $return_html;


    }  
    public function add_data_permission()
    {
        $postdata = $this->input->post();
        $userid   = $postdata['id'];
        #$this->Mdl_users->debug_r($postdata,1); 
        $permission  = array();

        foreach($postdata as $key => $value):  
            $key_explode = explode("__",$key);     
            if($key_explode[0] == 'country_id'):
                $permission[$key_explode[0]][$key_explode[1]] = $key_explode[1];       
                endif; 
            if($key_explode[0] == 'city_id'):
                $permission[$key_explode[0]][$key_explode[1]] = $key_explode[1];       
                endif;    
            endforeach; 

        $permission_json = json_encode($permission);
        # $this->Mdl_users->debug_r($permission_json,1);


        $id  = $this->already_exists_row('admin_data_permission','userid',$userid,'id');

        # return $permission_json;
        $data = array(
            'userid'     => $userid,
            'permission' => $permission_json
        );
        #$this->Mdl_users->debug_r($data,0);   
        $db_command =  $this->Mdl_users->db_command($data,$id,'admin_data_permission');
        if($db_command)
        {
            if($id > 0)
            {
                $this->session->set_flashdata('update', 'your data successfully Updated');  
            }else
            {
                $this->session->set_flashdata('saved', 'your data successfully Saved');    
            }

            redirect(base_url().'Users','refresh');  
        }
    } 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// error_reporting(-1);
//         ini_set('display_errors', 1);
//         error_reporting(E_ALL);
class Frontend extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->model('Mdl_frontend');
    }

    //Show Main Page
    public function index()
    {
        $this->load->view('form',$this->data);
    }

    //Register Submit
    public function form_submit()
    {
		
        $post 					= $this->input->post();		
		$ip_address   			= $this->input->ip_address();
        $data['deal_date']      = $post['deal_date'];
        $data['agent']          = $post['agent'];
        $data['manager']     	= $post['manager'];
        $data['center']       	= $post['center'];
        $data['full_name']      = $post['full_name'];
        $data['street_address'] = $post['street_address'];
        $data['states']        	= $post['states'];
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
        $data['created_date']   = date('Y-m-d H:i:s');
        $data['created_by']     = 1;
		$db_command =  $this->Mdl_frontend->db_command($data,null,'user_list');
        
		if($db_command)
        {
            for ($i=0; $i < count($post['cc_number']); $i++) { 
                $data = array(
                    'form_id'       => $db_command,
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
                $this->db->insert('cc_details', $data);
                
            }
            
             if($post['id'] != null)
            {
				$this->session->set_flashdata('saved', 'Form has been submit successfully..!');
            }
			else
            {
				$this->session->set_flashdata('saved', 'Form has been submit successfully..!');
            }
            redirect(base_url().'index.html','refresh'); 
			//$this->session->set_flashdata('error', 'Invalid email and password please try again');
        }
		else
		{
			$this->session->set_flashdata('error', 'From has not been submit..!');
			redirect(base_url().'index.html','refresh'); 
		}
    }

 
}
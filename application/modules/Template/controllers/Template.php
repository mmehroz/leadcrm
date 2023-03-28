<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller  {

    /**
    * Index Page for this controller.
    *
    * Maps to the following URL
    * 		http://example.com/index.php/welcome
    *	- or -
    * 		http://example.com/index.php/welcome/index
    *	- or -
    * Since this controller is set as the default controller in
    * config/routes.php, it's displayed at http://example.com/
    *
    * So any other public methods not prefixed with an underscore will
    * map to /index.php/welcome/<method_name>
    * @see https://codeigniter.com/user_guide/general/urls.html
    */

    function __construct()
    {
        parent::__construct();
		
        #  $this->lang->load('ur',false);

    } 

    public function index()
    {                              

    }

    public function sidebar2($usertype=NULL){
        switch ($usertype) {
            case '2':
                $menu = '
                        <ul class="nav nav-list">
                            <li class="">
                                <a href="'.base_url().'/Dashboard/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="'.base_url().'/Users/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Customer Support </span>
                                </a>
                            <ul class="submenu">
                                <li class="active">
                                    <a href="'.base_url().'/Users/createdeal">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/Users/savedeals">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/Users">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/myAccount">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>';
                break;
				case '3':
                $menu = '
                        <ul class="nav nav-list">
                            <li class="">
                                <a href="'.base_url().'/Dashboard/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="'.base_url().'/Users/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Manager </span>
                                </a>
                            <ul class="submenu">
                                <li class="active">
                                    <a href="'.base_url().'/Users/createdeal">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/Users/savedeals">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/Users">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/myAccount">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>';
                break;

            case '4':
                $menu = '
                        <ul class="nav nav-list">
                            <li class="">
                                <a href="'.base_url().'/Dashboard/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="'.base_url().'/Users/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Agent </span>
                                </a>
                            <ul class="submenu">
                                <li class="active">
                                    <a href="'.base_url().'/Users/createdeal">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/Users/savedeals">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="'.base_url().'/myAccount">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>';
                break;

            default:
                $menu = '
                        <ul class="nav nav-list">
                            <li class="">
                                <a href="'.base_url().'/Dashboard/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="'.base_url().'/Users/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Admin </span>
                                </a>
                                <ul class="submenu">
                                    <li class="active">
                                        <a href="'.base_url().'/Hierarchy/country_list">
                                            <i class="icon-dashboard"></i><span class="menu-text"> Country List </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="'.base_url().'/Hierarchy/state_list">
                                            <i class="icon-dashboard"></i><span class="menu-text"> State List </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="'.base_url().'/MyAccount/add">
                                            <i class="icon-dashboard"></i><span class="menu-text"> Create User </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="'.base_url().'/MyAccount/user_list">
                                            <i class="icon-dashboard"></i><span class="menu-text"> User List </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="'.base_url().'/myAccount">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> My Account </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="'.base_url().'/Users/">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Users </span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="'.base_url().'/Users">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> Deales Home </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>';
                break;
        }
        echo $menu;
    }

    /*public function sidebar($controller,$view)
    {     
        $_permission = json_decode($this->session->userdata('permission')); 
        $permission  = json_decode(json_encode($_permission), True); 

        //  print_r($permission);
        //         exit;      
        $this->db->select('*'); 
        $this->db->where('is_enable',1); 
        $this->db->order_by('sort_order','asc');
        $result   =  $this->db->get('admin_module_list')->result();


        $menu='';


        foreach($result as $res):

            if($res->parent_id == 0):
                if($permission[$res->id]['v'] == 1)
                {

                    if($res->controller != null && $res->ref_controller == null && $res->function == null ):

                        $menu.= '<a href="'.base_url($res->controller).'/'.$res->function.'">';
                        $menu.= '<i class="icon-dashboard"></i>';
                        $menu.= '<span class="menu-text"> '.$res->mdl_name.' </span>';
                        $menu.=' </a>';

                        elseif($res->controller == null && $res->ref_controller == null && $res->function == null ):

                        $menu.= '<a href="#" class="dropdown-toggle">';
                        $menu.= '<i class="icon-list"></i>';
                        $menu.= '<span class="menu-text"> '.$res->mdl_name.'</span>';
                        $menu.= '<b class="arrow icon-angle-down"></b>';
                        $menu.= '</a>';

                        endif;
                    $id       = $res->id;
                    $submenu  = $this->get_child($result, $id ,$controller,$view);
                    $menu    .= $submenu;


                    if($res->controller == $controller || strpos($submenu,'class="active"') !== false): 
                        $menu_retun.= '<li class="active" >'.$menu.'</li>';
                        else: 
                        $menu_retun.= '<li class="">'.$menu.'</li>';
                        endif;             
                    $menu = null;

                }
                endif;

            endforeach;



        #  return $menu;
        echo $menu_retun;
    }

    function get_child($items, $id,$controller,$view){
        $submenu      ='';

        $_permission = json_decode($this->session->userdata('permission')); 
        $permission  = json_decode(json_encode($_permission), True); 


        if($view == null): $view = 'null'; else:   $view_explode = explode('_',$view);  if($view_explode[1] == null): $view = 'null'; endif;  endif;
        foreach($items as $item){



            if($item->parent_id == $id){
                if($permission[$item->id]['v'] == 1)
                {
                    if($item->controller == null && $item->ref_controller == null && $item->function == null):

                        $submenu.= '<a href="#" class="dropdown-toggle">';
                        $submenu.= '<i class="icon-list"></i>';
                        $submenu.= '<span class="menu-text"> '.$item->mdl_name.'</span>';
                        $submenu.= '<b class="arrow icon-angle-down"></b>';
                        $submenu.=' </a>'; 
                        $id       = $item->id;
                        $innersub = $this->get_inner_child($items, $id,$controller,$view);
                        $submenu .=$innersub; 


                        elseif($item->controller != null && $item->ref_controller == null):


                        $submenu.= '<a href="'.base_url($item->controller.'/'.$item->function).'">';
                        $submenu.= '<i class="icon-dashboard"></i>';
                        $submenu.= '<span class="menu-text"> '.$item->mdl_name.' </span>';
                        $submenu.=' </a>';

                        endif;


                    if(strpos($innersub,'class="active"') !== false  || $item->controller == $controller):
                        $menu_retun.= '<li class="active" >'.$submenu.'</li>';
                        else: 
                        $menu_retun.= '<li class="">'.$submenu.'</li>';
                        endif;             
                    $submenu  = null;
                    $innersub = null;
                }      
            }   

        }



        if($menu_retun != null):
            return '<ul class="submenu">'.$menu_retun.'</ul>'; 
            endif;

    }

    public function get_inner_child($items, $id,$controller,$view)
    {

        $submenu = '';
        $menu_retun = '';
        $_permission = json_decode($this->session->userdata('permission')); 
        $permission  = json_decode(json_encode($_permission), True); 

        foreach($items as $item){

            if($item->parent_id == $id){
                if($permission[$item->id]['v'] == 1)
                {
                    if($item->controller == null && $item->ref_controller != null && $item->function != null):


                        $submenu.= '<a href="'.base_url($item->ref_controller.'/'.$item->function).'">';
                        $submenu.= '<i class="icon-dashboard"></i>';
                        $submenu.= '<span class="menu-text"> '.$item->mdl_name.' </span>';
                        $submenu.=' </a>';

                        endif;

                    if($item->function == $view ):

                        $menu_retun.= '<li class="active" >'.$submenu.'</li>'; 
                        else:
                        $menu_retun.= '<li class="" >'.$submenu.'</li>'; 
                        endif;  
                    $submenu  = null;             
                }
            }



        }


        if($menu_retun != null):
            return '<ul class="submenu">'.$menu_retun.'</ul>'; 
            endif;
    }  */

}

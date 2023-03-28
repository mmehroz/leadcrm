<?php
$controller = $this->uri->segment(1);
$view        = $this->uri->segment(2);
if($view == 'action')
{
    $view = $this->uri->segment(3); 
}

?>
<div class="sidebar " id="sidebar">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <!--<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="icon-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="icon-pencil"></i>
            </button>

            <button class="btn btn-warning">
                <i class="icon-group"></i>
            </button>

            <button class="btn btn-danger">
                <i class="icon-cogs"></i>
            </button>
        </div>-->

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- #sidebar-shortcuts -->


    <ul class="nav nav-list">
        <?php  //echo   Modules::run('Template/sidebar2',$this->session->userdata('user_type'));  
//print_r($this->session->userdata());
//SUPER ADMIN
if($this->session->userdata('user_type') == 1)
{
	?>
	<ul class="nav nav-list">
                            <li class="">
                                <a href="<?php echo base_url().'Dashboard/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/';?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Super Admin </span>
                                </a>
                                <ul class="submenu">
                                    <li class="active">
                                        <a href="<?php echo base_url().'Hierarchy/country_list'; ?>">
                                            <i class="icon-dashboard"></i><span class="menu-text"> Country List </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="<?php echo base_url().'/Hierarchy/state_list'; ?>">
                                            <i class="icon-dashboard"></i><span class="menu-text"> State List </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="<?php echo base_url().'MyAccount/add'; ?>">
                                            <i class="icon-dashboard"></i><span class="menu-text"> Create User </span>
                                        </a>
                                    </li>
									<li class="active">
                                        <a href="<?php echo base_url().'MyAccount/user_list'; ?>">
                                            <i class="icon-dashboard"></i><span class="menu-text"> User List </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo base_url().'myAccount'; ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> My Account </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Users </span>
                                </a>
                                <ul class="submenu">
                                    <li class="">
                                        <a href="<?php echo base_url().'Users' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> Deales Home </span>
                                        </a>
                                    </li>
									<li class="">
                                        <a href="<?php echo base_url().'Users/viewdeals' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> View Deales Home </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
	<?php
	
}
else //Customer Support
if($this->session->userdata('user_type') == 2)
{


		?>
 <ul class="nav nav-list">
                            <li class="">
                                <a href="<?php echo base_url().'Dashboard/'?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Customer Support </span>
                                </a>
                                <ul class="submenu">
								<li class="">
                                    <a href="<?php echo base_url().'Users/inbox_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Customer Inbox </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/sent_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Customer Sent </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/saved_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Customer Saved </span>
                                    </a>
                                </li>
								
							<?php	if($this->session->userdata('create_deal') != "")
							{	
                            ?>
							<li class="active">
                                    <a href="<?php echo base_url().'Users/createdeal'; ?>">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                            <?php }
							
							if($this->session->userdata('saved_deals') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users/savedeals'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                            <?php
							}
							
							if($this->session->userdata('deals_home') != ""){
							?>
							
							<li class="">
                                    <a href="<?php echo base_url().'Users'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                            <?php
							}
							/* if($this->session->userdata('view_deals_home') != ""){
							?>
							
							
									<li class="">
                                        <a href="<?php echo base_url().'Users/viewdeals' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> View Deales Home </span>
                                        </a>
                                    </li>
							<?php
							}	 */						
							
							if($this->session->userdata('my_account') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'myAccount'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
							<?php }
							?>
                               
                            </ul>
                        </li>
                    </ul>
<?php
}else //Manager
if($this->session->userdata('user_type') == 3)
{
?>

<ul class="nav nav-list">
                            <li class="">
                                <a href="<?php echo base_url().'Dashboard/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Manager </span>
                                </a>
                            <ul class="submenu">
							<li class="">
                                    <a href="<?php echo base_url().'Users/inbox_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Manager Inbox </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/sent_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Manager Sent </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/saved_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Manager Saved </span>
                                    </a>
                                </li>
							<?php	if($this->session->userdata('create_deal') != "")
							{	
                            ?>
							<li class="active">
                                    <a href="<?php echo base_url().'Users/createdeal'; ?>">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                            <?php }
							
							if($this->session->userdata('saved_deals') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users/savedeals'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                            <?php
							}
							
							if($this->session->userdata('deals_home') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                            <?php
							}
						/* 	if($this->session->userdata('view_deals_home') != ""){
							?>
							
							
									<li class="">
                                        <a href="<?php echo base_url().'Users/viewdeals' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> View Deales Home </span>
                                        </a>
                                    </li>
							<?php
							} */
							if($this->session->userdata('my_account') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'myAccount'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
							<?php }
							?>
                               
                            </ul>
                        </li>
                    </ul>


<?php
}
else //Agent
if($this->session->userdata('user_type') == 4)
{
?>
 <ul class="nav nav-list">
                            <li class="">
                                <a href="<?php echo base_url().'Dashboard/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Agent </span>
                                </a>
                          <ul class="submenu">
						        <li class="">
                                    <a href="<?php echo base_url().'Users/inbox_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Agent Inbox </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/sent_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Agent Sent </span>
                                    </a>
                                </li>
									<li class="">
                                    <a href="<?php echo base_url().'Users/saved_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Agent Saved </span>
                                    </a>
                                </li>
								<!--<li class="">
                                    <a href="<?php //echo base_url().'Users/saved_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Agent Saved </span>
                                    </a>
                                </li>-->
							<?php	if($this->session->userdata('create_deal') != "")
							{	
                            ?>
							<li class="active">
                                    <a href="<?php echo base_url().'Users/createdeal'; ?>">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                            <?php }
							
							if($this->session->userdata('saved_deals') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users/savedeals'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                            <?php
							}
							
							if($this->session->userdata('deals_home') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                            <?php
							}
						/* 	if($this->session->userdata('view_deals_home') != ""){
							?>
							
							
									<li class="">
                                        <a href="<?php echo base_url().'Users/viewdeals' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> View Deales Home </span>
                                        </a>
                                    </li>
							<?php
							} */
							if($this->session->userdata('my_account') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'myAccount'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
							<?php }
							?>
                               
                            </ul>
						</li>
                    </ul>
<?php
}else //Admin
if($this->session->userdata('user_type') == 5)
{
?>
 <ul class="nav nav-list">
                            <li class="">
                                <a href="<?php echo base_url().'Dashboard/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Dashboard </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url().'Users/'; ?>">
                                    <i class="icon-dashboard"></i>
                                    <span class="menu-text"> Admin </span>
                                </a>
                          <ul class="submenu">
						  <li class="">
                                    <a href="<?php echo base_url().'Users/inbox_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Admin Inbox </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/sent_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Admin Sent </span>
                                    </a>
                                </li>
								<li class="">
                                    <a href="<?php echo base_url().'Users/saved_list'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Admin Saved </span>
                                    </a>
                                </li>
							<?php	if($this->session->userdata('create_deal') != "")
							{	
                            ?>
							<li class="active">
                                    <a href="<?php echo base_url().'Users/createdeal'; ?>">
                                        <i class="icon-dashboard"></i><span class="menu-text"> Create Deal </span>
                                    </a>
                                </li>
                            <?php }
							
							if($this->session->userdata('saved_deals') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users/savedeals'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Saved Deales </span>
                                    </a>
                                </li>
                            <?php
							}
							
							if($this->session->userdata('deals_home') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'Users'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> Deals Home </span>
                                    </a>
                                </li>
                            <?php
							}
						/* 	if($this->session->userdata('view_deals_home') != ""){
							?>
							
							
									<li class="">
                                        <a href="<?php echo base_url().'Users/viewdeals' ?>">
                                            <i class="icon-dashboard"></i>
                                            <span class="menu-text"> View Deales Home </span>
                                        </a>
                                    </li>
							<?php
							} */
							if($this->session->userdata('my_account') != ""){
							?>
							<li class="">
                                    <a href="<?php echo base_url().'myAccount'; ?>">
                                        <i class="icon-dashboard"></i>
                                        <span class="menu-text"> My Account </span>
                                    </a>
                                </li>
							<?php }
							?>
                               
                            </ul>
						</li>
                    </ul>
<?php
}
?>

    </ul><!-- /.nav-list -->

    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>

    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>

<div class="main-content">
<?php 
if($result_set){$row = $result_set;} 
$id = $this->uri->segment(3);
$user_type = $this->session->userdata('user_type');
//$country_id = $this->session->userdata('country_id');
$load              = $this->Mdl_hierarchy;
//$state_dd  = $this->Mdl_myaccount->state_list(166);
// $markaz_dd         = Modules::run('Hierarchy/markaz_dd');
///print_r($result_set);
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Account Management
            <small>
                <i class="icon-double-angle-right"></i>
                My Account
            </small> 


        </h1>
    </div><!-- /.page-header -->
    <?php
    if($this->session->flashdata())
    {
        foreach($this->session->flashdata() as $key => $value):
            if($key == 'update' || $key == 'saved')
            {
                $alert_class = 'alert-success';
            }else
            {
                $alert_class = 'alert-danger';
            }
            ?>
            <div class="alert alert-block <?php echo $alert_class; ?>">
                <button type="button" class="close" data-dismiss="alert">
                    <i class="icon-remove"></i>
                </button>

                <p>
                    <strong>
                        <i class="icon-ok"></i>
                        <?php echo ucwords(strtolower($key)); ?> !
                    </strong>
                    <?php echo $value; ?>

                </p>


            </div>
        <?php
        endforeach;
    }  ?>


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php
            $attributes = array(  
                'class' => 'form-horizontal form-validate', 
                'id'    => 'register-form', 
                'role'  => 'form'
            );
            echo form_open(base_url('MyAccount/add_user'), $attributes);
            ?>

            <div class="space-2"></div>     
           <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Center:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" id="center"
                                   name="center" placeholder="Center"
                                   class="col-xs-12 col-sm-6 required-field" value="<?php echo $row[0]->center; ?>"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">User Name:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" id="username"
                                   name="username" placeholder="User name"
                                   class="col-xs-12 col-sm-6 required-field" value="<?php echo $row[0]->username; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Email:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="email" id="email" name="email"
                                   placeholder="example@example.com" value="<?php echo $row[0]->email; ?>" class="col-xs-12 col-sm-6 required-field"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Mobile No:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="text" id="mobile_no" name="mobile_no"
                                   placeholder="9999-999999999" value="<?php echo $row[0]->mobile_no; ?>" class="col-xs-12 col-sm-6 required-field"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
<div class="space-2"></div>
                    <?php if ($id != null) { ?>
                       <!-- <div class="form-group">
                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Change
                                Password:</label>

                            <div class="col-xs-12 col-sm-9">
                                <div class="clearfix">
                                    <label class=" inline">
                                        <input id="changepassword" name="changepassword" type="checkbox" value="0"
                                               class="ace ace-switch ace-switch-5"/>
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="space-2"></div>-->
 <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" id="password" name="password" placeholder="Password" class="col-xs-12 col-sm-6"/>
                            <input type="hidden" value="<?php echo $row[0]->password; ?>" id="old_password" name="old_password" placeholder="Password" class="col-xs-12 col-sm-6"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Confirm
                        Password:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" id="retypepassword" name="retypepassword" placeholder="Confirm Password" class="col-xs-12 col-sm-6"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
                    <?php }else{ ?>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" id="password" name="password" placeholder="Password" class="col-xs-12 col-sm-6"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Confirm
                        Password:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <input type="password" id="retypepassword" name="retypepassword" placeholder="Confirm Password" class="col-xs-12 col-sm-6"/>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>
<?php
					}
?>
                    <h4>System Access</h4> <hr>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">User Type:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <select class="col-xs-12 col-sm-6 required-field" name="type">
                                <option value="">--Select--</option>
                                <option <?php if($row[0]->user_type == 4){ echo "selected"; }?> value="4">Agent</option>
                                <option <?php if($row[0]->user_type == 3){ echo "selected"; }?> value="3">Manager</option>
								
                                <option <?php if($row[0]->user_type == 2){ echo "selected"; }?> value="2">Customer Support</option>
								<option <?php if($row[0]->user_type == 5){ echo "selected"; }?> value="5">Admin</option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <div class="form-group">
                    <div class="control-label col-xs-12 col-sm-2 no-padding-right"></div>

                    <div class="col-xs-12 col-sm-10">
                        <div class="clearfix">
						
							<h2>Deal Form Permission</h2>
						
                            <input type="checkbox" value="edit_deal" <?php if($row[0]->edit_deal != ""){ echo "checked"; }?> name="edit_deal">Edit Deal Sheet
                            &nbsp;&nbsp;
                            <input type="checkbox" value="view_pdf" <?php if($row[0]->view_pdf != ""){ echo "checked"; }?> name="view_pdf">View PDF
                            &nbsp;&nbsp;
                            <input type="checkbox" name="download_pdf" <?php if($row[0]->download_pdf != ""){ echo "checked"; }?> value="download_pdf">Download PDF
                            &nbsp;&nbsp;
                            <input type="checkbox" name="update_fee" <?php if($row[0]->update_fee != ""){ echo "checked"; }?> value="update_fee">Can Update Fee Status
                            &nbsp;&nbsp;
                            <input type="checkbox" name="update_deal" <?php if($row[0]->update_deal != ""){ echo "checked"; }?> value="update_deal">Can Update Deal Status
                        	&nbsp;&nbsp;
							  <input type="checkbox" value="view_deal_comment" <?php if($row[0]->view_deal_comment != ""){ echo "checked"; }?> name="view_deal_comment"> Can View Deal Comment
                            &nbsp;&nbsp;
							  <input type="checkbox" value="edit_deal_comment" <?php if($row[0]->edit_deal_comment != ""){ echo "checked"; }?> name="edit_deal_comment"> Can Update Deal Comment
                            &nbsp;&nbsp;
							
							<br/>
							<h2>Saved Form Permission</h2>
                            <input type="checkbox" name="update_saved_deal" <?php if($row[0]->update_saved_deal != ""){ echo "checked"; }?> value="update_saved_deal">Edit Saved Deal
							
                            &nbsp;&nbsp;
                            <input type="checkbox" name="view_saved_pdf" <?php if($row[0]->view_saved_pdf != ""){ echo "checked"; }?> value="view_saved_pdf">View Pdf
						
                            &nbsp;&nbsp;
							<br/>
							
							
							<h2>Sidebar Permission</h2>
                            <input type="checkbox" name="create_deal" <?php if($row[0]->create_deal != ""){ echo "checked"; }?> value="create_deal">Create Deal
							
                            &nbsp;&nbsp;
                            <input type="checkbox" name="saved_deals" <?php if($row[0]->saved_deals != ""){ echo "checked"; }?> value="saved_deals">Saved Deals
						
                            &nbsp;&nbsp;
						    <input type="checkbox" name="deals_home" <?php if($row[0]->deals_home != ""){ echo "checked"; }?> value="deals_home">Deals Home
						   
						    &nbsp;&nbsp;
						    <input type="checkbox" name="view_deals_home" <?php if($row[0]->view_deals_home != ""){ echo "checked"; }?> value="view_deals_home">View Deals Home
						
                            &nbsp;&nbsp;
						    <input type="checkbox" name="my_account" <?php if($row[0]->my_account != ""){ echo "checked"; }?> value="my_account">My Account
						
                            &nbsp;&nbsp;
							<br/>
						
						</div>
                    </div>
                </div>
                <div class="space-2"></div>

               <div class="clearfix form-actions">
                    <div class="col-md-offset-6 col-md-3">
                        <button class="btn btn-info btn-validate" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Process
                        </button>

                        <!--         &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                        <i class="icon-undo bigger-110"></i>
                        Reset
                        </button>-->
                    </div>
                </div>



            <?php echo form_close();  ?>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->




</div>
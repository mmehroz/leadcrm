<?php 
if($result_set){$row = $result_set;} 
$id = $this->uri->segment(3);
$user_type = $this->session->userdata('user_type');
$country_id = $this->session->userdata('country_id');
$load              = $this->Mdl_hierarchy;
$country_dd = $this->Mdl_Account->country_list();
$data_array = array(
    'country' => $row[0]->country,
    'code' => $row[0]->region
);
$region_name = $this->Mdl_Account->get_relation_pax_data_array('regions','name',$data_array);
$city_name = $this->Mdl_Account->get_relation_pax_new('cities','name','ID',$row[0]->city);
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Users Management
            <small>
                <i class="icon-double-angle-right"></i>
                Users
            </small> 
            <a href="<?php echo base_url('Account/account_list'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">List View</a>

        </h1>
    </div><!-- /.page-header -->



    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php
            $attributes = array(  
                'class' => 'form-horizontal form-validate', 
                'id'    => 'register-form', 
                'role'  => 'form'
            );
            echo form_open(base_url('Account/command'), $attributes);
            ?>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">





            <div class="space-2"></div>     
            <?php //if($this->session->userdata('user_type') == 1):?>
            <!--<div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Markaz Name:</label>
            <div class="col-xs-12 col-sm-9">
            <div class="clearfix">

            <?php
            /* echo form_dropdown(
            'markaz_id',
            $markaz_dd,$row[0]->markaz_id,
            'class  ="col-xs-12 col-sm-6 required-field "
            id     ="markaz_id" placeholder="Markaz"'); */
            ?>

            </div>
            </div>
            </div>
            <div class="space-2"></div>-->
            <?php //endif;?>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Full Name:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" old-username="<?php echo $row[0]->name; ?>" id="name" value="<?php echo $row[0]->name; ?>" name="name" placeholder="Full name" class="col-xs-12 col-sm-6 required-field" />
                    </div>
                </div>
            </div>
            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Email:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="email" id="email" value="<?php echo $row[0]->email; ?>" name="email" placeholder="example@example.com" class="col-xs-12 col-sm-6 required-field" />
                    </div>
                </div>
            </div>
            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Contact:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" id="contact" value="<?php echo $row[0]->contact; ?>" name="contact" placeholder="9999-999999999" class="col-xs-12 col-sm-6 required-field" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Address:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <textarea name="address" class="col-xs-12 col-sm-6 required-field " cols="3" rows="3"><?php echo $row[0]->address; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Gender:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select name="gender" id="gender" class="col-xs-12 col-sm-6 required-field ">
                            <option value="" >Select Gender</option>
                            <option value="Male" <?php if($row[0]->gender == "Male"){ echo "selected"; }?>>Male</option>
                            <option value="Female" <?php if($row[0]->gender == "Female"){ echo "selected"; }?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Country:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">

                        <?php
                        echo form_dropdown(
                            'country_id',
                            $country_dd,$row[0]->country,
                            'class  ="col-xs-12 col-sm-6 required-field state_get"
                            id     ="country_id" placeholder="Country"');
                        ?>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">State:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select name="state_id" id="state_id" placeholder="State"  class="col-xs-12 col-sm-6 required-field state_id city_get" >
                          <option value="<?php echo $row[0]->region; ?>"><?php echo $region_name; ?></option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">City:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">

                        <select name="city_id" id="city_id" placeholder="City"   class="col-xs-12 col-sm-6 required-field city_id">
                            <option value="<?php echo $row[0]->city; ?>"><?php echo $city_name; ?></option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="space-2"></div>
            <?php if($id != null){ ?>
                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Change Password:</label>
                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
                            <label class=" inline">
                                <input id="changepassword" name="changepassword" type="checkbox" value="0" class="ace ace-switch ace-switch-5" />
                                <span class="lbl"></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>

                <?php } ?>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" <?php if($id != null){echo 'disabled="disabled"';} ?> id="password" name="password" placeholder="Password" class="col-xs-12 col-sm-6" />
                    </div>
                </div>
            </div>
            <div class="space-2"></div>

            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Confirm Password:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="password" id="retypepassword" <?php if($id != null){echo 'disabled="disabled"';} ?> name="retypepassword" placeholder="Confirm Password" class="col-xs-12 col-sm-6" />
                    </div>
                </div>
            </div>
            <div class="space-2"></div>

            <!--<div class="form-group">
            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Is Print:</label>
            <div class="col-xs-12 col-sm-9">
            <div class="clearfix">
            <label class=" inline">
            <input id="is_print" name="is_print"  <?php if($row[0]->is_print == 0){ echo 'value="0" ';}else{echo 'value="1" checked="checked"';}  ?>    type="checkbox" class="ace ace-switch ace-switch-5 is_print" />
            <span class="lbl"></span>
            </label>
            </div>
            </div>
            </div>-->

            <div class="space-2"></div>
            <div class="form-group">
                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Active:</label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <label class=" inline">
                            <input id="status" name="status"  <?php if($row[0]->is_enable == 0){ echo 'value="0" ';}else{echo 'value="1" checked="checked"';}  ?>    type="checkbox" class="ace ace-switch ace-switch-5 status" />
                            <span class="lbl"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="space-2"></div>


            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
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
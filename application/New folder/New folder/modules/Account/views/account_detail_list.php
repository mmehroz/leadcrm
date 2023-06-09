<div class="page-content">
    <div class="page-header">
        <h1>
            Account Management
            <small>
                <i class="icon-double-angle-right"></i>
                User Account Detail
            </small>
            <a href="<?php echo base_url('Account/account_list'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">List View</a>
            <i class="icon-spinner icon-spin orange bigger-125 hide"></i>
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


            <div class="row">
                <div class="col-xs-6">



                    <div class="table-responsive">
                        <table id="" class="table table-striped table-bordered table-hover">
                            <tr><th colspan="2" style="background-color: #307ecc;color: #fff;"> User Account Detail</th></tr>
                            <tbody>
                            <?php foreach($result_set as $key => $row)
                            { ?>

                                <tr>
                                    <th>Full Name</th>
                                    <td><?php echo $row->name;?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $row->email;?></td>
                                </tr>
                                
                                <tr>
                                    <th>Contact</th>
                                    <td><?php echo $row->contact;?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $row->address;?></td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td><?php echo $row->gender;?></td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td><?php
                                        $country_name = $this->Mdl_Account->get_relation_pax_new('countries','name','code',$row->country);
                                        echo $country_name;
                                        ?></td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td><?php
                                        $data_array = array(
                                            'country' => $row->country,
                                            'code' => $row->region
                                        );
                                        $region_name = $this->Mdl_Account->get_relation_pax_data_array('regions','name',$data_array);
                                        echo $region_name;
                                        ?></td>
                                </tr>
                               
                                <tr>
                                    <th>City</th>
                                    <td><?php
                                        $city_name = $this->Mdl_Account->get_relation_pax_new('cities','name','ID',$row->city);
                                        echo $city_name;
                                        ?></td>
                                </tr>
                              
                                <tr>
                                    <th>Status</th>
                                    <td><?php //echo $row->is_enable;

                                        if($row->is_enable == 1)
                                        {
                                            echo '<span class="btn btn-success btn-sm" style="padding:0px 10px;" title="Active">Active</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="btn btn-danger btn-sm" title="Un-Active" style="padding:0px 10px;">Un-Active</span>';
                                        }
                                        ?>
                                    </td>
                                </tr>



                            <?php } ?>




                            </tbody>
                        </table>
                    </div>
                    <!-- Modal Person Add -->
                    <div id="personDetail" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="border-bottom:1px solid #ccc !important;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">User Detail</h4>
                                </div>
                                <div class="modal-body" style="padding-top: 10px !important;">
                                    <div class="show_account_detail"></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-info btn-validate"  data-dismiss="modal" type="button">
                                        <i class="icon-ok bigger-110"></i>
                                        Close
                                    </button>


                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>


</div>



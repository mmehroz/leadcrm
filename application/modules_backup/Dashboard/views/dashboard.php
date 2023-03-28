<div class="page-content">
    <div class="page-header">
        <h1>
            Dashboard
            <small>
                <i class="icon-double-angle-right"></i>
                Dashboard
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
    <?php
    //Seller Account Not Active
  /*   if($this->session->userdata('admin_status') == 0 && $this->session->userdata('user_type') == 'seller')
    {
        ?>
    <div class="row">
        <div class="col-xs-12">
            <h2>Account Not Active</h2>
            <p>Your account is not active.</p>
            <p><a class="btn btn-success" style="padding:0px 10px;" href="<?php echo base_url(); ?>Dashboard/seller_resend_email" title="Active">Resend Email</a></p>

        </div>
    </div>
    <?php

    }else { 
        ?>
        <div class="row">
            <div class="col-xs-6">

                <!-- PAGE CONTENT BEGINS -->
                <div class="widget-box" style="opacity: 1;">
                    <div class="widget-header header-color-blue2">
                        <h5 class="bigger lighter">
                            <i class="icon-table"></i>
                            User Information
                        </h5>


                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thin-border-bottom">
                                <tr>
                                    <th>
                                        <i class="icon-user"></i>
                                        User
                                    </th>

                                    <th>
                                        <i>@</i>
                                        Email
                                    </th>
                                    <th class="hidden-480">Status</th>
                                </tr>
                                </thead>

                                <tbody>

                                <?php
                                foreach ($result_set_user as $key => $row) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->email; ?></td>


                                        <td>
                                            <?php
                                            if ($row->is_enable == 0) {
                                                echo '<span class="btn btn-danger btn-sm" title="Un-Active" style="padding:0px 10px;">Un-Active</span>';
                                            } else if ($row->is_enable == 1) {

                                                echo '<span class="btn btn-success btn-sm" style="padding:0px 10px;" title="Active">Active</span>';
                                            }

                                            ?>

                                        </td>
                                    </tr>



                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">


                        <a href="<?php echo base_url(); ?>Account/account_list"
                           class="btn btn-xs btn-success pull-right">
                            <span class="bigger-110">View All</span>

                            <i class="icon-arrow-right icon-on-right"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-xs-6">
                <!-- PAGE CONTENT BEGINS -->
                <div class="widget-box" style="opacity: 1;">
                    <div class="widget-header header-color-blue2">
                        <h5 class="bigger lighter">
                            <i class="icon-table"></i>
                            Order Information
                        </h5>


                    </div>

                    <div class="widget-body">
                        <div class="widget-main no-padding">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thin-border-bottom">
                                <tr>
                                    <th>Order Date</th>

                                    <th>Total Price</th>

                                    <th>Final Date</th>
                                    <th>Order Number</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Order Slip</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                //print_r($result_set);
                                foreach ($result_set_order as $key => $row) {
                                    ?>

                                    <tr>
                                        <td><?php echo $row->order_date; ?></td>


                                        <td><?php echo $row->order_price_total; ?></td>

                                        <td><?php echo $row->final_date; ?></td>
                                        <td><?php echo $row->order_track; ?></td>


                                        <td>
                                            <?php
											if($row->verify_order != "")
											{
												 echo '<span class="btn btn-warning btn-sm" title="Not Confirm" style="padding:0px 10px;">Not Confirm</span>';
											}
											else
											{
											
                                            if ($row->order_status == "complete") {
                                                echo '<span class="btn btn-success btn-sm" style="padding:0px 10px;" title="Complete">Complete</span>';
                                            } else if ($row->order_status == "pending") {
                                                echo '<span class="btn btn-danger btn-sm" title="Pending" style="padding:0px 10px;">Pending</span>';
                                            } else if ($row->order_status == "dispatch") {
                                                echo '<span class="btn btn-sm" title="Dispatch" style="padding:0px 10px;">Dispatch</span>';
                                            } else if ($row->order_status == "process") {
                                                echo '<span class="btn btn-primary btn-sm" title="Process" style="padding:0px 10px;">Process</span>';
                                            } else if ($row->order_status == "cancel") {
                                                echo '<span class="btn btn-warning btn-sm" title="Cancel" style="padding:0px 10px;">Cancel</span>';
                                            }
											}

                                            ?>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a target="_blank"
                                                   href="<?php echo base_url('Account/view_order_list/' . $row->order_track . ''); ?>"
                                                <i class="icon-eye-open bigger-120"></i>

                                                </a>
                                            </div>


                                        </td>
										
										<td>
                                            <div class="action-buttons">
                                                <a target="_blank"
                                                   href="<?php echo base_url('Account/view_order_slip/' . $row->order_track . ''); ?>"
                                                <i class="icon-eye-open bigger-120"></i>

                                                </a>
                                            </div>


                                        </td>

                                    </tr>


                                <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="widget-toolbox padding-8 clearfix">


                        <a href="<?php echo base_url(); ?>Account/order_list" class="btn btn-xs btn-success pull-right">
                            <span class="bigger-110">View All</span>

                            <i class="icon-arrow-right icon-on-right"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    <?php

    } */
    ?>

</div>



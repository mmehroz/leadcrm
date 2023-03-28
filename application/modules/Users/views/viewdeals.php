<div class="page-content">
    <div class="page-header">
        <h1>
            Users Management
            <small>
                <i class="icon-double-angle-right"></i>
                Users
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


            <div class="row">
                <div class="col-xs-12">

                    <div class="table-header">
                        Results for View Deals Form
                        <!--<a href="<?php echo base_url('Users/action'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">Add New </a>-->
                    </div>

                    <div class="table-responsive">
                        <table id="deal_form_view" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Agent</th>
                                    <th>Manager</th>
                                    <th>Center</th>
                                    <th>Deal#</th>
                                    <th>Fee</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($result_set as $key => $row) { ?>

                                    <tr>
                                        <td><?php echo date('M d, Y', strtotime($row->deal_date));?></td>
                                        <td><?php echo $row->full_name;?></td>
                                        <td><?php echo $row->agent;?></td>
                                        <td><?php echo $row->manager;?></td>
                                        <td><?php echo $row->center;?></td>
                                        <td><?php echo $row->id1;?></td>
                                        <td><?php echo $row->total1;?></td>
                                        <td><?php echo $row->deal_type; ?></td>
                                     </tr>


                                    <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>


<script>
function update_dealstatus(val, id){
    var base_url = '<?php echo base_url();?>';
    $.ajax({
        type: "POST",
        url: base_url+"Users/update_status/deal_status",
        data: {value:val, id: id},
        success: function(data){
            $("#flashmsg").html(data);
            
        }
    });
}

function update_feestatus(val, id){
    var base_url = '<?php echo base_url();?>';
    $.ajax({
        type: "POST",
        url: base_url+"Users/update_status/fee_status",
        data: {value:val, id: id},
        success: function(data){
            $("#flashmsg").html(data);
            
        }
    });
}
</script>
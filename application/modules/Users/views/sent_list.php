<div class="page-content">
    <div class="page-header">
        <h1>
            Send Management
            <small>
                <i class="icon-double-angle-right"></i>
                Send Form
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
                        Results for Send Form
                        <!--<a href="<?php echo base_url('Users/action'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">Add New </a>-->
                    </div>

                    <div class="table-responsive">
                        <table id="sent_form" class="table table-striped table-bordered table-hover">
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
			
                                    
                                    <th>PDF</th>
									
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
								//echo "<pre>";
								//print_r($result_set);
								foreach($result_set as $key => $row) { ?>

                                    <tr>
                                        <td><?php echo date('M d, Y', strtotime($row->deal_date));?></td>
                                        <td><?php echo $row->full_name;?></td>
                                        <td><?php echo $row->agent;?></td>
                                        <td><?php echo $row->manager;?></td>
                                        <td><?php echo $row->center;?></td>
                                        <td><?php echo $row->id1;?></td>
                                    <td><?php if($row->total1 != ""){ echo "$".$row->total1; };?></td>
                                        <td><?php 
										    if($row->isAgent == 1)
											{
												echo "Agent";
											}
											if($row->isManager == 1)
											{
												echo "Manager";
											}
											 if($row->isCustomer == 1)
											{
												echo "Customer";
											}
											 if($row->isAdmin == 1)
											{
												echo "Admin";
											}
											 if($row->isFinal == 1)
											{
												echo "Final";
											}
											
										
										
										?></td>
                                  
									  <?php                       
										
                                        if($this->session->userdata('view_pdf') != ""){
										?>
                                        <td>
                                        <a class="green" target="_blank" href="<?php echo base_url('Users/downloadPDF/'.$row->id.''); ?>">
                                                    <i class="icon-file"></i>
                                                </a>
                                        </td>
										<?php
										}
										?>
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

function update_dealstatus1(val, id){
    var base_url = '<?php echo base_url();?>';
    $.ajax({
        type: "POST",
        url: base_url+"Users/update_status/deal_type",
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
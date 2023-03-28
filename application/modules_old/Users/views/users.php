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
                        Results for Deals Form
                        <!--<a href="<?php echo base_url('Users/action'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">Add New </a>-->
                    </div>

                    <div class="table-responsive">
                        <table id="deal_form" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Agent</th>
                                    <th>Manager</th>
                                    <th>Center</th>
                                    <th>Deal#</th>
                                    <th>Fee</th>
							
									
								
                                    <?php
									if($this->session->userdata('update_deal') != ""){
                                    ?>
                                    <th>D Status</th>
                                    <?php } ?>
									
                                        <?php  
										
                                        if($this->session->userdata('update_fee') != ""){
										?>
                                    <th>Fee Status</th>
									<?php
										}
									
										
                                        if($this->session->userdata('view_pdf') != ""){
										?>
                                    <th>PDF</th>
									<?php
										}
									?>
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
                                
			
										
                                        <?php 
                                        if($this->session->userdata('update_deal') != ""){ ?>
                                        <td>
                <select name="status" onchange="update_dealstatus(this.value, <?= $row->id; ?>)">
                    <option value="">--Select--</option>
                    <option value="To Manager" <?= $row->deal_status == 'To Manager' ? 'selected' : '' ?>>To Manager</option>
                    <option value="With Manager" <?= $row->deal_status == 'With Manager' ? 'selected' : '' ?>>With Manager</option>
                    <option value="To CS" <?= $row->deal_status == 'To CS' ? 'selected' : '' ?> >To CS</option>
                    <option value="With CS" <?= $row->deal_status == 'With CS' ? 'selected' : '' ?> >With CS</option>
                    <option value="To Admin" <?= $row->deal_status == 'To Admin' ? 'selected' : '' ?> >To Admin</option>
                    <option value="With Admin" <?= $row->deal_status == 'With Admin' ? 'selected' : '' ?> >With Admin</option>
                </select>
                                        </td>
										<?php
										}
										
                                        if($this->session->userdata('update_fee') != ""){
										?>
                                        <td>
                  <select name="status" onchange="update_feestatus(this.value, <?= $row->id; ?>)">
				 <option value="">--Select--</option>
                    <option value="Pending" <?= $row->fee_status == 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Final" <?= $row->fee_status == 'Final' ? 'selected' : '' ?>>Final</option>
                    <option value="Captured" <?= $row->fee_status == 'Captured' ? 'selected' : '' ?> >Captured</option>
                    <option value="Void" <?= $row->fee_status == 'Void' ? 'selected' : '' ?> >Void</option>
                    <option value="Cancel" <?= $row->fee_status == 'Cancel' ? 'selected' : '' ?> >Cancel</option>
                    <option value="Refund" <?= $row->fee_status == 'Refund' ? 'selected' : '' ?> >Refund</option>
                    <option value="Chargeback" <?= $row->fee_status == 'Chargeback' ? 'selected' : '' ?> >Chargeback</option>
                    <option value="Error" <?= $row->fee_status == 'Error' ? 'selected' : '' ?> >Error</option>
                </select>
                                        </td>
                                        <?php }
                                     
										
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
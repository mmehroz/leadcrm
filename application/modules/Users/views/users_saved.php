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
                        Results for Saved Deals Form
                        <!--<a href="<?php echo base_url('Users/action'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">Add New </a>-->
                    </div>

                    <div class="table-responsive">
                        <table id="saved_form" class="table table-striped table-bordered table-hover">
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
									
                                    if($this->session->userdata('update_saved_deal') != ""){
                                    ?>
                                    <th>Edit</th>
                                    <?php } ?>
									
                                        <?php  
										
                                        if($this->session->userdata('view_saved_pdf') != ""){
										?>
                                    <th>PDF</th>
									<?php
										}
									?>
									 <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($result_set as $key => $row) { ?>

                                    <tr >
                                        <td><?php echo date('M d, Y', strtotime($row->deal_date));?></td>
                                        <td><?php echo $row->full_name;?></td>
                                        <td><?php echo $row->agent;?></td>
                                        <td><?php echo $row->manager;?></td>
                                        <td><?php echo $row->center;?></td>
                                        <td><?php echo $row->id1;?></td>
                                       <td><?php if($row->total1 != ""){ echo "$".$row->total1; };?></td>
                                        <?php 
                                       
                                        if($this->session->userdata('update_saved_deal') != ""){
                                        ?>
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                <a class="green" href="<?php echo base_url('Users/action/'.$row->id.''); ?>">
                                                    <span class="green">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </span>
                                                </a>

                                            </div>

                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">


                                                        <li>
                                                            <a href="<?php echo base_url('Users/action/'.$row->id.''); ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                <span class="green">
                                                                    <i class="icon-edit bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <?php } 
										
                                        if($this->session->userdata('view_saved_pdf') != ""){
										?>
                                        <td>
                                        <a class="green" target="_blank" href="<?php echo base_url('Users/downloadPDF/'.$row->id.''); ?>">
                                                    <i class="icon-file"></i>
                                                </a>
                                        </td>
										<?php
										}
										?>
										<td>
										
										
                <select name="status1" onchange="update_dealstatus1(this.value, <?= $row->id; ?>)">
                    <option value="">--Send to--</option>	
					 <?php                  
					//Agent
				if($this->session->userdata('user_type') != 4)
				{
				?>   	
                           <option value="send_agent">Send to Agent</option>		
					<?php
				}
					?>	   
                           <option value="send_manager">Send to Manager</option>		
                           <option value="send_customer">Send to Customer Support</option>		
                   <option value="send_admin">Send to Admin</option>
                </select>
                                       
										
										</td>
                                  
								  
								  
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




function update_dealstatus1(val, id){
    var base_url = '<?php echo base_url();?>';
    $.ajax({
        type: "POST",
        url: base_url+"Users/update_status/deal_type",
        data: {value:val, id: id},
        success: function(data){
            $("#flashmsg").html(data);
            window.location.reload();
        }
    });
}




</script>
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
	$form_id = $this->uri->segment(3); 
	
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


 <a href="<?php echo base_url('Users/comment_list_add/'.$form_id.''); ?>" class="pull-left btn bigger-50 ws-btn-font  btn-success">Add New</a>
 <div style="clear:both;"></div>
 <br/>
                    <div class="table-header">
                        Results for Deals Form Comment
                        <!--<a href="<?php echo base_url('Users/action'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">Add New </a>-->
                    </div>

                    <div class="table-responsive">
                        <table id="comment_form" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>User</th>
                                    <th>Comment</th>
                                    <th>Date Time</th>
                                    <th>Action</th>
                                 </tr>
                            </thead>

                            <tbody>
                                <?php foreach($result_set as $key => $row) { ?>

                                    <tr>
                                        
                                        <td><?php 
										$user_name = $this->Mdl_users->get_relation_pax('login','username','id',$row->user_id);
										$account_name = $this->Mdl_users->get_relation_pax('login','account_title','id',$row->user_id);
										
										echo $user_name." (".$account_name.")";
										?></td>
                                        <td><?php echo $row->comment_detail;?></td>
                                        <td><?php echo $row->created_date;?></td>
                                     
                                        <td>
                                        <a class="green" href="<?php echo base_url('Users/comment_list_edit/'.$row->comment_id.'/'.$form_id.''); ?>">
                                                    <i class="icon-edit"></i>
                                                </a>
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
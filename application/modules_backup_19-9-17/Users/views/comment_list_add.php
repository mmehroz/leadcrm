<div class="page-content">
    <div class="page-header">
        <h1>
            Users Management
            <small>
                <i class="icon-double-angle-right"></i>
                Add Comment
            </small>
        </h1>
    </div><!-- /.page-header -->

    <?php
	$form_id = $this->uri->segment(3); 
	$id = $this->session->userdata('id');
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
            echo form_open(base_url('Users/comment_action'), $attributes);
            ?>
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $id ?>">
            <input type="hidden" name="form_id" id="form_id" value="<?php echo $form_id ?>">


                <div class="form-group">
                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Comment:</label>

                    <div class="col-xs-12 col-sm-9">
                        <div class="clearfix">
						<textarea id="comment_detail" rows="5" name="comment_detail" class="col-xs-12 col-sm-6 required-field"></textarea>
                           
                        </div>
                    </div>
                </div>
                <div class="space-2"></div>


               <div class="clearfix form-actions">
			   
			        <div class="col-md-6">
               <a href="<?php echo base_url('Users/comment_list/'.$form_id.''); ?>" class="btn pull-right">Cancel</a>
			   
			        </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-validate" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Submit
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
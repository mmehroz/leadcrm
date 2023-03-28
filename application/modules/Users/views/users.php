
<div class="page-content">
    <div class="page-header">
        <h1>
            <b>Deal Board</b>
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
        <div class="col-xs-12 col-sm-12">

            <!-- PAGE CONTENT BEGINS -->
            <?php
            $attributes = array(
                'class' => 'form-horizontal form-validate-inventory',
                'id'    => 'register-form',
                'role'  => 'form'
            );
            echo form_open_multipart(base_url('Product/product_search'), $attributes);
            ?>
            <!-- PAGE CONTENT BEGINS -->

            <div class="form-group">
                
                <div class="col-xs-12 col-sm-4">
					<label class="control-label" style="text-align:left;" for="Name">Date From:</label>                
					<br/>
					<div class="clearfix">
                            <input type="text" value="" id="date_from" name="date_from" placeholder="Date From" data-date-format="yyyy-mm-dd" class="col-xs-12 col-sm-12 date-picker" />

                        </div>
                </div>
                <div class="col-xs-12 col-sm-4">
				<label class="control-label" style="text-align:left;" for="Name">Date To:</label>                
					<br/>
					
                    <div class="clearfix">
                            <input type="text" value="" id="date_to" name="date_to" placeholder="Date To" data-date-format="yyyy-mm-dd" class="col-xs-12 col-sm-12 date-picker" />

                        </div>
                </div>
				
                <div class="col-xs-12 col-sm-4">
				<label class="control-label" style="text-align:left;" for="Name">Fee Status:</label>                
					<br/>
                    <div class="clearfix">
                        <select name="fee_status" id="fee_status" placeholder="Sub Category"  class="col-xs-10 col-sm-12 fee_status" >
                             <option value="">--Select--</option>
                    <option value="Pending">Pending</option>
                    <option value="Final">Final</option>
                    <option value="Captured">Captured</option>
                    <option value="Void">Void</option>
                    <option value="Cancel">Cancel</option>
                    <option value="Refund">Refund</option>
                    <option value="Chargeback">Chargeback</option>
                    <option value="Error" >Error</option>
                        </select>
                     </div>
                </div>
				
            </div>
           
			
			<div class="form-group">

                <div class="col-xs-12 col-sm-4">
				<label class="control-label" style="text-align:left;" for="Name">Deal Number:</label>                
					<br/>
                    <div class="clearfix">
                          <input type="text" value="" id="id1" name="id1" placeholder="Deal Number" class="col-xs-12 col-sm-12" />
                     </div>
                </div>
				
         
                <div class="col-xs-12 col-sm-4">
				<label class="control-label" style="text-align:left;" for="Name">Campaign:</label>                
					<br/>
                    <div class="clearfix">
                         <input type="text" value="" id="campaign" name="campaign" placeholder="Campaign" class="col-xs-12 col-sm-12" />
                     </div>
                </div>
                <div class="col-xs-12 col-sm-4">
				<label class="control-label" style="text-align:left;" for="Name">Name:</label>                
					<br/>
                    <div class="clearfix">
                          <input type="text" value="" id="full_name" name="full_name" placeholder="Name" class="col-xs-12 col-sm-12" />
                     </div>
                </div>
            </div>
			

            <div class="clearfix form-actions" style="text-align: center;">
                <div class="col-md-9 ">


                    <button class="btn btn-info btn-validate search_deal" name="search_deal" type="button">
                        <i class="icon-ok bigger-110"></i>
                        Search
                    </button>


                </div>
            </div>



            <?php echo form_close();  ?>

        </div><!-- /.col -->
    </div><!-- /.row -->
	
	 <div class="deal_result"></div>
	

  

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

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
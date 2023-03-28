<?php 
if($result_set){$row = $result_set;} 
$id = $this->uri->segment(3);
$user_type = $this->session->userdata('user_type');
$country_id = $this->session->userdata('country_id');
$load              = $this->Mdl_hierarchy;
// $markaz_dd         = Modules::run('Hierarchy/markaz_dd');
//print_r($row);
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Users Management
            <small>
                <i class="icon-double-angle-right"></i>
                Users
            </small> 
            <a href="<?php echo base_url('Users'); ?>" class="pull-right btn bigger-50 ws-btn-font  btn-success">List View</a>

        </h1>
    </div><!-- /.page-header -->
<style type="text/css">

* { margin: 0; padding: 0; }

html { height: 100%; font-size: 62.5% }

body { height: 100%; background-color: #ececec; font: 1.2em Verdana, Arial, Helvetica, sans-serif; }


/* ==================== Form style sheet ==================== */

form {     margin: 25px 5%;
    /* width: 80%; */
    padding-bottom: 30px; }

fieldset { margin: 0 0 22px 0; border: 1px solid #095D92; padding: 12px 17px; background-color: #DFF3FF; }
legend { font-size: 1.1em; background-color: #095D92; color: #FFFFFF; font-weight: bold; padding: 4px 8px; }

label.float {  display: block; margin: 4px 0 4px 0; clear: left; }
label { display: block; width: auto; margin: 0 0 10px 0; }
label.spam-protection { display: inline; width: auto; margin: 0; }

input.inp-text, textarea, input.choose, input.answer { border: 1px solid #909090; padding: 3px; }
input.inp-text { width: 450px; margin: 0 0 8px 0; }
textarea { width: 250px; height: 150px; margin: 0 0 12px 0; display: block; }

input.choose { margin: 0 2px 0 0; }
input.answer { width: 40px; margin: 0 0 0 10px; }
input.submit-button { float:right; font: 1.4em Georgia, "Times New Roman", Times, serif; letter-spacing: 1px; display: block; margin: 23px 0 0 0; }

form br { display: none; }

/* ==================== Form style sheet END ==================== */

.alert-success
{
	color: #468847;background-color: #dff0d8;border-color: #d6e9c6;padding: 5px 15px;border: 1px solid transparent;margin-top: 15px;width: 90%;text-align: center;margin-left: 5%;
}
.alert-danger
{
	color: #b94a48;background-color: #f2dede;border-color: #eed3d7;padding: 5px 15px;border: 1px solid transparent;margin-top: 15px;width: 90%;text-align: center;margin-left: 5%;
}
</style>

    <div class="row">
        <div class="col-xs-12">
			 <?php
            $attributes = array(  
                'class' => 'form-horizontal form-validate', 
                'id'    => 'register-form', 
                'role'  => 'form'
            );
            echo form_open(base_url('Users/command'), $attributes);
            ?>
            <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
	<h1 style="margin-bottom: 21px;text-align: center;">Update Deal Sheet</h1>
	<br/><br/>
	
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
		<!-- ============================== Fieldset 1 ============================== -->
		<fieldset>
			<legend>Deal Info</legend><br/>
			<div style="float:left;">
				<label for="input-one" class="float"><strong>Deal Date:</strong></label><br />
				<input class="inp-text" name="deal_date" id="input-one" value="<?php echo $row[0]->deal_date; ?>" type="date" size="30" /><br />

				<label for="input-two" class="float"><strong>Agent:</strong></label><br />
				<input class="inp-text" name="agent"  id="input-two" value="<?php echo $row[0]->agent; ?>" type="text" size="30" />
			</div>	
			<div style="float:right;">		
				<label for="input-one" class="float"><strong>Manager:</strong></label><br />
				<input class="inp-text" name="manager" id="input-one" value="<?php echo $row[0]->manager; ?>" type="text" size="30" /><br />

				<label for="input-two" class="float"><strong>Center:</strong></label><br />
				<input class="inp-text" name="center"  id="input-two" value="<?php echo $row[0]->center; ?>" type="text" size="30" />
			</div>	
				
		</fieldset>
		<!-- ============================== Fieldset 1 end ============================== -->


		<!-- ============================== Fieldset 2 ============================== -->
		<fieldset>
			<legend>Personal Info:</legend>
				<div style="float:left;">
				<label for="input-one" class="float"><strong>Full Name:</strong></label><br />
				<input class="inp-text" name="full_name" id="input-one" value="<?php echo $row[0]->full_name; ?>" type="text" size="30" /><br />

				<label for="input-two" class="float"><strong>Street Address:</strong></label><br />
				<input class="inp-text" name="street_address"  id="input-two" value="<?php echo $row[0]->street_address; ?>" type="text" size="30" />
				<label for="input-one" class="float"><strong>State:</strong></label><br />
				<input class="inp-text" name="states" id="input-one" type="text" value="<?php echo $row[0]->states; ?>" size="30" /><br />

				<label for="input-two" class="float"><strong>Email Address:</strong></label><br />
				<input class="inp-text" name="email_address"  id="input-two" type="email" value="<?php echo $row[0]->email_address; ?>" size="30" />
				
				<label for="input-two" class="float"><strong>Date of Birth:</strong></label><br />
				<input class="inp-text" name="dob"  id="input-two" type="date" value="<?php echo $row[0]->dob; ?>" size="30" />
			</div>	
			<div style="float:right;">		
				<div style="float:left;">
				<label for="input-one" style="width: 200px;" class="float"><strong>Home Phone:</strong></label><br />
				<input class="inp-text" name="home_phone" style="width: 200px;" id="input-one" value="<?php echo $row[0]->home_phone; ?>" type="text" size="30" /><br />
				</div>
				<div style="float:right;">
				<label for="input-two" style="width: 200px;"  class="float"><strong>Work/Mobile:</strong></label><br />
				<input class="inp-text" style="width: 200px;" name="work_mobile"  id="input-two" value="<?php echo $row[0]->work_mobile; ?>" type="text" size="30" />
				</div>
				<div style="clear:both"></div>
				<label for="input-two" class="float"><strong>City:</strong></label><br />
				<input class="inp-text" name="city"  id="input-two" type="text" value="<?php echo $row[0]->city; ?>" size="30" />
				
				<label for="input-two" class="float"><strong>Zipcode:</strong></label><br />
				<input class="inp-text" name="zipcode"  id="input-two" type="text" value="<?php echo $row[0]->zipcode; ?>" size="30" />
				
				<label for="input-two" class="float"><strong>SIN:</strong></label><br />
				<input class="inp-text" name="sins"  id="input-two" type="text" value="<?php echo $row[0]->sins; ?>" size="30" />
				
				
				<label for="input-two" class="float"><strong>MMN:</strong></label><br />
				<input class="inp-text" name="mmn"  id="input-two" type="text" value="<?php echo $row[0]->mmn; ?>" size="30" />
			</div>
		</fieldset>
		<!-- ============================== Fieldset 2 end ============================== -->


		<!-- ============================== Fieldset 3 ============================== -->
		<fieldset>
			<legend>Payment Details:</legend>
			<table class="table table-striped table-bordered table-hover">
					<tr>
						<th></th>
						<th>CC Number</th>
						<th>CVC</th>
						<th>EXP</th>
						<th>Owe</th>
						<th>Avail</th>
						<th>Int Rate</th>
						<th>Bank</th>
					</tr>
					
					<tr>
						<th style="padding-right: 15px;">Cart 1</th>
						<th><input class="inp-text" style="width:110px;" required name="cc_number1" value="<?php echo $row[0]->cc_number1; ?>" placeholder="4500-xxxx-xxxx-xx12"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;"  required name="cvc1" value="<?php echo $row[0]->cvc1; ?>" placeholder="1234"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" required name="exp1" value="<?php echo $row[0]->exp1; ?>" placeholder="June/2020"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" required name="owe1" value="<?php echo $row[0]->owe1; ?>" placeholder="$15770.00"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" required name="avail1" value="<?php echo $row[0]->avail1; ?>" placeholder="$1230.00" id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" required  name="int_rate1" value="<?php echo $row[0]->int_rate1; ?>" placeholder="19.99%"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" required name="bank1" value="<?php echo $row[0]->bank1; ?>" placeholder="BMO"  id="input-two" type="text" size="30" /></th>
					</tr>
					
					<tr>
						<th></th>
						<th>CC Number</th>
						<th>CVC</th>
						<th>EXP</th>
						<th>Owe</th>
						<th>Avail</th>
						<th>Int Rate</th>
						<th>Bank</th>
					</tr>
					
					<tr>
						<th style="padding-right: 15px;">Cart 2</th>
						<th><input class="inp-text" style="width:110px;" name="cc_number2" value="<?php echo $row[0]->cc_number2; ?>" placeholder="4500-xxxx-xxxx-xx12"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="cvc2" value="<?php echo $row[0]->cvc2; ?>" placeholder="1234"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="exp2" value="<?php echo $row[0]->exp2; ?>" placeholder="June/2020"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="owe2" value="<?php echo $row[0]->owe2; ?>" placeholder="$15770.00"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="avail2" value="<?php echo $row[0]->avail2; ?>"  placeholder="$1230.00" id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="int_rate2" value="<?php echo $row[0]->int_rate2; ?>" placeholder="19.99%"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="bank2" value="<?php echo $row[0]->bank2; ?>" placeholder="BMO"  id="input-two" type="text" size="30" /></th>
					</tr>
					
					
					<tr>
						<th></th>
						<th>CC Number</th>
						<th>CVC</th>
						<th>EXP</th>
						<th>Owe</th>
						<th>Avail</th>
						<th>Int Rate</th>
						<th>Bank</th>
					</tr>
					<tr>
						<th style="padding-right: 15px;">Cart 3</th>
						<th><input class="inp-text" style="width:110px;" name="cc_number3" value="<?php echo $row[0]->cc_number3; ?>" placeholder="4500-xxxx-xxxx-xx12"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="cvc3"  value="<?php echo $row[0]->cvc3; ?>" placeholder="1234"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="exp3" value="<?php echo $row[0]->exp3; ?>" placeholder="June/2020"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="owe3" value="<?php echo $row[0]->owe3; ?>" placeholder="$15770.00"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="avail3" value="<?php echo $row[0]->avail3; ?>" placeholder="$1230.00" id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="int_rate3" value="<?php echo $row[0]->int_rate3; ?>" placeholder="19.99%"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" name="bank3" value="<?php echo $row[0]->bank3; ?>" placeholder="BMO"  id="input-two" type="text" size="30" /></th>
					</tr>
					
			</table>
		</fieldset>
		<!-- ============================== Fieldset 3 end ============================== -->
		
		<!-- ============================== Fieldset 4 ============================== -->
		<fieldset>
			<legend>Your Item Name:</legend>
			<table class="table table-striped table-bordered table-hover">
					<tr>
						<th></th>
						<th>ID</th>
						<th>Product</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Payment Option</th>
						<th>Total</th>
					</tr>
					
					<tr>
						<th style="padding-right: 15px;">1</th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->id1; ?>" name="id1" placeholder="1234"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->product1; ?>" name="product1" placeholder="Quick book"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->qty1; ?>" name="qty1" placeholder="2"   id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->price1; ?>" name="price1" placeholder="$ 95.00"  id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->payment_option1; ?>" name="payment_option1"  placeholder="Cart 1" id="input-two" type="text" size="30" /></th>
						<th><input class="inp-text" style="width:110px;" value="<?php echo $row[0]->total1; ?>" name="total1" placeholder="$ 190.00"  id="input-two" type="text" size="30" /></th>
					</tr>
					<tr>
						<th colspan="8"><br/><br/></th>
					</tr>
					
			</table>
		</fieldset>
		<!-- ============================== Fieldset 4 end ============================== -->
		
			<!-- ============================== Fieldset 5 ============================== -->
		<fieldset>
			<legend>Notes:</legend>
			<div style="float:left;width:300px;">
			<label for="input-two" class="float"><strong>Agent Notes:</strong></label><br />
			<textarea name="agent_notes" cols="10" rows="5" title="Note or message"><?php echo $row[0]->agent_notes; ?></textarea><br />
			</div>
			<div style="float:left;width:300px;">
			<label for="input-two" class="float"><strong>Manager Notes:</strong></label><br />
			<textarea name="manager_notes" cols="10" rows="5" title="Note or message"><?php echo $row[0]->manager_notes; ?></textarea><br />
			</div>
			<div style="float:left;width:300px;">
			<label for="input-two" class="float"><strong>Customer Services Notes:</strong></label><br />
			<textarea name="customer_services_notes" cols="10" rows="5" title="Note or message"><?php echo $row[0]->customer_services_notes; ?></textarea><br />
			</div>
			
		</fieldset>
		<!-- ============================== Fieldset 5 end ============================== -->

		<p style="text-align:center;"><button class="btn btn-info btn-validate" type="submit">
                            <i class="icon-ok bigger-110"></i>
                            Updated
                        </button></p>
	</form>
<br/><br/><br/>
		
		</div>
	</div>	

</div>
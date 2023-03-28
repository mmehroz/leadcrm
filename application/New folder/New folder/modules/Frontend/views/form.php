<?php
	$this->load->view('Template/header');
?>

<style type="text/css">
body{
	background-color: #FFFFFF;
}
.panel-default>.panel-heading {
	border-color:#438eb9;
	background-color:#438eb9;
}
.panel-default>.panel-heading a{
	color:#FFFFFF;
	text-decoration: none;
}
</style>
<div class="container">
	<div class="col-md-12">
		<h1 class="text-center">Deal Sheet</h1>
	</div>
  <div class="row">
  	<div class="col-md-12">
	    <form action="<?php echo base_url(); ?>form_submit.html" method="post" class="">
	    <div class="panel panel-default">
  			<?php
		        $id = substr(uniqid(),-5);
  			?>
			<div class="panel-heading">
				<a data-toggle="collapse" data-target="#deal" href="#">Deal Info</a>
			</div>
		  	<div id="deal" class="panel-body">
		    	<div class="col-md-6">
				  
				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Deal Date</label>
				    <div class="col-md-9">
				      <input type="text" name="deal_date" class="form-control" id="dealdate" value="<?php echo $row[0]->deal_date; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Agent:</label>
				    <div class="col-md-9">
				      <input type="text" name="agent" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $row[0]->agent; ?>">
				    </div>
				  </div>

				</div>

				<div class="col-md-6">

				  <div class="form-group">
				    <label class="col-md-3 control-label">Manager: </label>
				    <div class="col-md-9">
				      <input type="text" name="manager" class="form-control" placeholder="" value="<?php echo $row[0]->manager; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">Center: </label>
				    <div class="col-md-9">
				      <input type="text" name="center" class="form-control" placeholder="" value="<?php echo $row[0]->center; ?>">
				    </div>
				  </div>

				</div>
			</div>
		</div> <!-- Panel end -->

		<div class="panel panel-default">
  
			<div class="panel-heading">
				<a data-toggle="collapse" data-target="#personal" href="#">Personal Info</a>
			</div>
		  	<div id="personal" class="panel-body">
		    	<div class="col-md-6">
				  
				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Full Name: </label>
				    <div class="col-md-9">
				      <input type="text" name="full_name" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $row[0]->full_name; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Street Address: </label>
				    <div class="col-md-9">
				      <input type="text" name="street_address" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $row[0]->street_address; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">City: </label>
				    <div class="col-md-9">
				      <select id="city" name="city" class="form-control">
				      	<option value="1">City1</option>
				      	<option value="2">City2</option>
				      	<option value="3">City3</option>
				      	<option value="4">City4</option>
				      	<option value="5">City5</option>
				      </select>
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">Zip: </label>
				    <div class="col-md-9">
				      <input type="text" name="zipcode" class="form-control" placeholder="" value="<?php echo $row[0]->zipcode; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Email: </label>
				    <div class="col-md-9">
				      <input type="email" name="email_address" class="form-control" id="inputEmail3" placeholder="" value="<?php echo $row[0]->email_address; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>
				  
				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">Date of Birth: </label>
				    <div class="col-md-9">
				      <input type="text" name="dob" class="form-control" id="dob" placeholder="" value="<?php echo $row[0]->dob; ?>">
				    </div>
				  </div>

				</div>

				<div class="col-md-6">

				  <div class="form-group form-group-sm">
				    <label class="col-md-3 control-label">Home Phone: </label>
				    <div class="col-md-9">
				      <input type="text" name="home_phone" class="form-control" placeholder="" value="<?php echo $row[0]->home_phone; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">Work Phone: </label>
				    <div class="col-md-9">
				      <input type="text" name="work_mobile" class="form-control" placeholder="" value="<?php echo $row[0]->work_mobile; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-3 control-label">State: </label>
				    <div class="col-md-9">
				      <select id="state" name="states" class="form-control">
				      	<option value="1">State1</option>
				      	<option value="2">State2</option>
				      	<option value="3">State3</option>
				      	<option value="4">State4</option>
				      	<option value="5">State5</option>
				      </select>
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">Country: </label>
				    <div class="col-md-9">
				      <select id="country" class="form-control">
				      	<option value="1">Canada</option>
				      	<option value="2">United States</option>
				      	<option value="3">United Kingdom</option>
				      	<option value="4">Austrailia</option>
				      </select>
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">Sin: </label>
				    <div class="col-md-9">
				      <input type="text" name="sins" class="form-control" placeholder="" value="<?php echo $row[0]->sins; ?>">
				    </div>
				  </div>
				  <div class="clearfix"></div>

				  <div class="form-group">
				    <label class="col-md-3 control-label">MMN: </label>
				    <div class="col-md-9">
				      <input type="text" name="mmn" class="form-control" placeholder="" value="<?php echo $row[0]->mmn; ?>">
				    </div>
				  </div>

				</div>
			</div>
		</div> <!-- Panel end -->

		<div class="panel panel-default">
  
			<div class="panel-heading">
				<a data-toggle="collapse" data-target="#payment" href="#">Payment Details</a>
			</div>
		  	<div id="payment" class="panel-body">
		  		<div class="col-md-12">
		  			<table class="table-responsive table-condensed">
		  				<thead>
			  				<tr>
			  					<th></th>
		  						<th class="col-md-2">CC Number: </th>
								<th>CVC: </th>
								<th>EXP: </th>
								<th>APR: </th>
								<th>Owe: </th>
								<th>Avail: </th>
								<th>Int Amount: </th>
								<th>Bank: </th>
			  				</tr>
		  				</thead>
		  				<tbody>
		  					<tr>
		  						<td>Card</td>
		  						<td class="col-md-2">
		  							<input type="text" maxlength="16" id="cc_number" name="cc_number" class="form-control" placeholder="" value="<?php echo $row[0]->cc_number1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="cvc" name="cvc" class="form-control" placeholder="" value="<?php echo $row[0]->cvc1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="exp" name="exp" class="form-control" placeholder="" value="<?php echo $row[0]->exp1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="apr" name="apr" class="form-control" placeholder="" value="<?php echo $row[0]->apr; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="owe" name="owe" class="form-control" placeholder="" value="<?php echo $row[0]->owe1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="avail" name="avail" class="form-control" placeholder="" value="<?php echo $row[0]->avail1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="int_rate" name="int_rate" class="form-control" placeholder="" value="<?php echo $row[0]->int_rate; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="bank" name="bank" class="form-control" placeholder="" value="<?php echo $row[0]->bank1; ?>">
		  						</td>
		  					</tr>
		  				</tbody>
		  				<thead>
			  				<tr>
			  					<th></th>
		  						<th class="col-md-2"><small>Bank Tollfree# </small></th>
								<th><small>Min Pay: </small></th>
								<th><small>Last Pay: </small></th>
								<th><small>Current Pay: </small></th>
								<th><small>Next Pay: </small></th>
								<th><small>Last Payment Date: </small></th>
								<th><small>Next Payment Date: </small></th>
								<th></th>
			  				</tr>
		  				</thead>
		  				<tbody>
		  					<tr>
		  						<td></td>
		  						<td class="col-md-2">
		  							<input type="text" id="bank_tollfree" name="bank_tollfree" class="form-control" placeholder="" value="<?php echo $row[0]->cc_number1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="min_pay" name="min_pay" class="form-control" placeholder="" value="<?php echo $row[0]->cvc1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="last_pay" name="last_pay" class="form-control" placeholder="" value="<?php echo $row[0]->exp1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="current_pay" name="current_pay" class="form-control" placeholder="" value="<?php echo $row[0]->owe1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="next_pay" name="next_pay" class="form-control" placeholder="" value="<?php echo $row[0]->avail1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="last_pay_date" name="last_pay_date" class="form-control" placeholder="" value="<?php echo $row[0]->int_rate1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" id="next_pay_date" name="next_pay_date" class="form-control" placeholder="" value="<?php echo $row[0]->bank1; ?>">
		  						</td>
		  						<td>
		  							<a href="#" id="insert" class="btn btn-primary">Add more Card</a>
		  						</td>
		  					</tr>
		  				</tbody>
		  			</table>
		  		<div id="ccinfo" class="col-md-12 hidden">
		  			<table id="cctable" class="table-responsive table-condensed">
		  			<thead>
			  				<tr>
			  					<th></th>
		  						<th class="col-md-2">CC Number: </th>
								<th>CVC: </th>
								<th>EXP: </th>
								<th>APR: </th>
								<th>Owe: </th>
								<th>Avail: </th>
								<th>Int Amount: </th>
								<th>Bank: </th>
			  				</tr>
		  				</thead>
		  				<tbody></tbody>
		  			</table>
		  				<button type="button" class="btn btn-danger btn-xs">Delete Record</button>
		  		</div>
		  		</div>
		  	</div>
		</div> <!-- Panel end -->

		<div class="panel panel-default">
  
			<div class="panel-heading">
				<a data-toggle="collapse" data-target="#item" href="#">Your Item Name</a>
			</div>
		  	<div id="item" class="panel-body">
		  		<div class="col-md-12">
		  			<table class="table-responsive table-condensed">
		  				<thead>
			  				<tr>
			  					<th></th>
		  						<th class="col-md-2">ID: </th>
								<th>Product:</th>
								<th>Qty:</th>
								<th>Price:</th>
								<th>Payment Option:</th>
								<th>Total: </th>
			  				</tr>
		  				</thead>
		  				<tbody>
		  					<tr>
		  						<td>1</td>
		  						<td class="col-md-2">
		  							<input type="text" name="id1" class="form-control" readonly value="<?php echo $id; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="product1" class="form-control" placeholder="" value="<?php echo $row[0]->product1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="qty1" id="qty1" class="form-control" placeholder="" value="<?php echo $row[0]->qty1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="price1" id="price1" class="form-control" placeholder="" value="<?php echo $row[0]->price1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="payment_option1" class="form-control" placeholder="" value="<?php echo $row[0]->payment_option1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="total1" id="total1" class="form-control" readonly value="<?php echo $row[0]->total1; ?>">
		  						</td>
		  					</tr>
		  				</tbody>
		  			</table>
		  		</div>
		  	</div>
		</div> <!-- Panel end -->

		<div class="panel panel-default">
  
			<div class="panel-heading">
				<a data-toggle="collapse" data-target="#notes" href="#">Notes</a>
			</div>
		  	<div id="notes" class="panel-body">
		  		<div class="col-md-12">
		  		<div role="tabpanel">
		  			
		  			<div class="col-md-4">
			            <!-- required for floating -->
			            <!-- Nav tabs -->
			            <ul style="margin: 0" class="nav nav-pills brand-pills nav-stacked" role="tablist">
			                <li role="presentation" class="brand-nav active"><a href="#agent" data-toggle="tab">Agent</a></li>
			                <li role="presentation" class="brand-nav"><a href="#manager" data-toggle="tab">Manager</a></li>
			                <li role="presentation" class="brand-nav"><a href="#cust" data-toggle="tab">Customer Services</a></li>
			            </ul>
			        </div>
			        <div class="col-md-8">
			            <!-- Tab panes -->
			            <div class="tab-content" style="border: 0px; padding: 0;">
			                <div role="tabpanel" class="tab-pane active" id="agent">
			                	<h4 class="text-left">Agent Notes: </h4>
			                	<textarea name="agent_notes" class="form-control"><?php echo $row[0]->agent_notes; ?></textarea>
			                </div>
			                
			                <div role="tabpanel" class="tab-pane" id="manager">
			                	<h4 class="text-left">Manager Notes: </h4>
			                	<textarea name="manager_notes" class="form-control"><?php echo $row[0]->manager_notes; ?></textarea>
			                </div>

			                <div role="tabpanel" class="tab-pane" id="cust">
			                	<h4 class="text-left">Customer Services Notes: </h4>
			                	<textarea name="customer_services_notes" class="form-control"><?php echo $row[0]->customer_services_notes; ?></textarea>
			                </div>
			            </div>
			        </div>
			    </div>
		  		</div>
		  	</div>
		</div> <!-- Panel end -->

			<div class="form-group">
			    <div class="col-md-offset-4 col-md-8">
			      <button type="submit" class="btn btn-primary">Submit</button>
			    </div>
			</div>

		</form>

	</div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function(){
	$("#qty1").on("change keyup keypress", function(){
		var total = $("#qty1").val() * $("#price1").val();
		$("#total1").val(total);
	});

	$("#price1").on("change keyup keypress", function(){
		var total = $("#qty1").val() * $("#price1").val();
		$("#total1").val(total);
	});
});
$("#insert").click(function () {
	$("#ccinfo").removeClass( "hidden" );
	$("#ccinfo input[type=text] input[type=checkbox]").addClass( "form-group" );
	$("#cctable").css("table-layout","fixed").width("100%");
	var cc_number = $("#cc_number").val();
    var cvc = $("#cvc").val();
	var exp = $("#exp").val();
	var apr = $("#apr").val();
	var owe = $("#owe").val();
	var avail = $("#avail").val();
	var int_rate = $("#int_rate").val();
	var bank = $("#bank").val();
	var bank_tollfree = $("#bank_tollfree").val();
	var min_pay = $("#min_pay").val();
	var last_pay = $("#last_pay").val();
	var current_pay = $("#current_pay").val();
	var next_pay = $("#next_pay").val();
	var last_pay_date = $("#last_pay_date").val();
	var next_pay_date = $("#next_pay_date").val();

    var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' readonly name='cc_number[]' value='" + cc_number + "'></td><td><input type='text' readonly name='cvc[]' value='" + cvc + "'></td><td><input type='text' readonly name='exp[]' value='" + exp + "'></td><td><input type='text' readonly name='apr[]' value='" + apr + "'></td><td><input type='text' readonly name='owe[]' value='" + owe + "'></td><td><input type='text' readonly name='avail[]' value='" + avail + "'></td><td><input type='text' readonly name='int_rate[]' value='" + int_rate + "'></td><td><input type='text' readonly name='bank[]' value='" + bank + "'></td><td><input type='hidden' readonly name='bank_tollfree[]' value='" + bank_tollfree + "'><input type='hidden' readonly name='min_pay[]' value='" + min_pay + "'><input type='hidden' readonly name='last_pay[]' value='" + last_pay + "'><input type='hidden' readonly name='current_pay[]' value='" + current_pay + "'><input type='hidden' readonly name='next_pay[]' value='" + next_pay + "'><input type='hidden' readonly name='last_pay_date[]' value='" + last_pay_date + "'><input type='hidden' readonly name='next_pay_date[]' value='" + next_pay_date + "'></td></tr>";
    $("#cctable tbody").append(markup);
    
});


// Find and remove selected table rows
$(".delete-row").click(function(){
    $("#cctable tbody").find('input[name="record"]').each(function(){
    	if($(this).is(":checked")){
            $(this).parents("tr").remove();
        }
    });
});


	$( function() {
	    $( "#dob" ).datepicker();
  	} );

	$( function() {
	    $( "#dealdate" ).datepicker();
  	} );


</script>
<?php
	$this->load->view('Template/footer');
?>
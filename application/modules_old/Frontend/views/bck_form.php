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
				      <select id="city" class="form-control">
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
				      <select id="state" class="form-control">
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
								<th>Owe: </th>
								<th>Avail: </th>
								<th>Int Rate: </th>
								<th>Bank: </th>
			  				</tr>
		  				</thead>
		  				<tbody>
		  					<tr>
		  						<td>Cart1</td>
		  						<td class="col-md-2">
		  							<input type="text" name="cc_number1" class="form-control" placeholder="" value="<?php echo $row[0]->cc_number1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="cvc1" class="form-control" placeholder="" value="<?php echo $row[0]->cvc1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="exp1" class="form-control" placeholder="" value="<?php echo $row[0]->exp1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="owe1" class="form-control" placeholder="" value="<?php echo $row[0]->owe1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="avail1" class="form-control" placeholder="" value="<?php echo $row[0]->avail1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="int_rate1" class="form-control" placeholder="" value="<?php echo $row[0]->int_rate1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="bank1" class="form-control" placeholder="" value="<?php echo $row[0]->bank1; ?>">
		  						</td>
		  					</tr>
		  					<tr>
		  						<td>Cart2</td>
		  						<td class="col-md-2">
		  							<input type="text" name="cc_number2" class="form-control" placeholder="" value="<?php echo $row[0]->cc_number2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="cvc2" class="form-control" placeholder="" value="<?php echo $row[0]->cvc2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="exp2" class="form-control" placeholder="" value="<?php echo $row[0]->exp2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="owe2" class="form-control" placeholder="" value="<?php echo $row[0]->owe2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="avail2" class="form-control" placeholder="" value="<?php echo $row[0]->avail2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="int_rate2" class="form-control" placeholder="" value="<?php echo $row[0]->int_rate2; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="bank2" class="form-control" placeholder="" value="<?php echo $row[0]->bank2; ?>">
		  						</td>
		  					</tr>
		  					<tr>
		  						<td>Cart3</td>
		  						<td class="col-md-2">
		  							<input type="text" name="cc_number3" class="form-control" placeholder="" value="<?php echo $row[0]->cc_number3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="cvc3" class="form-control" placeholder="" value="<?php echo $row[0]->cvc3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="exp3" class="form-control" placeholder="" value="<?php echo $row[0]->exp3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="owe3" class="form-control" placeholder="" value="<?php echo $row[0]->owe3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="avail3" class="form-control" placeholder="" value="<?php echo $row[0]->avail3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="int_rate3" class="form-control" placeholder="" value="<?php echo $row[0]->int_rate3; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="bank3" class="form-control" placeholder="" value="<?php echo $row[0]->bank3; ?>">
		  						</td>
		  					</tr>
		  				</tbody>
		  			</table>
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
		  							<input type="text" name="id1" class="form-control" placeholder="" value="<?php echo $row[0]->id1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="product1" class="form-control" placeholder="" value="<?php echo $row[0]->product1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="qty1" class="form-control" placeholder="" value="<?php echo $row[0]->qty1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="price1" class="form-control" placeholder="" value="<?php echo $row[0]->price1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="payment_option1" class="form-control" placeholder="" value="<?php echo $row[0]->payment_option1; ?>">
		  						</td>
		  						<td>
		  							<input type="text" name="total1" class="form-control" placeholder="" value="<?php echo $row[0]->total1; ?>">
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
	$( function() {
	    $( "#dob" ).datepicker();
  	} );

	$( function() {
	    $( "#dealdate" ).datepicker();
  	} );


  	 $("#insert-more").click(function () {
	     $("#cctable").each(function () {
	         var tds = '<tr>';
	         jQuery.each($('tr:last td', this), function () {
	             tds += '<td>' + $(this).html() + '</td>';
	         });
	         tds += '</tr>';
	         if ($('tbody', this).length > 0) {
	             $('tbody', this).append(tds);
	         } else {
	             $(this).append(tds);
	         }
	     });
	});
</script>
<?php
	$this->load->view('Template/footer');
?>
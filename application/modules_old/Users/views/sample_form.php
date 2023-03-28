<?php
//$this->load->view('Template/header');
//print_r($result_set);
if($result_set){$row = $result_set;} 
//if($result_set_cc){$row_cc = $result_set_cc;} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<?php
//require "pdf_style.css";
?>

</head>

<body>
    <div class="wrapper" style=" margin: 10px auto;
    padding: .2in .1in;
    min-height: 8in;
    max-width: 8in;
    min-height: 11in;
    background-color: #FFF;
    font-size: 13px;
    font-family: 'Times New Roman', Times, serif;">
        <table class="header" style="border-bottom:4px solid #438eb9; margin-top:10px; width:100%;">
            <tr class="logo" style="">
                <td style="width:100%; text-align: center;"> <h1>Deal Sheet</h1> </td> 
            </tr>
        </table>   

        <table style="width: 100%">
          <tr>
            <td style="background:#438eb9;" class="panel-heading">
              <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Deal Info:</h3> 
            </td>
          </tr>
        </table> 
      
        <table>
            <tr style="width: 100%">
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Deal Date: </strong> <?= date('M d, Y', strtotime($row[0]->deal_date)); ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Deal Manager: </strong> <?= $row[0]->manager; ?>
              </td>
            </tr>
            <tr>
             <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Agent: </strong> <?= $row[0]->agent; ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Center: </strong> <?= $row[0]->center; ?>
              </td>
            </tr>
        </table>

        <br><br><br>
        <table style="width: 100%">
          <tr>
            <td style="background:#438eb9;" class="panel-heading">
              <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Personal Info:</h3> 
            </td>
          </tr>
        </table>

        <table>
            <tr style="width: 100%">
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Full Name: </strong> <?= $row[0]->full_name; ?>
              </td>
              <td class="colone" style="padding:10px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Home Phone: </strong> <?= $row[0]->home_phone; ?>
                    <strong style="padding-left: 20px; font: bold 12px 'Times New Roman';text-align: left;">Work Phone: </strong> <?= $row[0]->work_mobile; ?>
              </td>
            </tr>
            <tr>
             <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Street Address: </strong> <?= $row[0]->street_address; ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">City: </strong> <?= $row[0]->city; ?>
              </td>
            </tr>
            <tr style="width: 100%">
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">State: </strong> <?= $row[0]->states; ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Zip: </strong> <?= $row[0]->zipcode; ?>
              </td>
            </tr>
            <tr>
             <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Email: </strong> <?= $row[0]->email_address; ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Sin: </strong> <?= $row[0]->sins; ?>
              </td>
            </tr>
            <tr style="width: 100%">
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">Date of Birth: </strong> <?= date('M d, Y', strtotime($row[0]->dob)); ?>
              </td>
              <td class="colone" style="padding:10px; width: 300px;">
                    <strong style="font: bold 12px 'Times New Roman';text-align: left;">MMN: </strong> <?= $row[0]->mmn; ?>
              </td>
            </tr>
        </table>

        <br><br><br>
        <table style="width: 100%">
          <tr>
            <td style="background:#438eb9;" class="panel-heading">
              <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Payment Details:</h3> 
            </td>
          </tr>
        </table> 
        
        <table class="detailtable" style="width:100%; margin-top:20px">
          <thead>
                <tr style="background:#438eb9;padding:5px; font-size:16px; font-family:'Times New Roman'; color:#fff !important;">
                    <th></th>
					<th style="color:#fff !important;" class="col-md-2">CC Number: </th>
					<th style="color:#fff !important;">CVC: </th>
					<th style="color:#fff !important;">EXP: </th>
					<th style="color:#fff !important;">Owe: </th>
					<th style="color:#fff !important;">Avail: </th>
					<th style="color:#fff !important;">Int Rate: </th>
					<th style="color:#fff !important;">Bank: </th>
					<th style="color:#fff !important;">Bank Tollfree# </th>
					<th style="color:#fff !important;">Min Pay: </th>
					<th style="color:#fff !important;">Last Pay: </th>
					<th style="color:#fff !important;">Current Pay:</th>
					<th style="color:#fff !important;">Next Pay: </th>
					<th style="color:#fff !important;">Last Payment Date: </th>
					<th style="color:#fff !important;">Next Payment Date: </th>
                </tr>
            </thead>
            <tbody>
			<?php 
			$i = 1;
			foreach($result_set_cc as $rows)
			{
				?>
             	<tr style=" padding:5px; font-size:14px; font-family:'Times New Roman'; color:#111; border-bottom:2px solid #5F5F5F; text-align: center;">
					<td>Cart<?php echo $i;
					$i++;
					?></td>
					<td>
						<?php echo $rows->cc_number; ?>
					</td>
					<td>
						<?php echo $rows->cvc; ?>
					</td>
					<td>
						<?php echo $rows->exp; ?>
					</td>
					<td>
						<?php echo $rows->owe; ?>
					</td>
					<td>
						<?php echo $rows->avail; ?>
					</td>
					<td>
						<?php echo $rows->int_rate; ?>
					</td>
					<td>
						<?php echo $rows->bank; ?>
					</td>
					<td>
						<?php echo $rows->bank_tollfree; ?>
					</td>
					<td>
						<?php echo $rows->min_pay; ?>
					</td>
					<td>
						<?php echo $rows->last_pay; ?>
					</td>
					<td>
						<?php echo $rows->current_pay; ?>
					</td>
					<td>
						<?php echo $rows->next_pay; ?>
					</td>
					<td>
						<?php echo $rows->last_pay_date; ?>
					</td>
					<td>
						<?php echo $rows->next_pay_date; ?>
					</td>
				</tr>
			<?php
			}
			?>
				
            </tbody>
        </table>


        <br><br><br>
        <table style="width: 100%">
          <tr>
            <td style="background:#438eb9;" class="panel-heading">
              <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Your Item Name:</h3> 
            </td>
          </tr>
        </table> 

        <table class="detailtable" style="width:100%; margin-top:20px">
          <thead>
                <tr style="background:#438eb9;padding:5px; font-size:16px; font-family:'Times New Roman'; color:#fff !important;">
                    <th style="color:#fff !important;"></th>
					<th style="color:#fff !important;" class="col-md-2">ID: </th>
					<th style="color:#fff !important;">Product:</th>
					<th style="color:#fff !important;">Qty:</th>
					<th style="color:#fff !important;">Price:</th>
					<th style="color:#fff !important;">Payment Option:</th>
					<th style="color:#fff !important;">Total: </th>
                </tr>
            </thead>
            <tbody>
				<tr style=" padding:5px; font-size:14px; font-family:'Times New Roman'; color:#111; border-bottom:2px solid #5F5F5F; text-align: center;">
					<td>1</td>
					<td class="col-md-2">
						<?php echo $row[0]->id1; ?>
					</td>
					<td>
						<?php echo $row[0]->product1; ?>
					</td>
					<td>
						<?php echo $row[0]->qty1; ?>
					</td>
					<td>
						<?php echo $row[0]->price1; ?>
					</td>
					<td>
						<?php echo $row[0]->payment_option1; ?>
					</td>
					<td>
						<?php echo $row[0]->total1; ?>
					</td>
				</tr>
		  	</tbody>
        </table>

        <br><br>
        <div class="panel panel-primary">
         <div style="background:#438eb9;" class="panel-heading">
             <h3 style="margin:0 10px;padding:0;color:#fff;" class="panel-title">Comments:</h3> 
          </div>
	          <div class="panel-body legal" style="margin-top:10px;">
	          	<strong>Agent Notes: </strong><?php echo $row[0]->agent_notes; ?>
	          </div>
	          <div class="panel-body legal" style="margin-top:10px;">
	          	<strong>Manager Notes: </strong><?php echo $row[0]->manager_notes; ?>
	          </div>
	          <div class="panel-body legal" style="margin-top:10px;">
	          	<strong>Customer Services Notes: </strong><?php echo $row[0]->customer_services_notes; ?>
	          </div>
        </div>   
    </div>
</body>
</html>
<?php
session_start();
error_reporting(0);
$id=$_SESSION["entityID"];
$name= $_SESSION["name"];
$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $name));
$output='';
$billingaddress=array();
$shippingaddress=array();
$email_addess_id=array();
$emailaddress=array();
$allemail='';
$phone_number_id=array();
$phone_number=array();
$i=0;
$j=0;
$l=0;
$m=0;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

				
				$query=mysqli_query($conn,"SELECT * FROM $copyIntoEntityTableName WHERE id='".$id."'");
				while($fetch=mysqli_fetch_array($query)){
					
					//get email
					$query_mail_id=mysqli_query($conn,"SELECT * FROM entity_email_address WHERE entity_id='".$fetch['id']."' AND entity_type='".$_SESSION["name"]."'");
					while($result_mail_id=mysqli_fetch_array($query_mail_id))
					{
						$email_addess_id[$l]=$result_mail_id['email_address_id'];
						$l++;
					}
					
					for($a=0;$a<count($email_addess_id);$a++)
					{
						$query_mail=mysqli_query($conn,"SELECT * FROM email_address WHERE id='".$email_addess_id[$a]."'");
						$result_mail=mysqli_fetch_array($query_mail);
						$emailaddress[$a]=$result_mail['name'];
						
					}
					$allemail=implode(", ", $emailaddress);
					
					//get phone number
					$query_phonenumber_id=mysqli_query($conn,"SELECT * FROM entity_phone_number WHERE entity_id='".$fetch['id']."' AND entity_type='".$_SESSION["name"]."'");
					
					while($result_phonenumber_id=mysqli_fetch_array($query_phonenumber_id))
					{
						$phone_number_id[$m]=$result_phonenumber_id['phone_number_id'];
						$m++;
					}
					for($b=0;$b<count($phone_number_id);$b++)
					{
						$query_phonenumber=mysqli_query($conn,"SELECT * FROM phone_number WHERE id='".$phone_number_id[$b]."'");
						$result_phonenumber=mysqli_fetch_array($query_phonenumber);
						$phone_number[$b]=$result_phonenumber['name'];
					
					}
					$allphonenumber=implode(", ",$phone_number);
					
					
					//billing address	
					if($fetch['billing_address_street']!='')
					{
						$i++;
						$billingaddress[$i]=$fetch['billing_address_street'];
						//$billingaddress.=$fetch['billing_address_street'];
					}
					if($fetch['billing_address_city']!='')
					{
						$i++;
						$billingaddress[$i]=$fetch['billing_address_city'];
					}
					if($fetch['billing_address_state']!='')
					{
						$i++;
						$billingaddress[$i]=$fetch['billing_address_state'];
					}					
					if($fetch['billing_address_country']!='')
					{
						$i++;
						$billingaddress[$i]=$fetch['billing_address_country'];
					}
					if($fetch['billing_address_postal_code']!='')
					{
						$i++;
						$billingaddress[$i]=$fetch['billing_address_postal_code'];
					}
					$bill_address=implode(", ", $billingaddress);
					
					
					//shipping address
					if($fetch['shipping_address_street']!='')
					{
						$j++;
						$shippingaddress[$j]=$fetch['shipping_address_street'];
					}
					if($fetch['shipping_address_city']!='')
					{
						$j++;
						$shippingaddress[$j]=$fetch['shipping_address_city'];
					}
					if($fetch['shipping_address_state']!='')
					{
						$j++;
						$shippingaddress[$j]=$fetch['shipping_address_state'];
					}
					if($fetch['shipping_address_country']!='')
					{
						$j++;
						$shippingaddress[$j]=$fetch['shipping_address_country'];
					}
					if($fetch['shipping_address_postal_code']!='')
					{
						$j++;
						$shippingaddress[$j]=$fetch['shipping_address_postal_code'];
					}
					$shopp_address=implode(", ",$shippingaddress);
					
					
					$output='
						<div class="table-responsive">
						<table class="table table-bordered">
						<tr>
							<th><input type="checkbox" name="name"  id="selectall" title="select all"/></th>
							<th>Field Name</th>
							<th>Field Value</th>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="1"/></th>
							<td>Name</td>
							<td>'.$fetch['name'].'</td>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="4"/></th>
							<td>Email Address</td>
							<td>'.$allemail.'</td>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="4"/></th>
							<td>Phone Number</td>
							<td>'.$allphonenumber.'</td>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="3"/></th>
							<td>Website</td>
							<td>'.$fetch['website'].'</td>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="4"/></th>
							<td>Billing Address</td>
							<td>'.$bill_address.'</td>
						</tr>
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="4"/></th>
							<td>Shipping Address</td>
							<td>'.$shopp_address.'</td>
						</tr>						
						<tr>
							<th><input type="checkbox" name="name" class="case" name="case" value="2"/></th>
							<td>Description</td>
							<td class="text-justify">'.$fetch['description'].'</td>
						</tr>						
						</table>
						</div>
				';
				}
				
				
				echo $output;
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<SCRIPT language="javascript">
$(function(){

	// add multiple select / deselect functionality
	$("#selectall").click(function () {
		  $('.case').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".case").click(function(){

		if($(".case").length == $(".case:checked").length) {
			$("#selectall").attr("checked", "checked");
		} else {
			$("#selectall").removeAttr("checked");
		}

	});
});
</SCRIPT>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php

session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$lead_id=$_POST['lead_id'];

$sql6="select * from lead where id='$lead_id'";
$result6=mysqli_query($conn,$sql6);
$row6=mysqli_fetch_assoc($result6);
$source=$row6['source'];
$industry=$row6['industry'];
$assigned_user_id=$row6['assigned_user_id'];
$contactperson=$row6['contactperson'];
$created_by_id=$row6['created_by_id'];

// $user_id=$row6['user_id']

$name=$_POST['name'];
$stage=$_POST['stage'];
$amount=$_POST['amount'];
$probability=$_POST['probability'];


if($_REQUEST['closeddate']!='')
{
    $oldDate1= strtr($_REQUEST['closeddate'], '/', '-');
    $oldDate= strtotime($oldDate1);
    $closeddate= date("Y-m-d", $oldDate);
}



$description=$_POST['description'];
$AccountName=$_POST['AccountName'];
$ContactPerson=$_POST['ContactPerson'];
$Email=$_POST['Email'];
$Phone=$_POST['Phone'];
$Street=$_POST['Street'];
$city=$_POST['city'];
$state=$_POST['state'];
$postal_code=$_POST['postal_code'];
$country=$_POST['country'];
$Website=$_POST['Website'];


function getToken($length)
	{
		$token = "";
		$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		$codeAlphabet.= "0123456789";
		$max = strlen($codeAlphabet); // edited
		for ($i=0; $i < $length; $i++) {
			$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
		}
		return $token;
	}


function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0) {
        return $min;
    }
    ## Not so random
    $log = log($range, 2);
    $bytes = (int) ($log / 8) + 1;
    ## Length in bytes
    $bits = (int) $log + 1;
    ## Length in bits
    $filter = (int) (1 << $bits) - 1;
    ## Set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
        ## Discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

$id=getToken(17);
$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");

if($_REQUEST['closeddate']!='')
{

$sql="insert into opportunity(id,name,stage,amount,probability,close_date,description,account_id,contactperson,website,address_street,address_city,address_state,address_country,address_postal_code,created_at,modified_at,industry,lead_source,assigned_user_id,created_by_id)values('$id','$name','$stage','$amount','$probability','$closeddate','$description','$AccountName','$ContactPerson','$Website','$Street','$city','$state','$country','$postal_code','$created_at','$modified_at','$industry','$source','$assigned_user_id','$created_by_id')";
$result=mysqli_query($conn,$sql);

}
else
{
    $sql="insert into opportunity(id,name,stage,amount,probability,description,account_id,contactperson,website,address_street,address_city,address_state,address_country,address_postal_code,created_at,modified_at,industry,lead_source,assigned_user_id,created_by_id)values('$id','$name','$stage','$amount','$probability','$description','$AccountName','$ContactPerson','$Website','$Street','$city','$state','$country','$postal_code','$created_at','$modified_at','$industry','$source','$assigned_user_id','$created_by_id')";
$result=mysqli_query($conn,$sql);

}



$sql1="select * from attachment where parent_id='$lead_id'";
$result1=mysqli_query($conn,$sql1);
	  	$project = explode('/', $_SERVER['REQUEST_URI'])[1];

	while($row1=mysqli_fetch_assoc($result1))
	{
	$a_id=getToken(17);//$row1['id'];
	$a_name=$row1['name'];
	$a_deleted=$row1['deleted'];
	$a_type=$row1['type'];
	$a_size=$row1['size'];
	$a_source_id=$row1['source_id'];
	$a_field=$row1['field'];
	$a_created_at=date("Y-m-d h:i:s");//$row1['created_at'];
	$a_role=$row1['role'];
	$a_storage=$row1['storage'];
	$a_storage_file_path=$row1['storage_file_path'];
	$a_global=$row1['global'];
	$a_parent_id=$task_id;//$row1['parent_id'];
	$a_parent_type=$row1['parent_type'];
	$a_related_id=$row1['related_id'];
	$a_related_type=$row1['related_type'];
	$a_created_by_id=$row1['created_by_id'];


 	copy("../../../data/upload/".$row1['id'], "../../../data/".$row1['id']);

 	rename("../../../data/".$row1['id'], "../../../data/".$a_id);

 	copy("../../../data/".$a_id, "../../../data/upload/".$a_id);
 	unlink("../../../data/".$a_id);

	$sql_insert_attachment="insert into attachment(id,name,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

	values

	('$a_id','$a_name','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$id','Opportunity','$a_related_id','$a_related_type','$a_created_by_id')";

	$result_insert_attachment=mysqli_query($conn,$sql_insert_attachment);
 }


//taking data from note
	$sql2="select * from note where parent_id='$lead_id'";
	$result2=mysqli_query($conn,$sql2);

	while($row2=mysqli_fetch_assoc($result2))
	{
	$n_id=getToken(17);//$row2['id'];
	$n_deleted=$row2['deleted'];
	$n_post=$row2['post'];
	$n_data=$row2['data'];
	$n_type=$row2['type'];
	$n_target_type=$row2['target_type'];
	$n_number=$row2['number'];
	$n_is_global=$row2['is_global'];
	$n_is_internal=$row2['is_internal'];
	$n_created_at=date("Y-m-d h:i:s");//$row2['created_at'];
	$n_modified_at=date("Y-m-d h:i:s");//$row2['modified_at'];
	$n_parent_id=$task_id;//$row2['parent_id'];
	$n_parent_type=$row2['parent_type'];
	$n_related_id=$row2['related_id'];
	$n_related_type=$row2['related_type'];
	$n_created_by_id=$row2['created_by_id'];
	$n_modified_by_id=$row2['modified_by_id'];
	$n_super_parent_id=$row2['super_parent_id'];
	$n_super_parent_type=$row2['super_parent_type'];

	$sql_insert_note="insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

	values

	('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$id','Opportunity','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

	$result_insert_note=mysqli_query($conn,$sql_insert_note);
}


	$sql9="select * from subscription where entity_id='$lead_id'";
	$result9=mysqli_query($conn,$sql9);

	while($row9=mysqli_fetch_assoc($result9))
	{
		$s_id=getToken(17);
		$user_id=$row9['user_id'];
		$sql10="insert into subscription(id,entity_id,entity_type,user_id)values('$s_id','$id','Opportunity','$user_id')";
		$result10=mysqli_query($conn,$sql10);
	}



if($Phone!='')
{
	$no_id=getToken(17);

	$sql8="insert into phone_number(id,name,type)values('$no_id','$Phone','Mobile')";
	$result8=mysqli_query($conn,$sql8);

	$sql3="insert into entity_phone_number(entity_id,phone_number_id,entity_type)values('$id','$no_id','Opportunity')";
	$result3=mysqli_query($conn,$sql3);
}

if($Email!='')
{
	$email_id=getToken(17);

	$sql4="insert into email_address(id,name,lower)values('$email_id','$Email','$Email')";
	$result4=mysqli_query($conn,$sql4);

	$sql5="insert into entity_email_address(entity_id,email_address_id,entity_type)values('$id','$email_id','Opportunity')";
	$result5=mysqli_query($conn,$sql5);
}

$sql7="update lead set status='Converted' where id='$lead_id'";
$result7=mysqli_query($conn,$sql7);

echo "<script>
$.confirm({
        title: 'Success!',
        content: 'Opportunity created!',
       
            buttons: {
        Ok: function () {
            window.location='https://".$_SERVER['SERVER_NAME']."/#Opportunity';
            }
        }

    });
</script>";
?>

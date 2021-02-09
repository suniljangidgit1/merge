<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


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



$name=$_GET['name'];
$email=$_GET['email'];
$no=$_GET['no'];

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$created_by_id=$row4['id'];

$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");
$sql1="insert into account(id,name,created_at,modified_at,created_by_id)values('$id','$name','$created_at','$modified_at','$created_by_id')";
$result1=mysqli_query($conn,$sql1);

if($no!='')
{


	$no_id=getToken(17);

	$sql2="insert into phone_number(id,name,type)values('$no_id','$no','Mobile')";
	$result2=mysqli_query($conn,$sql2);

	$sql3="insert into entity_phone_number(entity_id,phone_number_id,entity_type)values('$id','$no_id','Account')";
	$result3=mysqli_query($conn,$sql3);
}

if($email!='')
{
	$email_id=getToken(17);

	$sql4="insert into email_address(id,name,lower)values('$email_id','$email','$email')";
	$result4=mysqli_query($conn,$sql4);

	$sql5="insert into entity_email_address(entity_id,email_address_id,entity_type)values('$id','$email_id','Account')";
	$result5=mysqli_query($conn,$sql5);
}

if($result1)
{
  	echo "1";
}
else
{
	echo "0";
}

?>
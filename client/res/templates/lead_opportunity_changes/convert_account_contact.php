<?php error_reporting(~E_ALL); session_start();   //START SESSION

$user_name      =   $_SESSION['Login'];
$entity_id      =   $_SESSION['entityID'];
$entity_name    =   $_SESSION['name'];

// SET TIME ZONE
date_default_timezone_set('UTC');

$created_at     =   date("Y-m-d h:i:s");
$modified_at    =   date("Y-m-d h:i:s");  

//CREATE SUB-DOMAIN DATABASE CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

function getToken( $length  =  0 ) {

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


function crypto_rand_secure( $min  =  0, $max  =  0 )  {

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

$opid           =       $_GET['id'];

$sql6           =       "select * from opportunity where id='$opid'";
$result6        =       mysqli_query($conn,$sql6);
$row6           =       mysqli_fetch_assoc($result6);

$AccountName    =       $row6['account_id'];
$website        =       $row6['website'];
$ContactPerson  =       $row6['contactperson'];
$Street         =       $row6['address_street'];
$city           =       $row6['address_city'];
$state          =       $row6['address_state'];
$postal_code    =       $row6['address_postal_code'];
$country        =       $row6['address_country'];
$industry       =       $row6['industry'];

if(!empty($AccountName)){
    $sql7           =       "select * from account where name='$AccountName' and deleted='0'";
    $result7        =       mysqli_query($conn,$sql7);
    $row7           =       mysqli_fetch_assoc($result7);

    $AccountName    =       $row7['name'];
}

if(empty($AccountName)){

    $account_id     =   getToken(17);
    $sql8           =   "insert into account(id,name,created_at,modified_at,website,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,industry)values('$account_id','$AccountName','$created_at','$modified_at','$website','$Street','$city','$state','$country','$postal_code','$industry')";
    $result8        =   mysqli_query($conn,$sql8);
}

$contact_id     =       getToken(17);
$sql9           =       "insert into contact(id,first_name,address_street,address_city,address_state,address_country,address_postal_code,created_at,modified_at,account_id)values('$contact_id','$ContactPerson','$Street','$city','$state','$country','$postal_code','$created_at','$modified_at','$account_id')";
$result9         =       mysqli_query($conn,$sql9);


$sql10              =   "select * from entity_phone_number where entity_id='$opid'";
$result10           =   mysqli_query($conn,$sql10);
$row10              =   mysqli_fetch_assoc($result10);
$phone_number_id    =   $row10['phone_number_id'];

$sql11          =   "select * from phone_number where id='$phone_number_id'";
$result11       =   mysqli_query($conn,$sql11);
$row11          =   mysqli_fetch_assoc($result11);
$Phone          =   $row11['name'];

$no_id      =   getToken(17);
$no_id1     =   getToken(17);

$sql2       =   "insert into phone_number(`id`,`name`,`type`)values('$no_id','$Phone','Mobile')";
$result2    =   mysqli_query($conn,$sql2);

$sql3       =   "insert into `entity_phone_number`(`entity_id`,`phone_number_id`,`entity_type`,`primary`)values('$contact_id','$no_id','Contact','1')";
$result3    =   mysqli_query($conn,$sql3);

$sql21      =   "insert into phone_number(`id`,`name`,`type`)values('$no_id1','$Phone','Mobile')";
$result21   =    mysqli_query($conn,$sql21);

$sql31      =   "insert into `entity_phone_number`(`entity_id`,`phone_number_id`,`entity_type`,`primary`)values('$account_id','$no_id1','Account','1')";
$result31   =   mysqli_query($conn,$sql31);


$sql12              =       "select * from entity_email_address where entity_id='$opid'";
$result12           =       mysqli_query($conn,$sql12);
$row12              =       mysqli_fetch_assoc($result12);
$email_address_id   =       $row12['email_address_id'];

$sql13          =       "select * from email_address where id='$email_address_id'";
$result13       =       mysqli_query($conn,$sql13);
$row13          =       mysqli_fetch_assoc($result13);
$Email          =       $row13['name'];

$email_id    =      getToken(17);

$sql4        =      "insert into email_address(id,name,lower)values('$email_id','$Email','$Email')";
$result4     =      mysqli_query($conn,$sql4);

$sql5        =      "insert into `entity_email_address`(`entity_id`,`email_address_id`,`entity_type`,`primary`)values('$contact_id','$email_id','Contact','1')";
$result5     =       mysqli_query($conn,$sql5);

 $email_id1  =       getToken(17);

$sql41       =       "insert into email_address(id,name,lower)values('$email_id1','$Email','$Email')";
$result41    =       mysqli_query($conn,$sql41);

$sql51       =       "insert into `entity_email_address`(`entity_id`,`email_address_id`,`entity_type`,`primary`)values('$account_id','$email_id1','Account','1')";
$result51    =       mysqli_query($conn,$sql51);

$today       =      date("Y-m-d");

$sql12       =      "update opportunity set account_id='$account_id',stage='Closed Won',last_stage='Closed Won',close_date='$today' where id='$opid'";
$result12    =     mysqli_query($conn,$sql12);

$sql61       =    "insert into account_contact(account_id,contact_id)values('$account_id','$contact_id')";
$result61    =    mysqli_query($conn,$sql61);

$sql62       =    "insert into contact_opportunity(contact_id,opportunity_id)values('$contact_id','$opid')";
$result62    =     mysqli_query($conn,$sql62);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

$data['status'] = 'success';
$data['msg']    = 'Account & Contact created!';
echo json_encode($data);return;
?>

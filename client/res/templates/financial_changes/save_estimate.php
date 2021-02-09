<?php
session_start();
// error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data["status"] = "false";
$data["msg"]    = "Invalid request!";

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];
$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];


$billfromname=$_REQUEST['billfromname'];
$billing_address_street=$_REQUEST['billing_address_street'];
$billing_address_city=$_REQUEST['billing_address_city'];
$billing_address_state=$_REQUEST['billing_address_state'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code'];
$billing_address_country=(isset($_REQUEST['billing_address_country'])) ? $_REQUEST['billing_address_country'] : '';
$billingaddressgstin=$_REQUEST['billingaddressgstin'];
$billfrompanno = $_REQUEST['billingaddresspanno'];

if(isset($_REQUEST['billingaddressemailid'])){
    $billfromemail = $_REQUEST['billingaddressemailid'];
}
if(isset($_REQUEST['billingemailaddress'])){
    $billfromemail = $_REQUEST['billingemailaddress'];
}

if((isset($_REQUEST['billingaddressemailid']) && $_REQUEST['billingaddressemailid']=="") || (isset($_REQUEST['billingemailaddress']) && $_REQUEST['billingemailaddress']=="")){
    $billfromemail = "";
}

if(isset($_REQUEST['billingphoneno'])){
    $billfromphone = $_REQUEST['billingphoneno'];
}
else if(isset($_REQUEST['billingaddresshphoneno'])){
    $billfromphone = $_REQUEST['billingaddresshphoneno'];
}
else{
    $billfromphone = "";
}

$billfrom_udyamno = $_REQUEST['billingfrom_udyamno'];
/*$billfromemail = $_REQUEST['billingaddressemailid'];
$billfromphone = $_REQUEST['billingaddresshphoneno'];
$billfrom_udyamno = $_REQUEST['billingfrom_udyamno'];*/

$billtoname=$_REQUEST['billtoname'];
$shipping_address_street=$_REQUEST['shipping_address_street'];
$shipping_address_city=$_REQUEST['shipping_address_city'];
$shipping_address_state=$_REQUEST['shipping_address_state'];
$shipping_address_postal_code=$_REQUEST['shipping_address_postal_code'];
$shipping_address_country=(isset($_REQUEST['shipping_address_country'])) ? $_REQUEST['shipping_address_country'] : '';
$shippingaddressgstin=$_REQUEST['shippingaddressgstin'];
$billtopanno =  $_REQUEST['shippingaddresspanno'];
$billtoemail =  $_REQUEST['shippingaddressemailid'];
$billtophone =  $_REQUEST['shippingaddresshphoneno'];
$billto_udyamno =  $_REQUEST['billingto_udyamno'];

$po_so_number =  $_REQUEST['po_so_number'];
$terms_conditions =  $_REQUEST['estimate_terms_conditions'];
// echo '<pre>';print_r($_REQUEST);die;

// $account_name=(isset($_REQUEST['account_id'])) ? $_REQUEST['account_id'] : '';
$account_name=(isset($_REQUEST['billtoname'])) ? $_REQUEST['billtoname'] : '';
$placeofsupply=(isset($_REQUEST['placeofsupply'])) ? $_REQUEST['placeofsupply'] : '';
$adjustment=(isset($_REQUEST['adjustment'])) ? $_REQUEST['adjustment'] : '';

$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=(isset($row5['id'])) ? $row5['id'] : '';

$oldDate1= (isset($_REQUEST['estimate_date']) && $_REQUEST['estimate_date']!="") ? strtr($_REQUEST['estimate_date'], '/', '-') : date("Y-m-d");
$oldDate= strtotime($oldDate1);
$date= date("Y-m-d", $oldDate);
$estimatedate=date("d M Y",strtotime($date));

$estimate_number=(isset($_REQUEST['estimate_number'])) ? $_REQUEST['estimate_number'] : '';

$g_s_t=(isset($_REQUEST['g_s_t'])) ? $_REQUEST['g_s_t'] : '';
$estimate_discount_amount_invoice=0;
$estimate_discount_option_invoice=0;
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

$fileName =  '';

//file Uploading ...
$allFiles='estimate/uploads/';
if(!empty($_FILES["attachment"]["name"][0]))
{   
    $uploads_dir = 'estimate/uploads/';
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
     
    // Count total files
    $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads");

    $zip = new ZipArchive();
    $fileName =  time().date("YmdHis").".zip";
    $zip_name = getcwd()."/estimate/uploads/".$fileName;

    if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
        $error .= "Sorry ZIP creation is not working currently.<br/>";
    }

    foreach($files as $filename)
    {
        if ($filename !== '.' && $filename !== '..')
        {
            $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads/".$filename;
            
            $zip->addFromString($filename,file_get_contents($filecontent));
            $delete_files = 'estimate/uploads/'.$filename;
            if(file_exists($delete_files)){
               unlink($delete_files);
            }   
        }
    }
    $zip->close();

    // To check s3 bucket existing folder size in gb
    if(file_exists($fileName))
    {
        $size = filesize('estimate/zipFolder/'.$fileName);
        include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3bucketfoldersize.php');
        $objS3buket         = new S3bucketfoldersize();
        $s3BucketSize       = $objS3buket->FolderSize();
        $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
        $planStorageLimit   = $objS3buket->getDomainStorageLimit();
        $finalExisting      = ( $s3BucketSize + $currentFileSize );
        // $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
        $planStorageLimit   = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

        if( $finalExisting > $planStorageLimit ){

            // delete local file
            $zip_name = 'estimate/zipFolder/'.$fileName;
            if(file_exists($zip_name)){
               unlink($zip_name);
            }

            $data["error"]  = "true";
            $data["status"] = "false";
            $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
            echo json_encode($data);return;
        }
    }
   
    // To check s3 bucket existing folder size in gb

    // s3 bucket transfer
    // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3Connect.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
    
    $source = 'estimate/uploads/'.$fileName;

    // $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';
    $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$fileName;
    
    // $manager = new \Aws\S3\Transfer($s3, $source, $dest);
    // $manager->transfer();

    $result = $client->putObject([
        'Bucket' => 'fincrm',
        'Key'    => $dest,
        'SourceFile' => $source         
    ]);

    $zipname = 'estimate/zipFolder/'.$fileName;
    if(file_exists($zipname)){
        unlink($zipname);
    }

    $zipName = 'estimate/uploads/'.$fileName;
    if(file_exists($zipName)){
        unlink($zipName);
    }  
}

$sql_estimate="insert into estimate(id,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country,shipping_address_postal_code,created_at,modified_at,created_by_id,account_id,g_s_t,status,invoice_number,date,billingaddressgstin,shippingaddressgstin,billtoname,billfromname,placeofsupply,estimatedate,adjustments,billfrompanno,billingfromemail,billingfromphone,billtopanno,billingtoemail,billingtophone,billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions,filename,user_name) values('$id','$billing_address_street','$billing_address_city','$billing_address_state','$billing_address_country','$billing_address_postal_code','$shipping_address_street','$shipping_address_city','$shipping_address_state','$shipping_address_country','$shipping_address_postal_code','$created_at','$modified_at','$created_by_id','$account_id','$g_s_t','Pending','$estimate_number','$date','$billingaddressgstin','$shippingaddressgstin','$billtoname','$billfromname','$placeofsupply','$estimatedate','$adjustment','$billfrompanno','$billfromemail','$billfromphone','$billtopanno','$billtoemail','$billtophone','$billfrom_udyamno','$billto_udyamno','$po_so_number','$terms_conditions','$fileName','$user_name')";
$result_estimate=mysqli_query($conn,$sql_estimate);

$total_estimate_val = ($_REQUEST['total_estimate_val']) ? $_REQUEST['total_estimate_val'] : '0';
$estimate_disc_option = ($_REQUEST['Estimate_Percentage_select']=='Percentage') ? '%' : ($_REQUEST['Estimate_Percentage_select']=='Amount') ? 'Rs' : 'Select Type';
$estimate_disc_type = ($_REQUEST['Estimate_Percentage_select']=='Percentage') ? 'Percentage' : ($_REQUEST['Estimate_Percentage_select']=='Amount') ? 'Amount' : 'Select Type';

$estimate_disc_amt = ($_REQUEST['estimate_calculated_disc_amt']) ? $_REQUEST['estimate_calculated_disc_amt'] : '0';
$estimate_subtotal_amount = ($_REQUEST['estimate_subtotal_amount']) ? $_REQUEST['estimate_subtotal_amount'] : '0';
$est_total_discount_amt = ($_REQUEST['estimate_totaldiscount_amount']) ? $_REQUEST['estimate_totaldiscount_amount'] : '0';
$estimate_total_taxes = ($_REQUEST['estimate_totaltaxes_amount']) ? $_REQUEST['estimate_totaltaxes_amount'] : '0';
$estimatetotal_amount = ($_REQUEST['estimatetotal_amount']) ? $_REQUEST['estimatetotal_amount'] : '0';

$estimate_disc_rate = ($_REQUEST['estimate_disc_amt']) ? $_REQUEST['estimate_disc_amt'] : '';
$estimate_gst_type = ($_REQUEST['estimate_gst_type']) ? $_REQUEST['estimate_gst_type'] : '';
$estimate_gst_rate = ($_REQUEST['calculate_rate']) ? $_REQUEST['calculate_rate'] : '';
$estimate_cgst_amount = ($_REQUEST['estimate_cgst_amount']) ? $_REQUEST['estimate_cgst_amount'] : '';
$estimate_sgst_amount = ($_REQUEST['estimate_sgst_amount']) ? $_REQUEST['estimate_sgst_amount'] : '';
$estimate_igst_amount = ($_REQUEST['estimate_igst_amount']) ? $_REQUEST['estimate_igst_amount'] : '';

$sql_update="update estimate set sub_total='$estimate_subtotal_amount',total='$estimatetotal_amount',discounttype='$estimate_disc_type',discountoption='$estimate_disc_option',discountvalue='$est_total_discount_amt',discountamount='$estimate_disc_amt',gst_rate='$estimate_gst_rate',g_s_t='$estimate_gst_type',c_g_s_t='$estimate_cgst_amount',s_g_s_t='$estimate_sgst_amount',igst='$estimate_igst_amount',rate='$estimate_disc_rate' where id='$id'";
$result_update=mysqli_query($conn,$sql_update);

$discount_type=(isset($_REQUEST['discount_type'])) ? $_REQUEST['discount_type'] : '';
$amount_without_gst="";
$estimate_discount_option_item[]="";
$estimate_discount_amount_item[]="";
$per ="";
$total_amount=0;
$len=count($_REQUEST['item_descr']);
$per1=0;

$item_name=(isset($_REQUEST['item_name'])) ? $_REQUEST['item_name'] : '';
$description=(isset($_REQUEST['item_descr'])) ? $_REQUEST['item_descr'] : '';
$hsn=(isset($_REQUEST['item_hsn'])) ? $_REQUEST['item_hsn'] : '';
$quantity=(isset($_REQUEST['item_qty'])) ? $_REQUEST['item_qty'] : 0;
$rate=(isset($_REQUEST['item_rate'])) ? $_REQUEST['item_rate'] : 0;
$amount=(isset($_REQUEST['item_main_amount'])) ? $_REQUEST['item_main_amount'] : 0;
$gst_rate=(isset($_REQUEST['item_gst_discont'])) ? $_REQUEST['item_gst_discont'] : '';
$discount_type=(isset($_REQUEST['item_discount_type'])) ? $_REQUEST['item_discount_type'] : '';

$total_amount = 0;
$discount_option = '';
$discount_amount = 0;
for ($i=0; $i < $len; $i++)
{
    $cgst=(isset($_REQUEST['item_cgst_amount'][$i])) ? $_REQUEST['item_cgst_amount'][$i] : '0';
    $sgst=(isset($_REQUEST['item_sgst_amount'][$i])) ? $_REQUEST['item_sgst_amount'][$i] : '0';
    $igst=(isset($_REQUEST['item_igst_amount'][$i])) ? $_REQUEST['item_igst_amount'][$i] : '0';

    if(isset($discount_type[$i]) && $discount_type[$i] == 'Percentage'){
        $discount_option = '%';
        $discount_amount = $_REQUEST['calculated_discount'][$i];
    }
    if(isset($discount_type[$i]) && $discount_type[$i] == 'Amount'){
        $discount_option = 'Rs';
        if($_REQUEST['item_discount_rate'][$i])
        {
            $discount_amount = $amount[$i] - $_REQUEST['item_discount_rate'][$i];
        }
        else {
            $discount_amount = 0;
        }
    }
    $item_discount_rate = (isset($_REQUEST['item_discount_rate'][$i])) ? $_REQUEST['item_discount_rate'][$i] : 0;
    
    if(isset($_REQUEST['item_gst_type'][$i]) && $_REQUEST['item_gst_type'][$i] == 'IGST'){
        $total = (float)$_REQUEST['item_igst_amount'][$i] + $amount[$i];
        $total_amount = $total_amount - $total;
    }
    if(isset($_REQUEST['item_gst_type'][$i]) && $_REQUEST['item_gst_type'][$i] == 'CGST'){
        $total = (float)$_REQUEST['item_cgst_amount'][$i] + (float)$_REQUEST['item_sgst_amount'][$i] + (float)$_REQUEST['item_igst_amount'][$i];
        $total_amount = $total_amount - $total;
    }
    if(isset($_REQUEST['item_gst_type'][$i]) && ($_REQUEST['item_gst_type'][$i] == 'IGST' || $_REQUEST['item_gst_type'][$i] == 'CGST')){
        $total_amount = $total_amount - $total;
    }

    $sql_estimate_items="insert into estimates_items(estimate_id,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,date,total,discounttype,discountoption,discountvalue,discountamount) values('$id','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount[$i]','$gst_rate[$i]','$igst','$cgst','$sgst','$created_at','$total_amount','$discount_type[$i]','$discount_option','$item_discount_rate','$discount_amount')";
    $result_estimate_items=mysqli_query($conn,$sql_estimate_items);
    echo mysqli_error($conn);
}
// die;

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1) ? "0".$restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}
/*function delete_directory($uploads_dir) 
{
    if (is_dir($uploads_dir))
        $dir_handle = opendir($uploads_dir);
    // if (!$dir_handle){
    // return false;

    // }
    while($file = readdir($dir_handle))
    {
        if ($file != "." && $file != "..") 
        {
            if (!is_dir($uploads_dir."/".$file))
            unlink($uploads_dir."/".$file);
            else
            delete_directory($uploads_dir.'/'.$file);
        }
    }
    closedir($dir_handle);
    // rmdir($uploads_dir);
    return true;
}
delete_directory('uploads/');*/
//die;
// echo 1;
$data["status"] = "true";
$data["msg"]    = "Created Successfully!";
$data = array("status" => "true", "msg" => "Created Successfully!");
echo json_encode($data); 
return true;

?>
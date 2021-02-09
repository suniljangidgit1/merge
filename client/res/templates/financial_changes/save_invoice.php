<?php
session_start();
error_reporting(~E_ALL);
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


$billfromname=$_REQUEST['invoice_billfromname'];
$billtoname=$_REQUEST['invoice_billtoname'];

$billing_address_street=$_REQUEST['invoice_billing_address_street'];
$billing_address_city=$_REQUEST['invoice_billing_address_city'];
$billing_address_state=$_REQUEST['invoice_billing_address_state'];
$billing_address_postal_code=$_REQUEST['invoice_billing_address_postal_code'];
$billing_address_country=(isset($_REQUEST['invoice_billing_address_country'])) ? $_REQUEST['invoice_billing_address_country'] : '';
$billingaddressgstin=$_REQUEST['invoice_billingaddressgstin'];

$shipping_address_street=($_REQUEST['invoice_shipping_address_street'] && $_REQUEST['invoice_shipping_address_street']!= 'undefined') ? $_REQUEST['invoice_shipping_address_street'] : '';

$shipping_address_city=($_REQUEST['invoice_shipping_address_city'] && $_REQUEST['invoice_shipping_address_city']!= 'undefined') ? $_REQUEST['invoice_shipping_address_city'] : '';

$shipping_address_state=($_REQUEST['invoice_shipping_address_state'] && $_REQUEST['invoice_shipping_address_state']!='undefined') ? $_REQUEST['invoice_shipping_address_state'] : '';

$shipping_address_postal_code=($_REQUEST['invoice_shipping_address_postal_code'] && $_REQUEST['invoice_shipping_address_postal_code']!='undefined') ? $_REQUEST['invoice_shipping_address_postal_code'] : '';

$shipping_address_country=(isset($_REQUEST['invoice_shipping_address_country'])) ? $_REQUEST['shipping_address_country'] : '';
$shippingaddressgstin=($_REQUEST['invoice_shippingaddressgstin'] && $_REQUEST['invoice_shippingaddressgstin']!='undefined') ? $_REQUEST['invoice_shippingaddressgstin'] : '';

$billfrompanno = $_REQUEST['invoice_billingaddresspanno'];
$billfromemail = $_REQUEST['invoice_billingemailaddress'];
$billfromphone = $_REQUEST['invoice_billingphoneno'];

$billtopanno =  ($_REQUEST['invoice_shippingaddresspanno'] && $_REQUEST['invoice_shippingaddresspanno']!='undefined') ? $_REQUEST['invoice_shippingaddresspanno'] : '';

$billtoemail =  ($_REQUEST['invoice_shippingaddressemailid'] && $_REQUEST['invoice_shippingaddressemailid']!="undefined") ? $_REQUEST['invoice_shippingaddressemailid'] : '';

$billtophone =  ($_REQUEST['invoice_shippingaddresshphoneno'] && $_REQUEST['invoice_shippingaddresshphoneno']!="undefined") ? $_REQUEST['invoice_shippingaddresshphoneno'] : '';

$billfrom_udyamno = $_REQUEST['invoice_billingfrom_udyamno'];
$billto_udyamno =  $_REQUEST['invoice_billingto_udyamno'];
$po_so_number =  $_REQUEST['invoice_po_so_number'];
$terms_conditions =  $_REQUEST['invoice_terms_conditions'];

// $bank_holder_name = $_REQUEST['bank_holder_name'];   //beneficiary
// $bank_name =  $_REQUEST['bank_name'];       //bankname
// $account_no =  $_REQUEST['account_no'];    //accountno    
// $IFSCcode =  $_REQUEST['IFSCcode'];         //ifsc
// $bank_UPI =  $_REQUEST['bank_UPI'];         //bank_upi
// $duedate=$_REQUEST['due_date'];  
$bank_holder_name=(isset($_REQUEST['invoice_bank_holder_name'])) ? $_REQUEST['invoice_bank_holder_name'] :'';
$bank_name=(isset($_REQUEST['invoice_bank_name'])) ?  $_REQUEST['invoice_bank_name'] : '';
$account_no=(isset($_REQUEST['invoice_account_no'])) ? $_REQUEST['invoice_account_no'] : '';
$IFSCcode=(isset($_REQUEST['invoice_IFSCcode'])) ? $_REQUEST['invoice_IFSCcode'] : '';
$account_type=(isset($_REQUEST['invoice_bank_accType'])) ? $_REQUEST['invoice_bank_accType'] : '' ;
$bank_UPI=(isset($_REQUEST['invoice_bank_UPI'])) ? $_REQUEST['invoice_bank_UPI'] : '' ;

if(preg_match('/[\'"]/', $_REQUEST['bill_id'])){
    $billing_entity_id = str_replace( "'", '', $_REQUEST['bill_id']); 
}
else {
    $billing_entity_id = $_REQUEST['bill_id'];
}

// echo '<pre>';print_r($_REQUEST); die;

// $account_name=(isset($_REQUEST['account_id'])) ? $_REQUEST['account_id'] : '';
$account_name=(isset($_REQUEST['invoice_billtoname'])) ? $_REQUEST['invoice_billtoname'] : '';
$placeofsupply=(isset($_REQUEST['invoice_placeofsupply'])) ? $_REQUEST['invoice_placeofsupply'] : '';
$adjustment=(isset($_REQUEST['invoice_adjustment'])) ? $_REQUEST['invoice_adjustment'] : '';

$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=(isset($row5['id'])) ? $row5['id'] : '';

$oldDate1= (isset($_REQUEST['invoice_date']) && $_REQUEST['invoice_date']!="") ? strtr($_REQUEST['invoice_date'], '/', '-') : date("Y-m-d");
$oldDate= strtotime($oldDate1);
$date= date("Y-m-d", $oldDate);
$invoicedate=date("d M Y",strtotime($date));

$oldDate2= (isset($_REQUEST['due_date']) && $_REQUEST['due_date']!="") ? strtr($_REQUEST['due_date'], '/', '-') : date("Y-m-d");
$oldDate1= strtotime($oldDate2);
$date1= date("Y-m-d", $oldDate1);
$duedate=date("d M Y",strtotime($date1));

$invoice_number=(isset($_REQUEST['invoice_number'])) ? $_REQUEST['invoice_number'] : '';

$g_s_t=(isset($_REQUEST['g_s_t'])) ? $_REQUEST['g_s_t'] : '';
$invoice_discount_amount_invoice=0;
$invoice_discount_option_invoice=0;
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
$allFiles='invoice/uploads/';
// echo '<pre>';print_r($_FILES);die;
if(!empty($_FILES["invoice_attachment"]["name"][0]))
{   
    $uploads_dir = 'invoice/uploads/';
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
     
    // Count total files
    $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads");

    $zip = new ZipArchive();
    $fileName =  time().date("YmdHis").".zip";
    $zip_name = getcwd()."/invoice/uploads/".$fileName;

    if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
        $error .= "Sorry ZIP creation is not working currently.<br/>";
    }

    foreach($files as $filename)
    {
        if ($filename !== '.' && $filename !== '..')
        {
            $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/".$filename;
            
            $zip->addFromString($filename,file_get_contents($filecontent));
            $delete_files = 'invoice/uploads/'.$filename;
            if(file_exists($delete_files)){
               unlink($delete_files);
            }   
        }
    }
    $zip->close();

    // To check s3 bucket existing folder size in gb
    if(file_exists($fileName))
    {
        $size = filesize('invoice/zipFolder/'.$fileName);
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
            $zip_name = 'invoice/zipFolder/'.$fileName;
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
    $source = 'invoice/uploads/'.$fileName;

    // $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/';
    $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$fileName;

    /*$manager = new \Aws\S3\Transfer($s3, $source, $dest);

    $manager->transfer();*/
    $result = $client->putObject([
        'Bucket' => 'fincrm',
        'Key'    => $dest,
        'SourceFile' => $source         
    ]);

    $zip_name = 'invoice/zipFolder/'.$fileName;
    if(file_exists($zip_name)){
        unlink($zip_name);
    } 

    $zipName = 'invoice/uploads/'.$fileName;
    if(file_exists($zipName)){
        unlink($zipName);
    } 
}


$sql_invoice="insert into invoice(id,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country,shipping_address_postal_code,created_at,modified_at,created_by_id,account_id,gst,status,invoiceno,billingaddressgstin,shippingaddressgstin,billtoname,billfromname,placeofsupply,invoicedate,invoice_datefilter,adjustments,billfrompan,billingfromemail,billingfromphone,billtopan,billingtoemail,billingtophone,billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions,holder_name,bankname,accountno,ifsc,bank_upi,duedate,billing_entity_id,filename,user_name,paymentstatus,bankaccount_type) values('$id','$billing_address_street','$billing_address_city','$billing_address_state','$billing_address_country','$billing_address_postal_code','$shipping_address_street','$shipping_address_city','$shipping_address_state','$shipping_address_country','$shipping_address_postal_code','$created_at','$modified_at','$created_by_id','$account_id','$g_s_t','Pending','$invoice_number','$billingaddressgstin','$shippingaddressgstin','$billtoname','$billfromname','$placeofsupply','$invoicedate','$date','$adjustment','$billfrompanno','$billfromemail','$billfromphone','$billtopanno','$billtoemail','$billtophone','$billfrom_udyamno','$billto_udyamno','$po_so_number','$terms_conditions','$bank_holder_name','$bank_name','$account_no','$IFSCcode','$bank_UPI','$duedate', '$billing_entity_id','$fileName','$user_name','Not paid','$account_type')";

$result_invoice=mysqli_query($conn,$sql_invoice);

/*$sql_fetch = "select id from invoice order by id desc limit 0,1";
$result_fetch=mysqli_query($conn,$sql_fetch);*/

$invoice_id = mysqli_insert_id($conn);
// echo 'invoice_id: ===> '.$invoice_id;

$total_invoice_val = ($_REQUEST['total_invoice_val']) ? $_REQUEST['total_invoice_val'] : '0';
$invoice_disc_option = ($_REQUEST['Invoice_Percentage_select']=='Percentage') ? '%' : ($_REQUEST['Invoice_Percentage_select']=='Amount') ? 'Rs' : 'Select Type';
$invoice_disc_type = ($_REQUEST['Invoice_Percentage_select']=='Percentage') ? 'Percentage' : ($_REQUEST['Invoice_Percentage_select']=='Amount') ? 'Amount' : 'Select Type';

$invoice_disc_amt = ($_REQUEST['invoice_calculated_disc_amt']) ? $_REQUEST['invoice_calculated_disc_amt'] : '0';
$invoice_subtotal_amount = ($_REQUEST['invoice_subtotal_amount']) ? $_REQUEST['invoice_subtotal_amount'] : '0';
$est_total_discount_amt = ($_REQUEST['invoice_totaldiscount_amount']) ? $_REQUEST['invoice_totaldiscount_amount'] : '0';
$invoice_total_taxes = ($_REQUEST['invoice_totaltaxes_amount']) ? $_REQUEST['invoice_totaltaxes_amount'] : '0';
$invoicetotal_amount = ($_REQUEST['invoicetotal_amount']) ? $_REQUEST['invoicetotal_amount'] : '0';

$invoice_disc_rate = ($_REQUEST['invoice_disc_amt']) ? $_REQUEST['invoice_disc_amt'] : '';
$invoice_gst_type = ($_REQUEST['invoice_gst_type']) ? $_REQUEST['invoice_gst_type'] : '';
$invoice_gst_rate = ($_REQUEST['invoice_calculate_rate']) ? $_REQUEST['invoice_calculate_rate'] : '0.00';
$invoice_cgst_amount = ($_REQUEST['invoice_cgst_amount']) ? $_REQUEST['invoice_cgst_amount'] : '0.00';
$invoice_sgst_amount = ($_REQUEST['invoice_sgst_amount']) ? $_REQUEST['invoice_sgst_amount'] : '0.00';
$invoice_igst_amount = ($_REQUEST['invoice_igst_amount']) ? $_REQUEST['invoice_igst_amount'] : '0.00';

$sql_update="update invoice set sub_total='$invoice_subtotal_amount',total='$invoicetotal_amount',balance='$invoicetotal_amount',discounttype='$invoice_disc_type',discountoption='$invoice_disc_option',discountvalue='$est_total_discount_amt',discountamount='$invoice_disc_amt',gst_rate='$invoice_gst_rate',gst='$invoice_gst_type',cgst='$invoice_cgst_amount',sgst='$invoice_sgst_amount',igst='$invoice_igst_amount',rate='$invoice_disc_rate',total_tax='$invoice_total_taxes',total_discount='$est_total_discount_amt' where id='$id'";
// echo $sql_update;die;
$result_update=mysqli_query($conn,$sql_update);

$discount_type=(isset($_REQUEST['invoice_discount_type'])) ? $_REQUEST['invoice_discount_type'] : '';
$amount_without_gst="";
$invoice_discount_option_item[]="";
$invoice_discount_amount_item[]="";
$per ="";
$total_amount=0;
$len=count($_REQUEST['invoice_item_descr']);
$per1=0;

$invoice_item_name=(isset($_REQUEST['invoice_item_name'])) ? $_REQUEST['invoice_item_name'] : '';
$description=(isset($_REQUEST['invoice_item_descr'])) ? $_REQUEST['invoice_item_descr'] : '';
$hsn=(isset($_REQUEST['invoice_item_hsn'])) ? $_REQUEST['invoice_item_hsn'] : '';
$quantity=(isset($_REQUEST['invoice_item_qty'])) ? $_REQUEST['invoice_item_qty'] : 0;
$rate=(isset($_REQUEST['invoice_item_rate'])) ? $_REQUEST['invoice_item_rate'] : 0;
$amount=(isset($_REQUEST['invoice_item_main_amount'])) ? $_REQUEST['invoice_item_main_amount'] : 0;
$gst_rate=(isset($_REQUEST['invoice_item_gst_discont'])) ? $_REQUEST['invoice_item_gst_discont'] : '';
$discount_type=(isset($_REQUEST['invoice_item_discount_type'])) ? $_REQUEST['invoice_item_discount_type'] : '';
$gst_type=(isset($_REQUEST['invoice_items_selected_gst_type'])) ? $_REQUEST['invoice_items_selected_gst_type'] : '';
$gst_value=(isset($_REQUEST['invoice_item_igst_amount'])) ? $_REQUEST['invoice_item_igst_amount'] : 0;
$invoicetotal_amount=isset($_REQUEST['invoicetotal_amount']) ? $_REQUEST['invoicetotal_amount'] : 0;
// echo '<pre>';print_r($_REQUEST);die;
$total_amount = 0;
$discount_option = '';
$discount_amount = 0;
for ($i=0; $i < $len; $i++)
{
    $cgst=(isset($_REQUEST['invoice_item_cgst_amount'][$i])) ? $_REQUEST['invoice_item_cgst_amount'][$i] : '0';
    $sgst=(isset($_REQUEST['invoice_item_sgst_amount'][$i])) ? $_REQUEST['invoice_item_sgst_amount'][$i] : '0';
    $igst=(isset($_REQUEST['invoice_item_igst_amount'][$i])) ? $_REQUEST['invoice_item_igst_amount'][$i] : '0';

    if(isset($discount_type[$i]) && $discount_type[$i] == 'Percentage'){
        $discount_option = '%';
        $discount_amount = $_REQUEST['invoice_calculated_discount'][$i];
    }
    if(isset($discount_type[$i]) && $discount_type[$i] == 'Amount'){
        $discount_option = 'Rs';
        if(!empty($_REQUEST['invoice_item_discount_rate'][$i]))
        {
            $discount_amount = $amount[$i] - $_REQUEST['invoice_item_discount_rate'][$i];
        }
        else {
            $discount_amount = 0;
        }
    }
    $invoice_item_discount_rate = (isset($_REQUEST['invoice_item_discount_rate'][$i])) ? $_REQUEST['invoice_item_discount_rate'][$i] : 0;
    
    if(isset($_REQUEST['invoice_item_gst_type'][$i]) && $_REQUEST['invoice_item_gst_type'][$i] == 'IGST'){
        $total = (float)$_REQUEST['invoice_item_igst_amount'][$i] + $amount[$i];
        $total_amount = $total_amount - $total;
    }
    if(isset($_REQUEST['invoice_item_gst_type'][$i]) && $_REQUEST['invoice_item_gst_type'][$i] == 'CGST'){
        $total = (float)$_REQUEST['invoice_item_cgst_amount'][$i] + (float)$_REQUEST['invoice_item_cgst_amount'][$i] + (float)$amount[$i];
        $total_amount = $total_amount - $total;
    }
    if(isset($_REQUEST['invoice_item_gst_type'][$i]) && ($_REQUEST['invoice_item_gst_type'][$i] == 'IGST' || $_REQUEST['invoice_item_gst_type'][$i] == 'CGST')){
        $total_amount = $total_amount - $total;
    }
    
    $sql_invoice_items="insert into invoice_items(invoice_id,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,date,total,discounttype,discountoption,discountvalue,discountamount,gst_type,gst_value) values('$id','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount[$i]','$gst_rate[$i]','$igst','$cgst','$sgst','$created_at','$invoicetotal_amount','$discount_type[$i]','$discount_option','$invoice_item_discount_rate','$discount_amount','$gst_type','$gst_value[$i]')";
    // echo $sql_invoice_items;// die;
    $result_invoice_items = mysqli_query($conn,$sql_invoice_items);
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


// ============== Code for inserting into the table which is useful for report generations ==================
/*$get_report_rec = "select * from financial_reports where billing_entity_id = '$billing_entity_id' and account_id = '$account_id' ";
$result_get_finance=mysqli_query($conn,$get_report_rec);
$row_report=mysqli_fetch_assoc($result_get_finance);
if(empty($row_report)){
    $finance_report_entry = "insert into financial_reports(billing_entity_id,billing_entity_name,account_id,account_name,invoice_count,billing_amount,balance)values('$billing_entity_id','$billfromname','$account_id','$billtoname','1','$invoicetotal_amount','$invoicetotal_amount')";
    $result_finance=mysqli_query($conn,$finance_report_entry);
    $finance_report_id = mysqli_insert_id($conn);
}
else {
    $amount = $row_report['billing_amount'] + $invoicetotal_amount;
    $invoice_count = $row_report['invoice_count'] + 1;
    
    $update_finance_report_entry = "update financial_reports set billing_amount = '$amount', balance = '$amount', invoice_count = '$invoice_count' where billing_entity_id = '$billing_entity_id' and account_id = '$account_id' ";
    $result_finance=mysqli_query($conn,$update_finance_report_entry);
    $finance_report_id = $row_report["id"];
}

$reports_date_entry = "insert into financial_report_dates(financial_report_id,invoice_id,invoice_number,invoice_date_show,invoice_date,due_date_show,invoice_due_date,payment_date_show,payment_date)values('$finance_report_id','$id','$invoice_number','$invoicedate','$oldDate','$duedate','$oldDate1','','')";
$result_finance=mysqli_query($conn,$reports_date_entry);*/
// ============== Code for inserting into the table which is useful for report generations ==================



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
$data["msg"]    = "Invoice Created Successfully!";
$data = array("status" => "true", "msg" => "Invoice Created Successfully!");
echo json_encode($data); 
return true;
;?>
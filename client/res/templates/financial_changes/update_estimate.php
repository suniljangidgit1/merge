<?php
session_start();
// error_reporting(~E_ALL);

$user_name = $_SESSION['Login'];

// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

date_default_timezone_set('asia/kolkata');

// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data["status"] = "false";
$data["msg"]    = "Invalid request!";

$sql4 = "select * from user where user_name='$user_name'";
$result4 = mysqli_query($conn, $sql4);
$row4 = mysqli_fetch_assoc($result4);
$user=$row4['user_name'];

$id = $_REQUEST['recordId'];
$sql1 = "select * from estimate where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql12 = "select * from estimate_files where estimate_id='$id'";
$result12 = mysqli_query($conn, $sql12);
$row12 = mysqli_fetch_assoc($result12);
// $zip_fileName=$row12['original_filename'];

$sql6 = "select * from estimates_items where estimate_id='$id'";
$result6 = mysqli_query($conn, $sql6);
$added_items = 0;
while ($row6 = mysqli_fetch_assoc($result6))
{   
    $added_items++;
}
// echo '<pre>';print_r($_REQUEST);die;
$created_by_id = $row4['id'];
$is_admin = $row4['is_admin'];

$billfromname=$_REQUEST['billfromname'];
$billtoname=$_REQUEST['billtoname'];

$billing_address_street=$_REQUEST['billing_address_street'];
$billing_address_city=$_REQUEST['billing_address_city'];
$billing_address_state=$_REQUEST['billing_address_state'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code'];
$billing_address_country=(isset($_REQUEST['billing_address_country'])) ? $_REQUEST['billing_address_country'] : '';
$billingaddressgstin=$_REQUEST['billingaddressgstin'];
$billfrompanno = $_REQUEST['billingaddresspanno'];
$billfromemail = $_REQUEST['billingemailaddress'];
$billfromphone = $_REQUEST['billingphoneno'];
$billfrom_udyamno = $_REQUEST['billingfrom_udyamno'];

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

$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");

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

$er_existingFileName  = $_REQUEST["existing_file_name"];

$fileName =  '';

//File uploading
$allFiles='estimate/uploads/';

$zipFiles = "estimate/zipFolder/";
$zipFile = glob($zipFiles.'/*');

if(!empty($_FILES["attachment"]["name"][0]))
{   
    $uploads_dir = 'estimate/uploads/';
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
        // chmod($uploads_dir, 0755);
    }

    $zip = new ZipArchive();
    // Count total files
    $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads");

    $fileName = $row1["filename"];
    $zip_name = getcwd()."/estimate/zipFolder/".$fileName;

    $fileconpress = 'estimate/zipFolder/'.$row1['filename'];
    $conpress = $zip->open($fileconpress);

    foreach($files as $filename)
    {
        if ($filename !== '.' && $filename !== '..')
        {
            if($conpress === true)
            {
                $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads/".$filename;
                $zip->addFromString($filename, file_get_contents($filecontent));
                
                $delete_files = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/estimate/uploads/".$filename;

                if(file_exists($delete_files)){
                   unlink($delete_files);
                }   
            }   
        }
    }
    $zip->close();

    // To check s3 bucket existing folder size in gb
    if(file_exists($fileName))
    {
        clearstatcache();
        $size = filesize($fileconpress);

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
    /*include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3Connect.php');
    $result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$row1['filename'],
    ));*/
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
    $result = $client->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$row1['filename'],
    ));

    $source = 'estimate/zipFolder/'.$row1['filename'];

    // $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';
    $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$row1['filename'];

    /*$manager = new \Aws\S3\Transfer($s3, $source, $dest);

    $manager->transfer();*/
    $result = $client->putObject([
        'Bucket' => 'fincrm',
        'Key'    => $dest,
        'SourceFile' => $source         
    ]);

    $zipName = 'estimate/zipFolder/'.$er_existingFileName;
    if(file_exists($zipName)){
        unlink($zipName);
    }
}
else if($zipFile)
{
    foreach($zipFile as $file)
    {
        if(is_file($file))
        {
            unlink($file);
        }
    }
    /*$zipName = 'estimate/zipFolder/'.$er_existingFileName;
    if(file_exists($zipName)){
        unlink($zipName);
    }*/
}
/*else 
{
    $zip = new ZipArchive();
    $fileName =  time().date("YmdHis").".zip";
    $newfileName = $fileName;
    $zip_name = getcwd()."/estimate/zipFolder/".$fileName;

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
    $size = filesize('estimate/zipFolder/'.$fileName);
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3bucketfoldersize.php');
    $objS3buket         = new S3bucketfoldersize();
    $s3BucketSize       = $objS3buket->FolderSize();
    $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
    $planStorageLimit   = $objS3buket->getDomainStorageLimit();
    $finalExisting      = ( $s3BucketSize + $currentFileSize );
    // $finalExisting = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
    $planStorageLimit   = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

    if( $finalExisting > $planStorageLimit )
    {
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
   
    // To check s3 bucket existing folder size in gb

    // s3 bucket transfer
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3Connect.php');
    $source = 'estimate/uploads/';

    $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';

    $manager = new \Aws\S3\Transfer($s3, $source, $dest);

    $manager->transfer();

    $zip_name = 'estimate/zipFolder/'.$fileName;
    if(file_exists($zip_name)){
        unlink($zip_name);
    }
}*/
// $sql_update="update estimate set sub_total='$estimate_subtotal_amount',total='$estimatetotal_amount',discounttype='$estimate_disc_type',discountoption='$estimate_disc_option',discountvalue='$est_total_discount_amt',discountamount='$estimate_disc_amt',gst_rate='$estimate_gst_rate',g_s_t='$estimate_gst_type',c_g_s_t='$estimate_cgst_amount',s_g_s_t='$estimate_sgst_amount',igst='$estimate_igst_amount',rate='$estimate_disc_rate' where id='$id'";

$sql_estimate = "update estimate set billfromname='$billfromname',billtoname='$billtoname',billing_address_street='$billing_address_street',billing_address_city='$billing_address_city',billing_address_state='$billing_address_state',billing_address_postal_code='$billing_address_postal_code',billing_address_country='$billing_address_country',billingaddressgstin='$billingaddressgstin',billfrompanno='$billfrompanno',shipping_address_street='$shipping_address_street',shipping_address_city='$shipping_address_city',shipping_address_state='$shipping_address_state',shipping_address_postal_code='$shipping_address_postal_code',shipping_address_country='$shipping_address_country',shippingaddressgstin='$shippingaddressgstin',billtopanno='$billtopanno',account_id='$account_id',date='$date',status='Pending',invoice_number='$estimate_number',discounttype='$estimate_disc_type',placeofsupply='$placeofsupply',sub_total='$estimate_subtotal_amount',total='$estimatetotal_amount',discountoption='$estimate_disc_option',discountvalue='$est_total_discount_amt',discountamount='$estimate_disc_amt',gst_rate='$estimate_gst_rate',g_s_t='$estimate_gst_type',c_g_s_t='$estimate_cgst_amount',s_g_s_t='$estimate_sgst_amount',igst='$estimate_igst_amount',rate='$estimate_disc_rate',estimatedate='$estimatedate',billingfromemail='$billfromemail',billingfromphone='$billfromphone',billingtoemail='$billtoemail',billingtophone='$billtophone',billingfrom_udyamno='$billfrom_udyamno',billingto_udyamno='$billto_udyamno',po_order_no='$po_so_number',terms_conditions='$terms_conditions',filename='$fileName' where id='$id'";
$result_estimate = mysqli_query($conn, $sql_estimate);

$discount_type=(isset($_REQUEST['discount_type'])) ? $_REQUEST['discount_type'] : '';
$amount_without_gst="";
$estimate_discount_option_item[]="";
$estimate_discount_amount_item[]="";
$per ="";
$total_amount=0;
$len=count($_REQUEST['edit_item_descr']);
$per1=0;

$item_name=(isset($_REQUEST['item_name'])) ? $_REQUEST['item_name'] : '';
$description=($_REQUEST['edit_item_descr']) ? $_REQUEST['edit_item_descr'] : '';
$hsn=($_REQUEST['edit_item_hsn']) ? $_REQUEST['edit_item_hsn'] : '';
$quantity=($_REQUEST['edit_item_qty']) ? $_REQUEST['edit_item_qty'] : 0;
$rate=($_REQUEST['edit_item_rate']) ? $_REQUEST['edit_item_rate'] : 0;
$amount=($_REQUEST['edit_item_main_amount']) ? $_REQUEST['edit_item_main_amount'] : 0;
$gst_rate=($_REQUEST['edit_item_gst_discont']) ? $_REQUEST['edit_item_gst_discont'] : 0;
$discount_type=($_REQUEST['edit_item_discount_type']) ? $_REQUEST['edit_item_discount_type'] : 0;
$discount_rate=($_REQUEST['edit_item_discount_rate']) ? $_REQUEST['edit_item_discount_rate'] : 0;
// echo "<pre>";print_r($_REQUEST);die;
$total_amount = 0;
$total = 0;
$discount_option = '';
$discount_amount = 0;
$cgst=$sgst=$igst=0;
$sql_delete_item = "delete from estimates_items where estimate_id = '".$id."' ";
mysqli_query($conn,$sql_delete_item);

for ($i=0; $i < $len; $i++)
{
    $cgst=(isset($_REQUEST['edit_item_cgst_amount'][$i])) ? $_REQUEST['edit_item_cgst_amount'][$i] : '0';
    $sgst=(isset($_REQUEST['edit_item_sgst_amount'][$i])) ? $_REQUEST['edit_item_sgst_amount'][$i] : '0';
    $igst=(isset($_REQUEST['edit_item_igst_amount'][$i])) ? $_REQUEST['edit_item_igst_amount'][$i] : '0';

    if($discount_type[$i] == 'Percentage'){
        $discount_option = '%';
        $discount_amount = $_REQUEST['calculated_discount'][$i];
    }
    if($discount_type[$i] == 'Amount'){
        $discount_option = 'Rs';
        if($_REQUEST['edit_item_discount_rate'][$i]!=""){
            $discount_amount = $amount[$i] - $_REQUEST['edit_item_discount_rate'][$i];
        }
        else {
            $discount_amount = 0;
        }
    }
    $item_discount_rate = $_REQUEST['edit_item_discount_rate'][$i];
    
    if(isset($_REQUEST['edit_item_gst_type'][$i]) && $_REQUEST['edit_item_gst_type'][$i] == 'IGST'){
        $total = $amount[$i] + $igst;
    }
    if(isset($_REQUEST['edit_item_gst_type'][$i]) && $_REQUEST['edit_item_gst_type'][$i] == 'CGST'){
        $total = $amount[$i] + $cgst + $sgst;
    }
    // $total_amount = $total_amount - $total;
    $sql_estimate_items="insert into estimates_items(estimate_id,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,date,total,discounttype,discountoption,discountvalue,discountamount) values('$id','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount[$i]','$gst_rate[$i]','$igst','$cgst','$sgst','$created_at','$total','$discount_type[$i]','$discount_option','$item_discount_rate','$discount_amount')";
    $result_estimate_items=mysqli_query($conn,$sql_estimate_items);
    echo mysqli_error($conn);
}
// die;
// // Send estimate pdf as an attachment to mail (send mail code is written in following file)
// require($_SERVER['DOCUMENT_ROOT'].'/pdf/estimate.php');

/*$len = count($_REQUEST['edit_item_descr']);
$dividerate=0;
$per1 = 0;
$item_id = (isset($_REQUEST['item_id'])) ? $_REQUEST['item_id'] : 0;
$total_amount = 0;
for ($i = 0;$i < $len;$i++)
{
    $cgst=(isset($_REQUEST['item_cgst_amount'][$i])) ? $_REQUEST['item_cgst_amount'][$i] : '0';
    $sgst=(isset($_REQUEST['item_sgst_amount'][$i])) ? $_REQUEST['item_sgst_amount'][$i] : '0';
    $igst=(isset($_REQUEST['item_igst_discont'][$i])) ? $_REQUEST['item_igst_discont'][$i] : '0';

    if($discount_type[$i] == 'Percentage'){
        $discount_option = '%';
        $discount_amount = $_REQUEST['calculated_discount'][$i];
    }
    if($discount_type[$i] == 'Amount'){
        $discount_option = 'Rs';
        $discount_amount = $amount[$i] - $_REQUEST['edit_item_discount_rate'][$i];
    }
    $item_discount_rate = $_REQUEST['edit_item_discount_rate'][$i];
    
    if($_REQUEST['edit_item_gst_type'][$i] == 'IGST'){
        $total = $igst[$i] + $amount[$i];
        $total_amount = $total_amount - $total;
    }
    if($_REQUEST['edit_item_gst_type'][$i] == 'CGST'){
        $total = $cgst[$i] + $sgst[$i] + $amount[$i];
        $total_amount = $total_amount - $total;
    }

    if ($added_items <= $i)
    {
        $sql_estimate_items="insert into estimates_items(estimate_id,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,date,total,discounttype,discountoption,discountvalue,discountamount) values('$id','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount[$i]','$gst_rate[$i]','$igst','$cgst','$sgst','$created_at','$total_amount','$discount_type[$i]','$discount_option','$item_discount_rate','$discount_amount')";
        $result_estimate_items = mysqli_query($conn, $sql_estimate_items);
    }
    else
    {
        $sql_estimate_items = "update estimates_items set description='$description[$i]',hsn='$hsn[$i]',quantity='$quantity[$i]',rate='$rate[$i]',amount='$amount[$i]',gst_rate='$gst_rate[$i]',igst='$igst',cgst='$ccst',sgst='$scst',total='$total_amount',discounttype='$discount_type[$i]',discountoption='$discount_option',discountvalue='$item_discount_rate',discountamount='$discount_amount' where id='$item_id[$i]'";
        $result_estimate_items = mysqli_query($conn, $sql_estimate_items);
    }
}*/


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


// echo 1;

// If want to send estimate pdf as an attachment to mail automatically then comment following lines    
$data["status"] = "true";
$data["msg"]    = "Estimate Details Updated Successfully!";
echo json_encode($data); 
return true;
?>
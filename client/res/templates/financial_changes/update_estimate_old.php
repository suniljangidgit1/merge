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

$id = $_POST['recordId'];
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

$created_by_id = $row4['id'];
$is_admin = $row4['is_admin'];

$billfromname = $_REQUEST['billfromname'];
$billtoname = $_REQUEST['billtoname'];
$billing_address_street = $_REQUEST['billing_address_street'];
$billing_address_city = $_REQUEST['billing_address_city'];
$billing_address_state = $_REQUEST['billing_address_state'];
$billing_address_postal_code = $_REQUEST['billing_address_postal_code'];
$billing_address_country = $_REQUEST['billing_address_country'];
$billingaddressgstin = $_REQUEST['billingaddressgstin'];
$billingaddresspan_no = $_REQUEST['billingaddresspan_no'];
$shipping_address_street = $_REQUEST['shipping_address_street'];
$shipping_address_city = $_REQUEST['shipping_address_city'];
$shipping_address_state = $_REQUEST['shipping_address_state'];
$shipping_address_postal_code = $_REQUEST['shipping_address_postal_code'];
$shipping_address_country = $_REQUEST['shipping_address_country'];
$shippingaddressgstin = $_REQUEST['shippingaddressgstin'];
$shippingaddresspan_no = $_REQUEST['shippingaddresspan_no'];
$account_name =$_REQUEST['account_id'];

$invoice_number = $_REQUEST['invoice_number'];
$discount_type = $_REQUEST['discount_type'];
$placeofsupply = $_REQUEST['placeofsupply'];
$g_s_t = $_REQUEST['g_s_t'];

$adjustment = $_REQUEST['adjustment'];

$estimate_discount_amount_invoice = $_REQUEST['estimate_discount_amount_invoice'];
$estimate_discount_option_invoice = $_REQUEST['estimate_discount_option_invoice'];

$sql5 = "select * from account where name='$account_name'";
$result5 = mysqli_query($conn, $sql5);
$row5 = mysqli_fetch_assoc($result5);

$account_id = $row5['id'];

$oldDate1 = strtr($_REQUEST['date'], '/', '-');
$oldDate = strtotime($oldDate1);
$date = date("Y-m-d", $oldDate);
$estimatedate = date("d M Y", strtotime($date));

$item_name = $_REQUEST['item_name'];
$description = $_REQUEST['description'];
$hsn = $_REQUEST['hsn'];
$quantity = $_REQUEST['quantity'];
$rate = $_REQUEST['rate'];

$gst_rate = $_REQUEST['gst_rate'];

$discount = $_REQUEST['estimate_discount_amount_item'];

$discountoption = $_REQUEST['estimate_discount_option_item'];

$created_at = date("Y-m-d h:i:s ");
$modified_at = date("Y-m-d h:i:s ");

//File uploading
if(!empty($_FILES['attachment']['name'][0]))
{
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

    $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id;
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
    //count all files
    $countfiles = count($_FILES['attachment']['name']);
    //loop
    for($i=0;$i<$countfiles;$i++)
    {
        $filename = $_FILES['attachment']['name'][$i];
        $temp = explode('.', $filename);
        $ext  = array_pop($temp);
        $name = implode('.', $temp);
  
        $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$filename;
       
        $zip = new ZipArchive();
        $zipfileName =  $name. ".zip";
        $zip_name = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'.$zipfileName;
         
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
        {
            // $error .= "Sorry ZIP creation is not working currently.<br/>";
            $data["status"] = "false";
            $data["msg"]    = "Sorry ZIP creation is not working currently.";
            echo json_encode($data); 
            return true;
        }
        
        $innerFileName = str_replace(' ', '_', $_FILES['attachment']['name'][$i]);
        $zip->addFromString($innerFileName, file_get_contents($_FILES['attachment']['tmp_name'][$i]));
         
        $zip->close();
        
        // To check s3 bucket existing folder size in gb

        clearstatcache();
        $size = filesize($zip_name);

        // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
        // $objS3buket         = new S3bucketfoldersize();
        
        $s3BucketSize       = $objS3buket->FolderSize();
        $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
        $planStorageLimit   = $objS3buket->getDomainStorageLimit();
        $finalExisting      = ( (int) $s3BucketSize + (int) $currentFileSize );
        // $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;
        $planStorageLimit   = $objS3buket->convertMemorySize( $planStorageLimit."Gb", "b" );

        if( $finalExisting > $planStorageLimit ){

            // delete local file
            $deleteFile = $zip_name;
            if( file_exists($deleteFile) ){
                unlink($deleteFile);
            }

            $data["status"] = "false";
            $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
            echo json_encode($data); 
            return true;
        }
           
        // To check s3 bucket existing folder size in gb
        
        // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

        // Where the files will be source from
        $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';

        // Where the files will be transferred to
        $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';

        // Create a transfer object
        $manager = new \Aws\S3\Transfer($s3, $source, $dest);

        // Perform the transfer synchronously
        $manager->transfer();


        $sql_estimates_files="insert into estimate_files(estimate_id,filepath,original_filename)values('$id','$filepath','$filename')";
        $result_estimates_files=mysqli_query($conn,$sql_estimates_files);
        @unlink($filepath);
    }
    $i++; 
}

$amount_without_gst = 0;
$igst_total = 0;
$per = 0;

$sql_estimate = "update estimate set billfromname='$billfromname',billtoname='$billtoname',billing_address_street='$billing_address_street',billing_address_city='$billing_address_city',billing_address_state='$billing_address_state',billing_address_postal_code='$billing_address_postal_code',billing_address_country='$billing_address_country',billingaddressgstin='$billingaddressgstin',billfrompanno='$billingaddresspan_no',shipping_address_street='$shipping_address_street',shipping_address_city='$shipping_address_city',shipping_address_state='$shipping_address_state',shipping_address_postal_code='$shipping_address_postal_code',shipping_address_country='$shipping_address_country',shippingaddressgstin='$shippingaddressgstin',billtopanno='$shippingaddresspan_no',account_id='$account_id',date='$date',invoice_number='$invoice_number',discounttype='$discount_type',placeofsupply='$placeofsupply',g_s_t='$g_s_t' where id='$id'";

$result_estimate = mysqli_query($conn, $sql_estimate);

$len = count($_REQUEST['item_name']);
$dividerate=0;
$per1 = 0;
$item_id = $_REQUEST['item_id'];
$total_amount = 0;
for ($i = 0;$i < $len;$i++)
{

    $amount = (float)$rate[$i] * (float)$quantity[$i];

    if ($discount_type == 'At item level')
    {
        $estimate_discount_amount_item = $_REQUEST['estimate_discount_amount_item'];
        $estimate_discount_option_item = $_REQUEST['estimate_discount_option_item'];

        if ($estimate_discount_option_item[$i] == '%')
        {
            $per = (float)$amount * (float)$estimate_discount_amount_item[$i] / 100;
            $amount = (float)$amount - (float)$per;
        }
        else if ($estimate_discount_option_item[$i] == 'Rs')
        {
            $per = 0;
            $amount = (float)$amount - (float)$estimate_discount_amount_item[$i];
        }

    }
    else if ($discount_type == 'At invoice level')
    {
        $estimate_discount_amount_invoice = $_REQUEST['estimate_discount_amount_invoice'];
        $estimate_discount_option_invoice = $_REQUEST['estimate_discount_option_invoice'];

        if ($estimate_discount_option_invoice== '%')
        {
            $per = (float)$amount * (float)$estimate_discount_amount_invoice / 100;
            $amount = (float)$amount - (float)$per;
            // $per1 = $per1 + $per;

        }
        else if($estimate_discount_option_invoice== 'Rs')
        {
            $per1 = 0;
            $amount = (float)$amount - (float)$estimate_discount_amount_invoice;

        }

    }

    if ($g_s_t == 'IGST')
    {

        $igst = (float)$amount * (float)$gst_rate[$i] / 100;
        $total = (float)$igst + (float)$amount;
        $scst = 0.0;
        $igst_total=0;
        $gstTotal=0;

        $total_amount = (float)$total_amount + (float)$total;
        $igst_total=(float)$igst_total + (float)$igst;
        $gstTotal= $igst_total;
    }
    else if ($g_s_t == 'CGST/SGST')
    {

        $dividerate = $gst_rate[$i] / 2;
        $scst = (float)$amount * (float)$dividerate / 100;
        $total = (float)$scst + (float)$scst + (float)$amount;
        $igst = 0.0;
        $cgst_total=0;
         $sgst=0;
         $cgst=0;
        $total_amount = (float)$total_amount + (float)$total;


    $cgst_total=(float)$cgst_total+(float)$scst + (float)$scst;
    
    $sgst= $cgst_total;
    $cgst= $cgst_total;

    }

    if ($added_items <= $i)
    {

        $sql_estimate_items = "insert into estimates_items(estimate_id,item_name,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,total,discounttype,discountoption,discountvalue,discountamount)values('$id','$item_name[$i]','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount','$gst_rate[$i]','$gstTotal','$scst','$scst','$total','$discount_type','$estimate_discount_option_invoice','$estimate_discount_amount_invoice','$per')";

        $result_estimate_items = mysqli_query($conn, $sql_estimate_items);

    }
    else
    {

        $sql_estimate_items = "update estimates_items set item_name='$item_name[$i]',description='$description[$i]',hsn='$hsn[$i]',quantity='$quantity[$i]',rate='$rate[$i]',amount='$amount',gst_rate='$gst_rate[$i]',igst='$igst',cgst='$scst',sgst='$scst',total='$total',discounttype='$discount_type',discountoption='$discountoption[$i]',discountvalue='$discount[$i]',discountamount='$per' where id='$item_id[$i]'";

        $result_estimate_items = mysqli_query($conn, $sql_estimate_items);

    }
}

$total_amount = (float)$total_amount - (float)$adjustment;

if ($g_s_t == 'IGST')
{
$sql_update = "update estimate set total='$total_amount',discounttype='$discount_type',discountoption='$estimate_discount_option_invoice',discountvalue='$estimate_discount_amount_invoice',discountamount='$per1',igst='$gstTotal' where id='$id'";
$result_update = mysqli_query($conn, $sql_update);
}
else if ($g_s_t == 'CGST/SGST')
{

$sql_update = "update estimates set total='$total_amount',discounttype='$discount_type',discountoption='$estimate_discount_option_invoice',discountvalue='$estimate_discount_amount_invoice',discountamount='$per1',s_g_s_t='$sgst',c_g_s_t='$cgst' where id='$id'";
$result_update = mysqli_query($conn, $sql_update);

}



  
function delete_directory($uploads_dir) 
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
    delete_directory('uploads/');


// echo 1;
$data["status"] = "true";
$data["msg"]    = "Updated Successfully!";
echo json_encode($data); 
return true;
;?>
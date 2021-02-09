
<?php
session_start();
// error_reporting(~E_ALL);

$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
// $entity_name=$_SESSION['name'];
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
$id = $_POST['recordId'];


$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];

$billfromname=$_REQUEST['billfromname_invoice'];
$billtoname=$_REQUEST['billtoname_invoice'];

$billing_address_street=$_REQUEST['billing_address_street_invoice'];
$shipping_address_street=$_REQUEST['shipping_address_street_invoice'];
$billing_address_city=$_REQUEST['billing_address_city_invoice'];
$billing_address_state=$_REQUEST['billing_address_state_invoice'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code_invoice'];
$shipping_address_city=$_REQUEST['shipping_address_city_invoice'];
$shipping_address_state=$_REQUEST['shipping_address_state_invoice'];

$shipping_address_postal_code=$_REQUEST['shipping_address_postal_code_invoice'];
$billing_address_country=$_REQUEST['billing_address_country_invoice'];
$shipping_address_country=$_REQUEST['shipping_address_country_invoice'];
$billingaddressgstin=$_REQUEST['billingaddressgstin_invoice'];
$shippingaddressgstin=$_REQUEST['shippingaddressgstin_invoice'];
$billingaddresspanno_invoice=$_REQUEST['billingaddresspanno_invoice'];
$shippingaddresspanno_invoice=$_REQUEST['shippingaddresspanno_invoice'];

$account_name=$_REQUEST['account_id_invoice'];
$placeofsupply=$_REQUEST['placeofsupply_invoice'];
$adjustment=$_REQUEST['adjustment_invoice'];

$estimate_discount_amount_item=$_REQUEST['estimate_discount_amount_item_invoice'];
$estimate_discount_option_item=$_REQUEST['estimate_discount_option_item_invoice'];
$estimate_discount_amount_invoice=$_REQUEST['estimate_discount_amount_invoice'];
$estimate_discount_option_invoice=$_REQUEST['estimate_discount_option_invoice'];


$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=$row5['id'];


$oldDate1= strtr($_REQUEST['date_invoice'], '/', '-');
    $oldDate= strtotime($oldDate1);
    $date= date("Y-m-d", $oldDate);
$invoice_number=$_REQUEST['invoice_number_invoice'];
$status=$_REQUEST['status_invoice'];


$item_name=$_REQUEST['item_invoice_name'];
$description=$_REQUEST['description_invoice'];
$hsn=$_REQUEST['hsn_invoice'];
$quantity=$_REQUEST['quantity_invoice'];
$rate=$_REQUEST['rate_invoice'];
$amount=$_REQUEST['amount'];
$gst_rate=$_REQUEST['gst_rate_invoice'];
$g_s_t=$_REQUEST['g_s_t_invoice'];


$oldDate2= strtr($_REQUEST['orderdate_invoice'], '/', '-');
    $oldDate3= strtotime($oldDate2);
    $orderdate= date("Y-m-d", $oldDate3);

// $orderdate=$_REQUEST['orderdate'];
$invoiceno=$_REQUEST['invoiceno_invoice'];
$discount_type=$_REQUEST['discount_type_invoice'];
$oldDate4= strtr($_REQUEST['invoicedate_invoice'], '/', '-');
    $oldDate5= strtotime($oldDate4);
    $invoicedate= date("Y-m-d", $oldDate5);

// $invoicedate=$_REQUEST['invoicedate'];
$invoicedate=date("d M Y",strtotime($invoicedate));

$buyerorderno=$_REQUEST['buyerorderno_invoice'];

$oldDate6= strtr($_REQUEST['duedate_invoice'], '/', '-');
$oldDate7= strtotime($oldDate6);
$duedate= date("Y-m-d", $oldDate7);
$due_date=date("d M Y",strtotime($duedate));
$beneficiary=$_REQUEST['beneficiary_invoice'];
$bankname=$_REQUEST['bankname_invoice'];
$branch=$_REQUEST['branch_invoice'];
$accountno=$_REQUEST['accountno_invoice'];
$ifsc=$_REQUEST['ifsc_invoice'];

$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");

$id = $_POST['recordId'];

$sql7="select * from invoice where id='$id'";
$result7=mysqli_query($conn,$sql7);
$row7=mysqli_fetch_assoc($result7);
$estimate_id=$row7['estimateid'];

$sql12 = "select * from invoice_files where invoice_id='$id'";
$result12 = mysqli_query($conn, $sql12);
$row12 = mysqli_fetch_assoc($result12);
// $zip_fileName=$row12['original_filename'];


$sql6="select * from invoice_items where invoice_id='$id'";
$result6=mysqli_query($conn,$sql6);
$added_items=0;
while ($row6=mysqli_fetch_assoc($result6)) {
    $added_items++;
}


//file Uploading ...
if($_FILES['file_invoice']['name']!='')
{

    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

    $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id;
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
     
    // Count total files
    $countfiles = count($_FILES['file_invoice']['name']);
    // Looping all files
    for($i=0;$i<$countfiles;$i++)
    {
        $filename = $_FILES['file_invoice']['name'][$i];
        $temp = explode('.', $filename);
        $ext  = array_pop($temp);
        $name = implode('.', $temp);
  
        $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$filename;
       
        $zip = new ZipArchive();
        $zipfileName =  $name. ".zip";
        $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$zipfileName;
         
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
        {
            // $error .= "Sorry ZIP creation is not working currently.<br/>";
            $data["status"] = "false";
            $data["msg"]    = "Sorry ZIP creation is not working currently.";
            echo json_encode($data); 
            return true;
        }
        
        $innerFileName = str_replace(' ', '_', $_FILES['file_invoice']['name'][$i]);
        $zip->addFromString($innerFileName, file_get_contents($_FILES['file_invoice']['tmp_name'][$i]));
         
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
        
        // Where the files will be source from
        $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/';

        // Where the files will be transferred to
        $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/';

        // Create a transfer object
        $manager = new \Aws\S3\Transfer($s3, $source, $dest);

        // Perform the transfer synchronously
        $manager->transfer();

        $sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$id','$filepath','$filename')";
        $result_invoices_files=mysqli_query($conn,$sql_invoices_files);
        @unlink($filepath);
    }
    $i++; 
}

$sql_invoice="update invoice set billing_address_street='$billing_address_street',billing_address_city='$billing_address_city',billing_address_state='$billing_address_state',billing_address_country='$billing_address_country',billing_address_postal_code='$billing_address_postal_code',shipping_address_street='$shipping_address_street',billfrompan='$billingaddresspanno_invoice',shipping_address_city='$shipping_address_city',shipping_address_state='$shipping_address_state',shipping_address_country='$shipping_address_country',shipping_address_postal_code='$shipping_address_postal_code',billtopan='$shippingaddresspanno_invoice',modified_at='$modified_at',account_id='$account_id',gst='$g_s_t',estimateno='$invoice_number',date='$date',billingaddressgstin='$billingaddressgstin',shippingaddressgstin='$shippingaddressgstin',billtoname='$billtoname',billfromname='$billfromname',placeofsupply='$placeofsupply',orderdate='$orderdate',invoiceno='$invoiceno',invoicedate='$invoicedate',buyerorderno='$buyerorderno',duedate='$duedate',beneficiary='$beneficiary',bankname='$bankname',branch='$branch',accountno='$accountno',ifsc='$ifsc',adjustments='$adjustment',discounttype='$discount_type' where id='$id'";

// echo $sql_invoice;die;

$result_estimate=mysqli_query($conn,$sql_invoice);

// echo mysqli_error($conn);

$len=count($_REQUEST['item_invoice_name']);
$item_id=$_REQUEST['item_invoice_id'];
$total_amount=0;
$igst_total=0;
$amount_without_gst=0;
$discount_type=$_REQUEST['discount_type_invoice'];
$per1=0;
$per=0;



for ($i=0; $i < $len; $i++) { 

    $amount=(float)$rate[$i] *  (float)$quantity[$i];

 $amount_without_gst=(float)$amount_without_gst + (float)$amount;

     if($discount_type=='At item level')
    {
        $estimate_discount_amount_item=$_REQUEST['estimate_discount_amount_item_invoice'];
        $estimate_discount_option_item=$_REQUEST['estimate_discount_option_item_invoice'];

        if($estimate_discount_option_item== '%')
        {
                $per=(float)$amount * (float)$estimate_discount_amount_item[$i]/100; 
                $amount=(float)$amount -  (float)$per;
        }
        else if($estimate_discount_option_item== 'Rs')
        {
            $per=0;
            $amount=(float)$amount -  (float)$estimate_discount_amount_item[$i];
        }


    }
    else if($discount_type=='At invoice level')
    {
        $estimate_discount_amount_invoice=$_REQUEST['estimate_discount_amount_invoice'];
        $estimate_discount_option_invoice=$_REQUEST['estimate_discount_option_invoice'];

        if($estimate_discount_option_invoice=='%')
        {
                $per=(float)$amount * (float)$estimate_discount_amount_invoice/100; 
                $amount=(float)$amount -  (float)$per;
                $per1= (float)$per1 + (float)$per;
        }
        else if($estimate_discount_option_invoice=='Rs')
        {
                $per1=0;
                $amount=(float)$amount-  (float)$estimate_discount_amount_invoice;
        }

    // $total_amount=$amount1 + $igst_total + $cgst_total; 
    }

if($g_s_t=='IGST')
{
    $igst=(float)$amount * (float)$gst_rate[$i]/100;
    $total=(float)$igst + (float)$amount;
    $scst=0.0;
    $total_amount=(float)$total_amount + (float)$total;
 $igst_total=(float)$igst_total + (float)$igst;
    // echo "amount=".$amount."rate=".$gst_rate[$i]."igst=".$igst."<br>";

}
else if($g_s_t=='CGST/SGST')
{
    $dividerate=(float)$gst_rate[$i]/2;
    $scst=(float)$amount * (float)$dividerate/100;
    $total=(float)$scst + (float)$scst + (float)$amount;
    $igst=0.0;
    $cgst_total=0;
        $total_amount=(float)$total_amount + (float)$total;
 $cgst_total=(float)$cgst_total+(float)$scst + (float)$scst;
}
else
{
    $total_amount=(float)$total_amount + (float)$amount;
}

if($added_items <= $i)
    {


$sql_estimate_items="insert into invoice_items(estimate_id,invoice_id,item_name,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,total,discounttype,discountoption,discountvalue,discountamount)values('$estimate_id','$id','$item_name[$i]','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount','$gst_rate[$i]','$igst','$scst','$scst','$total','$discount_type','$estimate_discount_option_invoice','$estimate_discount_amount_invoice','$per')";
// echo $sql_estimate_items ;die();
$result_estimate_items=mysqli_query($conn,$sql_estimate_items);

}
else
{
$sql_estimate_items="update invoice_items set item_name='$item_name[$i]',description='$description[$i]',hsn='$hsn[$i]',quantity='$quantity[$i]',rate='$rate[$i]',amount='$amount',gst_rate='$gst_rate[$i]',igst='$igst',cgst='$scst',sgst='$scst',total='$total',discounttype='$discount_type',discountoption='$estimate_discount_option_item[$i]',discountvalue='$estimate_discount_amount_item[$i]',discountamount='$per' where id='$item_id[$i]'";

// echo $sql_estimate_items ;die();
$result_estimate_items=mysqli_query($conn,$sql_estimate_items);

}
// echo mysqli_error($conn);


}


$received_amount=0;
$tds=0;
$sql5="select * from payments where invoiceno='$invoiceno'";
$result5=mysqli_query($conn,$sql5);
while($row5=mysqli_fetch_assoc($result5))
{
    $received_amount=$received_amount + $row5['amountcredited'];
    $tds=$tds + $row5['tds'];
}

//  if($discount_type=='At invoice level')
//     {
//         $estimate_discount_amount_invoice=$_REQUEST['estimate_discount_amount_invoice'];
//         $estimate_discount_option_invoice=$_REQUEST['estimate_discount_option_invoice'];

//         if($estimate_discount_option_invoice=='%')
//         {
//                 $per1=$amount_without_gst * $estimate_discount_amount_invoice/100; 
//                 $amount1=$amount_without_gst -  $per1;
//         }
//         else if($estimate_discount_option_invoice=='Rs')
//         {
//                 $per1=0;
//                 $amount1=$amount_without_gst-  $estimate_discount_amount_invoice;
//         }

//     $total_amount=$amount1 + $igst_total + $cgst_total; 
//     }

$total_amount= (float)$total_amount - (float)$adjustment;

$balance=$total_amount - $received_amount - $tds;

$oldDate8= strtr($_REQUEST['invoicedate_invoice'], '/', '-');
$oldDate9= strtotime($oldDate8);
$invoicedate1= date("d-m-Y");

function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1);  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
} 
// Function call to find date difference 
$dateDiff = dateDiffInDays($invoicedate1, $duedate); 

if(strtotime($duedate) == strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due today";
}
else if($balance==0)
{
    $paymentstatus="Paid";
}
else if(strtotime($duedate) > strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Due in ".$dateDiff." days";
}
else  if(strtotime($duedate) < strtotime(date("Y-m-d")) && $balance==$total_amount)
{
    $paymentstatus="Over Due by ".$dateDiff." days";
}
else
{
    $paymentstatus="Partially paid";
}

$sql_update="update invoice set total='$total_amount',balance='$balance',paymentstatus='$paymentstatus',due_date='$due_date',discounttype='$discount_type',discountoption='$estimate_discount_option_invoice',discountvalue='$estimate_discount_amount_invoice',discountamount='$per1' where id='$id'";
$result_update=mysqli_query($conn,$sql_update);


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
$data["msg"]    = "Updated successfully!";
echo json_encode($data); 
return true;
;?>
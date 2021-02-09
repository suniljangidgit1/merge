
<?php
session_start();
// error_reporting(~E_ALL);
  
$user_name = $_SESSION['Login'];
// $entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];
date_default_timezone_set('asia/kolkata');   

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$estimate_discount_option_invoice="";
$estimate_discount_amount_invoice=""; 

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
$billtoname=$_REQUEST['billtoname'];

$billing_address_street=$_REQUEST['billing_address_street'];
$shipping_address_street=$_REQUEST['shipping_address_street'];
$billing_address_city=$_REQUEST['billing_address_city'];
$billing_address_state=$_REQUEST['billing_address_state'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code'];
$shipping_address_city=$_REQUEST['shipping_address_city'];
$shipping_address_state=$_REQUEST['shipping_address_state'];

$shipping_address_postal_code=$_REQUEST['shipping_address_postal_code'];
$billing_address_country=$_REQUEST['billing_address_country'];
$shipping_address_country=$_REQUEST['shipping_address_country'];
$billingaddressgstin=$_REQUEST['billingaddressgstin'];
$shippingaddressgstin=$_REQUEST['shippingaddressgstin'];

$account_name=$_REQUEST['account_id'];

$placeofsupply=$_REQUEST['placeofsupply'];
$adjustment=$_REQUEST['invoice_adjustment'];

$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=$row5['id'];

$oldDate1= strtr($_REQUEST['invoicedate'], '/', '-');
    $oldDate= strtotime($oldDate1);
    $date= date("d-m-Y", $oldDate);
$invoice_number=$_REQUEST['invoiceno'];
// $status=$_REQUEST['status'];
$status="";

$item_name=$_REQUEST['item_name'];
$description=$_REQUEST['description'];
$hsn=$_REQUEST['hsn'];
$quantity=$_REQUEST['quantity'];
$rate=$_REQUEST['rate'];
$amount=$_REQUEST['amount'];
$gst_rate=$_REQUEST['gst_rate'];
$g_s_t=$_REQUEST['g_s_t'];
$billfrompan = $_REQUEST['billingaddresspanno_invoice'];
$billtopan = $_REQUEST['shippingaddresspanno_invoice'];


$oldDate2= strtr($_REQUEST['orderdate'], '/', '-');
    $oldDate3= strtotime($oldDate2);
    $orderdate= date("Y-m-d", $oldDate3);

// $orderdate=$_REQUEST['orderdate'];
$invoiceno=$_REQUEST['invoiceno'];

$oldDate4= strtr($_REQUEST['invoicedate'], '/', '-');
    $oldDate5= strtotime($oldDate4);
    $invoicedate= date("Y-m-d", $oldDate5);

// $invoicedate=$_REQUEST['invoicedate'];
$invoicedate=date("d M Y",strtotime($invoicedate));

$buyerorderno=$_REQUEST['buyerorderno'];

$oldDate6= strtr($_REQUEST['duedate'], '/', '-');
$oldDate7= strtotime($oldDate6);
$duedate= date("Y-m-d", $oldDate7);
$due_date=date("Y M d",strtotime($duedate));
$beneficiary=$_REQUEST['beneficiary'];
$bankname=$_REQUEST['bankname'];
$branch=$_REQUEST['branch'];
$accountno=$_REQUEST['accountno'];
$ifsc=$_REQUEST['ifsc'];


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

$invoice_id=getToken(17);

$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");


//file Uploading ...
 if(!empty($_FILES['file']['name'][0]))
{
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

    $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id;
    if(!is_dir($uploads_dir))
    {
        mkdir($uploads_dir,0777,true);
    }
     
    // Count total files
    $countfiles = count($_FILES['file']['name']);
    // Looping all files
    for($i=0;$i<$countfiles;$i++)
    {
        $filename = $_FILES['file']['name'][$i];
        $temp = explode('.', $filename);
        $ext  = array_pop($temp);
        $name = implode('.', $temp);
  
        $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/'.$filename;
       
        $zip = new ZipArchive();
        $zipfileName =  $name. ".zip";
        $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/'.$zipfileName;
         
        if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
        {
            // $error .= "Sorry ZIP creation is not working currently.<br/>";
            $data["status"] = "false";
            $data["msg"]    = "Sorry ZIP creation is not working currently.";
            echo json_encode($data); 
            return true;
        }
        
        $innerFileName = str_replace(' ', '_', $_FILES['file']['name'][$i]);
        $zip->addFromString($innerFileName, file_get_contents($_FILES['file']['tmp_name'][$i]));
         
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
        $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/';

        // Where the files will be transferred to
        $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/';

        // Create a transfer object
        $manager = new \Aws\S3\Transfer($s3, $source, $dest);

        // Perform the transfer synchronously
        $manager->transfer();

        $sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$invoice_id','$filepath','$filename')";
        $result_invoices_files=mysqli_query($conn,$sql_invoices_files);
        @unlink($filepath);
    }
    $i++; 
}


// $id=$_GET['id'];
$id="";

 $oldDate8= strtr($_REQUEST['invoicedate'], '/', '-');
     $oldDate9= strtotime($oldDate8);
$invoicedate1= date("Y-m-d");


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

// $diff = date_diff($invoicedate1,$duedate);

if(strtotime($duedate) > strtotime(date("Y-m-d")))
{
    $paymentstatus="Due in ".$dateDiff." days";
}
else
{
    $paymentstatus="Over Due by ".$dateDiff." days";
}

$sql_invoice="insert into invoice(id,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country,shipping_address_postal_code,created_at,modified_at,created_by_id,account_id,gst,status,estimateno,date,billingaddressgstin,shippingaddressgstin,billtoname,billfromname,placeofsupply,estimateid,orderdate,invoiceno,invoicedate,buyerorderno,duedate,beneficiary,bankname,branch,accountno,ifsc,paymentstatus,due_date,adjustments,account1_id,billfrompan,billtopan)

values

('$invoice_id','$billing_address_street','$billing_address_city','$billing_address_state','$billing_address_country','$billing_address_postal_code','$shipping_address_street','$shipping_address_city','$shipping_address_state','$shipping_address_country','$shipping_address_postal_code','$created_at','$modified_at','$created_by_id','$account_id','$g_s_t','$status','$invoice_number','$date','$billingaddressgstin','$shippingaddressgstin','$billtoname','$billfromname','$placeofsupply','$id','$orderdate','$invoiceno','$invoicedate','$buyerorderno','$duedate','$beneficiary','$bankname','$branch','$accountno','$ifsc','$paymentstatus','$due_date','$adjustment','$account_id','$billfrompan','$billtopan')";
$result_invoice=mysqli_query($conn,$sql_invoice);

$discount_type=$_REQUEST['discount_type_invoice'];
$estimate_discount_amount_item[]="";
$estimate_discount_option_item[]="";
$estimate_discount_amount_invoice="";
$estimate_discount_option_invoice="";
$amount_without_gst="";
$len=count($_REQUEST['item_name']);
$total_amount=0;
$per1=0;
for ($i=0; $i < $len; $i++) { 

	$amount=(float)$rate[$i] *  (float)$quantity[$i];

    $amount_without_gst=(float)$amount_without_gst + (float)$amount;

     if($discount_type=='At item level')
    {
        $estimate_discount_amount_item=$_REQUEST['invoice_discount_amount_item'];
        $estimate_discount_option_item=$_REQUEST['invoice_discount_option_item'];

        if($estimate_discount_option_item[$i]=='%')
        {
                $per=(float)$amount * (float)$estimate_discount_amount_item[$i]/100; 
                $amount=(float)$amount -  (float)$per;
        }
        else if($estimate_discount_option_item[$i]=='Rs')
        {
            $per=0;
                $amount=(float)$amount -  (float)$estimate_discount_amount_item[$i];
        }
    }
     else if($discount_type=='At invoice level')
    {
        $estimate_discount_amount_invoice=$_REQUEST['invoice_discount_amount_invoice'];
        $estimate_discount_option_invoice=$_REQUEST['invoice_discount_option_invoice'];

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

$cgst_total ="";
$igst_total="";
$per = "";
if($g_s_t=='IGST')
{
	$igst=(float)$amount *(float) $gst_rate[$i]/100;
	$total=(float)$igst + (float)$amount;
    $scst=0.0;
    $total_amount=$total_amount + $total;

    $igst_total=(float)$igst_total + (float)$igst;
    // echo "amount=".$amount."rate=".$gst_rate[$i]."igst=".$igst."<br>";

}
else if($g_s_t=='CGST/SGST')
{
	$dividerate=(float)$gst_rate[$i]/2;
    $scst=(float)$amount * (float)$dividerate/100;
	$total=(float)$scst + (float)$scst + (float)$amount;
    $igst=0.0;
    $total_amount=(float)$total_amount + (float)$total;

    $cgst_total=(float)$cgst_total+(float)$scst + (float)$scst;
}
else
{
    $total_amount=(float)$total_amount + (float)$amount;
}



$sql_estimate_items="insert into invoice_items(estimate_id,invoice_id,item_name,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,total,discounttype,discountoption,discountvalue,discountamount)values('$id','$invoice_id','$item_name[$i]','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount','$gst_rate[$i]','$igst','$scst','$scst','$total','$discount_type','$estimate_discount_option_item[$i]','$estimate_discount_amount_item[$i]','$per')";
$result_estimate_items=mysqli_query($conn,$sql_estimate_items);



}



    //  if($discount_type=='At invoice level')
    // {
    //     $estimate_discount_amount_invoice=$_REQUEST['invoice_discount_amount_invoice'];
    //     $estimate_discount_option_invoice=$_REQUEST['invoice_discount_option_invoice'];

    //     if($estimate_discount_option_invoice=='%')
    //     {
    //             $per1=$amount_without_gst * $estimate_discount_amount_invoice/100; 
    //             $amount1=$amount_without_gst -  $per1;
    //     }
    //     else if($estimate_discount_option_invoice=='Rs')
    //     {
    //             $per1=0;
    //             $amount1=$amount_without_gst-  $estimate_discount_amount_invoice;
    //     }

    // $total_amount=$amount1 + $igst_total + $cgst_total; 
    // }
            $total_amount= (float)$total_amount - (float)$adjustment;


$sql_update="update invoice set total='$total_amount',balance='$total_amount',discounttype='$discount_type',discountoption='$estimate_discount_option_invoice',discountvalue='$estimate_discount_amount_invoice',discountamount='$per1' where id='$invoice_id'";
$result_update=mysqli_query($conn,$sql_update);

$project = explode('/', $_SERVER['REQUEST_URI'])[1];

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
$data["msg"]    = "Created Successfully!";
echo json_encode($data); 
return true;
;?>
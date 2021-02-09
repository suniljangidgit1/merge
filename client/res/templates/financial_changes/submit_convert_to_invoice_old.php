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
    $getId= getToken(17);
// echo $getId;

function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }




$id=$_POST['recordId'];
// echo $id;die;
$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];


$sql2="select * from invoice ";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

$invoice_id=$row2['id'];

$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];

$billfromname=$_REQUEST['billfromname_convert'];
$billtoname=$_REQUEST['billtoname_convert'];

$billing_address_street=$_REQUEST['billing_address_street_convert'];
$shipping_address_street=$_REQUEST['shipping_address_street_convert'];
$billing_address_city=$_REQUEST['billing_address_city_convert'];
$billing_address_state=$_REQUEST['billing_address_state_convert'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code_convert'];
$shipping_address_city=$_REQUEST['shipping_address_city_convert'];
$shipping_address_state=$_REQUEST['shipping_address_state_convert'];

$shipping_address_postal_code=$_REQUEST['shipping_address_postal_code_convert'];
$billing_address_country=$_REQUEST['billing_address_country_convert'];
$shipping_address_country=$_REQUEST['shipping_address_country_convert'];
$billingaddressgstin=$_REQUEST['billingaddressgstin_convert'];
$shippingaddressgstin=$_REQUEST['shippingaddressgstin_convert'];

$account_name=$_REQUEST['account_id_convert'];

$adjustment=$_REQUEST['adjustment_convert'];


$placeofsupply=$_REQUEST['placeofsupply_convert'];

$sql5="select * from account where name='$account_name'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$account_id=$row5['id'];

$oldDate1= strtr($_REQUEST['date'], '/', '-');
    $oldDate= strtotime($oldDate1);
    $date= date("Y-m-d", $oldDate);
$invoice_number=$_REQUEST['invoiceno_convert'];
// $status=$_REQUEST['status'];

$discount_type=$_REQUEST['discount_type_convert'];
$estimateno=$_REQUEST['estimate_number_convert'];
$item_name=$_REQUEST['item_name_convert'];
$description=$_REQUEST['description_convert'];
$hsn=$_REQUEST['hsn_convert'];
$quantity=$_REQUEST['quantity_convert'];
$rate=$_REQUEST['rate_convert'];
$amount=$_REQUEST['amount'];
$gst_rate=$_REQUEST['gst_rate_convert'];
$g_s_t=$_REQUEST['g_s_t_convert'];

$billingaddresspanno= $_REQUEST['billingaddresspan_no_convert'];
$shippingaddresspanno= $_REQUEST['shippingaddresspan_no_convert'];

$estimate_discount_amount_item=$_REQUEST['estimate_discount_amount_item_convert'];
$estimate_discount_option_item=$_REQUEST['estimate_discount_option_item_convert'];
$estimate_discount_amount_convert=$_REQUEST['estimate_discount_amount_convert'];
$estimate_discount_option_convert=$_REQUEST['estimate_discount_option_convert'];


// $sql12 = "select * from estimate_files where estimate_id='$id'";
// $result12 = mysqli_query($conn, $sql12);
// $row12 = mysqli_fetch_assoc($result12);
// $zip_fileName=$row12['original_filename'];
// $est_path=$row12['filepath'];
// echo $est_path;die;


$oldDate2= strtr($_REQUEST['orderdate_invoice'], '/', '-');
    $oldDate3= strtotime($oldDate2);
    $orderdate= date("Y-m-d", $oldDate3);

// $orderdate=$_REQUEST['orderdate'];
$invoiceno=$_REQUEST['invoiceno_convert'];


$oldDate4= strtr($_REQUEST['invoicedate_invoice'], '/', '-');
    $oldDate5= strtotime($oldDate4);
    $invoicedate= date("Y-m-d", $oldDate5);

// $invoicedate=$_REQUEST['invoicedate'];
$invoicedate=date("d M Y",strtotime($invoicedate));

$buyerorderno=$_REQUEST['buyerorderno_convert'];

$oldDate6= strtr($_REQUEST['duedate_invoice'], '/', '-');
    $oldDate7= strtotime($oldDate6);
    $duedate= date("Y-m-d", $oldDate7);
        $due_date=date("d M Y",strtotime($duedate));

$beneficiary=$_REQUEST['beneficiary_convert'];
$bankname=$_REQUEST['bankname_convert'];
$branch=$_REQUEST['branch_convert'];
$accountno=$_REQUEST['accountno_convert'];
$ifsc=$_REQUEST['ifsc_convert'];




$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");



$sql12 = "select * from estimate_files where estimate_id='$id'";
$result12 = mysqli_query($conn, $sql12);
while($row12 = mysqli_fetch_assoc($result12))
{
    $zip_Name=$row12['original_filename'];
    $path='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
    $sql_invoices_files1="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$path','$zip_Name')";
    $result_invoices_files1=mysqli_query($conn,$sql_invoices_files1);
    $temp = explode('.', $zip_Name);
    $ext  = array_pop($temp);
    $name = implode('.', $temp); 

    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    $uploads_dir='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id;

    if(!is_dir($uploads_dir))
     {
        mkdir($uploads_dir,0777,TRUE);
        
     }
    $result=$s3->getObject(
        array(
              'Bucket'=>'fincrm',
              'Key'=>'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'. $name.'.zip',
              'SaveAs'=>$uploads_dir.'/'.$name.'.zip'
        )
    );
}
   
// file Uploading ...
$file = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';

if (!file_exists($file))
{
    if(!empty($_FILES['file_convert']['name'][0]))
    {

        include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
        $objS3buket         = new S3bucketfoldersize();
        include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

        $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
        if(!is_dir($uploads_dir))
        {
            mkdir($uploads_dir,0777,true);
        }
         
        // Count total files
        $countfiles = count($_FILES['file_convert']['name']);
        // Looping all files
        for($i=0;$i<$countfiles;$i++)
        {
            $filename = $_FILES['file_convert']['name'][$i];
            $temp = explode('.', $filename);
            $ext  = array_pop($temp);
            $name = implode('.', $temp);
      
            $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$filename;
           
            $zip = new ZipArchive();
            $zipfileName =  $name. ".zip";
            $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$zipfileName;
             
            if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
            {
                $data["status"] = "false";
                $data["msg"]    = "Sorry ZIP creation is not working currently.";
                echo json_encode($data); 
                return true;
            }
            
            $innerFileName = str_replace(' ', '_', $_FILES['file_convert']['name'][$i]);
            $zip->addFromString($innerFileName, file_get_contents($_FILES['file_convert']['tmp_name'][$i]));
             
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
            $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;

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


            // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

            // Where the files will be source from
            $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';

            // Where the files will be transferred to
            $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';

            // Create a transfer object
            $manager = new \Aws\S3\Transfer($s3, $source, $dest);

            // Perform the transfer synchronously
            $manager->transfer();

            $sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$filepath','$filename')";
            $result_invoices_files=mysqli_query($conn,$sql_invoices_files);
            
        }
        $i++; 
    }
}
else
{
   if(!empty($_FILES['file_convert']['name'][0]))
    {
        include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
        $objS3buket         = new S3bucketfoldersize();
        include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

        function custom_copy($src, $uploads_dir)
        {  
            // open the source directory 
            $dir = opendir($src);  
            // Make the destination directory if not exist 
            if(!is_dir($uploads_dir))
            {
                mkdir($uploads_dir,0777,true);
            } 
            // Loop through the files in source directory 
            foreach (scandir($src) as $filename) 
            {  
       
                if (( $filename != '.' ) && ( $filename != '..' ))
                {  
                    if ( is_dir($src . '/' . $filename) )  
                    {  
                        // Recursively calling custom copy function 
                        // for sub directory  
                        custom_copy($src . '/' . $filename, $uploads_dir . '/' . $filename);  
                    }  
                    else 
                    {  
                        copy($src . '/' . $filename, $uploads_dir . '/' . $filename);  
                    }  
                }  
            }  
            closedir($dir); 
        }   
        
        $src='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id;
        $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
  
        custom_copy($src, $uploads_dir); 

        // Count total files
        $countfiles = count($_FILES['file_convert']['name']);
        // Looping all files
        for($i=0;$i<$countfiles;$i++)
        {
            $filename = $_FILES['file_convert']['name'][$i];
            $temp = explode('.', $filename);
            $ext  = array_pop($temp);
            $name = implode('.', $temp);
      
            $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$filename;
           
            $zip = new ZipArchive();
            $zipfileName =  $name. ".zip";
            $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$zipfileName;
             
            if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
            {
                $data["status"] = "false";
                $data["msg"]    = "Sorry ZIP creation is not working currently.";
                echo json_encode($data); 
                return true;
            }
            
            $innerFileName = str_replace(' ', '_', $_FILES['file_convert']['name'][$i]);
            $zip->addFromString($innerFileName, file_get_contents($_FILES['file_convert']['tmp_name'][$i]));
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
            $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;

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


            // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
            // Where the files will be source from
            $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';
            // Where the files will be transferred to
            $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';
            // Create a transfer object
            $manager = new \Aws\S3\Transfer($s3, $source, $dest);
            // Perform the transfer synchronously
            $manager->transfer();

            $sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$filepath','$filename')";
            $result_invoices_files=mysqli_query($conn,$sql_invoices_files);
            
        }
        $i++; 
    }

}




$sql_estimate="insert into invoice(id,billfromname,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,billingaddressgstin,billfrompan,billtoname,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country,shipping_address_postal_code,shippingaddressgstin,billtopan,account_id,date,estimateno,placeofsupply,orderdate,invoiceno,invoicedate,buyerorderno,duedate,gst,discounttype,beneficiary,bankname,branch,accountno,ifsc,adjustments,modified_at,created_at,created_by_id,estimateid,account1_id)

values



('$getId','$billfromname','$billing_address_street','$billing_address_city','$billing_address_state','$billing_address_country','$billing_address_postal_code','$billingaddressgstin','$billingaddresspanno','$billtoname','$shipping_address_street','$shipping_address_city','$shipping_address_state','$shipping_address_country','$shipping_address_postal_code','$shippingaddressgstin','$shippingaddresspanno','$account_id','$date','$estimateno','$placeofsupply','$orderdate','$invoiceno','$invoicedate','$buyerorderno','$duedate','$g_s_t','$discount_type','$beneficiary','$bankname','$branch','$accountno','$ifsc','$adjustment','$modified_at','$created_at','$created_by_id','$id','$account_id')";

$result_estimate=mysqli_query($conn,$sql_estimate);

// echo $sql_estimate;die();

$discount_type=$_REQUEST['discount_type_convert'];
$amount_without_gst=0;
$per1=0;
$igst_total=0;
$cgst_total=0;
$len=count($_REQUEST['item_name_convert']);
$total_amount=0;
$per=0;
for ($i=0; $i < $len; $i++) { 

    $amount=(float)$rate[$i] *  (float)$quantity[$i];

    $amount_without_gst=(float)$amount_without_gst + (float)$amount;

    if($discount_type=='At item level')
    {
        $estimate_discount_amount_item=$_REQUEST['estimate_discount_amount_item_convert'];
        $estimate_discount_option_item=$_REQUEST['estimate_discount_option_item_convert'];

        if($estimate_discount_option_item[$i]=='%')
        {
                $per=(float)$amount * (float)$estimate_discount_amount_item[$i]/100; 
                $amount=(float)$amount - (float) $per;
        }
        else if($estimate_discount_option_item[$i]=='Rs')
        {
            $per=0;
                $amount=(float)$amount -  (float)$estimate_discount_amount_item[$i];
        }


    }
    else if($discount_type=='At invoice level')
    {
        $estimate_discount_amount_convert=$_REQUEST['estimate_discount_amount_convert'];
        $estimate_discount_option_convert=$_REQUEST['estimate_discount_option_convert'];

        if($estimate_discount_option_convert=='%')
        {
                $per=(float)$amount * (float)$estimate_discount_amount_convert/100; 
                $amount=(float)$amount -  (float)$per;
                $per1= (float)$per1 + (float)$per;
        }
        else if($estimate_discount_option_convert=='Rs')
        {
                $per1=0;
                $amount=(float)$amount-  (float)$estimate_discount_amount_convert;
        }

    // $total_amount=$amount1 + $igst_total + $cgst_total; 
    }


if($g_s_t=='IGST')
{
    $igst=$amount * $gst_rate[$i]/100;
    $total=$igst + $amount;
    $scst=0.0;
    
    $total_amount=(float)$total_amount + (float)$total;
        $igst_total=(float)$igst_total + (float)$igst;

    // echo "amount=".$amount."rate=".$gst_rate[$i]."igst=".$igst."<br>";

}
else if($g_s_t=='CGST/SGST')
{
    $dividerate=$gst_rate[$i]/2;
    $scst=(float)$amount * (float)$dividerate/100;
    $total=(float)$scst + (float)$scst + (float)$amount;
    $igst=0.0;
        $total_amount=(float)$total_amount +(float) $total;
    $cgst_total=(float)$cgst_total+(float)$scst + (float)$scst;

}
else
{
     $total=$amount;
    $total_amount=(float)$total_amount + (float)$amount;
}
if($gst_rate[$i]=='' || $gst_rate[$i]=="")
{
    $gst_rate[$i]=0;
}
if($igst=='' || $igst=="")
{
    $igst=0;
}
if($scst=='' || $scst=="")
{
   $scst=0;
}

$sql_estimate_items="insert into invoice_items(estimate_id,invoice_id,item_name,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,total,discounttype,discountoption,discountvalue,discountamount)values('$id','$getId' ,'$item_name[$i]','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount','$gst_rate[$i]','$igst','$scst','$scst','$total','$discount_type','$estimate_discount_option_item[$i]','$estimate_discount_amount_item[$i]','$per')";
$result_estimate_items=mysqli_query($conn,$sql_estimate_items);
// echo mysqli_error($conn);


}


$oldDate8= strtr($_REQUEST['invoicedate_invoice'], '/', '-');
     $oldDate9= strtotime($oldDate8);
     $invoicedate1= date("Y-m-d", $oldDate9);

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

$total_amount= (float)$total_amount - (float)$adjustment;



$sql_update="update invoice set total='$total_amount',balance='$total_amount',paymentstatus='$paymentstatus',due_date='$due_date',discounttype='$discount_type',discountoption='$estimate_discount_option_convert',discountvalue='$estimate_discount_amount_convert',discountamount='$per1' where id='$getId'";
$result_update=mysqli_query($conn,$sql_update);
// print_r($sql_update);die();

// $sql_update="update invoice set total='$total_amount',balance='$total_amount' where id='$invoice_id'";
// $result_update=mysqli_query($conn,$sql_update);



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
    
$data["status"] = "true";
$data["msg"]    = "Estimate successfully Converted to Invoice!";
echo json_encode($data); 
return true;
;?> 




































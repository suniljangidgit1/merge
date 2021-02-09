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
// echo '<pre>';print_r($_REQUEST);die;
$id=$_REQUEST['recordId'];
$data["status"] = "false";
$data["msg"]    = "Invalid request!";

$sql4="select * from user where user_name='$user_name'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$user=$row4['user_name'];
$created_by_id=$row4['id'];
$is_admin=$row4['is_admin'];


$estimate_number=$_REQUEST['estimate_number'];
$billfromname=$_REQUEST['billfromname'];
$billtoname=$_REQUEST['billtoname'];

$billing_address_street=$_REQUEST['billing_address_street'];
$billing_address_city=$_REQUEST['billing_address_city'];
$billing_address_state=$_REQUEST['billing_address_state'];
$billing_address_postal_code=$_REQUEST['billing_address_postal_code'];
$billing_address_country=(isset($_REQUEST['billing_address_country'])) ? $_REQUEST['billing_address_country'] : '';
$billingaddressgstin=$_REQUEST['billingaddressgstin'];

$shipping_address_street=$_REQUEST['shipping_address_street'];
$shipping_address_city=$_REQUEST['shipping_address_city'];
$shipping_address_state=$_REQUEST['shipping_address_state'];
$shipping_address_postal_code=$_REQUEST['shipping_address_postal_code'];
$shipping_address_country=(isset($_REQUEST['shipping_address_country'])) ? $_REQUEST['shipping_address_country'] : '';
$shippingaddressgstin=$_REQUEST['shippingaddressgstin'];

$billfrompanno = $_REQUEST['billingaddresspanno'];
$billfromemail = $_REQUEST['billingemailaddress'];
$billfromphone = $_REQUEST['billingphoneno'];
$billtopanno =  $_REQUEST['shippingaddresspanno'];
$billtoemail =  $_REQUEST['shippingaddressemailid'];
$billtophone =  $_REQUEST['shippingaddresshphoneno'];

$billfrom_udyamno = $_REQUEST['billingfrom_udyamno'];
$billto_udyamno =  $_REQUEST['billingto_udyamno'];
$po_so_number =  $_REQUEST['po_so_number'];
$terms_conditions =  $_REQUEST['estimate_terms_conditions'];

$bank_holder_name = (isset($_REQUEST['convert_bank_holder_name'])) ? $_REQUEST['convert_bank_holder_name'] : '';
$bank_name =  (isset($_REQUEST['convert_bank_name'])) ? $_REQUEST['convert_bank_name'] : '';
$account_no = (isset($_REQUEST['convert_account_no'])) ? $_REQUEST['convert_account_no'] : '';  
$IFSCcode =   (isset($_REQUEST['convert_IFSCcode'])) ? $_REQUEST['convert_IFSCcode'] : '';
$account_type =   (isset($_REQUEST['convert_bank_accType'])) ? $_REQUEST['convert_bank_accType'] : '';
$bank_UPI =   (isset($_REQUEST['convert_bank_UPI'])) ? $_REQUEST['convert_bank_UPI'] : '';

if(preg_match('/[\'"]/', $_REQUEST['bill_id'])){
    $billing_entity_id = str_replace( "'", '', $_REQUEST['bill_id']); 
}
else {
    $billing_entity_id = $_REQUEST['bill_id'];
}

// $duedate=$_REQUEST['due_date'];  

// echo '<pre>';print_r($_REQUEST);die;
$er_existingFileName    = $_REQUEST["convert_attachedFilename"];

// $account_name=(isset($_REQUEST['account_id'])) ? $_REQUEST['account_id'] : '';
$account_name=(isset($_REQUEST['billtoname'])) ? $_REQUEST['billtoname'] : '';
$placeofsupply=(isset($_REQUEST['placeofsupply'])) ? $_REQUEST['placeofsupply'] : '';
$adjustment=(isset($_REQUEST['adjustment'])) ? $_REQUEST['adjustment'] : '';

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

$getId=getToken(17);

$created_at=date("Y-m-d h:i:s ");
$modified_at=date("Y-m-d h:i:s ");


//file Uploading ...
$id = $_REQUEST['recordId'];
$sql1 = "select * from estimate where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_assoc($result1);


/*$sql12 = "select * from estimate_files where estimate_id='$id'";
$result12 = mysqli_query($conn, $sql12);
while($row12 = mysqli_fetch_assoc($result12))
{
    $zip_Name=$row12['original_filename'];
    $path='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
    // $sql_invoices_files1="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$path','$zip_Name')";
    // $result_invoices_files1=mysqli_query($conn,$sql_invoices_files1);
    $temp = explode('.', $zip_Name);
    $ext  = array_pop($temp);
    $name = implode('.', $temp); 

    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
    // $uploads_dir='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id;
    $uploads_dir='invoice/uploads';

    if(!is_dir($uploads_dir))
     {
        mkdir($uploads_dir,0777,TRUE);
        
     }
    $result=$s3->getObject(
        array(
              'Bucket'=>'fincrm',
              'Key'=>'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/'. $name.'.zip',
              // 'SaveAs'=>$uploads_dir.'/'.$name.'.zip'
              'SaveAs'=>$uploads_dir.'/'.$zip_Name
        )
    );
}*/

$fileName =  '';

// file Uploading ...
// $file = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id.'/';
$file='invoice/uploads/';

$zipFiles = "estimate/zipFolder/";
$zipFile = glob($zipFiles.'/*');

if(!empty($_FILES["file_convert"]["name"][0]))
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
   
    // To check s3 bucket existing folder size in gb

    // s3 bucket transfer
    // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'.'S3Connect.php');
    include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');
    /*$result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$row1['filename'],
    ));*/
    $result = $s3->deleteObject(array(
        'Bucket' => 'fincrm',
        'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$row1['filename'],
    ));

    $source = 'estimate/zipFolder/'.$fileName;

    // $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/';
    $dest = 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$fileName;

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
    /*$zipName = 'invoice/zipFolder/'.$er_existingFileName;
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

    $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/';

    $manager = new \Aws\S3\Transfer($s3, $source, $dest);

    $manager->transfer();

    $zip_name = 'estimate/zipFolder/'.$fileName;
    if(file_exists($zip_name)){
        unlink($zip_name);
    }
}*/

// if (!file_exists($file))
// {
//     // if(!empty($_FILES['file_convert']['name'][0]))
//     if(!empty($_FILES["file_convert"]["name"][0]))
//     {
//         include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
//         $objS3buket         = new S3bucketfoldersize();
//         include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

//         $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
//         if(!is_dir($uploads_dir))
//         {
//             mkdir($uploads_dir,0777,true);
//         }
         
//         // Count total files
//          $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads");
//             // print_r($files);die;
//         foreach ($files as $filename) {
//         if ($filename !== '.' && $filename !== '..'){
//         // $countfiles = count($_FILES['file_convert']['name']);
//         // Looping all files
//         // for($i=0;$i<$countfiles;$i++)
//         // {
//             // $filename = $_FILES['file_convert']['name'][$i];
//             $filename = $filename;
//             $temp = explode('.', $filename);
//             $ext  = array_pop($temp);
//             $name = implode('.', $temp);
      
//             $filepath = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$filename;
           
//             $zip = new ZipArchive();
//             $zipfileName =  $name. ".zip";
//             $zip_name = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$zipfileName;
             
//             if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
//             {
//                 $data["status"] = "false";
//                 $data["msg"]    = "Sorry ZIP creation is not working currently.";
//                 echo json_encode($data); 
//                 return true;
//             }
            
//             // $innerFileName = str_replace(' ', '_', $_FILES['file_convert']['name'][$i]);
//             // $zip->addFromString($innerFileName, file_get_contents($_FILES['file_convert']['tmp_name'][$i]));
//             $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/".$filename;
//             $zip->addFromString($filename,file_get_contents($filecontent));
        
//             $delete_files = 'invoice/uploads/'.$filename;
//             if(file_exists($delete_files)){
//                 unlink($delete_files);
//             }
             
//             $zip->close();

//             // To check s3 bucket existing folder size in gb

//             clearstatcache();
//             $size = filesize($zip_name);

//             // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
//             // $objS3buket         = new S3bucketfoldersize();
            
//             $s3BucketSize       = $objS3buket->FolderSize();
//             $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
//             $planStorageLimit   = $objS3buket->getDomainStorageLimit();

//             $finalExisting      = ( (int) $s3BucketSize + (int) $currentFileSize );
//             $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;

//             if( $finalExisting > $planStorageLimit ){

//                 // delete local file
//                 $deleteFile = $zip_name;
//                 if( file_exists($deleteFile) ){
//                     unlink($deleteFile);
//                 }

//                 $data["status"] = "false";
//                 $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
//                 echo json_encode($data); 
//                 return true;
//             }
           
//             // To check s3 bucket existing folder size in gb


//             // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

//             // Where the files will be source from
//             $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';

//             // Where the files will be transferred to
//             $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';

//             // Create a transfer object
//             $manager = new \Aws\S3\Transfer($s3, $source, $dest);

//             // Perform the transfer synchronously
//             $manager->transfer();

//             /*$sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$filepath','$filename')";
//             $result_invoices_files=mysqli_query($conn,$sql_invoices_files);*/

//             $zipName = 'estimate/zipFolder/'.$_REQUEST["convert_attachedFilename"];
//             if(file_exists($zipName)){
//                 unlink($zipName);
//             }
            
//         }
//         // $i++; 
//     }
//     }
// }
// else
// {
//    // if(!empty($_FILES['file_convert']['name'][0]))
//     if(!empty($_FILES["file_convert"]["name"][0]))
//     {
//         include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
//         $objS3buket         = new S3bucketfoldersize();
//         include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');

//         function custom_copy($src, $uploads_dir)
//         {  
//             // open the source directory 
//             $dir = opendir($src);  
//             // Make the destination directory if not exist 
//             if(!is_dir($uploads_dir))
//             {
//                 mkdir($uploads_dir,0777,true);
//             } 
//             // Loop through the files in source directory 
//             foreach (scandir($src) as $filename) 
//             {  
       
//                 if (( $filename != '.' ) && ( $filename != '..' ))
//                 {  
//                     if ( is_dir($src . '/' . $filename) )  
//                     {  
//                         // Recursively calling custom copy function 
//                         // for sub directory  
//                         custom_copy($src . '/' . $filename, $uploads_dir . '/' . $filename);  
//                     }  
//                     else 
//                     {  
//                         copy($src . '/' . $filename, $uploads_dir . '/' . $filename);  
//                     }  
//                 }  
//             }  
//             closedir($dir); 
//         }   
        
//         // $src='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/estimates/'.$user.'/'.$id;
//         $uploads_dir = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId;
  
//         $src='invoice/uploads';
//         // $uploads_dir = 'invoice/uploads';
//         custom_copy($src, $uploads_dir); 

//         // Count total files
//          $files = scandir($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads");
//           foreach ($files as $filename) {
//         if ($filename !== '.' && $filename !== '..'){
//         // $countfiles = count($_FILES['file_convert']['name']);
//         // Looping all files
//         // for($i=0;$i<$countfiles;$i++)
//         // {
//             // $filename = $_FILES['file_convert']['name'][$i];
//             $filename = $filename;
//             $temp = explode('.', $filename);
//             $ext  = array_pop($temp);
//             $name = implode('.', $temp);
      
//             $filepath='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$filename;
           
//             $zip = new ZipArchive();
//             $zipfileName =  $name. ".zip";
//             $zip_name ='uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/'.$zipfileName;
             
//             if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) 
//             {
//                 $data["status"] = "false";
//                 $data["msg"]    = "Sorry ZIP creation is not working currently.";
//                 echo json_encode($data); 
//                 return true;
//             }
            
//             // $innerFileName = str_replace(' ', '_', $_FILES['file_convert']['name'][$i]);
//             // $zip->addFromString($innerFileName, file_get_contents($_FILES['file_convert']['tmp_name'][$i]));
//              $filecontent = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/".$filename;
//             $zip->addFromString($filename,file_get_contents($filecontent));
        
//         // echo $filecontent;die;
//             $delete_files = 'invoice/uploads/'.$filename;

//             if(file_exists($delete_files)){
//                 unlink($delete_files);
//             }
//             // $delete_files1 = 'invoice/estimate/'.$filename;
//             // if(file_exists($delete_files1)){
//             //     unlink($delete_files1);
//             // }
//             $zip->close();

//         // To check s3 bucket existing folder size in gb

//             clearstatcache();
//             $size = filesize($zip_name);

//             // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3bucketfoldersize.php');    
//             // $objS3buket         = new S3bucketfoldersize();
            
//             $s3BucketSize       = $objS3buket->FolderSize();
//             $currentFileSize    = $objS3buket->formatSizeUnits( $size, "BYTES" );
//             $planStorageLimit   = $objS3buket->getDomainStorageLimit();

//             $finalExisting      = ( (int) $s3BucketSize + (int) $currentFileSize );
//             $finalExisting      = $objS3buket->formatSizeUnits( $finalExisting, "GB" );;

//             if( $finalExisting > $planStorageLimit ){

//                 // delete local file
//                 $deleteFile = $zip_name;
//                 if( file_exists($deleteFile) ){
//                     unlink($deleteFile);
//                 }

//                 $data["status"] = "false";
//                 $data["msg"]    = "Your space limit is over. Please contact admin if you wish to add more documents.";
//                 echo json_encode($data); 
//                 return true;
//             }
           
//         // To check s3 bucket existing folder size in gb


//             // include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/'. 'S3Connect.php');
//             // Where the files will be source from
//             $source = 'uploads/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';
//             // Where the files will be transferred to
//             $dest = 's3://fincrm/Development/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$getId.'/';
//             // Create a transfer object
//             $manager = new \Aws\S3\Transfer($s3, $source, $dest);
//             // Perform the transfer synchronously
//             $manager->transfer();

//             /*$sql_invoices_files="insert into invoice_files(invoice_id,filepath,original_filename)values('$getId','$filepath','$filename')";
//             $result_invoices_files=mysqli_query($conn,$sql_invoices_files);*/

//             $zipName = 'estimate/zipFolder/'.$_REQUEST["convert_attachedFilename"];
//             if(file_exists($zipName)){
//                 unlink($zipName);
//             }
            
//         }
//     }
//         // $i++; 
//     }

// }

$sql_invoice="insert into invoice(id,billing_address_street,billing_address_city,billing_address_state,billing_address_country,billing_address_postal_code,shipping_address_street,shipping_address_city,shipping_address_state,shipping_address_country,shipping_address_postal_code,created_at,modified_at,created_by_id,account_id,gst,status,invoiceno,billingaddressgstin,shippingaddressgstin,billtoname,billfromname,placeofsupply,invoicedate,adjustments,billfrompan,billingfromemail,billingfromphone,billtopan,billingtoemail,billingtophone,billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions,beneficiary,bankname,accountno,ifsc,bank_upi,bankaccount_type,duedate,estimateno,estimateid,filename,billing_entity_id,invoice_datefilter,paymentstatus) values('$getId','$billing_address_street','$billing_address_city','$billing_address_state','$billing_address_country','$billing_address_postal_code','$shipping_address_street','$shipping_address_city','$shipping_address_state','$shipping_address_country','$shipping_address_postal_code','$created_at','$modified_at','$created_by_id','$account_id','$g_s_t','Pending','$invoice_number','$billingaddressgstin','$shippingaddressgstin','$billtoname','$billfromname','$placeofsupply','$invoicedate','$adjustment','$billfrompanno','$billfromemail','$billfromphone','$billtopanno','$billtoemail','$billtophone','$billfrom_udyamno','$billto_udyamno','$po_so_number','$terms_conditions','$bank_holder_name','$bank_name','$account_no','$IFSCcode','$bank_UPI','$account_type','$duedate','$estimate_number','$id','$fileName','$billing_entity_id','$date','Not paid')";
$result_invoice=mysqli_query($conn,$sql_invoice);

$sql_estimate_update = "update estimate set status='Converted to invoice' where id='$id'";
$result_estimate=mysqli_query($conn,$sql_estimate_update);

$total_invoice_val = ($_REQUEST['convert_total_items']) ? $_REQUEST['convert_total_items'] : '0';
$invoice_disc_option = ($_REQUEST['convert_invoiceEstimate_Percentage_select']=='Percentage') ? '%' : ($_REQUEST['convert_invoiceEstimate_Percentage_select']=='Amount') ? 'Rs' : 'Select Type';
$invoice_disc_type = ($_REQUEST['convert_invoiceEstimate_Percentage_select']=='Percentage') ? 'Percentage' : ($_REQUEST['convert_invoiceEstimate_Percentage_select']=='Amount') ? 'Amount' : 'Select Type';

$invoice_disc_amt = ($_REQUEST['estimate_calculated_disc_amt']) ? $_REQUEST['estimate_calculated_disc_amt'] : '0';
$invoice_subtotal_amount = ($_REQUEST['estimate_subtotal_amount']) ? $_REQUEST['estimate_subtotal_amount'] : '0';
$est_total_discount_amt = ($_REQUEST['estimate_totaldiscount_amount']) ? $_REQUEST['estimate_totaldiscount_amount'] : '0';
$invoice_total_taxes = ($_REQUEST['estimate_totaltaxes_amount']) ? $_REQUEST['estimate_totaltaxes_amount'] : '0';
$invoicetotal_amount = ($_REQUEST['estimatetotal_amount']) ? $_REQUEST['estimatetotal_amount'] : '0';

$invoice_disc_rate = ($_REQUEST['estimate_disc_amt']) ? $_REQUEST['estimate_disc_amt'] : '';
$invoice_gst_type = ($_REQUEST['estimate_gst_type']) ? $_REQUEST['estimate_gst_type'] : '';
$invoice_gst_rate = ($_REQUEST['calculate_rate']) ? $_REQUEST['calculate_rate'] : '';
$invoice_cgst_amount = ($_REQUEST['estimate_cgst_amount']) ? $_REQUEST['estimate_cgst_amount'] : '';
$invoice_sgst_amount = ($_REQUEST['estimate_sgst_amount']) ? $_REQUEST['estimate_sgst_amount'] : '';
$invoice_igst_amount = ($_REQUEST['estimate_igst_amount']) ? $_REQUEST['estimate_igst_amount'] : '';

$sql_update="update invoice set sub_total='$invoice_subtotal_amount',total='$invoicetotal_amount',balance='$invoicetotal_amount',discounttype='$invoice_disc_type',discountoption='$invoice_disc_option',discountvalue='$est_total_discount_amt',discountamount='$invoice_disc_amt',gst_rate='$invoice_gst_rate',gst='$invoice_gst_type',cgst='$invoice_cgst_amount',sgst='$invoice_sgst_amount',igst='$invoice_igst_amount',rate='$invoice_disc_rate',total_tax='$invoice_total_taxes',total_discount='$est_total_discount_amt' where id='$getId'";

// echo $sql_update;die;
$result_update=mysqli_query($conn,$sql_update);

$discount_type=(isset($_REQUEST['convert_item_discount_type'])) ? $_REQUEST['convert_item_discount_type'] : '';
$amount_without_gst="";
$invoice_discount_option_item[]="";
$invoice_discount_amount_item[]="";
$per ="";
$total_amount=0;
$len=count($_REQUEST['convert_item_descr']);
$per1=0;

$invoice_item_name=(isset($_REQUEST['item_name'])) ? $_REQUEST['item_name'] : '';
$description=$_REQUEST['convert_item_descr'];
$hsn=(isset($_REQUEST['convert_item_hsn'])) ? $_REQUEST['convert_item_hsn'] : '';
$quantity=$_REQUEST['convert_item_qty'];
$rate=$_REQUEST['convert_item_rate'];
$amount=$_REQUEST['convert_item_convert_invoice_main_amount'];
$discount_type=$_REQUEST['convert_item_discount_type'];
$gst_rate=$_REQUEST['convert_item_gst_discont'];
$gst_type=$_REQUEST['convert_item_gst_type'];
$gst_value=$_REQUEST['convert_item_gst_discont'];
$discountamount=$_REQUEST['calculated_discount'];

$total_amount = 0;
$discount_option = '';
$discount_amount = 0;
for ($i=0; $i < $len; $i++)
{
    $cgst=(isset($_REQUEST['convert_item_cgst_amount'][$i])) ? $_REQUEST['convert_item_cgst_amount'][$i] : '0';
    $sgst=(isset($_REQUEST['convert_item_sgst_amount'][$i])) ? $_REQUEST['convert_item_sgst_amount'][$i] : '0';
    $igst=(isset($_REQUEST['convert_item_igst_amount'][$i])) ? $_REQUEST['convert_item_igst_amount'][$i] : '0';

    if($discount_type[$i] == 'Percentage'){
        $discount_option = '%';
        $discount_amount = $_REQUEST['calculated_discount'][$i];
    }
    if($discount_type[$i] == 'Amount'){
        $discount_option = 'Rs';
        $discount_amount = (float)$amount[$i] - $_REQUEST['calculated_discount'][$i];
    }
    $invoice_item_discount_rate = $_REQUEST['convert_item_discount_rate'][$i];
    
    if($_REQUEST['convert_item_gst_type'][$i] == 'IGST'){
        $total = (float)$igst[$i] + (float)$amount[$i];
        $total_amount = (float)$total_amount - (float)$total;
    }
    if($_REQUEST['convert_item_gst_type'][$i] == 'CGST'){
        $total = (float)$cgst[$i] + (float)$sgst[$i] + (float)$amount[$i];
        $total_amount = (float)$total_amount - (float)$total;
    }

    $sql_invoice_items="insert into invoice_items(estimate_id,invoice_id,description,hsn,quantity,rate,amount,gst_rate,igst,cgst,sgst,date,total,discounttype,discountoption,discountvalue,discountamount,gst_type,gst_value) values('$id','$getId','$description[$i]','$hsn[$i]','$quantity[$i]','$rate[$i]','$amount[$i]','$gst_rate[$i]','$igst','$cgst','$sgst','$created_at','$invoicetotal_amount','$discount_type[$i]','$discount_option','$invoice_item_discount_rate','$discountamount[$i]','$gst_type[$i]','$gst_value[$i]')";
    // echo $sql_invoice_items;die;
    $result_invoice_items=mysqli_query($conn,$sql_invoice_items);
    echo mysqli_error($conn);
}
//die;

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
$data["msg"]    = "Converted successfully!";
$data = array("status" => "true", "msg" => "Converted successfully!");
echo json_encode($data); 
return true;
;?>
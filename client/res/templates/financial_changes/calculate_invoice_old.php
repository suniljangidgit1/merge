<?php

error_reporting(~E_ALL);
$quantity=$_REQUEST['quantity'];
$rate=$_REQUEST['rate'];
$discount_type=$_REQUEST['discount_type_invoice'];

$amount=$_REQUEST['amount'];
$gst_rate=$_REQUEST['gst_rate'];
$g_s_t=$_REQUEST['g_s_t'];


$total_amount=0;$amount=$_REQUEST['amount'];
$gst_rate=$_REQUEST['gst_rate'];
$g_s_t=$_REQUEST['g_s_t'];
$adjustment=$_REQUEST['invoice_adjustment'];

$gstTotal=0;
$sgst=0;
$cgst=0;

$len=count($_REQUEST['quantity']);



for ($i=0; $i < $len; $i++) 
{ 

	$amount=$rate[$i] *  $quantity[$i];
    $amount_without_gst=$amount_without_gst + $amount;
    if($discount_type=='At item level')
    {
        $estimate_discount_amount_item=$_REQUEST['invoice_discount_amount_item'];
        $estimate_discount_option_item=$_REQUEST['invoice_discount_option_item'];

        if($estimate_discount_option_item[$i]=='%')
        {
            $per=$amount * $estimate_discount_amount_item[$i]/100; 
            $amount=$amount -  $per;
        }
        else if($estimate_discount_option_item[$i]=='Rs')
        {
            $per=0;
            $amount=$amount -  $estimate_discount_amount_item[$i];
        }
    }
    else if($discount_type=='At invoice level')
    {
        $estimate_discount_amount_invoice=$_REQUEST['invoice_discount_amount_invoice'];
        $estimate_discount_option_invoice=$_REQUEST['invoice_discount_option_invoice'];
        
        if($estimate_discount_option_invoice=='%')
        {
                $per=$amount * $estimate_discount_amount_invoice/100; 
                $amount=$amount -  $per;
        }
        else if($estimate_discount_option_invoice=='Rs')
        {
                $per1=0;
                $amount=$amount-  $estimate_discount_amount_invoice;
        }
    }
    // echo " VALUE ".$i." == ".$gst_rate[$i]."     SELECTED OPT== ". $g_s_t;

    if($g_s_t=='IGST')
    {
       // echo "IN IGST";
    	$igst=$amount * $gst_rate[$i]/100;
    	$total=$igst + $amount;
    	$scst=0.0;
        $total_amount=$total_amount + $total;
        $igst_total=$igst_total + $igst;
        //if($i==1){
            $gstTotal= $igst_total; 
            
        //} 
        
        
    }
    else if($g_s_t=='CGST/SGST')
    {
       // echo "IN CGST / SGST";
    	$dividerate=$gst_rate[$i]/2;
        $scst=$amount * $dividerate/100;
    	$total=$scst + $scst + $amount;
    	$igst=0.0;
    	$total_amount=$total_amount + $total;
    
        $cgst_total=$cgst_total+$scst + $scst;
        
       // if($i==1){
        
            $sgst= $cgst_total/2;
            $cgst= $cgst_total/2;
            
            
       // }
        
        
        
        
    }
    else
    {
        $total_amount=$total_amount + $amount;
    }
}



// if($discount_type=='At invoice level')
//     {
//         $estimate_discount_amount_invoice=$_REQUEST['invoice_discount_amount_invoice'];
//         $estimate_discount_option_invoice=$_REQUEST['invoice_discount_option_invoice'];

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

    $total_amount_with_adjstment= $total_amount - $adjustment;
    if($cgst != 0 && $sgst!= 0){
        //echo "TOATAL === ".$cgst + $sgst;
        $total_amount= $total_amount - ($cgst + $sgst);
    }
    
    if($gstTotal!=0){
        $total_amount= $total_amount - $gstTotal;
    }
    
    $calculated_arr[] = array("total_amount" => $total_amount_with_adjstment, "subtotal" => $total_amount, "IGST"=>$gstTotal, "SGST"=> $sgst, "CGST"=> $cgst);

    echo json_encode($calculated_arr);

?>
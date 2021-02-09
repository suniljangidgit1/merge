<?php
session_start();
date_default_timezone_set('asia/kolkata');   
// $date=date("d-m-Y");     
require('fpdf.php');
error_reporting(E_ALL && ~E_NOTICE);

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

function numberTowords($num)
{ 
    $ones = array( 
        1 => "one", 
        2 => "two", 
        3 => "three", 
        4 => "four", 
        5 => "five", 
        6 => "six", 
        7 => "seven", 
        8 => "eight", 
        9 => "nine", 
        10 => "ten", 
        11 => "eleven", 
        12 => "twelve", 
        13 => "thirteen", 
        14 => "fourteen", 
        15 => "fifteen", 
        16 => "sixteen", 
        17 => "seventeen", 
        18 => "eighteen", 
        19 => "nineteen" 
    ); 
    $tens = array( 
        1 => "ten",
        2 => "twenty", 
        3 => "thirty", 
        4 => "forty", 
        5 => "fifty", 
        6 => "sixty", 
        7 => "seventy", 
        8 => "eighty", 
        9 => "ninety" 
    ); 
    $hundreds = array( 
        "hundred", 
        "thousand", 
        "million", 
        "billion", 
        "trillion", 
        "quadrillion" 
    ); //limit t quadrillion 
    $num = number_format($num,2,".",","); 
    $num_arr = explode(".",$num); 
    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 
    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr); 
    $rettxt = ""; 
    foreach($whole_arr as $key => $i){ 
        if($i < 20){ 
            $rettxt .= $ones[$i]; 
        }elseif($i < 100){ 
            $rettxt .= $tens[substr($i,0,1)]; 
            $rettxt .= " ".$ones[substr($i,1,1)]; 
        }else{ 
            $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
            $rettxt .= " ".$tens[substr($i,1,1)]; 
            $rettxt .= " ".$ones[substr($i,2,1)]; 
        } 
        if($key > 0){ 
            $rettxt .= " ".$hundreds[$key]." "; 
        } 
    } 
    if($decnum > 0){ 
        $rettxt .= " and "; 
        if($decnum < 20){ 
            $rettxt .= $ones[$decnum]; 
        }elseif($decnum < 100){ 
            $rettxt .= $tens[substr($decnum,0,1)]; 
            $rettxt .= " ".$ones[substr($decnum,1,1)]; 
        } 
    } 
    return $rettxt; 
} 


$id=$_GET['id'];
$sql1 = "SELECT * FROM estimate where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);
//echo '<pre>';print_r($row1);die;

function IND_money_format($number){        
    $decimal = (string)($number - floor($number));
    $money = floor($number);
    $length = strlen($money);
    $delimiter = '';
    $money = strrev($money);

    for($i=0;$i<$length;$i++){
        if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$length){
            $delimiter .=',';
        }
        $delimiter .=$money[$i];
    }

    $result = strrev($delimiter);
    $decimal = preg_replace("/0\./i", ".", $decimal);
    $decimal = substr($decimal, 0, 3);

    if( $decimal != '0'){
        $result = $result.$decimal;
    }

    return $result;
}

  
class PDF extends FPDF
{
    function myCell($w,$h,$x,$t){
        $height = $h/3;
        $first = $height+2;
        $second = $height+$height+3;
        $third = $height+$height+$height+4;
        $fourth = $height+$height+$height+$height+5;
        $five = $height+$height+$height+$height+$height+6;
        $len = strlen($t);
        if($len>40){
            $txt = str_split($t,40);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$third,$txt[2],'','','');
            $this->SetX($x);
            $this->Cell($w,$fourth,$txt[3],'','','');
            $this->SetX($x);
            $this->Cell($w,$five,$txt[4],'','','');
           
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB','','L',0);
        }
        else{
            $this->SetX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'L',0);
        }
    }
    // Page header
    function Header()
    {
        if ( $this->PageNo() === 1 ) {
            // Logo
            //$this->Image('logo.png',65,0,75,50);
            // Arial bold 15
            $this->SetFont('Arial','B',14);
            $this->SetFillColor(230,230,0);
            $this->Cell(0,10,'ESTIMATE','0','0','C');
            // Move to the right
        }
        $this->Ln(2);
        // Line break
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        $this->SetFillColor(230,230,0);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
// $pdf->SetMargins(10, 10); 
// $pdf->SetAutoPageBreak(true,10);

$pdf->Ln(8);

$pdf->SetTextColor(15,34,63);

$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,"Billed from",'LTR',0,'L',false);

$pdf->Ln();
$width_cell4=array(100,45,45);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billfromname'],'LTR',0,'L',false);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Estimate Number','LTR',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[2],5,$row1['invoice_number'],'LTR',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['billing_address_street']).",",'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','LBR',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','LBR',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['billing_address_city']).",".UCWORDS($row1['billing_address_state'])." - ".$row1['billing_address_postal_code'],'LR',0,'L',false);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'P.O./S.O. Number','LTR',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[2],5,$row1['po_order_no'],'LR',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['billingaddressgstin']),'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','LBR',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','BR',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['billing_address_state']),'LR',0,'L',false);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Estimate date','LTR',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[2],5,date("d-M-Y",strtotime($row1['date'])),'LR',0,'L',false); 

$pdf->Ln();

$pan=substr($row1['billingaddressgstin'], 2,10);
/*$code=substr($row1['billingaddressgstin'], 0,2);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : '.$code,'LR',0,'L',false);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'','LR',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
$pdf->Ln();*/

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan),'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','LR',0,'L',false);
$pdf->Ln();

//billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions
if($row1['billingfrom_udyamno']!=""){
    $pdf->SetFont('Times','',10);
    $pdf->Cell($width_cell4[0],5,'UDYAM REGISTRATION NUMBER : '.$row1['billingfrom_udyamno'],'LR',0,'L',false);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell($width_cell4[1],5,'','LR',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
    $pdf->Ln();
}

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','L',0,'L',false);
$pdf->Cell($width_cell4[1],2,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],2,'','LR',0,'L',false);
$pdf->Ln();

$pdf->SetFont('Times','B',11);
$pdf->Cell(0,5,'Billed to','LTR',0,'L',false);
$pdf->Cell($width_cell4[1],3,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],3,'','R',0,'L',false);

$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(0,2,'','LBR',0,'L',false);

$pdf->Ln();

$account_id=$row1['account_id'];
$sql5="select * from account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billtoname'],'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['shipping_address_street']).",",'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['shipping_address_city']).",".UCWORDS($row1['shipping_address_state'])." - ".$row1['shipping_address_postal_code'],'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['shippingaddressgstin']),'LR',0,'L',false);
$pdf->SetFont('Times','B',12);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['shipping_address_state']),'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$pan1=substr($row1['shippingaddressgstin'], 2,10);
/*$code1=substr($row1['shippingaddressgstin'], 0,2);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : '.$code1,'LR',0,'L',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
$pdf->Ln();*/

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan1),'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

//billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions
if($row1['billingto_udyamno']!=""){
    $pdf->SetFont('Times','',10);
    $pdf->Cell($width_cell4[0],5,'UDYAM REGISTRATION NUMBER : '.$row1['billingto_udyamno'],'LR',0,'L',false);
    $pdf->SetFont('Times','B',11);
    $pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
    $pdf->Ln();
}


$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','LBR',0,'L',false);
$pdf->Cell($width_cell4[1],2,'','B',0,'L',false);
$pdf->Cell($width_cell4[2],2,'','BR',0,'L',false);

$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'','LBR',0,'L',false);
$pdf->Ln();

$pdf->SetTextColor(15,34,63);
$width_cell=array(11,89,34,15,15,26,20);

// Table Header starts /// 
$pdf->SetFont('Times','B',11);
$x = $pdf->GetX();
$pdf->myCell($width_cell[0],5,$x,'SI No','LR',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[1],5,$x,'Description of Services','LR',0,'C',false); 
$x = $pdf->GetX();
$pdf->myCell($width_cell[2],5,$x,'HSN / SAC','LR',0,'L',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[3],5,$x,'Qty','LR',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[4],5,$x,'Rate','LR',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[5],5,$x,'Amount','LR',0,'C',false); 
$pdf->Ln();
// Table Header starts /// 

$pdf->SetTextColor(0,0,0);

$fill=false;

$estimate_id=$row1['id'];
$sql2="select * from estimates_items where estimate_id='$estimate_id'";
$result2=mysqli_query($conn,$sql2);
$count=0;
$total_amount=0;
$total_discount=0;
$total_tax_amount=0;
$igst = 0;
$cgst = 0;
$sgst = 0;

/*$height_of_cell = 20; // mm
$page_height = 297; // mm (portrait)
$bottom_margin = 0; // mm
for($i=0;$i<=$count;$i++):
    $block=floor($i/4);
    $space_left=$page_height-($pdf->GetY()+$bottom_margin); // space left on page
    if ($i/4==floor($i/4) && $height_of_cell > $space_left) {
        $pdf->AddPage(); // page break
    }
    //$pdf->Cell(0,10,''.$block,'',false);
endfor;*/

while($row2=mysqli_fetch_assoc($result2))
{
    $count++;
    $quantity = ($row2['quantity']!=0) ? $row2['quantity'] : '';
    $rate = ($row2['rate']!=0 || $row2['rate']!='0.00') ? IND_money_format($row2['rate']) : '';

    $igst = ($row2['igst']!='0.00') ? $row2['igst'] : 0;
    $cgst = ($row2['cgst']!='0.00') ? $row2['cgst'] : 0;
    $sgst = ($row2['sgst']!='0.00') ? $row2['sgst'] : 0;

    if($row2['discountvalue']==0 && $igst==0 && $cgst==0 && $sgst==0){
        $table_borders = 'LBR';
    }
    else{
        $table_borders = 'LR';
    }
    $pdf->SetFont('Times','',10);
    $pdf->Cell(11,5,$count,$table_borders,0,'L',false);
    $pdf->Cell(89,5,$row2['description'],$table_borders,0,'L',false);
    $pdf->Cell(34,5,$row2['hsn'],'LBR',0,'L',false);
    $pdf->Cell(15,5,$quantity,'LBR',0,'R',false);
    $pdf->Cell(15,5,$rate,'LBR',0,'R',false);
    $pdf->Cell(26,5,IND_money_format($row2['amount']),'LBR',0,'R',false);
    $pdf->Ln();
    
    if($row2['discountvalue']!=0){
        $item_disc_type = ($row2['discounttype'] == 'Percentage') ? '(%)' : '(Rs)';
        if($row2['discounttype'] == 'Percentage'){
            $discountValue = $row2['discountvalue'];
            $discountAmount = $row2['discountamount'];
            $item_discount_amt = $row2['discountamount'];
        }
        if($row2['discounttype'] == 'Amount'){
            $discountValue = '';
            $discountAmount = $row2['discountvalue'];
            $item_discount_amt = $row2['discountvalue'];
        }
        //echo $item_discount_amt.'<br/>';
        $pdf->SetFont('Times','B',10);
        if($igst!=0){ // If IGST added
            $pdf->Cell(11,5,'','LR',0,'L',false);
            $pdf->Cell(89,5,'','LR',0,'L',false);
        }
        else if($cgst==0 && $sgst==0){ // If CGST & SGST not added
            $pdf->Cell(11,5,'','LBR',0,'L',false);
            $pdf->Cell(89,5,'','LBR',0,'L',false);
        }
        else{
            $pdf->Cell(11,5,'','LR',0,'L',false);
            $pdf->Cell(89,5,'','LR',0,'L',false);
        }
        $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(15,5,$item_disc_type,'LBR',0,'L',false);
        $pdf->Cell(15,5,$discountValue,'LBR',0,'R',false);
        $pdf->Cell(26,5,IND_money_format($discountAmount),'LBR',0,'R',false);
        $pdf->Ln();
    }

    if($igst!=0){ // If IGST added
        $pdf->SetFont('Times','B',11);
        $pdf->Cell(11,5,'','LBR',0,'L',false);
        $pdf->Cell(89,5,'','LBR',0,'L',false);
        $pdf->Cell(34,5,'IGST','LBR',0,'R',false);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(15,5,'','LBR',0,'L',false);
        $pdf->Cell(15,5,$row2['gst_rate'].'%','LBR',0,'L',false);
        $pdf->Cell(25,5,$row2['igst'],'LBR',0,'R',false);
        $pdf->Ln();
    }
    else { // If CGST & SGST added
        if($row2['gst_rate']){
            $gst_rate = $row2['gst_rate'] / 2;
        }
        else{
            $gst_rate = 0;
        }

        if($cgst!=0){
            $pdf->SetFont('Times','B',11);
            $pdf->Cell(11,5,'','LR',0,'L',false);
            $pdf->Cell(89,5,'','LR',0,'L',false);
            $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
            $pdf->SetFont('Times','',10);
            $pdf->Cell(15,5,'','LBR',0,'L',false);
            $pdf->Cell(15,5,$gst_rate.'%','LBR',0,'L',false);
            $pdf->Cell(26,5,$cgst,'LBR',0,'R',false);
            $pdf->Ln();
        }

        if($sgst!=0){
            $pdf->SetFont('Times','B',11);
            $pdf->Cell(11,5,'','LBR',0,'L',false);
            $pdf->Cell(89,5,'','LBR',0,'L',false);
            $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
            $pdf->SetFont('Times','',10);
            $pdf->Cell(15,5,'','LBR',0,'L',false);
            $pdf->Cell(15,5,$gst_rate.'%','LBR',0,'L',false);
            $pdf->Cell(26,5,$sgst,'LBR',0,'R',false);
            $pdf->Ln();
        }
    }
    // Calculations for summary
    $total_amount = $total_amount + $row2['amount'];
    $total_discount = $total_discount +  $item_discount_amt;
    //echo 'total_discount: '.$total_discount.', total_item_discount: '.$item_discount_amt.'<br/>';
    $total_tax_amount = $igst + $cgst + $sgst;

    // Added static rows
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'2','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 2','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'3','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 3','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'4','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 4','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'5','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 5','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'6','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 6','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'7','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 7','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(11,5,'8','LR',0,'L',false);
    // $pdf->Cell(89,5,'Item 8','LR',0,'L',false);
    // $pdf->Cell(34,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'Discount','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'R',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    // $pdf->Cell(34,5,'CGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
    // $pdf->SetFont('Times','B',11);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    // $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    // $pdf->SetFont('Times','',10);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(15,5,'','LBR',0,'L',false);
    // $pdf->Cell(26,5,'','LBR',0,'R',false);
    // $pdf->Ln();
}
//die;
//echo 'Total amount: '.$total_amount.', Total discount: '.$total_discount.', item_discount_amt: '.$item_discount_amt;die;
$sql4="select * from estimates_items where estimate_id='$estimate_id'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'','LBR',0,'L',false);

// Estimate level rows
$total_estimate_amount = $total_amount - $total_discount;

$estimate_discount_type = ($row1['discounttype'] == 'Percentage') ? '(%)' : '('.$row1['discountoption'].')';
//echo $row1['discounttype'];die;
if($row1['discounttype'] == 'Amount'){
    $estimate_discount_amt = ($row1['discountamount']!=0) ? $row1['discountamount'] : 0;
    $total_discount = $total_discount + $estimate_discount_amt;
}

if($row1['g_s_t']!="" && $row1['g_s_t'] == 'CGST'){
    $estimate_igst = 0;
    $estimate_cgst = ($row1['c_g_s_t'] != '' || $row1['c_g_s_t'] != '0.00') ? $row1['c_g_s_t'] : 0;
    $estimate_sgst = ($row1['s_g_s_t'] != '' || $row1['s_g_s_t'] != '0.00') ? $row1['s_g_s_t'] : 0;
}
else if($row1['g_s_t']!="" && $row1['g_s_t'] == 'IGST'){
    $estimate_igst = ($row1['igst'] != '' || $row1['igst'] != '0.00') ? $row1['igst'] : 0;
    $estimate_cgst = 0;
    $estimate_sgst = 0;
}

if($estimate_discount_amt!=0){
    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    if($row1['igst']==0 && $row1['c_g_s_t']==0 && $row1['s_g_s_t']==0){
        $pdf->Cell(100,5,'','LBR',0,'L',false);
        $pdf->Cell(34,5,'Additional Discount','LBR',0,'R',false);
    }
    else{
        $pdf->Cell(100,5,'','LR',0,'L',false);
        $pdf->Cell(34,5,'Additional Discount','LR',0,'R',false);
    }

    $pdf->SetFont('Times','',10);
    $pdf->Cell(15,5,$estimate_discount_type,'LBR',0,'L',false);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->Cell(26,5,IND_money_format($estimate_discount_amt),'LBR',0,'R',false);
    if($row1['igst']==0 && $row1['c_g_s_t']==0 && $row1['s_g_s_t']==0){
        $pdf->Ln();
    }
}

$pdf->SetFont('Times','B',10);
if($row1['g_s_t'] == 'IGST'){
    $pdf->Ln();
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    $pdf->Cell(100,5,'','LBR',0,'L',false);
    $pdf->Cell(34,5,'IGST','LBR',0,'L',false);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->Cell(26,5,$estimate_igst,'LBR',0,'R',false);
}
else if($row1['g_s_t'] == 'CGST'){
    $gst_rate = $row1['gst_rate'] / 2;

    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    $pdf->Cell(100,5,'','LR',0,'L',false);
    $pdf->Cell(34,5,'CGST','LBTR',0,'R',false);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(15,5,$gst_rate.'%','LBR',0,'L',false);
    $pdf->Cell(26,5,$estimate_cgst,'LBR',0,'R',false);

    $pdf->Ln();
    $pdf->SetFont('Times','B',10);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    $pdf->Cell(100,5,'','LBR',0,'L',false);
    $pdf->Cell(34,5,'SGST','LBR',0,'R',false);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->SetFont('Times','',10);
    $pdf->Cell(15,5,$gst_rate.'%','LBR',0,'L',false);
    $pdf->Cell(26,5,$estimate_sgst,'LBR',0,'R',false);
    $pdf->Ln();
}

// Add estimate level taxes if applicable
$total_tax_amount = $total_tax_amount + $estimate_igst + $estimate_cgst + $estimate_sgst;

$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'','LBR',0,'L',false);
$pdf->Ln();

$pdf->SetFont('Times','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'','LR',0,'L',false);
$pdf->Cell(100,5,'','LR',0,'L',false);
$pdf->Cell(64,5,'Sub total','LBR',0,'R',false);
$pdf->SetFont('Times','',10);
$pdf->Cell(26,5,IND_money_format($total_amount),'LBR',0,'R',false);
$pdf->Ln();
$pdf->SetFont('Times','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'Total calculated summary','LR',0,'L',false);
$pdf->Cell(100,5,'','LR',0,'L',false);
$pdf->Cell(64,5,'Total discount','LBR',0,'R',false);
$pdf->SetFont('Times','',10);
$pdf->Cell(26,5,IND_money_format($total_discount),'LBR',0,'R',false);

$pdf->Ln();
$pdf->SetFont('Times','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'','LR',0,'L',false);
$pdf->Cell(100,5,'','LR',0,'L',false);
$pdf->Cell(64,5,'Total taxes','LBR',0,'R',false);
$pdf->SetFont('Times','',10);
$pdf->Cell(26,5,IND_money_format($total_tax_amount),'LBR',0,'R',false);

// Calculation of total amount of summary
$summary_total_amt = ($total_amount + $total_tax_amount) - $total_discount;

$pdf->Ln();
$pdf->SetFont('Times','B',11);
// $pdf->Cell(11,5,'','LBR',0,'L',false);
// $pdf->Cell(89,5,'','LBR',0,'L',false);
$pdf->Cell(100,5,'','LBR',0,'L',false);
$pdf->Cell(64,5,'Total amount','LBR',0,'R',false);
$pdf->SetFont('Times','',10);
$pdf->Cell(26,5,IND_money_format($summary_total_amt),'LBR',0,'R',false);

$pdf->Ln();

$width_cellA=array(45,130,15);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellA[0],7,'Amount chargeable (in words): ','BL',0,'L',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellA[1],7, ucwords(numberTowords($summary_total_amt)),'B',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,7,'E. & O.E','BR',0,'R',false);
$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'','LBR',0,'L',false);
$pdf->Ln();

$pdf->SetTextColor(15,34,63);
$width_cellT=array(100,90);
$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'Terms & Conditions:','LTR',0,'L',false);
$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,20,$row1['terms_conditions'],'LRB',0,'L',false);
$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'Customers Seal and Signature','LR',0,'L',false); 
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellT[1],5,$row1['billfromname'],'LR',0,'R',false);

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],15,'','LR',0,'L',false);
$pdf->Cell($width_cellT[1],15,' ','LR',0,'R',false);

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],5,'','LRB',0,'L',false); 
$pdf->Cell($width_cellT[1],5,'Authorised Signatory','LRB',0,'R',false);

$pdf->Output();
?>
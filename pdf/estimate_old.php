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
    // Logo
    //$this->Image('logo.png',65,0,75,50);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
          $this->SetFillColor(230,230,0);
    $this->Cell(0,10,'ESTIMATE','0','0','C');
    // Move to the right
 
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
$pdf->SetFont('Times','',12);

$pdf->Ln(8);

$pdf->SetTextColor(15,34,63);

$width_cell4=array(100,45,45);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billfromname'],'LTR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Estimate No.','LTR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'Estimate Date','LTR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['billing_address_street']).",",'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,$row1['invoice_number'],'LBR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,date("d-M-Y",strtotime($row1['date'])),'LBR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['billing_address_city']).",".UCWORDS($row1['billing_address_state']).",".UCWORDS($row1['billing_address_country'])."-".$row1['billing_address_postal_code'],'LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Place of Supply','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['billingaddressgstin']),'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,$row1['placeofsupply'],'LB',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','BR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['billing_address_state']),'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$code=substr($row1['billingaddressgstin'], 0,2);
$pan=substr($row1['billingaddressgstin'], 2,10);

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : '.$code,'LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan),'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','L',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],2,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],2,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','LT',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],2,'','LT',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],2,'','TR',0,'L',false); // Third header column 

$pdf->Ln();
$pdf->SetFont('Times','B',12);
$pdf->Cell($width_cell4[0],5,'Buyer -','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$account_id=$row1['account_id'];
$sql5="select * from account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billtoname'],'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['shipping_address_street']).",",'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,UCWORDS($row1['shipping_address_city']).",".UCWORDS($row1['shipping_address_state']).",".UCWORDS($row1['shipping_address_country'])."-".$row1['shipping_address_postal_code'],'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['shippingaddressgstin']),'LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',12);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['shipping_address_state']),'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$code1=substr($row1['shippingaddressgstin'], 0,2);
$pan1=substr($row1['shippingaddressgstin'], 2,10);

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : '.$code1,'LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan1),'LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','LBR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],2,'','B',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],2,'','BR',0,'L',false); // Third header column 

$pdf->Ln();

//$pdf->SetFillColor(221,218,218);
$pdf->SetTextColor(15,34,63);
$width_cell=array(10,80,20,15,25,20,20);



// Header starts /// 
$pdf->SetFont('Times','B',11);
$x = $pdf->GetX();
$pdf->myCell($width_cell[0],5,$x,'SI No','LR',0,'C',false); // First header column
$x = $pdf->GetX();
$pdf->myCell($width_cell[1],5,$x,'Description of Services','LR',0,'C',false); // First header column 
$x = $pdf->GetX();
$pdf->myCell($width_cell[2],5,$x,'HSN/SAC','LR',0,'L',false); // Second header column
$x = $pdf->GetX();
$pdf->myCell($width_cell[3],5,$x,'Qty','LR',0,'C',false); // Third header column 
$x = $pdf->GetX();
$pdf->myCell($width_cell[4],5,$x,'Rate','LR',0,'C',false); // Fourth header column
$x = $pdf->GetX();
$pdf->myCell($width_cell[5],5,$x,'per','LR',0,'C',false); // First header column 
$x = $pdf->GetX();
$pdf->myCell($width_cell[6],5,$x,'Amount','LR',0,'C',false); // First header column 

// $pdf->Cell($width_cell[5],10,'Transaction ID',1,0,L); // Second header column
// $pdf->Cell($width_cell[6],10,'Bank Details',1,0,L); // Third header column 


$pdf->Ln();
//// header ends ///////

$pdf->SetTextColor(0,0,0);


$fill=false; // to give alternate background fill color to rows 



$estimate_id=$row1['id'];
$sql2="select * from estimates_items where estimate_id='$estimate_id'";
$result2=mysqli_query($conn,$sql2);
$count=0;
$total_amount=0;
$total_discount=0;
$total_amount_igst=0;
 $total_amount_scst=0;
while($row2=mysqli_fetch_assoc($result2))
{


    $total_amount_igst=$total_amount_igst+$row2['igst'];
    $total_amount_sgst= $total_amount_sgst+$row2['sgst'] ;
    $total_amount_cgst=$total_amount_cgst+ $row2['cgst'];
    $count++;

    $total_amount=$total_amount + $row2['amount'];

    $amount= $row2['quantity'] * $row2['rate'];

     if($row2['discounttype']=='At item level')
    {
        if($row2['discountoption']=='%')
        {
         
                $per=$amount * $row2['discountvalue']/100; 
             
                $total_discount=$total_discount +  $per;
           
        }
        else if($row2['discountoption']=='Rs')
        {
                $per=0;
                $total_discount=$total_discount +  $row2['discountamount'];
        }
    }

    $item=strlen($row2['item_name']);
    $des= strlen($row2['description']);

    $total_item_des=$item + $des;
    $h=12*ceil($total_item_des/40);

$pdf->SetFont('Times','',10);
$x = $pdf->GetX();
$pdf->myCell($width_cell[0],$h,$x,$count,'LRT',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[1],$h,$x,$row2['item_name']."-".$row2['description'],'T',0,'L',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[2],$h,$x,$row2['hsn'],'1',0,'L',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[3],$h,$x,$row2['quantity'],'T',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[4],$h,$x,IND_money_format($row2['rate']),'LT',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[5],$h,$x,'','LT',0,'C',false);
$x = $pdf->GetX();
$pdf->myCell($width_cell[6],$h,$x,IND_money_format($amount),'LTR',0,'C',false);
$pdf->Ln();

}

$sql4="select * from estimates_items where estimate_id='$estimate_id'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

if($row1['discounttype']=='At invoice level')
{
    $total_discount=$row1['discountamount'];
}

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total Discount','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5, IND_money_format($total_discount),'LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total CGST','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,IND_money_format($total_amount_cgst),'LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total SGST','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5, IND_money_format($total_amount_sgst),'LTR',0,'C',false);

$pdf->Ln();


$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total IGST','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,IND_money_format($total_amount_igst),'LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total Adjustment','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,IND_money_format($row1['adjustments']),'LTR',0,'C',false);

$pdf->Ln();

$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[0],5,'','LTRB',0,'R',false);
$pdf->Cell($width_cell[1],5,'Total','TB',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LTB',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[6],5,IND_money_format($row1['total'],2),'LTRB',0,'C',false);

$pdf->Ln();

$width_cellA=array(45,130,15);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellA[0],5,'Amount Chargeable (in words):','L',0,'L',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellA[1],5,ucwords(numberTowords($row1['total'])),'',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellA[2],5,'E. & O.E','R',0,'R',false);

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','LB',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],2,'','B',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],2,'','BR',0,'L',false); // Third header column 

$pdf->Ln();

$width_cell1=array(30,30,20,30,20,20,40);

$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell1[0],5,'HSN/SAC','L',0,'C',false); // First header column 
$pdf->Cell($width_cell1[1],5,'Taxable Value','L',0,'C',false); // Second header column
$pdf->Cell($width_cell1[2],5,'Rate (%)','L',0,'C',false); // Third header column 
$pdf->Cell($width_cell1[3],5,'CGST','L',0,'C',false); // Fourth header column

$pdf->Cell($width_cell1[4],5,'SGST','L',0,'C',false); // First header column 
$pdf->Cell($width_cell1[5],5,'IGST','L',0,'C',false); // First header column 
$pdf->Cell($width_cell1[6],5,'Total Tax Amount','LR',0,'C',false); // First header column 

$pdf->Ln();

$sql3="select * from estimates_items where estimate_id='$estimate_id'";
$result3=mysqli_query($conn,$sql3);
$count=1;
$total_amount=0;

while($row3=mysqli_fetch_assoc($result3))
{

    if($row1['g_s_t']=='IGST')
    {
        $total_amount=$row3['igst'];
    }
    else
    {
                $total_amount=$row3['sgst'] + $row3['cgst'];

    }

    $pdf->SetFont('Times','',10);
    $pdf->Cell($width_cell1[0],5,$row3['hsn'],'LRT',0,'C',false); // First header column 
    $pdf->Cell($width_cell1[1],5,IND_money_format($row3['amount']),'RT',0,'C',false); // Second header column
    $pdf->Cell($width_cell1[2],5,IND_money_format($row3['gst_rate']),'LT',0,'C',false); // Third header column 
    $pdf->Cell($width_cell1[3],5,IND_money_format($row3['cgst']),'LT',0,'C',false); // Fourth header column
    $pdf->Cell($width_cell1[4],5,IND_money_format($row3['sgst']),'LRT',0,'C',false); // First header column 
    $pdf->Cell($width_cell1[5],5,IND_money_format($row3['igst']),'RT',0,'C',false); // First header column 
    $pdf->Cell($width_cell1[6],5,IND_money_format($total_amount),'RT',0,'C',false); // First header column 
    $pdf->Ln();
}

$pdf->SetTextColor(15,34,63);

$width_cellT=array(100,90);

$pdf->SetFont('Times','',10);
$pdf->Cell(0,5,'Terms & Conditions:','LTR',0,'L',false); // First header column 
$pdf->Ln();
$pdf->Cell(0,20,'','LRB',0,'L',false); // First header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'Customers Seal and Signature','LR',0,'L',false); // First header column 
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellT[1],5,$row1['billfromname'],'LR',0,'R',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],15,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],15,' ','LR',0,'R',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],5,'','LRB',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Authorised Signatory','LRB',0,'R',false); // Second header column

$pdf->Output();
?>

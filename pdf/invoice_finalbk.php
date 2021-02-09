<?php
// session_start();
date_default_timezone_set('asia/kolkata');   
// $date=date("d-m-Y");     
require('fpdf.php');
error_reporting(E_ALL && ~E_NOTICE);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

define('FPDF_FONTPATH',$_SERVER['DOCUMENT_ROOT'].'/pdf/font/');

function numberTowords(float $amount)
{ 
    /*$ones = array( 
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
    return $rettxt; */

    $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
    // Check if there is any number after decimal
    $amt_hundred = null;
    $count_length = strlen($num);
    $x = 0;
    $string = array();
    $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '.$here_digits[$counter]. $add_plural.' '.$amt_hundred:$change_words[floor($amount / 10) * 10].''.$change_words[$amount % 10].' '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
    else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And ".($change_words[$amount_after_decimal / 10]." ".$change_words[$amount_after_decimal % 10]).' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees.'Rupees ' : '').$get_paise;
} 

// echo '<pre>';print_r($_REQUEST);die;
if(isset($_REQUEST['invoice_recordId']))
{   // This id is send from E-mail invoice popup from invoice list
    $id = $_REQUEST['invoice_recordId'];
}
else if(isset($_REQUEST['recordId']))
{   // This id is send from update_invoice.php file while updating record
    $id = $_REQUEST['recordId'];
}
else
{   // This id is send from view pdf option from invoice list
    $id = $_GET['id'];
}

$sql1 = "SELECT * FROM invoice where id='$id'";
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

    return $result.'.00';
}

  
class PDF extends FPDF
{
    function myCell($w,$h,$x,$t,$border='',$b='',$align='',$d='',$fill='', $amounts_align='', $gst_rate='', $gst_type='', $gst_rate_val=''){
        $height = $h/3;
        $first = $height+2;
        $second = $height+$height+3;
        $third = $height+$height+$height+4;
        $fourth = $height+$height+$height+$height+5;
        $five = $height+$height+$height+$height+$height+6;
        $len = strlen($t);

        if($len < 23){
            if($gst_type == 'IGST'){
                $new_h = 20;
            } 
            else {
                $new_h = 35;
            }
        }
        else {
            $new_h = 49;
        }

        if($len>23){
            $txt = str_split($t,29);
            if($fill){
                $this->setFillColor(6, 31, 61);
            }
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
            // Condition added by Sachin
            $set_align = 0;
            if($amounts_align){ // If column has numeric then show it to right 
                $set_align = 1;
            }
            if($fill){ // Condition for header of the table
                $this->setFillColor(6, 31, 61);
                $this->SetTextColor(255,255,255);
                    //$this->SetDrawColor(255,255,255);
                $header_align = ($set_align) ? 'R' : 'L';
                $this->Cell($w,$h,$t,'LTRB',0,$header_align,true);
            }
            if(!$fill){
                if($set_align){ // If column has numeric then show it to right 
                    if($gst_rate){
                        // $pdf->myCell($width_cell[9],$h,$x,IND_money_format($item_total_amount),'LT',0,'R',false, false, true, 1, $items_gst_type);
                        if($gst_type == 'CGST'){
                            // $this->Cell($w,19,$t."\n".$this->gray_color('(9%)'),'R',0,'R',0);
                            $this->Cell($w,$new_h,$t."\n(9%)",'R',0,'R',0);
                        }
                        else {
                            // $gst_type_rate = $this->gray_color($w, 19, $gst_type);
                            $this->Cell($w,$new_h,$t."\n(18%)",'R',0,'R',0);
                        }
                        $this->SetFont('Calibri','',10);
                        $this->SetTextColor(0, 0, 0);
                        // $current_y = $this->GetY();
                        // $current_x = $this->GetX();
                        // $this->MultiCell($w,6,$t."\n9%",'RB','R');
                        // $this->SetXY($current_x + 13, $current_y);
                    }
                    else{
                        $this->Cell($w,$h,$t,'LTRB',0,'R',0);
                    }
                }
                else {
                    $this->Cell($w,$h,$t,'LTRB',0,'L',0);
                }
            }
        }
    }

    function gray_color($w, $h, $gst_type)
    {   
        $this->SetFont('Calibri','',9);
        $this->SetTextColor(90, 90, 90);
        if($gst_type == 'IGST'){
            return $this->Text($w, $h, "\n(18%)");
        }
        else {
            return $this->Text($w, $h, "\n(9%)");
        }
    }

    // Page header
    function Header()
    {
        if ( $this->PageNo() === 1 ) {
            // Logo
            // $this->Image('logo.png',0,0,75,30);
            // Arial bold 15
            $this->SetFont('Calibri','B',14);
            $this->SetFillColor(230,230,0);
            $this->SetTextColor(6, 31, 61);
            $this->Cell(0,10,'INVOICE','0','0','C');
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
// require('makefont/makefont.php');
// MakeFont('D:\xampp\htdocs\crm\pdf\makefont\calibrii.ttf','cp1252');
$pdf->AddFont('Calibri', '', 'calibri.php');
$pdf->AddFont('Calibri', 'B', 'calibrib.php');

$pdf->AliasNbPages();
$pdf->AddPage();
// $pdf->SetMargins(10, 10); 
// $pdf->SetAutoPageBreak(true,10);

$pdf->Ln(8);

$pdf->SetFont('Calibri','B',11);
// $pdf->setFillColor(240,240,240); 
// $pdf->SetDrawColor(240,240,245); 
$pdf->SetDrawColor(184, 184, 184); 
// $pdf->SetDrawColor(252, 240, 255); 
$pdf->Cell(0,8,"Billed From : ",'',0,'L',false);

$pdf->Ln();
$width_cell4=array(100,45,45);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billfromname'],'LTR',0,'L',false);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[1],5,'Invoice Number : ','T',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['invoiceno'],'TR',0,'L',false);

$pdf->Ln();

$address = UCWORDS($row1['billing_address_street']);
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[0],5,$address,'L',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','LB',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','BR',0,'L',false);

$pdf->Ln();

$from_email_phone = $row1['billingfromemail'].",".$row1['billingfromphone'];
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[0],5, $from_email_phone,'LR',0,'L',false);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[1],5,'P.O./S.O. Number : ','',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['po_order_no'],'R',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Calibri','',9);
// $pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['billingaddressgstin']),'L',0,'L',false);
$pdf->Cell($width_cell4[0],5, UCWORDS($row1['billing_address_city']).', '.UCWORDS($row1['billing_address_state'])." - ".$row1['billing_address_postal_code'],'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','LB',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','BR',0,'L',false);

$pdf->Ln();

$pdf->SetFont('Calibri','',9);
// $pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['billing_address_state']),'L',0,'L',false);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['billingaddressgstin']),'L',0,'L',false);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[1],5,'Invoice Date : ','L',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,date("d-M-Y",strtotime($row1['invoicedate'])),'R',0,'L',false); 

$pdf->Ln();

// $pan=substr($row1['billingaddressgstin'], 2,10);

if($row1['billingfrom_udyamno']!=""){
    $bottom_border0 = 'LR';
    $bottom_border1 = '';
    $bottom_border2 = 'R';
}
else {
    $bottom_border0 = 'LBR';
    $bottom_border1 = 'B';
    $bottom_border2 = 'BR';
}

if($row1['billfrompan']){
    $pan = $row1['billfrompan'];

    $pdf->SetFont('Calibri','',9);
    $pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan),$bottom_border0,0,'L',false);
    $pdf->Cell($width_cell4[1],5,'',$bottom_border1,0,'L',false);
    $pdf->Cell($width_cell4[2],5,'',$bottom_border2,0,'L',false);

    $pdf->Ln();
}

if($row1['billingfrom_udyamno']!=""){
    $pdf->SetFont('Calibri','',9);
    $pdf->Cell($width_cell4[0],5,'UDYAM REGISTRATION NUMBER : '.$row1['billingfrom_udyamno'],'LBR',0,'L',false);
    $pdf->SetFont('Calibri','B',11);
    // $pdf->Cell($width_cell4[1],5,'','LB',0,'L',false);
    // $pdf->Cell($width_cell4[2],5,'','BR',0,'L',false);
    $pdf->SetFont('Calibri','B',11);
    $pdf->Cell($width_cell4[1],5,'Due Date : ','TBL',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[2],5,date("d-M-Y",strtotime($row1['duedate'])),'BTR',0,'L',false);
    $pdf->Ln();
}

$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,2,'','',0,'L',false);
$pdf->Ln();

$pdf->SetFont('Calibri','B',11);
$pdf->Cell(0,8,'Billed To : ','',0,'L',false);
$pdf->Cell($width_cell4[1],6,'','',0,'L',false);
$pdf->Cell($width_cell4[2],6,'','',0,'L',false);

$pdf->Ln();
$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,2,'','',0,'L',false);

$pdf->Ln();

$account_id=$row1['account_id'];
$sql5="select * from account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);

$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[0],5,$row1['billtoname'],'LT',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','T',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','TR',0,'L',false);

$pdf->Ln();

$to_address = UCWORDS($row1['shipping_address_street']).",".UCWORDS($row1['shipping_address_city']).",".UCWORDS($row1['shipping_address_state'])." - ".$row1['shipping_address_postal_code'];
$pdf->SetFont('Calibri','',9);
$pdf->Cell(0,5,$to_address,'LR',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

$to_email_phone = $row1['billingtoemail'].', '.$row1['billingtophone'];
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[0],5,$to_email_phone,'L',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

if($row1['shippingaddressgstin']){
    $pdf->SetFont('Calibri','',9);
    $pdf->Cell($width_cell4[0],5,'GSTIN/UIN : '.strtoupper($row1['shippingaddressgstin']),'L',0,'L',false);
    $pdf->SetFont('Calibri','B',12);
    $pdf->Cell($width_cell4[1],5,'','',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

    $pdf->Ln();
}

$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[0],5,'State : '.UCWORDS($row1['shipping_address_state']),'L',0,'L',false);
$pdf->Cell($width_cell4[1],5,'','',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

$pdf->Ln();

if($row1['billtopan']){
    // $pan1=substr($row1['shippingaddressgstin'], 2,10);
    $pan1=$row1['billtopan'];

    /*$code1=substr($row1['shippingaddressgstin'], 0,2);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[0],5,'Code : '.$code1,'LR',0,'L',false);
    $pdf->SetFont('Calibri','B',10);
    $pdf->Cell($width_cell4[1],5,'','L',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
    $pdf->Ln();*/

    $pdf->SetFont('Calibri','',9);
    $pdf->Cell($width_cell4[0],5,'PAN : '.strtoupper($pan1),'L',0,'L',false);
    $pdf->Cell($width_cell4[1],5,'','',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);

    $pdf->Ln();
}

//billingfrom_udyamno,billingto_udyamno,po_order_no,terms_conditions
if($row1['billingto_udyamno']!=""){
    $pdf->SetFont('Calibri','',9);
    $pdf->Cell($width_cell4[0],5,'UDYAM REGISTRATION NUMBER : '.$row1['billingto_udyamno'],'L',0,'L',false);
    $pdf->SetFont('Calibri','B',11);
    $pdf->Cell($width_cell4[1],5,'','',0,'L',false);
    $pdf->Cell($width_cell4[2],5,'','R',0,'L',false);
    $pdf->Ln();
}

$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[0],2,'','LB',0,'L',false);
$pdf->Cell($width_cell4[1],2,'','B',0,'L',false);
$pdf->Cell($width_cell4[2],2,'','BR',0,'L',false);

$pdf->Ln();
$pdf->SetFont('Calibri','',10);
//$pdf->Cell(0,5,'','LBR',0,'L',false);
$pdf->Cell(0,5,'','',0,'L',false);
$pdf->Ln();

$pdf->SetTextColor(15,34,63);
// $width_cell=array(11,89,34,15,15,26,20);

$width_cell=array(11,45,20,10,14,22,17,14.5,14.5,22);

// Table Header starts /// 
$pdf->SetFont('Calibri','B',11);
$x = $pdf->GetX();
$pdf->myCell($width_cell[0],7,$x,'Sr.No.','LR',0,'C',false, true);
$x = $pdf->GetX();
$pdf->myCell($width_cell[1],7,$x,'Description of Services','LR',0,'C',false, true); 
$x = $pdf->GetX();
$pdf->myCell($width_cell[2],7,$x,'HSN / SAC','LR',0,'L',false, true);
$x = $pdf->GetX();
$pdf->myCell($width_cell[3],7,$x,'Qty','LR',0,'C',false, true, true);
$x = $pdf->GetX();
$pdf->myCell($width_cell[4],7,$x,'Rate','LR',0,'C',false, true, true);
$x = $pdf->GetX();
$pdf->myCell($width_cell[5],7,$x,'Amount','LR',0,'C',false, true, true);
$x = $pdf->GetX();
$pdf->myCell($width_cell[6],7,$x,'Discount','LR',0,'C',false, true, true);

$invoice_id=$row1['id'];
$sql_2="select * from invoice_items where invoice_id='$invoice_id'";
$result_2=mysqli_query($conn,$sql_2);

$igst_present = 0;
$cgst_present = 0;
while($row2=mysqli_fetch_assoc($result_2))
{
    $igst = ($row2['igst']!='0.00') ? $row2['igst'] : 0;
    $cgst = ($row2['cgst']!='0.00') ? $row2['cgst'] : 0;
    $sgst = ($row2['sgst']!='0.00') ? $row2['sgst'] : 0;

    if($igst!=0){
        $igst_present = 1;
        $cgst_present = 0;
    }
    else if($cgst!=0){
        $igst_present = 0;
        $cgst_present = 1;
    }
}

if($igst_present===1){
    $width = $width_cell[7] + $width_cell[8];
    $x = $pdf->GetX();
    $pdf->myCell($width,7,$x,'IGST','LR',0,'C',false, true, true);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[9],7,$x,'Amount','LR',0,'C',false, true, true);
    $x = $pdf->GetX(); 
}
else if($cgst_present!=0){
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[7],7,$x,'CGST','LR',0,'C',false, true, true); 
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[8],7,$x,'SGST','LR',0,'C',false, true, true);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[9],7,$x,'Amount','LR',0,'C',false, true, true);
    $x = $pdf->GetX(); 
}
else{
    $total_width = $width_cell[7] + $width_cell[8] + $width_cell[9];
    $x = $pdf->GetX();
    $pdf->myCell($total_width,7,$x,'Amount','LR',0,'C',false, true, true);
}
$pdf->Ln();
// Table Header starts /// 

$pdf->SetTextColor(0,0,0);

$fill=false;

$invoice_id=$row1['id'];
$sql2="select * from invoice_items where invoice_id='$invoice_id'";
$result2=mysqli_query($conn,$sql2);
$total_rows=mysqli_num_rows($result2);
$count=0;
$total_amount=0;
$total_amt=0;
$total_discount=0;
$total_tax_amount=0;
$igst = 0;
$cgst = 0;
$sgst = 0;

$total_qty=0;
$total_rate=0;

$items_gst_type = '';

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
    $gst_rate = ($row2['gst_rate']!=0) ? $row2['gst_rate'] : '';
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

    if($count === $total_rows){
        $bottom_border = 'BR';
        $firstrow_borders = 'LBR';
        $firsttop_borders = '';
        $top_border = '';
    }
    else {
        $bottom_border = 'R';
        $firstrow_borders = 'LR';
        $firsttop_borders = 'L';
        $top_border = 'LR';
    }


    $pdf->SetFont('Calibri','',10);
    //$pdf->setFillColor(240,240,240);

    $item=strlen($row2['item_name']);
    $des= strlen($row2['description']);

    $total_item_des=$des;
    $h=15*ceil($total_item_des/50);

    $x = $pdf->GetX();
    $pdf->myCell($width_cell[0],$h,$x,$count,'LRT',0,'C',false);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[1],$h,$x,$row2['description'],'T',0,'L',false);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[2],$h,$x,$row2['hsn'],'T',0,'C',false, false, true);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[3],$h,$x,$quantity,'T',0,'R',false, false, true);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[4],$h,$x,$rate,'LT',0,'R',false, false, true);
    $x = $pdf->GetX();
    $pdf->myCell($width_cell[5],$h,$x,IND_money_format($row2['amount']),'LT',0,'R',false, false, true);
    
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
        
        $pdf->SetFont('Calibri','',10);
        $x = $pdf->GetX();
        $pdf->myCell($width_cell[6],$h,$x,IND_money_format($discountAmount),'LT',0,'R',false, false, true);
    }
    else{
        $pdf->SetFont('Calibri','',10);
        $x = $pdf->GetX();
        $pdf->myCell($width_cell[6],$h,$x,'','LT',0,'R',false, false, true);
    }
    if($igst!=0){ // GST Type is IGST
        $items_gst_type = 'IGST';
        $width = $width_cell[7] + $width_cell[8];
        $item_total_amount = $row2['amount'] - $item_discount_amt + $igst;

        $x = $pdf->GetX();
        $pdf->myCell($width,$h,$x,$igst,'LT',0,'R',false, false, true, 1, $items_gst_type);
        $x = $pdf->GetX();
        $pdf->myCell($width_cell[9],$h,$x,IND_money_format($item_total_amount),'LT',0,'R',false, false, true, $gst_rate);
    }
    else if($igst==0 && $cgst!=0 && $sgst!=0){ // GST Type is CGST
        $items_gst_type = 'CGST';
        if($row2['gst_rate']){
            $gst_rate = $row2['gst_rate'] / 2;
        }
        else{
            $gst_rate = 0;
        }

        if($cgst!=0){
            $x = $pdf->GetX();
            $pdf->myCell($width_cell[7],$h,$x,IND_money_format($row2['cgst']),'LT',0,'R',false, false, true, 1, $items_gst_type, $gst_rate);
        }
        if($sgst!=0){
            $x = $pdf->GetX();
            $pdf->myCell($width_cell[8],$h,$x,IND_money_format($row2['sgst']),'LT',0,'R',false, false, true, 1, $items_gst_type, $gst_rate);
        }
        $item_total_amount = $row2['amount'] - ($item_discount_amt + $cgst + $sgst);
        $x = $pdf->GetX();
        $pdf->myCell($width_cell[9],$h,$x,IND_money_format($item_total_amount),'LT',0,'R',false, false, true);
    }
    else { // GST Type is not selected
        $item_amount = ($row2['amount'] + $gst_rate) - $item_discount_amt;
        $total_width = $width_cell[7] + $width_cell[8] + $width_cell[9];
        $x = $pdf->GetX();
        $pdf->myCell($total_width,$h,$x,IND_money_format($item_amount),'LT',0,'R',false, false, true); 
    }
    $pdf->Ln();
    
    // Calculations for summary
    $total_amt = $total_amt + $item_amount;
    $total_amount = $total_amount + $row2['amount'];
    $total_discount = $total_discount +  $item_discount_amt;
    $total_tax_amount = $igst + $cgst + $sgst;

    $tot_qty = ($row2['quantity']!='0.00') ? $row2['quantity'] : 0;
    $tot_rate = ($row2['rate']!='0.00') ? $row2['rate'] : 0;
    $total_qty = $total_qty + $tot_qty;
    $total_rate = $total_rate + $tot_rate;

    $total_igst = $igst;
    $total_cgst = $cgst;
    $total_sgst = $sgst;

    //$width_cell=array(11,45,20,10,14,25,17,13,13,22);
}

$pdf->SetFont('Calibri','',10);
$pdf->setFillColor(240,240,240);
if($total_qty!=0){
    $pdf->SetFont('Calibri','B',10);
    $pdf->Cell(76,5,'Total','LTBR',0,'R',true);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell(10,5,$total_qty,'LTBR',0,'R',true);
    $pdf->Cell(14,5,$total_rate,'LTBR',0,'R',true);
}
else {
    $pdf->SetFont('Calibri','B',10);
    $pdf->Cell(100,5,'Total','LTB',0,'R',true);
}
$pdf->SetFont('Calibri','',10);
$pdf->Cell(22,5,IND_money_format($total_amount),'LTBR',0,'R',true);
if($total_discount){
    $pdf->Cell(17,5,IND_money_format($total_discount),'LTBR',0,'R',true);
}
else{
    $pdf->Cell(17,5,'','LTBR',0,'R',true);
}

$total_amt = $total_amt + $cal_amt + $total_cgst + $total_sgst;

if($igst_present!=0){
    $cal_amt =  $total_amount - $total_discount;
    $total_amt = $cal_amt + $total_igst;
    $pdf->Cell(29,5,IND_money_format($total_igst),'LTBR',0,'R',true);
    $pdf->Cell(22,5,IND_money_format($total_amt),'LTBR',0,'R',true);
}
else if($cgst_present!=0){
    $cal_amt =  $total_amount - $total_discount;
    $total_amt = $cal_amt + $total_cgst + $total_sgst;
    $pdf->Cell(14.5,5,IND_money_format($total_cgst),'LTBR',0,'R',true);
    $pdf->Cell(14.5,5,IND_money_format($total_sgst),'LTBR',0,'R',true);
    $pdf->Cell(22,5,IND_money_format($total_amt),'LTBR',0,'R',true);
}
else {
    $pdf->Cell(51,5,IND_money_format($total_amt),'LTBR',0,'R',true);
}
$pdf->Ln();
$pdf->setFillColor(0,0,0);
$sql4="select * from invoice_items where invoice_id='$invoice_id'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);

$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,5,'','',0,'L',false);

// invoice level rows
$total_invoice_amount = $total_amount - $total_discount;

$invoice_discount_type = ($row1['discounttype'] == 'Percentage') ? '(%)' : '('.$row1['discountoption'].')';

if($row1['discounttype'] == 'Amount'){
    $invoice_discount_amt = ($row1['discountamount']!=0) ? $row1['discountamount'] : 0;
    $total_discount = $total_discount + $invoice_discount_amt;
}

if($row1['gst']!="" && $row1['gst'] == 'CGST'){
    $invoice_igst = 0;
    $invoice_cgst = ($row1['cgst'] != '' || $row1['cgst'] != '0.00') ? $row1['cgst'] : 0;
    $invoice_sgst = ($row1['sgst'] != '' || $row1['sgst'] != '0.00') ? $row1['sgst'] : 0;
}
else if($row1['gst']!="" && $row1['gst'] == 'IGST'){
    $invoice_igst = ($row1['igst'] != '' || $row1['igst'] != '0.00') ? $row1['igst'] : 0;
    $invoice_cgst = 0;
    $invoice_sgst = 0;
}

if($invoice_discount_amt!=0){
    $pdf->Ln();
    $pdf->SetFont('Calibri','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    if($row1['igst']==0 && $row1['cgst']==0 && $row1['sgst']==0){
        $pdf->Cell(100,5,'','',0,'L',false);
        $pdf->Cell(34,5,'Additional Discount','LTBR',0,'R',false);
    }
    else{
        $pdf->Cell(100,5,'','',0,'L',false);
        $pdf->Cell(34,5,'Additional Discount','LTR',0,'R',false);
    }

    $pdf->SetFont('Calibri','',10);
    $pdf->Cell(15,5,$invoice_discount_type,'LTBR',0,'L',false);
    $pdf->Cell(15,5,'','LTBR',0,'L',false);
    $pdf->Cell(26,5,IND_money_format($invoice_discount_amt),'LTBR',0,'R',false);
    if($row1['igst']==0 && $row1['cgst']==0 && $row1['sgst']==0){
        $pdf->Ln();
    }
}

$pdf->SetFont('Calibri','B',10);
if($row1['gst'] == 'IGST'){
    $pdf->Ln();
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    $pdf->Cell(100,5,'','R',0,'L',false);
    $pdf->Cell(34,5,'IGST','LTBR',0,'R',false);
    $pdf->Cell(15,5,'','LBR',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell(15,5,$row1['gst_rate'].'%','LBR',0,'L',false);
    $pdf->Cell(26,5,IND_money_format($invoice_igst),'LBR',0,'R',false);
    $pdf->Ln();
}
else if($row1['gst'] == 'CGST'){
    $gst_rate = $row1['gst_rate'] / 2;

    $pdf->Ln();
    $pdf->SetFont('Calibri','B',10);
    // $pdf->Cell(11,5,'','LR',0,'L',false);
    // $pdf->Cell(89,5,'','LR',0,'L',false);
    $pdf->Cell(100,5,'','',0,'L',false);
    $pdf->Cell(34,5,'CGST','LBTR',0,'R',false);
    $pdf->Cell(15,5,'','LBTR',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell(15,5,$gst_rate.'%','LBTR',0,'L',false);
    $pdf->Cell(26,5,IND_money_format($invoice_cgst),'LBTR',0,'R',false);

    $pdf->Ln();
    $pdf->SetFont('Calibri','B',10);
    // $pdf->Cell(11,5,'','LBR',0,'L',false);
    // $pdf->Cell(89,5,'','LBR',0,'L',false);
    $pdf->Cell(100,5,'','',0,'L',false);
    $pdf->Cell(34,5,'SGST','LBTR',0,'R',false);
    $pdf->Cell(15,5,'','LBTR',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell(15,5,$gst_rate.'%','LBTR',0,'L',false);
    $pdf->Cell(26,5,IND_money_format($invoice_sgst),'LBTR',0,'R',false);
    $pdf->Ln();
}

// Add Invoice level taxes if applicable
$total_tax_amount = $total_tax_amount + $invoice_igst + $invoice_cgst + $invoice_sgst;

$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,5,'','',0,'L',false);
$pdf->Ln();

$pdf->SetFont('Calibri','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'','LR',0,'L',false);
$pdf->Cell(100,6,'','',0,'L',false);
$pdf->Cell(64,6,'Sub Total','LTBR',0,'R',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell(26,6,IND_money_format($total_amount),'LTBR',0,'R',false);
$pdf->Ln();
$pdf->SetFont('Calibri','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'Total calculated summary','LR',0,'L',false);
$pdf->Cell(100,6,'','',0,'L',false);
$pdf->Cell(64,6,'Total Discount','LBR',0,'R',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell(26,6,IND_money_format($total_discount),'LBR',0,'R',false);

$pdf->Ln();
$pdf->SetFont('Calibri','B',11);
// $pdf->Cell(11,5,'','LR',0,'L',false);
// $pdf->Cell(89,5,'','LR',0,'L',false);
$pdf->Cell(100,5,'','',0,'L',false);
$pdf->Cell(64,5,'GST','LBR',0,'R',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell(26,5,IND_money_format($total_tax_amount),'LBR',0,'R',false);

// Calculation of total amount of summary
$summary_total_amt = ($total_amount + $total_tax_amount) - $total_discount;

$pdf->Ln();
$pdf->SetFont('Calibri','B',11);
// $pdf->Cell(11,5,'','LBR',0,'L',false);
// $pdf->Cell(89,5,'','LBR',0,'L',false);
$pdf->Cell(100,5,'','',0,'L',false);
$pdf->Cell(64,5,'Total Amount','LBR',0,'R',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell(26,5,IND_money_format($summary_total_amt),'LBR',0,'R',false);

$pdf->Ln();

$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,5,'','',0,'L',false);
$pdf->Ln();

$width_cellA=array(45,130,15);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cellA[0],7,'Amount chargeable (in words): ','',0,'L',false);
$pdf->SetFont('Calibri','B',10);
// $pdf->Cell(0,7, ucwords(numberTowords($summary_total_amt)),'LTBR',0,'L',false);
$pdf->Cell(0,7, ucwords(numberTowords($summary_total_amt)),'',0,'L',false);
/*$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,7,'E. & O.E','',0,'R',false);*/
$pdf->Ln();

$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,5,'','',0,'L',false);
$pdf->Ln();

/*$pdf->SetTextColor(15,34,63);
$width_cellT=array(100,90);
$pdf->SetFont('Calibri','B',10);
$pdf->Cell($width_cellT[0],5,'Terms & Conditions:','LTR',0,'L',false);
$pdf->Cell($width_cellT[1],5,'Bank details: ','LTR',0,'L',false);
$pdf->Ln();
$pdf->SetFont('Calibri','',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell($width_cellT[0],10,$row1['terms_conditions'],'LRB',0,'L',false);
$pdf->Cell($width_cellT[1],10,$row1['terms_conditions'],'LRB',0,'L',false);
$pdf->Ln();*/

$pdf->SetTextColor(15,34,63);
$width_cell4=array(100,45,45);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[0],5,'Terms & Conditions','LTR',0,'L',false);
$pdf->SetFont('Calibri','B',11);
$pdf->Cell($width_cell4[1],5,'Bank details','T',0,'L',false);
$pdf->Cell($width_cell4[2],5,'','RT',0,'L',false);


$pdf->Ln();
$pdf->SetTextColor(0,0,0);
$terms_conditions = UCWORDS($row1['terms_conditions']);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[0],5,$terms_conditions,'L',0,'L',false);
// $pdf->MultiCell($width_cell4[0],6,$terms_conditions,'LRB','L');
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[1],5,'A/C holder name: ','L',0,'L',false);
// $pdf->MultiCell($width_cell4[1],6,'A/C holder name: ','LRB','L');
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['beneficiary'],'R',0,'L',false);

$pdf->Ln();

// $from_email_phone = $row1['billingfromemail'].",".$row1['billingfromphone'];
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[0],5,'','LR',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[1],5,'Bank name: ','',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['bankname'],'R',0,'L',false);

$pdf->Ln();

$pdf->Cell($width_cell4[0],5,'' ,'LR',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[1],5,'Account No.: ','',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['accountno'],'R',0,'L',false);

$pdf->Ln();

$pdf->Cell($width_cell4[0],5,'','L',0,'L',false);
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cell4[1],5,'IFSC code: ','L',0,'L',false);
$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cell4[2],5,$row1['ifsc'],'R',0,'L',false); 

if($row1['bank_upi']){
    $pdf->Ln();
    $pdf->Cell($width_cell4[0],5,'','BL',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[1],5,'UPI: ','LB',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[2],5,$row1['bank_upi'],'BR',0,'L',false);
}
else {
    $pdf->Ln();
    $pdf->Cell($width_cell4[0],5,'','BL',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[1],5,'','LB',0,'L',false);
    $pdf->SetFont('Calibri','',10);
    $pdf->Cell($width_cell4[2],5,'','BR',0,'L',false);
}
$pdf->Cell(0,5,'','',0,'L',false);
$pdf->Ln();
$pdf->Ln();

/*$pdf->SetFont('Calibri','',10);
$pdf->Cell($width_cellT[0],5,'Customers Seal and Signature','LTR',0,'L',false); 
$pdf->SetFont('Calibri','B',10);
$pdf->Cell($width_cellT[1],5,$row1['billfromname'],'LTR',0,'R',false);*/

$pdf->SetDrawColor(255, 255, 255); 
$pdf->SetFont('Calibri','',10);
$pdf->Cell(0,5,'This is a computer generated invoice.','LTR',0,'C',false);

$pdf->Ln();

/*$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cellT[0],15,'','LR',0,'L',false);
$pdf->Cell($width_cellT[1],15,' ','LR',0,'R',false);

$pdf->Ln();
$pdf->SetFont('Calibri','',9);
$pdf->Cell($width_cellT[0],5,'','LRB',0,'L',false); 
$pdf->Cell($width_cellT[1],5,'Authorised Signatory','LRB',0,'R',false);*/

// ==================== For sending pdf file to mail starts here ==================
// if(isset($_REQUEST['invoice_recordId']) || isset($_REQUEST['recordId']))
if(isset($_REQUEST['invoice_recordId']))
{
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3Connect.php');

    require_once($_SERVER['DOCUMENT_ROOT']."/task_cron/PHPMailer/src/PHPMailer.php");
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/email_templates/EmailNotification.php');

    // If want to send invoice pdf as an attachment to mail automatically then comment following lines 
    /*if(isset($_REQUEST['recordId']))
    {
        $data["status"] = "true";
        $data["msg"]    = "Updated Successfully!";
        echo json_encode($data); 
        return true;
    }*/

    // If submitted popup form for sending email through admin panel
    $to = $_REQUEST['invoice_to'];
    $split_to_email = explode(",",$_REQUEST['invoice_to']);
    $est_to_count = count($split_to_email);
    $email_to = array();
    foreach($split_to_email as $emails)
    {
        $email_to[] = $emails;
    }

    $email_cc = array();
    if($_REQUEST['invoice_cc']!=""){
        $cc = $_REQUEST['invoice_cc'];
        $split_cc_email = explode(",",$_REQUEST['invoice_cc']);
        $est_to_count = count($split_cc_email);
        foreach($split_cc_email as $cc_emails)
        {
            $email_cc[] = $cc_emails;
        }
    }

    $from_mail = $_REQUEST['invoice_from'];
    $subject = $_REQUEST['invoice_subject'];
    $message = $_REQUEST['invoice_mail_body'];
    
    $invoice_url = $_SERVER["HTTP_ORIGIN"].'/pdf/invoice.php?id='.$row1['id'];


    $email_body_old = '<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }


        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0 !important;height: 100% !important;margin: 0 !important;padding: 0 !important;width: 100% !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:'."'"."Roboto"."'".', sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
                    <tr>
                        <td bgcolor="#5F7AEA" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;border-collapse: collapse !important;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="color: #000000; padding:45px 70px 50px 70px;font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;border-radius: 30px !important;">
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
                                <!-- <tr>
                                    <td style="text-align:center;">
                                        <a href="#"><img src="LOGO.svg" width="40%" height="100%" style=" border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;" /></a>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 30px 30px;border-radius: 0px 0px 30px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
                                            <tr>
                                                <td colspan="2">
                                                    <p style="font-family: "Lato";size: 20px;line-height: 28px;">Dear '.$row1['billtoname'].', </p><p style="font-family: "Lato";size: 20px;line-height: 28px;">Thank you for your business. Your invoice can be viewed, printed and downloaded as PDF from the link below.</p>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                        <td class="main-contents" bgcolor="#ffffff" align="left" style="color: #000000; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;">
                                <p style="font-size: 17px; font-weight: 600; margin: 2;text-align: center;line-height: 24px;">Invoice for &#8377; '.IND_money_format($row1['total']).'</p>
                            <hr>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 50px 30px 80px;border-radius: 0px 0px 30px 30px;line-height:24px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td width="35%"><b>Invoice No</b></td>
                                                <td width="30%"> &nbsp;'.$row1['invoiceno'].'</td>
                                            </tr>
                                            <tr>
                                                <td width="35%"><b>Invoice Date</b></td>
                                                <td width="30%"> &nbsp;'.date("d/m/Y", strtotime($row1['invoicedate'])).'</td>
                                            </tr>
                                            <tr>
                                                <td width="35%"><b>Due Date</b></td>
                                                <td width="30%"> &nbsp;'.date("d/m/Y", strtotime($row1['duedate'])).'</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a class="btn btn-orange_upgrade" style="background-color: #fd7e14;color: #fff;border-color: #fd7e14;padding: 10px 12px;border-radius: 20px;font-size: 14px;font-weight: 500;text-decoration: none;" href="'.$invoice_url.'" ">VIEW INVOICE</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:left;padding: 20px 30px 0px 30px;">
                            <p style="font-size: 14px;font-weight: 500;">Regards, </p>
                            <p style="font-size: 14px;font-weight: 500;">'.$row1['billfromname'].'</p>
                        </td>
                    </tr>
                </table>
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 50px 10px 0px 10px;"></td>    
        </tr>
    </table>
</body>

</html>';

/*
<td class="main-contents" bgcolor="#ffffff" align="left" style="color: #000000; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;">
        <p style="font-size: 17px; font-weight: 600; margin: 2;text-align: center;line-height: 24px;">Invoice AMOUNT</p>
        <p style="font-size: 17px; font-weight: 600; margin: 2;text-align: center;line-height: 24px;">&#8377; 11,800.00</p>
    <hr>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td bgcolor="#ffffff" align="center" style="padding: 20px 50px 30px 80px;border-radius: 0px 0px 30px 30px;line-height:24px;">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="35%"><b>Invoice No</b></td>
                        <td width="30%"> &nbsp;'.$row1['invoice_number'].'</td>
                    </tr>
                    <tr>
                        <td width="35%"><b>Invoice Date</b></td>
                        <td width="30%"> &nbsp;'.date("d/m/Y", strtotime($row1['created_at'])).'</td>
                    </tr>
                    <!-- <tr>
                        <td width="35%"><b>Due Date</b></td>
                        <td width="30%"> &nbsp;12/08/20</td>
                    </tr> -->
                </table>
            </td>
        </tr>
    </table>
</td>
*/


// $powered_by_fincrm_image_url = $_SERVER["HTTP_ORIGIN"].'//client/img/fincrm_logo.png';
$powered_by_fincrm_image_url = 'http://www.fincrm.net/assets/emailTemplate/LOGO.svg';

$email_body_bkp = '
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }


        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="margin: 0 !important; padding: 0 !important;height: 100% !important;margin: 0 !important;padding: 0 !important;width: 100% !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:'."'"."Roboto"."'".', sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>

    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse !important;">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
                    <tr>
                        <td bgcolor="#5F7AEA" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 500px;border-collapse: collapse !important;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="color: #000000;padding: 20px 70px 22px 70px;font-family: '."'"."Roboto"."'".', sans-serif !important;font-size: 14px;font-weight: 400;line-height: 20px;text-align: center;border-radius: 30px;">
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 0px 30px 0px 30px;border-radius: 0px 0px 30px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;">
                                            <tr>
                                                <td colspan="2">
                                                    <p style="font-family: '."'"."Lato"."'".';size: 20px;line-height: 24px;">Dear '.$row1['billtoname'].', </p><p style="font-family: '."'"."Lato"."'".';size: 20px;line-height: 24px;">Thank you for your business. Your invoice can be viewed, printed and downloaded as PDF from the link below.</p>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                        <hr>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="main-contents" bgcolor="#ffffff" align="left" style="color: #000000; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 20px;text-align: center;">
                                            <p style="font-size: 17px;font-weight: 600;margin: 2;text-align: center;line-height: 11px;padding: 0px 0px 10px 0px;">Invoice for &#8377; '.IND_money_format($row1['total']).'</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;padding: 0px 30px 60px 30px;">
                                        <a class="btn btn-orange_upgrade" style="background-color: #fd7e14;color: #fff;border-color: #fd7e14;padding: 10px 12px;border-radius: 20px;font-size: 14px;font-weight: 500;text-decoration: none;" href="'.$invoice_url.'">VIEW INVOICE</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="color:gray;">Invoice #2020/YM005</td>
                                </tr>
                                <tr>
                                    <td><a href="'.$invoice_url.'" style="text-decoration:none;font-weight:bold;color:#032e73;">View Invoice</a></td>
                                </tr>
                                <tr>
                                    <td style="text-align:left;padding: 32px 0px 0px 30px;">
                                        <p style="font-size: 14px;font-weight: 500;" >Regards, <br/>'.$row1['billfromname'].'</p>
                                    </td>
                                </tr>
                            </table>
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 610px;text-align: center;font-family: calibri;font-weight: normal;color: lightgray;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
                    <tbody>
                        <tr>
                            <td style="text-align:left;padding: 10px 0px 0px 60px;">
                                <span><img src="'.$powered_by_fincrm_image_url.'" width="250" height="50"></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 510px;text-align: center;font-family: calibri;font-weight: normal;color: lightgray;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
                    <tbody>
                        <tr>
                            <td style="text-align:left;padding: 0px 0px 0px 126px;color: white;">
                                <span>FinCRM Technologies Pvt Ltd. All Rights Reserved.</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;padding: 0px 30px 0px 195px;"><a href="http://www.fincrm.net/privacy-policy" style="color:white;">Privacy Policy</a> <span style="font-size:8px;">• </span><a href="http://www.fincrm.net/terms-of-services" style="color: white;">Terms of Use</a><p></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
';

$email_body = '<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: '."'"."Lato"."'".';
                font-style: normal;
                font-weight: 400;
                src: local('."'"."Lato Regular"."'".'), local('."'"."Lato-Regular"."'".'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('."'"."woff"."'".');
            }

            @font-face {
                font-family: '."'"."Lato"."'".';
                font-style: normal;
                font-weight: 700;
                src: local('."'"."Lato Bold"."'".'), local('."'"."Lato-Bold"."'".'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('."'"."woff"."'".');
            }

            @font-face {
                font-family: '."'"."Lato"."'".';
                font-style: italic;
                font-weight: 400;
                src: local('."'"."Lato Italic"."'".'), local('."'"."Lato-Italic"."'".'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('."'"."woff"."'".');
            }

            @font-face {
                font-family: '."'"."Lato"."'".';
                font-style: italic;
                font-weight: 700;
                src: local('."'"."Lato Bold Italic"."'".'), local('."'"."Lato-BoldItalic"."'".'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('."'"."woff"."'".');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 25px !important;
                line-height: 25px !important;
            }

            .contents{
                margin:10px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #EEF3FB; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
    <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family:'."'"."Roboto"."'".', sans-serif !important; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#5F7AEA" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#5F7AEA" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 48px; font-weight: 400; line-height: 30px;border-radius: 30px 30px 0px 0px;">
                           <h1 style="font-size: 22px; font-weight: 600; margin: 2;text-align: center;text-transform: uppercase;"><u>Invoice</u></h1>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 100px 10px 100px; color: #000000; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 25px;">
                            <h4 class="contents" style="font-size:18px; font-weight: 500; color:#2C2C2C;margin: 0px;">Hi,</h4>
                            <p class="contents" style="color:#2C2C2C;">You have received a new invoice from <b>'.$row1['billfromname'].'</b> for <b>&#8377; '.IND_money_format($row1['total']).', </b>due on <b>'.$row1['duedate'].'</b></b>. Click on the link below to view, download or print the PDF.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#EEF3FB" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 100px 40px 100px; color: #000000; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 20px;border-radius: 0px 0px 30px 30px;">
                                <div style="background-color: #fd7e14;color: #fff;border-color: #fd7e14;padding: 12px 12px 0px 12px;font-size: 14px;font-weight: 500;text-decoration: none;overflow: hidden;margin-bottom: 40px;">
                                    <span style="font-size: 16px;margin-bottom: 12px;display: inline-block;">Invoice #'.$row1['invoiceno'].'</span>
                                    <span style="text-transform: uppercase;text-align: right;margin-bottom: 12px;display: inline-block;float: right;"><a href="'.$invoice_url.'" style="font-size: 18px;text-decoration: none;color:#FFFFFF;">View Invoice</a></span>
                                </div>';

                        if($message!=""){
                            $email_body .= '<p>'.$message.'</p>';
                        }

                        $email_body .= '
                                <p style="font-size: 14px;font-weight: 500;margin-bottom: 0px;" >Regards, </p>
                                <p style="font-size: 14px;font-weight: 500;margin-top: 5px;">'.$row1['billfromname'].'</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#EEF3FB" align="center" style="padding: 10px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;border-collapse: collapse !important;">
                    <tr>
                        <td bgcolor="#EEF3FB" align="center" style="padding: 30px 30px 10px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 18px; font-weight: 400; line-height: 25px;">
                             <span><span style="margin-bottom: 5px;"><b>Powered by<b></span> &nbsp;<img src="http://www.fincrm.net/assets/emailTemplate/LOGO.svg" alt="logo" width="100" height="50"></span>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EEF3FB" align="center" style=" color:#a79f9f; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 25px;">
                             <span><span>&#169; 2020</span> FinCRM Technologies Pvt Ltd. All Rights Reserved.</span>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#EEF3FB" align="center" style=" padding: 0px 30px 30px 30px; color: #ffffff; font-family: '."'"."Roboto"."'".', sans-serif !important; font-size: 14px; font-weight: 400; line-height: 25px;">
                             <span><a href="http://www.fincrm.net/privacy-policy" style="text-decoration: none;color: #5F7AEA; border-right:2px solid #5F7AEA;padding-right: 10px;">Privacy Policy</a>
                             <a href="http://www.fincrm.net/terms-of-services" style="text-decoration: none;color: #5F7AEA;padding-left: 5px;">Terms of Use</a></span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';

//echo $email_body;die;

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (we use a PHP end of line constant)
    $eol = PHP_EOL;

    // $filename = "invoice.pdf";
    // encode data (puts attachment in proper format)
    // $pdfdoc = $pdf->Output($filename, "S");

    /*$headers  = "From: ".$from_mail.$eol;
    $headers .= "To: ".$to.$eol;
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";*/

    $send_mail = new EmailNotification();
    $status = 0;
    $from_name = $row1['billfromname'];
    $attachments = array();
    if(isset($_REQUEST['send_pdf_attachment']) && $_REQUEST['send_pdf_attachment'] == 'on')
    {
        if($_REQUEST['invoice_recordId'])
        {
            $invoice_id = $_REQUEST['invoice_recordId'];
        }
        else if($_REQUEST['recordId'])
        {
            $invoice_id = $_REQUEST['recordId'];
        }

        $pdf_dir = $_SERVER['DOCUMENT_ROOT']."/pdf/generated_pdf/";
        if(!is_dir($pdf_dir))
        {
            mkdir($pdf_dir,0777,true);
        }
        // $filename = $pdf_dir."invoice".$invoice_id.".pdf";
        $filename = $pdf_dir.$row1['invoiceno'].".pdf";
        $pdf->Output($filename,'F');

        $attachments[] = $filename;
        
        $body = $message.$eol;

        $sql_attach_files = "select * from invoice_files where invoice_id = '".$invoice_id."'";
        $result_invoice_attach = mysqli_query($conn,$sql_attach_files);
        $row_nums = mysqli_num_rows($result_invoice_attach);
       
        if($row_nums){
            while($result_row = mysqli_fetch_assoc($result_invoice_attach))
            {
                $source_files = $result_row['filepath'];
                
                if(file_exists($source_files)){
                    $attachments[] = $source_files;
                }
            }
        }
        $status = $send_mail->sendEmail_estimate_invoice($email_to, $email_body, $subject, $email_cc, $attachments, $from_name, $from_mail);
    }
    else {
        $status = $send_mail->sendEmail_estimate_invoice($email_to, $email_body, $subject, $email_cc, '', $from_name, $from_mail);
    }


    
    if($status){
        echo "1";
    }
    else {
        echo "0";
    }
    
    function delete_directory($dirname) {
        if (is_dir($dirname))
        $dir_handle = opendir($dirname);

        if (!$dir_handle)
          return false;
        while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                     unlink($dirname."/".$file);
                else
                     delete_directory($dirname.'/'.$file);
           }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
    delete_directory($pdf_dir);
    // ==================== For sending pdf file to mail ends here ==================
}
else {
    $pdf->Output();
}
?>
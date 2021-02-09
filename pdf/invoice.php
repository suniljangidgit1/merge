<?php
// session_start();
date_default_timezone_set('asia/kolkata');   
// $date=date("d-m-Y");     
require('fpdf.php');
error_reporting(E_ALL && ~E_NOTICE);
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

define('FPDF_FONTPATH',$_SERVER['DOCUMENT_ROOT'].'/pdf/font/');
require($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/holiday_calendar/libraries/Pdf.php');

function numberTowords(float $amount)
{ 
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
       $add_plural = (($counter = count($string)) && $amount > 9) ? '' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '.$here_digits[$counter].$add_plural.' '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10].' '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
    else $string[] = null;
    }
    $implode_to_Rupees = implode('', array_reverse($string));
    $get_paise = ($amount_after_decimal > 0) ? "And ".($change_words[$amount_after_decimal / 10]."".$change_words[$amount_after_decimal % 10]).' Paise' : '';
    return ($implode_to_Rupees ? $implode_to_Rupees.' Rupees ' : '').$get_paise;
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

    return $result;
}

// $obj_pdf  = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);  
$obj_pdf->SetTitle("Invoice");  
$obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
$obj_pdf->SetDefaultMonospacedFont('Calibri');  
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
// $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '1', PDF_MARGIN_RIGHT);  
$obj_pdf->SetMargins('9', '1', '9');  
$obj_pdf->setPrintHeader(false);  
$obj_pdf->setPrintFooter(false);  
$obj_pdf->SetAutoPageBreak(TRUE, 10);
// set image scale factor
$obj_pdf->setImageScale(1);

if($row1['billingfromemail']!="" && $row1['billingfromphone']!=""){
    $from_email_phone = $row1['billingfromemail'].",".$row1['billingfromphone'];
}
else if($row1['billingfromemail']!="" && $row1['billingfromphone']==""){
    $from_email_phone = $row1['billingfromemail'];
}
else if($row1['billingfromemail']=="" && $row1['billingfromphone']!=""){
    $from_email_phone = $row1['billingfromphone'];
}
else {
    $from_email_phone = "";  
}

if($row1['billingtoemail']!="" && $row1['billingtophone']!=""){
    $to_email_phone = $row1['billingtoemail'].",".$row1['billingtophone'];
}
else if($row1['billingtoemail']!="" && $row1['billingtophone']==""){
    $to_email_phone = $row1['billingtoemail'];
}
else if($row1['billingtoemail']=="" && $row1['billingtophone']!=""){
    $to_email_phone = $row1['billingtophone'];
}
else {
    $to_email_phone = "";  
}

$html = '<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
        <h4 style="text-align:center;">INVOICE</h4>
        <div style="font-size:10px;">
            <h6><b>Billed From:</b></h6>
            <table cellpadding="1" cellspacing="0" style="border: 1px solid #ccc;width:100%">
                <tr>
                    <td rowspan="8" colspan="3" style="border: 1px solid #ccc;">
                        <b>'.trim($row1['billfromname']).'</b>
                        <div style="font-size:9px;">
                            ';
                            if($row1['billing_address_street']!=""){
                                $html .= UCWORDS($row1['billing_address_street']).'<br>&nbsp;&nbsp;';
                            }
                            if($from_email_phone!=""){
                                $html .= $from_email_phone.'<br>&nbsp;&nbsp;';
                            }
                            if($row1['billing_address_city']!=""){
                                $html .= UCWORDS($row1['billing_address_city']).', ';
                            }
                            if($row1['billing_address_state']!=""){
                                $html .= UCWORDS($row1['billing_address_state']).'- ';
                            }
                            if($row1['billing_address_postal_code']!=""){
                                $html .= $row1['billing_address_postal_code'].'<br>&nbsp;&nbsp;';
                            }
                            if($row1['billingaddressgstin']!=""){
                                $html .= 'GSTIN/UIN: '.strtoupper($row1['billingaddressgstin']);
                            }

                            if($row1['billfrompan']!=""){
                                $html .= '<br>&nbsp;&nbsp;PAN: '.strtoupper($row1['billfrompan']);
                            }

                            if($row1['billingfrom_udyamno']!=""){
                                $html .= '<br>&nbsp;&nbsp;UDYAM REGISTRATION NUMBER: '.strtoupper($row1['billingfrom_udyamno']);
                            }

                $html .= '</div>
                    </td>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;"><b>Invoice Number: </b></td>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;">'.$row1['invoiceno'].'</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;"><b>P.O./S.O. Number: </b></td>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;">'.$row1['po_order_no'].'</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;"><b>Invoice Date: </b></td>
                    <td rowspan="2" style="border-bottom: 1px solid #ccc;">'.date("d-M-Y",strtotime($row1['invoicedate'])).'</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2"><b>Due Date: </b></td>
                    <td rowspan="2">'.date("d-M-Y",strtotime($row1['duedate'])).'</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <h6><b>Billed To:</b></h6>
            <table cellpadding="1" cellspacing="0" style="border: 1px solid #ccc;width:100%;">
                <tr>
                    <td rowspan="7" colspan="2">
                        <b>'.$row1['billtoname'].'</b>
                        <div style="font-size:9px;">';

                        $html .= '&nbsp;&nbsp;'.UCWORDS($row1['shipping_address_street']).'<br>&nbsp;&nbsp;'.$to_email_phone.'<br>&nbsp;&nbsp;'.UCWORDS($row1['shipping_address_city']).', '.UCWORDS($row1['shipping_address_state'])." - ".$row1['shipping_address_postal_code'];

                        if($row1['shippingaddressgstin']!=""){
                            $html .= '<br>&nbsp;&nbsp;GSTIN/UIN: '.strtoupper($row1['shippingaddressgstin']);
                        }

                        $html .= '<br>&nbsp;&nbsp;State: '.$row1['shipping_address_state'];

                        if($row1['billtopan']!=""){
                            $html .= '<br>&nbsp;&nbsp;PAN: '.strtoupper($row1['billtopan']);
                        }

                        if($row1['billingto_udyamno']!=""){
                           $html .= '<br>&nbsp;&nbsp;UDYAM REGISTRATION NUMBER: '.strtoupper($row1['billingto_udyamno']); 
                        }
                           
                    $html .='
                        </div>
                    </td>
                </tr>
            </table>
            <div></div>';

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

        if($row1['gst']!="")
        {
            if($row1['gst'] === 'IGST'){
                $igst_present = 1;
                $cgst_present = 0;
            }
            else if($row1['gst'] === 'CGST'){
                $igst_present = 0;
                $cgst_present = 1;
            }
        }


    $html .= '<table cellpadding="2" cellspacing="0" style="width:100%;">
                <tr>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;" width="34"><div style="vertical-align:middle;text-align:center;"><b>Sr.No.</b></div></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;" width="78"><b>Description of Services</b></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>HSN / SAC</b></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>Qty</b></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>Rate</b></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>Amount<div>(Rs.)</div></b></th>
                    <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>Discount<div>(Rs.)</div></b></th>';
                    if($igst_present===1){
                        $html .= '<th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>IGST<div>(Rs.)</div></b></th>
                        <th align="center" style="background-color:#061F33;color:#FFFFFF;width:69px;"><b>Amount<div>(Rs.)</div></b></th>';
                    }
                    else if($cgst_present!=0){
                        $html .= '<th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>CGST<div>(Rs.)</div></b></th>
                        <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>SGST<div>(Rs.)</div></b></th>
                        <th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;"><b>Amount<div>(Rs.)</div></b></th>';
                    }
                    else {
                        $html .= '<th align="center" style="background-color:#061F33;color:#FFFFFF;border: 1px solid #fff;width:92px;"><b>Amount<div>(Rs.)</div></b></th>';

                    }

            $html .= '</tr>';


        $estimate_id=$row1['id'];
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
        $item_discount_amt = 0;
        $total_qty=0;
        $total_rate=0;
        $items_gst_type = '';
        while($row2 = mysqli_fetch_array($result2))
        {
            $item_discount_amt = 0;

            $gst_rate = ($row2['gst_rate']!=0) ? $row2['gst_rate'] : '';
            $count++;
            $quantity = ($row2['quantity']!=0) ? $row2['quantity'] : '';
            $rate = ($row2['rate']!=0 || $row2['rate']!='0.00') ? number_format($row2['rate'],2) : '';

            $igst = ($row2['igst']!='0.00') ? $row2['igst'] : 0;
            $cgst = ($row2['cgst']!='0.00') ? $row2['cgst'] : 0;
            $sgst = ($row2['sgst']!='0.00') ? $row2['sgst'] : 0;

            $item=strlen($row2['item_name']);
            $des= strlen($row2['description']);

            if($des > 14){
                $display_html_start = '<div style="vertical-align: middle;text-align:right;">
                                <p>';
                $display_html_end = '</p></div>';                                
            }
            else {
               $display_html_start = ''; 
               $display_html_end = '';
            }

            $html .= '<tr>
                    <td style="border: 1px solid #ccc;"><div style="vertical-align: middle;text-align:center;">'.$count.'</div></td>
                    <td valign="middle" style="border: 1px solid #ccc;">'.$row2['description'].'</td>
                    <td style="border: 1px solid #ccc;">'.$display_html_start.$row2['hsn'].$display_html_end.'</td>
                    <td align="right" style="border: 1px solid #ccc;">'.$display_html_start.$quantity.$display_html_end.'</td>
                    <td align="right" style="border: 1px solid #ccc;">'.$display_html_start.$rate.$display_html_end.'</td>
                    <td align="right" style="border: 1px solid #ccc;">'.$display_html_start.number_format($row2['amount'],2).$display_html_end.'</td>';

                    if(!$row2['discountvalue']){
                        $html .= '<td style="border: 1px solid #ccc;"></td>';
                    }
                    else {
                        $item_disc_type = ($row2['discounttype'] == 'Percentage') ? '(%)' : '(Rs)';
                        if($row2['discounttype'] == 'Percentage'){
                            $discountValue = $row2['discountvalue'];
                            $discountAmount = $row2['discountamount'];
                            $item_discount_amt = ($row2['discountamount']!=0 || $row2['discountamount']!="") ? $row2['discountamount'] : 0;
                        }
                        if($row2['discounttype'] == 'Amount'){
                            $discountValue = '';
                            $discountAmount = ($row2['discountvalue']) ? $row2['discountvalue'] : 0;
                            $item_discount_amt = ($discountAmount!=0 || $discountAmount!="") ? $discountAmount : 0;
                        }

                        $html .= '<td align="right" style="border: 1px solid #ccc;">'.$display_html_start.number_format($discountAmount,2).$display_html_end.'</td>';
                    }

                    if($row2['gst_rate']){
                        if($igst_present===1){
                            $gst_rate = $row2['gst_rate'];
                        }
                        else {
                            $gst_rate = $row2['gst_rate'] / 2;
                        }
                    }
                    else{
                        $gst_rate = 0;
                    }

                    if($gst_rate!=0) {
                        $gst_rate_disp = '<br><span style="font-size:9px;color:gray;display:inline-block;">('.$gst_rate.'%)</span>';
                    }
                    else {
                        $gst_rate_disp = '';
                    }

                    if($igst_present===1){
                        $items_gst_type = 'IGST';
                        $width = $width_cell[7] + $width_cell[8];
                        $item_total_amount = ($row2['amount'] +  $igst) - $item_discount_amt;

                        if($igst!=0) {
                            $igst_display = $igst;
                        }
                        else {
                            $igst_display = "";
                        }

                        $html .= '<td align="right" style="border: 1px solid #ccc;">'.$display_html_start.$igst_display.$gst_rate_disp.$display_html_end.'</td>
                        <td align="right" style="border: 1px solid #ccc;">'.$display_html_start.number_format($item_total_amount,2).$display_html_end.'</td>';
                    }
                    else if($cgst_present!=0){
                        $item_total_amount = ($row2['amount'] + $cgst + $sgst) - $item_discount_amt;
                        if($row2['cgst']!=0){
                            $show_gst_rate_amt = number_format($row2['cgst'],2);
                        }
                        else {
                            $show_gst_rate_amt = "";
                        }

                        $html .= '<td align="right" style="border: 1px solid #ccc;">'.$display_html_start.$show_gst_rate_amt.$gst_rate_disp.$display_html_end.'</td><td align="right" style="border: 1px solid #ccc;">'.$display_html_start.$show_gst_rate_amt.$gst_rate_disp.$display_html_end.'</td><td align="right" style="border: 1px solid #ccc;">'.$display_html_start.number_format($item_total_amount,2).$display_html_end.'</td>';
                    }
                    else {
                        $item_amount = ($row2['amount'] + $gst_rate) - $item_discount_amt;
                        $html .= '<td align="right" style="border: 1px solid #ccc;">'.$display_html_start.number_format($item_amount,2).$display_html_end.'</td>';
                    }

            $html .= '</tr>';

            $total_amt = ($total_amt + $item_amount);
            $total_amount = ($total_amount + $row2['amount']);
            $total_discount = ($total_discount +  $item_discount_amt);
            $total_tax_amount += ($igst + $cgst + $sgst);

            $tot_qty = ($row2['quantity']!='0.00') ? $row2['quantity'] : '';
            $tot_rate = ($row2['rate']!='0.00') ? $row2['rate'] : '';
            $total_qty = $total_qty + $tot_qty;
            $total_rate = $total_rate + $tot_rate;

            $total_igst += $igst;
            $total_cgst += $cgst;
            $total_sgst += $sgst;
        }

        $total_discount = $total_discount + $row1["rate"];

        $html .= '<tr>';
        if($total_qty!=0 || $total_qty!=""){
            $html .= '<td colspan="3" align="right" style="border: 1px solid #ccc;background-color:#ebebe0;"><b>Total</b></td>
            <td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.$total_qty.'</td>
            <td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_rate,2).'</td>';
        }
        else {
            $html .= '<td colspan="5" align="right" style="border: 1px solid #ccc;background-color:#ebebe0;"><b>Total</b></td>';
        }

        if($row1['gst']!="")
        {
            if($row1['gst'] === 'IGST'){
                $total_igst = $row1['igst'];
            }
            else if($row1['gst'] === 'CGST'){
                $total_cgst = $row1['cgst'];
                $total_sgst = $row1['sgst'];
            }
            $total_tax_amount += ($row1['igst'] + $row1['cgst'] + $row1['sgst']);
        }

        $total_amt = $total_amt + $cal_amt + $total_cgst + $total_sgst;

        $html .= '<td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_amount,2).'</td>';

        // $total_discount = $total_discount + $row1["discountamount"];

        if($total_discount){
            $html .= '<td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_discount,2).'</td>';
        }
        else {
            $html .= '<td style="border: 1px solid #ccc;background-color:#ebebe0;"></td>';
        }

        if($igst_present!=0){
            $cal_amt =  $total_amount - $total_discount;
            $total_amt = $cal_amt + $total_igst;
            $html .='<td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_igst,2).'</td>            
                    <td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_amt,2).'</td>';
        }
        else if($cgst_present!=0){
            $cal_amt =  $total_amount - $total_discount;
            $total_amt = $cal_amt + $total_cgst + $total_sgst;
            $html .= '<td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_cgst,2).'</td>
                    <td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_sgst,2).'</td>            
                    <td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_amt,2).'</td>';
        }
        else {
            $html .= '<td align="right" style="border: 1px solid #ccc;background-color:#ebebe0;">'.number_format($total_amt,2).'</td>';
        }

        $html .='</tr>';

        $summary_total_amt = ($total_amount + $total_tax_amount) - $total_discount;
                
    $html .= '</table><br>

            <div>
                <table cellpadding="1" cellspacing="0">
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right" style="border: 1px solid #ccc;"><b>Sub Total (Rs.)</b></td>
                        <td align="right" style="border: 1px solid #ccc;">'.number_format($total_amount,2).'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right" style="border: 1px solid #ccc;"><b>Total Discount (Rs.)</b></td>
                        <td align="right" style="border: 1px solid #ccc;">'.number_format($total_discount,2).'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right" style="border: 1px solid #ccc;"><b>GST (Rs.)</b></td>
                        <td align="right" style="border: 1px solid #ccc;">'.number_format($total_tax_amount,2).'</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="right" style="border: 1px solid #ccc;"><b>Total Amount (Rs.)</b></td>
                        <td align="right" style="border: 1px solid #ccc;">'.number_format($summary_total_amt,2).'</td>
                    </tr>
                </table>
            </div>
            <div>
                Amount chargeable (in words): <b>'.ucwords(numberTowords($summary_total_amt)).'</b>
            </div>
            <div>
                <table cellpadding="1" cellspacing="0">
                    <tr>
                        <td colspan="10" style="border: 1px solid #ccc;">
                            <b>Terms & Conditions: </b><br>
                            '.trim($row1['terms_conditions']).'
                        </td>
                        <td colspan="10" style="border: 1px solid #ccc;">
                            <b>Bank Details: </b><br>';

                            if($row1['holder_name']){
                                $html .= '&nbsp;&nbsp;A/C Holder Name: '.$row1['holder_name'].'<br>';
                            }

                            if($row1['bankname']){
                                $html .= '&nbsp;&nbsp;Bank name: '.$row1['bankname'].'<br>';
                            }

                            if($row1['accountno']){
                                $html .= '&nbsp;&nbsp;Account No.: '.$row1['accountno'].'<br>';
                            }

                            if($row1['ifsc']){
                                $html .= '&nbsp;&nbsp;IFSC code: '.$row1['ifsc'].'<br>';
                            }

                            if($row1['bankaccount_type']){
                                $html .= '&nbsp;&nbsp;Account type: '.$row1['bankaccount_type'].'<br>';
                            }

                            if($row1['bank_upi']){
                                $html .= '&nbsp;&nbsp;UPI: '.$row1['bank_upi'].'<br>';
                            }

                $html .= '</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <div align="center">This is a computer generated invoice.<div>
        </div>
    </body>
</html>';

if(isset($_REQUEST['invoice_recordId']))
{
    include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3bucketfoldersize.php');    
    $objS3buket         = new S3bucketfoldersize();
    // include_once ($_SERVER['DOCUMENT_ROOT'].'/task_cron/S3Connect.php');

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

    // $powered_by_fincrm_image_url = $_SERVER["HTTP_ORIGIN"].'//client/img/fincrm_logo.png';
    $powered_by_fincrm_image_url = 'http://www.fincrm.net/assets/emailTemplate/LOGO.svg';

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

        $obj_pdf->AddPage(); 
        $obj_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        $obj_pdf->Output($filename,'F');

        $attachments[] = $filename;
        
        $body = $message.$eol;

        $user_name = $_SESSION['Login'];

        $sql4="select * from user where user_name='$user_name'";
        $result4=mysqli_query($conn,$sql4);
        $row4 = mysqli_fetch_assoc($result4);
        $user = $row4['user_name'];

        $sql1 = "SELECT * FROM invoice where id='$invoice_id'";
        $result1 = mysqli_query($conn, $sql1);
        $row1=mysqli_fetch_assoc($result1);

        if($row1["filename"])
        {
            // transfer file from s3 buckets to local
            include ($_SERVER['DOCUMENT_ROOT'].'/task_cron/wasabi_connect.php');

            $result = $client->getObject(array(
                'Bucket' => 'fincrm',
                'Key'    => 'Production/'.$_SERVER['SERVER_NAME'].'/financial_files/invoices/'.$user.'/'.$id.'/'.$row1['filename'],
                'SaveAs' => $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/invoice/zipFolder/'.$row1["filename"]
            ));

            /*// Where the files will be source from
            $source = 's3://fincrm/Development/'.$_SERVER['HTTP_HOST'].'/financial_files/invoices/'.$user.'/'.$invoice_id.'/';
            
            // Where the files will be transferred to
            $dest = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/invoice/zipFolder/';

            // Create a transfer object
            $manager = new \Aws\S3\Transfer($s3, $source, $dest);

            //Perform the transfer synchronously
            $manager->transfer();*/

            $file_path = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/zipFolder/".$row1['filename'];
            
            $ExtractPath = $_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/";

            $ExtractFileName = '';
            $zip = new ZipArchive;
            $res = $zip->open($file_path);
            if($res == TRUE)
            {
                $zip->extractTo($ExtractPath);
                for($i = 0; $i < $zip->numFiles; $i++)
                {
                    $attachments[] = $_SERVER['DOCUMENT_ROOT']."/client/res/templates/financial_changes/invoice/uploads/".$zip->getNameIndex($i);
                }
                $zip->close();
            }
            
            // $attachments[] = $_SERVER['DOCUMENT_ROOT']."/client/res/templates/financial_changes/invoice/zipFolder/".$row1["filename"];

        }
        // echo '<pre>';print_r($attachments);die;

        /*$sql_attach_files = "select * from invoice_files where invoice_id = '".$invoice_id."'";
        $result_invoice_attach = mysqli_query($conn,$sql_attach_files);
        $row_nums = mysqli_num_rows($result_invoice_attach);       
        if($row_nums){
            while($result_row = mysqli_fetch_assoc($result_invoice_attach))
            {
                $source_files = $_SERVER['DOCUMENT_ROOT'].'/client/res/templates/financial_changes/'.$result_row['filepath'];
                
                if(file_exists($source_files)){
                    $attachments[] = $source_files;
                }
            }
        }*/
        $status = $send_mail->sendEmail_estimate_invoice($email_to, $email_body, $subject, $email_cc, $attachments, $from_name, $from_mail);

        if($status)
        {
            $zipname = $_SERVER["DOCUMENT_ROOT"].'/client/res/templates/financial_changes/invoice/zipFolder/'.$row1['filename'];
            if(file_exists($zipname)){
                unlink($zipname);
            }
        }

        if(file_exists($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/"))
        {
            unlink($_SERVER["DOCUMENT_ROOT"]."/client/res/templates/financial_changes/invoice/uploads/");
        }
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
    // echo $html;die;
    $obj_pdf->AddPage(); 
    $obj_pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    $obj_pdf->Output();
}
?>
<?php
session_start();
error_reporting(~E_ALL);
// date_default_timezone_set('asia/kolkata');   
$date=date("d-m-Y");     
require('fpdf.php');


	   // $servername = "localhost";
    //         $username = "root";
    //         $password = "root";
    //         $dbname = "demo_crm";
           
            // Create connection
            $conn = new mysqli('localhost', 'root', 'root', 'fincrm');
            // Check connection
            if ($conn->connect_error) 
            {
                die("Connection failed: " . $conn->connect_error);
            } 
            
	$account_id=$_GET['id'];
	
	
	$from_date1=$_GET['from_date'];
  $to_date1=$_GET['to_date'];

$from_date=strtotime(str_replace('/', '-',$from_date1));
  $to_date=strtotime(str_replace('/', '-',$to_date1));

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
// Page header
function Header()
{
    $this->SetFont('Arial','B',15);    
}

// Page footer
function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);    
}


  function myCell($w,$h,$x,$t){
    $height = $h/2;
    $first = $height+3;
    $second = $height+$height+5;
    // $third = $height+$height+$height+4;
    $len = strlen($t);
    if($len>35){
      $txt = str_split($t,35);
      $this->SetX($x);
      $this->Cell($w,$first,$txt[0],'','','');
      $this->SetX($x);
      $this->Cell($w,$second,$txt[1],'','','');
      // $this->SetX($x);
      // $this->Cell($w,$third,$txt[2],'','','');
      $this->SetX($x);
      $this->Cell($w,$h,'','LTRB','','L',0);
    }
    else{
      $this->SetX($x);
      $this->Cell($w,$h,$t,'LTRB',0,'L',0);
    }
  }


}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

      
      
      $sql1 = "SELECT * FROM account where id='$account_id'";
      $result1 = mysqli_query($conn, $sql1);
      $row1=mysqli_fetch_assoc($result1);



 $pdf->SetFont('Times','B',20);
 $pdf->Cell(0,10,$row1['name'],0,0,'C',false);
 $pdf->Ln(10);
 if($row1['billing_address_street']!=''&&$row1['billing_address_city']!=''&&$row1['billing_address_state']!=''&&$row1['billing_address_country']!=''&&$row1['billing_address_postal_code']!='')
 {
     $pdf->SetFont('Times','',12);
     $pdf->Cell(0,5,UCWORDS($row1['billing_address_street']),0,0,'C',false); 
     $pdf->Ln(5);
     $pdf->Cell(0,5,UCWORDS($row1['billing_address_city']).",".UCWORDS($row1['billing_address_state']).",".UCWORDS($row1['billing_address_country'])."-".$row1['billing_address_postal_code'],0,0,'C',false);
}
$pdf->Ln(5);
$pdf->Cell(0,10,$from_date1." - ".$to_date1,0,0,'C',false);

$pdf->Ln();
$pdf->SetFont('Times','B',12);


$width_cell=array(18,27,55,26,25,20,23);


// Header starts /// 
$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(207,204,204);


$x = $pdf->GetX();
$pdf->myCell($width_cell[0],10,$x,'Date');  // First header column 
$x = $pdf->GetX();

$pdf->myCell($width_cell[1],10,$x,'Transactions');  // Second header column
$x = $pdf->GetX();

$pdf->myCell($width_cell[2],10,$x,'Details'); // Third header column 
$x = $pdf->GetX();

$pdf->myCell($width_cell[3],10,$x,'Amount');  // Fourth header column
$x = $pdf->GetX();

$pdf->myCell($width_cell[4],10,$x,'Payments'); // First header column 
$x = $pdf->GetX();

$pdf->myCell($width_cell[5],10,$x,'TDS'); // First header column 
$x = $pdf->GetX();

$pdf->myCell($width_cell[6],10,$x,'Balance'); // Second header column

// $sql="select * from invoiceno='$invoiceno'";
// $result=mysqli_query($conn,$sql);


$pdf->Ln();
//// header ends ///////

$pdf->SetFont('Times','',10);
$pdf->SetTextColor(0,0,0);

$fill=false; // to give alternate background fill color to rows 


// $sql4="select * from invoice where account_id='$account_id'";
// $result4 = mysqli_query($conn, $sql4);
// while($row4=mysqli_fetch_assoc($result4))
// {
//   $invoicedate=date("d/m/Y",strtotime($row4['invoicedate']));

//   $invoicedate=strtotime(str_replace('/', '-',$invoicedate));

//     $details=$row4['invoiceno']." - due on ".date("d/m/Y",strtotime($row4['duedate']));
//     if(($invoicedate >= $from_date) and ($invoicedate <= $to_date))
//     {
//           $pdf->Cell($width_cell[0],5,date("d/m/Y",strtotime($row4['invoicedate'])),1,0,$fill);
//           $pdf->Cell($width_cell[1],5,"Invoice",1,0,$fill);
//           $pdf->Cell($width_cell[2],5,$details,1,0,$fill);
//           $pdf->Cell($width_cell[3],5,$row4['total'],1,0,'R',$fill);
//           $pdf->Cell($width_cell[4],5,"0",1,0,'R',$fill);
//           $pdf->Cell($width_cell[5],5,"0",1,0,'R',$fill);
//           $pdf->Cell($width_cell[6],5,"0",1,0,'R',$fill);

//           $pdf->Ln();
//     }
// }





$sql2="select * from invoice where account_id='$account_id'";
$result2 = mysqli_query($conn, $sql2);
while($row2=mysqli_fetch_assoc($result2))
{

    $invoicedate=date("d/m/Y",strtotime($row2['invoicedate']));

    $invoicedate=strtotime(str_replace('/', '-',$invoicedate));

    $details=$row2['invoiceno']." - due on ".date("d/m/Y",strtotime($row2['duedate']));
    if(($invoicedate >= $from_date) and ($invoicedate <= $to_date))
    {
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[0],10,$x,date("d/m/Y",strtotime($row2['invoicedate'])),'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[1],10,$x,"Invoice",'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[2],10,$x,$details,'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[3],10,$x,IND_money_format($row2['total']),'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[4],10,$x,"0",'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[5],10,$x,"0",'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[6],10,$x,"0",'LTBR',0,'R',$fill);
          $pdf->Ln();
    }



$from_date1=date("Y-m-d",strtotime($from_date));
$to_date1=date("Y-m-d",strtotime($to_date));
  
$invoiceno=$row2['invoiceno'];
$total_amount=$row2['total'];
$sql3="select * from payments where invoiceno='$invoiceno' order by pdate asc";
$result3 = mysqli_query($conn, $sql3);
  $balance=0;

while ($row3=mysqli_fetch_assoc($result3)) 
{
  $pdate=date("d/m/Y",strtotime($row3['pdate']));

  $pdate=strtotime(str_replace('/', '-',$pdate));

    if(($pdate >= $from_date) and ($pdate <= $to_date))
    {

      $invoiceno=$row3['invoiceno'];
      if($invoiceno!='')
      {
          if($balance==0)
          {
            $balance=$total_amount-$row3['amountcredited']-$row3['tds'];
          }
          else
          {
            $balance=$balance-$row3['amountcredited']-$row3['tds'];
          }
            if($row3['amountcredited']==''|| $row3['amountcredited']==NULL)
            {
                $amountcredited1="0";
            }
            else
            {
               $amountcredited1=$row3['amountcredited'];
            }
            
            if($row3['tds']==''|| $row3['tds']==NULL)
            {
                $tds12="0";
            }
            else
            {
               $tds12=$row3['tds'];
            }
            
          $transactions="Payments & TDS";
          $details="Rs ".$amountcredited1." for payment & Rs ".$tds12." for tds of ".$invoiceno;

          $x = $pdf->GetX();
          $pdf->myCell($width_cell[0],13,$x,date("d/m/Y",strtotime($row3['pdate'])),'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[1],13,$x,$transactions,'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[2],13,$x,$details,'LTBR',0,$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[3],13,$x,"0.00",'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[4],13,$x,IND_money_format($row3['amountcredited']),'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[5],13,$x,IND_money_format($row3['tds']),'LTBR',0,'R',$fill);
          $x = $pdf->GetX();
          $pdf->myCell($width_cell[6],13,$x,IND_money_format($balance),'LTBR',0,'R',$fill);

          $pdf->Ln();
      }
    // else
    // {
    //       $pdf->Cell($width_cell[0],5,date("d/m/Y",strtotime($row3['pdate'])),1,0,$fill);
    //       $pdf->Cell($width_cell[1],5,"payment",1,0,$fill);
    //       $pdf->Cell($width_cell[2],5,"on account",1,0,$fill);
    //       $pdf->Cell($width_cell[3],5,"0",1,0,'R',$fill);
    //       $pdf->Cell($width_cell[4],5,$row3['amountcredited'],1,0,'R',$fill);
    //       $pdf->Cell($width_cell[5],5,"0",1,0,'R',$fill);
    //       $pdf->Cell($width_cell[6],5,"0",1,0,'R',$fill);

    //       $pdf->Ln();
    // }

}
}
}


$invoice_val=0;
$balance=0;
$sql1="select * from invoice where account_id='$account_id'";
$result1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_assoc($result1))
{
    $invoicedate=date("d/m/Y",strtotime($row1['invoicedate'])); 
    $invoicedate=strtotime(str_replace('/', '-',$invoicedate));    
    // if(($invoicedate) >= ($from_date) and ($invoicedate) <= ($to_date))
    // {
        $invoice_val=$invoice_val + $row1['total'];
        //$balance=$balance + $row1['balance'];
    //}
}

$received_amount_account=0;
$received_amount=0;
$tds=0;
$sql2="select * from payments where account_id='$account_id'" ;
$result2=mysqli_query($conn,$sql2);
while($row2=mysqli_fetch_assoc($result2))
{
    $pdate=date("d/m/Y",strtotime($row2['pdate']));
    $pdate=strtotime(str_replace('/', '-',$pdate));
    if(($pdate) >= ($from_date) and ($pdate) <= ($to_date))
    {
      if($row2['invoiceno']!='')
      {
          $received_amount=$received_amount + $row2['amountcredited'];
          $tds=$tds + $row2['tds'];
      }
      else
      {
          $received_amount_account=$received_amount_account + $row2['amountcredited'];
      }
    }
}

if($invoice_val=='' || is_null($invoice_val))
{
  $invoice_val=0;
}

$width_cell_1=array(138,35,5,12);

  $pdf->Cell($width_cell_1[0],8,'',0,0,$fill);
   $pdf->Cell($width_cell_1[1],8,'Total Billed Amount',0,0,$fill);
   $pdf->Cell($width_cell_1[2],8,'Rs',0,0,'R',$fill);
   $pdf->Cell($width_cell_1[3],8,IND_money_format($invoice_val),0,0,'L',$fill);

    $pdf->Ln();

  $pdf->Cell($width_cell_1[0],8,'',0,0,$fill);
   $pdf->Cell($width_cell_1[1],8,'TDS',0,0,$fill);
   $pdf->Cell($width_cell_1[2],8,'Rs',0,0,'R',$fill);
   $pdf->Cell($width_cell_1[3],8,IND_money_format($tds),0,0,'L',$fill);

   
    $pdf->Ln();

  $pdf->Cell($width_cell_1[0],8,'',0,0,$fill);
   $pdf->Cell($width_cell_1[1],8,'Received Amount',0,0,$fill);
   $pdf->Cell($width_cell_1[2],8,'Rs',0,0,'R',$fill);
   $pdf->Cell($width_cell_1[3],8,IND_money_format($received_amount),0,0,'L',$fill);

    $pdf->Ln();

    $balance=$invoice_val - $received_amount - $tds;

  $pdf->Cell($width_cell_1[0],8,'',0,0,$fill);
   $pdf->Cell($width_cell_1[1],8,'Balance Due',0,0,$fill);
   $pdf->Cell($width_cell_1[2],8,'Rs',0,0,'R',$fill);
   $pdf->Cell($width_cell_1[3],8,IND_money_format($balance),0,0,'L',$fill);


 

 /*$pdf->Cell(0,5,"Total Billed Amount : Rs ".$invoice_val,0,0,'R',false);
 $pdf->Ln(5);
 $pdf->Cell(0,5,"TDS : Rs ".$tds,0,0,'R',false);
 $pdf->Ln(5);
 $pdf->Cell(0,5,"Received Amount Against Invoice : Rs ".$received_amount,0,0,'R',false);
 $pdf->Ln(5);*/
 // $pdf->Cell(0,5,"Received Amount On Account : Rs ".$received_amount_account,0,0,'R',false);
 // $pdf->Ln(5);
/* $pdf->Cell(0,5,"Balance Due : Rs ".$balance,0,0,'R',false);
 $pdf->Ln(5);*/
 // $pdf->Cell(0,15,'This is computer generated receipt,hence no signature required.','0','0','C');

 $pdf->Output();

?>
     
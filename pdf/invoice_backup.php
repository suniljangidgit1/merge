<?php
session_start();
date_default_timezone_set('asia/kolkata');   
// $date=date("d-m-Y");     
require('fpdf.php');


    //     $servername = "localhost";
 //            $username = "vgolddb";
 //            $password = "vgold@db";
 //            $dbname = "vgold_db";
           
 //            // Create connection
 //            $conn = new mysqli($servername, $username, $password, $dbname);
 //            // Check connection
 //            if ($conn->connect_error) 
 //            {
 //                die("Connection failed: " . $conn->connect_error);
 //            } 
            
    // $bid=$_GET['bid'];
    // $user_id=$_GET['user_id'];
    
    
 //     $sql3 = "SELECT * FROM gold_booking_transactions where gold_booking_id='$bid' and admin_status='1'";
 //     $result3 = mysqli_query($conn, $sql3);
 
 //     $sql4 = "SELECT * FROM gold_booking_details where gold_booking_id='$bid'";
 //     $result4 = mysqli_query($conn, $sql4);
 //     $row4=mysqli_fetch_assoc($result4);
        
        
 //     if($row4['added_date']=='0000-00-00'){
 //                      $booking_date=date('d-m-Y', strtotime( $row4['old_added_date']));
 //                      } else if($row4['old_added_date']=='') { 
 //                        $booking_date=date('d-m-Y', strtotime( $row4['added_date']));
 //                       } 
        
        
 //     $sql5 = "SELECT * FROM user where user_id='$user_id'";
 //     $result5 = mysqli_query($conn, $sql5);
 //     $row5=mysqli_fetch_assoc($result5);
 //     $name=$row5['first_name']." ".$row5['last_name'];
  
class PDF extends FPDF
{
// Page header
function Header()
{

    // Logo
    //$this->Image('logo.png',65,0,75,50);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
          $this->SetFillColor(230,230,0);
    $this->Cell(0,10,'Tax Invoice','0','0','C');
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




/*$pdf->SetFont('Times','B',14);
$pdf->Cell(0,10,'Vaibhav','0','0','L');
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,10,'INVOICE','0','0','R');
$pdf->Ln(11);

$pdf->SetFont('Times','',12);

$pdf->Cell(0,0,'2362,Kelly Drive','0','0','L');
$pdf->Ln(1);
$pdf->Cell(0,0,'#INV-007654','0','0','R');
$pdf->Ln(4);
$pdf->Cell(0,0,'Charleston WV 23456','0','0','L');
$pdf->Ln(5);

$pdf->Cell(0,0,'U.S.A.','0','0','L');

$pdf->Ln(10);*/


/*$pdf->SetFont('Times','B',12);

$pdf->Cell(0,0,'Balance Due','0','0','R');
$pdf->Ln(4);
$pdf->Cell(0,0,'$11,000.00','0','0','R');
$pdf->Ln(10);*/


/*$pdf->SetFont('Times','',12);

$pdf->SetFont('Times','B',12);
$pdf->Cell(140);
$pdf->Cell(0,10,'Invoice Date:','0','0','L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'05 Jun 2019','0','0','R');
$pdf->Ln(8);


$pdf->Cell(130,10,'Bill To','0','0','L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(10);
$pdf->Cell(200,10,'Terms:','0','0','L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'Net 60','0','0','R');
$pdf->Ln(8);

$pdf->Cell(130,10,'Mr. Jack Wilson','0','0','L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(10);
$pdf->Cell(200,10,'Due Date:','0','0','L');
$pdf->SetFont('Times','',12);
$pdf->Cell(0,10,'04 July 2019','0','0','R');
$pdf->Ln(8);*/
 

// $pdf->Cell(20);

// $pdf->Cell(32,10,'Booking Date:','0','0','L');

// $pdf->Cell(60,10,$booking_date,'0','0','L');

// $pdf->Cell(32,10,'Rate:','0','0','L');

// $pdf->Cell(60,10,$row4['rate'],'0','0','L');
// $pdf->Ln(10);


// $pdf->Cell(20);

// $pdf->Cell(32,10,'Booking Id:','0','0','L');

// $pdf->Cell(60,10,$row4['gold_booking_id'],'0','0','L');

// $pdf->Cell(32,10,'Tenure:','0','0','L');

// $pdf->Cell(60,10,$row4['tennure'],'0','0','L');
// $pdf->Ln(10);


// $pdf->Cell(20);

// $pdf->Cell(32,10,'Statement Date:','0','0','L');

// $pdf->Cell(60,10,$date,'0','0','L');

// $pdf->Cell(32,10,'Down Payment:','0','0','L');

// $pdf->Cell(60,10,$row4['down_payment'],'0','0','L');
// $pdf->Ln(10);


// $pdf->Cell(20);

// $pdf->Cell(32,10,'Booking Amount:','0','0','L');

// $pdf->Cell(60,10,$row4['booking_amount'],'0','0','L');

// $pdf->Cell(32,10,'Installment:','0','0','L');

// $pdf->Cell(60,10,$row4['monthly_installment'],'0','0','L');
$pdf->Ln(8);

$pdf->SetTextColor(15,34,63);

$width_cell4=array(100,45,45);
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,'Paul Strips and Tubes','LTR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Invoice No.','LTR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'Invoice Date','LTR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'306, Konark Epitome ','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'ASPL/002','LBR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'15-Mar-2019','LBR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : GST-2898378','LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Place of Supply','LR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'Due Date','LR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : Maharashtra','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'Pune','LBR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'10-May-2019','LBR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : 83','LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[1],5,'Buyers Order No.','LR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'Order Date','LR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : 9876MP563765','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'8765987','LR',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'10-May-2019','LR',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],2,'','L',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],2,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],2,'','LR',0,'L',false); // Third header column 

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

$pdf->SetFont('Times','B',11);
$pdf->Cell($width_cell4[0],5,'Aquatech Solutions P Ltd','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'306, Konark Epitome','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'GSTIN/UIN : GST-2898378','LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',12);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'State : Maharashtra','LR',0,'L',false); // First header column
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'Code : 83','LR',0,'L',false); // First header column
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell4[1],5,'','L',0,'L',false); // Second header column
$pdf->Cell($width_cell4[2],5,'','R',0,'L',false); // Third header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell4[0],5,'PAN : 9876MP563765','LR',0,'L',false); // First header column
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
$pdf->Cell($width_cell[0],5,'SI No','LR',0,'C',false); // First header column
$pdf->Cell($width_cell[1],5,'Description of Services','LR',0,'C',false); // First header column 
$pdf->Cell($width_cell[2],5,'HSN/SAC','LR',0,'L',false); // Second header column
$pdf->Cell($width_cell[3],5,'Qty','LR',0,'C',false); // Third header column 
$pdf->Cell($width_cell[4],5,'Rate','LR',0,'C',false); // Fourth header column

$pdf->Cell($width_cell[5],5,'per','LR',0,'C',false); // First header column 
$pdf->Cell($width_cell[6],5,'Amount','LR',0,'C',false); // First header column 

// $pdf->Cell($width_cell[5],10,'Transaction ID',1,0,L); // Second header column
// $pdf->Cell($width_cell[6],10,'Bank Details',1,0,L); // Third header column 


$pdf->Ln();
//// header ends ///////

$pdf->SetTextColor(0,0,0);


$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
// foreach ($conn->query($sql3) as $row) 
// {


// if($row['transaction_date']=='0000-00-00 00:00:00')
// {
// $transaction_date=date('d-m-Y', strtotime( $row['old_transaction_date']));
// }
// else if($row['old_transaction_date']=='')
// {
// $transaction_date=date('d-m-Y', strtotime( $row['transaction_date']));
// }


//  if($row['transaction_id']!=''){
//                      $transaction_id=$row['transaction_id'];
//                        } else if($row['cheque_no']!=''){
//                       $transaction_id=$row['cheque_no'];
//                        } else if($row['cheque_no']==''&&$row['transaction_id']==''){
//                        $transaction_id= "-";
//                       } 

//$pdf->SetDrawColor(221,218,218);

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell[0],5,'1','LRT',0,'C',false);
$pdf->Cell($width_cell[1],5,'Item 1','T',0,'L',false);
$pdf->Cell($width_cell[2],5,'Xyz','1',0,'L',false);
$pdf->Cell($width_cell[3],5,'3','T',0,'C',false);
$pdf->Cell($width_cell[4],5,'1000.00','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,'3000.00','LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'2','LRT',0,'C',false);
$pdf->Cell($width_cell[1],5,'Item 2','LT',0,'L',false);
$pdf->Cell($width_cell[2],5,'Laptop','LR',0,'L',false);
$pdf->Cell($width_cell[3],5,'3','T',0,'C',false);
$pdf->Cell($width_cell[4],5,'4000.00','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,'7000.00','LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total CGST','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,'','LTR',0,'C',false);

$pdf->Ln();

$pdf->Cell($width_cell[0],5,'','LTR',0,'C',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[1],5,'Total SGST','T',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LT',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LT',0,'C',false);
$pdf->Cell($width_cell[6],5,'','LTR',0,'C',false);

$pdf->Ln();

$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cell[0],5,'','LTRB',0,'R',false);
$pdf->Cell($width_cell[1],5,'Total','TB',0,'R',false);
$pdf->Cell($width_cell[2],5,'','LTB',0,'L',false);
$pdf->Cell($width_cell[3],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[4],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[5],5,'','LTB',0,'C',false);
$pdf->Cell($width_cell[6],5,'10,000.00','LTRB',0,'C',false);

$pdf->Ln();

$width_cellA=array(45,130,15);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellA[0],5,'Amount Chargeable (in words):','L',0,'L',false);
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellA[1],5,'Indian Rupees Ten Thousand Only','',0,'L',false);
$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellA[2],5,'E. & O.E','R',0,'R',false);


// $pdf->Cell($width_cell[5],10,$transaction_id,1,0,L,$fill);
// $pdf->Cell($width_cell[6],10,$row['bank_details'],1,0,L,$fill);
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
$pdf->Cell($width_cell1[2],5,'Rate','L',0,'C',false); // Third header column 
$pdf->Cell($width_cell1[3],5,'CGST','L',0,'C',false); // Fourth header column

$pdf->Cell($width_cell1[4],5,'SGST','L',0,'C',false); // First header column 
$pdf->Cell($width_cell1[5],5,'IGST','L',0,'C',false); // First header column 
$pdf->Cell($width_cell1[6],5,'Total Tax Amount','LR',0,'C',false); // First header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell1[0],5,'Xyz','LRT',0,'L',false); // First header column 
$pdf->Cell($width_cell1[1],5,'1000.00','RT',0,'C',false); // Second header column
$pdf->Cell($width_cell1[2],5,'18%','LT',0,'C',false); // Third header column 
$pdf->Cell($width_cell1[3],5,'','LT',0,'C',false); // Fourth header column

$pdf->Cell($width_cell1[4],5,'','LRT',0,'C',false); // First header column 
$pdf->Cell($width_cell1[5],5,'','RT',0,'C',false); // First header column 
$pdf->Cell($width_cell1[6],5,'10,000.00 ','RT',0,'C',false); // First header column 

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cell1[0],5,'Laptop','LRT',0,'L',false); // First header column 
$pdf->Cell($width_cell1[1],5,'2000.00','RT',0,'C',false); // Second header column
$pdf->Cell($width_cell1[2],5,'10%','LT',0,'C',false); // Third header column 
$pdf->Cell($width_cell1[3],5,'','LT',0,'C',false); // Fourth header column

$pdf->Cell($width_cell1[4],5,'','LRT',0,'C',false); // First header column 
$pdf->Cell($width_cell1[5],5,'','RT',0,'C',false); // First header column 
$pdf->Cell($width_cell1[6],5,'20.000.00 ','RT',0,'C',false); // First header column 

$pdf->Ln();

$pdf->SetTextColor(15,34,63);

$width_cellT=array(100,90);

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'Terms & Conditions:','LTR',0,'L',false); // First header column 
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellT[1],5,'Bank Details','LTR',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Beneficiary: Aquatech Solutions P Ltd','LR',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Bank: Bank Of Maharashtra','LR',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Branch: Thane','LR',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Account No.: 564674676785','LR',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'','LRB',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'IFSC Code: MAHB0000088','LRB',0,'L',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',10);
$pdf->Cell($width_cellT[0],5,'Customers Seal and Signature','LR',0,'L',false); // First header column 
$pdf->SetFont('Times','B',10);
$pdf->Cell($width_cellT[1],5,'For Paul Strips and Tubes','LR',0,'R',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],15,'','LR',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],15,' ','LR',0,'R',false); // Second header column

$pdf->Ln();

$pdf->SetFont('Times','',9);
$pdf->Cell($width_cellT[0],5,'','LRB',0,'L',false); // First header column 
$pdf->Cell($width_cellT[1],5,'Authorised Signatory','LRB',0,'R',false); // Second header column

//}

$pdf->Ln();
$pdf->SetFont('Times','',10);
$pdf->Cell(0,10,'This is a Computer Generated Invoice.','0','0','C');


/*$pdf->Ln(15);
$pdf->SetFont('Times','',12);
$pdf->Cell(0,15,'1. If Place of Supply = State of Seller, IGST column will be disabled.','0','0','L');
$pdf->Ln(10);
$pdf->MultiCell(0,6,'2. If Type of GST selected is CGST/ SGST, and rate selected is 18% then amount in CGST = 9% and amount      in SGST = 9%.  CGST value = SGST value, 0 or greater. ','0','L');
$pdf->MultiCell(0,6,'3. In 1 invoice, there can be either CGST-SGST or IGST. If user selected any one, the other will                            be automatically disabled. He cannot enter both CGST and IGST in one invoice.','0','L');
$pdf->Cell(0,6,'4. Value of PAN will be fetched by the system, extract from GSTIN, PAN = 3rd -12th character from GSTIN.','0','0','L');
$pdf->Ln(6);
$pdf->Cell(0,6,'5. Code = First 2 digits from GSTIN.','0','0','L');*/





$pdf->Output();
?>

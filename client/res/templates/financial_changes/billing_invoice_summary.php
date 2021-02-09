
<?php
error_reporting(~E_ALL);

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET['dataId'];

$sql4="select * from invoice where id='$id'";
$result4=mysqli_query($conn,$sql4);
$row4=mysqli_fetch_assoc($result4);
$total_amount=$row4['total'];
$invoiceno=$row4['invoiceno'];

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


    $output.='
        <h4><span><b>Invoice No:</b></span>' .$invoiceno.'</h4>
        <form action="#" method="post" id="paymentInvoiceSummaryForm" >

            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <table id="example" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Payment#</th>
                                            <th>Reference#</th>
                                            <th>Payment Mode</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        $received_amount=0;
                                        $tds=0;
                
                                        $sql1="select * from payments where invoiceno='$invoiceno' order by pdate desc";
                                        $result1=mysqli_query($conn,$sql1);
                                        while($row1=mysqli_fetch_assoc($result1))
                                        {
                                            $received_amount=$received_amount + $row1['amountcredited'];
                                            $tds=$tds + $row1['tds'];

                                         $output.='<tr>
                                                <td> '.date("d-m-Y",strtotime($row1['pdate'])).'</td>
                                                <td> '.$row1['id'].'</td>
                                                <td> '.$row1['transactionid'].'</td>
                                                <td> '.$row1['mode'].'</td>
                                                <td>'. IND_money_format($row1['amountcredited']).'</td>       
                                            </tr>';
                                        }
                                            $balance=$total_amount - $received_amount - $tds;
                                   $output.=' </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <span><b>Received Amount </b>:</span>
                                            </div>
                                            <div class="col-md-2" style="text-align: right;padding: 0px;">
                                                <span>Rs</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>'.IND_money_format($received_amount).'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <span><b>TDS </b>:</span>
                                            </div>
                                            <div class="col-md-2" style="text-align: right;padding: 0px;">
                                                <span>Rs</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>'.IND_money_format($tds).'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <span><b>Billed Amount</b> :</span>
                                            </div>
                                            <div class="col-md-2" style="text-align: right;padding: 0px;">
                                                <span>Rs</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>'.IND_money_format($total_amount).'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6" style="padding: 0px;">
                                                <span><b>Balance </b>:</span>
                                            </div>
                                            <div class="col-md-2" style="text-align: right;padding: 0px;">
                                                <span>Rs</span>
                                            </div>
                                            <div class="col-md-4">
                                                <span>'.IND_money_format($balance).'</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </form>';


    
                                     
    echo json_encode($output); 
?>
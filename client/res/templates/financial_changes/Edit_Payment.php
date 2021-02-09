<?php
error_reporting(~E_ALL);

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['dataId'];
$sql1 = "SELECT * FROM invoice where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);


$sql5="select * from payments where id='$id'"; 
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);


$account_id=$row5['account_id'];

$sql6="select * from account where id='$account_id'";

$result6=mysqli_query($conn,$sql6);
$row6=mysqli_fetch_assoc($result6);
// echo $account_id;
// print_r( $row6);die();

$output='
    
              <form action="#" method="post" id="updatePaymentForm" >
                <div class="">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="btn-group">
                        <button type="button" id="update_paymentBTN" class="btn btn-primary">Update</button>
                        <input type="hidden" id="recordId" name="recordId" value="'.$id.'" />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                        <h4 style="color: #0A6783 !important;font-size: 15px;font-weight: 600;">Overview</h4>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label>Account <span class="text-danger">*</span></label>
                        <input type="text" value="'.$row6["name"].'"   id="account_name" name="account_name" class="form-control" placeholder="" required readonly>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label >Payment Type <span class="text-danger">*</span></label>
                        <input type="text" id="payment_type" value="'.$row5["paymenttype"].'"  name="payment_type" class="form-control" placeholder="" readonly>
                      </div>
                    </div>   
                  </div>

                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label for="">Date of Payment <span class="text-danger">*</span></label>
                        <div id="datepicker" class="input-group date" data-date-format="dd/mm/yyyy">
                          <input type="text" value="'. date("d/m/Y",strtotime($row5["pdate"])).'"  name="payment_date" id="datepicker" class="form-control" placeholder="" required>
                          <span class="btn btn-default_gray input-group-addon"><i class="material-icons-outlined" style="font-size:16px !important;">date_range</i></span>
                        </div>
                      </div>
                    </div>';
                
                if($row5['paymenttype']=='On account payment'){
                
                
                $output='
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                         <label for="">Amount</label>
                           <input type="text" value="'.$row5["amountcredited"].'" id="billed_amount" name="billed_amount" class="form-control" placeholder="">
                      </div>
                    </div>
            </div>
 
             </div>
             
                <div class="row">
                  <div class="col-sm-6 col-md-6">
                  <div class="form-group">
                    <label for="">Mode <span class="text-danger">*</span></label>
                      <select name="mode" id="mode" class="form-control" required="required">';


                      $mode1= ($row5["mode"]=="Cheque") ? "selected" : "";
                      $mode2= ($row5["mode"]=="Cash") ? "selected" : "";
                      $mode3= ($row5["mode"]=="RTGS/NEFT") ? "selected" : "";
                      $mode4= ($row5["mode"]=="Online") ? "selected" : "";
                      $mode5= ($row5["mode"]=="Others") ? "selected" : "";

                       $output.='         <option value="Cheque" '.$mode1.'>Cheque</option>
                                          <option value="Cash" '.$mode2.'>Cash</option>
                                          <option value="RTGS/NEFT" '.$mode3.'>RTGS/NEFT</option>
                                          <option value="Online" '.$mode4.'>Online</option>
                                          <option value="Others" '.$mode5.'>Others</option>
                                             
                        </select>

                  
                   </div>
                </div>
                <div class="col-sm-6  col-md-6">
                  <div class="form-group">
                      <label for="">Transaction Id</label>
                      <input type="text" value="'. $row5['transactionid'].'" id="transaction_id" name="transaction_id" class="form-control" placeholder="">
                   </div>
                </div>               
              </div>';
                     } 

 $output.='
</div>';

if($row5['paymenttype']=='Against Invoice')
                {
$output.='
 <div class="row" id="payment_table">
                <div class="col-md-12">
                  <div class="form-group">
                      <div class="table-responsive Finance_custom-a11yselect">
                      <table class="table">
                          <thead>
                            <tr>
                              <th>Invoice No</th>
                              <th>Invoice Date</th>
                              <th>Invoice Amount</th>
                              <th>Due Amount</th>
                              <th>TDS</th>
                              <th>Received Amount</th>
                              <th>Mode</th>
                              <th>Ref ID</th>
                            </tr>
                          </thead>
                          <tbody>';
                         $invoiceno=$row5['invoiceno'];



                              $sql1="select * from invoice where invoiceno='$invoiceno' and deleted=0";
                              $result1=mysqli_query($conn,$sql1);
                              while($row1=mysqli_fetch_assoc($result1))
                              {   
                            $output.='

                            <tr>
                               <td>
                                  <div class="form-group"><input type="text" id="invoiceno" name="invoiceno" class="form-control" value="'.$row1['invoiceno'].'" placeholder="" readonly></div>
                               </td>
                               <td>
                                  <div class="form-group"><input type="text" id=""  name="invoicedate" value="'. date("d/m/Y",strtotime($row1["invoicedate"])).'" class="form-control" readonly placeholder="" ></div>
                               </td>
                               <td>
                                  <div class="form-group"><input type="text" id="invoice_amount"  name="invoice_amount" class="form-control" readonly value="'.$row1['total'].'" placeholder="" ></div>
                               </td>
                               <td> 

                                <input type="hidden" value="'.$row5['id'].'" id="payment_id">
                                  <input type="hidden" value="" id="due_amount1">
                                  <div class="form-group"><input readonly type="text" id="due_amount"  name="due_amount" class="form-control" value="'.$row1['balance'].'" placeholder="" ></div>
                               </td>
                               <td>
                                  <div class="form-group"><input type="text" id="tds1"  name="tds1" class="form-control tds1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" value="'.$row5['tds'].'"</div>
                               </td>
                               <td>
                                  <div class="form-group"><input type="text" id="net_amount1" value="'.$row5['amountcredited'].'"  name="net_amount1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control net_amount1" placeholder="" ></div>
                               </td>
                               <td>
                                 <select name="mode1" id="" class="edit_payment_mode_history form-control" >';

                      $mode1= ($row5["mode"]=="Cheque") ? "selected" : "";
                      $mode2= ($row5["mode"]=="Cash") ? "selected" : "";
                      $mode3= ($row5["mode"]=="RTGS/NEFT") ? "selected" : "";
                      $mode4= ($row5["mode"]=="Online") ? "selected" : "";
                      $mode5= ($row5["mode"]=="Others") ? "selected" : "";


                      $output.='            <option value="Cheque" '.$mode1.'>Cheque</option>
                                             <option value="Cash" '.$mode2.'>Cash</option>
                                             <option value="RTGS/NEFT" '.$mode3.'>RTGS/NEFT</option>
                                             <option value="Online" '.$mode4.'>Online</option>
                                             <option value="Others" '.$mode5.'>Others</option>
                                             
                        </select>


                                
                                     
                               </td>
                               <td>
                                  <div class="form-group"><input type="text" id="transaction_id" name="transaction_id1" class="form-control" value="'.$row5['transactionid'].'" placeholder="" ></div>
                               </td>
                            </tr>';
                            }

                            $output.='</tbody>
                        </table>
                      </div>
                   </div>
                </div>               
              </div>';
            }
           $output.='

 </div>
</form>




          

';

echo json_encode($output); 
?>
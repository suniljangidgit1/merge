<?php
// error_reporting(~E_ALL);

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$id=$_GET['dataId'];

$sql1 = "SELECT * FROM invoice where id='$id'";
$result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_assoc($result1);

$account_id=$row1['account_id'];

$sql5= "SELECT * FROM account where id='$account_id'";
$result5=mysqli_query($conn,$sql5);
$row5=mysqli_fetch_assoc($result5);
// print_r( $row6);die();

$output='
    
        <form action="#" method="post" id="updatePaymentForm" autocomplete="off">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <button type="button" id="save_recordpaymentBTN" class="btn btn-primary">Save</button>
                            <input type="hidden" id="recordId" name="recordId" value="'.$id.'" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="" style="border-bottom: 1px solid #e5e5e5; margin-bottom: 5px;">
                            <h4>Overview</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label>Account <span class="text-danger">*</span></label>
                            <input type="text" value="'.$row5["name"].'"  id="account_name" name="account_name" class="form-control" placeholder="" required readonly>
                            <input type="hidden" name="pay_account_id" id="pay_account_id" value="'.$account_id.'" />
                            <input type="hidden" name="pay_billing_entity_id" id="pay_billing_entity_id" value="'.$row1["billing_entity_id"].'" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label >Payment Type <span class="text-danger">*</span></label>
                            <select id="record_payment_type" name="record_payment_type" class="form-control" disabled required>
                                    <option value="Against Invoice">Against Invoice</option>
                            </select>
                        </div>
                    </div>   
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="">Date of Payment <span class="text-danger">*</span></label>
                                <div id="datepicker" class="input-group date" data-date-format="dd/mm/yyyy">
                                    <input type="text" name="record_payment_date"  onkeydown="return false;" id="datepicker" class="form-control" placeholder="" required>
                                    <span class="btn btn-default_gray input-group-addon"><i class="material-icons-outlined" style="font-size:16px !important;">date_range</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="payment_table">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="table-responsive Finance_custom-a11yselect">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>INVOICE NO</th>
                                            <th>INVOICE DATE</th>
                                            <th>INVOICE AMOUNT</th>
                                            <th>DUE AMOUNT</th>
                                            <th>TDS</th>
                                            <th>RECEIVED AMOUNT</th>
                                            <th>MODE</th>
                                            <th>REF ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group"><input type="text" id="invoiceno" name="invoiceno" class="form-control" value="'.$row1['invoiceno'].'" placeholder="" readonly>
                                                <input type="hidden" name="invoiceid" id="invoiceid" value="'.$row1['id'].'" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" id=""  name="invoicedate" value="'. date("d/m/Y",strtotime($row1["invoicedate"])).'" class="form-control" readonly placeholder="" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" id="payment_invoice_amount"  name="payment_invoice_amount" class="form-control" readonly value="'.$row1['total'].'" placeholder="" >
                                                </div>
                                            </td>
                                            <td> 
                                                <input type="hidden" value="'.$row1['id'].'" id="payment_id">
                                                <input type="hidden" value="'.$row1['balance'].'" id="due_amount1">
                                                <div class="form-group"><input readonly type="text" id="payment_due_amount"  name="payment_due_amount" class="form-control" value="'.$row1['balance'].'" placeholder="" >
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" id="payment_tds"  name="payment_tds" class="form-control payment_tds" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="" value="0"</div>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" id="payment_net_amount1" value="0"  name="payment_net_amount1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" class="form-control payment_net_amount1" placeholder="" >
                                                </div>
                                            </td>
                                            <td>
                                                <select name="mode_name" id="mode_name" class="form-control" >
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="RTGS/NEFT/IMPS">RTGS/NEFT/IMPS</option>
                                                    <option value="Online">Online</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="form-group"><input type="text" id="transaction_id" name="transaction_id1" class="form-control" value="" placeholder="" >
                                                </div>
                                            </td>
                                        </tr>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </form>
';

echo json_encode($output); 

?>
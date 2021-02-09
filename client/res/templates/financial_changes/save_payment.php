<?php
    session_start();
    error_reporting(~E_ALL);
    $user_name = $_SESSION['Login'];
    // $entity_id=$_SESSION['entityID'];
    $entity_name=$_SESSION['name'];
    date_default_timezone_set('asia/kolkata');   

    //get connection
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $account_name=$_REQUEST['account_name'];
    $payment_type=$_REQUEST['payment_type'];

    $sql15="select * from account where name='$account_name'";
    $result15=mysqli_query($conn,$sql15);
    $row15=mysqli_fetch_assoc($result15);

    if($payment_type=='On account payment')
    {
        $account_id=$row15['id'];
    }

    $oldDate1= strtr($_REQUEST['payment_date'], '/', '-');
    $oldDate= strtotime($oldDate1);
    $payment_date= date("Y-m-d", $oldDate);
    $billed_amount=$_REQUEST['billed_amount'];

    $mode=$_REQUEST['mode'];
    $transaction_id=$_REQUEST['transaction_id'];

    $tds=$_REQUEST['tds'];
    $net_amount=$_REQUEST['net_amount'];
    // if( $row5['balance']=='')
    // {
    // 	$balance=$billed_amount - $tds - $net_amount - $row5['balance'];
    // }
    // else if($row5['balance']!='')
    // {
    //  	$balance=$row5['balance'] - $net_amount;
    // }

    function getToken($length)
    	{
    		$token = "";
    		$codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
    		$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
    		$codeAlphabet.= "0123456789";
    		$max = strlen($codeAlphabet); // edited
    		for ($i=0; $i < $length; $i++) {
    			$token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
    		}
    		return $token;
    	}


    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 0) {
            return $min;
        }
        ## Not so random
        $log = log($range, 2);
        $bytes = (int) ($log / 8) + 1;
        ## Length in bytes
        $bits = (int) $log + 1;
        ## Length in bits
        $filter = (int) (1 << $bits) - 1;
        ## Set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter;
            ## Discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    $payment_id=getToken(17);

    $sql6="select * from user where user_name='$user_name'";
    $result6=mysqli_query($conn,$sql6);
    $row6=mysqli_fetch_assoc($result6);

    $created_by_id=$row6['id'];
    $date=date("Y-m-d");

    $payment_date_varchar=date("d M Y",strtotime($payment_date));
    $invoice_date_varchar=date("d M Y",strtotime($payment_date));

    if($payment_type=='Against Invoice')
    {
        $mode1=$_REQUEST['mode1'];
        $tds1=$_REQUEST['tds1'];

        $transaction_id1=$_REQUEST['transaction_id1'];
        $invoiceno=$_REQUEST['invoiceno'];
        $invoice_amount=$_REQUEST['invoice_amount'];

        $len=count($_REQUEST['invoiceno']);

        // for ($j=0; $j < $len; $j++) 
        // { 
        // echo "<br>".$invoiceno[$j]."<br>";
        // }
        for ($j=0; $j < $len; $j++) 
        { 
            // echo $i ."-i";
            $payment_id=getToken(17);

            $sql4="select * from invoice where invoiceno='$invoiceno[$j]'";
            $result4=mysqli_query($conn,$sql4);
            $row4=mysqli_fetch_assoc($result4);

            $total_amount=$row4['total'];
            $due_date=$row4['due_date'];

            if($payment_type=='Against Invoice')
            {
                $account_id=$row4['account_id'];
            }
             // print_r($_REQUEST);
            $sql_payment="insert into payments(invoiceno,billedamount,pdate,amountcredited,mode,transactionid,id,tds,created_by_id,paymentstatus,createddate,paymentdate,account_id,paymenttype,account_name1)values('$invoiceno[$j]','$invoice_amount[$j]','$payment_date','$net_amount[$j]','$mode1[$j]','$transaction_id1[$j]','$payment_id','$tds1[$j]','$created_by_id','Success','$date','$payment_date_varchar','$account_id','$payment_type','$account_name')";
            $result_payment=mysqli_query($conn,$sql_payment);
            // echo $sql_payment;die;

            $received_amount=0;
            $tds=0;
            $sql5="select * from payments where invoiceno='$invoiceno[$j]'" ;
            $result5=mysqli_query($conn,$sql5);
            while($row5=mysqli_fetch_assoc($result5))
            {
                $received_amount=$received_amount + $row5['amountcredited'];
                $tds=$tds + $row5['tds'];
            }
            $balance=$total_amount - $received_amount - $tds;

            $invoicedate1= date("Y-m-d");

            // Function call to find date difference 
            $dateDiff = dateDiffInDays($invoicedate1, $duedate); 

            if(strtotime($duedate) == strtotime(date("Y-m-d")) && $balance==$total_amount)
            {
                $paymentstatus="Due today";
            }
            else if($balance==0)
            {
                $paymentstatus="Paid";
            }
            else if(strtotime($duedate) > strtotime(date("Y-m-d")) && $balance==$total_amount)
            {
                $paymentstatus="Due in ".$dateDiff." days";
            }
            else  if(strtotime($duedate) < strtotime(date("Y-m-d")) && $balance==$total_amount)
            {
                $paymentstatus="Over Due by ".$dateDiff." days";
            }
            else
            {
                $paymentstatus="Partially paid";
            }

            $sql_invoice_update="update invoice set paymentstatus='$paymentstatus',payment_date='$invoice_date_varchar',paymentdate='$payment_date',balance='$balance' where invoiceno='$invoiceno[$j]'";

            $result_invoice_update=mysqli_query($conn,$sql_invoice_update);
        }

        // $result_invoice_update=mysqli_query($conn,$sql_invoice_update);

        // $sql_payment_update="update payments set balance='$balance' where id='$lastid'";

        // $result_payment_update=mysqli_query($conn,$sql_payment_update);

    }
    else if($payment_type=='Advance payment')
    {
        $payment_id=getToken(17);

        $sql_payment="insert into payments(pdate,amountcredited,mode,transactionid,id,tds,created_by_id,paymentstatus,createddate,paymentdate,account_id,paymenttype)values('$payment_date','$billed_amount','$mode','$transaction_id','$payment_id','$tds',$created_by_id','Success','$date','$payment_date_varchar','$account_id','$payment_type')";
        $result_payment=mysqli_query($conn,$sql_payment);
    }

    function dateDiffInDays($date1, $date2)  
    { 
        // Calulating the difference in timestamps 
        $diff = strtotime($date2) - strtotime($date1);  
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds 
        return abs(round($diff / 86400)); 
    } 
    // $sql_payment="insert into payments(invoiceno,billedamount,pdate,amountcredited,mode,transactionid,id,balance,tds,created_by_id,paymentstatus,createddate,paymentdate,account_id,paymenttype)values('$invoiceno','$billed_amount','$payment_date','$net_amount','$mode','$transaction_id','$payment_id','$balance','$tds','$created_by_id','Success','$date','$payment_date_varchar','$account_id','$payment_type')";
    // $result_payment=mysqli_query($conn,$sql_payment);

    $project = explode('/', $_SERVER['REQUEST_URI'])[1];
    	
    echo 1;
?>
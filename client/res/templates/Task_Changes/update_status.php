<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

// echo "ENTITY ID = ". 
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

date_default_timezone_set("Asia/Kolkata");
$date=date("Y/m/d h:i:s");

$sql2="update task set status='Closed',closed_at='$date' where id='$entity_id'";
$result2=mysqli_query($conn,$sql2);

if(isset($result2))
{

//taking data from task

// $sql="select *, DATE_FORMAT( ADDTIME(date_completed, '5:30'), '%d/%m/%Y %h:%i:%s') new_date_completed from task where id='$entity_id'";
$sql="select *, DATE_FORMAT( ADDTIME(date_completed, '5:30'), '%d/%m/%Y %h:%i:%s') new_date_completed,SUBTIME(created_at, '5:30')new_created_at from task where id='$entity_id'";
$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result); 
		
	// echo "<pre>"; print_r($row); die;	

	$id=$row['id'];
	$name=$row['name'];
	$deleted=$row['deleted'];
	$status=$row['status'];
	$priority=$row['priority'];
	$date_start1=$row['date_start'];
	$date_start=date("d/m/Y h:i:s",strtotime("+330 minutes", strtotime($date_start1)));
	$date_end1=$row['date_end'];
	$date_end=date("d/m/Y h:i:s",strtotime("+330 minutes", strtotime($date_end1)));
	$date_start_date=$row['date_start_date'];
	$date_end_date=$row['date_end_date'];
	$date_completed=$row['date_completed'];
	$description=$row['description'];
	$created_at1=$row['new_created_at'];
	$created_at=date("Y/m/d h:i:s",strtotime("+330 minutes", strtotime($created_at1)));
	$modified_at=date("Y/m/d h:i:s");//$row['modified_at'];
	$parent_id=$row['parent_id'];
	$parent_type=$row['parent_type'];
	$account_id=$row['account_id'];
	$contact_id=$row['contact_id'];
	$created_by_id=$row['created_by_id'];
	$modified_by_id=$row['modified_by_id'];
	$assigned_user_id=$row['assigned_user_id'];
	$create_recurring_series_of_tasks=$row['create_recurring_series_of_tasks'];
	$frequency=$row['frequency'];
	$repeat=$row['repeat'];
	$start_date=$row['start_date'];
	$end_date=$row['end_date'];
	$weeklyrepeat=$row['weeklyrepeat'];
	$weeklyrepeat_on=$row['weeklyrepeat_on'];
	$weeklystart_date=$row['weeklystart_date'];
	$weeklyend_date=$row['weeklyend_date'];
	$monthly_repeat_on=$row['monthly_repeat_on'];
	$monthly_start_date=$row['monthly_start_date'];
	$monthly_end_date=$row['monthly_end_date'];
	$monthly_repeat=$row['monthly_repeat'];
	$number_of_recurring_tasks=$row['number_of_recurring_tasks'];
	$custom_start_date1=$row['custom_start_date1'];
	$custom_start_date2=$row['custom_start_date2'];
	$custom_start_date3=$row['custom_start_date3'];
	$custom_start_date4=$row['custom_start_date4'];
	$custom_start_date5=$row['custom_start_date5'];
	$custom_start_date6=$row['custom_start_date6'];
	
	$completed_at=$row['new_date_completed'];
	$closed_at=date("d/m/Y h:i:s",strtotime($row['closed_at']));

	// $created_at=ADDTIME($created_at, '5:30');
	// echo $completed_at . "--------". $row['date_completed'];
	// echo "<br>";
	// echo $closed_at. "...................". $row['closed_at'];

	// die;

	if(is_null($start_date) || empty($start_date) || !isset($start_date))
	{
		$start_date='0001-01-01';
	}
    
    if(is_null($date_start) || empty($date_start) || !isset($date_start))
	{
		$date_start='0001-01-01 00:00:00';
	}

    if(is_null($date_end) || empty($date_end) || !isset($date_end))
	{
		$date_end='0000-00-00 00:00:00';
	}

    
	if(is_null($end_date) || empty($end_date) || !isset($end_date))
	{
		$end_date='0001-01-01';
	}

	if(is_null($weeklystart_date) || empty($weeklystart_date) || !isset($weeklystart_date))
	{
		$weeklystart_date='0001-01-01';
	}
	if(is_null($weeklyend_date) || empty($weeklyend_date) || !isset($weeklyend_date))
	{
		$weeklyend_date='0001-01-01';
	}
	if(is_null($monthly_start_date) || empty($monthly_start_date) || !isset($monthly_start_date))
	{
		$monthly_start_date='0001-01-01';
	}
	if(is_null($monthly_end_date) || empty($monthly_end_date) || !isset($monthly_end_date))
	{
		$monthly_end_date='0001-01-01';
	}
	if(is_null($custom_start_date1) || empty($custom_start_date1) || !isset($custom_start_date1))
	{
		$custom_start_date1='0001-01-01';
	}
	if(is_null($custom_start_date2) || empty($custom_start_date2) || !isset($custom_start_date2))
	{
		$custom_start_date2='0001-01-01';
	}
	if(is_null($custom_start_date3) || empty($custom_start_date3) || !isset($custom_start_date3))
	{
		$custom_start_date3='0001-01-01';
	}
	if(is_null($custom_start_date4) || empty($custom_start_date4) || !isset($custom_start_date4))
	{
		$custom_start_date4='0001-01-01';
	}
	if(is_null($custom_start_date5) || empty($custom_start_date5) || !isset($custom_start_date5))
	{
		$custom_start_date5='0001-01-01';
	}
	if(is_null($custom_start_date6) || empty($custom_start_date6) || !isset($custom_start_date6))
	{
		$custom_start_date6='0001-01-01';
	}

			$sql_insert_task="insert into closed_task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id,completedat,closedat,create_recurring_series_of_tasks,start_date,end_date,frequency,`repeat`,weeklyrepeat,weeklyrepeat_on,weeklystart_date,weeklyend_date,monthly_repeat_on,monthly_start_date,monthly_end_date,monthly_repeat,number_of_recurring_tasks,custom_start_date1,custom_start_date2,custom_start_date3,custom_start_date4,custom_start_date5,custom_start_date6,date_completed)

			values

			('$id','$name','0','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id','$completed_at','$closed_at','$create_recurring_series_of_tasks','$start_date','$end_date','$frequency','$repeat','$weeklyrepeat','$weeklyrepeat_on','$weeklystart_date','$weeklyend_date','$monthly_repeat_on','$monthly_start_date','$monthly_end_date','$monthly_repeat','$number_of_recurring_tasks','$custom_start_date1','$custom_start_date2','$custom_start_date3','$custom_start_date4','$custom_start_date5','$custom_start_date6','$completed_at')";
			$result_insert_task=mysqli_query($conn,$sql_insert_task);

// print_r($sql_insert_task);die;


			$sql1="select * from attachment where parent_id='$id'";
			$result1=mysqli_query($conn,$sql1);
			while ($row1=mysqli_fetch_assoc($result1))
			{
				$attachment_id=$row1['id'];
				$sql3="update attachment set parent_type='ClosedTask' where id='$attachment_id'";
				$result3=mysqli_query($conn,$sql3);
			}

			$sql4="select * from note where parent_id='$id'";
			$result4=mysqli_query($conn,$sql4);
			while ($row4=mysqli_fetch_assoc($result4))
			{
				$note_id=$row4['id'];
				$sql5="update note set parent_type='ClosedTask' where id='$note_id'";
				$result5=mysqli_query($conn,$sql5);
			}

			$sql6="delete from task where id='$entity_id'";
			$result6=mysqli_query($conn,$sql6);

	echo 1;
}
else
{
	echo 0;
}

?>
<?php
//	session_start();
//	$entityName= $_SESSION["name"];
	
  //  $copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $entityName));
/*	$conn = mysqli_connect('localhost', 'finnovaa_democrm', 'Fin$%184#', 'finnovaa_democrm_final');
	if($conn->connect_error){
		die("Connection Error :". $conn->connect_error);
	}
*/	
/*	ini_set('max_execution_time', 300);
	$result_for_entity_name = mysqli_query($conn, "SELECT * FROM entity_master");
	while($row_for_entity_name = mysqli_fetch_array($result_for_entity_name)){
	    
	    $table_name= $row_for_entity_name['table_name'];
	    
	    $result_for_id = mysqli_query($conn, "SELECT * FROM $table_name");
	    while($row_for_id = mysqli_fetch_array($result_for_id)){
		
    		$id= $row_for_id['id'];
    		
    		$sql_for_all_ids= "select * from note n where  n.modified_at=(select Max(modified_at) from note where parent_id='".$id."')";
    		
    		$result_for_all_ids = mysqli_query($conn, $sql_for_all_ids);
    		ini_set('max_execution_time', 300);
    		while($row_for_all_ids = mysqli_fetch_array($result_for_all_ids)){
    			$post= mysqli_real_escape_string($conn, $row_for_all_ids['post']);
    		    $note_id= $row_for_all_ids['id'];
    		    $sql_for_update_stream= mysqli_query($conn, "UPDATE $table_name SET stream = '".$post."' WHERE id= '".$id."'");
    		}
		
	    }
	}

	*/
	
	
	
	//echo "IN GET SREAM PAGE";
	
	date_default_timezone_set('Asia/Kolkata');
	$current_date_for_date_only= date('Y-m-d');
	$current_date= date('Y-m-d h.i.s');
	$current_time= date('h');
	$current_min= date('i');
	
//	echo "<br>";
//	echo "CURRENT DATE = ".$current_date_for_date_only;
//	echo "<br>";
//	echo "<br>";
	
	$meeting_time = date('g:i a', strtotime($current_date) - 60 * 60 * 6);
	
	echo $meeting_time;
	
	$reduce_hrs= strtotime ( '-5 hour' , strtotime ( $current_date) ) ;
	
	
	$newDate= date('Y-m-d h.i.s', $reduce_hrs);
	$reduce_mins= strtotime ( '-35 minute' , strtotime ($newDate) ) ;
	
	$newDate2= date('Y-m-d h:i:s', $reduce_mins);
	
	echo "DATE FORMAT = ". $newDate2;
	
	$newDate1= date('h:i', $reduce_mins);
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	//mysqli_query($conn, "INSERT INTO test_demo(city, name)VALUES('pune', 'abcd')");
	
	for($i=0; $i<=60; $i++){
	    
	    if($i<10){
			//echo "I IS LESS THAN 10";
			$i= "0".$i;
		}
	    
		$fullDate= $current_date_for_date_only." ".$newDate1.":".$i;
		echo "<br>";
		echo "FULL DATE $$$$$$$$$= ". $fullDate;
		//	$fullDate="2019-06-20 09:21:27";
		
		$result= mysqli_query($conn, "SELECT * FROM note WHERE created_at='".$fullDate."'");
	
		while($row = mysqli_fetch_array($result)){
		
			$post = mysqli_real_escape_string($conn,$row['post']);
			$parent_id = $row['parent_id'];
			$parent_type = $row['parent_type'];
			$modified_at = $row['modified_at'];
			
			echo "POST = ".$post;
			echo "<br>";
			echo "PARENT ID-- ".$parent_id."<br>"; 
			$copyIntoEntityTableName=strtolower(preg_replace('/\B([A-Z])/', '_$1', $parent_type));
			
			mysqli_query($conn, "UPDATE $copyIntoEntityTableName SET stream='".$post."', modified_at='".$modified_at."' WHERE id='".$parent_id."'");
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";
			echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
			echo mysqli_error($conn);
			
		}
	}
?>
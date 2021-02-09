<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com
*/
?>
<html>
<head>
<title>Create Simple Pagination Using PHP and MySQLi - AllPHPTricks.com</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:50px;'>ID</th>
<th style='width:150px;'>Name</th>
<th style='width:50px;'>type</th>
</tr>
</thead>
<tbody>
<?php
$allowed_type=array();
//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
$connect=$conn;
// $con = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 2;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM document_master WHERE document_type='mp3' OR document_type='MP3' OR document_type='msv'");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

    $result = mysqli_query($con,"SELECT * FROM document_master WHERE document_type='mp3' OR document_type='MP3' OR document_type='msv' LIMIT $offset, $total_records_per_page");
	$allowed_type = array('doc', 'DOC', 'docx', 'DOCX', 'pdf', 'PDF', 'TXT', 'txt', 'xls', 'xlsx');
    while($row = mysqli_fetch_array($result)){
		$dtype=$row['document_type'];
		//echo in_array($dtype,$allowed_type);exit();
		if(in_array($dtype, $allowed_type))
		{
			echo "<tr>
				  <td>".$row['id']."</td>
				  <td>".$row['document_name']."</td>
				  <td>".$row['document_type']."</td>
				  </tr>";
        }
	}
	mysqli_close($con);
    ?>
</tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
            
            }
		
		else {
        

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} 
		?>
</ul>
<?php
// $connect = mysqli_connect('localhost', 'root', 'root', 'fincrm');;
$userName='suraj';
$allowed = array('doc', 'docx', 'DOC', 'DOCX', 'pdf', 'PDF', 'txt', 'xls', 'xlsx');
$query = "SELECT * FROM document_master WHERE assigned_user_id= '".$userName."' ORDER BY id";
    		
    		$result = mysqli_query($connect, $query);
    		//$index--;
    		if(mysqli_num_rows($result) > 0)
    		{
    			while($row = mysqli_fetch_array($result))
    			{
					if(in_array($row['document_type'],$allowed))
					{
						echo $row['document_type'];
					}
				}
			}
?>
</div>
</body>
</html>
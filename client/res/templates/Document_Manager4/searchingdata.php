<?php
	//include('connection.php');
	// $conn = mysqli_connect('localhost', 'root', 'root', 'fincrm');;

	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

	if(!$conn){ die("Failed to connect to database!");}
	if(isset($_GET['search_word']))
	{
		$search_word=$_GET['search_word'];
		$search_word_new=mysqli_escape_string($conn,$search_word);
		$search_word_fix=str_replace(" ","%",$search_word_new);
		$sql=mysqli_query($conn,"SELECT * FROM document_master WHERE document_name LIKE '%$search_word_fix%' ORDER BY b_id DESC LIMIT 10");
		$count=mysqli_num_rows($sql);
		if($count > 0)
		{
			while($row=mysqli_fetch_array($sql))
			{
				$msg=$row['p_title'];
				$bold_word='<b>'.$search_word.'</b>';
				$final_msg = str_ireplace($search_word, $bold_word, $msg);
				?>
				<li><?php echo $final_msg; ?></li>
				<?php
			}
		}
		else
		{
			echo "<li>No Results</li>";
		}
	}
?>
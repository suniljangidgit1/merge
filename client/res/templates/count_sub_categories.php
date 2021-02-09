<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$count=0;

// $sql="select * from knowledge_base_category where parent_id='$id' and deleted='0'";



// $result=mysqli_query($conn,$sql);

// $count=mysqli_num_rows($result);
// while ($row=mysqli_fetch_assoc($result)) 
// {
// 	$count++;
// }


// $count2=categoryTree($id);






function categoryChild($id) {
	//get connection
  include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

    $sql="SELECT id FROM knowledge_base_category WHERE parent_id = '$id' and deleted='0'";

     $result=mysqli_query($conn,$sql);

    $children = array();

        while($row=mysqli_fetch_assoc($result)) 
        {
         
            $children[$row['id']] = categoryChild($row['id']);
       
        }
    

    return $children;
}

$sql1="SELECT id FROM knowledge_base_category";

     $result1=mysqli_query($conn,$sql1);

        while($row1=mysqli_fetch_assoc($result1)) 
        {
            $id=$row1['id'];
            $childrens=categoryChild($id);
            $categorycount= count($childrens ,COUNT_RECURSIVE);  
            $categorycount = $categorycount +1;
            $sql2="update knowledge_base_category set categorycount='$categorycount' where id='$id'";
            $result2=mysqli_query($conn,$sql2);
        }
  


 ?>
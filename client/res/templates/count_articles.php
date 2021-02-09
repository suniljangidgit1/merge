<?php
session_start();
error_reporting(~E_ALL);
$user_name = $_SESSION['Login'];
$entity_id=$_SESSION['entityID'];
$entity_name=$_SESSION['name'];

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

// $sql="select * from knowledge_base_article_knowledge_base_category where knowledge_base_category_id='$id' and deleted='0'";
// $result=mysqli_query($conn,$sql);
// $count=0;
// while ($row=mysqli_fetch_assoc($result)) 
// {
// 	$article_id=$row['knowledge_base_article_id'];

// 	$sql1="select * from knowledge_base_article where id='$article_id'";
// 	$result1=mysqli_query($conn,$sql1);
// 	$row1=mysqli_fetch_assoc($result1);

// 	if($row1['deleted']=='0')
// 	{
// 		$count++;
// 	}
// }



// echo $count;


$count=0;


function categoryChild($id) {
  ///get connection
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
        	$count=0;
            $id=$row1['id'];
            $childrens=categoryChild($id);
            

          

$a=array($id);
$keys = array_keys($childrens);
for($i = 0; $i < count($childrens ,COUNT_RECURSIVE); $i++) {
    
    array_push($a,$keys[$i]);
    foreach($childrens[$keys[$i]] as $key => $value) {
       
         array_push($a, $key);
    }
    
}


foreach ($a as $key => $value) {
	
	// echo $value."<br>";

	$sql="select * from knowledge_base_article_knowledge_base_category where knowledge_base_category_id='$value' and deleted='0'";
$result=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_assoc($result)) 
{
	$article_id=$row['knowledge_base_article_id'];

	// echo "article - ".$article_id." - id<br>";

	$sql2="select * from knowledge_base_article where id='$article_id'";
	$result2=mysqli_query($conn,$sql2);
	$row2=mysqli_fetch_assoc($result2);

	if($row2['deleted']=='0')
	{
		$count++;

	}
}






}
  $count = $count + 1 ;
  $sql2="update knowledge_base_category set articlecount='$count' where id='$id'";
            $result2=mysqli_query($conn,$sql2);
        }


?>

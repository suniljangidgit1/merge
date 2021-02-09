<?php
error_reporting(0);
//set timezone
date_default_timezone_set('UTC'); 


$id	=	$_GET['id'];

$json=true;
	
	//get connection
	include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');


	// $sql = "SELECT cl.listname,c.phone, c.created_at,c.list_id FROM contacts c INNER JOIN contact_list cl ON c.list_id = cl.id WHERE c.deleted = '0' AND cl.deleted = '0' AND c.list_id='".$id."'";


	// $result=mysqli_query($conn,$sql);
	// //$row=mysqli_fetch_array($result);
	// while($row = mysqli_fetch_assoc($result)) {
	// 	$created_at 		= 	$row['created_at'];
	// 	$listname 			= 	$row['listname'];
	// 	$contactlist[]		=	$row['phone'];
	// 	$list_id			=	$row['list_id'];
	// }

	// if(!$listname)
	// {
	// 	$sql = "SELECT id,listname FROM contact_list WHERE deleted = '0' AND id='".$id."'";


	// 	$result=mysqli_query($conn,$sql);
	// 	//$row=mysqli_fetch_array($result);
	// 	while($row = mysqli_fetch_assoc($result)) {
	// 		$listname = $row['listname'];
	// 		$list_id  = $row['id'];
	// 	}
	// }

	$sql = "SELECT id,listname FROM contact_list WHERE deleted = '0' AND id='".$id."'";


		$result=mysqli_query($conn,$sql);
		//$row=mysqli_fetch_array($result);
		while($row = mysqli_fetch_assoc($result)) {
			$listname = $row['listname'];
			$list_id  = $row['id'];
		}

	$data['list_id'] = $list_id;
	$data['list_name'] = $listname;

	
	//$contactlist 		= 	explode(',', $row['contactlist']);
	
// 	$output ='
// 	<button type="button" class="close" data-dismiss="modal">&times;</button>
// 	<h4 class="modal-title text-center">View Contact List :'.$listname.'</h4>
// 	</div>
// 	<div class="modal-body">

// 	<div class="container">
// 	<div class="row">
// 		<div class="col-md-8"></div>
// 		<div class="col-md-4">
// 			<button type="button" id="add_contacts" style="display: block;" class="btn btn-primary addContactsModal" onclick="showContactModel()"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;"></i>Add Contacts</button>
// 		</div>
// 	</div>
// 	<div class="row">
// 	<div class="col-xs-12 col-sm-12 col-md-12 ">
// 	<div class="list list-width mlr-0" style="margin-left: 0px;padding:15px;">
//     <table class="table table-bordered table-striped">
//         <thead class="schedularth">
//             <tr>
//             	<th style="width: 62px;">ID </th>
//                 <th>
//                          phones
                        
//                 </th>
//                 <th>
//                         Created At
                        
//                 </th>
//             </tr>
//         </thead>
//         <tbody class="schedulartb">
//             ';
//             $count = 1;

//             	foreach($contactlist as $contact )
//             	{
//             		$output1[] ='<tr data-id="bdwb1tly5dv2ddhup" class="list-row"><td>'.$count.'</td><td class="cell" data-name="listname">'.$contact.'</td><td class="cell" data-name="totalcontacts">
// 						    '.$created_at.'
// 						    </td>
// 			            </tr>';
// 			            $count++;
//             	}

			    

// $output2 ='     
//         </tbody>
//     </table>
// </div>

// <script>


// ';

// 	$data['data'] = $output.implode(' ', $output1).$output2;
	//$data['data'] = '';
	
	
echo json_encode($data);return;


?>
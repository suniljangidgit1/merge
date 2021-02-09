<?php error_reporting(0);
//CREATE CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$dbname 	= 	$dbname.'_config.php';
$filePath 	= 	$_SERVER['DOCUMENT_ROOT']."/data/".$dbname;

if( !empty($filePath) && file_exists($filePath) ){
    
    $listArr    = array();
	$filePath 	= 	include($filePath);

    if( !empty($filePath) ){
		$enitityArr 	= $filePath['tabList'];
	}
}

$output ='<select name="entity" class="form-control getEntityContactsEdit" id="getEntityContacts">
          <option value="select">Select Entity</option>';

          if( !empty($enitityArr) ) {

			    asort($enitityArr);
			    $expectForm = array("Case","ClosedTask","ContactList","Designation","EmailReminder","Estimate","Export","ExportResult","Invoice","MessageLog","MyCampaigns","OfficeLocation","Payments","SMSReminder","SentMessages","TestDemo", "HolidayCalender", "NSICData", "BillingEntity", "_delimiter_");
			    
			    foreach( $enitityArr as $key => $val ){

			    	if(!in_array($val, $expectForm)){

				        $table_name = strtolower(preg_replace('/\B([A-Z])/', '_$1', $val));
				        $result 	= checkRecored($table_name);
				        if($result > 0)
				        {
				        	$output .="<option value='".$table_name."'>".$val."</option>";
				        	
				        }
				    }
			    }
			}
$output .= '</select>';

$data['crmEntityList'] = $output;
echo json_encode($data);return;

function checkRecored($id)
{
	GLOBAL $conn;

	$sql 	= "SELECT pn.numeric FROM phone_number pn INNER JOIN entity_phone_number epn ON pn.id = epn.phone_number_id INNER JOIN $id ntbl ON ntbl.id = epn.entity_id WHERE epn.deleted = '0' AND pn.deleted = '0' AND ntbl.deleted = '0' ";

    $result = mysqli_query($conn, $sql);
    
    return mysqli_num_rows($result);
}
?>
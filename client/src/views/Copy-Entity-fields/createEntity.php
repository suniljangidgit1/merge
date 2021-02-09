<?php
	session_start();
	
	$original_name=$_POST['name'];
	$name= str_replace(' ', '', $_POST['name']);
	$color= $_POST['color'];
	$result = preg_replace('/\B([A-Z])/', '_$1', $name);
	
	//$type= $_POST['type'];
	$type="Company";
	$icon= $_POST['icon'];
	
	$project = explode('/', $_SERVER['REQUEST_URI'])[1];
	date_default_timezone_set('Asia/Kolkata');
	$stream= $_POST['stream'];
	$labelSingular=$_POST['labelSingular'];
	
	//// CODE FOR SAVE CREATED ENTITY DETAILS INTO DATABASE  //////////////
		//get connection
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

		
		mysqli_query($conn, "INSERT INTO entity_master (entity_name, table_name, created_at, created_by_id) values ('".$name."', '".strtolower($result)."', '".date('Y-m-d g:i:s')."', '".$_SESSION["Login"]."')");
		
	//// CODE FOR SAVE CREATED ENTITY DETAILS INTO DATABASE  //////////////

	////////////////////BASE CODE START ////////////////////////////////////////////////////////////////////////////////////////////
	
	$_SESSION["entity_type"]=$type;
	
	/* if($type=="Base"){
		
		//echo "Entity Type=".$_POST['type'];
		///// CREATE FOLDERS FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities", 0777, true);
		}
	
		///// CREATE Controllers FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForController1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.' extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name.".php","wb");
		fwrite($fp,$contentForController1);
		fclose($fp);
		
		$contentForController2 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.'Task extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name."Task.php","wb");
		fwrite($fp,$contentForController2);
		fclose($fp);
		
		///// CREATE Entities FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForEntity1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.' extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name.".php","wb");
		fwrite($fp,$contentForEntity1);
		fclose($fp);
		
		
		
		$contentForEntity2 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.'Task extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name."Task.php","wb");
		fwrite($fp,$contentForEntity2);
		fclose($fp);
		
		
		///// CREATE Global.json FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForGlobal='{
   "scopeNames":{
      "'.$name.'":"'.$name.'",
      "'.$name.'Task":"'.$name.' Task"
   },
   "scopeNamesPlural":{
     "'.$name.'":"'.$name.'s",
     "'.$name.'Task":"'.$name.' Tasks"
   }
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/Global.json","wb");
		fwrite($fp,$contentForGlobal);
		fclose($fp);
		
	///// CREATE JSON 1 in i18n/e_nUS FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
		
		$contentForJSON1= '{
   "labels":{
      "Create '.$name.'":"Create '.$name.'"
   },
   "fields":{
      "name":"Name",
      "status":"Status",
      "account":"Account"
   },
   "links":{
      "'.$name.'Tasks":"'.$name.' Tasks"
   }
}';
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name.".json","wb");
	fwrite($fp,$contentForJSON1);
	fclose($fp);
	
///// CREATE JSON 2 in i18n/e_nUS FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
		
	$contentForJSON2= '{
   "labels":{
      "Create '.$name.'Task":"Create '.$name.' Task"
   },
   "fields":{
      "name":"Name",
      "status":"Status",
      "'.strtolower($name).'":"'.$name.'",
      "dateStart":"Date Start",
      "dateEnd":"Date End",
      "estimatedEffort":"Estimated Effort (hrs)",
      "actualDuration":"Actual Duration (hrs)"
   }
}';
		
		
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name."Task.json","wb");
	fwrite($fp,$contentForJSON2);
	fclose($fp);
		
	
	///// CREATE JSON 1 in /metadata/clientDefs FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	if($icon=""){
		$contentForJSON_IN_METADATA_1= '{
  "controller": "Controllers.Record"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_1);
	fclose($fp);	
	}else{
		
		$contentForJSON_IN_METADATA_1= '{
  "controller": "Controllers.Record",
  "boolFilterList": [
        "onlyMy"
    ],
    "color": "#'.$color.'",
    "iconClass": "fa '.$_POST['icon'].'"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_1);
	fclose($fp);
		
	}
	
	
	///// CREATE JSON 2 in /metadata/clientDefs FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	

	$contentForJSON_IN_METADATA_2= '{
  "controller": "Controllers.Record"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name."Task.json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_2);
	fclose($fp);
	
	///// CREATE JSON 1 in /metadata/entityDefs FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	
	$contentForJSON_IN_METADATA_3= '{
   "fields":{
      "name":{
         "type":"varchar",
         "required":true
      },
      "status":{
         "type":"enum",
         "options":[
            "Draft",
            "Active",
            "Completed",
            "On Hold",
            "Dropped"
         ],
         "default":"Active"
      },
      "description":{
         "type":"text"
      },
      "account":{
         "type":"link"
      },
      "createdAt":{
         "type":"datetime",
         "readOnly":true
      },
      "modifiedAt":{
         "type":"datetime",
         "readOnly":true
      },
      "createdBy":{
         "type":"link",
         "readOnly":true
      },
      "modifiedBy":{
         "type":"link",
         "readOnly":true
      },
      "assignedUser":{
         "type":"link",
         "required":true
      },
      "teams":{
         "type":"linkMultiple"
      }
   },
   "links":{
      "createdBy":{
         "type":"belongsTo",
         "entity":"User"
      },
      "modifiedBy":{
         "type":"belongsTo",
         "entity":"User"
      },
      "assignedUser":{
         "type":"belongsTo",
         "entity":"User"
      },
      "teams":{
         "type":"hasMany",
         "entity":"Team",
         "relationName":"EntityTeam"
      },
      "account":{
         "type":"belongsTo",
         "entity":"Account",
         "foreign":"projects"
      },
      "projectTasks":{
         "type":"hasMany",
         "entity":"ProjectTask",
         "foreign":"project"
      }
   },
   "collection":{
      "sortBy":"createdAt",
      "asc":false,
      "boolFilters":[
         "onlyMy"
      ]
   }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name.".json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_3);
	fclose($fp);
	
	
	///// CREATE JSON 2 in /metadata/entityDefs FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	
	$contentForJSON_IN_METADATA_4= '{
   "fields":{
      "name":{
         "type":"varchar",
         "required":true
      },
      "status":{
         "type":"enum",
         "options":[
            "Not Started",
            "Started",
            "Completed",
            "Canceled"
         ],
         "default":"Not Started"
      },
      "dateStart":{
         "type":"date"
      },
      "dateEnd":{
         "type":"date"
      },
      "estimatedEffort":{
         "type":"float"
      },
      "actualDuration":{
         "type":"float"
      },
      "description":{
         "type":"text"
      },
      "project":{
         "type":"link"
      },
      "createdAt":{
         "type":"datetime",
         "readOnly":true
      },
      "modifiedAt":{
         "type":"datetime",
         "readOnly":true
      },
      "createdBy":{
         "type":"link",
         "readOnly":true
      },
      "modifiedBy":{
         "type":"link",
         "readOnly":true
      },
      "assignedUser":{
         "type":"link",
         "required":true
      },
      "teams":{
         "type":"linkMultiple"
      }
   },
   "links":{
      "createdBy":{
         "type":"belongsTo",
         "entity":"User"
      },
      "modifiedBy":{
         "type":"belongsTo",
         "entity":"User"
      },
      "assignedUser":{
         "type":"belongsTo",
         "entity":"User"
      },
      "teams":{
         "type":"hasMany",
         "entity":"Team",
         "relationName":"EntityTeam"
      },
      "project":{
         "type":"belongsTo",
         "entity":"Project",
         "foreign":"projectTasks"
      }
   },
   "collection":{
      "sortBy":"createdAt",
      "asc":false,
      "boolFilters":[
         "onlyMy"
      ]
   }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name."Task.json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_4);
	fclose($fp);


///// CREATE JSON 1 in /metadata/scopes FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
	if($stream==""){
	$contentForJSON_IN_METADATA_5= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": false,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_5);
	fclose($fp);
	
	}else{
		
		$contentForJSON_IN_METADATA_5= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": true,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_5);
	fclose($fp);
		
	}

///// CREATE JSON 2 in /metadata/scopes FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
	if($stream==""){
	$contentForJSON_IN_METADATA_6= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": false,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name."Task.json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_6);
	fclose($fp); 
	
	}else{
			
		$contentForJSON_IN_METADATA_6= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": true,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name."Task.json","wb");
	fwrite($fp,$contentForJSON_IN_METADATA_6);
	fclose($fp); 
		
	}
	
	/////////// COUNT NUMBER OF LINES IN CONFIG.PHP //////////////////////////////////////////////////////////////////////////////////
	
	$search      = "'tabList' => [";
	$line_number = false;
	
	if ($handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count = 0;
		while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
			$count++;
			$line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
		}
		fclose($handle);
	}
	
	$search1      = "'quickCreateList' => [";
	$line_number1 = false;
	if ($handle1 = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count1 = 0;
		while (($line1 = fgets($handle1, 4096)) !== FALSE and !$line_number1) {
			$count1++;
			$line_number1 = (strpos($line1, $search1) !== FALSE) ? $count1 : $line_number1;
		}
		fclose($handle1);
	}
	
	$total +=$line_number1 - $line_number;

	$lineNUmber += $total- 2;

	$lineToReplace = $line_number1-3;
	$lineToReplace2 =$lineToReplace+1;

	// ADD DATA INTO CONFIG.PHP FILE/ ////////////////////////////////////////////////////////
	$dataForconfig= ",".$lineNUmber." => '".$name."'";
		
		$filename=$_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php";
		$contents = file($filename);     
		$contents[$lineToReplace] = $contents[$lineToReplace] . "\n"; // Gives a new line
		file_put_contents($filename, implode('',$contents));
		$contents = file($filename);
		$contents[$lineToReplace2] = "".$dataForconfig."\n";
		file_put_contents($filename, implode('',$contents));
	
		header("location:/".$project."/#Admin/entityManager");
		
	}
	
	////////////////////BASE PLUS CODE START ////////////////////////////////////////////////////////////////////////////////////////////
	
	if($type=="BasePlus"){
        if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities", 0777, true);
		}
		
		// Create Controller 1 for Base Plus /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		$contentBasePlusForController1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.' extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name.".php","wb");
		fwrite($fp,$contentBasePlusForController1);
		fclose($fp);
		
		// Create Controller 2 for Base Plus /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentBasePlusForController2 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.'Task extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name."Task.php","wb");
		fwrite($fp,$contentBasePlusForController2);
		fclose($fp);
		
		
		///// CREATE Entities 1 FOR Base Plus CUSTOM  ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForBasePlusEntity1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.' extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name.".php","wb");
		fwrite($fp,$contentForBasePlusEntity1);
		fclose($fp);
		
		///// CREATE Entities 2 FOR Base Plus CUSTOM  ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForBasePlusEntity2 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.'Task extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name."Task.php","wb");
		fwrite($fp,$contentForBasePlusEntity2);
		fclose($fp);
		
		
		///// CREATE Global.json FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForBasePlusGlobal='{
   "scopeNames":{
      "'.$name.'":"'.$name.'",
      "'.$name.'Task":"'.$name.' Task"
   },
   "scopeNamesPlural":{
     "'.$name.'":"'.$name.'s",
     "'.$name.'Task":"'.$name.' Tasks"
   }
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/Global.json","wb");
		fwrite($fp,$contentForBasePlusGlobal);
		fclose($fp);
		
		
		///// CREATE JSON 1 in i18n/e_nUS FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
		
		$contentForBasePlusJSON1= '{
   "labels":{
      "Create '.$name.'":"Create '.$name.'"
   },
   "fields":{
      "name":"Name",
      "status":"Status",
      "account":"Account"
   },
   "links":{
      "'.$name.'Tasks":"'.$name.' Tasks"
   }
}';
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name.".json","wb");
	fwrite($fp,$contentForBasePlusJSON1);
	fclose($fp);
		
	///// CREATE JSON 2 in i18n/e_nUS FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
		
	$contentForBasePlusJSON2= '{
   "labels":{
      "Create '.$name.'Task":"Create '.$name.' Task"
   },
   "fields":{
      "name":"Name",
      "status":"Status",
      "'.strtolower($name).'":"'.$name.'",
      "dateStart":"Date Start",
      "dateEnd":"Date End",
      "estimatedEffort":"Estimated Effort (hrs)",
      "actualDuration":"Actual Duration (hrs)"
   }
}';
		
		
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name."Task.json","wb");
	fwrite($fp,$contentForBasePlusJSON2);
	fclose($fp);

	///// CREATE JSON 1 in /metadata/clientDefs FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	if($icon=""){
		
		$contentForBasePLusJSON_IN_METADATA_1= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForBasePLusJSON_IN_METADATA_1);
	fclose($fp);
		
	}else{
		$contentForBasePLusJSON_IN_METADATA_1= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    },
    "color": "#'.$color.'",
    "iconClass": "fas '.$_POST['icon'].'"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForBasePLusJSON_IN_METADATA_1);
	fclose($fp);
	}
	
	
	///// CREATE JSON 2 in /metadata/clientDefs FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	

//	$contentForBasePlusJSON_IN_METADATA_2= '{
//  "controller": "Controllers.Record"
//}';
	
//	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name."Task.json","wb");
//	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_2);
//	fclose($fp);
		
	///// CREATE JSON 1 in /metadata/entityDefs FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	
	$contentForBasePlusJSON_IN_METADATA_3= '{
    "fields": {
        "name": {
            "type": "varchar",
            "required": true,
            "trim": true
        },
        "description": {
            "type": "text"
        },
        "createdAt": {
            "type": "datetime",
            "readOnly": true
        },
        "modifiedAt": {
            "type": "datetime",
            "readOnly": true
        },
        "createdBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "modifiedBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "assignedUser": {
            "type": "link",
            "required": true,
            "view": "views/fields/assigned-user"
        },
        "teams": {
            "type": "linkMultiple",
            "view": "views/fields/teams"
        }
    },
    "links": {
        "createdBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "modifiedBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "assignedUser": {
            "type": "belongsTo",
            "entity": "User"
        },
        "teams": {
            "type": "hasMany",
            "entity": "Team",
            "relationName": "EntityTeam",
            "layoutRelationshipsDisabled": true
        },
        "meetings": {
            "type": "hasMany",
            "entity": "Meeting",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "calls": {
            "type": "hasMany",
            "entity": "Call",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "tasks": {
            "type": "hasChildren",
            "entity": "Task",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        }
    },
    "collection": {
        "sortBy": "createdAt",
        "asc": false
    },
    "indexes": {
        "name": {
            "columns": [
                "name",
                "deleted"
            ]
        },
        "assignedUser": {
            "columns": [
                "assignedUserId",
                "deleted"
            ]
        }
    }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name.".json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_3);
	fclose($fp);
	
	///// CREATE JSON 2 in /metadata/entityDefs FOR Base Plus CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
	
	
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name."Task.json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_3);
	fclose($fp);


	//// CREATE JSON 1 in /metadata/scopes FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
	if($stream==""){
	$contentForBasePlusJSON_IN_METADATA_5= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": false,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_5);
	fclose($fp);
	
	}else{
			
		$contentForBasePlusJSON_IN_METADATA_5= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": true,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_5);
	fclose($fp);	
	}
	

	///// CREATE JSON 2 in /metadata/scopes FOR CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////		
	if($stream==""){
	$contentForBasePlusJSON_IN_METADATA_6= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": false,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name."Task.json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_6);
	fclose($fp); 
	
	}else{
	
		$contentForBasePlusJSON_IN_METADATA_6= '{
    "entity": true,
    "layouts": true,
    "tab": false,
    "acl": true,
    "module": "'.$name.'",
    "customizable": true,
    "stream": true,
    "importable": true
}';

	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name."Task.json","wb");
	fwrite($fp,$contentForBasePlusJSON_IN_METADATA_6);
	fclose($fp); 
	
		
	}
	

	/////////// COUNT NUMBER OF LINES IN CONFIG.PHP //////////////////////////////////////////////////////////////////////////////////
	
	$search      = "'tabList' => [";
	$line_number = false;
	
	if ($handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count = 0;
		while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
			$count++;
			$line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
		}
		fclose($handle);
	}
	

	$search1      = "'quickCreateList' => [";
	$line_number1 = false;
	if ($handle1 = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count1 = 0;
		while (($line1 = fgets($handle1, 4096)) !== FALSE and !$line_number1) {
			$count1++;
			$line_number1 = (strpos($line1, $search1) !== FALSE) ? $count1 : $line_number1;
		}
		fclose($handle1);
	}
	
	$total +=$line_number1 - $line_number;
	$lineNUmber += $total- 2;
	$lineToReplace = $line_number1-3;
	$lineToReplace2 =$lineToReplace+1;

	// ADD DATA INTO CONFIG.PHP FILE/ ////////////////////////////////////////////////////////
	$dataForconfig= ",".$lineNUmber." => '".$name."'";
		
		$filename=$_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php";
		$contents = file($filename);     
		$contents[$lineToReplace] = $contents[$lineToReplace] . "\n"; // Gives a new line
		file_put_contents($filename, implode('',$contents));
		$contents = file($filename);
		$contents[$lineToReplace2] = "".$dataForconfig."\n";
		file_put_contents($filename, implode('',$contents));
	
		
		header('location:/'.$project.'/#Admin/entityManager');
	}
	
	////////////////////EVENT CODE START ////////////////////////////////////////////////////////////////////////////////////////////
	if($type=="Event"){
		/// Create Folder Structur for the Event Type Custom Entity ////////////////////////////////////////////////////////////////
		
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities", 0777, true);
		}
		
		/////// Create Controller for Event Type Entity ///////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForEventController1 ='<?php

namespace Finnova\Modules\\'.$name.'\\Controllers;

class '.$name.' extends \\Finnova\\Core\\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name.".php","wb");
		fwrite($fp,$contentForEventController1);
		fclose($fp);
		
		/////// Create Entities for Event Type Entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForEventEntity1 ='<?php

namespace Finnova\\Modules\\'.$name.'\\Entities;

class '.$name.' extends \\Finnova\\Core\\ORM\\Entity
{
   
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name.".php","wb");
		fwrite($fp,$contentForEventEntity1);
		fclose($fp);
		
		/////// Create layouts for Event Type Entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForEventLayout1 ='[
    {
        "label": "Overview",
        "rows": [
            [
                {
                    "name": "name"
                },
                {
                    "name": "parent"
                }
            ],
            [
                {
                    "name": "status"
                },
                false
            ],
            [
                {
                    "name": "dateStart"
                },
                {
                    "name": "dateEnd"
                }
            ],
            [
                {
                    "name": "duration"
                },
                {
                    "name": "reminders"
                }
            ],
            [
                {
                    "name": "description",
                    "fullWidth": true
                }
            ]
        ]
    }
]';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detail.json","wb");
		fwrite($fp,$contentForEventLayout1);
		fclose($fp);
		
		/////// Create layouts for Event Type Entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForEventLayout2= '[
    {
        "label": "",
        "rows": [
            [
                {
                    "name": "name",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "status",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "dateStart",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "duration",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "dateEnd",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "parent",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "description",
                    "fullWidth": true
                }
            ]
        ]
    }
]'; 
		 
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detailSmall.json","wb");
		fwrite($fp,$contentForEventLayout2);
		fclose($fp);
		
		
		///// CREATE Global.json FOR Event CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForEventGlobal='{
    "scopeNames": {
        "'.$name.'": "'.$name.'"
    },
    "scopeNamesPlural": {
        "'.$name.'": "'.$name.'s"
    }
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/Global.json","wb");
		fwrite($fp,$contentForEventGlobal);
		fclose($fp);
		
		
		///// CREATE JSON 1 in i18n/en_US FOR Event CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
		
		$contentForEventJSON1= '{
    "fields": {
        "parent": "Parent",
        "dateStart": "Date Start",
        "dateEnd": "Date End",
        "duration": "Duration",
        "status": "Status",
        "reminders": "Reminders"
    },
    "links": {
        "parent": "Parent"
    },
    "options": {
        "status": {
            "Planned": "Planned",
            "Held": "Held",
            "Not Held": "Not Held"
        }
    },
    "labels": {
        "Create '.$name.'": "Create '.$name.'",
        "Schedule '.$name.'": "Schedule '.$name.'",
        "Log '.$name.'": "Log '.$name.'",
        "Set Held": "Set Held",
        "Set Not Held": "Set Not Held"
    },
    "massActions": {
        "setHeld": "Set Held",
        "setNotHeld": "Set Not Held"
    },
    "presetFilters": {
        "planned": "Planned",
        "held": "Held",
        "todays": "Todays"
    }
}
';
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON1);
	fclose($fp);
		
		
	/////// Create Json File in metadata/ClientDefs for Event Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($icon=""){
	$contentForEventJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "recordViews": {
        "detail": "views/templates/event/record/detail"
    },
    "activityDefs": {
        "activitiesCreate": true,
        "historyCreate": true
    },
    "filterList": [
        {
            "name": "planned"
        },
        {
            "name": "held",
            "style": "success"
        },
        {
            "name": "todays"
        }
    ]
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON_IN_METADATA_2);
	fclose($fp);	
	}else{
	
		$contentForEventJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "recordViews": {
        "detail": "views/templates/event/record/detail"
    },
    "activityDefs": {
        "activitiesCreate": true,
        "historyCreate": true
    },
    "filterList": [
        {
            "name": "planned"
        },
        {
            "name": "held",
            "style": "success"
        },
        {
            "name": "todays"
        }
    ],
    "color": "#'.$color.'",
    "iconClass": "fas '.$_POST['icon'].'"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON_IN_METADATA_2);
	fclose($fp);	
	}	
		
		
		/////// Create Json File in metadata/entityDefs for Event Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	$contentForEventJSON_IN_METADATA_3= '{
    "fields": {
        "name": {
            "type": "varchar",
            "required": true,
            "trim": true
        },
        "status": {
            "type": "enum",
            "options": [
                "Planned",
                "Held",
                "Not Held"
            ],
            "default": "Planned",
            "view": "views/fields/enum-styled",
            "style": {
                "Held": "success"
            },
            "audited": true
        },
        "dateStart": {
            "type": "datetime",
            "required": true,
            "default": "javascript: return this.dateTime.getNow(15);",
            "audited": true
        },
        "dateEnd": {
            "type": "datetime",
            "required": true,
            "after": "dateStart"
        },
        "duration": {
            "type": "duration",
            "start": "dateStart",
            "end": "dateEnd",
            "options": [
                300,
                600,
                900,
                1800,
                2700,
                3600,
                7200
            ],
            "default": 300,
            "notStorable": true,
            "select": "TIMESTAMPDIFF(SECOND, '.strtolower($result).'.date_start, '.strtolower($result).'.date_end)",
            "orderBy": "duration {direction}"
        },
        "parent": {
            "type": "linkParent",
            "entityList": [
                "Account",
                "Lead",
                "Contact"
            ]
        },
        "description": {
            "type": "text"
        },
        "reminders": {
            "type": "jsonArray",
            "notStorable": true,
            "view": "crm:views/meeting/fields/reminders",
            "layoutListDisabled": true
        },
        "createdAt": {
            "type": "datetime",
            "readOnly": true
        },
        "modifiedAt": {
            "type": "datetime",
            "readOnly": true
        },
        "createdBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "modifiedBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "assignedUser": {
            "type": "link",
            "required": false,
            "view": "views/fields/assigned-user"
        },
        "teams": {
            "type": "linkMultiple",
            "view": "views/fields/teams"
        }
    },
    "links": {
        "parent": {
            "type": "belongsToParent"
        },
        "createdBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "modifiedBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "assignedUser": {
            "type": "belongsTo",
            "entity": "User"
        },
        "teams": {
            "type": "hasMany",
            "entity": "Team",
            "relationName": "EntityTeam",
            "layoutRelationshipsDisabled": true
        }
    },
    "collection": {
        "sortBy": "dateStart",
        "asc": false
    },
    "indexes": {
        "dateStartStatus": {
            "columns": [
                "dateStart",
                "status"
            ]
        },
        "dateStart": {
            "columns": [
                "dateStart",
                "deleted"
            ]
        },
        "status": {
            "columns": [
                "status",
                "deleted"
            ]
        },
        "assignedUser": {
            "columns": [
                "assignedUserId",
                "deleted"
            ]
        },
        "assignedUserStatus": {
            "columns": [
                "assignedUserId",
                "status"
            ]
        }
    }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON_IN_METADATA_3);
	fclose($fp);
	
	
		/////// Create Json File in metadata/scopes for Event Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($stream==""){
	$contentForEventJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "calendar": true,
    "activity": true,
    "notifications": true,
    "activityStatusList": [
        "Planned"
    ],
    "historyStatusList": [
        "Held",
        "Not Held"
    ],
    "statusField": "status",
    "stream": false,
    "disabled": false,
    "type": "Event",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON_IN_METADATA_4);
	fclose($fp);
	
	
	}else{
		
		$contentForEventJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "calendar": true,
    "activity": true,
    "notifications": true,
    "activityStatusList": [
        "Planned"
    ],
    "historyStatusList": [
        "Held",
        "Not Held"
    ],
    "statusField": "status",
    "stream": true,
    "disabled": false,
    "type": "Event",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
	fwrite($fp,$contentForEventJSON_IN_METADATA_4);
	fclose($fp);
	
	}
		/////////// COUNT NUMBER OF LINES IN CONFIG.PHP //////////////////////////////////////////////////////////////////////////////////
	
	$search      = "'tabList' => [";
	$line_number = false;
	
	if ($handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count = 0;
		while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
			$count++;
			$line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
		}
		fclose($handle);
	}
	

	$search1      = "'quickCreateList' => [";
	$line_number1 = false;
	if ($handle1 = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count1 = 0;
		while (($line1 = fgets($handle1, 4096)) !== FALSE and !$line_number1) {
			$count1++;
			$line_number1 = (strpos($line1, $search1) !== FALSE) ? $count1 : $line_number1;
		}
		fclose($handle1);
	}
	
	$total +=$line_number1 - $line_number;
	$lineNUmber += $total- 2;
	$lineToReplace = $line_number1-3;
	$lineToReplace2 =$lineToReplace+1;

	// ADD DATA INTO CONFIG.PHP FILE/ ////////////////////////////////////////////////////////
	$dataForconfig= ",".$lineNUmber." => '".$name."'";
		
		$filename=$_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php";
		$contents = file($filename);     
		$contents[$lineToReplace] = $contents[$lineToReplace] . "\n"; // Gives a new line
		file_put_contents($filename, implode('',$contents));
		$contents = file($filename);
		$contents[$lineToReplace2] = "".$dataForconfig."\n";
		file_put_contents($filename, implode('',$contents));
	
		
		header('location:/'.$project.'/#Admin/entityManager');
	}
	 */
	
	////////////////////COMPANY CODE START ////////////////////////////////////////////////////////////////////////////////////////////
	
	if($type=="Company"){
        
		/// Create Folder Structur for the Event Type Custom Entity ////////////////////////////////////////////////////////////////
		
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities", 0777, true);
		}
		
		/////// Create Controller for Company Type Entity ///////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForCompanyController1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.' extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name.".php","wb");
		fwrite($fp,$contentForCompanyController1);
		fclose($fp);
		
		
		/////// Create Entities for Company Type Entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForCompanyEntity1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.' extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name.".php","wb");
		fwrite($fp,$contentForCompanyEntity1);
		fclose($fp);
		
		///// CREATE Global.json FOR Company CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForCompanyGlobal='{
   "scopeNames":{
      "'.$name.'":"'.$original_name.'"
     
   },
   "scopeNamesPlural":{
     "'.$name.'":"'.$original_name.'"
     
   }
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/Global.json","wb");
		fwrite($fp,$contentForCompanyGlobal);
		fclose($fp);
		
		
		///// CREATE JSON 1 in i18n/en_US FOR Company CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
		
		$contentForCompanyJSON1= '{
    "fields": {
        "billingAddress": "Billing Address",
        "shippingAddress": "Shipping Address",
        "website": "Website"
    },
    "links": {
        "meetings": "Meetings",
        "calls": "Calls",
        "tasks": "Tasks"
    },
    "labels": {
        "Create '.$name.'": "Create '.$name.'"
    }
}
';
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name.".json","wb");
		fwrite($fp,$contentForCompanyJSON1);
		fclose($fp);
		
		
		//// Create Layouts for Company Entity ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForCompanyLayout1= '[
    {
        "label": "Overview",
        "rows": [
            [
                {
                    "name": "name"
                },
                {
                    "name": "website"
                }
            ],
            [
                {
                    "name": "emailAddress"
                },
                {
                    "name": "phoneNumber"
                }
            ],
            [
                {
                    "name": "billingAddress"
                },
                {
                    "name": "shippingAddress"
                }
            ],
            [
                {
                    "name": "description",
                    "fullWidth": true
                }
            ]
        ]
    }
]';
		
		
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detail.json","wb");
		fwrite($fp,$contentForCompanyLayout1);
		fclose($fp);
		
		$contentForCompanyLayout2 = '[
    {
        "label": "",
        "rows": [
            [
                {
                    "name": "name",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "website",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "emailAddress",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "phoneNumber",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "billingAddressCountry",
                    "fullWidth": true
                }
            ]
        ]
    }
]';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detailSmall.json","wb");
		fwrite($fp,$contentForCompanyLayout2);
		fclose($fp);
		
		
		/////// Create Json File in metadata/ClientDefs for Company Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($icon=""){
		$contentForCompanyJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForCompanyJSON_IN_METADATA_2);
	fclose($fp);	
		
	}else{
		$contentForCompanyJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    },
    "color": "#'.$color.'",
    "iconClass": "fas '.$_POST['icon'].'"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForCompanyJSON_IN_METADATA_2);
	fclose($fp);
		
	}
	
		
		
		/////// Create Json File in metadata/entityDefs for Company Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
		$contentForCompanyJSON_IN_METADATA_3= '{
    "fields": {
        "name": {
            "type": "varchar",
            "required": true,
            "trim": true
        },
        "description": {
            "type": "text"
        },
        "website": {
            "type": "url"
        },
        "emailAddress": {
            "type": "email"
        },
        "phoneNumber": {
            "type": "phone",
            "typeList": [
                "Office",
                "Mobile",
                "Fax",
                "Other"
            ],
            "defaultType": "Office"
        },
        "billingAddress": {
            "type": "address"
        },
        "billingAddressStreet": {
            "type": "text",
            "maxLength": 255,
            "dbType": "varchar"
        },
        "billingAddressCity": {
            "type": "varchar",
            "trim": true
        },
        "billingAddressState": {
            "type": "varchar",
            "trim": true
        },
        "billingAddressCountry": {
            "type": "varchar",
            "trim": true
        },
        "billingAddressPostalCode": {
            "type": "varchar",
            "trim": true
        },
        "shippingAddress": {
            "type": "address",
            "view": "crm:views/account/fields/shipping-address"
        },
        "shippingAddressStreet": {
            "type": "text",
            "maxLength": 255,
            "dbType": "varchar"
        },
        "shippingAddressCity": {
            "type": "varchar",
            "trim": true
        },
        "shippingAddressState": {
            "type": "varchar",
            "trim": true
        },
        "shippingAddressCountry": {
            "type": "varchar",
            "trim": true
        },
        "shippingAddressPostalCode": {
            "type": "varchar",
            "trim": true
        },
        "createdAt": {
            "type": "datetime",
            "readOnly": true
        },
        "modifiedAt": {
            "type": "datetime",
            "readOnly": true
        },
        "createdBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "modifiedBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "assignedUser": {
            "type": "link",
            "required": false,
            "view": "views/fields/assigned-user"
        },
        "teams": {
            "type": "linkMultiple",
            "view": "views/fields/teams"
        }
    },
    "links": {
        "createdBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "modifiedBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "assignedUser": {
            "type": "belongsTo",
            "entity": "User"
        },
        "teams": {
            "type": "hasMany",
            "entity": "Team",
            "relationName": "EntityTeam",
            "layoutRelationshipsDisabled": true
        },
        "meetings": {
            "type": "hasMany",
            "entity": "Meeting",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "calls": {
            "type": "hasMany",
            "entity": "Call",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "tasks": {
            "type": "hasChildren",
            "entity": "Task",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        }
    },
    "collection": {
        "sortBy": "createdAt",
        "asc": false
    },
    "indexes": {
        "name": {
            "columns": [
                "name",
                "deleted"
            ]
        },
        "assignedUser": {
            "columns": [
                "assignedUserId",
                "deleted"
            ]
        }
    }
}';
	
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name.".json","wb");
		fwrite($fp,$contentForCompanyJSON_IN_METADATA_3);
		fclose($fp);	
		
		/////// Create Json File in metadata/scopes for Company Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		if($stream==""){	
		$contentForCompanyJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "notifications": true,
    "stream": false,
    "disabled": false,
    "type": "Company",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
		fwrite($fp,$contentForCompanyJSON_IN_METADATA_4);
		fclose($fp);
		
	}else{
			
		$contentForCompanyJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "notifications": true,
    "stream": true,
    "disabled": false,
    "type": "Company",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
		fwrite($fp,$contentForCompanyJSON_IN_METADATA_4);
		fclose($fp);	
	}		
		
		/////////// COUNT NUMBER OF LINES IN CONFIG.PHP //////////////////////////////////////////////////////////////////////////////////
	
	$search      = "'tabList' => [";
	$line_number = false;
	
	if ($handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count = 0;
		while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
			$count++;
			$line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
		}
		fclose($handle);
	}
	

	$search1      = "'quickCreateList' => [";
	$line_number1 = false;
	if ($handle1 = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count1 = 0;
		while (($line1 = fgets($handle1, 4096)) !== FALSE and !$line_number1) {
			$count1++;
			$line_number1 = (strpos($line1, $search1) !== FALSE) ? $count1 : $line_number1;
		}
		fclose($handle1);
	}
	
	$total +=$line_number1 - $line_number;
	$lineNUmber += $total- 2;
	$lineToReplace = $line_number1-3;
	$lineToReplace2 =$lineToReplace+1;

    // ADD DATA INTO CONFIG.PHP FILE/ ////////////////////////////////////////////////////////
	$dataForconfig= ",".$lineNUmber." => '".$name."'";
		
		$filename=$_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php";
		$contents = file($filename);     
		$contents[$lineToReplace] = $contents[$lineToReplace] . "\n"; // Gives a new line
		file_put_contents($filename, implode('',$contents));
		$contents = file($filename);
		$contents[$lineToReplace2] = "".$dataForconfig."\n";
		file_put_contents($filename, implode('',$contents));
	
		
		header('location:/DEMO_CRM/client/src/views/Copy-Entity-fields/copyFields.php');	
	
	}
		
	
	
	/* ////////////////////PERSON CODE START ////////////////////////////////////////////////////////////////////////////////////////////
	
	if($type=="Person"){
	
        /// Create Folder Structur for the Person Type Custom Entity ////////////////////////////////////////////////////////////////
		
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Controllers", 0777, true);
		}
		if (!file_exists($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities")) {
			mkdir($_SERVER['DOCUMENT_ROOT']."/".$project."/application/Finnova/Modules/".$name."/Entities", 0777, true);
		}
		
		
		/////// Create Controller for Person Type Entity ///////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForPersonController1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Controllers;
 
class '.$name.' extends \Finnova\Core\Controllers\Record
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Controllers/".$name.".php","wb");
		fwrite($fp,$contentForPersonController1);
		fclose($fp);
		
		
		
		/////// Create Entities for Person Type Entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForPersonEntity1 ='<?php
 
namespace Finnova\\Modules\\'.$name.'\\Entities;
 
class '.$name.' extends \Finnova\Core\ORM\Entity
{
}';
			
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Entities/".$name.".php","wb");
		fwrite($fp,$contentForPersonEntity1);
		fclose($fp);
		
		
		///// CREATE Global.json FOR Person CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////
		
		
		$contentForPersonGlobal='{
   "scopeNames":{
      "'.$name.'":"'.$name.'"
     
   },
   "scopeNamesPlural":{
     "'.$name.'":"'.$name.'s"
     
   }
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/Global.json","wb");
		fwrite($fp,$contentForPersonGlobal);
		fclose($fp);
		
		///// CREATE JSON 1 in i18n/en_US FOR Person CUSTOM ENTITY //////////////////////////////////////////////////////////////////////////////////////////////	
		
		$contentForPersonJSON1= '{
    "fields": {
        "address": "Address"
    },
    "links": {
        "meetings": "Meetings",
        "calls": "Calls",
        "tasks": "Tasks"
    },
    "labels": {
        "Create '.$name.'": "Create '.$name.'"
    }
}

';
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/i18n/en_US/".$name.".json","wb");
		fwrite($fp,$contentForPersonJSON1);
		fclose($fp);
		
		
		//// Create Layout for Person Entity ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		$contentForPersonLayout1 ='[
    {
        "label": "Overview",
        "rows": [
            [
                {
                    "name": "name"
                },
                false
            ],
            [
                {
                    "name": "emailAddress"
                },
                {
                    "name": "phoneNumber"
                }
            ],
            [
                {
                    "name": "address"
                },
                false
            ],
            [
                {
                    "name": "description",
                    "fullWidth": true
                }
            ]
        ]
    }
]';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detail.json","wb");
		fwrite($fp,$contentForPersonLayout1);
		fclose($fp);
		
		$contentForPersonLayout2 ='[
    {
        "label": "",
        "rows": [
            [
                {
                    "name": "name",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "emailAddress",
                    "fullWidth": true
                }
            ],
            [
                {
                    "name": "phoneNumber",
                    "fullWidth": true
                }
            ]
        ]
    }
]';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/layouts/".$name."/detailSmall.json","wb");
		fwrite($fp,$contentForPersonLayout2);
		fclose($fp);
		
		
		/////// Create Json File in metadata/ClientDefs for Person Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($icon=""){
		$contentForPersonJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    }
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForPersonJSON_IN_METADATA_2);
	fclose($fp);
		
	}else{
		
	$contentForPersonJSON_IN_METADATA_2= '{
    "controller": "controllers/record",
    "boolFilterList": [
        "onlyMy"
    ],
    "sidePanels": {
        "detail": [
            {
                "name": "activities",
                "label": "Activities",
                "view": "crm:views/record/panels/activities",
                "aclScope": "Activities"
            },
            {
                "name": "history",
                "label": "History",
                "view": "crm:views/record/panels/history",
                "aclScope": "Activities"
            },
            {
                "name": "tasks",
                "label": "Tasks",
                "view": "crm:views/record/panels/tasks",
                "aclScope": "Task"
            }
        ]
    },
    "color": "#'.$color.'",
    "iconClass": "fas '.$_POST['icon'].'"
}';
	
	$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/clientDefs/".$name.".json","wb");
	fwrite($fp,$contentForPersonJSON_IN_METADATA_2);
	fclose($fp);
		
	}	
		/////// Create Json File in metadata/entityDefs for Person Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
		$contentForPersonJSON_IN_METADATA_3= '{
    "fields": {
        "name": {
            "type": "personName",
            "isPersonalData": true
        },
        "salutationName": {
            "type": "enum",
            "options": [
                "",
                "Mr.",
                "Ms.",
                "Mrs.",
                "Dr."
            ]
        },
        "firstName": {
            "type": "varchar",
            "maxLength": 100,
            "default": "",
            "trim": true
        },
        "lastName": {
            "type": "varchar",
            "maxLength": 100,
            "required": true,
            "default": "",
            "trim": true
        },
        "description": {
            "type": "text"
        },
        "emailAddress": {
            "type": "email",
            "isPersonalData": true
        },
        "phoneNumber": {
            "type": "phone",
            "typeList": [
                "Mobile",
                "Office",
                "Home",
                "Fax",
                "Other"
            ],
            "defaultType": "Mobile",
            "isPersonalData": true
        },
        "address": {
            "type": "address",
            "isPersonalData": true
        },
        "addressStreet": {
            "type": "text",
            "maxLength": 255,
            "dbType": "varchar"
        },
        "addressCity": {
            "type": "varchar",
            "trim": true
        },
        "addressState": {
            "type": "varchar",
            "trim": true
        },
        "addressCountry": {
            "type": "varchar",
            "trim": true
        },
        "addressPostalCode": {
            "type": "varchar",
            "trim": true
        },
        "createdAt": {
            "type": "datetime",
            "readOnly": true
        },
        "modifiedAt": {
            "type": "datetime",
            "readOnly": true
        },
        "createdBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "modifiedBy": {
            "type": "link",
            "readOnly": true,
            "view": "views/fields/user"
        },
        "assignedUser": {
            "type": "link",
            "required": false,
            "view": "views/fields/assigned-user"
        },
        "teams": {
            "type": "linkMultiple",
            "view": "views/fields/teams"
        }
    },
    "links": {
        "createdBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "modifiedBy": {
            "type": "belongsTo",
            "entity": "User"
        },
        "assignedUser": {
            "type": "belongsTo",
            "entity": "User"
        },
        "teams": {
            "type": "hasMany",
            "entity": "Team",
            "relationName": "EntityTeam",
            "layoutRelationshipsDisabled": true
        },
        "meetings": {
            "type": "hasMany",
            "entity": "Meeting",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "calls": {
            "type": "hasMany",
            "entity": "Call",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        },
        "tasks": {
            "type": "hasChildren",
            "entity": "Task",
            "foreign": "parent",
            "layoutRelationshipsDisabled": true
        }
    },
    "collection": {
        "sortBy": "createdAt",
        "asc": false
    },
    "indexes": {
        "firstName": {
            "columns": [
                "firstName",
                "deleted"
            ]
        },
        "name": {
            "columns": [
                "firstName",
                "lastName"
            ]
        },
        "assignedUser": {
            "columns": [
                "assignedUserId",
                "deleted"
            ]
        }
    }
}';
	
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/entityDefs/".$name.".json","wb");
		fwrite($fp,$contentForPersonJSON_IN_METADATA_3);
		fclose($fp);	
		
		/////// Create Json File in metadata/scopes for Person Custom entity ////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	if($stream==""){
		
        $contentForPersonJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "notifications": true,
    "hasPersonalData": true,
    "stream": false,
    "disabled": false,
    "type": "Person",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
		fwrite($fp,$contentForPersonJSON_IN_METADATA_4);
		fclose($fp);
		
		
		
	}else{
		
		$contentForPersonJSON_IN_METADATA_4= '{
    "entity": true,
    "layouts": true,
    "tab": true,
    "acl": true,
    "aclPortal": true,
    "aclPortalLevelList": [
        "all",
        "account",
        "contact",
        "own",
        "no"
    ],
    "customizable": true,
    "importable": true,
    "notifications": true,
    "hasPersonalData": true,
    "stream": true,
    "disabled": false,
    "type": "Person",
    "module": "'.$name.'",
    "object": true,
    "isCustom": true
}';
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/application/Finnova/Modules/".$name."/Resources/metadata/scopes/".$name.".json","wb");
		fwrite($fp,$contentForPersonJSON_IN_METADATA_4);
		fclose($fp);
		
		
	}
	
		
		
		/////////// COUNT NUMBER OF LINES IN CONFIG.PHP //////////////////////////////////////////////////////////////////////////////////
	
	$search      = "'tabList' => [";
	$line_number = false;
	
	if ($handle = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count = 0;
		while (($line = fgets($handle, 4096)) !== FALSE and !$line_number) {
			$count++;
			$line_number = (strpos($line, $search) !== FALSE) ? $count : $line_number;
		}
		fclose($handle);
	}
	

	
	$search1      = "'quickCreateList' => [";
	$line_number1 = false;
	if ($handle1 = fopen($_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php", "r")) {
		$count1 = 0;
		while (($line1 = fgets($handle1, 4096)) !== FALSE and !$line_number1) {
			$count1++;
			$line_number1 = (strpos($line1, $search1) !== FALSE) ? $count1 : $line_number1;
		}
		fclose($handle1);
	}
	
	$total +=$line_number1 - $line_number;
	$lineNUmber += $total- 2;
	$lineToReplace = $line_number1-3;
	$lineToReplace2 =$lineToReplace+1;

	// ADD DATA INTO CONFIG.PHP FILE/ ////////////////////////////////////////////////////////
	$dataForconfig= ",".$lineNUmber." => '".$name."'";
		
		$filename=$_SERVER['DOCUMENT_ROOT'] . "/".$project."/data/config.php";
		$contents = file($filename);     
		$contents[$lineToReplace] = $contents[$lineToReplace] . "\n"; // Gives a new line
		file_put_contents($filename, implode('',$contents));
		$contents = file($filename);
		$contents[$lineToReplace2] = "".$dataForconfig."\n";
		file_put_contents($filename, implode('',$contents));
		
		
		header('location:/'.$project.'/#Admin/entityManager');	
	}  */
	
?>
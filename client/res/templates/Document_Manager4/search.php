<?php
    session_start();
    $userName= $_SESSION['Login'];
    $key=$_GET['key'];
    $array = array();

   // $array[]=$key;
   // $array1 = array();

  //get connection
  include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');
  $con=$conn;
    // $con=mysqli_connect('localhost', 'root', 'root', 'fincrm');;

    // $conn=mysqli_connect('localhost', 'root', 'root', 'fincrm');;

    $res= mysqli_query($con, "select * from user where user_name='".$userName."'");
    $r= mysqli_fetch_array($res);

    $is_admin= $r['is_admin'];

   // $array[]= $is_admin;

    if($is_admin==1){
        $query=mysqli_query($con, "select * from folder_master_3 where folder_name LIKE '%{$key}%'");
        //$array[]=$userName;
        while($row=mysqli_fetch_assoc($query))
        {
          $array[] = "<a href='#' id='folderMaster' onclick='goToIndexPage()'>".$row['folder_name']."</a>";
        }
        
        $query1= mysqli_query($con, "select * from sub_folder_master_3 where folder_name LIKE '%{$key}%'");
        while ($row1= mysqli_fetch_array($query1)){
            $array[] = "<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$row1['folder_master_id'].")'>".$row1['folder_name']."</a>";
        }

        $query2= mysqli_query($con, "select * from document_master_3 where document_name LIKE '%{$key}%'");
        while($row2= mysqli_fetch_array($query2)){
            $array[] = "<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$row2['folder_id'].")'>".$row2['document_name']."</a>";
        }    
    }else{

        $resForFodlerMaster= mysqli_query($con, "select * from folder_master where folder_name LIKE '%{$key}%'");

        $rowForFolderMaster= mysqli_fetch_array($resForFodlerMaster);
        $assigned_users= $rowForFolderMaster['assigned_user_id'];
        $created_user_id= $rowForFolderMaster['created_user_id'];
        $arrForAssignedUsers= explode(",", $assigned_users);

        if(in_array($userName, $arrForAssignedUsers)){
             $resForGetDataFromFolderMasterToUsers= mysqli_query($con, "select * from folder_master where folder_name LIKE '%{$key}%'");
             $rowForGetDataFormFolderMaster= mysqli_fetch_array($resForGetDataFromFolderMasterToUsers);
             if($rowForGetDataFormFolderMaster['folder_name']!=""){
                $array[]= "<a href='#' id='folderMaster' onclick='goToIndexPage()'>".$rowForGetDataFormFolderMaster['folder_name']."</a>";   
             }
             

        }else{
            $resForGetDataFromFolderMasterToUsers1= mysqli_query($con, "select * from folder_master where folder_name LIKE '%{$key}%' AND created_user_id='".$userName."'");
            $resForGetDataFromFolderMaster1 = mysqli_fetch_array($resForGetDataFromFolderMasterToUsers1);

            if($resForGetDataFromFolderMaster1['folder_name']!=""){
                $array[]= "<a href='#' id='folderMaster' onclick='goToIndexPage()'>".$resForGetDataFromFolderMaster1['folder_name']."</a>";    
            }

            
        }

         $resForUsers1= mysqli_query($con, "select * from sub_folder_master where folder_name LIKE '%{$key}%'");
         $rowForUser1= mysqli_fetch_array($resForUsers1);
         $assigned_users1= $rowForUser1['assigned_user_id'];
         $created_user_id1= $rowForUser1['created_user_id'];
         $arrForAssignedUsers1= explode(",", $assigned_users1);

         if(in_array($userName, $arrForAssignedUsers1)){

            $resForGetFromSubFolderMasterToUser= mysqli_query($con, "select * from sub_folder_master where folder_name LIKE '%{$key}%'");
            $rowForGetDataFromSubFolderMasterToUsers= mysqli_fetch_array($resForGetFromSubFolderMasterToUser); 
            if($rowForGetDataFromSubFolderMasterToUsers['folder_name']!=""){

             $array[]= "<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetDataFromSubFolderMasterToUsers['folder_master_id'].")'>".$rowForGetDataFromSubFolderMasterToUsers['folder_name']."</a>";
            }

         }else{

            $resForGetFromSubFolderMasterToUser1= mysqli_query($con, "select * from sub_folder_master where folder_name LIKE '%{$key}%' AND created_user_id='".$created_user_id1."'");
            $rowForGetDataFromSubFolderMasterToUsers1= mysqli_fetch_array($resForGetFromSubFolderMasterToUser1); 
            if($rowForGetDataFromSubFolderMasterToUsers1['folder_name']!=""){

             $array[]= "<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetDataFromSubFolderMasterToUsers1['folder_master_id'].")'>".$rowForGetDataFromSubFolderMasterToUsers1['folder_name']."</a>";
            }
         }


          $resForUsers2= mysqli_query($con, "select * from document_master where document_name LIKE '%{$key}%'");
          $rowForUser2= mysqli_fetch_array($resForUsers2);

          $assigned_users2= $rowForUser2['assigned_user_id'];
          $created_user_id2= $rowForUser2['created_user_id'];
          $arrForAssignedUsers2= explode(",", $assigned_users2);

          if(in_array($userName, $arrForAssignedUsers2)){
                $resForGetFromDocumentMasterToUser= mysqli_query($con, "select * from document_master where document_name LIKE '%{$key}%'");
                $rowForGetFromDocumentMasterToUser= mysqli_fetch_array($resForGetFromDocumentMasterToUser);
                if($rowForGetFromDocumentMasterToUser['document_name']!=""){
                    $array[]="<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetFromDocumentMasterToUser['folder_id'].")'>".$rowForGetFromDocumentMasterToUser['document_name']."</a>";      
                }
                
          }else{
                $resForGetFromDocumentMasterToUser1= mysqli_query($con, "select * from document_master where document_name LIKE '%{$key}%' AND created_user_id='".$created_user_id2."'");
                $rowForGetFromDocumentMasterToUser1= mysqli_fetch_array($resForGetFromDocumentMasterToUser1);
                if($rowForGetFromDocumentMasterToUser1['document_name']!=""){
                    $array[]="<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetFromDocumentMasterToUser1['folder_id'].")'>".$rowForGetFromDocumentMasterToUser1['document_name']."</a>";
                }
                 
          }
    }
    
    // if($is_admin==0){
    //   // $array[] = "Working on it";

    //     $resForUsers= mysqli_query($con, "select * from folder_master_3 where folder_name LIKE '%{$key}%'");

    //     $rowForUser= mysqli_fetch_array($resForUsers);
    //     $assigned_users= $rowForUser['assigned_user_id'];

    //     $arrForAssignedUsers= explode(",", $assigned_users);
    //     //$array[]= $assigned_users;
    //     if(in_array($userName, $arrForAssignedUsers)){
    //         $resForGetDataFromFolderMasterToUsers= mysqli_query($con, "select * from folder_master_3 where folder_name LIKE '%{$key}%'");

    //         $rowForGetDataFromFolderMasterToUsers = mysqli_fetch_array($resForGetDataFromFolderMasterToUsers);

    //         $array[]= "<a href='#' id='folderMaster' onclick='goToIndexPage()'>".$rowForGetDataFromFolderMasterToUsers['folder_name']."</a>";
    //     }

    //     $resForUsers1= mysqli_query($con, "select * from sub_folder_master_3 where folder_name LIKE '%{$key}%'");

    //     $rowForUser1= mysqli_fetch_array($resForUsers1);
    //     $assigned_users1= $rowForUser1['assigned_user_id'];

    //     $arrForAssignedUsers1= explode(",", $assigned_users1);

    //     if(in_array($userName, $arrForAssignedUsers1)){
    //         $resForGetFromSubFolderMasterToUser= mysqli_query($con, "select * from sub_folder_master_3 where folder_name LIKE '%{$key}%'");

    //         $rowForGetDataFromSubFolderMasterToUsers= mysqli_fetch_array($resForGetFromSubFolderMasterToUser); 
    //         $array[]= "<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetDataFromSubFolderMasterToUsers['folder_master_id'].")'>".$rowForGetDataFromSubFolderMasterToUsers['folder_name']."</a>";
    //     }

    //     $resForUsers2= mysqli_query($con, "select * from document_master_3 where document_name LIKE '%{$key}%'");
    //     $rowForUser2= mysqli_fetch_array($resForUsers2);

    //     $assigned_users2= $rowForUser2['assigned_user_id'];

    //     $arrForAssignedUsers2= explode(",", $assigned_users2);

    //     if(in_array($userName, $arrForAssignedUsers2)){
    //         $resForGetFromDocumentMasterToUser= mysqli_query($con, "select * from document_master_3 where document_name LIKE '%{$key}%'");
    //         $rowForGetFromDocumentMasterToUser= mysqli_fetch_array($resForGetDataFromFolderMasterToUsers);

    //         $array[]="<a href='#' id='subFodler' onclick='goToViewFodlerFiles(".$rowForGetFromDocumentMasterToUser['folder_id'].")'>".$rowForGetFromDocumentMasterToUser['document_name']."</a>";
    //     }

        

    // }

    

    echo json_encode($array);
    mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link href="css/uploadfile.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="js/jquery.uploadfile.min.js"></script>
</head>
<body>
<div>
	<select id="folder" name="folder" class="form-control"  >
		<option value="">Select Folder</option>
		<?php
			// $conn= mysqli_connect('localhost', 'root', 'root', 'fincrm');;
			// if($conn->connect_error){
			// 	die("Connection Failed". $conn->connect_error);
			// }

    //get connection
    include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

			$res= mysqli_query($conn, "SELECT * FROM folder_master");
			while($row1=mysqli_fetch_array($res)){
				echo "<option value=".$row1['id'].">".$row1['folder_name']."</option>";
			}
		?>
	</select>
</div><br><br>
<div>
	<select name="userListFromDB" hidden>
	<option value="">Select User</option>
		<?php
			
			$res2= mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
			while($row2=mysqli_fetch_array($res2)){
				echo "<option value=".$row2['id'].">".$row2['user_name']."</option>";
			}
		?>
	</select>
</div>
<div>
	<select name="userName" id="idfisrtselectbox" class="classfisrtselectbox form-control" onchange="displayUploadFile()">
		<option value="">Select User</option>
		<?php
			
			$res2= mysqli_query($conn, "SELECT * FROM user where deleted='0' AND id<>'system' AND is_admin='0'");
			while($row2=mysqli_fetch_array($res2)){
				echo "<option value=".$row2['user_name'].">".$row2['user_name']."</option>";
			}
		?>
	</select>
</div><br><br><input type="hidden" id="usercount" name="usercount" class="inputcountusers">
<div id="test"></div>
                          <div class="form-group row">
                              <div class="col-md-12">
                                  <div id="fileList"></div>
                              </div>
                            <div class="col-md-4">
                              <div class="createbtn" id="main">
                                <button type="button" class="btn btn-primary bt" id="btAdd" value="Add User">Add User</button>
                              </div>
                              
                            </div><br><br><br><br>
<div id="mulitplefileuploader" style="display:none;" onclick="getUsers()">Upload</div>
<!-- <div><input type="button" id="uploadFilesInDB" value="Upload" /> </div> -->
<div id="status" class="status"></div>

<div>
	<input type="button" value="Upload File" onclick="uploadFilesInDB()" />
</div>

<script>
var filesArr=[];var filesArr=[];
	function uploadFilesInDB(){
		//alert("Hii");
		var folderName= document.getElementById("folder");
		var firstUser= document.getElementById("idfisrtselectbox");
		var userCount= document.getElementById("usercount");
		var exm = ['achyut', 'gaikwad'];
		//alert(exm);
		var extraUser=[];
		extraUser.push(firstUser.value);
		var i;
		for(i=1; i<=userCount.value; i++){
		//	alert("IN IF FUNCTION");
		//	alert(i);
			var userE= document.getElementById("idselectbox"+i).value;
			extraUser.push(userE);
		}
		
		window.location="upload_into_db.php?folder="+folderName.value+"&users="+extraUser+"&files="+filesArr;
		
		
	}
</script>

<script>
	function getUsers(){
		//alert("Hiii");
	}
</script>
<script>
	function displaySelectUser(){
		document.getElementById('users').style.display = "block";
	}
	function displayUploadFile(){
		document.getElementById('mulitplefileuploader').style.display = "block";
	}
</script>
<script>

$(document).ready(function()
{


var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,docx,pdf,zip,mp4,mp3,mkv,xls,xlsx,csv,gif",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		filesArr.push(files);
		//alert(filesArr);
		if(data){
			if(data!="<br> Error: 0"){
				//alert(data);
			}
		}
		//$("#status").html("<font color='green'><b>File Uploaded Successfully !!!!</b></font>");
		
		
		
		
	},
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
	//window.location="renameFile.php";
}


$("#mulitplefileuploader").uploadFile(settings);
});


</script>
<script>
	$(document).ready(function() {
                var iCnt = 0;
                var selectcnt=0;
                var show_cnt=1; 
                var selectedextrauser;
                var selectcount='';               
                var arr = [];
                var usersSelectedArr= [];
                var container = $(document.createElement('div')).css({
                  position: 'absolute', left: '150px', top:'150px', padding: '5px', margin: '20px', width: '170px',
                  borderTopColor: '#999', borderBottomColor: '#999',
                  borderLeftColor: '#999', borderRightColor: '#999'
                });
                
                if(selectcount=='')
                    {
                      $("#btAdd").attr("disabled", "disabled");
                    }
                
                
                $('#btAdd').click(function() {
                 // alert("HI");
				  var folderName= $("#folder").children("option:selected").val();
				 // alert(folderName);
                    if (iCnt >= 0) {
                      iCnt = iCnt + 1;
                    selectcnt= selectcnt + 1;
                     
				//	 alert("USER COUNT = "+selectcnt);
					 document.getElementById("usercount").value=selectcnt;
                     if(selectcnt==1)
                     {  
                      selectcount = $(".classfisrtselectbox").children("option:selected").val();
                      arr.push(selectcount);
					 // alert("SELECTED COUNT= "+selectcount);
                     } 
					 
                       for(var i=1; i<selectcnt; i++)
                      {
                        selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
                        arr.push(selectedextrauser);
                      } 
				//	alert("FOLDER ID== "+ folderName);		
					
                    // ADD TEXTBOX.
                                          $('#test').append('<div class="row form-group" id="removeRow'+selectcnt+'"><div class="col-md-6" id="extrauser"><select class="assignExtraUser" id="idselectbox'+selectcnt+'" style="height:40px;" data-selecteduserno-id="'+selectcnt+'" name="extrausername'+selectcnt+'" required="required"><option value="">Select User</option></select></div><div class="col-md-1"><i class="removeButton fas fa-times mt-2" id='+selectcnt+'></i></div></div>');
                    
                    $.ajax({
                        url:"testing_demo.php",
                        method:"post",
                        data:{arr:arr,fid:folderName},
                        
                        success:function(data)
                        {
                          $('#idselectbox'+selectcnt).html(data);
                        
                        }
                      
                        });
                    
                    
                    
                    
                    // SHOW SUBMIT BUTTON IF ATLEAST "1" ELEMENT HAS BEEN CREATED.
                    if (iCnt == 1) {
                      var divSubmit = $(document.createElement('div'));
                      
                    } 
                    // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
                    $('#main').after(container, divSubmit);
                  }
                  // AFTER REACHING THE SPECIFIED LIMIT, DISABLE THE "ADD" BUTTON.
                  // (20 IS THE LIMIT WE HAVE SET)
                  else {      
                    $(container).append('<label>Reached the limit</label>'); 
                    $('#btAdd').attr('class', 'bt-disable'); 
                    $('#btAdd').attr('disabled', 'disabled');
                  }
                  //var str=str+","+extrausername;
                  //$("#inputuserdata").val(str);
                  
                });
                var folderName= $("#folder").children("option:selected").val();
                $(document).on("change",".classfisrtselectbox",function(){
                  //alert("assignExtraUser"+selectcnt);
                  $("#btAdd").removeAttr("disabled");
                var selecteduser = $(this).children("option:selected").val();
                                    
                  $.ajax({
                      url:"testing_demo.php",
                      method:"post",
                      data:{selecteduser:selecteduser,fid:folderName},
                      
                      success:function(data)
                      {
                        //alert(data);
                        $('#idselectbox1').html(data);
                        //location.reload();
                      }
                      
                  });
                
                }); 
                  var selectedextrauser;                              
                $(document).on("change",".assignExtraUser",function(){
                  show_cnt++;
                  
                  // = $(this).children("option:selected").val();
                  var selectCnt=$(this).data("selecteduserno-id");
                   var selectcount = $("#idfisrtselectbox").children("option:selected").val();
                   var arr = [];
                   for(var i=1; i<=selectcnt; i++)
                  {
                    selectedextrauser = $("#idselectbox"+i).children("option:selected").val();
                    arr.push(selectedextrauser);
                  }  
                  selectCnt += 1;
                  arr.push(selectcount);
                  //alert(arr);
                   $.ajax({
                      url:"testing_demo.php",
                      method:"post",
                      data:{arr:arr,fid:folderName},
                      success:function(data)
                      {
                        $('#idselectbox'+ selectCnt).html(data);
                        //location.reload();
                      }
                      
                  });
                
                });
                 
                 $("#extraassigniser").click(function(){
                    //<var s=10
                    $(".inputcountusers").val(selectcnt);
                    //alert(selectcnt);
                  });
                
                  $(document).on("click",".removeButton",function(){
					var button_id=$(this).attr("id");
					var removeselectbox_value = $("#idselectbox"+button_id).children("option:selected").val();
					$("#removeRow"+button_id).remove();
					//alert(button_id +  removeselectbox_value);
				});
                
                                
                // REMOVE ALL THE ELEMENTS IN THE CONTAINER.
                $('#btRemoveAll').click(function() {
                  $('#test')
                  .empty()
                  .remove(); 
                  $('#btSubmit').remove(); 
                  iCnt = 0; 
                  $('#btAdd')
                  .removeAttr('disabled') 
                  .attr('class', 'bt');
                });
                
                
                
              });
              
              // PICK THE VALUES FROM EACH TEXTBOX WHEN "SUBMIT" BUTTON IS CLICKED.
              var divValue, values = '';
              function GetTextValue() {
                $(divValue) 
                .empty() 
                .remove(); 
                values = '';
                $('.input').each(function() {
                  divValue = $(document.createElement('div')).css({
                    padding:'5px', width:'200px'
                  });
                  values += this.value + '<br/>'
                });
                $(divValue).append('<p><b>Your selected values</b></p>' + values);
                $('body').append(divValue);
              }


</script>
</body>
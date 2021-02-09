<?php

$id	=	isset($_GET["id"]) ? $_GET["id"] : NULL;

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//include custom function
include($_SERVER['DOCUMENT_ROOT'].'/client/res/templates/bulk_message/contentTemplate/customFunctions.php');

//fetch data
$sql           =    "SELECT `id`, `template_name`, `principle_entity_id`, `template_id`, `content_type`, `category_type`, `sender_id`, `template_type`, `template_contents` FROM `content_template` WHERE id='".$id."'";

$result		     =	  mysqli_query($conn,$sql);
$row 		       =	  mysqli_fetch_array($result);

if(!empty($row) && count($row) > 0 && isset($row)) {

  $id       			     =    $row['id'];
  $templateId   		   =    $row["template_id"];
  $templateName  		   =    $row["template_name"];
  $principleEntityId   =    $row['principle_entity_id'];
  $contentType       	 =    $row['content_type'];
  $categoryType        =    $row['category_type'];
  $senderId       		 =    $row['sender_id'];
  $templateType        =    $row['template_type'];
  $templateContents    =    $row['template_contents'];
  
  //count lenght
  $smsLengthCount      =    strlen($templateContents);

  //count sms
  $smsCount            =    $smsLengthCount  /  160 ;
  $smsCount            =    ceil($smsCount);

  $categoryTypeArr     =    array("Banking/Insurance/Financial products/ credit cards", "Real Estate", "Education", "Health", "Consumer goods and automobiles", "Communication/Broadcasting/Entertainment/IT", "Tourism and Leisure", "Food and Beverages", "Others");

  $contentTypeArr      =    array("Transactional", "Promotional", "Service Explicit", "Service Implicit" );

  $templateTypeArr     =    array("Text Template", "Unicode Template");

  $output        =     '
  						<div class="row">
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Name</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="edit_TemplateName" value="'.$templateName.'" placeholder="Template Name" required="">
                  <input type="hidden" name="id" value = "'.$id.'">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Principle Entity Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="edit_PrincipleEntityId" value="'.$principleEntityId.'" placeholder="Principle Entity Id" required="">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <input type="text" class="main-element form-control" name="edit_TemplateId" value="'.$templateId.'" placeholder="Template Id" required="">
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Content Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="edit_content_type" id="edit_content_type" class="form-control" required="">
                    <option value="">Select Content Type</option>
        ';
        			      foreach ($contentTypeArr as $key) {
                      
                      $output .= '<option value="'.$key.'"'; 
                          if($key == $contentType) {

                              $output .= ' selected';
                          }
                      $output .= '>'.$key.'</option>';
                    }

  $output .='      </select>
                  <span class="content_edit_error_main text-danger" style="display: none;">Please select content type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Category Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="edit_category_type" id="edit_category_type" class="form-control" required="">
                    <option value="">Select Category Type</option>
        ';
        			      foreach ($categoryTypeArr as $key) {
                      
                      $output .= '<option value="'.$key.'"'; 
                          if($key == $categoryType) {

                              $output .= ' selected';
                          }
                      $output .= '>'.$key.'</option>';
                    }
                    
  $output .='       </select>
                  <span class="content_edit_error_main text-danger" style="display: none;">Please select category type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Sender Id</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="edit_Sender_Id" id="edit_Sender_Id" class="form-control" required="">
                    <option value="">Select Sender Id</option>
           ';
           
           			$getSenderId    =   getSenderId();

                    foreach ($getSenderId as $key => $value) {
                      
                      $output .= '<option value="'.$key.'"'; 
                          if($key == $senderId) {

                              $output .= ' selected';
                          }
                      $output .= '>'.$key.'</option>';
                    }

  $output .='       </select>
                  <span class="content_edit_error_main text-danger" style="display: none;">Please select sender id</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <label class="control-label"><span class="label-text">Template Type</span><span class="required-sign"> *</span>
                </label>
                <div class="field">
                  <select name="edit_unicodeType" id="edit_unicodeType" class="form-control" required="">
                    <option value="">Select Template Type</option>
        ';

        			      foreach ($templateTypeArr as $key ) {
                      
                      $output .= '<option value="'.$key.'"'; 
                          if($key == $templateType) {
                            
                              $output .= ' selected';
                          }


                      $output .= '>'.$key.'</option>';
                    }

  $output .='      </select>
                  <span class="content_edit_error_main text-danger" style="display: none;">Please select template type</span>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <div class="row">
                  <div class="col-xs-9">
                     <label class="control-label" style="margin-top: 10px;display: inline-block;"><span class="label-text">Template Contents</span><span class="required-sign"> *</span>
                    </label>
                  </div>
                  <div class="col-xs-3">
                    <button type="button" class="btn btn-primary pull-right" id="edit_addVariable" style="font-size: 11px;"><i class="material-icons-outlined" style="font-size: 13px;position: relative;top: 2px;">add</i> Add Variable</button>
                  </div>
                </div>
                <div class="field">
                  <textarea id="edit_TemplateContents" name="edit_TemplateContents" class="form-control" placeholder="Type Message Here" rows="4" required="" value="'.$templateContents.'">'.$templateContents.'</textarea>
                  <div>
                    <span>Characters: <b class="edit_smsBodyLenght">'.$smsLengthCount.' </b> </span> 
                    <span> SMS Credits: <b class="edit_smscount">'.$smsCount.'</b></span>
                  </div>
                </div>
              </div>
              <div class="cell col-xs-12 form-group">
                <div class="bg bg-danger" style="padding: 10px;white-space: pre-line;"><b>Note:</b> Add Variable within curly brackets with hash(#) mark . Ex: Dear {#var#}, Good morning.</div>
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary pull-right" id="edit_save_changes">Update</button>
            </div>
          </div>
  ';

  $data['data'] = $output;
  $data['status']           =   'true';
  echo json_encode($data);return;

} else {
    $data['status']           =   'false';
    echo json_encode($data);return;
}
?>
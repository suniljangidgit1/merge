<?php
//CREATE DATABASE CONNECTION
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

$leads_data 	  = $_GET['formFields'];
$page_id 		  = $_GET['page_id'];
$form_id 		  = $_GET['form_id'];
$facebookUserId   = $_GET['facebookUserId'];

$data 		= json_decode($leads_data);
$all_data 	= '';

//CHECK LEADS IS EMPTY OR NOT
if(empty($data)){

	echo '<div class="col-md-12">
      		<div class="accordion--form__row" style="position: relative;">
        		<label class="accordion--form__label text-danger">No leads in their form 
        		</label>
        	</div>
          </div>';
    return true;
}

$length 	= count($data[0]->field_data);
?>
<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
<input type="hidden" name="form_id" value="<?php echo $form_id; ?>">

<?php
for($i=0;$i<$length;$i++) {

	$fields_array[$data[0]->field_data[$i]->name] = $data[0]->field_data[$i]->values[0];
	$fb_form_leads[] = $data[0]->field_data[$i]->name;
	$fb_form_leads_value[] = $data[0]->field_data[$i]->values[0];
	

?>
	<div class="col-md-12">
    	<div class="accordion--form__row" style="position: relative;">
	        <label class="accordion--form__label" for="<?php echo $data[0]->field_data[$i]->name.':'; ?>"><?php echo filterName($data[0]->field_data[$i]->name).':'; ?> 
	        	<span class="text-danger">*</span>
	        </label> 
	        <br />

	        <select class="accordion--form__textarea required Facebook_Mapping_Select for form-control" name="<?php echo $data[0]->field_data[$i]->name; ?>" id="Title" style="width: 100%" required>
	        	<option value=""></option>
				<?php 
					$sql = "SELECT * FROM lead";
					$except_fields = array('id','deleted','created_at','modified_at','created_by_id','modified_by_id', 'assigned_user_id', 'campaign_id', 'created_account_id', 'created_contact_id', 'created_opportunity_id','source');

					if ($result = mysqli_query($conn, $sql)) {
					  while ($fieldinfo = mysqli_fetch_field($result)) {
					  	if(!in_array($fieldinfo->name, 
					  		$except_fields))
					  	{
					  		echo '<option value="'.$fieldinfo->name.'">'.filterName($fieldinfo->name).'</option>';
						}
					  }
					}
				?>				
			</select>
	        <img src="//graph.facebook.com/<?php echo $facebookUserId; ?>/picture?type=large" class="input_img">
        </div>
    </div>

<!-- <div class="col-sm-3">
	<b> <?php //echo $data[0]->field_data[$i]->values[0]; ?> </b>
</div> -->
<!-- </div><br> -->
<?php } ?>

<br>
<input type="hidden" name="fb_form_leads" value="<?php echo implode(',', $fb_form_leads); ?>">
<input type="hidden" name="fb_form_leads_value" value="<?php echo implode(',', $fb_form_leads_value); ?>">

<div class="accordion--form__invalid">Please enter all required fields</div>
<?php 

/*
 * FILTER NAME
 * @para[1]    ->  $name   =  [ string ]
 * #return  =  [ string ]
*/
function filterName($name = "" ){

	$name   = str_replace("_", " ", $name);
	$name   = ucwords($name);
	return $name;
}

return true;
?>
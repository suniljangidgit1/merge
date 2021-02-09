<?php
//get connection
include ($_SERVER['DOCUMENT_ROOT'] . '/task_cron/subdomain_connection.php');

//id generation function
function getToken($length)
{
    $token = "";
    $codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited
    for ($i = 0;$i < $length;$i++)
    {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1) ];
    }
    return $token;
}

function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 0)
    {
        return $min;
    }
    ## Not so random
    $log = log($range, 2);
    $bytes = (int)($log / 8) + 1;
    ## Length in bytes
    $bits = (int)$log + 1;
    ## Length in bits
    $filter = (int)(1 << $bits) - 1;
    ## Set all lower bits to 1
    do
    {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter;
        ## Discard irrelevant bits
        
    }
    while ($rnd >= $range);
    return $min + $rnd;
}

$today_date = date("Y-m-d");

$sql = "select * from task where create_recurring_series_of_tasks='1'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{

    $task_id = getToken(17);

    //taking all data from task table
    $id = $row['id'];
    $name = $row['name'];
    $deleted = $row['deleted'];
    $status = $row['status'];
    $priority = $row['priority'];
    $date_start = $row['date_start'];
    $date_end = $row['date_end'];
    $date_start_date = $row['date_start_date'];

    $date_end_date = $row['date_end_date'];

    $date_completed = $row['date_completed'];
    $description = $row['description'];
    $created_at = date("Y-m-d h:i:s"); //$row['created_at'];
    $modified_at = date("Y-m-d h:i:s"); //$row['modified_at'];
    $parent_id = $row['parent_id'];
    $parent_type = $row['parent_type'];
    $account_id = $row['account_id'];
    $contact_id = $row['contact_id'];
    $created_by_id = $row['created_by_id'];
    $modified_by_id = $row['modified_by_id'];
    $assigned_user_id = $row['assigned_user_id'];
    $create_recurring_series_of_tasks = $row['create_recurring_series_of_tasks'];
    $frequency = $row['frequency'];
    $repeat = $row['repeat'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $weeklyrepeat = $row['weeklyrepeat'];
    $weeklyrepeat_on = $row['weeklyrepeat_on'];
    $weeklystart_date = $row['weeklystart_date'];
    $weeklyend_date = $row['weeklyend_date'];
    $monthly_repeat_on = $row['monthly_repeat_on'];
    $monthly_repeat_on = $row['monthly_repeat_on'];
    $monthly_start_date = $row['monthly_start_date'];
    $monthly_end_date = $row['monthly_end_date'];
    $monthly_repeat = $row['monthly_repeat'];
    $number_of_recurring_tasks = $row['number_of_recurring_tasks'];
    $custom_start_date1 = $row['custom_start_date1'];
    $custom_start_date2 = $row['custom_start_date2'];
    $custom_start_date3 = $row['custom_start_date3'];
    $custom_start_date4 = $row['custom_start_date4'];
    $custom_start_date5 = $row['custom_start_date5'];
    $custom_start_date6 = $row['custom_start_date6'];

    //taking data from attachment
    $sql1 = "select * from attachment where parent_id='$id'";
    $result1 = mysqli_query($conn, $sql1);

    $row1 = mysqli_fetch_assoc($result1);

    $a_id = getToken(17); //$row1['id'];
    $a_name = $row1['name'];
    $a_deleted = $row1['deleted'];
    $a_type = $row1['type'];
    $a_size = $row1['size'];
    $a_source_id = $row1['source_id'];
    $a_field = $row1['field'];
    $a_created_at = date("Y-m-d h:i:s"); //$row1['created_at'];
    $a_role = $row1['role'];
    $a_storage = $row1['storage'];
    $a_storage_file_path = $row1['storage_file_path'];
    $a_global = $row1['global'];
    $a_parent_id = $task_id; //$row1['parent_id'];
    $a_parent_type = $row1['parent_type'];
    $a_related_id = $row1['related_id'];
    $a_related_type = $row1['related_type'];
    $a_created_by_id = $row1['created_by_id'];

    //taking data from note
    $sql2 = "select * from note where parent_id='$id'";
    $result2 = mysqli_query($conn, $sql2);

    $row2 = mysqli_fetch_assoc($result2);
    $n_id = getToken(17); //$row2['id'];
    $n_deleted = $row2['deleted'];
    $n_post = $row2['post'];
    $n_data = $row2['data'];
    $n_type = $row2['type'];
    $n_target_type = $row2['target_type'];
    $n_number = $row2['number'];
    $n_is_global = $row2['is_global'];
    $n_is_internal = $row2['is_internal'];
    $n_created_at = date("Y-m-d h:i:s"); //$row2['created_at'];
    $n_modified_at = date("Y-m-d h:i:s"); //$row2['modified_at'];
    $n_parent_id = $task_id; //$row2['parent_id'];
    $n_parent_type = $row2['parent_type'];
    $n_related_id = $row2['related_id'];
    $n_related_type = $row2['related_type'];
    $n_created_by_id = $row2['created_by_id'];
    $n_modified_by_id = $row2['modified_by_id'];
    $n_super_parent_id = $row2['super_parent_id'];
    $n_super_parent_type = $row2['super_parent_type'];

    //entity team data directly inserted in condition
    //columns 1.entity_id 2.team_id 3.entity_type 4.deleted
    

    //conditions for frequency
    //code start for daily condition
    if ($frequency == 'Daily')
    {

        // echo "1";
        if (strtotime($today_date) >= strtotime($start_date) && strtotime($today_date) <= strtotime($end_date))
        {

            $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
            $result_insert_task = mysqli_query($conn, $sql_insert_task);
            echo mysqli_error($conn);
            // print_r($result_insert_task);die();
            if ($result1->num_rows > 0)
            {

                $sql_insert_attachment = "insert into attachment(id,name,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                echo mysqli_error($conn);
            }

            $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

            $result_insert_note = mysqli_query($conn, $sql_insert_note);
            echo mysqli_error($conn);

            $sql3 = "select * from entity_team where entity_id='$id'";
            $result3 = mysqli_query($conn, $sql3);

            while ($row3 = mysqli_fetch_assoc($result3))
            {
                $entity_id = $task_id; //$row3['entity_id'];
                $team_id = $row3['team_id'];
                $entity_type = $row3['entity_type'];
                $deleted = $row3['deleted'];

                $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

            }

        }
    }
    //code end for daily condition
    //code start for weekly condition
    else if ($frequency == 'Weekly')
    {
        $day = date("l");
        if ($weeklyrepeat == 'Every week')
        {
            if (strtotime($today_date) >= strtotime($weeklystart_date) && strtotime($today_date) <= strtotime($weeklyend_date))
            {

                if ($day == 'Monday')
                {

                    $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                    $result_insert_task = mysqli_query($conn, $sql_insert_task);

                    if ($result1->num_rows > 0)
                    {

                        $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                        $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);
                    }

                    $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                    $result_insert_note = mysqli_query($conn, $sql_insert_note);

                    $sql3 = "select * from entity_team where entity_id='$id'";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row3 = mysqli_fetch_assoc($result3))
                    {
                        $entity_id = $task_id; //$row3['entity_id'];
                        $team_id = $row3['team_id'];
                        $entity_type = $row3['entity_type'];
                        $deleted = $row3['deleted'];

                        $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                        $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                    }

                }

            }

        }
        else if ($weeklyrepeat == 'Custom')
        {
            $day = date("l");
            if (strtotime($today_date) >= strtotime($weeklystart_date) && strtotime($today_date) <= strtotime($weeklyend_date))
            {

                if ($day == $weeklyrepeat_on)
                {
                    $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                    $result_insert_task = mysqli_query($conn, $sql_insert_task);

                    if ($result1->num_rows > 0)
                    {

                        $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                        $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                    }

                    $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                    $result_insert_note = mysqli_query($conn, $sql_insert_note);

                    $sql3 = "select * from entity_team where entity_id='$id'";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row3 = mysqli_fetch_assoc($result3))
                    {
                        $entity_id = $task_id; //$row3['entity_id'];
                        $team_id = $row3['team_id'];
                        $entity_type = $row3['entity_type'];
                        $deleted = $row3['deleted'];

                        $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                        $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                    }
                }

            }

        }

    }
    //code end for weekly condition
    //code start for monthly condition
    else if ($frequency == 'Monthly')
    {

        if ($monthly_repeat == 'Every Month')
        {
            $day = date("d");
            if (strtotime($today_date) >= strtotime($monthly_start_date) && strtotime($today_date) <= strtotime($monthly_end_date))
            {

                if ($day == '01')
                {
                    $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                    $result_insert_task = mysqli_query($conn, $sql_insert_task);

                    if ($result1->num_rows > 0)
                    {

                        $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                        $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                    }

                    $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                    $result_insert_note = mysqli_query($conn, $sql_insert_note);

                    $sql3 = "select * from entity_team where entity_id='$id'";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row3 = mysqli_fetch_assoc($result3))
                    {
                        $entity_id = $task_id; //$row3['entity_id'];
                        $team_id = $row3['team_id'];
                        $entity_type = $row3['entity_type'];
                        $deleted = $row3['deleted'];

                        $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                        $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                    }
                }
            }
        }
        else if ($monthly_repeat == 'Every Month')
        {
            $day = date("d");
            if (strtotime($today_date) >= strtotime($monthly_start_date) && strtotime($today_date) <= strtotime($monthly_end_date))
            {

                if ($monthly_repeat_on == $day)
                {
                    $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                    $result_insert_task = mysqli_query($conn, $sql_insert_task);

                    if ($result1->num_rows > 0)
                    {

                        $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                        $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);
                    }

                    $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                    $result_insert_note = mysqli_query($conn, $sql_insert_note);

                    $sql3 = "select * from entity_team where entity_id='$id'";
                    $result3 = mysqli_query($conn, $sql3);

                    while ($row3 = mysqli_fetch_assoc($result3))
                    {
                        $entity_id = $task_id; //$row3['entity_id'];
                        $team_id = $row3['team_id'];
                        $entity_type = $row3['entity_type'];
                        $deleted = $row3['deleted'];

                        $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                        $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                    }
                }
            }
        }

    }
    //code end for monthly condition
    //code start for custom condition
    else if ($frequency == 'Custom')
    {
        if ($number_of_recurring_tasks == '1')
        {
            if ($custom_start_date1 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);

                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }
        else if ($number_of_recurring_tasks == '2')
        {
            if ($custom_start_date1 == date("Y-m-d") || $custom_start_date2 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);

                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }
        else if ($number_of_recurring_tasks == '3')
        {
            if ($custom_start_date1 == date("Y-m-d") || $custom_start_date2 == date("Y-m-d") || $custom_start_date3 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);

                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }
        else if ($number_of_recurring_tasks == '4')
        {
            if ($custom_start_date1 == date("Y-m-d") || $custom_start_date2 == date("Y-m-d") || $custom_start_date3 == date("Y-m-d") || $custom_start_date4 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);

                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);
                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }
        else if ($number_of_recurring_tasks == '5')
        {
            if ($custom_start_date1 == date("Y-m-d") || $custom_start_date2 == date("Y-m-d") || $custom_start_date3 == date("Y-m-d") || $custom_start_date4 == date("Y-m-d") || $custom_start_date5 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);

                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }
        else if ($number_of_recurring_tasks == '6')
        {
            if ($custom_start_date1 == date("Y-m-d") || $custom_start_date2 == date("Y-m-d") || $custom_start_date3 == date("Y-m-d") || $custom_start_date4 == date("Y-m-d") || $custom_start_date5 == date("Y-m-d") || $custom_start_date6 == date("Y-m-d"))
            {
                $sql_insert_task = "insert into task(id,name,deleted,status,priority,date_start,date_end,description,created_at,modified_at,parent_id,parent_type,account_id,contact_id,created_by_id,modified_by_id,assigned_user_id)

            values

            ('$task_id','$name','$deleted','$status','$priority','$date_start','$date_end','$description','$created_at','$modified_at','$parent_id','$parent_type','$account_id','$contact_id','$created_by_id','$modified_by_id','$assigned_user_id')";
                $result_insert_task = mysqli_query($conn, $sql_insert_task);
                if ($result1->num_rows > 0)
                {

                    $sql_insert_attachment = "insert into attachment(id,name,deleted,type,size,source_id,field,created_at,role,storage,storage_file_path,global,parent_id,parent_type,related_id,related_type,created_by_id)

    values

    ('$a_id','$a_name','$a_deleted','$a_type','$a_size','$a_source_id','$a_field','$a_created_at','$a_role','$a_storage','$a_storage_file_path','$a_global','$a_parent_id','$a_parent_type','$a_related_id','$a_related_type','$a_created_by_id')";

                    $result_insert_attachment = mysqli_query($conn, $sql_insert_attachment);

                }

                $sql_insert_note = "insert into note(id,deleted,post,data,type,target_type,is_global,is_internal,created_at,modified_at,parent_id,parent_type,related_id,related_type,created_by_id,modified_by_id,super_parent_id,super_parent_type)

            values

            ('$n_id','$n_deleted','$n_post','$n_data','$n_type','$n_target_type','$n_is_global','$n_is_internal','$n_created_at','$n_modified_at','$n_parent_id','$n_parent_type','$n_related_id','$n_related_type','$n_created_by_id','$n_modified_by_id','$n_super_parent_id','$n_super_parent_type')";

                $result_insert_note = mysqli_query($conn, $sql_insert_note);

                $sql3 = "select * from entity_team where entity_id='$id'";
                $result3 = mysqli_query($conn, $sql3);

                while ($row3 = mysqli_fetch_assoc($result3))
                {
                    $entity_id = $task_id; //$row3['entity_id'];
                    $team_id = $row3['team_id'];
                    $entity_type = $row3['entity_type'];
                    $deleted = $row3['deleted'];

                    $sql_insert_entity_team = "insert into entity_team(entity_id,team_id,entity_type,deleted)values('$entity_id','$team_id','$entity_type','$deleted')";
                    $result_insert_entity_team = mysqli_query($conn, $sql_insert_entity_team);

                }
            }
        }

    }
    //code end for custom condition
    

    
}

?>

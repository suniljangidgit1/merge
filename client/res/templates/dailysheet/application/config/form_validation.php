<?php
$config = array(
    
    'create_daily_sheet'=> array(
        
        array(
            'field' => 'date_1',
            'label' => 'Date',
            'rules' => 'required'
        ),
        array(
            'field' => 'working_from',
            'label' => 'Working From',
            'rules' => 'required'
        ),
         array(
            'field' => 'inTime',
            'label' => 'In Time',
            'rules' => 'required'
        ),
          array(
            'field' => 'outTime',
            'label' => 'Out Time',
            'rules' => 'required'
        ),
          
        array(
            'field' => 'activity_inTime[]',
            'label' => 'Activity In Time',
            'rules' => 'required'
        ),
        array(
            'field' => 'activity_outTime[]',
            'label' => 'Activity Out Time',
            'rules' => 'required'
        ) ,
        array(
            'field' => 'activity_msg[]',
            'label' => 'Activity Message',
            'rules' => 'required'
        ) 
   
    ),

    'daily_sheet_feedback'=> array(
    array(
        'field' => 'feedback',
        'label' => 'Feedback',
        'rules' => 'required'
    ),

   )
        
    
);
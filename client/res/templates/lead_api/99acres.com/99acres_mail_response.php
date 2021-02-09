<?php
ini_set('max_execution_time', 3000);

//get connection
include($_SERVER['DOCUMENT_ROOT'].'/task_cron/subdomain_connection.php');

//fatch all mail id's in array
$allmails = array('rajeshwarpolshetwar@gmail.com','fincrm.net@gmail.com');

// connection setting for finnovaadvisory.com

// $hostname = '{imap.secureserver.net:993/imap/ssl/novalidate-cert}INBOX';
// $username = 'info@finnovaadvisory.com';
// $password = 'Finnova@1';

// configuration for gmail 
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX';
$username = 'rajeshpolshetwar@gmail.com';
$password = '7767023021';

/* try to connect */
$inbox = imap_open($hostname,$username ,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');
//UNSEEN

/* if emails are returned, cycle through each... */
if($emails) {

    /* begin output var */
    $output = '';

    /* put the newest emails on top */
    rsort($emails);

    foreach($emails as $email_number) {
    
    $head    = imap_headerinfo($inbox, $email_number,2);
    
    // if($frmaddr = $head->date == 'Fri, 17 Apr 2020 10:02:39 +0530'){

           $frmaddr = $head->from[0]->mailbox . "@" . $head->from[0]->host;
           $to      = $head->to[0]->mailbox . "@" . $head->to[0]->host;
           //if($frmaddr == 'rajeshwarpolshetwar@gmail.com')
           if(in_array($to, $allmails))
           {
                $message = getBody($email_number,$inbox);
                // print_r($message);
                // exit();
                //$file = file_get_contents($message);
                $dom = new DOMDocument();
                @$dom->loadHTML($message);
                $xpath = new DOMXpath( $dom );
                $paragraphs = $xpath->query('/html/body//td');

                $property_message = $dom->saveHTML($paragraphs->item(10));
                $property_message = strip_tags($property_message);
                $property_message = str_replace('Property Advertisement Response', '', $property_message);
                $property_message = preg_replace('/\s+/', ' ', trim($property_message));

                $sender_info = $dom->saveHTML($paragraphs->item(38));
                $sender_name_array = explode('<br>', $sender_info);

                $sender_name = strip_tags($sender_name_array[0]);
                $sender_name = str_replace('Details of the response', '', $sender_name);
                $sender_name = preg_replace('/\s+/', '', $sender_name);

                $sender_phone = strip_tags($sender_name_array[2]);
                $sender_phone = preg_replace('/\s+/', '', $sender_phone);
                $sender_phone = str_replace('(Verified)SendMailViewallresponses', '', $sender_phone);

                if($property_message)
                {
                  $sender_email       =   $sender_name_array[1];
                  $sender_subject     =   $head->subject;
                  $sender_message     =   $property_message;
                  $leadSorce          =   '99acres.com';
                  $user_mail          =   $to;

                  $sql = "INSERT INTO india_mart_enquiry_data( sender_name, sender_email, sender_phone, sender_subject, sender_message, user_mail, lead_sorce) VALUES ('$sender_name','$sender_email','$sender_phone','$sender_subject','$sender_message','$user_mail','$leadSorce')";

                  // inserting data in database
                  $result = mysqli_query($conn, $sql);

                  if (!$result) {
                      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }
                  else
                  {
                      echo "record inserted successfully";
                      //imap_delete($inbox,$email_number);
                  }
                }

           }
    }
}

imap_expunge($inbox);

/* close the connection */
imap_close($inbox);

// connection closing
mysqli_close($conn);


function getBody($uid, $imap)
{
  $body = get_part($imap, $uid, "TEXT/HTML");
  // if HTML body is empty, try getting text body
  if ($body == "") {
      $body = get_part($imap, $uid, "TEXT/PLAIN");
  }
  return $body;
}

function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false)
{

  if (!$structure) {

      $structure = imap_fetchstructure($imap, $uid);
  }
  if ($structure) {


      if ($mimetype == get_mime_type($structure)) {
          if (!$partNumber) {
              $partNumber = 1;
          }
          $text = imap_fetchbody($imap, $uid, $partNumber);
          switch ($structure->encoding) {
              case 3:
                  return imap_base64($text);
              case 4:
                  return imap_qprint($text);
              default:
                  return $text;
          }
      }

      // multipart
      if ($structure->type == 1) {
          foreach ($structure->parts as $index => $subStruct) {
              $prefix = "";
              if ($partNumber) {
                  $prefix = $partNumber . ".";
              }
              $data = get_part($imap, $uid, $mimetype, $subStruct, $prefix . ($index + 1));
              if ($data) {
                  return $data;
              }
          }
      }
  }
  return false;
}

function get_mime_type($structure)
{

  $primaryMimetype = ["TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER"];

  if ($structure->subtype) {
      return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
  }
  return "TEXT/PLAIN";
}

?>
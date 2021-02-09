<?php
ini_set('max_execution_time', 0);


//geting mail template credentials
require_once("/var/www/html/crm.fincrm.net/crm/task_cron/email_templates/EmailNotification.php");

$sendMailObj  =   new EmailNotification();

// get super admin connection 
$filePath      = '/var/www/html/crm.fincrm.net/crm/data/config.php';

include($filePath);
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//fatch all mail id's in array
$allmails = array();

$sql = "SELECT * FROM `integrations_users` WHERE `lead_sorce` = 'magicbricks.com'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $allmails[] = $row['user_email'];
  }
} else {
  echo "no user available for integration";
  exit();
}

// configuration for gmail 
$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX';
$username = 'magicbricks.fincrm@gmail.com';
$password = 'Fin$%184#';

/* try to connect */
$inbox = imap_open($hostname,$username ,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
$emails = imap_search($inbox,'ALL');

/* if emails are returned, cycle through each... */
if($emails) {

    /* begin output var */
    $output = '';

    /* put the newest emails on top */
    rsort($emails);

    foreach($emails as $email_number) {
    
    $head    = imap_headerinfo($inbox, $email_number,2);
    //print_r($head);
    // if($frmaddr = $head->date == 'Fri, 17 Apr 2020 10:02:39 +0530'){

           $frmaddr = $head->from[0]->mailbox . "@" . $head->from[0]->host;
           $to      = $head->to[0]->mailbox . "@" . $head->to[0]->host;
           //if($frmaddr == 'rajeshwarpolshetwar@gmail.com')
           // check verification code
           if($frmaddr  == "forwarding-noreply@google.com") {

              $mailSubject  =   $head->subject;
              $forwardMail  =   substr($mailSubject,63);
              $forwardMail  =   trim($forwardMail);
              $sendTo       =   str_replace('m ', '', $forwardMail);
              preg_match_all('!\d+!', $mailSubject, $matches);
              $sendTo       =    array($sendTo);

              $mailBody     = 'To setup email forwarding for FinCRM Integrations, please enter the following OTP: '. $matches[0][0];

              //send mail
              $result       =   $sendMailObj->sendEmail($sendTo, $mailBody, $mailSubject);
              if($result) {
                echo "mail sent";
                imap_delete($inbox,$email_number);
              } else {
                echo "mail sending error";
              }
           }
           if(in_array($to, $allmails)) {
                $message = getBody($email_number,$inbox);
                //$file = file_get_contents($message);
                $dom = new DOMDocument();
                @$dom->loadHTML($message);
                $xpath = new DOMXpath( $dom );
                $paragraphs = $xpath->query("/html/body//strong");

                // for( $i = 0; $i < $paragraphs->length; $i++ )
                // {
                //      echo $dom->saveHTML($paragraphs->item($i)).'<br>';
                // }
                $sender_name        =   strip_tags($dom->saveHTML($paragraphs->item(2)));
                $sender_email       =   strip_tags($dom->saveHTML($paragraphs->item(5)));
                $sender_phone       =   strip_tags(str_replace('+91', '', $dom->saveHTML($paragraphs->item(4))));
                $sender_subject     =   strip_tags($dom->saveHTML($paragraphs->item(3)));
                $sender_message     =   strip_tags($dom->saveHTML($paragraphs->item(0)));
                $sender_address     =   strip_tags($dom->saveHTML($paragraphs->item(1)));
                $sender_name        =   explode(' ', $sender_name);
                $sender_fname       =   $sender_name[0];
                $sender_lname       =   $sender_name[1];

                $leadSorce          =   'MagicBricks.com';
                $user_mail          =   $to;

                $id             = getToken(17);
                $DateTime       = new DateTime();
                $createdAt      = $DateTime->format('Y-m-d H:i:s');

                $sql = "SELECT created_by_id,assigned_user_id FROM `integrations_users` WHERE `user_email` = '$user_mail'";
                  $result = mysqli_query($conn, $sql);
                  $row = mysqli_fetch_array($result);
                  $created_by_id    = $row['created_by_id'];
                  $assigned_user_id = $row['assigned_user_id'];

                $sql = "INSERT INTO `integration_lead`(`id`, `deleted`,`first_name`,`last_name`,`source`, `subject`, `description`, `created_at`,created_by_id,assigned_user_id,`lead_from`, `email`, `phone`) VALUES ('$id','0','$sender_fname', '$sender_lname','$leadSorce','$sender_subject','$sender_message','$createdAt','$created_by_id','$assigned_user_id','$user_mail', '$sender_email', '$sender_phone')";

                // inserting data in database
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } else {
                    echo "record inserted successfully";
                    imap_delete($inbox,$email_number);
                }

           }
    }
}

imap_expunge($inbox);

/* close the connection */
imap_close($inbox);

// connection closing
mysqli_close($conn);


function getBody($uid, $imap) {
  $body = get_part($imap, $uid, "TEXT/HTML");
  // if HTML body is empty, try getting text body
  if ($body == "") {
      $body = get_part($imap, $uid, "TEXT/PLAIN");
  }
  return $body;
}

function get_part($imap, $uid, $mimetype, $structure = false, $partNumber = false) {

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

function get_mime_type($structure) {

  $primaryMimetype = ["TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER"];

  if ($structure->subtype) {
      return $primaryMimetype[(int)$structure->type] . "/" . $structure->subtype;
  }
  return "TEXT/PLAIN";
}

//get token id
function getToken($length) {
  $token = "";
  $codeAlphabet = "abcdefghijklmnopqrstuvwxyz1234567890";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited
  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
  }
  return $token;
}

function crypto_rand_secure($min, $max) {
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}
?>
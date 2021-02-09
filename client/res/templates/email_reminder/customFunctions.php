<?php
/*==========================CUSTOM FUNCTIONS START=================================*/

/*
* TO GET TOKEN
* @para -> $length  	   = (integer)
* #return 	= (string)
*/
if( !function_exists( 'getToken' ) ) {

  function getToken($length = "") {

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
}

/*
* TO GET TOKEN ENCRYPTION
* @para -> $min  	   = (integer)
* @para -> $max  	   = (integer)
* #return 	= (string)
*/
if( !function_exists( 'crypto_rand_secure' ) ) {

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
}

/* FOR INCREASE TIME
 * @para    ->  $date      [ date ]
 * @para    ->  $minutes   [ minutes ]
 * #return  ->  $stamp [ date ]
*/
if( !function_exists( 'increaseTime' ) ) {

  function increaseTime($date = "", $minutes = "") {
    
    if(!empty($date)) {

      $time = new DateTime($date);
      $time->add(new DateInterval('PT' . $minutes . 'M'));

      $stamp = $time->format('Y-m-d H:i');
      return $stamp;
    }
  }
}

/* FOR DELETE DIRECTORY
 * @para    ->  $dirPath      [ string ]
 * #return  ->   [ -- ]
*/
if( !function_exists( 'deleteDir' ) ) {

  function deleteDir( $dirPath = "" ) {

      if ( substr($dirPath, strlen($dirPath) - 1, 1) != '/' ) {
          $dirPath .= '/';
      }

      $files  =  glob($dirPath . '*', GLOB_MARK);

      foreach ( $files as $file ) {
          if ( is_dir($file) ) {
              $this->deleteDir($file);
          } else {
            if(file_exists($file)){
              unlink($file);
            }
          }
      }
  }
}

/* FOR EMPTY DIRECTORY WITH SUB-FOLDER & THEIT FILES
 * @$dir   [ path ]
 * #return   [ - ]
*/
if( !function_exists( 'emptyFolder' ) ) {

  function emptyFolder( $dir = "" ) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") 
             emptyFolder($dir."/".$object); 
          else unlink   ($dir."/".$object);
        }
      }
      reset($objects);
      rmdir($dir);
    }
  }
}

/*==========================CUSTOM FUNCTIONS END=================================*/
?>
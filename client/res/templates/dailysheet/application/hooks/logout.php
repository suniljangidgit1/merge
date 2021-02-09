<?php  defined('BASEPATH') OR exit('No direct script access allowed');  

class Logout extends CI_Controller {  


    /*
    * To remove full group from phpmyadmin sql mode
    */
    public function blockedLogout() {
        
        // load the instance
            session_destroy();
            if(empty($_SESSION['Login'])){
            echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
            error_reporting(0);
            return true; 
            die;
        }
       
    }
}
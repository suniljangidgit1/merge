<?php  defined('BASEPATH') OR exit('No direct script access allowed');  

// class Logout extends CI_Controller {  


//     /*
//     * To remove full group from phpmyadmin sql mode
//     */
//     public function blockedLogout() {
        
//         // load the instance
//             session_destroy();
//             if(empty($_SESSION['Login'])){
//             echo "<script>window.location='http://".$_SERVER["HTTP_HOST"]."';</script>";
//             error_reporting(0);
//             return true; 
//             die;
//         }
       
//     }
// }


class Sqlmodes extends CI_Controller {  


    /*
    * To remove full group from phpmyadmin sql mode
    */
    public function chnageSqlModes() {
        
        // load the instance
        $this->CI =& get_instance();

        $sql = $this->CI->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        if( $sql ){

            // echo "<script>alert('Hook success!');</script>";
        }else{

            // echo "<script>alert('Hook failed!');</script>";
        }

        error_reporting(0);
        return true;
    }
}
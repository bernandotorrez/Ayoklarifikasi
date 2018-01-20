<?php
 

session_start();
include "../config/library.php";

include "../config/xss_clean.php";
require_once '../class.user.php';
$user_home = new USER();
$xss_clean = new xssClean();
  if(isset($_POST['saran']))
  {
    //$user_name = $_POST['user_name'];
    
  $saran = $xss_clean->clean_input($_POST['saran']);
  
   
          
 if($user_home->saran($saran)) { 
 echo "ok";
          exit;
} else {
   echo "Posting Isu Gagal";
          exit;
}
          
    
   }

?>


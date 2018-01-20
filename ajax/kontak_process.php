<?php
 

session_start();
include "../config/library.php";

include "../config/xss_clean.php";
require_once '../class.user.php';
$user_home = new USER();
$xss_clean = new xssClean();
  if(isset($_POST['btn-simpan']))
  {
    //$user_name = $_POST['user_name'];
    
  $email = $_POST['email'];
  $subject = $xss_clean->clean_input($_POST['subject']);
   $pesan = $xss_clean->clean_input($_POST['pesan']);
          
 if($user_home->kontak_kami($email,$subject,$pesan)) { 
 echo "ok";
          exit;
} else {
   echo "Kirim pesan gagal";
          exit;
}
          
    
   }

?>


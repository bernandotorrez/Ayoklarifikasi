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
    $idpost = $_POST['get'];
  $email = $_SESSION['userSession'];
  $polling = $_POST['polling'];
  $source = $_POST['source1'];
  $alasan = $xss_clean->clean_input($_POST['alasan']);
  
   
           if($polling=='Pro') {
 if($user_home->polling_pro($email,$idpost,$source,$alasan)) { 
 echo "Komentar Berhasil";
          exit;
} else {
   echo "Komentar Gagal";
          exit;
}
           } else {
if($user_home->polling_kontra($email,$idpost,$source,$alasan)) { 
 echo "Komentar Berhasil";
          exit;
} else {
  echo "Komentar Gagal";

          exit;
}
           }
    
   }

?>


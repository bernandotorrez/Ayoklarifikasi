<?php
session_start();


require_once '../../class.user.php';
$user_home = new USER();

  if(isset($_POST['btn-maintanance']))
  {
    $status = $_POST['maintanance'];

    if($user_home->maintanance($status)) { 
 echo "Sukses";
} else {
   echo "Gagal";
}
  }
    ?>
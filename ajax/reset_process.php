<?php

session_start();

include "../config/library.php";

require_once '../class.user.php';
$user = new USER();


$id = base64_decode($_POST['user']);
  $passkey = base64_decode($_POST['passkey']);

  $stmt = $user->runQuery("SELECT * FROM login WHERE email=:uid AND passkey=:passkey");
  $stmt->execute(array(":uid"=>$id,":passkey"=>$passkey));
  $rows = $stmt->fetch(PDO::FETCH_ASSOC);

 
  if($stmt->rowCount() == 1)
  {
    if(isset($_POST['btn-reset']))
    {
      $pass = $_POST['resetpass'];
      $cpass = $_POST['cresetpass'];

      if($cpass!==$pass)
      {
        echo "Kata Sandi Tidak Cocok";
      }
      else
      {
        $password = md5($cpass);
        $passkeynew = md5(rand(0, 1000));
        $stmt = $user->runQuery("UPDATE login SET password=:upass, passkey=:passkey WHERE email=:uid");
        $stmt->execute(array(":upass"=>$password,":passkey"=>$passkeynew,":uid"=>$rows['email']));

       echo "Kata Sandi Berhasil Diperbarui";
      }
    }
  }
  else
  {
   echo "Kata Sandi Gagal Diperbarui";

  }







?>
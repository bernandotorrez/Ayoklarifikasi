<?php

session_start();
include "../config/library.php";

require_once '../class.user.php';
$user_home = new USER();

$url = $_SERVER['REQUEST_URI'];

if(isset($_POST['btn-login']))
{
  $email = aman($_POST['email']);
  $upass = aman($_POST['password']);

  if($user_home->login($email,$upass))
  {
    $user_home->redirect($url);
  } 
}





?>
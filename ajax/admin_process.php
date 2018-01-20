<?php

session_start();
include "../config/library.php";

include "../config/xss_clean.php";
require_once '../class.user.php';
$user_home = new USER();
$xss_clean = new xssClean();



if(isset($_POST['btn-admin']))
{
  $token = $xss_clean->clean_input($_POST['token']);
  

  if($user_home->admin($token))
  {
    $user_home->redirect('home.html');
  } 
}





?>
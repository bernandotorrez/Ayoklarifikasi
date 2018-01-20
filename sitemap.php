<!doctype html>
<?php
session_start();
error_reporting(0);
include "config/library.php";

include 'class.user.php';

$user_home = new USER();
include  'judul.php';

$maintanance = $user_home->underConstruction();  
?>

<html lang="en">
<head>
   <?php
include "header.php";
?>
 <?php
    include 'script.php';
    ?>
</head>

<body class="home">

<?php
include "menu.php";
?>
<div class='contents fade out'>
<div class="wrapper">
    <div class="parallax filter-black">
        <div class="parallax-image">
            <img src="assets/img/maxresdefault.jpg">
        </div>
        <div class="small-info">
           <h1>Halaman Sitemap</h1>
            <h3><?php echo $detail;?></h3>
        </div>
    </div>
 
     <div class="section section-gray" id="profil">
        <div class="container">
            <center><h2 class="section-title col-md-10 col-md-offset-1" >Sitemap</h2></center>
            <div class="team-presentation">
                <div class="row">
                    
                    <div class="col-md-10 col-md-offset-1">
                        <div class="card card-user">
                           
                            <div class="content">
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">



<span class="lcount"><h3><?php echo $user_home->countSitemap();?> Halaman</span></h3></div>
<br>&nbsp;
<table cellpadding="0" cellspacing="0" border="0" width="100%">
  <tr><td class="lpage"><a href="https://ayoklarifikasi.com/" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Index - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/analisis.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Analisis - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/post.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Posting Isu - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/tutorial.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Tutorial Posting Isu - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/tentang.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Tentang Website Ayo Klarifikasi - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/saran.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Saran - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/kontak.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Kontak Kami - Ayo Klarifikasi!</a></td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/vote.html" title="Ayo Klarifikasi Bersama! - Ayo Klarifikasi!">Halaman Hasil Vote - Ayo Klarifikasi!</a></td></tr>
<?php
$sitemap = $user_home->getSitemap();

foreach($sitemap as $data){
?>
<tr><td>&nbsp;</td></tr>
<tr><td class="lpage"><a href="https://ayoklarifikasi.com/isu-<?php echo $data['slug'].".html#isu";?>" title="<?php echo $data['judul_posting'];?>" target="_blank"><?php echo $data['judul_posting'];?></a></td></tr>

<?php
}
?>
</table>
                    </div>
                            <hr>
                            
                        </div> <!-- end card -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div> <!-- end section meet our team -->
                      
                   </div>
                   
               </div>
           </div>
    </div><!-- section -->
                        

                   </div>
                   
                </div>

              
           </div>
    </div><!-- section -->
    </center>
    </div><!-- section -->

   <?php
   include('modal.php');
   ?>
  <?php
  include('footer.php');
   ?>

</div>
</div> <!-- wrapper -->
<script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();
    setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 1000);

    $("#b-0").click(function() { NProgress.start(); });
    $("#b-40").click(function() { NProgress.set(0.4); });
    $("#b-inc").click(function() { NProgress.inc(); });
    $("#b-100").click(function() { NProgress.done(); });
  </script>
</body>
   
    <!-- If you are using TypeKit.com uncomment this code otherwise you can delete it -->
    <!--
    <script src="https://use.typekit.net/[your kit code here].js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    -->

    <!-- If you have retina @2x images on your server which can be sent to iPhone/iPad/MacRetina, please uncomment the next line, otherwise you can delete it -->
  <!-- <script src="assets/js/retina.min.js"></script> -->

</html>

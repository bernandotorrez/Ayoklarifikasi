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
           <h1><?php echo $judul;?></h1>
            <h3><?php echo $detail;?></h3>
        </div>
    </div>
 <div class="section section-gray" id="tutorial">
        <div class="container">
            <center><h2 class="section-title col-md-8 col-md-offset-2" >Cara Memposting Isu</h2></center>
            <div class="team-presentation">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2" style="text-align: justify;">
                        
                       
                        <div id="acordeon">
                        <p>1. Klik Menu "Post Baru" -> Pilih "Post Isu". </p>
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                   
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-target="#collapseOne" href="#collapseOne" style="text-align: center;" data-toggle="gsdk-collapse">
                          <center>Pertama : </center>
                          <p><small>(Klik untuk lihat gambar)</small></p>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="panel-body">
                       <center><img src="tutorial/menu.png" class="img-rounded" alt="Tutorial Posting Isu" title='1. Klik Menu "Post Baru" -> Pilih "Post Isu".'></img></center>
                      </div>
                    </div>
                  </div>
                  <br>
                  <p>2. Isi Form Posting Isu. </p>
                  <div class="panel panel-default">
 
                    <div class="panel-heading">

                      <h4 class="panel-title">

                        <a data-target="#collapseTwo" href="#collapseTwo" data-toggle="gsdk-collapse" style="text-align: center;">
                           <center>Kedua : </center>
                          <p><small>(Klik untuk Melihat)</small></p>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                       <p>Siapkan bahan untuk memposting Isu, disini saya akan mencontohkan bahan Isu dari detik.com : </p>
                       
                         <p>1. Source Isu : Silahkan anda isi Source Isu (Judul Isu Berdasarkan alamat isu dari detik.com)</p>
                        <p><center><img src="tutorial/4.png" class="img-rounded" alt="Tutorial Posting Isu" title='1.1 Isi Source Isu.'></img></center></p>
                        <p><center><img src="tutorial/5.png" class="img-rounded" alt="Tutorial Posting Isu" title='1.2 Sumber Source Isu.'></img></center></p>
                        <p>2. Vote Isu : Silahkan anda pilih Vote Isu</p>
                        <p><center><img src="tutorial/6.png" class="img-rounded" alt="Tutorial Posting Isu" title='2. Pilih Vote Isu.'></img></center></p>
                         <p>3. Tujuan Isu : Silahkan anda isi Tujuan Isu (Jelaskan tujuan anda kenapa anda memposting Isu ini)</p>
                        <p><center><img src="tutorial/7.png" class="img-rounded" alt="Tutorial Posting Isu" title='3. isi Tujuan Isu.'></img></center></p>
                         <p>4. Ulasan Saya : Silahkan anda isi Ulasan Saya (Jelaskan ulasan atau komentar anda tentang Isu ini)</p>
                        <p><center><img src="tutorial/8.png" class="img-rounded" alt="Tutorial Posting Isu" title='4. Isu Ulasan Saya.'></img></center></p>
                         <p>5. Pilih Tags : Ketik tags yang anda inginkan lalu klik.</p>
                        <p><center><img src="tutorial/9.png" class="img-rounded" alt="Tutorial Posting Isu" title='5. Pilih Tags.'></img></center></p>
                       <p>Pesan : Jika tags yang anda cari tidak ditemukan pada Input "Pilih Tags", anda harus menambahkan tags pada Input "Tambahkan Tags", lalu tekan Enter.</p>
                       <p>Kemudian kembali pada Input "Pilih Tags", ketik tags yang anda inginkan, lalu Klik.</p>
                    
                       
                         
                             <p>Jika semua Input sudah terisi, klik "Posting".</p>
                      </div>
                    </div>
                  </div>
                  
                  
                  
                </div>

            </div><!--  end acordeon -->

                       </div>
                    
                </div>
            </div>
        </div>
       
    </div> 

    
                        

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
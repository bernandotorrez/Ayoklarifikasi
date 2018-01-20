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
 <div class="section section-white" id="tentang">
        <div class="container">
            <center><h2 class="section-title col-md-8 col-md-offset-2" >Tentang Kami</h2></center>
            <div class="team-presentation">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2" style="text-align: justify;">
                        <p style="text-align: center;">- Assalamualaikum Wr. Wb -</p>
                        <p>Puji syukur kehadirat Allah SWT yang atas segala karunia-Nya kepada kami, sehingga website ini bisa diselesaikan. Shalawat dan salam kami ucapkan pula untuk Nabi Muhammad SAW sebagai manusia yang berpengaruh besar pada peradaban manusia. </p>
                        <p>Kami adalah kelompok dosen yang memperkenalkan hasil penelitian kami berupa sebuah website dengan Url <a href="https://ayoklarifikasi.com">https://ayoklarifikasi.com.</a> Website ini dibuat sebagai wadah yang bertujuan untuk memberikan pemahaman dan pembelajaran serta wawasan yang luas kepada masyarakat atas sesuatu yang dianggap belum jelas dan masih dipertanyakan dengan kaidah ilmu dan pertanggungjawaban berdasarkan link berita yang beredar.</p>
                        <p>Di dalam website disediakan fasilitas untuk kita agar dapat membuat pernyataan berita yang masih layak dipertanyakan kebenarannya baik oleh kita ataupun masyarakat. Fasilitas dibuat untuk menanyakan suatu pemberitaan online yang menjadi pertanyaan bagi diri sendiri khususnya, kemudian akan dijawab oleh masyarakat atau pengunjung web yang lainnya dengan memperlihatkan dukungan atau ketidakdukungan atas pemberitaan yang dipertanyakan tersebut dengan menyertakan ulasan dan link yang relevan.</p>
                        <p>Dengan demikian kami berharap masyrakat dapat mempergunakan website ini dengan bijak dan memperoleh pertimbangan terhadap bobot pemberitaan yang dipertanyakan, terlepas dari benar salah, tetapi dari seberapa besar dukungan yang dilakukan terhadap pemberitaan disertai alasan link berita yang menyertainya. Semoga bermanfaat.  Aamiin</p>

                       </div>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <center><h2 class="section-title col-md-8 col-md-offset-2" >Disclaimer</h2></center>
            <div class="team-presentation">
                <div class="row">
                    
                    <div class="col-md-8 col-md-offset-2" style="text-align: justify;">
                      <p>Konten isu berita dan total dukungan dan klarifikasi adalah merupakan tanggung jawab si pemposting dan klarifier(pemberi klarifikasi).</p>

                       </div>
                    
                </div>
            </div>
        </div>
    </div> 

    <!-- end section meet our team -->
     <div class="section section-gray">
        <div class="container">
            <h2 class="section-title col-md-offset-4">Ayo Klarifikasi! Team</small></h2>
            <div class="team-presentation">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background_profil.jpg">
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="https://upnvj.academia.edu/RioWirawan" target="_blank">
                                    <img class="avatar" src="assets/img/rio.jpg" title="Rio Wirawan" alt="Rio Wirawan"/>
                                    <h4 class="title">Rio Wirawan <br />
                                        <small>Pencetus Ayo Klarifikasi</small>
                                    </h4>
                                    </a>
                                </div>
                               <p class="description text-center">
                                    <i class="fa fa-map-marker fa-fw text-muted"></i> XXXXX, Jakarta Selatan  <br/>
                                    <i class="fa fa-building-o fa-fw text-muted"></i> UPN "Veteran" Jakarta <br/>
                                    <i class="fa fa-envelope-o fa-fw text-muted"></i> rio.wirawan@upnvj.ac.id
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a target="_blank" href="https://upnvj.academia.edu/RioWirawan" class="btn btn-social btn-facebook btn-simple"><i class="fa fa-globe"></i></a>
                                <a target="_blank" href="" class="btn btn-social btn-twitter btn-simple"><i class="fa fa-twitter"></i></a>
                            

                            </div>
                        </div> <!-- end card-->
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background_profil.jpg">
                            </div>
                            <div class="content">
                                <div class="author">
                                    
                                        <img class="avatar" src="assets/img/bayu.jpg" title="M Bayu Wibisono" alt="M Bayu Wibisono"/>
                                        <h4 class="title">Bayu Wibisono<br />
                                            <small>Pencetus Ayo Klarifikasi</small>
                                        </h4>
                                    
                                </div>
                                 <p class="description text-center">
                                    <i class="fa fa-map-marker fa-fw text-muted"></i> XXXXX, Jakarta Selatan  <br/>
                                    <i class="fa fa-building-o fa-fw text-muted"></i> UPN "Veteran" Jakarta <br/>
                                    <i class="fa fa-envelope-o fa-fw text-muted"></i> masbayu.ok@gmail.com
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a target="_blank" href="" class="btn btn-social btn-facebook btn-simple"><i class="fa fa-facebook-square"></i></a>
                                <a target="_blank" href="" class="btn btn-social btn-twitter btn-simple"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div> <!-- end card -->
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background_profil.jpg">
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="https://www.facebook.com/glorious.burst" target="_blank">
                                        <img class="avatar" src="assets/img/bernand.jpg" title="Bernand Dayamuntari Hermawan" alt="Pengembang Website - Bernand Dayamuntari Hermawan"/>
                                        <h4 class="title">Bernand D H <br />
                                            <small>Pengembang Website</small>
                                        </h4>
                                   </a>
                                </div>
                                <p class="description text-center">
                                    <i class="fa fa-map-marker fa-fw text-muted"></i> Ciganjur, Jakarta Selatan  <br/>
                                    <i class="fa fa-building-o fa-fw text-muted"></i> UPN "Veteran" Jakarta <br/>
                                    <i class="fa fa-envelope-o fa-fw text-muted"></i> mail.bernand@gmail.com
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a target="_blank" href="https://www.facebook.com/glorious.burst" class="btn btn-social btn-facebook btn-simple"><i class="fa fa-facebook-square"></i></a>
                                <a target="_blank" href="https://twitter.com/BernandoTorrez1" class="btn btn-social btn-twitter btn-simple"><i class="fa fa-twitter"></i></a>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end section meet our team -->

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
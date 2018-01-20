<!doctype html>
<?php
session_start();
error_reporting(0);
include "config/library.php";

require_once  'class.user.php';

$user_home = new USER();
include  'judul.php';
if(isset($_GET['id']))
{

$get = base64_decode($_GET['id']);
$stmt = $user_home->runQuery("UPDATE posting SET view = view + 1 WHERE id_posting = :uid LIMIT 1");
$stmt->execute(array(":uid"=>$get));
$cekvote = $user_home->cekVote($get); 

}
$maintanance = $user_home->underConstruction();  
 
?>

<html lang="en">
<head>
 <?php
include "header.php";
?>
<?php
   include('script.php');
   ?>
  <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
</head>

<body class="home">
<script>
      function initMap() {
        var upn = {lat: -6.3161769, lng: 106.7950879};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: upn
        });
        var marker = new google.maps.Marker({
          position: upn,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO79kaK0264fE2IGsIdAm67zZU0gUQ5xA&callback=initMap">
    </script>
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
    

     
    <div class="section section-gray section-description" id="kontak">
           <div class="container">
               <div class="row">
               <center> <h2 class="section-title">
               Kontak Kami
               </h2></center>
                  <div class="col-md-6">
                      
                        <!-- Nav tabs -->
                        <div class="tim-title">
                            <br>
                        </div>
                       <form method="post" id="kontak-form">
      
      
        
     
         <section id="komplain"></section>

                           <div class="form-group">
                           
                                <label for="email">Email Kamu</label>
                               
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email Kamu" autofocus="" maxlength="50" />
                                <span class="help-block" id="error"></span> 
                            </div>
                            <div class="form-group">
                         
                                <label for="email">Subject</label>
                               
                                <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" maxlength="100" />
                                <span class="help-block" id="error"></span> 
                            </div>
                      <div class="form-group">
                           
                                <label for="email">Pesan</label>
                               
                                <textarea name="pesan" class="form-control" id="pesan" placeholder="Pesan Kamu" maxlength="250" rows="8"></textarea>
                                <span class="help-block" id="error"></span> 
                            </div>
 
                           
                    

                            </center>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-simpan" id="btn-simpan">
        <span class="fa fa-envelope"></span> Kirim Pesan
      </button> 
        </div>  
      
      </form>

                        <!-- Tab panes -->
                       
                      
                        
                     <!-- end col-md-6 -->
&nbsp;
          
</div>
                   
                

                <div class="col-md-6">
                 


                  <h3 class="title title-blog"><i class="fa fa-map-marker"></i> Lokasi Kami </h3>
                  <div id="map"></div>
                         
                  
        </div>  
                  </div>
                

            </div>

          </div>

    </div>

    </div><!-- section -->
   

<!-- ajax vote -->


   <?php
   include('modal.php');
   ?>
<?php
   include('footer.php');
   ?>
</div>
    


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
    <!--  jQuery and Bootstrap core files    -->
   
    <!-- If you are using TypeKit.com uncomment this code otherwise you can delete it -->
    <!--
    <script src="https://use.typekit.net/[your kit code here].js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    -->

    <!-- If you have retina @2x images on your server which can be sent to iPhone/iPad/MacRetina, please uncomment the next line, otherwise you can delete it -->
  <!-- <script src="assets/js/retina.min.js"></script> -->

</html>

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
    


    
     <center><div class="section section-gray section-description" id="post">
           <div class="container">
               <h2 class="section-title">Punya Saran? <br>Berikan Saran Kamu Dengan Mengisi Form Dibawah Ini</h2>
              
               
               <div class="row">
                    <div class="">
                      <div class="section">
           <div class="container">
              
               <div class="row">
                 <div class="col-md-6 col-md-offset-3">
                  <center> 
               
                  <form method="post" id="saran-form">
      
      
        
     
         <section id="komplain"></section>
                           <div class="form-group">
                          
                                <label for="email">Saran Kamu</label>
                               
                                <textarea name="saran" class="form-control" id="saran" placeholder="Saran Kamu" autofocus="" rows="8"></textarea>
                                <span class="help-block" id="error"></span> 
                            </div>
                     
 
                           
                    

                            </center>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-simpan" id="btn-simpan">
        <span class="fa fa-pencil"></span> Submit
      </button> 
        </div>  
      
      </form>
                        



                        </center>
                      
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

<!doctype html>
<?php
session_start();
error_reporting(0);
include "config/library.php";

require_once  'class.user.php';

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
   include('script.php');
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
    

     
    <div class="section section-gray section-description" id="vote">
           <div class="container">
               <div class="row">
               <center> <h2 class="section-title">
               Hasil Terpopuler
               
               </h2></center>
                  <div class="col-md-12 bottom-border">
                       <div class="col-md-12 text-center">
                        <!-- Nav tabs -->
                        <div class="tim-title">
                            <br>
                        </div>
                        <ul class="nav nav-icons" role="tablist">
                          <li>
                            <a href="#isu" class="ajax-isu" id="ajax-isu" role="tab" data-toggle="tab">
                                 <i class="fa fa-trophy text-warning"></i><br>
                                 Isu Terpopuler
                            </a>
                          </li>
                          <li>
                            <a href="#klarifier" class="ajax-klarifier" id="ajax-klarifier" role="tab" data-toggle="tab">
                                <i class="fa fa-trophy btn-reddit" ></i><br>
                                Klarifier Terpopuler
                            </a>
                          </li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" id="tampil">
                            <div class="tab-pane" id="isu">
                                  
                            </div>
                           <div class="tab-pane" id="klarifier">
                                
                            </div>
                            
                        </div>
                       
                        
                     <!-- end col-md-6 -->
&nbsp;
          
</div>
                   
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

 <script type="text/javascript">
  
        $('.ajax-isu').click(function(){

$('#klarifier').fadeOut(2000)

            $('#isu').load('ajax/isu_populer.php').fadeIn(2000);
            
   });
  
        
         $('.ajax-klarifier').click(function(){

$('#isu').fadeOut(2000)

            $('#klarifier').load('ajax/klarifier_populer.php').fadeIn(2000);
            
   });
 
 
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

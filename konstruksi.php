<!doctype html>


<html lang="en">
<head>
<?php
include 'judul.php';
?>
<?php
include 'header.php';
?>

</head>

<body class="home">


<div class='contents fade out'>
<div class="wrapper">
    <div class="parallax filter-black">
        <div class="parallax-image"> 
           <img src="https://img.freepik.com/free-vector/website-caution-background_1355-5.jpg?size=338&ext=jpg">
        </div>
        <div class="small-info">
        
            <h1>Website Is Under Construction</h1>
            <h3>Please Come Back Soon</h3>
        </div>
    </div>
    

 
    <div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

    </div>
     
    
    </div><!-- section -->
   
    </div><!-- section -->

    </center>
    </div><!-- section -->
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
    <!--  jQuery and Bootstrap core files    -->
 

    <!-- If you are using TypeKit.com uncomment this code otherwise you can delete it -->
    <!--
    <script src="https://use.typekit.net/[your kit code here].js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    -->

    <!-- If you have retina @2x images on your server which can be sent to iPhone/iPad/MacRetina, please uncomment the next line, otherwise you can delete it -->
  <!-- <script src="assets/js/retina.min.js"></script> -->

</html>

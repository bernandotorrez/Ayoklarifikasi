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
 
     <div class="section section-gray" id="profil">
        <div class="container">
            <center><h2 class="section-title col-md-4 col-md-offset-4" >Profil Anda</h2></center>
            <div class="team-presentation">
                <div class="row">
                    
                    <div class="col-md-4 col-md-offset-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background_profil.jpg">
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a>
                                    <?php if($profil['jk'] =='Boy') { ?>
                                      <img class="avatar" src="assets/img/boy.png" alt="<?php echo $profil['nama_member'];?>" title="<?php echo $profil['nama_member'];?>"/>
                                    	<?php } else {  ?>
                                    	 <img class="avatar" src="assets/img/girl.png" alt="<?php echo $profil['nama_member'];?>" title="<?php echo $profil['nama_member'];?>"/>
                                    	<?php } ?>
                                      
                                        <h4 class="title"><?php echo $profil['nama_member'];?> <br />
                                            <small>Member Ayo Klarifikasi</small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center">
                                	<i class="fa fa-envelope-o fa-fw text-muted"></i> <?php echo $profil['email'];?><br/>
                                    <i class="fa fa-venus-mars fa-fw text-muted"></i> 
                                    <?php if($profil['jk'] =='Boy') { echo 'Laki - Laki'; } else { echo 'Perempuan';	}?> <br/>
                                    <i class="fa fa-calendar fa-fw text-muted"></i> <?php echo tanggal($profil['tanggal_daftar']);?> <br/>
                                    
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                Total Vote : <?php echo $profil['total_vote'];?>
                            </div>
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

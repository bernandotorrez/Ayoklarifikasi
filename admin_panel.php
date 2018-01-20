<!doctype html>
<?php

session_start();
error_reporting(0);
include "config/library.php";

require_once  'class.user.php';

$user_home = new USER();
include  'judul.php';

$maintanance = $user_home->underConstruction();  
 
 if(empty($_SESSION['adminSession'])){
  $user_home->redirect("home.html");
 }

 $selected = $user_home->selected(); 
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
    

     
    <div class="section section-gray section-description" id="panel">
           <div class="container">
               <div class="row">
               <center> <h2 class="section-title">
               Panel Admin
               
               </h2></center>
                  <div class="col-xs-10 bottom-border col-md-offset-2">
                       <div class="col-xs-10 text-center">
                        <!-- Nav tabs -->
                        <div class="tim-title">
                            <br>
                        </div>
                        <ul class="nav nav-icons" role="tablist">
                          <li>
                            <a href="#maintanance" class="ajax-maintanance" id="ajax-maintanance" role="tab" data-toggle="tab">
                                 <i class="fa fa-cog fa-spin fa-fw text-info"></i><br>
                                 Option Maintanance
                            </a>
                          </li>
                          <li>
                            <a href="#posting" class="ajax-posting" id="ajax-posting" role="tab" data-toggle="tab">
                                <i class="fa fa-trophy text-danger" ></i><br>
                                Data Posting
                            </a>
                          </li>
                           <li>
                            <a href="#member" class="ajax-member" id="ajax-member" role="tab" data-toggle="tab">
                                <i class="fa fa-users text-success" ></i><br>
                                Data Member
                            </a>
                          </li>
                           <li>
                            <a href="#tag" class="ajax-tag" id="ajax-tag" role="tab" data-toggle="tab">
                                <i class="fa fa-tags text-warning" ></i><br>
                                Data Tag
                            </a>
                          </li>
                           <li>
                            <a href="#komentar" class="ajax-komentar" id="ajax-komentar" role="tab" data-toggle="tab">
                                <i class="fa fa-bullhorn text-primary" ></i><br>
                                Data Komentar
                            </a>
                          </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" id="tampil">
                          
                            <div class="tab-pane" id="maintanance">
                              <p>
                  <form method="post" id="maintanance-form">
      
      
        
     
         <section id="komplain"></section>
                         
                       
                               <div class="form-group">
                                <h1>Maintanance</h1></br>
                               
                                 <label class="inline">
                            <input type="radio" name="maintanance" id="maintanance" value="Berjalan" required="" <?php if($selected['status']=="Berjalan"){echo "Checked";}?> />
                            Berjalan  
                            </label>
                            &nbsp; &nbsp; &nbsp;
                            <label class="inline">
                          <input type="radio" name="maintanance" id="maintanance" value="Konstruksi" required="" <?php if($selected['status']=="Konstruksi"){echo "Checked";}?>/> 
                            Maintanance  
                            </label>
                               <span class="help-block" id="error"></span>
                            </div>
                           
             

                            
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-maintanance" id="btn-maintanance">
        <span class="fa fa-pencil"></span> Submit
      </button> 
        </div>  
      
      </form>
     </p>
                               </div>
                           <div class="tab-pane" id="posting">
                                
                            </div>
                             <div class="tab-pane" id="member">
                                
                            </div>
                            <div class="tab-pane" id="tag">
                                
                            </div>
                            <div class="tab-pane" id="komentar">
                                
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
  
        $('.ajax-maintanance').click(function(){

$('#posting').fadeOut(2000)
$('#member').fadeOut(2000)
$('#tag').fadeOut(2000)
$('#komentar').fadeOut(2000)

            $('#maintanance').fadeIn(2000);
            
   });
  
        
         $('.ajax-posting').click(function(){

$('#maintanance').fadeOut(2000)
$('#member').fadeOut(2000)
$('#tag').fadeOut(2000)
$('#komentar').fadeOut(2000)

            $('#posting').load('ajax/admin/posting.php').fadeIn(2000);
            
   });
          $('.ajax-member').click(function(){

$('#maintanance').fadeOut(2000)
$('#posting').fadeOut(2000)
$('#tag').fadeOut(2000)
$('#komentar').fadeOut(2000)

            $('#member').load('ajax/admin/member.php').fadeIn(2000);
            
   });
           $('.ajax-tag').click(function(){

$('#maintanance').fadeOut(2000)
$('#posting').fadeOut(2000)
$('#member').fadeOut(2000)
$('#komentar').fadeOut(2000)

            $('#tag').load('ajax/admin/tag.php').fadeIn(2000);
            
   });
           $('.ajax-komentar').click(function(){

$('#maintanance').fadeOut(2000)
$('#posting').fadeOut(2000)
$('#member').fadeOut(2000)
$('#tag').fadeOut(2000)

            $('#komentar').load('ajax/admin/komentar.php').fadeIn(2000);
            
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

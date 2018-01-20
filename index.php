<!doctype html>
<?php
session_start();
error_reporting(0);
include "config/library.php";

include  'class.user.php';
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
    

    <?php
include "hot_isu.php";
?>

    <div id="loader-wrapper">
      <div id="loader"></div>

      <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

    </div>
     
    <div class="section section-gray section-description" id="isu">
           <div class="container">
               <h2 class="section-title">
                    Isu Terbaru
               
               </h2>
               <div class="row">
                    
  <?php
  

              $sql=mysqli_query($con,  "SELECT * FROM posting, member where posting.email=member.email order by tanggal_posting DESC");
              
              include 'pagination_index.php';
      $rpp = 2; // jumlah record per halaman
        $reload = "home";
        $page = intval($_GET["page"]);
        if($page<=0) $page = 1;  
        $tcount = mysqli_num_rows($sql);
        $tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
        $count = 0;
        $i = ($page-1)*$rpp;
        $no_urut = ($page-1)*$rpp;
                            

                              while(($count<$rpp) && ($i<$tcount)) {
                               mysqli_data_seek($sql,$i);
                        $row1 = mysqli_fetch_array($sql);
                                

                                 $content = $row1['isi_posting'];
   

    $string = strip_tags($content);

if (strlen($string) > 250) {

    // truncate string
    $stringCut = substr($string, 0, 250);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <br><font color="#3b5998">Lihat Selengkapnya</font>'; 
}


                                ?>
                     <div class="col-md-8">
                        <div class="card">
                            <div class="image">
                               <img src="<?php echo $row1['image'];?>" alt="<?php echo $row1['isi'];?>" title="<?php echo $row1['isi'];?>" class="img-responsive"/>
                                <div class="filter filter-azure">
                                    <a type="button" class="btn btn-neutral btn-round" name="view" target="_blank" href="isu-<?php echo $row1['slug'];?>.html#isu">
                                       <i class="fa fa-align-left"></i> Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                           
                            <div class="content">
                                <p class="category"><h3><?php echo $row1['judul_posting'];?></h3></p>
                               
                                <a class="card-link" name="view" target="_blank" href="isu-<?php echo $row1['slug'];?>.html#isu">
                                    <h4 class="title" style="text-align: justify;"><?php echo $string;?></h4>
                                </a>
                                 <div class="footer">
                                    <div class="author">
                                        <a class="card-link">
                                        
                                          <?php if($row1['jk'] =='Boy') { ?>
                                      <img class="avatar" src="assets/img/boy.png" alt="<?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/>
                                      <?php } else {  ?>
                                       <img class="avatar" src="assets/img/girl.png" alt=" <?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/>
                                      <?php } ?>
                                      
                                           <span> <?php echo $row1['nama_member'];?> </span>
                                        </a>
                                    </div>
                                    <div class="stats pull-right">
                                        
                                         <i class="fa fa-calendar"></i> <?php echo tanggal($row1['tanggal_posting']); ?>
                                    </div>

                                </div>
                            </div>
                           
                        </div> <!-- end card -->
                    </div>

                     <?php 
                      $i++; 
                        $count++;
                     } 
                    
                     ?>

                    </div>
                   <center> <?php  echo paginate_one($reload, $page, $tpages); ?></center>
 </div>
           </div>
    </div><!-- section -->
   
    </div><!-- section -->
<?php
                 if(isset($_GET['user']) && isset($_GET['passkey']))
{
  
 ?>
     <center><div class="section section-white section-description" id="reset">
           <div class="container">
               <h2 class="section-title">Buat Kata Sandi Baru </h2>
               


               
               <div class="row">
                    <div class="">
                      <div class="section">
           <div class="container">
              
               <div class="row">
                 <div class="col-md-6 col-md-offset-3">
                  <center> 

             <form method="post" id="reset-form">
      
      
        
     
         <section id="komplain"></section>
         
        <input type="hidden" name="user" class="edit-user" data-id="<?php echo $_GET['user'];?>" value="<?php echo $_GET['user'];?>">
        <input type="hidden" name="passkey" class="edit-pass" data-pass="<?php echo $_GET['passkey'];?>" value="<?php echo $_GET['passkey'];?>">
                           <div class="form-group">
                                <label for="email">Kata Sandi</label>
                                <input type="password" name="resetpass" class="form-control" id="resetpass" placeholder="Kata Sandi Anda Yang Baru" maxlength="15" minlength="6" autofocus />
                                <span class="help-block" id="error"></span> 
                            </div>
                        <div class="form-group">
                                <label for="email">Ketik Ulang Kata Sandi</label>
                                <input type="password" name="cresetpass" class="form-control" id="cresetpass" placeholder="Ketik Ulang Kata Sandi Anda Yang Baru" required maxlength="15" minlength="6"  />
                                <span class="help-block" id="error"></span> 
                            </div>
                            
                              

                            
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-reset" id="btn-reset">
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
    </div>
<?php } ?>
   <?php
   include('modal.php');
   ?>
<?php
   include('footer.php');
   ?>

    


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

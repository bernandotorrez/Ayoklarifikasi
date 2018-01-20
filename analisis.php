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
    

     
    <div class="section section-gray section-description" id="analisis">
           <div class="container">
               <div class="row">
               <center> <h2 class="section-title">
               <?php if(empty($_GET['search']) AND empty($_GET['tags'])) {
                   echo  "Analisis"; 
               } elseif(isset($_GET['search'])) {
               	echo "Hasil Pencarian Kata : '".$_GET['search']."'";
               } elseif(isset($_GET['tags'])) {
               		echo "Hasil Pencarian Tags : '".$_GET['tags']."'"; 
               }
               ?>
               
               </h2></center>
                  <div class="col-md-8 bottom-border">
                       <div class="col-md-12 col-md-offset-1">
                        <!-- Nav tabs -->
                        <div class="tim-title">
                            <br>
                        </div>
                        <ul class="nav nav-icons" role="tablist">
                          <li>
                            <a href="#terkini" class="ajax-terkini" id="ajax-terkini" role="tab" data-toggle="tab">
                                 <i class="fa fa-lightbulb-o text-warning"></i><br>
                                 Isu Hari Ini
                            </a>
                          </li>
                          <li>
                            <a href="#terhangat" class="ajax-terhangat" id="ajax-terhangat" role="tab" data-toggle="tab">
                                <i class="fa fa-fire text-danger" ></i><br>
                                Isu Terhangat
                            </a>
                          </li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" id="tampil">
                            <div class="tab-pane" id="terkini">
                                  
                            </div>
                           <div class="tab-pane" id="terhangat">
                                
                            </div>
                            
                        </div>
                        <div id="tags">

                        <?php if(isset($_GET['tags'])) {
                        	include 'tags.php';
                        	}?>

                        </div>
                        
                     <!-- end col-md-6 -->
&nbsp;
          <div id="search">
          
          
  <?php if(isset($_GET['search'])) {
  $search = $_GET['search'];
              $sql=mysqli_query($con,  "SELECT * FROM posting, member where posting.email=member.email AND posting.judul_posting LIKE '%".$search."%'");
              $count=mysqli_num_rows($sql);
              if($count < 1) {
                echo "<b><h3>Hasil pencarian : <font class='text-info'>'".$search."'</font> Tidak ditemukan<b></h3>";
              } else {
                
             
              include 'pagination_analisis.php';
      $rpp = 2; // jumlah record per halaman
        $reload = "analisis-".$search;
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
                         $idpost = $row1['id_posting'];
$komentar = mysqli_query($con,"SELECT id_posting FROM komentar_posting WHERE id_posting=$idpost");

  $hitung = mysqli_num_rows($komentar);
                                 $gambar = $row1['isi_posting'];

                                 $gambar = preg_match('/(<img[^>]+>)/i', $gambar, $matches);

                                 $content = $row1['isi_posting'];
    $content = preg_replace("/<img[^>]+\>/i", " ", $content); 

    $string = strip_tags($content);

if (strlen($string) > 150) {

    // truncate string
    $stringCut = substr($string, 0, 150);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <br><font color="#3b5998">Lihat Selengkapnya</font>'; 
}
$contentjudul = $row1['judul_posting'];
    

    $stringjudul = strip_tags($contentjudul);

if (strlen($stringjudul) > 50) {

    // truncate string
    $stringCutjudul = substr($stringjudul, 0, 50);

    // make sure it ends in a word so assassinate doesn't become ass...
    $stringjudul = substr($stringCutjudul, 0, strrpos($stringCutjudul, ' '))."... "; 
}


                                ?>
                     <div class="col-md-12">
                        <div class="card card-horizontal">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="image">
                                         <img src="<?php echo $row1['image'];?>" alt="<?php echo $row1['isi'];?>" title="<?php echo $row1['isi'];?>" class="img-responsive"/>
                                        <div class="filter filter-azure">
                                            <a type="button" class="btn btn-neutral btn-round" name="view" target="_blank" href="isu-<?php echo $row1['slug'];?>.html#isu">
                                       <i class="fa fa-align-left"></i> Lihat Selengkapnya
                                    </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                     <div class="content">
                                      <p class="category text-success">
                                            <i class="fa fa-search text-success"></i> Cari : <?php echo $search;?>
                                        </p>

                                        <a class="card-link" name="view" target="_blank" href="isu-<?php echo $row1['slug'];?>.html#isu">
                                            <h4 class="title" ><?php echo $stringjudul;?> </h4>
                                        </a>
                                        <a class="card-link" name="view" target="_blank" href="isu-<?php echo $row1['slug'];?>.html#isu">
                                            <p class="description" style="text-align: justify;"><?php echo $string;?></p>
                                        </a>
                                         <div class="footer">
                                            <div class="stats">
                                              
                                                 <?php if($row1['jk'] =='Boy') { ?>
                                      <img class="avatar" src="assets/img/boy.png" alt="<?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/>
                                      <?php } else {  ?>
                                       <img class="avatar" src="assets/img/girl.png" alt=" <?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/>
                                      <?php } ?> <?php echo $row1['nama_member'];?>
                                                
                                            </div>
                                            <div class="stats">
                                             
                                                <i class="fa fa-comments"></i> <?php echo $hitung;?> Komentar
                                              
                                            </div>
                                            
                                        </div>
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
                   <center> <?php  echo paginate_one($reload, $page, $tpages); ?></center>
                   <?php }  }?>
                      </div>
</div>
                   
                </div>

                <div class="col-md-3 col-md-offset-1">
                 


                  <h3 class="title title-blog"><i class="fa fa-search"></i> &nbsp;Cari Isu </h3>
                  <form action="analisis.html#analisis" method="get">
                  <div class="input-group">
                    	<!-- 	   Since the css properties cannot check the previous sibling of an element and for the design consistency we recommend to use the "input-group-addon" after the "form-control" like in this example -->
                          <input type="text" name="search" class="form-control" placeholder="Tekan enter untuk mencari isu" maxlength="25">
                          <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                        </form>
                         <h3 class="title title-blog"><i class="fa fa-tags"></i> &nbsp;Tags </h3>
                         
                  <?php 
                 
                   $getagss = $user_home->getTagss();


                   foreach($getagss as $data){ ?>
                  <a href="analisis.html?tags=<?php echo $data['name'];?>#analisis"><span class="label label-warning label-fill ajax-tags" id="ajax-tags" data-title="<?php echo $data['name'];?>"><b><?php echo $data['name'];?></b></span>
                  </a>
                  
                  <?php } ?>
                        
                  
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
  
        $('.ajax-terkini').click(function(){
$('#terhangat').fadeOut(2000);
$('#search').fadeOut(2000);
$('#tags').fadeOut(2000);
            $('#terkini').load('ajax/terkini.php').fadeIn(2000);
            
   });
  $('.ajax-terhangat').click(function(){
$('#terkini').fadeOut(2000);
$('#search').fadeOut(2000);
$('#tags').fadeOut(2000);
            $('#terhangat').load('ajax/terhangat.php').fadeIn(2000);

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

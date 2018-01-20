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

$get = $_GET['id'];
$stmt = $user_home->runQuery("UPDATE posting SET view = view + 1 WHERE slug = :uid LIMIT 1");
$stmt->execute(array(":uid"=>$get));

$cekvote = $user_home->cekVote($get); 

}
$maintanance = $user_home->underConstruction();  

$stmt = $user_home->runQuery("SELECT id_posting FROM posting WHERE slug=:uid LIMIT 1");
$stmt->execute(array(":uid"=>$_GET['id']));

$row1= $stmt->fetch(PDO::FETCH_ASSOC);

?>

<html lang="en">
<head>
 <?php
include "header.php";
?>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '279082315912245',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.10' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

<?php
   include('script.php');
   ?>
   <?php if(isset($_GET['polling'])) {

    } else { ?>
<script type="text/javascript">

    var refreshId = setInterval(function()
    {
      var $id = "<?php echo base64_encode($row1['id_posting']);?>";
       $('#media').load('ajax/vote.php?id='+$id).fadeIn(2000);
      
    }, 3000);
</script>
<?php } ?>
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
        
            <h1><?php echo $detail;?></h1>
           

        </div>
    </div>
    

     
    <div class="section section-white section-description" id="isu">
           <div class="container">
               <div class="row">
                  <div class="col-md-8 bottom-border">
                  <?php
                 $id = $_GET['id'];

            $stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email AND slug=:uid LIMIT 1");
$stmt->execute(array(":uid"=>$id));



if($stmt->rowCount() == 0){
  echo "<h1 class='title title-blog' >Isu tidak ditemukan</h1>";
} else {

$row1= $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_home->runQuery("SELECT SUM(polling_pro)
FROM komentar_posting
WHERE id_posting=:id LIMIT 1");
$stmt->execute(array(":id"=>$row1['id_posting']));
$pro = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $user_home->runQuery("SELECT SUM(polling_kontra)
FROM komentar_posting
WHERE id_posting=:id LIMIT 1");
$stmt->execute(array(":id"=>$row1['id_posting']));
$kontra = $stmt->fetch(PDO::FETCH_ASSOC);
                                $gambar = $row1['isi_posting'];

                                 $gambar = preg_match('/(<img[^>]+>)/i', $gambar, $matches);

                                 $content = $row1['isi_posting'];
    $content = preg_replace("/<img[^>]+\>/i", " ", $content); 

    $string = strip_tags($content);
   

                                ?> 
                    <h1 class="title title-blog" ><?php echo $row1['judul_posting'];?></h1>
                     <p>Dipost Tanggal : <font class="text-info"><?php echo tanggal($row1['tanggal_posting']); ?></font></p>
                     <p>Dipost Oleh : <font class="text-info"><?php echo $row1['nama_member'];?></font></p>
                     <div id="dilihat">
                     <p>Dilihat Sebanyak : <font class="text-info"><?php echo $row1['view'];?> Kali</font></p>
                     </div>
                      <p>Vote Saya : <font class="text-info"><?php echo $row1['vote'];?></font></p>
                      <p>Tujuan : <font class="text-info"><?php echo $row1['tujuan'];?></font></p>
                       <p>Ulasan Saya : <font class="text-info"><?php echo $row1['komentar'];?></font></p>
                      <h5 class="title title-blog">Source : <br><a target="_blank" href="<?php echo $row1['source'];?>">Klik Untuk Membuka Source</a></h5>
                    <p>  <div class="image">
                                <a href="<?php echo $row1['image'];?>" target="_blank">
                                    <img src="<?php echo $row1['image'];?>" alt="<?php echo $row1['isi'];?>" title="<?php echo $row1['isi'];?>" class="img-responsive"/>
                                </a>
                            </div> </p>
                    <p><?php echo $content;?> </p>
                  

                      <div id="acordeon">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-target="#collapseOne" href="#collapseOne" data-toggle="gsdk-collapse">
                          <center>Hasil Vote <br><small>(Klik Untuk Melihat Hasil Vote)</small>
                         
                          </center>
                        </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                      <div class="panel-body">
                         <br>
                          <?php 

                          $url = str_replace(array("-pro.html","-kontra.html",".html"), "", $_SERVER['REQUEST_URI']);

                          $url = str_replace(array("isu"), "polling", $url);
                                                  ?>
                    <form action="" method="get">

                            
                    <center><p><label class="inline"><a href="<?php echo $url;?>-pro.html#komen" class="btn btn-social btn-fill btn-round btn-reddit btn-tooltip" name="polling" value="pro" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat seluruh Vote Pro">
                                <i></i>Pro : <b><?php if($pro['SUM(polling_pro)'] == '') { echo "0"; } else { echo $pro['SUM(polling_pro)']; };?></b>
                            </a></label>
                             &nbsp; &nbsp; &nbsp;
                            <label class="inline"><a href="<?php echo $url;?>-kontra.html#komen" class="btn btn-social btn-fill btn-round btn-behance btn-tooltip" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat seluruh Vote Kontra">
                                <i></i>Kontra : <b><?php if($kontra['SUM(polling_kontra)'] == '') { echo "0"; } else { echo $kontra['SUM(polling_kontra)']; };?></b>
                            </a></label></p>
                           
                            </center>
                            </form>
                    <br>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>

                   
                </div>

                <div class="col-md-3 col-md-offset-1">
                  <div class="social-buttons">
                      <h3 class="title title-blog">Shares</h3>
                      <div
  class="fb-like"
  data-share="true"
  data-width="1000"
  data-show-faces="true">
</div>
                     <div id="status">
</div>
                  </div>


                  <h3 class="title title-blog">Tags </h3>
                  <?php 
                   $get = $row1['id_posting'];
                   $getags = $user_home->getTags($get);


                   foreach($getags as $data){ ?>
                  <a href="analisis.html?tags=<?php echo $data['name'];?>#analisis" target="_blank"> <span class="label label-warning label-fill"><b><?php echo $data['name'];?></b></span></a>
                  
                  <?php } ?>
                  
        </div>  
                  </div>
                

            </div>

          </div>

    </div>

    </div><!-- section -->
   

<!-- ajax vote -->
<div class='contents fade out'>
<div class="section section-gray section-description" id="komen">
      <div class="container container-comments">
        <h3 class="title">Ayo Vote!</h3>

        <div class="row">
                <div class="col-md-8 ">
                    <div class="media-area">
                    <div id="media">



                    <?php 
                    if($_GET['polling'] =='pro') { 

                    
                              
                              $stmt = $user_home->runQuery("SELECT * FROM komentar_posting, member WHERE komentar_posting.email=member.email AND komentar_posting.id_posting=:id AND polling_pro=:pol ORDER BY id_komentar DESC LIMIT 10");
                               $stmt->execute(array(":id"=>$row1['id_posting'],":pol"=>'1'));

                             } elseif($_GET['polling'] =='kontra') { 

                              $stmt = $user_home->runQuery("SELECT * FROM komentar_posting, member WHERE komentar_posting.email=member.email AND komentar_posting.id_posting=:id AND polling_kontra=:pol ORDER BY id_komentar DESC LIMIT 10");
                               $stmt->execute(array(":id"=>$row1['id_posting'],":pol"=>'1'));
                             } else {

                              $stmt = $user_home->runQuery("SELECT * FROM komentar_posting, member WHERE komentar_posting.email=member.email AND komentar_posting.id_posting=:id ORDER BY id_komentar DESC LIMIT 10");
                               $stmt->execute(array(":id"=>$row1['id_posting']));
                             }
                                while($komen = $stmt->fetch()){
                                  ?>

                        <div class="media">
                              <a class="pull-left">
                               <div class="avatar">
                                   <?php if($komen['jk'] =='Boy') { ?>
                                      <img class="media-object" src="assets/img/boy.png" alt="<?php echo $komen['nama_member'];?>" title="<?php echo $komen['nama_member'];?>"/>
                                      <?php } else {  ?>
                                       <img class="media-object" src="assets/img/girl.png" alt="<?php echo $komen['nama_member'];?>" title="<?php echo $komen['nama_member'];?>"/>
                                      <?php } ?>
                                      
                               </div>
                              </a>
                              <div class="media-body">
                                <h4 class="media-heading"><?php echo $komen['nama_member'];?></h4>
                                <h6 class="pull-right text-muted"><i class="fa fa-calendar"></i> <?php echo tanggal($komen['tanggal_komentar']);?></h6>
                                <p><?php 
                                if($komen['polling_pro'] == 1) {
                                  echo "<button class='btn btn-social btn-fill btn-round btn-reddit'>
                                <i></i>Pro</button>"; 
                                  } else { 
                                    echo "<button class='btn btn-social btn-fill btn-round btn-behance'>
                                <i></i>Kontra</button>";
                                  }
                                    ?>
                                    </p>
                                <p>Sumber Referensi : <a target="_blank" href="<?php echo $komen['source'];?>"><?php echo $komen['source'];?></a></p>
                                <p>Ulasan : <?php echo $komen['isi_komentar'];?></p>

                               
                              </div>
                        </div> <!-- end media -->
                        <?php } ?>
                        <!--  Comment                    -->
                        
                       
                    </div>
<div class="media media-post">
                        <h3 class="title">Tulis Vote Anda</h3>
                              <a class="pull-left author" href="#">
                                  <div class="avatar">
                                      <?php if($profil['jk'] =='Boy') { ?>
                                      <img class="media-object" src="assets/img/boy.png" alt="<?php echo $profil['nama_member'];?>" title="<?php echo $profil['nama_member'];?>"/>
                                      <?php } elseif($profil['jk'] =='Girl') {  ?>
                                       <img class="media-object" src="assets/img/girl.png" alt="<?php echo $profil['nama_member'];?>" title="<?php echo $profil['nama_member'];?>"/>
                                      <?php } elseif($_SESSION['userSession'] =='') {  ?>
                                       <img class="media-object" src="assets/img/user_default.png" alt="<?php echo $profil['nama_member'];?>" title="Anda Belum Login"/>
                                      <?php } ?>
                                  </div>
                              </a>
                              <br/>
                              <div class="media-body">
                               <?php
                  if($_SESSION['userSession'] == '') { ?>
                  <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="ace-icon fa fa-times"></i>
                                        </button>

                                        <i class="ace-icon fa fa-close bigger-120 red"></i>
                                        Anda harus <a href="#" data-toggle="modal" data-target="#loginModal"> Login </a> terlebih dahulu untuk melakukan vote
                                    </div></center>
                   <?php } else { ?>

                              <form method="post" id="polling-form">
                              <div class="form-group">
                                <input type="hidden" name="get" id="get" value="<?php echo $row1['id_posting'];?>" /> 
                                 <label class="inline">
                            <input type="radio" name="polling" id="polling" value="Pro"/>
                            Pro  
                            </label>
                            &nbsp; &nbsp; &nbsp;
                            <label class="inline">
                          <input type="radio" name="polling" id="polling" value="Kontra" /> 
                            Kontra  
                            </label>
                               <span class="help-block" id="error"></span>
                            </div>
                        <div class="form-group">
                                <label for="email">Source Berita</label>
                                <input type="url" name="source1" class="form-control" id="source1" placeholder="https://news.detik.com/berita/d-3604024/polisi-minta-klarifikasi-walkot-kendari-atas-laporan-model-seksi" required maxlength="150" minlength="2"  />
                                <span class="help-block" id="error"></span> 
                            </div>
                             <div class="form-group">
                                <label for="email">Ulasan Saya</label>
                               <textarea class="form-control" name="alasan" id="alasan" rows="8" placeholder="Ulasan Saya..."></textarea>
                                <span class="help-block" id="error"></span> 
                            </div>

                             <div class="media-footer">
                             <?php if($cekvote) { ?>
            <button type="submit" class="btn btn-danger btn-round btn-fill btn-wd pull-right" name="btn-simpan" id="btn-simpan" disabled="">
        <span class="fa fa-pencil"></span> Sudah Komen
      </button> 
      <?php } else { ?>
<button type="submit" class="btn btn-info btn-round btn-fill btn-wd pull-right" name="btn-simpan" id="btn-simpan">
        <span class="fa fa-pencil"></span> Komen
      </button> 
      <?php } ?>
      </form>
      <?php } }?>
        </div>  
                              </div>
                          </div>
                    </div> <!-- end media-area -->
                </div> <!-- end col-md-8 -->
            </div>
      </div>
</div>
<!-- end ajax vote-->

    </div>
  

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
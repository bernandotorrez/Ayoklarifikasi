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
<div class='contents'>
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
               <h2 class="section-title">Posting Isu</h2>
              
               
               <div class="row">
                    <div class="">
                      <div class="section">
           <div class="container">
              
               <div class="row">
                 <div class="col-md-6 col-md-offset-3">
                  <center> 
                      
                  <?php
                  if($_SESSION['userSession'] == '' AND $_SESSION['adminSession'] == '') { ?>
                  <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="ace-icon fa fa-times"></i>
                                        </button>

                                        <i class="ace-icon fa fa-close bigger-120 red"></i>
                                        Anda harus <a href="#" data-toggle="modal" data-target="#loginModal"> Login </a> terlebih dahulu untuk memposting isu
                                    </div></center>
                   <?php } else { ?>

                                                  <form method="post" id="post-form" enctype="multipart/form-data">
      
      
        
     
         <section id="komplain"></section>
                         <p> Belum tahu cara melakukan Posting? silahkan lihat Tutorial nya di sini <a href="https://ayoklarifikasi.com/tutorial.html#tutorial" target="_blank"> Tutorial Posting Isu</a></p>
                        <div class="form-group">
                                <label for="email">Source Isu</label>
                                <input type="url" name="source" class="form-control" id="source" placeholder="https://news.detik.com/berita/d-3604024/polisi-minta-klarifikasi-walkot-kendari-atas-laporan-model-seksi" required maxlength="150" minlength="2"  />
                                <span class="help-block" id="error"></span> 
                            </div>
                               <div class="form-group">
                                <label for="email">Vote</label></br>
                                <input type="hidden" name="get" id="get" value="<?php echo base64_decode($_GET['id']);?>" /> 
                                 <label class="inline">
                            <input type="radio" name="vote" id="vote" value="Pro" required="" />
                            Pro  
                            </label>
                            &nbsp; &nbsp; &nbsp;
                            <label class="inline">
                          <input type="radio" name="vote" id="vote" value="Kontra" required="" /> 
                            Kontra  
                            </label>
                               <span class="help-block" id="error"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" id="tujuan" placeholder="Untuk mengklarifikasi bahwa berita ini salah" required maxlength="150" minlength="2"  />
                                <span class="help-block" id="error"></span> 
                            </div>
               <div class="form-group">
                                <label for="email">Ulasan Saya</label>
                               <textarea class="form-control" name="komentar" id="komentar" rows="8" placeholder="Ulasan Saya..."></textarea>
                                <span class="help-block" id="error"></span> 
                            </div>
                            <div class="form-group">
 <i class="fa fa-info-circle" data-toggle="popover" data-placement="top" title="Informasi" data-content="Tekan enter untuk menambahkan tags, gunakan form ini jika tags yang anda cari tidak tersedia"></i>
                                <label for="email" class="btn-tooltip" data-toggle="tooltip" data-placement="Tekan enter untuk menambahkan tags, gunakan form ini jika tags yang anda cari tidak tersedia"> Tambahkan Tags : <br>(Jika tags yang anda inginkan tidak tersedia pada Form "Pilih Tags" <br>Ketikkan Tags yang anda inginkan lalu Tekan Enter)&nbsp;</label>

                            <input type="text" class="form-control" name="tambahtags" id="tambahtags" placeholder="Tekan enter untuk menambahkan tags, gunakan form ini jika tags yang anda cari tidak ada" maxlength="25">
                                <span class="help-block" id="error"></span> 
                            </div>
 <div class="form-group">
 <i class="fa fa-info-circle" data-toggle="popover" data-placement="top" title="Informasi" data-content="Ketik tags yang diinginkan, lalu pilih"></i>
                                <label for="email" class="btn-tooltip" data-toggle="tooltip" data-placement="top" title="Ketik tags yang diinginkan, lalu pilih"> Pilih Tags : &nbsp;</label>

                            <select class="tags form-control" name="tags[]" id="tags" multiple="multiple" required="Isi Tags" placeholder="Ketik tags yang diinginkan, lalu pilih"></select>
                                <span class="help-block" id="error"></span> 
                            </div>
                       
                            
       
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="btn-simpan" id="btn-simpan">
        <span class="fa fa-pencil"></span> Posting
      </button> 
        </div>  
      
      </form>
                        
<?php } ?>


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
  <script type="text/javascript">
  $('#tambahtags').keydown(function(e) {
    if(e.keyCode == 13) {
       e.preventDefault();
 var data = $('#tambahtags').val();

   $.ajax({
       type : 'GET',
      url : 'ajax/addtag.php?tambahtags='+data, // --> server side code to insert data into db
     
      success : function(response){
        $('#tambahtags').val("");
       if(response=="Tambah Tags Berhasil"){
									
						
						$("#error").fadeIn(1000, function(){						
				 toastr.success(''+response+'', {timeOut: 5000});
											
									});
					} else if(response=="Tags tidak boleh kosong!"){ 
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										
									});
					} else if(response=="Tags Sudah Ada!"){ 
									
						$("#error").fadeIn(1000, function(){						
				toastr.error(''+response+'', {timeOut: 5000});
										
									});
					}  
      }
  });
return false;
     }
});
 
</script>
 
<script type="text/javascript">
    $( ".tags" ).select2({        
    ajax: {
        url: "/ajax/ajaxpro.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
            };
        },
        processResults: function (data) {
            // parse the results into the format expected by Select2.
            // since we are using custom formatting functions we do not need to
            // alter the remote JSON data
            return {
                results: data
            };
        },
        cache: true
    },
    minimumInputLength: 2
});

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
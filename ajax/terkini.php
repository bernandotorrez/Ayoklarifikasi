 <p>
<?php 

  require_once  '../class.user.php';
                     require_once '../config/library.php';
                     $user_home = new USER();
  $date = date('Y-m-d');
              $sql=mysqli_query($con,"SELECT * FROM posting, member where posting.email=member.email AND posting.tanggal_posting LIKE '%".$date."%'");
             $count=mysqli_num_rows($sql);
              if($count < 1) {
                echo "<h3>Tidak ada Isu yang dapat ditampilkan untuk hari ini</h3>";
              } else {
                            

                              while($row1 = mysqli_fetch_array($sql)) {
                               
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
                                       <p class="category text-warning">
                                            <i class="fa fa-lightbulb-o text-warning"></i> Isu Hari Ini
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
                     
                     } }
                    
                     ?>
                  </p>
     
              
                 
                      

            
         
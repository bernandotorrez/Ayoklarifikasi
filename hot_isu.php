 <div class="section section-testimonials">
        <div class="container">
            <h2 class="section-title">Isu Terhangat</h2>
             <div id="testimonials-carousel" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
             <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
             <?php
               $stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email order by view DESC LIMIT 1, 4");
$stmt->execute();

while($ol = $stmt->fetch()) {
  $i = 1;
 echo ' <li data-target="#myCarousel" data-slide-to='.$i++.'></li>';

}

$stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email order by view DESC LIMIT 1");
$stmt->execute();
$hot = $stmt->fetch(PDO::FETCH_ASSOC);

$gambar = $hot['isi_posting'];

                                 $gambar = preg_match('/(<img[^>]+>)/i', $gambar, $matches);

                                 $content = $hot['isi_posting'];
    $content = preg_replace("/<img[^>]+\>/i", " ", $content); 

    $string = strip_tags($content);

if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}


?>
   </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <div class="item active">
                      <div class="row">
                            <div class="col-md-12">
                        <div class="card">
                            <div class="image">
                               <img src="<?php echo $hot['image'];?>" alt="<?php echo $hot['isi'];?>" title="<?php echo $hot['isi'];?>" class="img-responsive"/>
                                <div class="filter filter-azure">
                                    <a type="button" class="btn btn-neutral btn-round" name="view" target="_blank" href="isu-<?php echo $hot['slug'];?>.html#isu">
                                       <i class="fa fa-align-left"></i> Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                           <div class="content">
                                <p class="category"><h3><?php echo $hot['judul_posting'];?></h3></p>
                               
                                <a class="card-link" name="view" target="_blank" href="isu-<?php echo $hot['slug'];?>.html#isu">
                                    <h4 class="title"><?php echo $string;?></h4>
                                </a>
                                 <div class="footer">
                                    <div class="author">
                                        <a class="card-link">
                                        
                                          <?php if($hot['jk'] =='Boy') { ?>
                                      <img class="avatar" src="assets/img/boy.png" alt="<?php echo $hot['nama_member'];?>" title="<?php echo $hot['nama_member'];?>"/>
                                      <?php } else {  ?>
                                       <img class="avatar" src="assets/img/girl.png" alt=" <?php echo $hot['nama_member'];?>" title="<?php echo $hot['nama_member'];?>"/>
                                      <?php } ?>
                                           <span> <?php echo $hot['nama_member'];?> </span>
                                        </a>
                                    </div>
                                    <div class="stats pull-right">
                                        
                                         <i class="fa fa-calendar"></i> <?php echo tanggal($hot['tanggal_posting']); ?>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                             
                        </div> <!-- end row -->
                    </div>
                                 <?php
               $stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email order by view DESC LIMIT 1, 4");
$stmt->execute();

while($hot1 = $stmt->fetch()) { 
$gambar1 = $hot1['isi_posting'];

                                 $gambar1 = preg_match('/(<img[^>]+>)/i', $gambar1, $matches1);

                                 $content1 = $hot1['isi_posting'];
    $content1 = preg_replace("/<img[^>]+\>/i", " ", $content1); 

    $string1 = strip_tags($content1);

if (strlen($string1) > 100) {

    // truncate string
    $stringCut1 = substr($string1, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string1 = substr($stringCut1, 0, strrpos($stringCut1, ' ')).'...'; 
}


  ?>
 <div class="item">
                      <div class="row">
                            <div class="col-md-12">
                        <div class="card">
                            <div class="image">
                               <img src="<?php echo $hot1['image'];?>" alt="<?php echo $hot1['isi'];?>" title="<?php echo $hot1['isi'];?>" class="img-responsive"/>
                                <div class="filter filter-azure">
                                    <a type="button" class="btn btn-neutral btn-round" name="view" target="_blank" href="isu-<?php echo $hot1['slug'];?>.html#isu">
                                       <i class="fa fa-align-left"></i> Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                           <div class="content">
                                <p class="category"><h3><?php echo $hot1['judul_posting'];?></h3></p>
                              
                                <a class="card-link" name="view" target="_blank" href="isu-<?php echo $hot1['slug'];?>.html#isu">
                                    <h4 class="title"><?php echo $string1;?></h4>
                                </a>
                                 <div class="footer">
                                    <div class="author">
                                        <a class="card-link">
                                        
                                          <?php if($hot1['jk'] =='Boy') { ?>
                                      <img class="avatar" src="assets/img/boy.png" alt="<?php echo $hot1['nama_member'];?>" title="<?php echo $hot1['nama_member'];?>"/>
                                      <?php } else {  ?>
                                       <img class="avatar" src="assets/img/girl.png" alt=" <?php echo $hot1['nama_member'];?>" title="<?php echo $hot1['nama_member'];?>"/>
                                      <?php } ?>
                                           <span> <?php echo $hot1['nama_member'];?> </span>
                                        </a>
                                    </div>
                                    <div class="stats pull-right">
                                       
                                         <i class="fa fa-calendar"></i> <?php echo tanggal($hot1['tanggal_posting']); ?>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                             
                        </div> <!-- end row -->
                    </div>
<?php
}
?>
                    
                    
                    
                    
                  </div>

                  <!-- Controls -->
                  <a class="left carousel-control" href="#testimonials-carousel" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                  </a>
                  <a class="right carousel-control" href="#testimonials-carousel" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                  </a>
            </div>
        </div>
    </div>
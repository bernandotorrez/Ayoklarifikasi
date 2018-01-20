 <p>
<?php 

  require_once  '../class.user.php';
                     require_once '../config/library.php';
                     $user_home = new USER();
  
              $sql=mysqli_query($con,"SELECT member.email, member.nama_member, posting.judul_posting, posting.slug, komentar_posting.id_posting, SUM(komentar_posting.polling_pro) + SUM(komentar_posting.polling_kontra) as vote FROM komentar_posting, member, posting WHERE komentar_posting.id_posting=posting.id_posting AND posting.email=member.email GROUP BY komentar_posting.id_posting HAVING vote >= 1 ORDER BY vote DESC LIMIT 3");
             $count=mysqli_num_rows($sql);
             $i = 1;
              if($count < 1) {
                echo "<h3>Belum ada Isu Terpopuler</h3>";
              } else {
                            

                              while($row1 = mysqli_fetch_array($sql)) {
                               
                     if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}




                                ?>
       <div class="col-md-10 col-md-offset-1">
                        <div class="card card-horizontal">
                            <div class="row">
                              
                               
                                     <div class="content">
                                       <p class="category text-warning">
                                            <i class="fa fa-trophy text-warning"></i> Isu Dengan Vote Terbanyak
                                        </p>
                                      <?php 

                                      echo $i++.". Nama Pemosting : ".$row1['nama_member'];
                                      
                                       echo "<br>"." Judul Isu : <a target='_blank' href=isu-".$row1['slug'].".html#isu>".$row1['judul_posting']."</a>";
                                        echo "<br>"." Total Vote : ".$row1['vote'];
                                      ?>
                                        
                                    </div>
                                
                            </div>
                        </div> <!-- end card -->
                    </div>
                   
          <?php 
                     
                     } }
                    
                     ?>
                  </p>
     
              
                 
                      

            
         
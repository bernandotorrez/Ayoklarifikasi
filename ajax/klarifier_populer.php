 <p>
<?php 

  require_once  '../class.user.php';
                     require_once '../config/library.php';
                     $user_home = new USER();
  
              $sql=mysqli_query($con,"SELECT * FROM member ORDER BY total_vote DESC LIMIT 3");
             $count=mysqli_num_rows($sql);
             $i = 1;
              if($count < 1) {
                echo "<h3>Belum ada Klarifier Terpopuler</h3>";
              } else {
                            

                              while($row1 = mysqli_fetch_array($sql)) {
                               
                  


                                ?>
       <div class="col-md-10 col-md-offset-1">
                        <div class="card card-horizontal">
                            <div class="row">
                              
                               
                                     <div class="content">
                                       <p class="category text-danger">
                                            <i class="fa fa-trophy text-danger"></i> Klarifier Dengan Vote Terbanyak
                                        </p>
                                    
                                     <?php if($row1['jk'] =='Boy') { ?>
                                      <center><img class="img-circle" height="50" width="50" src="../assets/img/boy.png" alt="<?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/></center>
                                      <?php } else {  ?>
                                       <center><img class="img-circle" height="50" width="50" src="../assets/img/girl.png" alt="<?php echo $row1['nama_member'];?>" title="<?php echo $row1['nama_member'];?>"/></center>
                                        
                                      <?php } 
                                      
                                  
                                      echo $i++.". Nama : ".$row1['nama_member'];
                                     
                                      
                                        echo "<br>"." Total Vote : ".$row1['total_vote'];
                                      ?>
                                        

                                </div>
                            </div>
                        </div> <!-- end card -->
                    </div>
                   
          <?php 
                     
                     } }
                    
                     ?>
                  </p>
     
              
                 
                      

            
         
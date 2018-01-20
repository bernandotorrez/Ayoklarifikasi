

                     <?php
                     
                     require_once  '../class.user.php';
                     require_once '../config/library.php'; 
                  
                     
                              $id = base64_decode($_GET['id']);
                              
                $result = $con->query("SELECT * FROM komentar_posting, member WHERE komentar_posting.email=member.email AND komentar_posting.id_posting=$id ORDER BY id_komentar DESC LIMIT 10");
                              
                               


                                while($komen = $result->fetch_assoc()){
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
                        

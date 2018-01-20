
<?php 
require_once  'class.user.php';
$id = base64_decode($_GET['id']);

$sql = mysqli_query($con, "SELECT * FROM posting, member where posting.email=member.email AND id_posting=$id LIMIT 1");                           
 $row1 = mysqli_fetch_array($sql);

$pro = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(polling_pro)
FROM komentar_posting
WHERE id_posting=$id LIMIT 1"));

$kontra = mysqli_fetch_array(mysqli_query($con, "SELECT SUM(polling_kontra)
FROM komentar_posting
WHERE id_posting=$id LIMIT 1"));

?> 

<center><p><label class="inline"><a href="<?php echo $url;?>-pro.html#komen" class="btn btn-social btn-fill btn-round btn-reddit btn-tooltip" name="polling" value="pro" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat seluruh Vote Pro">
                                <i></i>Pro : <b><?php if($pro['SUM(polling_pro)'] == '') { echo "0"; } else { echo $pro['SUM(polling_pro)']; };?></b>
                            </a></label>
                             &nbsp; &nbsp; &nbsp;
                            <label class="inline"><a href="<?php echo $url;?>-kontra.html#komen" class="btn btn-social btn-fill btn-round btn-behance btn-tooltip" data-toggle="tooltip" data-placement="top" title="Klik untuk melihat seluruh Vote Kontra">
                                <i></i>Kontra : <b><?php if($kontra['SUM(polling_kontra)'] == '') { echo "0"; } else { echo $kontra['SUM(polling_kontra)']; };?></b>
                            </a></label></p>
                           
                            </center>
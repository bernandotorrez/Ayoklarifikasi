<?php

$judul = "Ayo Klarifikasi!";

if($_GET['id'] == '') {
	$detail = "Ayo Klarifikasi Bersama!";
} else {
	 $id = $_GET['id'];

            $stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email AND slug=:uid LIMIT 1");
$stmt->execute(array(":uid"=>$id));
$a= $stmt->fetch(PDO::FETCH_ASSOC);

$detail = str_replace("-", " ", $a['judul_posting']);
$detail = ucwords($detail);
$image = $a['image'];
$slug = $a['slug'];
                    
}

?>

 <?php
 if($_GET['id'] != '') {
                 $id = $_GET['id'];

            $stmt = $user_home->runQuery("SELECT * FROM posting, member where posting.email=member.email AND slug=:uid LIMIT 1");
$stmt->execute(array(":uid"=>$id));
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

                                

                                $content = $row1['isi_posting'];
   

    $string = strip_tags($content);

if (strlen($string) > 250) {

    // truncate string
    $stringCut = substr($string, 0, 250);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... Ayo Klarifikasi Bersama - ayoklarifikasi.com'; 
}
    $image = $a['image'];
    $slug = $a['slug'];
   } else {
   	
   }

                                ?>
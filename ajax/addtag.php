<?php

	require_once  '../class.user.php';
	include "../config/xss_clean.php";
                     require_once '../config/library.php'; 
                     $xss_clean = new xssClean();
$tags =  $xss_clean->clean_input(aman($_GET['tambahtags']));
$tags = ucwords($tags);
$tags = ltrim($tags);
if (strlen($tags) > 0 && strlen(trim($tags)) == 0 OR $tags == '' AND $tags= ' '){
	echo "Tags tidak boleh kosong!";
} else {
if( strpos($tags, ',') === false )
 {
 	$cek = sprintf("SELECT * FROM tags_db WHERE name=('%s');", $tags);
 	$hasil = $con->query($cek);
 	while($row = $hasil->fetch_assoc()){
 		$a =  $row['name'];
 	}
if($a == ''){
	$sql = sprintf("INSERT INTO tags_db (name) VALUES ('%s');", $tags);

	$result = $con->query($sql);

	echo "Tambah Tags Berhasil";

} elseif($a != ''){
echo "Tags Sudah Ada!";
}


    
 } else {
//code mengambil string terakhir dari comma
 	$tags = substr($tags, strrpos($tags, ',') + 1);
$cek = sprintf("SELECT * FROM tags_db WHERE name=('%s');", $tags);
 	$hasil = $con->query($cek);
 	while($row = $hasil->fetch_assoc()){
 		$a =  $row['name'];
 	}
if($a == ''){
	$sql = sprintf("INSERT INTO tags_db (name) VALUES ('%s');", $tags);

	$result = $con->query($sql);
echo "Tambah Tags Berhasil";
} elseif($a != ''){
echo "Tags Sudah Ada!";
}


}
	}

	
?>
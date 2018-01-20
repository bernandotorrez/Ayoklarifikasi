<?php

	require_once  '../class.user.php';
                     require_once '../config/library.php'; 
$item = $_GET['tags'];

$id = base64_decode($_GET['id']);
$cek1 = sprintf("SELECT * FROM tags WHERE id_posting=('%s') AND name=('%s');", $id,$item);
 	$hasil1 = $con->query($cek1);
 	while($row1 = $hasil1->fetch_assoc()){
 		$a1 =  $row1['name'];
 	}
if($a1 == ''){
	$sql = sprintf("INSERT INTO tags (id_posting,name) VALUES ('%s','%s');", $id, $item);

	$result = $con->query($sql);

} else {

}
	

	
?>
<?php

	require_once  '../class.user.php';
                     require_once '../config/library.php'; 

	$sql = "SELECT id_posting,judul_posting FROM posting 
			WHERE judul_posting LIKE '%".$_GET['query']."%'
			LIMIT 10"; 

	$result = $con->query($sql);

	$json = [];
	while($row = $result->fetch_assoc()){
		
                        
	     $json[] =  $row['judul_posting'];
	     
	}

	echo json_encode($json);
?>
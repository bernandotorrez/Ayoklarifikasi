<?php

  require_once  '../class.user.php';
                     require_once '../config/library.php'; 
$user_home = new USER();
  $search = strip_tags(trim($_GET['q'])); 

// Do Prepared Query 
$stmt = $user_home->runQuery("SELECT * FROM tags_db WHERE name LIKE :search LIMIT 40");

// Add a wildcard search to the search variable
$stmt->execute(array(':search'=>"%".$search."%"));

// Do a quick fetchall on the results
$list = $stmt->fetchall(PDO::FETCH_ASSOC);

// Make sure we have a result
if(count($list) > 0){
   foreach ($list as $key => $value) {
    $data[] = array('id' => $value['id_tags'], 'text' => $value['name']);              
   } 
} else {
    $data[] = array('id' => '', 'text' => 'Tags Tidak Ditemukan');
}

// return the result in json
echo json_encode($data);
?>
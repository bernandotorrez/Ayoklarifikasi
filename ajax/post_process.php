<?php
 

session_start();
include "../config/library.php";
include "../config/xss_clean.php";
require_once '../class.user.php';
$user_home = new USER();
$xss_clean = new xssClean();
  if(isset($_POST['btn-simpan']))
  {
    //$user_name = $_POST['user_name'];
    require_once '../grab/Readability.php';
 $og = $user_home->fetch_og($_POST['source']);


$image = $og['image'];
$url = $_POST['source'];
$html = file_get_contents($url);

if (function_exists('tidy_parse_string')) {
  $tidy = tidy_parse_string($html, array(), 'UTF8');
  $tidy->cleanRepair();
  $html = $tidy->value;
}

// give it to Readability
$readability = new Readability($html, $url);
// print debug output? 
// useful to compare against Arc90's original JS version - 
// simply click the bookmarklet with FireBug's console window open
$readability->debug = false;
// convert links to footnotes?
$readability->convertLinksToFootnotes = true;
// process it
$result = $readability->init();
// does it look like we found what we wanted?
if ($result) {
  
  $judul = $readability->getTitle()->textContent;
  
  $content = $readability->getContent()->innerHTML;
  // if we've got Tidy, let's clean it up for output
  if (function_exists('tidy_parse_string')) {
    $tidy = tidy_parse_string($content, array('indent'=>true, 'show-body-only' => true), 'UTF8');
    $tidy->cleanRepair();
    $content = $tidy->value;
  }
  
  $judul = $readability->getTitle()->textContent;
  $judul = $judul." - Ayo Klarifikasi";
  $slug = str_replace(" ", "-", $readability->getTitle()->textContent);
$slug = preg_replace('/[^A-Za-z0-9\-]/', "", $slug);
                        $slug = strtolower($slug);
  $slug = $slug."-ayoklarifikasi";
                        
} else {
  
}
 
  $source = $xss_clean->clean_input($url);
  
  $tujuan = $xss_clean->clean_input($_POST['tujuan']);
  $vote = $xss_clean->clean_input($_POST['vote']);
  $komentar = $xss_clean->clean_input($_POST['komentar']);
  $isi = $xss_clean->clean_input($_POST['isi']);
  $email = $_SESSION['userSession'];
    $tags = $_POST['tags'];
   	$today = date('dmY');
    $stmt = $user_home->runQuery("select max(id_posting) from posting where id_posting like'%$today%'");
$stmt->execute();
  $datakode = $stmt->fetch();

  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 8);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = date('dmY').str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = date('dmY')."001";
  }
           
     if($user_home->posting_berita($judul,$source,$content,$email,$kode_otomatis,$tujuan,$vote,$komentar,$tags,$slug,$image)) { 
 echo "Posting Isu Berhasil";
          exit;
} else {
   echo "Posting Isu Gagal";
          exit;
}
   }

?>


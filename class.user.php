<?php

require_once 'config/dbconfig.php';
$url = $_SERVER['REQUEST_URI'];
class USER
{

	private $conn;

	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }

	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}

	public function lasdID()
	{
		$stmt = $this->conn->lastInsertId();
		return $stmt;
	}

	public function getUser()
	{
		try
		{
			$session = $_SESSION['userSession'];
			$stmt = $this->conn->prepare("SELECT * FROM login,member WHERE login.email=member.email and login.email=:id LIMIT 1");
			$stmt->execute(array(":id"=>$session));
			$profil = $stmt->fetch(PDO::FETCH_ASSOC);
			return $profil;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function getSitemap()
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT tanggal_posting, judul_posting, slug FROM posting ORDER BY tanggal_posting ASC");
			$stmt->execute();
			$sitemap = $stmt->fetchAll();
			return $sitemap;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function countSitemap()
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT judul_posting, slug FROM posting");
			$stmt->execute();
			$hitung = $stmt->rowCount();
			return $hitung;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function selected()
	{
		try
		{
			$id = 1;
			$stmt = $this->conn->prepare("SELECT status FROM modul WHERE id_modul = :id LIMIT 1");
			$stmt->execute(array(":id"=>$id));
			$selected = $stmt->fetch(PDO::FETCH_ASSOC);
			return $selected;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function getTags($get)
	{
		try
		{
			
			$stmt = $this->conn->prepare("SELECT * FROM tags WHERE id_posting=:id");
			$stmt->execute(array(":id"=>$get));
			$getags = $stmt->fetchAll();
			return $getags;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function getTagss()
	{
		try
		{
			
			$stmt = $this->conn->prepare("SELECT name FROM tags_db");
			$stmt->execute();
			$getagss = $stmt->fetchAll();
			return $getagss;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function cekVote($get)
	{
		$user_home = new USER();
		try
		{
			$session = $_SESSION['userSession'];
			$stmt = $this->conn->prepare("SELECT id_posting, email FROM komentar_posting WHERE id_posting=:id AND email=:mail LIMIT 1");
			$stmt->execute(array(":id"=>$get,":mail"=>$session));
			

			if($stmt->rowCount() == 1)
			{
						return true;
						exit;
					
				
			}
			else
			{
				return false;
						exit;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function getAdmin()
	{
		try
		{
			$session = $_SESSION['adminSession'];
			$stmt = $this->conn->prepare("SELECT * FROM admin WHERE akses_token=:id LIMIT 1");
			$stmt->execute(array(":id"=>$session));
			$profil = $stmt->fetch(PDO::FETCH_ASSOC);
			return $profil;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}


		public function register_member($remail,$rnama,$rpass,$passkey,$jk)
	{
		try
		{
			$rupass = md5($rpass);

			$stmt = $this->conn->prepare("INSERT INTO login(email,password,passkey)
			                                             VALUES(:user_mail, :password, :passkey)");
			$stmt->bindparam(":user_mail",$remail);
			$stmt->bindparam(":password",$rupass);
			$stmt->bindparam(":passkey",$passkey);
			$stmt->execute();

			$stmt = $this->conn->prepare("INSERT INTO member(email,nama_member,jk)
			                                             VALUES(:user_mail, :nama,:jk)");
			$stmt->bindparam(":user_mail",$remail);
			$stmt->bindparam(":nama",$rnama);
			$stmt->bindparam(":jk",$jk);
			$stmt->execute();
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}




	public function posting_berita($judul,$source,$content,$email,$kode_otomatis,$tujuan,$vote,$komentar,$tags,$slug,$image)
	{
		try
		{
			 // example http url ##
$isi = str_replace('http://', 'https://', $isi ); 
			$now = date('Y/m/d H:i:s');
			$stmt = $this->conn->prepare("INSERT INTO posting(id_posting,judul_posting,isi_posting,tanggal_posting,email,source,tujuan,vote,komentar,slug,image)													 VALUES(:kode, :judul, :isi, :tanggal, :email, :source,:tujuan,:vote,:komentar,:slug,:image)");
			$stmt->bindparam(":kode",$kode_otomatis);
			$stmt->bindparam(":judul",$judul);
			$stmt->bindparam(":isi",$content);
			$stmt->bindparam(":tanggal",$now);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":source",$source);
			$stmt->bindparam(":tujuan",$tujuan);
			$stmt->bindparam(":vote",$vote);
			$stmt->bindparam(":komentar",$komentar);
			$stmt->bindparam(":slug",$slug);
			$stmt->bindparam(":image",$image);
			$stmt->execute();

			foreach ($tags as $t) {
				if($t=="0"){

				} else {
      $stmt = $this->conn->prepare("SELECT * FROM tags_db WHERE id_tags=:id");
      $stmt->execute(array(":id"=>$t));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

       $stmt = $this->conn->prepare("INSERT INTO tags(id_posting,name)
                                                   VALUES(:id, :name)");
      $stmt->execute(array(":id"=>$kode_otomatis,":name"=>$userRow['name']));
      
  }
}
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function saran($saran)
	{
		try
		{
			$now = date('Y/m/d H:i:s');
			$stmt = $this->conn->prepare("INSERT INTO saran(saran, tanggal_saran)													 VALUES(:saran,:tanggal)");

			$stmt->bindparam(":saran",$saran);
			$stmt->bindparam(":tanggal",$now);
			$stmt->execute();

			
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function maintanance($status)
	{
		try
		{
			$id = 1;
			$stmt = $this->conn->prepare("UPDATE modul SET status = :status WHERE id_modul = :uid LIMIT 1");

			$stmt->bindparam(":status",$status);
			$stmt->bindparam(":uid",$id);
			$stmt->execute();

			
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}


public function kontak_kami($email,$subject,$pesan)
	{
		try
		{
			$now = date('Y/m/d H:i:s');
			$stmt = $this->conn->prepare("INSERT INTO kontak_kami(email, subject, pesan, tanggal_pesan)													 VALUES(:email,:subject,:pesan,:tanggal)");

			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":subject",$subject);
			$stmt->bindparam(":pesan",$pesan);
			$stmt->bindparam(":tanggal",$now);
			$stmt->execute();

			
			return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}
	

	public function login($email,$upass)
	{
		$user_home = new USER();
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM login WHERE email=:email_id LIMIT 1");
			$stmt->execute(array(":email_id"=>$email));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				if($userRow['status_member']=="sudah")
				{
					if($userRow['password']==md5($upass))
					{
						$user_home->checkbrute($email);
						$_SESSION['userSession'] = $userRow['email'];
						echo "ok";
						

					}
					else
					{
						$user_home->checkbrute($email);

						 $now = time();
						$stmt = $this->conn->prepare("INSERT INTO anti_bruteforce(email,time)
			                                             VALUES(:user_mail, '$now')");
						$stmt->bindparam(":user_mail",$email);
						$stmt->execute();
						echo "Error";
						exit;
					}
				}
				else
				{
					echo "Inactive";
					exit;
				}
			}
			else
			{
				echo "Error";
				exit;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function admin($token)
	{
		$user_home = new USER();
		try
		{
			$stmt = $this->conn->prepare("SELECT akses_token FROM admin WHERE akses_token=:token LIMIT 1");
			$stmt->execute(array(":token"=>$token));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
						$_SESSION['adminSession'] = $userRow['akses_token'];

						echo "Akses Admin Diterima!";
						exit;
					
				
			}
			else
			{
				echo "Akses Admin Ditolak!";
				exit;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function underConstruction()
	{
		$user_home = new USER();
		try
		{
			$stmt = $this->conn->prepare("SELECT status FROM modul WHERE id_modul=:id LIMIT 1");
			$stmt->execute(array(":id"=>'1'));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($userRow['status'] == 'Konstruksi' AND $_SESSION['adminSession'] =='')
			{
						header("Location: underconstruction.html");
						exit;
					
				
			}
			else
			{
				
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function polling_pro($email,$idpost,$source,$alasan)
	{
		$user_home = new USER();
		try
		{
			$isi = '1';
			
			$now = date('Y/m/d H:i:s');
			$stmt = $this->conn->prepare("SELECT * FROM komentar_posting WHERE email=:email_id AND id_posting=:id LIMIT 1");
			$stmt->execute(array(":email_id"=>$email,":id"=>$idpost));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				echo "Anda sudah melakukan Polling";
				exit;
			}
			else
			{
				$stmt = $this->conn->prepare("INSERT INTO komentar_posting(id_posting,email,tanggal_komentar,isi_komentar,source,polling_pro)
			                                             VALUES(:idpost, :email, :tgl, :komen, :source, :polling)");
			
			$stmt->bindparam(":idpost",$idpost);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":tgl",$now);
			$stmt->bindparam(":komen",$alasan);
			$stmt->bindparam(":source",$source);
			$stmt->bindparam(":polling",$isi);
			$stmt->execute();

			$stmt = $this->conn->prepare("UPDATE member SET total_vote = total_vote + 1 WHERE email = :uid LIMIT 1");
			$stmt->bindparam(":uid",$email);
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function polling_kontra($email,$idpost,$source,$alasan)
	{
		$user_home = new USER();
		try
		{
			$isi = '1';
			
			$now = date('Y/m/d H:i:s');
			$stmt = $this->conn->prepare("SELECT * FROM komentar_posting WHERE email=:email_id AND id_posting=:id LIMIT 1");
			$stmt->execute(array(":email_id"=>$email,":id"=>$idpost));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

			if($stmt->rowCount() == 1)
			{
				echo "Anda sudah melakukan Polling";
				exit;
			}
			else
			{
				$stmt = $this->conn->prepare("INSERT INTO komentar_posting(id_posting,email,tanggal_komentar,isi_komentar,source,polling_kontra)
			                                             VALUES(:idpost, :email, :tgl, :komen, :source, :polling)");
			
			$stmt->bindparam(":idpost",$idpost);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":tgl",$now);
			$stmt->bindparam(":komen",$alasan);
			$stmt->bindparam(":source",$source);
			$stmt->bindparam(":polling",$isi);
			$stmt->execute();

			$stmt = $this->conn->prepare("UPDATE member SET total_vote = total_vote + 1 WHERE email = :uid LIMIT 1");
			$stmt->bindparam(":uid",$email);
			$stmt->execute();

			return $stmt;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}

	public function is_logged_in()
	{
		if(isset($_SESSION['userSession']) OR isset($_SESSION['adminSession']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
	
		session_destroy();
		$_SESSION['userSession'] = false;
		$_SESSION['adminSession'] = false;
	}

	function checkbrute($email) {
    // Get timestamp of current time
    $now = time();

    // All login attempts are counted from the past 5 minutes
    $valid_attempts = $now - (5 * 60);


    if ($stmt = $this->conn->prepare("SELECT time
                             FROM anti_bruteforce
                             WHERE email = :email
                            AND time > '$valid_attempts'")) {
     $stmt->execute(array(":email"=>$email));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        // If there have been more than 5 failed logins
        if ($stmt->rowCount() >= 5) {
            	echo "Bruteforce";
						exit;
        } else {
            return false;
        }
    }
}

public function waktu_lalu($timestamp)
{
    $selisih = time() - strtotime($timestamp) ;
 
    $detik = $selisih ;
    $menit = round($selisih / 60 );
    $jam = round($selisih / 3600 );
    $hari = round($selisih / 86400 );
    $minggu = round($selisih / 604800 );
    $bulan = round($selisih / 2419200 );
    $tahun = round($selisih / 29030400 );
 
    if ($detik <= 60) {
        $waktu = $detik.' detik yang lalu';
    } else if ($menit <= 60) {
        $waktu = $menit.' menit yang lalu';
    } else if ($jam <= 24) {
        $waktu = $jam.' jam yang lalu';
    } else if ($hari <= 7) {
        $waktu = $hari.' hari yang lalu';
    } else if ($minggu <= 4) {
        $waktu = $minggu.' minggu yang lalu';
    } else if ($bulan <= 12) {
        $waktu = $bulan.' bulan yang lalu';
    } else {
        $waktu = $tahun.' tahun yang lalu';
    }
    
    return $waktu;
}

public function fetch_og($url)
{
    $data = file_get_contents($url);
    $dom = new DomDocument;
    @$dom->loadHTML($data);
     
    $xpath = new DOMXPath($dom);
    # query metatags dengan prefix og
    $metas = $xpath->query('//*/meta[starts-with(@property, \'og:\')]');

    $og = array();

    foreach($metas as $meta){
        # ambil nama properti tanpa menyertakan og
        $property = str_replace('og:', '', $meta->getAttribute('property'));
        # ambil konten dari properti tersebut
        $content = $meta->getAttribute('content');
        $og[$property] = $content;
    }

    return $og;
}

}

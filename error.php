<?php
    if(isset($_GET['inactive']))
    {
      ?><center>
            <div class='alert alert-info' id="msg">

        <strong>Maaf!</strong> Akun Ini Belum Di Verifikasi, Cek Inbox Email Anda.
      </div></center>
            <?php
    }
    ?>
    <?php
    if(isset($_GET['error']))
{
  ?>
        <center><div class="alert alert-danger" id="msg">
  <strong>Email </strong>atau <strong>Password</strong> anda salah! </div></center>
        <?php
}

?>
<?php
    if(isset($_GET['sudahada']))
{
  ?>
        <center><div class="alert alert-danger" id="msg">
  <strong>Email sudah terdaftar!  </div></center>
        <?php
}

?>
<?php
    if(isset($_GET['daftarsukses']))
{
  ?>
        <center><div class="alert alert-success" id="msg">
  <strong>Pendaftaran sukses! cek email kamu untuk verifikasi </div></center>
        <?php
}

?>

    <?php
    if(isset($_GET['bruteforce']))
{
  ?>
        <center><div class="alert alert-danger" id="msg">
  <strong>Maaf!</strong> Anda gagal login lebih dari 5 kali, Untuk masalah keamanan, akun ini di Lock selama 5 menit. </div></center>
        <?php
}

?>
<?php
if(isset($_GET['lupapasssukses']))
{
  ?><center>
        <div class='alert alert-success' id="msg">

    Permintaan Lupa Password Anda di Terima, Silahkan Cek Inbox Email Anda.
  </div></center>
        <?php
}
?>
  <?php
if(isset($_GET['gagal']))
{
  ?><center>
        <div class='alert alert-danger' id="msg">

    Permintaan tidak dapat dilakukan.
  </div></center>
        <?php
}
?>
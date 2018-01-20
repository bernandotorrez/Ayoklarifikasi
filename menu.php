<?php 

if(isset($_SESSION['userSession'])) {
$profil = $user_home->getUser();
} elseif(isset($_SESSION['adminSession'])) {
$profil = $user_home->getAdmin();
}


?>
<nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button id="menu-toggle" type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>
      <a class="navbar-brand" href="home.html"><i class="fa fa-home"></i> Beranda</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul  class="nav navbar-nav navbar-right">

            <li>
                <a href="analisis.html#analisis">
                       <i class="pe-7s-graph1"></i> Analisis
                </a>
            </li>
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="pe-7s-pen"></i> Post Baru
                     <b class="caret"></b>
                </a>
                 <ul class="dropdown-menu dropdown-with-icons">
             <li>
                <a href="post.html#post">
                     <i class="pe-7s-pen"></i> Post Isu
                </a>
            </li>
            <li>
                        <a href="tutorial.html#tutorial">
                              <i class="pe-7s-info"></i> Cara Post Isu
                        </a>
                        
                    </li>
                    </ul>
                    </li>
                 <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="pe-7s-light"></i> Informasi
                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-with-icons">
                    <li>
                        <a href="tentang.html#tentang">
                             <i class="pe-7s-info"></i> Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="saran.html#saran">
                              <i class="pe-7s-comment"></i> Saran
                        </a>
                    </li>
                    <li>
                        <a href="kontak.html#kontak">
                              <i class="pe-7s-mail-open-file"></i> Kontak Kami
                        </a>
                    </li>
                     <li>
                        <a href="vote.html#vote">
                              <i class="pe-7s-cup"></i> Hasil Terpopuler
                        </a>
                    </li>
                     <li>
                        <a href="sitemap.html">
                              <i class="pe-7s-world"></i> Sitemap
                        </a>
                    </li>
                  </ul>
            </li>
          <?php
            if($_SESSION['userSession'] == '' AND $_SESSION['adminSession'] == '')
            {
          ?> 
               <li><a href="#" data-toggle="modal" data-target="#loginModal">
                             <i class="pe-7s-door-lock"></i> Login
                        </a>
                    </li>
          <?php } elseif($profil['level'] != 'Admin') { ?>
           <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="pe-7s-user"></i> <?php echo $profil['nama_member']; ?>
                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-with-icons">
                    <li>
                        <a href="profil.html#profil" class="text-success">
                             <i class="pe-7s-info"></i> Profil
                        </a>
                    </li>
                     <li><a href="logout.html" class="text-danger">
                              <i class="pe-7s-power"></i> Logout
                        </a>
                    </li>
                   
                  </ul>
            </li>
           
          <?php } elseif($profil['level'] =='Admin'){ ?>
      <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="pe-7s-user"></i> <?php echo $profil['nama_admin']; ?>
                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-with-icons">
                    <li>
                        <a href="panel.html#panel" class="text-success">
                             <i class="pe-7s-info"></i> Panel
                        </a>
                    </li>
                     <li><a href="logout.html" class="text-danger">
                              <i class="pe-7s-power"></i> Logout
                        </a>
                    </li>
                   
                  </ul>
            </li>
            <?php } ?>
         
       </ul>

    </div><!-- /.navbar-collapse -->
  </div>
</nav>
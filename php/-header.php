<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
   <img src="../img/logo.svg" class="logo">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link" href="index.php">Naslovna</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="o-hotelu.php">O hotelu</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="novosti.php">Novosti</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="raspolozivost.php">Raspoloživost</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
         </li>
         <li class="nav-item">
            <?php
               if(isset($_SESSION['username']) && ($_SESSION['vrsta']) == "AD"){
                   echo "<a href='admin.php'><button type='button' class='btn btn-primary' data-toggle='modal'><span class='pe-7s-users'></span> Profil</a> <a href='logout.php' style='margin-left:10px;'><button type='button' class='btn btn-primary' data-toggle='modal'><span class='pe-7s-users'></span> " . $_SESSION['username'] . ", Odjavite se</a><style>.lgn-h{display:none;}</style>";
                   }
               if(isset($_SESSION['username']) && ($_SESSION['vrsta']) == "KO"){
                   echo "<a href='user.php'><button type='button' class='btn btn-primary' data-toggle='modal'><span class='pe-7s-users'></span> Profil</a> <a href='logout.php' style='margin-left:10px;'><button type='button' class='btn btn-primary' data-toggle='modal'><span class='pe-7s-users'></span> " . $_SESSION['username'] . ", Odjavite se</a>";
                   }
                else echo "<button type='button' class='btn btn-primary lgn-h' data-toggle='modal' data-target='#exampleModal'><span class='pe-7s-users'></span> Prijavite se</button>";
               ?>
         </li>
      </ul>
   </div>
</nav>
<div id="mySidenav" class="sidenav">
   <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="pe-7s-close-circle"></span></a>
   <a href="soba-dahlia.php">Dahlia</a>
   <a href="soba-summer.php">Summer</a>
   <a href="soba-panorama.php">Panorama</a>
   <a href="soba-crazy-time.php">Crazy Time</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="open-menu">Smeštaj</span>
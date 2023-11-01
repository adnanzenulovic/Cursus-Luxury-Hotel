<?php
$soba = "summer"; 
include('server.php'); ?>
<html>
   <head>
      <title>Cursus Hotel</title>
      <?php include('-scripts.php'); ?>
   </head>
   <body>
      <?php include('-header.php'); ?>
      <div class="row">
      <div class="col blank-img">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
               <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="d-block w-100" src="../img/summer-01.jpg" alt="Fotografija 01">
               </div>
               <div class="carousel-item">
                  <img class="d-block w-100" src="../img/summer-02.jpg" alt="Fotografija 02">
               </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Prethodna</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Sledeća</span>
            </a>
         </div>
      </div>
      <div class="col pd__ver">
      <div class="container d-flex h-100">
         <div class="row justify-content-center align-self-center">
            <h1>Soba Summer</h1>
            <p><span class="cursus">CURSUS Hotel</span> omogućava gostu uživanje u standardnim sobama veličine 20m2-23m2. Tajna ove sobe, čiji naziv treba da asocira na moderno i praktično leži u predivnom dizajnu i detaljima u kojima gost može uživati: toaleti ograđeni dimnim ogledalom koji daju poseban osećaj prilikom boravka u sobi, staklene pregrade iza uzglavlja kreveta koje uz dekorativno osvetljenje i dizajniran print grana, daje utisak kao da ste u prirodi, tapete koje predstavljaju imitaciju biblioteke, a posebno dizajnirane za Jump Inn hotel. Uskočite u sobu koja je praktična, savremeno opremljena, a pritom pruža jedinstven dizajn koji nikoga ne ostavlja ravnodušnim.</p>
            <div class="container">
               <div class="row">
                  <div class="col">
                     <div class="ikonica">
                        <span class="flaticon-family-room"></span>
                        <h2>Porodična soba</h2>
                     </div>
                  </div>
                  <div class="col">
                     <div class="ikonica">
                        <span class="flaticon-reception-bell"></span>
                        <h2>Usluga recepcije</h2>
                     </div>
                  </div>
                  <div class="col">
                     <div class="ikonica">
                        <span class="flaticon-swimming-pool"></span>
                        <h2>Bazen</h2>
                     </div>
                  </div>
                  <div class="col">
                     <div class="ikonica">
                        <span class="flaticon-wifi-room"></span>
                        <h2>WI-FI</h2>
                     </div>
                  </div>
                  <div class="col">
                     <div class="ikonica">
                        <span class="flaticon-television"></span>
                        <h2>Smart TV</h2>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include('-footer.php'); ?>
   </body>
</html>
<?php include('server.php'); ?>
<html>
   <head>
      <title>Cursus Hotel</title>
      <?php include('-scripts.php'); ?>
   </head>
   <body>
      <?php include('-header.php'); ?>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
         </ol>
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="d-block w-100" src="../img/slide-01.jpg" alt="Prvi slide">
            </div>
            <div class="carousel-item">
               <img class="d-block w-100" src="../img/slide-02.jpg" alt="Drugi slide">
            </div>
         </div>
         <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Prethodni</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Sledeći</span>
         </a>
      </div>
      <div class="modal" tabindex="-1" role="dialog">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div id="regBox" style="padding-top: 6%; color: white;">
                     <form return="false" method="post" action="register.php">
                        <table style="color: white;">
                           <tr>
                              <td colspan="2" style="font-size: 220%;">Registrujte se!</td>
                           </tr>
                           <tr>
                              <td id="info">Ime</td>
                              <td id="info">Prezime</td>
                           </tr>
                           <tr>
                              <td><input type="text" name="ime" placeholder="Jovan" style="width: 100%; padding: 3%;"></td>
                              <td><input type="text" name="prezime" placeholder="Jovic" style="width: 100%; padding: 3%;"></td>
                           </tr>
                           <tr>
                              <td id="info">Korisnicko ime</td>
                           </tr>
                           <tr>
                              <td colspan="2"><input type="text" name="username" value="<?php echo $username; ?>" placeholder="Korisnicko ime" style="width: 100%; padding: 3%;"></td>
                           </tr>
                           <tr>
                              <td id="info" colspan="2">E-mail</td>
                           </tr>
                           <tr>
                              <td colspan="2"><input type="email" name="email" value="<?php echo $email; ?>" placeholder="example@mail.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" style="width: 100%;"></td>
                           </tr>
                           <tr>
                              <td id="info" colspan="2">Lozinka</td>
                           </tr>
                           <tr>
                              <td colspan="2"><input type="password" name="password" placeholder="Lozinka" style="width: 100%; padding: 3%;"></td>
                           </tr>
                           <tr>
                              <td  colspan="2"><button type="submit" name="reg_user" style="font-size: 140%; width: 100%; padding: 2%; color: white; cursor: pointer;">Registracija</button></td>
                           </tr>
                           <tr>
                              <td style="color: white;">Imate nalog? <a href="login.php">Prijavite se</a></td>
                           </tr>
                        </table>
                     </form>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php include('-footer.php'); ?>
   </body>
</html>
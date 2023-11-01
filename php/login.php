<?php include('server.php') ?>
<html>
   <head>
      <title>Cursus Hotel</title>
      <?php include('-scripts.php'); ?>
   </head>
   <body class="bg-cc">
      <?php include('-header.php'); ?>
      <div class="pom-content">
         <div class="forma-c">
            <form return="false" method="post" action="login.php">
            <label>Korisničko ime</label>
            <input type="text" placeholder="Korisničko ime" name="username" class="form-control" required>
            <label>Lozinka</label>
            <input type="password" placeholder="Lozinka" name="password" class="form-control" required>
            <button type="submit" name="login_user" class="btn btn-primary">Prijavi se</button>
            <br>
            <p>Nemate nalog?</p>
            <a href="register.php" class="btn btn-primary reg-btn">Registrujte se</a>
         </div>
      </div>

   </body>
</html>
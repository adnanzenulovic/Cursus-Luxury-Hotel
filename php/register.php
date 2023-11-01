<?php include('server.php'); ?>
<html>

<head>
   <title>Cursus Hotel</title>
   <?php include('-scripts.php'); ?>
</head>

<body class="bg-cc">
   <?php include('-header.php'); ?>
   <div class="pom-content">
      <div class="forma-c">
         <form return="false" method="post" action="register.php">
            <h1 style="color:#FFF;">Registrujte se!</h1>
            <label>Ime</label>
            <input type="text" name="ime" class="form-control" required>
            <label>Prezime</label>
            <input type="text" name="prezime" class="form-control" required>
            <label>Korisničko ime</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required>
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="example@mail.com"
               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control">
            <label>Pol:</label></br>
            <input type="radio" id="musko" name="pol" value="M" required>
            <label for="musko">Muško</label>
            <input type="radio" id="zensko" name="pol" value="Z">
            <label for="zensko">Žensko</label></br>
            <label>Lozinka</label>
            <input type="password" name="password" class="form-control" required>
            <button type="submit" name="reg_user" class="btn btn-primary">Registracija</button>
            <p>Imate nalog? <a href="login.php">Prijavite se</a></p>
         </form>
      </div>
   </div>
   </div>
   <?php include('-footer.php'); ?>
</body>

</html>
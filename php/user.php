<?php 
  include('server.php');

  if (!isset($_SESSION['username'])) {   
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<html>

<head>
    <title>Korisnik</title>
    <?php include('-scripts.php'); ?>
    
</head>

   <body class="bg-cc">
      <?php include('-header.php'); ?>

        <div class="pom-content">
               <div id="regBox" style="color: white;">
                  <h1 style="color:#FFF;">
                     <?php
                        echo "Dobro došli, ". $_SESSION['ime'] ."."; 
                        ?>
                  </h1>
                  <div class="form-bg">
                     <label>Ime i prezime</label>
                     <input type="text" placeholder="Ime" value="<?php echo $_SESSION['ime'] ?> <?php echo $_SESSION['prezime'] ?>" class="form-control" readonly>
                     <label>Korisničko ime</label>
                     <input type="text" value="<?php echo $_SESSION['username'] ?>" class="form-control" readonly>
                     <label>E-mail</label>
                     <input type="text" value="<?php echo $_SESSION['email'] ?>" placeholder="example@mail.com" class="form-control" readonly>
                     <label>Lozinka</label>
                     <input type="password" value="<?php echo $_SESSION['password'] ?>" placeholder="Lozinka" class="form-control" readonly>
                  </div>
               </div>
        </form>
    </div>

    <button class="btn btn-primary" style="display: block; margin: auto;"><a href="user.php?logout='1'">Odjavite se</a></button>
    <?php include('-footer.php'); ?>

</body>

</html>

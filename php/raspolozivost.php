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
      <title>Cursus Hotel</title>
      <?php include('-scripts.php'); ?>
   </head>
   <body>
      <?php include('-header.php'); ?>
      <div class="row">
         <div class="col about-img">
         </div>
         <div class="col pd__ver">
            <div class="container d-flex h-100">
               <div class="row justify-content-center align-self-center w100">
                  <div>
                     <h1>Raspoloživost</h1>
                     <p>Proverite raspoloživost soba</p>
                     <form action="raspolozivost.php" class="was-validated" return="false" method="post">
                        <select name="model_choose" class="form-control" required>
                           <option value="Dahlia">Dahlia</option>
                           <option value="Summer">Summer</option>
                           <option value="Panorama">Panorama</option>
                           <option value="Crazy Time">Crazy Time</option>
                        </select>
                        <br>
                        <p>Ime i prezime:</p>
                        <input type="text" name="adresa" class="form-control" required>
                        <br>
                        <p>Unesite broj telefona:</p>
                        <input type="tel" name="brTel" onkeypress="return isNumberKey(event)" class="form-control" required><br><br>
                        <button type="submit" name="order" class="btn btn-primary">Poslati</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include('-footer.php'); ?>
      <script>
         function isNumberKey(evt)
         {
         	var charCode = (evt.which) ? evt.which : evt.keyCode;
         	if (charCode != 46 && charCode > 31 
         	&& (charCode < 48 || charCode > 57))
         	return false;
         	return true;
         }  
         
         
         function isNumericKey(evt)
         {
         	var charCode = (evt.which) ? evt.which : evt.keyCode;
         	if (charCode != 46 && charCode > 31 
         	&& (charCode < 48 || charCode > 57))
         	return true;
         	return false;
         } 
            
      </script>
   </body>
</html>
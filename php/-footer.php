<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Prijavite se</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="modal-body">
         <div>
            <form return="false" method="post" action="login.php">
               <label>Korisničko ime</label>
               <input type="text" placeholder="Korisničko ime" name="username" class="form-control">
               <label>Lozinka</label>
               <input type="password" placeholder="Lozinka" name="password" class="form-control">
               <button type="submit" name="login_user" class="btn btn-primary">Prijavi se</button>
               <br>
               <p>Nemate nalog?</p>
               <a href="register.php" class="btn btn-primary reg-btn">Registrujte se</a>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
   function openNav() {
     document.getElementById("mySidenav").style.width = "250px";
     document.getElementById("main").style.marginLeft = "250px";
   }
   
   function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
     document.getElementById("main").style.marginLeft= "0";
   }
   
   jQuery(function ($) {
   var path = window.location.href;
   $('.navbar-nav li a').each(function () {
   if (this.href === path) {
   $(this).addClass('active');
   }
   });
   })
</script>
<?php include('server.php'); ?>
<html>
   <head>
      <title>Cursus Hotel</title>
      <?php include('-scripts.php'); ?>
   </head>
   <body>
      <?php include('-header.php'); ?>
      <div class="row">
         <div class="col blank-img">
            <div id="map"></div>
         </div>
         <div class="col pd__ver">
            <div class="container d-flex h-100">
               <div class="row justify-content-center align-self-center mm-c">
                  <div>
                     <form action="kontakt.php" class="was-validated" return="false" method="post">
                        <div class="form-group">
                           <h1>Kontakt</h1>
                           <p class="naglaseno">Kralja Milana 35, Beograd, 11000, Republika Srbija</p>
                        </div>
                        <div class="form-group">
                           <label for="uname">Ime i prezime:</label>
                           <input type="text" class="form-control" placeholder="Vaše ime i prezime" name="imePI" required>
                        </div>
                        <div class="form-group">
                           <label for="pwd">E-mail:</label>
                           <input type="email" class="form-control" placeholder="Vaša e-mail adresa" name="emailPI" required>
                        </div>
                        <div class="form-group">
                           <label for="pwd">Poruka:</label>
                           <textarea type="textarea" class="form-control" placeholder="Vaša poruka" name="dodInfoPI" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="send_msg">Poslati</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php include('-footer.php'); ?>
      <script>
         function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: 44.804175, lng: 20.466190},
         zoom: 15,
         scrollwheel: false,
         styles: [ { "featureType": "administrative", "elementType": "labels.text.fill", "stylers": [ { "color": "#444444" } ] }, { "featureType": "landscape", "elementType": "all", "stylers": [ { "color": "#f2f2f2" } ] }, { "featureType": "poi", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "road", "elementType": "all", "stylers": [ { "saturation": -100 }, { "lightness": 45 } ] }, { "featureType": "road.highway", "elementType": "all", "stylers": [ { "visibility": "simplified" } ] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [ { "color": "#ffffff" } ] }, { "featureType": "road.arterial", "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "featureType": "transit", "elementType": "all", "stylers": [ { "visibility": "off" } ] }, { "featureType": "water", "elementType": "all", "stylers": [ { "color": "#dde6e8" }, { "visibility": "on" } ] } ]
         });
         marker = new google.maps.Marker({
         map:map,
         animation: google.maps.Animation.DROP,
         position: new google.maps.LatLng(44.804175, 20.466190),
         icon: '../img/favicon.png'
         });
         }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBiNLh5sAKfAZ_f_MT9YwCgNHOKfx9MaBs&callback=initMap"></script>
   </body>
</html>
<?php
session_start();

$username = "";
$email = "";
$errors = array();
$jsonData = "";

$db = mysqli_connect('localhost', 'root', '', 'zenulovic');

if (isset($_POST['reg_user'])) {
  $vrsta = "KO";
  $ime = mysqli_real_escape_string($db, $_POST['ime']);
  $prezime = mysqli_real_escape_string($db, $_POST['prezime']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $pol = mysqli_real_escape_string($db, $_POST['pol']);

  $user_check_query = "SELECT * FROM registrovani WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  if (count($errors) == 0) {
    $password = $password;
    $query = "INSERT INTO registrovani (ime, prezime, username, email, password, vrsta,pol) 
  			  VALUES('$ime','$prezime','$username', '$email', '$password', '$vrsta','$pol')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['ime'] = $ime;
    $_SESSION['prezime'] = $prezime;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['vrsta'] = $vrsta;
    $_SESSION['success'] = "Uspesno!";
    header('location: user.php');
  }
}


if (isset($_POST['reg_admin'])) {
  $vrsta = "AD";
  $imeAD = mysqli_real_escape_string($db, $_POST['imeAD']);
  $prezimeAD = mysqli_real_escape_string($db, $_POST['prezimeAD']);
  $usernameAD = mysqli_real_escape_string($db, $_POST['usernameAD']);
  $emailAD = mysqli_real_escape_string($db, $_POST['emailAD']);
  $passwordAD = mysqli_real_escape_string($db, $_POST['passwordAD']);

  $user_check_query = "SELECT * FROM registrovani WHERE username='$usernameAD' OR email='$emailAD' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  if (count($errors) == 0) {
    $passwordAD = $passwordAD;

    $query = "INSERT INTO registrovani (ime, prezime, username, email, password, vrsta) 
  			  VALUES('$imeAD','$prezimeAD','$usernameAD', '$emailAD', '$passwordAD', '$vrsta')";

    mysqli_query($db, $query);
    $_SESSION['vrsta'] = $vrsta;
    header('location: admin.php');
  }
}


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  $korisnikKveri = "SELECT * FROM registrovani WHERE username='$username' AND password='$password', vrsta='KO'";
  $adminKveri = "SELECT * FROM registrovani WHERE username='$username' AND password='$password', vrsta='AD'";

  if (count($errors) == 0) {
    $password = $password;
    $query = "SELECT * FROM registrovani WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {

      $data = mysqli_fetch_array($results);

      $_SESSION["ime"] = $data['ime'];
      $_SESSION["prezime"] = $data['prezime'];
      $_SESSION["email"] = $data['email'];
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['vrsta'] = $data['vrsta'];

      if ($data['vrsta'] == "KO") {
        $_SESSION['vrsta'] = "KO";
        header('location: user.php');
      } else if ($data['vrsta'] == "AD") {
        $_SESSION['vrsta'] = "AD";
        header('location: admin.php');
      }

    } else {
      array_push($errors, "Greska");
    }
  }
}

if (isset($_POST['edit_user'])) {

  $imeUP = mysqli_real_escape_string($db, $_POST['imeUP']);
  $prezimeUP = mysqli_real_escape_string($db, $_POST['prezimeUP']);
  $usernameUP = mysqli_real_escape_string($db, $_POST['usernameUP']);
  $emailUP = mysqli_real_escape_string($db, $_POST['emailUP']);
  $passwordUP = mysqli_real_escape_string($db, $_POST['passwordUP']);

  $user_check_query = "SELECT * FROM registrovani WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  if (count($errors) == 0) {

    $kveri = "UPDATE registrovani SET ime='$imeUP', prezime='$prezimeUP', username='$usernameUP', password='$passwordUP' WHERE email='$emailUP'";

    mysqli_query($db, $kveri);
    $_SESSION['username'] = $usernameUP;
    $_SESSION['ime'] = $imeUP;
    $_SESSION['prezime'] = $prezimeUP;
    $_SESSION['email'] = $emailUP;
    $_SESSION['password'] = $passwordUP;
    $_SESSION['success'] = "Uspesno!";
    header('location: user.php');
  }
}


if (isset($_POST['send_msg'])) {

  $imePI = mysqli_real_escape_string($db, $_POST['imePI']);
  $emailPI = mysqli_real_escape_string($db, $_POST['emailPI']);
  $dodInfoPI = mysqli_real_escape_string($db, $_POST['dodInfoPI']);

  $queryPI = "INSERT INTO pitanja (ime, email, dodInfo) 
  			  VALUES('$imePI','$emailPI','$dodInfoPI')";

  mysqli_query($db, $queryPI);
  header('location: kontakt.php');
}

// if (isset($_POST['order'])) {

//     $selectOption = $_POST['model_choose'];
//     $adresa = $_POST['adresa'];
//     $brTel = $_POST['brTel'];

//     $queryNA = "INSERT INTO kontakti (soba, imePrezime, tel) 
//   			  VALUES('$selectOption', '$adresa','$brTel')";
//   	mysqli_query($db, $queryNA);
//   	header('location: raspolozivost.php');
// }

if (isset($_POST['order'])) {
  // Preuzimanje podataka iz POST zahteva
  $model_choose = mysqli_real_escape_string($db, $_POST['model_choose']);
  $adresa = mysqli_real_escape_string($db, $_POST['adresa']);
  $brTel = mysqli_real_escape_string($db, $_POST['brTel']);

  // SQL upit za unos podataka u bazu
  $sql = "INSERT INTO raspolozivost (model_choose, adresa, brTel) VALUES ('$model_choose', '$adresa', '$brTel')";

  // Izvršavanje SQL upita
  if (mysqli_query($db, $sql)) {
    echo "Uspešno dodati podaci.";
    header('location: raspolozivost.php');

  } else {
    echo "Greška: " . mysqli_error($db);
  }
}

if ($soba) {

  // // $sql = "INSERT INTO test (room,broj) VALUES ('$soba','$soba')";
  // $sql = "UPDATE page_views SET views = views + 1 WHERE room_name = '$soba'";


  // if (mysqli_query($db, $sql)) {
  //   echo "Uspešno dodati podaci.";

  // } else {
  //   echo "Greška: " . mysqli_error($db);
  // }


  // $sql = "INSERT INTO test (room,broj) VALUES ('$soba','$soba')";
  $sql = "INSERT INTO posete_soba (ime_stranice) VALUES ('$soba')";


  if (mysqli_query($db, $sql)) {
    echo "Uspešno dodati podaci.";

  } else {
    echo "Greška: " . mysqli_error($db);
  }


}

$sqlPol = "SELECT pol, COUNT(*) as broj FROM registrovani GROUP BY pol";
$resultsPol = mysqli_query($db, $sqlPol);

$data = [];
if ($resultsPol->num_rows > 0) {
  while ($row = $resultsPol->fetch_assoc()) {
    $data[$row['pol']] = $row['broj'];
  }
}
$jsonData = json_encode($data);






$sql = "SELECT 
ime_stranice, 
COUNT(*) as broj_poseta, 
DATE(vreme_posete) as datum 
FROM 
posete_soba 
WHERE 
vreme_posete >= CURDATE() - INTERVAL 6 DAY AND vreme_posete < CURDATE() + INTERVAL 1 DAY
GROUP BY 
ime_stranice, DATE(vreme_posete)
ORDER BY 
DATE(vreme_posete) ASC, ime_stranice ASC;

";

$result = mysqli_query($db, $sql);

$final_data = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $datum = $row['datum'];
    $ime_stranice = $row['ime_stranice'];
    $broj_poseta = $row['broj_poseta'];

    if (!isset($final_data[$datum])) {
      $final_data[$datum] = [];
    }

    $final_data[$datum][$ime_stranice] = $broj_poseta;
  }
}
$jsonDataPoseta = json_encode($final_data);


// Konvertovanje PHP niza u JSON za korišćenje u JavaScript-u


?>
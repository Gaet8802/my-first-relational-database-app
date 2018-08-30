
<?php

session_start ();

if ($_SESSION['typeUser'] == 1) {
  echo "ADMIN";
} else {
  echo "Pas admin";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="logout.php">Déconnection</a>
  </body>
</html>

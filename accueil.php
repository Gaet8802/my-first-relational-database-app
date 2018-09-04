
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
    <a href="invoices.php">INVOICES</a>
    <a href="suppliers.php">SUPPLIERS</a>
    <a href="customers.php">COMPANY</a>
    <a href="annuaire.php">ANNUAIRE</a>
    <a href="logout.php">Déconnection</a>
  </body>
</html>

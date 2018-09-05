<?php

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

if (isset($_POST['username']) && isset($_POST['password'])) {

  $user = $_POST['username'];
  $pwd = $_POST['password'];
  $sPwd = sha1($pwd);

  $req = $bdd->prepare("SELECT * FROM login WHERE user = '$user' AND pwd = '$sPwd' ");
  $req->execute(array($user, sha1($sPwd)));

  $donnees = $req->fetch();

  if ($donnees['typeUser'] == "moderateur" ) {
    session_start ();
    $_SESSION['typeUser'] = "moderateur";
    $_SESSION['nom'] = 'Mumu';
    header ('location: accueil.php');
  } elseif ($donnees['typeUser'] == "superadmin") {
    session_start ();
    $_SESSION['typeUser'] = "superadmin";
    $_SESSION['nom'] = 'J.C';
    header ('location: accueil.php');
  } else {
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    echo '<meta http-equiv="refresh" content="0;URL=log-in-form.php">';
  }
} else {
echo 'Les variables du formulaire ne sont pas déclarées.';
}

?>

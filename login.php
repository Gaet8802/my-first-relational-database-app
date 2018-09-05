<?php

require 'DBconnect.php';

if (isset($_POST['username']) && isset($_POST['password'])) {

  $user = $_POST['username'];
  $pwd = $_POST['password'];

  $req = $bdd->prepare("SELECT * FROM login WHERE user = '$user' AND pwd = '$pwd' ");
  $req->execute(array($user, sha1($pwd)));

  $donnees = $rep->fetch();

  if ($donnees['typeUser'] == 0 ) {
    session_start ();
    $_SESSION['typeUser'] = 0;
    header ('location: accueil.php');
  } elseif ($donnees['typeUser'] == 1) {
    session_start ();
    $_SESSION['typeUser'] = 1;
    header ('location: accueil.php');
  } else {
    echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    echo '<meta http-equiv="refresh" content="0;URL=log-in-form.php">';
  }
} else {
echo 'Les variables du formulaire ne sont pas déclarées.';
}



 //-------------------------------------------------------------------------------------------------------------------------------


//  $username_valide = "muriel";
//  $password_valide = "perrache";
//  $username_admin = "jc";
//  $password_admin = "ranu";
//
//
// if (isset($_POST['username']) && isset($_POST['password'])) {
//   if ($username_valide == $_POST['username'] && $password_valide == $_POST['password']) {
//     session_start ();
//     $_SESSION['username'] = $_POST['username'];
//     $_SESSION['password'] = $_POST['password'];
//     $_SESSION['typeUser'] = 0;
//     header ('location: accueil.php');
//   } elseif ($username_admin == $_POST['username'] && $password_admin == $_POST['password']) {
//     session_start ();
//     $_SESSION['username'] = $_POST['username'];
//     $_SESSION['password'] = $_POST['password'];
//     $_SESSION['typeUser'] = 1;
//     header ('location: accueil.php');
//   } else {
//     echo '<body onLoad="alert(\'Membre non reconnu...\')">';
//     echo '<meta http-equiv="refresh" content="0;URL=log-in-form.php">';
//   }
// } else {
// echo 'Les variables du formulaire ne sont pas déclarées.';
// }
?>
